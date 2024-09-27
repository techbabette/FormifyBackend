<?php

namespace App\Implementation\UserService;

use App\Exceptions\UnauthenticatedException;
use App\Interfaces\UserService\IVerifyUser;
use App\Models\EmailVerificationToken;
use App\Models\User;

class VerifyUserEloquent implements IVerifyUser
{

    public function execute(string $token)
    {
        $tokenObject = EmailVerificationToken::where('token', '=', $token)->first();

        if(!$tokenObject){
            throw new UnauthenticatedException("Invalid activation token");
        }

        $userToActivate = $tokenObject->user;
        $tokenObject->delete();

        $timeOfActivation = now();
        $userToActivate->email_verified_at = $timeOfActivation;
        $userToActivate->save();
        return $userToActivate;
    }
}
