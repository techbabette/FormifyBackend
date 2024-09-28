<?php

namespace App\Http\Controllers;

use App\DataTransferObjects\UserRegistrationDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserLogoutRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\UserVerifyRequest;
use App\Models\EmailVerificationToken;
use App\Models\User;
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

    public function login(UserLoginRequest $request){
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

    public function verify(UserVerifyRequest $request){
        $routeToken = $request->route('token');

        $user = $this->userService->verifyUser($routeToken);
        $token = $this->userService->loginDirect($user);

        return response()->json(['message' => 'Successfully activated account', 'body' => $token], 201);
    }

    public function logout(UserLogoutRequest $request){
        $token = $request->bearerToken();

        $this->userService->logout($token);

        return response()->json(['message' => "Successfully signed out"], 200);
    }
}
