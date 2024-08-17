<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\RegexOption;
use Illuminate\Http\Request;
use App\Services\RegexOptionService;

class RegexOptionsController extends Controller
{
    public function index(RegexOptionService $regexOptionService){
        $response['message'] = 'Successfully retrieved regex default options';
        $response['body'] = $regexOptionService->listRegexOptions();
        
        return response()->json($response);
    }
}
