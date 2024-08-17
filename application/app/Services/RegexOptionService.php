<?php

namespace App\Services;

use App\Interfaces\RegexOptionService\IListRegexOptions;

class RegexOptionService {
    public function __construct(protected IListRegexOptions $listRegexOptions)
    {
        
    }

    public function listRegexOptions () {
        return $this->listRegexOptions->execute();
    }
}