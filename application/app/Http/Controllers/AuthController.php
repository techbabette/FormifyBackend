<?php

namespace App\Http\Controllers;

use App\DataTransferObjects\UserRegistrationDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest;
use App\Models\EmailVerificationToken;
use App\Services\UserService;
use App\Services\MailerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct(
        protected UserService $userService,
        protected MailerService $mailerService
    )
    {
    }

    public function register(UserRegisterRequest $request){
        $userDTO = UserRegistrationDTO::fromValidated($request->validated());
        $newUserId = $this->userService->create($userDTO);

        $activationToken = md5(uniqid(rand())).md5(time()).md5(uniqid(rand()));
        EmailVerificationToken::create(["user_id" => $newUserId, "token" => $activationToken]);

        $this->mailerService->registrationEmail($userDTO->first_name, $userDTO->last_name, $userDTO->email, $activationToken);

        return response()->json(['message' => 'Successfully registered, check your email'], 200);
    }
    
    public function login(Request $request){
        $email = $request['email'];
        $password = $request['password'];

        $token = $this->userService->login($email, $password);

        if(!$token){
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $emailVerified = $this->userService->checkEmailVerification(Auth::user());

        if(!$emailVerified){
            return response()->json(['message' => 'Email not verified'], 401);
        }

        return response()->json([
            'message' => 'Successfully logged in',
            'body' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
