<?php

namespace App\Http\Requests;

use App\Core\FormRequestUnauthorized;
use Illuminate\Foundation\Http\FormRequest;

class UserLoginRequest extends FormRequestUnauthorized
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "email" => "required|email",
            "password" => "required|string"
        ];
    }

    public function getName()
    {
        return "UserLoginRequest";
    }
}
