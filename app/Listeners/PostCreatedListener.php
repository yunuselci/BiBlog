<?php

namespace App\Listeners;

use App\Events\PostCreatedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class PostCreatedListener
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
     * @param  \App\Events\PostCreatedEvent  $event
     * @return void
     */
    public function handle(PostCreatedEvent $event)
    {
        foreach ($event->post->translations as $translation) {
            //Create an article on dev.to
            Http::withHeaders([
                'api-key' => 'caD3qGk672DcZ1vsxy2LGRmP',
                'user-agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.96 Safari/537.36'
            ])->post('https://dev.to/api/articles', [
                'article' => [
                    'title' => $event->post->translateOrNew($translation->locale)->title,
                    'published' => $event->post->translateOrNew($translation->locale)->published,
                    "body_markdown" => $event->post->translateOrNew($translation->locale)->description
                ]
            ]);
        }
    }
}
