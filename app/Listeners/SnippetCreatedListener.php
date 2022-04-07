<?php

namespace App\Listeners;

use App\Events\SnippetCreatedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Http;

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
        foreach ($event->snippet->translations as $translation) {
            //Create an article on dev.to
            $response = Http::withHeaders([
                'api-key' => 'caD3qGk672DcZ1vsxy2LGRmP',
                'user-agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.96 Safari/537.36'
            ])->post('https://dev.to/api/articles', [
                'article' => [
                    'title' => $event->snippet->translateOrNew($translation->locale)->title,
                    'published' => $event->snippet->translateOrNew($translation->locale)->published,
                    "body_markdown" => $event->snippet->translateOrNew($translation->locale)->description
                ]
            ]);
            $event->snippet->translateOrNew($translation->locale)->dev_to_article_id = $response['id'];
        }
    }
}
