<?php

namespace App\Implementation\RegexOptionService;

use App\Interfaces\RegexOptionService\IListRegexOptions;
use Illuminate\Support\Facades\Cache;
use App\Models\RegexOption;

class ListRegexOptionsEloquentCache implements IListRegexOptions {
    public function execute() : array{
        $cacheIdentifier = "regexoptions:list";
        $regexOptions = Cache::rememberForever($cacheIdentifier, function () {
            return RegexOption::select('id', 'text', 'value')->get()->toArray();
        });
        return $regexOptions;
    }
}