<?php

namespace App\Listeners;

use App\Events\PostUpdatedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PostUpdatedListener
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
     * @param  \App\Events\PostUpdatedEvent  $event
     * @return void
     */
    public function handle(PostUpdatedEvent $event)
    {
        foreach ($event->post->translations as $translation) {
            //Update an article on dev.to
            $response = Http::withHeaders([
                'api-key' => 'caD3qGk672DcZ1vsxy2LGRmP',
                'user-agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.96 Safari/537.36'
            ])->put('https://dev.to/api/articles/' . $articleId, [
                'article' => [
                    'title' => $event->post->translateOrNew($translation->locale)->title,
                    'published' => $event->post->translateOrNew($translation->locale)->published,
                    "body_markdown" => $event->post->translateOrNew($translation->locale)->description
                ]
            ]);
            log::info($response);
        }
    }
}
