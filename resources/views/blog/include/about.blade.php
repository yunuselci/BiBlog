@extends('blog.theme')
@section('title')
    {{ __('about.title') }}
@endsection

@section('about')
    <div class="container">
        @isset($abouts)
            @foreach($abouts as $about)
                @if($about->published)
                <div class="mt-10 mb-10 text-center">
                    <h1 class="font-bold text-2xl"> {{ $about->title }} </h1>
                    <h2 class="pt-4 mb-4 mt-0 font-bold text-center text-xl"> {{ $about->subtitle }}
                    </h2>
                </div>
                <div class="markdown-body">
                    {!! $about->description !!}
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
                                        class="text-red-500">{{ __('aboutPublished.oops') }}</span> {{ __('aboutPublished.aboutNotPublished') }}
                                </h6>

                                <p class="mb-8 text-center text-gray-500 md:text-lg">
                                    {{ __('aboutPublished.editing') }}
                                </p>

                                <a href="{{ route('home') }}"
                                   class="px-6 py-2 text-sm font-semibold text-blue-800 bg-blue-100">
                                    {{ __('aboutPublished.home') }}</a>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        @endisset

    </div>

@endsection
