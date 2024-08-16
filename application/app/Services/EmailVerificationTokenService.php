<?php

namespace App\Services;

use App\Models\EmailVerificationToken;

class EmailVerificationTokenService {
    public function create(int $user_id) : string{
        $activationToken = md5(uniqid(rand())).md5(time()).md5(uniqid(rand()));

        EmailVerificationToken::create(["user_id" => $user_id, "token" => $activationToken]);

        return $activationToken;
    }
}
?>