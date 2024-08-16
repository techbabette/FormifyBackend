<?php

namespace App\Implementation\FormService;

use App\Interfaces\FormService\IGetForm;
use App\Models\Form;

class GetFormEloquent implements IGetForm{
    public function execute (int $id) : object{
        return Form::with('FormInputs.SimpleOptions', 'FormInputs.Input')->find($id);
    }
}
?>