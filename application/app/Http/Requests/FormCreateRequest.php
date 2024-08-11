<?php

namespace App\Http\Requests;

use App\Core\FormRequestAuthorized;

class FormCreateRequest extends FormRequestAuthorized
{
    /**
     * Determine if the user is authorized to make this request.
     */

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */

     public function getName() : String{
        return "FormCreate";
     }

    public function rules(): array
    {
        return [
            //
        ];
    }
}
