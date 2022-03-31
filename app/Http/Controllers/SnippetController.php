<?php

namespace App\Http\Controllers;

use App\Models\Snippet;
use App\Models\SnippetTranslation;
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
        $snippetTranslation = SnippetTranslation::where('slug', $slug)->get();
        $snippetId = $snippetTranslation->pluck('snippet_id');
        $snippets = Snippet::where('id', $snippetId[0])->get();
        if(!empty($snippetTranslation->all())){
            $previous = Snippet::where('id','<', $snippetId)->max('id');
            $next = Snippet::where('id','>', $snippetId)->min('id');
            $previousSnippet = Snippet::where('id', $previous)->get();
            $nextSnippet = Snippet::where('id',$next)->get();
            return view('blog.include.snippet', compact('snippets', 'previousSnippet', 'nextSnippet'));
        }else{
            abort(404);
        }


    }

}
