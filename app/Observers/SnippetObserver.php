<?php

namespace App\Observers;

use App\Events\SnippetUpdatedEvent;
use App\Models\Snippet;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class SnippetObserver
{

    public function saving(Snippet $snippet)
    {
        if (blank($snippet->slug)){
            foreach ($snippet->translations as $translation) {
                $snippet->translateOrNew($translation->locale)->slug = Str::slug($translation->title);
            }
        }
        foreach ($snippet->translations as $translation) {
            if (
                $snippet->translateOrNew($translation->locale)->isDirty('title')
                &&
                $snippet->translateOrNew($translation->locale)->isClean('slug')
            ) {
                $snippet->translateOrNew($translation->locale)->slug = Str::slug($translation->title);
            }
        }

    }

    /**
     * Handle the Snippet "deleted" event.
     *
     * @param Snippet $snippet
     * @return void
     */
    public function deleted(Snippet $snippet)
    {
        event(new SnippetUpdatedEvent($snippet,false));
    }

}
