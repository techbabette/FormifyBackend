<?php

namespace App\Http\Requests;

use App\Core\FormRequestAuthorized;

class UserRegisterRequest extends FormRequestAuthorized
{
    public function getName(){
        return "UserRegister";
    }

    public function rules(): array
    {
        return [
            "first_name" => "required|string|regex:/^[A-Z][a-z]{1,14}(\s[A-Z][a-z]{1,14}){0,2}$/",
            "last_name" => "required|string|regex:/^[A-Z][a-z]{1,14}(\s[A-Z][a-z]{1,14}){0,2}$/",
            "email" => "required|email|unique:users",
            "password" => "required|string|min:8|max:40",
        ];
    }
}
