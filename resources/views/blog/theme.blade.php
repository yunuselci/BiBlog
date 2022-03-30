<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('css')
</head>

<body class="border-t-8 border-blue-600 flex flex-col min-h-screen">
<div class="flex-1">
    @include('blog.data.header')

    @yield('home')
    @yield('articles')
    @yield('snippets')
    @yield('about')
    @yield('snippet')
    @yield('article')


</div>
@include('blog.data.footer')
</body>
<script src="{{ mix('js/hljs.js') }}" defer></script>
<script>


    const btn = document.querySelector('button.mobile-menu-button');
    const menu = document.querySelector('.mobile-menu');
    const nav = document.querySelector('.mobile-nav');

    btn.addEventListener("click", () => {
        nav.classList.toggle("hidden");
        menu.classList.toggle("hidden");
    });

    const closeBtn = document.querySelector('button.mobile-menu-close-button');

    closeBtn.addEventListener("click", () => {
        nav.classList.toggle("hidden");
        menu.classList.toggle("hidden");
    });
</script>
</html>
