<?php

namespace App\Http\Controllers;

use App\DataTransferObjects\UserRegistrationDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest;
use App\Models\EmailVerificationToken;
use App\Services\UserService;
use App\Services\MailerService;
use App\Services\EmailVerificationTokenService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct(
        protected UserService $userService,
        protected MailerService $mailerService,
        protected EmailVerificationTokenService $emailVerificationTokenService
    )
    {
    }

    public function register(UserRegisterRequest $request){
        $userDTO = UserRegistrationDTO::fromValidated($request->validated());
        $newUserId = $this->userService->register($userDTO);

        $activationToken = $this->emailVerificationTokenService->create($newUserId);

        $this->mailerService->registrationEmail($userDTO->first_name, $userDTO->last_name, $userDTO->email, $activationToken);

        return response()->json(['message' => 'Successfully registered, check your email'], 200);
    }
    
    public function login(Request $request){
        $email = $request['email'];
        $password = $request['password'];

        $token = $this->userService->login($email, $password);

        return response()->json([
            'message' => 'Successfully logged in',
            'body' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }

    //TODO: Create authorized request and no-dabatase authorizer
    public function logout(Request $request){
        $token = $request->bearerToken();

        $this->userService->logout($token);

        return response()->json(['message' => "Successfully signed out"], 200);
    }
}
