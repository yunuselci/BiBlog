<?php

namespace App\Listeners;

use App\Events\SnippetCreatedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SnippetCreatedListener
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
     * @param  \App\Events\SnippetCreatedEvent  $event
     * @return void
     */
    public function handle(SnippetCreatedEvent $event)
    {
        //
    }
}
