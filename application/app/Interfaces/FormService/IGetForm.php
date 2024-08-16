<?php

namespace App\Interfaces\FormService;

interface IGetForm {
    public function execute (int $id) : object;
}

?>