@extends('theme')
@section('title')
    About | Web Development Blog
@endsection

@section('about')
    <div class="container">
        <div class="mt-10 mb-10 text-center">
            <h1 class="font-bold text-2xl"> About </h1>
            <h2 class="pt-4 mb-4 mt-0 font-bold text-center text-xl"> A bit about me and what I do
            </h2>
        </div>
        <div class="prose prose-indigo lg:prose-xl max-w-none">
            <div>
                <p>Hi! I am a Web Developer based in Belfast, Northern Ireland.</p>
                <p>The majority of my daily work focuses on back-end development using PHP. I have extensive
                    experience with
                    WordPress, Laravel, multiple front-end frameworks and APIs.</p>
                <p>I started this blog to document interesting issues and solutions to them, with the hope that
                    it
                    will also
                    help others.</p>
                <h2>Website tech:</h2>
                <ul>
                    <li>Built with <a href="https://reactjs.org">React</a> using <a
                            class="underline text-blue-700"
                            href="https://www.gatsbyjs.org">Gatsby</a>.
                    </li>
                    <li><a href="https://tailwindcss.com">Tailwind CSS</a></li>
                    <li>Netlify for hosting and form-handling</li>
                    <li>Newsletter handled with Mailchimp</li>
                </ul>
            </div>
        </div>
        <hr class="my-10 mx-auto max-w-5xl">

        <form class="max-w-5xl mx-auto">
            <div class="text-white p-4 rounded-3xl bg-blue-600 lg:p-16 lg:flex lg:items-center">
                <div class="lg:w-0 lg:flex-1 text-white">
                    <h2 class="text-3xl tracking-tight">Sign up for my newsletter</h2>
                    <p class="mt-4 max-w-3xl text-lg text-white">Get notified when I post a new article.
                        Unsubscribe
                        at any time, and I promise not to send any spam :)</p>

                </div>
                <div class="mt-12 sm:w-full sm:max-w-md lg:mt-0 lg:ml-8 md:flex"><label for="email"
                                                                                        class="sr-only">Email
                        address</label><input id="email" name="EMAIL" type="email" autocomplete="email"
                                              required=""
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
