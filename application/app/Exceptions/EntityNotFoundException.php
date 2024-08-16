<?php

namespace App\Exceptions;

use Exception;

class EntityNotFoundException extends Exception {
    public function __construct(string $entityName, int $entityId)
    {
        parent::__construct("$entityName with id of $entityId does not exist", 0, null);
    }
}

?>