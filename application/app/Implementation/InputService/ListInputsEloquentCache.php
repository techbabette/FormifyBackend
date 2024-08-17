<?php

namespace App\Implementation\InputService;

use App\Interfaces\InputService\IListInputs;
use Illuminate\Support\Facades\Cache;
use App\Models\Input;

class ListInputsEloquentCache implements IListInputs{
    public function execute () : array{
        $cacheIdentifier = "inputs:list";
        $inputs = Cache::rememberForever($cacheIdentifier, function () {
            $result = Input::select('id', 'text', 'type')->get()->toArray();

            return $result;
        });
        return $inputs;
    }
}
?>