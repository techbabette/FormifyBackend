<?php

namespace App\Services;

use App\DataTransferObjects\UserRegistrationDTO;
use App\Interfaces\UserService\ILogin;
use App\Models\Group;
use App\Models\User;

class UserService
{
    public function __construct(protected ILogin $login)
    {
        
    }
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
        return $this->login->execute($email, $password);
    }
}
?>