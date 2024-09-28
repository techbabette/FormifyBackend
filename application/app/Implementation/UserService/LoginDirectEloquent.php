<?php

namespace App\Implementation\UserService;

use App\Interfaces\UserService\ILoginDirect;
use App\Models\User;

class LoginDirectEloquent implements ILoginDirect
{
    public function execute(User $user) : String
    {
        return auth()->login($user);
    }
}
