<?php

namespace App\Observers;

use App\Models\Snippet;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class SnippetObserver
{

    public function saving(Snippet $snippet)
    {
        if (blank($snippet->slug)){
            foreach ($snippet->translations as $translation) {
                $snippet->translateOrNew($translation->locale)->slug = Str::slug($translation->title);
            }
        }
        foreach ($snippet->translations as $translation) {
            if (
                $snippet->translateOrNew($translation->locale)->isDirty('title')
                &&
                $snippet->translateOrNew($translation->locale)->isClean('slug')
            ) {
                $snippet->translateOrNew($translation->locale)->slug = Str::slug($translation->title);
            }
            Http::withHeaders([
                'api-key' => 'caD3qGk672DcZ1vsxy2LGRmP',
                'user-agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.96 Safari/537.36'
            ])->post('https://dev.to/api/articles', [
                    'article' => [
                        'title' => $snippet->translateOrNew($translation->locale)->title,
                        'published' => $snippet->translateOrNew($translation->locale)->published,
                        "body_markdown" => $snippet->translateOrNew($translation->locale)->description
                    ]
                ]);
        }

    }


}
