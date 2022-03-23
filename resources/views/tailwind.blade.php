<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<div class="border-t-8 border-blue-600">
    <!-- navbar goes here -->
    <nav>
        <div class="max-w-5xl mx-auto px-16 mx-16">
            <div class="flex justify-between">

                <div class="flex space-x-2">
                    <!-- logo -->
                    <div>
                        <a href="#" class="flex py-5 px-2">
                            <svg class="h-12 w-12 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 595.3 841.9">
                                <path
                                    d="M567.2 324.4c-43-131.5-185.8-203.9-317.3-160.9L189 183.4C57.5 226.4-14.9 369.2 28.1 500.7s185.8 203.9 317.3 160.9l60.8-19.9c131.5-43 204-185.8 161-317.3zm-159 197.2c-37 14.7-73.9 29.4-110.6 44-36.7 14.6-73.6 29.3-110.6 44v-71.1c19.9-7.5 39.7-15 59.4-22.3 19.7-7.4 39.4-14.8 59.4-22.3-20-8.4-39.7-16.4-59.4-24.1-19.7-7.7-39.5-15.7-59.4-24.1v-70.2c37 14.7 73.8 29.4 110.6 44 36.7 14.6 73.5 29.3 110.6 44v58.1zm0-235.1c-19.9 7.5-39.7 15-59.4 22.3-19.7 7.4-39.4 14.8-59.4 22.3 20 8.4 39.7 16.4 59.4 24.1 19.7 7.7 39.5 15.7 59.4 24.1v70.2c-37-14.7-73.8-29.4-110.6-44-36.7-14.6-73.5-29.3-110.6-44v-58.1c37-14.7 73.9-29.4 110.6-44 36.7-14.6 73.6-29.3 110.6-44v71.1z"
                                    fill="#0366D6"/>
                            </svg>
                        </a>
                    </div>
                    <!-- primary nav -->
                    <div class="hidden md:flex items-center space-x-1">
                        <a href="#" class="py-5 px-3 text-xl font-semibold hover:text-blue-600">About </a>
                        <a href="#" class="py-5 px-3 text-xl font-semibold hover:text-blue-600">Articles </a>
                        <a href="#" class="py-5 px-3 text-xl font-semibold hover:text-blue-600">Snippets </a>
                        <a href="#" class="py-5 px-3 text-xl font-semibold hover:text-blue-600">Contact </a>

                    </div>
                </div>
                <!-- secondary nav -->
                <div class="hidden md:flex items-center space-x-1">
                    <a href="#" class="py-5 px-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path
                                d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"
                                fill="#0366D6"/>
                        </svg>
                    </a>
                    <a href="#" class="py-5 px-3">
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="24" height="24"
                             viewBox="0 0 32 32">
                            <path
                                d="M24.633 22.184c-8.188 0-14.82-6.637-14.82-14.82 0-2.695 0.773-5.188 2.031-7.363-6.824 1.968-11.844 8.187-11.844 15.644 0 9.031 7.32 16.355 16.352 16.355 7.457 0 13.68-5.023 15.648-11.844-2.18 1.254-4.672 2.028-7.367 2.028z"
                                fill="#0366D6"/>
                        </svg>
                    </a>

                </div>
                <!-- Mobile Button goes here -->
                <div class="md:hidden flex items-center space-x-6">
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="24" height="24"
                             viewBox="0 0 32 32">
                            <path
                                d="M24.633 22.184c-8.188 0-14.82-6.637-14.82-14.82 0-2.695 0.773-5.188 2.031-7.363-6.824 1.968-11.844 8.187-11.844 15.644 0 9.031 7.32 16.355 16.352 16.355 7.457 0 13.68-5.023 15.648-11.844-2.18 1.254-4.672 2.028-7.367 2.028z"
                                fill="#0366D6"/>
                        </svg>
                    </button>
                    <button class="mobile-menu-button">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 fill-blue-600" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                  d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </button>

                </div>
            </div>
        </div>
        <!-- mobile menu -->
        <div class="mobile-menu hidden md:hidden">

            <a href="#" class="block py-2 px-4 text-sm hover:bg-blue-600">About </a>
            <a href="#" class="block py-2 px-4 text-sm hover:bg-blue-600">Articles </a>
            <a href="#" class="block py-2 px-4 text-sm hover:bg-blue-600">Snippets </a>
            <a href="#" class="block py-2 px-4 text-sm hover:bg-blue-600">Contact </a>

        </div>

    </nav>
</div>
<!-- content goes here -->

<div class="py-32 text-center">

    <h2 class="font-extrabold text-4xl"> Test yazısı </h2>

</div>

<script>

    const btn = document.querySelector('button.mobile-menu-button');
    const menu = document.querySelector('.mobile-menu');

    btn.addEventListener("click", () => {
        menu.classList.toggle("hidden");
    });
</script>


</html>
