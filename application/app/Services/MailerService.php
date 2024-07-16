<?php

namespace App\Services;

use App\DataTransferObjects\UserDTO;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use App\Services\MQService;

class MailerService
{
    public function __construct(
        protected MQService $mqService
    )
    {
    }

    public function registrationEmail(string $first_name, string $last_name, string $email, string $token) : void
    {
        $message = json_encode(["name" => $first_name." ".$last_name, "email" => $email, "token" => $token]);

        $this->mqService->publishToExchange($message, "mail_token");
    }
}

?>