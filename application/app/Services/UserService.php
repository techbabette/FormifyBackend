<?php

namespace App\Services;

use App\DataTransferObjects\UserRegistrationDTO;
use App\Exceptions\UnauthenticatedException;
use App\Models\Group;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserService
{
    public function register(UserRegistrationDTO $user) : int
    {
        $group = Group::where('is_default_registered', true)->first();
        return User::create([
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'email' => $user->email,
            'password' => $user->password,
            'group_id' => $group->id
        ])->id;
    }

    public function login(String $email, String $password) : String{
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