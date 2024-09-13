<?php

namespace App\Implementation\Authorizer;

use App\Core\IAuthorizer;

class AuthorizerGroupsEloquent implements IAuthorizer {
    public function authorize(string $requestPermission): bool
    {
        $userLoggedIn = auth()->user();
        if(!$userLoggedIn){
            return false;
        }

        $group = $userLoggedIn->group;
        $groupPermissions = $group->permissions->pluck('permission')->toArray();
        $groupHasRequestPermission = in_array($requestPermission, $groupPermissions);

        return $groupHasRequestPermission;
    }
}

?>
