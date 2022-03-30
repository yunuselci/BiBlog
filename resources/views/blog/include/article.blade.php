@extends('blog.theme')
@section('title')
    Article Name | Web Development Blog
@endsection

@section('article')

    <div class="container mt-10">
        @isset($article)
            @foreach($article as $a)
                <div class="mb-8">
                    <img class="shadow-lg rounded-xl min-w-full max-h-80 border-none"
                         src="{{ asset('storage/'.$a->image) }}" alt="{{ $a->title }}">
                </div>
                <div class="text-center mb-8 ">
                    <h1 class="font-bold text-2xl">{{ $a->title }}</h1>
                    <h2 class="text-center text-xl mt-2 font-bold mb-5">{{ $a->subtitle }}</h2>
                    <p class="text-sm text-center">{{ $a->created_at }}</p>

                </div>
                <div class="markdown-body">
                    <div>
                        {!! $a->description !!}
                    </div>
                    <a href="#">
                        <button class="rounded-full text-white font-bold bg-blue-500 hover:bg-blue-700 py-3 px-6 mt-4">
                            See On Github
                        </button>
                    </a>
                    <hr class="max-w-5xl mx-auto">
                    <div class="flex flex-wrap sm:flex-no-wrap justify-between"><a class="m-2"
                                                                                   href="#">«
                            Adding a Markdown editor to Laravel</a><a class="m-2" href="#">&lt;script
                            setup&gt; syntax in Vue 3 »</a></div>

                </div>
            @endforeach
        @endisset


    </div>



@endsection
