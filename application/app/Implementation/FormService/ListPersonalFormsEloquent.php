<?php

namespace App\Implementation\FormService;

use App\Interfaces\FormService\IListPersonalForms;
use App\Models\Form;
use DateTime;

class ListPersonalFormsEloquent implements IListPersonalForms
{

    public function execute(int $user_id)
    {
        $forms = Form::query();

        $forms->where('user_id', $user_id);
        $forms->withCount("responses");
        $forms->orderBy('created_at', 'desc');

        $paginatedForms = $forms->paginate(5);

        $reformatedForms = [];

        foreach($paginatedForms->items() as $form){
            $created_at_date = new DateTime($form->created_at);
            $reformatedForms[] = ["id" => $form->id, "name" => $form->name, "created_at" => $created_at_date->format("Y-m-d H:i:s"), "number_of_responses" => $form->responses_count];
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
