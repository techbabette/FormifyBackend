<?php

namespace App\Interfaces\FormService;

interface IFormCreate
{
    public function execute(int $user_id, array $data);
}
