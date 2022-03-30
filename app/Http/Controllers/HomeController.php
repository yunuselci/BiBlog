<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Snippet;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->take(4)->get();
        $snippets = Snippet::latest()->take(4)->get();
        return view('blog.include.home', compact('posts', 'snippets'));
    }
}
