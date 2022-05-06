<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Translations\PostTranslation;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    public function index()
    {
        $this->setSeo(config('app.name'), __('Güven Atbakan\'s personal blog page.'));

        $posts = Post::query()
            ->isPublished()
            ->latest()
            ->get();
        //TODO: Paginate ?.

        return view('posts.index')->with(['posts' => $posts]);
    }

    public function show($slug)
    {
        $post = Post::query()
            ->whereTranslation('slug', $slug)
            ->isPublished()
            ->firstOrFail();

        $this->setSeo($post->title, $post->short_description);
        $this->incrementViewCount($post);

        //TODO: Aynı dil üzerindeki makalelerin gösterilmesi lazım.
        $latestPosts = Post::query()
            ->where('id', '!=', $post->id)
            ->isPublished()
            ->limit(3)
            ->latest()
            ->get();

        return view('posts.show')
            ->with([
                'post' => $post,
                'latestPosts' => $latestPosts,
            ]);
    }

    private function incrementViewCount(Post $post)
    {
        $key = 'post_' . $post->id;
        if (!Session::has($key)) {
            $post->increment('view_count');

            Session::put($key, 1);
        }
    }
}
