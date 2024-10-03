<?php

namespace App\Http\Middleware;

use App\Exceptions\EntityNotFoundException;
use App\Exceptions\UnauthenticatedException;
use App\Exceptions\UnauthorizedException;
use Cassandra\Exception\ValidationException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Closure;
use Exception;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ExceptionHandlingMiddleware{
    public function handle($request, Closure $next){
        DB::beginTransaction();
        $response = $next($request);
        if(empty($response->exception)){
            DB::commit();
            return $response;
        }

        if($response->exception instanceof EntityNotFoundException){
            return response()->json(['error' => $response->exception->getMessage()], 404);
        }

        if($response->exception instanceof UnauthenticatedException){
            return response()->json(['error' => $response->exception->getMessage()], 401);
        }

        if($response->exception instanceof UnauthorizedException){
            return response()->json(['error' => $response->exception->getMessage()], 403);
        }

        if($response->exception instanceof TokenExpiredException){
            return response()->json(['error' => 'Session expired'], 401);
        }

        if($response->status() >= 500){
            return response()->json(['error' => "Server error"], 500);
        }

        return $response;
    }
}
