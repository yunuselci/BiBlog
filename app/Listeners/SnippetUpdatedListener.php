<?php

namespace App\Listeners;

use App\Events\SnippetUpdatedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SnippetUpdatedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\SnippetUpdatedEvent  $event
     * @return void
     */
    public function handle(SnippetUpdatedEvent $event)
    {
        //
    }
}
