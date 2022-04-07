<?php

namespace App\Listeners;

use App\Events\SnippetUpdatedEvent;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Http;

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
     * @param \App\Events\SnippetUpdatedEvent $event
     * @return void
     */
    public function handle(SnippetUpdatedEvent $event, ?bool $publish_to_dev_to = null)
    {
        foreach ($event->snippet->translations as $translation) {
            if (is_null($publish_to_dev_to)) {
                $publish_to_dev_to = $event->snippet->translateOrNew($translation->locale)->publish_to_dev_to;
            }
            $secret = User::pluck('dev_to_secret')[0];
            //Update an article on dev.to
            Http::withHeaders([
                'api-key' => $secret,
                'user-agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.96 Safari/537.36'
            ])->put('https://dev.to/api/articles/' . $event->snippet->translateOrNew($translation->locale)->dev_to_article_id, [
                'article' => [
                    'title' => $event->snippet->translateOrNew($translation->locale)->title,
                    'published' => $publish_to_dev_to,
                    "body_markdown" => $event->snippet->translateOrNew($translation->locale)->description
                ]
            ]);
        }
    }
}
