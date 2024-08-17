<?php

namespace App\Interfaces\UserService;

interface ILogin{
    public function execute(string $email, string $password) : string;
}

?>