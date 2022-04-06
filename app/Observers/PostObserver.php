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
        foreach ($post->translations as $translationForIf) {
            if (
                $post->translateOrNew($translationForIf->locale)->isDirty('title')
                and
                $post->translateOrNew($translationForIf->locale)->isClean('slug')
            ) {
                foreach ($post->translations as $translation) {
                    $post->translateOrNew($translation->locale)->slug = Str::slug($translation->title);
                }
            }
        }
    }

}
