<?php

namespace App\Services;

use App\DataTransferObjects\UserDTO;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserService
{
    public function create(UserDTO $user)
    {
        User::create([
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'email' => $user->email,
            'password' => $user->password
        ]);
    }

    public function login(String $email, String $password) : String{
        $token = Auth::attempt(['email' => $email, 'password' => $password]);

        if(!$token){
            return "";
        }

        return $token;
    }

    public function checkEmailVerification(User $user) : bool{
        if(!$user->email_verified_at){
            return false;
        }

        return true;
    }
}

?>