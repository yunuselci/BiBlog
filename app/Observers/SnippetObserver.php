<?php

namespace App\Observers;

use App\Models\Snippet;
use Illuminate\Support\Str;

class SnippetObserver
{

    public function creating(Snippet $snippet)
    {
        if(empty($snippet->slug)){
            foreach ($snippet->translations as $translation){
                $snippet->translateOrNew($translation->locale)->slug= Str::slug($translation->title);
            }
        }
    }

    public function updating(Snippet $snippet)
    {
        foreach ($snippet->translations as $translation){
            $snippet->translateOrNew($translation->locale)->slug= Str::slug($translation->title);
        }
    }

}
