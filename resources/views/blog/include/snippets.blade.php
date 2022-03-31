@extends('blog.theme')
@section('title')
    {{__('snippets.title')}}
@endsection

@section('snippets')
    <div class="mt-10 mb-10 text-center">

        <h2 class="font-bold text-2xl"> {{__('snippets.snippets')}} </h2>

    </div>

    <div class="container mb-14">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            @isset($snippets)
                @foreach($snippets as $snippet)
                    <div class="flex flex-col rounded-xl shadow-lg overflow-hidden">
                        <div class="flex-1 bg-white p-6 flex flex-col justify-between">
                            <a href="{{ route('snippet', $snippet->slug) }}">
                                <h3 class="text-blue-600 font-bold text-xl text-center">{{ $snippet->title }}</h3>
                                <p class="text-gray-500 mt-3 text-center">{{ $snippet->subtitle }}</p>
                            </a>
                        </div>
                    </div>
                @endforeach
            @endisset
        </div>
    </div>
@endsection
