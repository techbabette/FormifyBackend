<?php

namespace App\Http\Controllers;

use App\DataTransferObjects\UserDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct(
        protected UserService $userService
    )
    {
    }

    public function register(UserRegisterRequest $request){
        $userDTO = UserDTO::fromValidated($request->validated());
        $this->userService->create($userDTO);

        return response()->json(['message' => 'Successfully registered'], 200);
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
