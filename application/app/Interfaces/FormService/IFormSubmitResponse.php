<?php

namespace App\Interfaces\FormService;

interface IFormSubmitResponse
{
    public function execute (int $id, array $values);
}
