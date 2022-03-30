@extends('blog.theme')
@section('title')
    Snippet Name | Web Development Blog
@endsection

@section('snippet')
    <div class="container mt-10">
    @isset($snippet)
        @foreach($snippet as $s)

    <div class="text-center mb-8 ">
        <h1 class="font-bold text-2xl">{{ $s->title }}</h1>
        <h2 class="text-center text-xl mt-2 font-bold mb-5">{{ $s->subtitle }}</h2>
        <p class="text-sm text-center">{{ $s->created_at }}</p>

    </div>
    <div class="markdown-body">
        <div>
            {!! $s->description !!}
        </div>
        <a href="#">
            <button class="rounded-full text-white font-bold bg-blue-500 hover:bg-blue-700 py-3 px-6 mt-4">
                See On Github
            </button>
        </a>
        <hr class="my-10 mx-auto max-w-5xl">
        <div class="flex flex-wrap sm:flex-no-wrap justify-between"><a class="m-2"
                                                                       href="#">«
                Adding a Markdown editor to Laravel</a><a class="m-2" href="#">&lt;script
                setup&gt; syntax in Vue 3 »</a></div>
        @endforeach
    @endisset
    </div>

    </div>
@endsection
