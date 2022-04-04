<?php

namespace App\Observers;

use App\Models\Snippet;
use Illuminate\Support\Str;

class SnippetObserver
{
    /**
     * Handle the Snippet "created" event.
     *
     * @param  \App\Models\Snippet  $snippet
     * @return void
     */
    public function created(Snippet $snippet)
    {
        if(empty($snippet->slug)){
            $snippet->slug = Str::slug($snippet->title);
        }
    }

    /**
     * Handle the Snippet "updated" event.
     *
     * @param  \App\Models\Snippet  $snippet
     * @return void
     */
    public function updated(Snippet $snippet)
    {
        //
    }

    /**
     * Handle the Snippet "deleted" event.
     *
     * @param  \App\Models\Snippet  $snippet
     * @return void
     */
    public function deleted(Snippet $snippet)
    {
        //
    }

    /**
     * Handle the Snippet "restored" event.
     *
     * @param  \App\Models\Snippet  $snippet
     * @return void
     */
    public function restored(Snippet $snippet)
    {
        //
    }

    /**
     * Handle the Snippet "force deleted" event.
     *
     * @param  \App\Models\Snippet  $snippet
     * @return void
     */
    public function forceDeleted(Snippet $snippet)
    {
        //
    }
}
