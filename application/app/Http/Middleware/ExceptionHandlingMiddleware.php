<?php

namespace App\Http\Middleware;

use App\Exceptions\EntityNotFoundException;
use Closure;
use Exception;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;

class ExceptionHandlingMiddleware{
    public function handle($request, Closure $next){
        $response = $next($request);
        
        if(empty($response->exception)){
            return $response;
        }

        if($response->exception instanceof EntityNotFoundException){
            return response()->json(['message' => $response->exception->getMessage()], 404);
        }

        return response()->json(['message' => "Server error"], 500);
    }
}