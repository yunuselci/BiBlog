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
        $snippets = Snippet::where('slug', $slug)->get();
        if(!empty($snippets->all())){
            $previous = Snippet::where('id','<', $snippets->pluck('id'))->max('id');
            $next = Snippet::where('id','>', $snippets->pluck('id'))->min('id');
            $previousSnippet = Snippet::where('id', $previous)->get();
            $nextSnippet = Snippet::where('id',$next)->get();

            return view('blog.include.snippet', compact('snippets', 'previousSnippet', 'nextSnippet'));
        }else{
            abort(404);
        }


    }

}
