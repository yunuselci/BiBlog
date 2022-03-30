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

    <form class="my-10 max-w-5xl mb-14 mx-auto">
        <div class="text-white p-4 rounded-3xl bg-blue-600 lg:p-16 lg:flex lg:items-center">
            <div class="lg:w-0 lg:flex-1 text-white">
                <h2 class="text-3xl tracking-tight">Sign up for my newsletter</h2>
                <p class="mt-4 max-w-3xl text-lg text-white">Get notified when I post a new article. Unsubscribe
                    at any time, and I promise not to send any spam :)</p>

            </div>
            <div class="mt-12 sm:w-full sm:max-w-md lg:mt-0 lg:ml-8 md:flex"><label for="email" class="sr-only">Email
                    address</label><input id="email" name="EMAIL" type="email" autocomplete="email" required=""
                                          class="w-full border-white text-black px-5 py-3 placeholder-gray-500 focus:outline-none rounded-md"
                                          placeholder="Your email">
                <button type="submit"
                        class="mt-3 w-full flex items-center justify-center px-5 py-3 border border-transparent
                            text-base font-medium rounded-md text-white bg-indigo-500 hover:bg-indigo-400
                            sm:mt-0 sm:ml-3 sm:w-auto sm:flex-shrink-0">
                    Sign up
                </button>
            </div>
        </div>

    </form>
    </div>
@endsection
