<?php

namespace App\Implementation\LinkService;

use App\Interfaces\LinkService\IListLinks;
use App\Models\Link;

class ListLinksEloquent implements IListLinks{
    public function execute () : array{
        $linksFromDatabase = Link::with("GroupLinks.Group")->get()->toArray();

        $returnLinks = [];

        foreach ($linksFromDatabase as $linkFromDatabase){
            $newReturnLink = [
                "id" => $linkFromDatabase["id"],
                "position" => $linkFromDatabase["position"],
                "text" => $linkFromDatabase["text"],
                "to" => $linkFromDatabase["to"],
                "weight" => $linkFromDatabase["weight"],
                "groups" => []
            ];

            foreach ($linkFromDatabase["group_links"] as $groupLinkFromDatabase){
                array_push($newReturnLink["groups"], $groupLinkFromDatabase['group']['name']);
            }
            
            array_push($returnLinks, $newReturnLink);
        }

        return $returnLinks;
    }
}
?>