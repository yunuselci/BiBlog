<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class PostObserver
{
    public function saving(Post $post)
    {
        if (blank($post->slug)) {
            foreach ($post->translations as $translation) {
                $post->translateOrNew($translation->locale)->slug = Str::slug($translation->title);
            }
        }
        foreach ($post->translations as $translation) {
            if (
                $post->translateOrNew($translation->locale)->isDirty('title')
                &&
                $post->translateOrNew($translation->locale)->isClean('slug')
            ) {
                $post->translateOrNew($translation->locale)->slug = Str::slug($translation->title);
            }
            //Create an article on dev.to
/*
                Http::withHeaders([
                    'api-key' => 'caD3qGk672DcZ1vsxy2LGRmP',
                    'user-agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.96 Safari/537.36'
                ])->post('https://dev.to/api/articles', [
                    'article' => [
                        'title' => $post->translateOrNew($translation->locale)->title,
                        'published' => $post->translateOrNew($translation->locale)->published,
                        "body_markdown" => $post->translateOrNew($translation->locale)->description
                    ]
                ]);
*/
            /*
            //Update an article on dev.to

                Http::withHeaders([
                    'api-key' => 'caD3qGk672DcZ1vsxy2LGRmP',
                    'user-agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.96 Safari/537.36'
                ])->put('https://dev.to/api/articles/'.$articleId, [
                    'article' => [
                        'title' => $post->translateOrNew($translation->locale)->title,
                        'published' => $post->translateOrNew($translation->locale)->published,
                        "body_markdown" => $post->translateOrNew($translation->locale)->description
                    ]
                ]);
                log::info($response);*/

        }

    }

}
