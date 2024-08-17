<?php

namespace App\Implementation\InputService;

use App\Interfaces\InputService\IListInputs;
use App\Models\Input;

class ListInputsEloquent implements IListInputs{
    public function execute () : array{
        return Input::select('id', 'text', 'type')->get()->toArray();
    }
}
?>