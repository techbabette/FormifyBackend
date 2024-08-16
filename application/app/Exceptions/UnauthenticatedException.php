<?php

namespace App\Exceptions;

use Exception;

class UnauthenticatedException extends Exception {
    public function __construct(string $message)
    {
        parent::__construct("$message", 0, null);
    }
}

?>