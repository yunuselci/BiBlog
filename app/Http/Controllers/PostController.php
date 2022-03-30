<?php

namespace App\Http\Controllers;

use App\Models\Post;
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
        $posts = Post::where('slug', $slug)->get();

        $previous = Post::where('id','<', $posts->pluck('id'))->max('id');
        $next = Post::where('id','>', $posts->pluck('id'))->min('id');
        $previousPost = Post::where('id', $previous)->get();
        $nextPost = Post::where('id',$next)->get();
        return view('blog.include.article', compact('posts', 'previousPost', 'nextPost'));
    }
}
