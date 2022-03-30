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
        $article = Post::where('slug', $slug)->get();
        return view('blog.include.article', compact('article'));
    }
}
