<?php

namespace App\Implementation\Authorizer;

use App\Core\IAuthorizer;
use App\Exceptions\UnauthenticatedException;
use App\Exceptions\UnauthorizedException;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Cache;
class AuthorizerCache implements IAuthorizer
{

    public function authorize(string $requestPermission): bool
    {
        $bearerToken = Request::header('Authorization');

        if(!$bearerToken){
            throw new UnauthenticatedException("Session expired");;
        }

        $jwtToken = explode(" ", $bearerToken)[1];
        $permissions = auth()->payload()['permissions'];
        $requestPermissionIncluded = in_array($requestPermission, $permissions);

        if (!$requestPermissionIncluded) {
            throw new UnauthorizedException("Required permission missing");
        }

        $jwtTokenExistsInCache =  Cache::has("users:tokens:$jwtToken");
        if (!$jwtTokenExistsInCache) {
            throw new UnauthenticatedException("Session expired");
        }

        return true;
    }
}
