<?php

namespace App\Http\Requests;

use App\Core\FormRequestUnauthorized;

class FormSubmitResponseRequest extends FormRequestUnauthorized
{
    /**
     * Determine if the user is authorized to make this request.
     */

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
