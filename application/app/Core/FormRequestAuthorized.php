<?php

namespace App\Core;

use Illuminate\Foundation\Http\FormRequest;
use App\Core\IUseCaseRequest;

abstract class FormRequestAuthorized extends FormRequest implements IUseCaseRequest{
    public function authorize(): bool
    {
        //If user/user group has permission to execute usecase, allow 
        return true;
    }
}

?>