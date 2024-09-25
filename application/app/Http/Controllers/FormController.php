<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormCreateRequest;
use App\Http\Requests\FormListPersonalRequest;
use App\Http\Requests\FormListResponsesRequest;
use App\Http\Requests\FormSubmitResponseRequest;
use App\Models\Form;
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

    }

    public function createForm(FormCreateRequest $request){

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
