<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{

    public function index()
    {
        $abouts = About::all();
        return view('blog.include.about', compact('abouts'));
    }


}
