<?php

namespace App\Http\Requests;

use App\Core\FormRequestAuthorized;
use Illuminate\Foundation\Http\FormRequest;

class UserLogoutRequest extends FormRequestAuthorized
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
        ];
    }

    public function getName()
    {
        return "UserLogoutRequest";
    }
}
