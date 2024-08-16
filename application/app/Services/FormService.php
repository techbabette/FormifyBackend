<?php

namespace App\Services;

use App\Interfaces\FormService\IGetForm;

class FormService {
    public function __construct(protected IGetForm $getForm){
    }

    public function getForm(int $id){
        return $this->getForm->execute($id);
    }
}
?>