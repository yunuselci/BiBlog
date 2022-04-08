<?php

namespace App\Listeners;

use App\Events\PostCreatedEvent;
use App\Models\User;
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
     * @param \App\Events\PostCreatedEvent $event
     * @return void
     */
    public function handle(PostCreatedEvent $event)
    {
        $secret = User::pluck('dev_to_secret')[0];
        if (blank($event->post->translations)) {
            $response = Http::withHeaders([
                'api-key' => $secret,
                'user-agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.96 Safari/537.36'
            ])->post('https://dev.to/api/articles', [
                'article' => [
                    'title' => $event->post->title,
                    'published' => $event->post->publish_to_dev_to,
                    'body_markdown' => $event->post->description
                ]
            ]);
            $event->post->dev_to_article_id = $response['id'];
            $event->post->save();
        } else {
            foreach ($event->post->translations as $translation) {
                //Create an article on dev.to

                $response = Http::withHeaders([
                    'api-key' => $secret,
                    'user-agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.96 Safari/537.36'
                ])->post('https://dev.to/api/articles', [
                    'article' => [
                        'title' => $event->post->translateOrNew($translation->locale)->title,
                        'published' => $event->post->translateOrNew($translation->locale)->publish_to_dev_to,
                        'body_markdown' => $event->post->translateOrNew($translation->locale)->description
                    ]
                ]);
                $event->post->translateOrNew($translation->locale)->dev_to_article_id = $response['id'];
                $event->post->save();
            }
        }

    }
}
