<?php

namespace App\Observers;

use App\Models\Snippet;
use Illuminate\Support\Str;

class SnippetObserver
{

    public function saving(Snippet $snippet)
    {
        foreach ($snippet->translations as $translation) {
            $snippet->translateOrNew($translation->locale)->slug = Str::slug($translation->title);
        }
    }

}
