<?php

namespace App\Implementation\FormService;

use App\Interfaces\FormService\IListPersonalForms;
use App\Models\Form;
class ListPersonalFormsEloquent implements IListPersonalForms
{

    public function execute(int $user_id)
    {
        $forms = Form::query();

        $forms->where('user_id', $user_id);
        $forms->withCount("responses");
        $forms->orderBy('responses_count', 'desc');

        $paginatedForms = $forms->paginate(5);

        $reformatedForms = [];

        foreach($paginatedForms->items() as $form){
            $reformatedForms[] = ["id" => $form->id, "name" => $form->name, "created_at" => $form->created_at, "number_of_responses" => $form->responses_count];
        }

        return [
            "data" => $reformatedForms,
            "current_page" => $paginatedForms->currentPage(),
            "last_page" => $paginatedForms->lastPage(),
            "per_page" => $paginatedForms->perPage(),
            "total" => $paginatedForms->total(),
        ];
    }
}
