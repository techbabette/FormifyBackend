<?php

namespace App\Http\Controllers;

use App\Services\LinkService;

class LinkController extends Controller
{
    public function index(LinkService $linkService){
        return $linkService->listLinks();
    }
}
