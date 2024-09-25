<?php

namespace App\Services;

use App\Interfaces\FormService\IFormSubmitResponse;
use App\Interfaces\FormService\IGetForm;
use App\Interfaces\FormService\IListFormResponses;

class FormService {
    public function __construct(protected IGetForm $getForm,
                                protected  IListFormResponses $listResponses,
                                protected IFormSubmitResponse $submitResponse,){
    }

    public function getForm(int $id){
        return $this->getForm->execute($id);
    }

    public function listResponses(int $id){
        return $this->listResponses->execute($id);
    }

    public function submitResponse(int $id, array $values){
        return $this->submitResponse->execute($id, $values);
    }
}
?>
