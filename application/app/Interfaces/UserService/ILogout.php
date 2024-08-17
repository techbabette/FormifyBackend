<?php

namespace App\Interfaces\UserService;

interface ILogout{
    public function execute(string $token) : void;
}

?>