<?php

namespace App\Interfaces\UserService;

use App\Models\User;

interface ILoginDirect
{
    public function execute (User $user) : String;
}
