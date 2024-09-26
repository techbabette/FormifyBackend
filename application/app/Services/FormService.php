<?php

namespace App\Services;

use App\Interfaces\FormService\IFormSubmitResponse;
use App\Interfaces\FormService\IGetForm;
use App\Interfaces\FormService\IListFormResponses;
use App\Interfaces\FormService\IListPersonalForms;

class FormService {
    public function __construct(protected IGetForm $getForm,
                                protected  IListFormResponses $listResponses,
                                protected IFormSubmitResponse $submitResponse,
                                protected  IListPersonalForms $listPersonalForms){
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

    public function listPersonalForms(int $user_id){
        return $this->listPersonalForms->execute($user_id);
    }
}
?>
