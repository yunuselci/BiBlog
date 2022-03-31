@extends('blog.theme')
@section('title')
    {{ __('home.title') }}
@endsection


@section('home')


    <div class="mt-10 mb-10 text-center">

        <h2 class="font-bold text-2xl"> {{ __('home.latestArticles') }} </h2>

    </div>
    <div class="container mb-14">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">

            <!-- Home Article item -->
            @isset($posts)
                @foreach($posts as $post)
            <div class="flex flex-col rounded-xl shadow-lg overflow-hidden">
                <div class="flex-shrink-0">
                    <img class="object-cover h-48 w-full"
                         decoding="async" src="{{ asset('storage/'. $post->image )  }}"
                         alt="{{ $post->title }}" style="object-fit: cover; opacity: 1;">
                </div>
                <div class="flex-1 bg-white p-6 flex flex-col justify-between">
                    <a href="{{ route('article', $post->slug)  }}">
                        <h3 class="text-blue-600 font-bold text-xl">{{ $post->title }}</h3>
                        <p class="text-gray-500 mt-3"> {{ $post->subtitle }} </p>
                    </a>
                </div>
            </div>
                @endforeach
            @endisset
            <!-- Home Article item end -->
        </div>
        <div class="mt-10 mb-10 text-center">

            <h2 class="font-bold text-2xl">{{ __('home.latestSnippets') }}</h2>

        </div>
        <!-- Home Snippet item -->
        @isset($snippets)
            @foreach($snippets as $snippet)
        <div class="container max-w-5xl mx-auto mb-14">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <div class="flex flex-col rounded-xl shadow-lg overflow-hidden">
                    <div class="flex-1 bg-white p-6 flex flex-col justify-between">
                        <a href="{{ route('snippet',  $snippet->slug) }}">
                            <h3 class="text-blue-600 font-bold text-xl text-center">{{ $snippet->title }}</h3>
                            <p class="text-gray-500 mt-3 text-center">{{ $snippet->subtitle }}</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
            @endforeach
        @endisset
        <!-- Home Snippet item end -->

    </div>


@endsection
