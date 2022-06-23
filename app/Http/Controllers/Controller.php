<?php

namespace App\Http\Controllers;

use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;

    public function prepareOgMeta(): void
    {
        OpenGraph::addProperty('url', url()->current());
        OpenGraph::setSiteName(config('app.name'));
        OpenGraph::addProperty('image', asset('favicon.png'));
    }

    public function setSeo($title, $description = null, $keywords = null): void
    {
        SEOMeta::setTitle($title);
        SEOMeta::setDescription($description);
        OpenGraph::setTitle($title.' - '.config('app.name'));
        OpenGraph::setDescription($description);
        TwitterCard::setTitle($title);
        TwitterCard::setDescription($description);

//        SEOMeta::addKeyword($keywords);

        $this->prepareOgMeta();
    }
}
