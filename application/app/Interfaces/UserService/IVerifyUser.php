<?php

namespace App\Interfaces\UserService;

interface IVerifyUser
{
    public function execute (string $token);
}
