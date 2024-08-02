<?php

namespace App\Core;

interface IAuthorizer {
    public function authorize(string $requestPermission) : bool;
}

?>