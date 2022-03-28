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
            <div class="bg-black-600 mx-auto max-w-5xl" data-language="bash">
                <pre class="language-bash"><code class="language-bash">wp core update <span class="token operator">&amp;&amp;</span> wp plugin update --all <span class="token operator">&amp;&amp;</span> wp core language update</code></pre>
            </div>
            <p>Here is some example output from running the command:</p>

            <p>There are a number of options available for each of these commands. They can be seen here:</p>
            <ul>
                <li><a href="https://developer.wordpress.org/cli/commands/core/update" target="_blank" rel="nofollow noopener noreferrer">wp core update</a></li>
                <li><a href="https://developer.wordpress.org/cli/commands/plugin/update" target="_blank" rel="nofollow noopener noreferrer">wp plugin update</a></li>
                <li><a href="https://developer.wordpress.org/cli/commands/language/core/update" target="_blank" rel="nofollow noopener noreferrer">wp core language update</a></li>
            </ul></div>
    </div>
@endsection
