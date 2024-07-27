<?php

namespace App\Services;

interface MailerService
{
    public function registrationEmail(string $first_name, string $last_name, string $email, string $token) : void;
}
?>