<?php

namespace App\Implementation\UserService;

use App\Models\User;
use Illuminate\Support\Facades\Cache;
class LoginDirectEloquentCache extends LoginDirectEloquent
{
    public function execute(User $user) : String
    {
        $token =  parent::execute($user);
        $tokenSchema = "users:tokens:$token";
        Cache::put($tokenSchema, 'valid', auth()->factory()->getTTL() * 60);
        return $token;
    }
}
