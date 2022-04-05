@extends('blog.theme')
@section('title')
    {{ __('404.title') }}
@endsection

@section('404')
    <div class="flex items-center justify-center h-screen">
        <div class="px-40 py-20 bg-white rounded-md shadow-xl">
            <div class="flex flex-col items-center">

                <h1 class="font-bold text-blue-600 text-9xl">{{ __('404.404') }}</h1>

                <h6 class="mb-2 text-2xl font-bold text-center text-gray-800 md:text-3xl">
                    <span class="text-red-500">{{ __('404.oops') }}</span> {{ __('404.pageNotFound') }}
                </h6>

                <p class="mb-8 text-center text-gray-500 md:text-lg">
                    {{ __('404.thePageNotFound') }}
                </p>

                <a href="{{ route('home') }}" class="px-6 py-2 text-sm font-semibold text-blue-800 bg-blue-100">
                    {{ __('404.home') }}</a>
            </div>
        </div>
    </div>

@endsection
