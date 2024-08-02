<?php

namespace App\Core;

use Illuminate\Foundation\Http\FormRequest;
use App\Core\IUseCaseRequest;

abstract class FormRequestAuthorized extends FormRequest implements IUseCaseRequest{

    public function __construct(protected IAuthorizer $authorizer) {
    }
    public function authorize(): bool
    {
        return $this->authorizer->authorize($this->getName());
    }
}

?>