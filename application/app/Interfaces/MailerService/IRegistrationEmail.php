<?php

namespace App\Interfaces\MailerService;

interface IRegistrationEmail {
    public function execute(string $first_name, string $last_name, string $email, string $token) : void;
}

?>