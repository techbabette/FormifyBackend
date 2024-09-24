<?php

namespace App\Http\Requests;

use App\Core\FormRequestUnauthorized;

class FormSubmitResponseRequest extends FormRequestUnauthorized
{
     public function getName() : String {
        return "FormSubmitAnswer";
     }

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
}
