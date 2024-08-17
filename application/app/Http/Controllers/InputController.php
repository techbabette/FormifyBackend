<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\InputService;
use Illuminate\Http\Request;

class InputController extends Controller
{
    public function index(Request $request, InputService $inputService)
    {
        $response['message'] = 'Successfully retrieved input types';
        $response['body'] = $inputService->listInputs();
        
        return response()->json($response);
    }
}
