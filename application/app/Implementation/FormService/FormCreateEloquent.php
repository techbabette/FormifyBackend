<?php

namespace App\Implementation\FormService;

use App\Interfaces\FormService\IFormCreate;
use App\Models\Form;
use App\Models\FormInput;
use App\Models\Input;
use App\Models\Option;
class FormCreateEloquent implements IFormCreate
{

    public function execute(int $user_id, array $data)
    {
        $newFormId = Form::create(["user_id" => $user_id, "name" => $data["name"], "resetButtonAvailable" => $data["resetButtonAvailable"] === "true"])->id;
        $requestFormElements = $data["elements"];
        $elementTypesWithOptions = Input::typesWithOptions();
        foreach($requestFormElements as $element){
            $elementType = $element["type"]["id"];
            $element["required"] = filter_var($element["required"], FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
            $newElementId = FormInput::create(
                ["form_id" => $newFormId,
                    "input_id" => $element["type"]["id"],
                    "weight" => $element["weight"],
                    "width" => $element["width"],
                    "required" => $element["required"] ? 1 : 0,
                    "label" => $element["label"],
                    "regex" => array_key_exists("regex", $element) ? $element["regex"] : null,
                    "minimum" => array_key_exists("minimum", $element) ? $element["minimum"] : null,
                    "maximum" => array_key_exists("maximum", $element) ? $element["maximum"] : null,
                ])->id;

            if(in_array($elementType, $elementTypesWithOptions)){
                $elementHasDefaultOption = array_key_exists("defaultOption", $element);
                foreach($element["options"] as $optionKey => $option){
                    Option::create(["form_input_id" => $newElementId, "value" => $option, "default_selected" => $elementHasDefaultOption && $element["defaultOption"] == $optionKey]);
                }
            }
        }

        return $newFormId;
    }
}
