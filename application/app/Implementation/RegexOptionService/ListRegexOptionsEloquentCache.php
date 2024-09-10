<?php

namespace App\Implementation\RegexOptionService;

use App\Interfaces\RegexOptionService\IListRegexOptions;
use Illuminate\Support\Facades\Cache;
use App\Models\RegexOption;

class ListRegexOptionsEloquentCache extends ListRegexOptionsEloquent {
    public function execute() : array{
        $cacheIdentifier = "regexoptions:list";
        $regexOptions = Cache::rememberForever($cacheIdentifier, function () {
            return parent::execute();
        });
        return $regexOptions;
    }
}
