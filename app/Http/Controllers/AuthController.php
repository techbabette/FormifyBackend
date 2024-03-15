<?php

namespace App\Http\Controllers;

use App\DataTransferObjects\UserDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest;
use App\Services\UserService;
use Illuminate\Http\Request;

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
}
