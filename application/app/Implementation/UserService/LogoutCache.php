<?php

namespace App\Implementation\UserService;

use App\Interfaces\UserService\ILogout;
use Illuminate\Support\Facades\Cache;

class LogoutCache implements ILogout{
    public function execute($token) : void{
        $tokenSchema = "users:tokens:$token";
        Cache::forget($tokenSchema);
    }
}