<?php

namespace App\Implementation\FormService;

use App\Interfaces\FormService\IFormSubmitResponse;
use App\Models\Response;
use App\Models\ResponseValue;
class FormSubmitResponseEloquent implements IFormSubmitResponse
{

    public function execute(int $id, array $values)
    {
        $newResponseId = Response::create(['form_id' => $id])->id;
        $responseValues = $values;

        foreach($responseValues as $key => $value){
            if(is_array($value) ){
                foreach($value as $subValue){
                    ResponseValue::create(['response_id' => $newResponseId, 'form_input_id' => $key, 'value' => $subValue]);
                }
                continue;
            }
            ResponseValue::create(['response_id' => $newResponseId, 'form_input_id' => $key, 'value' => $value]);
        }
    }
}
