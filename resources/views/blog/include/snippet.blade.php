@extends('blog.theme')
@section('title')
    Snippet Name | Web Development Blog
@endsection

@section('snippet')
    <div class="container mt-10">
        @isset($snippets)
            @foreach($snippets as $snippet)

                <div class="text-center mb-8 ">
                    <h1 class="font-bold text-2xl">{{ $snippet->title }}</h1>
                    <h2 class="text-center text-xl mt-2 font-bold mb-5">{{ $snippet->subtitle }}</h2>
                    <p class="text-sm text-center">{{ $snippet->created_at }}</p>

                </div>
                <div class="markdown-body">
                    <div>
                        {!! $snippet->description !!}
                    </div>
                    <a href="#">
                        <button class="rounded-full text-white font-bold bg-blue-500 hover:bg-blue-700 py-3 px-6 mt-4">
                            See On Github
                        </button>
                    </a>
                    <hr class="my-10 mx-auto max-w-5xl">
                    <div class="flex flex-wrap sm:flex-no-wrap justify-between">
                        @isset($previousSnippet)
                            @foreach($previousSnippet as $prev)
                                <a class="m-2"
                                   href="{{ route('article', $prev->slug) }}">«
                                    {{ $prev->title }}</a>
                            @endforeach
                        @endisset
                        @isset($nextSnippet)
                            @foreach($nextSnippet as $next)
                                <a class="m-2" href="{{ route('article', $next->slug) }}">{{ $next->title }} »</a>
                            @endforeach
                        @endisset
                    </div>
                    @endforeach
                    @endisset
                </div>

    </div>
@endsection
