<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormCreateRequest;
use App\Http\Requests\FormListPersonalRequest;
use App\Http\Requests\FormSubmitResponseRequest;
use App\Models\Form;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function show(Request $request){
        $form_id = $request->route()->parameter('id');

        $form = Form::with('FormInputs.SimpleOptions', 'FormInputs.Input')->find($form_id);

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

        return response()->json($response);
    }
}
