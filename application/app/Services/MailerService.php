<?php

namespace App\Services;

use App\Interfaces\MailerService\IRegistrationEmail;

class MailerService
{
    public function __construct(protected IRegistrationEmail $registrationEmail){
    }

    public function registrationEmail(string $first_name, string $last_name, string $email, string $token): void
    {
        $this->registrationEmail->execute($first_name, $last_name, $email, $token);
    }
}
?>