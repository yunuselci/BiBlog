<?php

namespace App\Listeners;

use App\Events\PostUpdatedEvent;
use App\Models\User;
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
    public function handle(PostUpdatedEvent $event, ?bool $publish_to_dev_to= null)
    {
        foreach ($event->post->translations as $translation) {
            if(blank($publish_to_dev_to)){
                $publish_to_dev_to = $event->post->translateOrNew($translation->locale)->publish_to_dev_to;
            }
            $secret = User::pluck('dev_to_secret')[0];
            //Update an article on dev.to
            Http::withHeaders([
                'api-key' => $secret,
                'user-agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.96 Safari/537.36'
            ])->put('https://dev.to/api/articles/' . $event->post->translateOrNew($translation->locale)->dev_to_article_id, [
                'article' => [
                    'title' => $event->post->translateOrNew($translation->locale)->title,
                    'published' => $event->post->translateOrNew($translation->locale)->$publish_to_dev_to,
                    "body_markdown" => $event->post->translateOrNew($translation->locale)->description
                ]
            ]);
        }
    }
}
