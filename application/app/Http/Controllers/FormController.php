<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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
}
