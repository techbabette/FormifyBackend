<?php

namespace App\Implementation\UserService;

use Illuminate\Support\Facades\Cache;

class LoginEloquentCache extends LoginEloquent {
    public function execute(string $email, string $password) : string{
        $token = parent::execute($email, $password);
        $tokenSchema = "users:tokens:$token";

        Cache::put($tokenSchema, 'valid', auth()->factory()->getTTL() * 60);

        return $token;
    }
}

?>