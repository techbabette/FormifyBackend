<?php

namespace App\Services;

use App\Interfaces\LinkService\IListLinks;

class LinkService
{
    public function __construct(protected IListLinks $listLinks){
    }

    public function listLinks()
    {
        return $this->listLinks->execute();
    }
}
?>