<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\RegexOption;
use Illuminate\Http\Request;

class RegexOptionsController extends Controller
{
    public function index(){
        $response['message'] = 'Successfully retrieved regex default options';
        $response['body'] = RegexOption::all();
        
        return response()->json($response);
    }
}
