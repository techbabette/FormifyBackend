<?php

namespace App\Implementation\UserService;

use App\Exceptions\UnauthenticatedException;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\UserService\ILogin;

class LoginEloquent implements ILogin {
    public function execute(string $email, string $password) : string{
        $token = Auth::attempt(['email' => $email, 'password' => $password]);

        if(!$token){
            throw new UnauthenticatedException("Incorrect email/password combination");
        }

        if(!Auth::user()->email_verified_at){
            throw new UnauthenticatedException("Email not verified");
        }

        return $token;
    }
}

?>