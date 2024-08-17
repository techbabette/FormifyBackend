<?php

namespace App\Services;

use App\Interfaces\InputService\IListInputs;

class InputService {
    public function __construct(protected IListInputs $listInputs)
    {
        
    }

    public function listInputs () {
        return $this->listInputs->execute();
    }
}