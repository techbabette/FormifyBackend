<?php

namespace App\Implementation\InputService;

use App\Interfaces\InputService\IListInputs;
use Illuminate\Support\Facades\Cache;
use App\Models\Input;

class ListInputsEloquentCache extends ListInputsEloquent {
    public function execute () : array{
        $cacheIdentifier = "inputs:list";
        $inputs = Cache::rememberForever($cacheIdentifier, function () {
            return parent::execute();
        });
        return $inputs;
    }
}
?>
