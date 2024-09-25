<?php

namespace App\Implementation\FormService;

use App\Interfaces\FormService\IListFormResponses;
use App\Models\Response;

class ListResponsesEloquent implements IListFormResponses
{

    public function execute(int $id)
    {
        $responses = Response::query();
        $responses->where('form_id', $id);

        $responses->with("responseValues.formInput");
        $paginatedResponses = $responses->paginate(5);

        $reformatedResponses = [];

        foreach ($paginatedResponses->items() as $responseItem) {
            $reformatedResponse = [
                "id" => $responseItem->id,
                "created_at" => $responseItem->created_at,
                "values" => []
            ];

            foreach ($responseItem->responseValues as $responseValue) {
                $responseValueKey = $responseValue->formInput->label;

                $responseValueKeyExists = array_key_exists($responseValueKey, $reformatedResponse["values"]);

                if(!$responseValueKeyExists){
                    $reformatedResponse["values"][$responseValueKey] = $responseValue->value;
                    continue;

                }

                if(is_array($reformatedResponse["values"][$responseValueKey])) {
                    $reformatedResponse["values"][$responseValueKey][] = $responseValue->value;
                    continue;
                }

                $reformatedResponse["values"][$responseValueKey] = [$reformatedResponse["values"][$responseValueKey]];
                $reformatedResponse["values"][$responseValueKey][] = $responseValue->value;
            }

            $reformatedResponses[] = $reformatedResponse;
        }


        return [
            "data" => $reformatedResponses,
            "current_page" => $paginatedResponses->currentPage(),
            "last_page" => $paginatedResponses->lastPage(),
            "per_page" => $paginatedResponses->perPage(),
            "total" => $paginatedResponses->total(),
        ];
    }
}
