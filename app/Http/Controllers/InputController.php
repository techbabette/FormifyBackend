<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Input;
use Illuminate\Http\Request;

class InputController extends Controller
{
    public function index(Request $request)
    {
        $response['message'] = 'Successfully retrieved input types';
        $response['body'] = Input::all();
        
        return response()->json($response);
    }
}
