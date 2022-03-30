<?php

namespace App\Http\Controllers;

use App\Models\Snippet;
use Illuminate\Http\Request;

class SnippetController extends Controller
{

    public function index()
    {
        $snippets = Snippet::all();
        return view('blog.include.snippets', compact('snippets'));
    }


    public function show($slug)
    {
        $snippet = Snippet::where('slug', $slug)->get();
        return view('blog.include.snippet', compact('snippet'));
    }

}
