<?php

namespace App\Implementation\FormService;

use Illuminate\Support\Facades\Cache;

class GetFormEloquentCache extends GetFormEloquent{
    public function execute (int $id) : object{
        $cacheIdentifier = "form:full:$id";
        $cacheDurationSeconds = 300;

        $form = Cache::remember($cacheIdentifier, $cacheDurationSeconds, function () use ($id) {
            return parent::execute($id);
        });

        return $form;
    }
}
?>