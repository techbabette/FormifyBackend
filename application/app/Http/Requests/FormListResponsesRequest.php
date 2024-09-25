<?php

namespace App\Http\Requests;

use App\Core\FormRequestAuthorized;
use App\Exceptions\EntityNotFoundException;
use App\Models\Form;
use Illuminate\Foundation\Http\FormRequest;

class FormListResponsesRequest extends FormRequestAuthorized
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        parent::authorize();

        $formId = $this->route("id");
        $form = Form::find($formId);

        if(!$form){
            throw new EntityNotFoundException("Form", $formId);
        }

        $userId = auth()->payload()['sub'];

        return $form->user_id == $userId;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */

    public function rules(): array
    {
        return [
        ];
    }

    public function getName()
    {
        return "FormListResponses";
    }
}
