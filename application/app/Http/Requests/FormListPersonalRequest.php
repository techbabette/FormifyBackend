<?php

namespace App\Http\Requests;

use App\Core\FormRequestAuthorized;

class FormListPersonalRequest extends FormRequestAuthorized
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function getName() : String{
        return "FormListPersonal";
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
