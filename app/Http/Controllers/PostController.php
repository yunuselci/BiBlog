<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostTranslation;
use App\Models\Snippet;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::all();
        return view('blog.include.articles', compact('posts'));
    }


    public function show($slug)
    {
        $postTranslation = PostTranslation::where('slug', $slug)->get();
        $postId = $postTranslation->pluck('post_id');
        $posts = Post::where('id', $postId[0])->get();
        if(!empty($postTranslation->all())){
            $previous = Post::where('id','<', $postId)->max('id');
            $next = Post::where('id','>', $postId)->min('id');
            $previousPost = Post::where('id', $previous)->get();
            $nextPost = Post::where('id',$next)->get();
            return view('blog.include.article', compact('posts', 'previousPost', 'nextPost'));
        }else{
            abort(404);
        }

    }
}
