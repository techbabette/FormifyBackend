<?php

namespace App\Services;

use App\DataTransferObjects\UserDTO;
use App\Models\User;

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
}

?>