<?php

namespace App\Implementation\UserService;

use App\Interfaces\UserService\ILogout;

class LogoutPlaceholder implements ILogout {
    public function execute($token) : void {}
}

?>