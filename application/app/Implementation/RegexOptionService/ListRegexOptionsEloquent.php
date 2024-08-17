<?php

namespace App\Implementation\RegexOptionService;

use App\Interfaces\RegexOptionService\IListRegexOptions;
use App\Models\RegexOption;

class ListRegexOptionsEloquent implements IListRegexOptions {
    public function execute() : array{
        return RegexOption::select('id', 'text', 'value')->get()->toArray();
    }
}