<?php

namespace App\DataTransferObjects;

class UserDTO
{
    public function __construct
    (
        public readonly string $first_name,
        public readonly string $last_name,
        public readonly string $email,
        public readonly string $password,
    )
    {

    }

    public static function fromValidated(array $validated){
        return new self(
            first_name: $validated['first_name'],
            last_name: $validated['last_name'],
            email: $validated['email'],
            password: $validated['password']
        );
    }
}

?>