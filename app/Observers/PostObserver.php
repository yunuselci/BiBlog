<?php

namespace App\Observers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class PostObserver
{

    private function createPostOnDevTo(Model $post)
    {
        $secret = User::pluck('dev_to_secret')[0];
        if (blank($post->translations)) {
            $response = Http::withHeaders([
                'api-key' => $secret,
                'user-agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.96 Safari/537.36'
            ])->post('https://dev.to/api/articles', [
                'article' => [
                    'title' => $post->title,
                    'published' => $post->publish_to_dev_to,
                    'body_markdown' => $post->description
                ]
            ]);
            $post->dev_to_article_id = $response['id'];
            $post->save();
        } else {
            foreach ($post->translations as $translation) {
                //Create an article on dev.to

                $response = Http::withHeaders([
                    'api-key' => $secret,
                    'user-agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.96 Safari/537.36'
                ])->post('https://dev.to/api/articles', [
                    'article' => [
                        'title' => $post->translateOrNew($translation->locale)->title,
                        'published' => $post->translateOrNew($translation->locale)->publish_to_dev_to,
                        'body_markdown' => $post->translateOrNew($translation->locale)->description
                    ]
                ]);
                $post->translateOrNew($translation->locale)->dev_to_article_id = $response['id'];
                $post->save();
            }
        }
    }

    private function updatePostOnDevTo(Model $post, $publish_to_dev_to = NULL)
    {
        logger()->info($publish_to_dev_to);
        foreach ($post->translations as $translation) {
            if (is_null($publish_to_dev_to)) {
                $publish_to_dev_to = $post->translateOrNew($translation->locale)->publish_to_dev_to;
            }
            $secret = User::pluck('dev_to_secret')[0];
            //Update an article on dev.to

            $response = Http::withHeaders([
                'api-key' => $secret,
                'user-agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.96 Safari/537.36'
            ])->put('https://dev.to/api/articles/' . $post->translateOrNew($translation->locale)->dev_to_article_id, [
                'article' => [
                    'title' => $post->translateOrNew($translation->locale)->title,
                    'published' => $publish_to_dev_to,
                    "body_markdown" => $post->translateOrNew($translation->locale)->description
                ]
            ]);
            logger()->info($response);

        }
    }

    /**
     * @param Post $post
     * @return void
     */
    public function saving(Post $post)
    {
        if (blank($post->slug)) {
            foreach ($post->translations as $translation) {
                $post->translateOrNew($translation->locale)->slug = Str::slug($translation->title);
            }
        }
        foreach ($post->translations as $translation) {
            if (
                $post->translateOrNew($translation->locale)->isDirty('title') &&
                $post->translateOrNew($translation->locale)->isClean('slug')
            ) {
                $post->translateOrNew($translation->locale)->slug = Str::slug($translation->title);
            }
        }

    }

    /**
     * Handle the Post "created" event.
     *
     * @param Post $post
     * @return void
     */
    public function created(Post $post)
    {
        $this->createPostOnDevTo($post);
    }

    /**
     * Handle the Post "updated" event.
     *
     * @param Post $post
     * @return void
     */
    public function updated(Post $post)
    {
        logger()->info("sa");
        foreach ($post->translations as $translation) {
            if (blank($post->translateOrNew($translation->locale)->dev_to_article_id)) {
                $this->createPostOnDevTo(($post->translateOrNew($translation->locale)));
            }
        }
        $this->updatePostOnDevTo($post);
    }

    /**
     * Handle the Post "deleted" event.
     *
     * @param Post $post
     * @return void
     */
    public function deleted(Post $post)
    {
        $this->updatePostOnDevTo($post, false);
    }
}
