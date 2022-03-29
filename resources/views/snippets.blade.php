@extends('theme')
@section('title')
    Snippets | Web Development Blog
@endsection

@section('snippets')
    <div class="mt-10 mb-10 text-center">

        <h2 class="font-bold text-2xl"> Snippets </h2>

    </div>

    <div class="container mb-14">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <div class="flex flex-col rounded-xl shadow-lg overflow-hidden">
                <div class="flex-1 bg-white p-6 flex flex-col justify-between">
                    <a href="/snippet">
                        <h3 class="text-blue-600 font-bold text-xl text-center">syntax in Vue 3</h3>
                        <p class="text-gray-500 mt-3 text-center">Reduce code and improve performance</p>
                    </a>
                </div>
            </div>
            <div class="flex flex-col rounded-xl shadow-lg overflow-hidden">
                <div class="flex-1 bg-white p-6 flex flex-col justify-between">
                    <a href="">
                        <h3 class="text-blue-600 font-bold text-xl text-center">High CPU usage with Docker on M1
                            Macs</h3>
                        <p class="text-gray-500 mt-3 text-center">These are the settings I used to avoid this issue</p>
                    </a>
                </div>
            </div>
            <div class="flex flex-col rounded-xl shadow-lg overflow-hidden">
                <div class="flex-1 bg-white p-6 flex flex-col justify-between">
                    <a href="">
                        <h3 class="text-blue-600 font-bold text-xl text-center">Passing arguments to
                            get_template_part</h3>
                        <p class="text-gray-500 mt-3 text-center">Using the built-in WordPress function to encourage
                            reusable components</p>
                    </a>
                </div>
            </div>
            <div class="flex flex-col rounded-xl shadow-lg overflow-hidden">
                <div class="flex-1 bg-white p-6 flex flex-col justify-between">
                    <a href="">
                        <h3 class="text-blue-600 font-bold text-xl text-center">Refactoring Laravel models into a
                            dedicated folder</h3>
                        <p class="text-gray-500 mt-3 text-center">Improve the organisation of your projects</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
