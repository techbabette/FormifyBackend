<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormCreateRequest;
use App\Http\Requests\FormListPersonalRequest;
use App\Http\Requests\FormListResponsesRequest;
use App\Http\Requests\FormSubmitResponseRequest;
use App\Models\Form;
use App\Models\FormInput;
use App\Models\Input;
use App\Models\Option;
use App\Services\FormService;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function __construct(protected FormService $formService)
    {

    }

    public function show(Request $request){
        $form_id = $request->route()->parameter('id');

        $form = $this->formService->getForm($form_id);

        $response['message'] = 'Successfully retrieved form information';
        $response['body'] = $form;

        return response()->json($response);
    }

    public function listPersonalForms(FormListPersonalRequest $request){
        $user_id = auth()->user()->id;

        $response["message"] = "Successfully retrieved forms";
        $response["body"] = $this->formService->listPersonalForms($user_id);

        return response()->json($response);
    }

    public function createForm(FormCreateRequest $request){
        $user_id = auth()->user()->id;

        $newFormId = Form::create(["user_id" => $user_id, "name" => $request->name, "resetButtonAvailable" => $request->resetButtonAvailable === "true"])->id;
        $requestFormElements = $request->elements;
        $elementTypesWithOptions = Input::typesWithOptions();
        foreach($requestFormElements as $element){
            $elementType = $element["type"]["id"];
            $newElementId = FormInput::create(
                ["form_id" => $newFormId,
                "input_id" => $element["type"]["id"],
                "weight" => $element["weight"],
                "width" => $element["width"],
                "required" => $element["required"],
                "label" => $element["label"],
                "regex" => array_key_exists("regex", $element) ? $element["regex"] : null,
                "minimum" => array_key_exists("minimum", $element) ? $element["minimum"] : null,
                "maximum" => array_key_exists("maximum", $element) ? $element["maximum"] : null,
                ])->id;

            if(in_array($elementType, $elementTypesWithOptions)){
                $elementHasDefaultOption = array_key_exists("defaultOption", $element);
                foreach($element["options"] as $optionKey => $option){
                    Option::create(["form_input_id" => $newElementId, "value" => $option, "default_selected" => $elementHasDefaultOption && $element["defaultOption"] === $optionKey]);
                }
            }
        }

        $response["message"] = "Successfully created form with id of $newFormId";
        return response()->json($response);
    }

    public function createResponse(FormSubmitResponseRequest $request){
        $form_id = $request->route()->parameter('id');

        $response['message'] = 'Successfully submitted your answer!';
        $this->formService->submitResponse($form_id, $request->all());

        return response()->json($response);
    }

    public function listResponses(FormListResponsesRequest $request){
        $form_id = $request->route()->parameter('id');

        $response['message'] = "Successfully retrieved form responses";
        $response["body"] = $this->formService->listResponses($form_id);

        return response()->json($response);
    }
}
