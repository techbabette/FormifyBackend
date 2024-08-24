<?php

namespace App\Implementation\LinkService;

use Illuminate\Support\Facades\Cache;

class ListLinksEloquentCache extends ListLinksEloquent{
    public function execute () : array{
        $cacheIdentifier = "links:list";

        $links = Cache::rememberForever($cacheIdentifier, function (){
            return parent::execute();
        });

        return $links;
    }
}
?>