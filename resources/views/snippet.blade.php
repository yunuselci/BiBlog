@extends('theme')
@section('title')
    Snippet Name | Web Development Blog
@endsection

@section('snippet')
    <div class=" text-center mb-8 px-8">
        <h1 class="font-bold text-3xl">&lt;script setup&gt; syntax in Vue 3</h1>
        <h2 class="text-center text-xl mt-2 font-bold mb-5">Reduce code and improve performance</h2>
        <p class="text-sm text-center">November 2021</p>

    </div>
    <div class="prose prose-indigo lg:prose-xl max-w-none">
        <div><p>"<a href="https://wp-cli.org" target="_blank" rel="nofollow noopener noreferrer">WP-CLI</a> is the command-line interface for WordPress. You can update plugins, configure multisite installs and much more, without using a web browser."</p>
            <p>The WP-CLI simplifies many repetitive processes during development and provides functionality which isn't available in the admin area.</p>
            <p>This is a small one-liner which I find myself using all the time. It allows me to update a website locally (including core WordPress, all plugins and translations) without even logging in, and get to testing the updates as quickly as possible.</p>
            <p>You must already have WP-CLI installed, either locally or globally. Open your terminal of choice and change directory to your WordPress install:</p>
            <div class="mx-auto max-w-5xl" data-language="bash">
                <pre class="shiki" style="background-color: #2e3440ff"><code><span class="line"><span style="color: #81A1C1">&lt;?</span><span style="color: #D8DEE9FF">php </span><span style="color: #81A1C1">echo</span><span style="color: #D8DEE9FF"> </span><span style="color: #ECEFF4">&quot;</span><span style="color: #A3BE8C">Hello World</span><span style="color: #ECEFF4">&quot;</span><span style="color: #81A1C1">;</span><span style="color: #D8DEE9FF"> </span><span style="color: #81A1C1">?&gt;</span></span></code></pre>
            </div>
            <p>Here is some example output from running the command:</p>


            <p>There are a number of options available for each of these commands. They can be seen here:</p>
            <ul>
                <li><a class="underline text-blue-700" href="https://developer.wordpress.org/cli/commands/core/update" target="_blank" rel="nofollow noopener noreferrer">wp core update</a></li>
                <li><a class="underline text-blue-700" href="https://developer.wordpress.org/cli/commands/plugin/update" target="_blank" rel="nofollow noopener noreferrer">wp plugin update</a></li>
                <li><a class="underline text-blue-700" href="https://developer.wordpress.org/cli/commands/language/core/update" target="_blank" rel="nofollow noopener noreferrer">wp core language update</a></li>
            </ul></div>
        <hr class="my-10 mx-auto max-w-5xl">

        <form class="max-w-5xl mb-14 mx-auto">
            <div class="text-white rounded-3xl bg-blue-600 lg:p-20 lg:flex lg:items-center">
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
                            class="bg-indigo-500 hover:bg-indigo-400 w-40 rounded-md w-20 ml-3">
                        Sign up
                    </button>
                </div>
            </div>

        </form>
    </div>
@endsection
