@extends('blog.theme')
@section('title')
    @isset($snippets)
        @foreach($snippets as $snippet)
            {{ $snippet->title }} | {{ __('snippet.title') }}
        @endforeach
    @endisset
@endsection
@section('head')
    <link rel="alternate" hreflang="tr" href="{{ LaravelLocalization::getLocalizedURL('tr', null, [] ,true) }}"/>
    <link rel="alternate" hreflang="en" href="{{ LaravelLocalization::getLocalizedURL('en', null, [] ,true) }}"/>
@endsection

@section('snippet')
    <div class="container mt-10">
        @isset($snippets)
            @foreach($snippets as $snippet)
                @if($snippet->published)
                    <div class="text-center mb-8 ">
                        <h1 class="font-bold text-2xl">{{ $snippet->title }}</h1>
                        <h2 class="text-center text-xl mt-2 font-bold mb-5">{{ $snippet->subtitle }}</h2>
                        <p class="text-sm text-center">{{ $snippet->created_at->toFormattedDateString() }}</p>

                    </div>
                    <div class="markdown-body">
                        <div>
                            {!! $snippet->description !!}
                        </div>
                        @isset($snippet->link)
                            <a href="{{ $snippet->link }}">
                                <button
                                    class="rounded-full text-white font-bold bg-blue-500 hover:bg-blue-700 py-3 px-6 mt-4">
                                    {{ __('snippet.github') }}
                                </button>
                            </a>
                        @endisset
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

                    </div>
                @else
                    <div class=" max-w-5xl mx-auto flex items-center justify-center h-screen">
                        <div class="px-40 py-20 bg-white rounded-md shadow-xl">
                            <div class="flex flex-col items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" class="text-blue-600" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>

                                <h6 class="mb-2 text-2xl font-bold text-center text-gray-800 md:text-3xl">
                                    <span
                                        class="text-red-500">{{ __('snippetPublished.oops') }}</span> {{ __('snippetPublished.snippetNotPublished') }}
                                </h6>

                                <p class="mb-8 text-center text-gray-500 md:text-lg">
                                    {{ __('snippetPublished.editing') }}
                                </p>

                                <a href="{{ route('home') }}"
                                   class="px-6 py-2 text-sm font-semibold text-blue-800 bg-blue-100">
                                    {{ __('snippetPublished.home') }}</a>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        @endisset

    </div>
@endsection
