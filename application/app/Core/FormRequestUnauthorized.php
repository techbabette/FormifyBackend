<?php

namespace App\Core;

use Illuminate\Foundation\Http\FormRequest;
use App\Core\IUseCaseRequest;

abstract class FormRequestUnauthorized extends FormRequest implements IUseCaseRequest{
    public function authorize(): bool
    {
        return true;
    }
}

?>