<?php

namespace App\Observers;

use App\Models\Post;
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
        }
    }

}
