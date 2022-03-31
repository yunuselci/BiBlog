@extends('blog.theme')
@section('title')
    @isset($posts)
        @foreach($posts as $post)
            {{ $post->title }} | Web Development Blog
        @endforeach
    @endisset

@endsection

@section('article')

    <div class="container mt-10">
        @isset($posts)
            @foreach($posts as $post)
                <div class="mb-8">
                    <img class="shadow-lg rounded-xl min-w-full max-h-80 border-none"
                         src="{{ asset('storage/'.$post->image) }}" alt="{{ $post->title }}">
                </div>
                <div class="text-center mb-8 ">
                    <h1 class="font-bold text-2xl">{{ $post->title }}</h1>
                    <h2 class="text-center text-xl mt-2 font-bold mb-5">{{ $post->subtitle }}</h2>
                    <p class="text-sm text-center">{{ $post->created_at->toFormattedDateString() }}</p>


                </div>
                <div class="markdown-body">
                    <div>
                        {!! $post->description !!}
                    </div>
                    @isset($post->link)
                        <a href="{{ $post->link }}">
                            <button
                                class="rounded-full text-white font-bold bg-blue-500 hover:bg-blue-700 py-3 px-6 mt-4">
                                See On Github
                            </button>
                        </a>
                    @endisset
                    <hr class="max-w-5xl mx-auto">


                    <div class="flex flex-wrap sm:flex-no-wrap justify-between">
                        @isset($previousPost)
                            @foreach($previousPost as $prev)
                                <a class="m-2"
                                   href="{{ route('article', $prev->slug) }}">«
                                    {{ $prev->title }}</a>
                            @endforeach
                        @endisset
                        @isset($nextPost)
                            @foreach($nextPost as $next)
                                <a class="m-2" href="{{ route('article', $next->slug) }}">{{ $next->title }} »</a>
                            @endforeach
                        @endisset

                    </div>

                </div>
            @endforeach
        @endisset


    </div>



@endsection
