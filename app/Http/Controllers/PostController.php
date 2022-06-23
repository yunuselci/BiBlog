<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    public function index()
    {
        $this->setSeo(config('app.name'), __('Güven Atbakan\'s personal blog page.'));

        $posts = Post::query()
            ->isPublished()
            ->latest()
            ->get()
        ;
        // TODO: Paginate ?.

        return view('posts.index')->with(['posts' => $posts]);
    }

    public function show($slug)
    {
        /** @var Post $post */
        $post = Post::query()
            ->whereRelation('translations', 'slug', $slug)
            ->isPublished()
            ->firstOrFail()
        ;

        $this->setSeo($post->title, $post->short_description);
        $this->incrementViewCount($post);

        $latestPosts = Post::query()
            ->where('id', '!=', $post->id)
            ->whereRelation('translations', 'locale', $post->translations->first()->locale)
            ->isPublished()
            ->limit(3)
            ->latest()
            ->get()
        ;

        return view('posts.show')
            ->with([
                'post' => $post,
                'latestPosts' => $latestPosts,
            ])
        ;
    }

    private function incrementViewCount(Post $post): void
    {
        $key = 'post_'.$post->id;
        if (!Session::has($key)) {
            $post->increment('view_count');

            Session::put($key, 1);
        }
    }
}
