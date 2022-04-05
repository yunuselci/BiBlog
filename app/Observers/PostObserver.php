<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Str;

class PostObserver
{
    public function saving(Post $post)
    {
        foreach ($post->translations as $translation) {
            $post->translateOrNew($translation->locale)->slug = Str::slug($translation->title);
        }
    }

}
