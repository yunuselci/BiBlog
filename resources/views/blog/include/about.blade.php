@extends('blog.theme')
@section('title')
    {{ __('about.title') }}
@endsection

@section('about')
    <div class="container">
        @isset($abouts)
            @foreach($abouts as $about)
                <div class="mt-10 mb-10 text-center">
                    <h1 class="font-bold text-2xl"> {{ $about->title }} </h1>
                    <h2 class="pt-4 mb-4 mt-0 font-bold text-center text-xl"> {{ $about->subtitle }}
                    </h2>
                </div>
                <div class="markdown-body">
                    {!! $about->description !!}
                </div>
            @endforeach
        @endisset

    </div>

@endsection
