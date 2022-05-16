<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5, minimum-scale=1">
    <meta property="og:type" content="website">

    {!! \SEOMeta::generate() !!}
    {!! \OpenGraph::generate() !!}
    {!! \Twitter::generate() !!}

    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

    @yield('head')

    <link rel="canonical" href="{{ url()->current() }}" />
    <link
        rel="shortcut icon"
        href="{{ asset('/assets/images/favicon.png') }}"
        type="image/x-icon"
    />
    <link rel="stylesheet" href="{{ asset('/assets/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @stack('css')

    <!-- ==== WOW JS ==== -->
    <script src="{{ asset('/assets/js/wow.min.js') }}"></script>
    <script>
        new WOW().init();
    </script>
</head>
<body>
    <!-- ====== Navbar Section Start -->
    @include('layouts.navbar')
    <!-- ====== Navbar Section End -->

    <!-- ====== Hero Section Start -->
    @yield('content')
    <!-- ====== Hero Section End -->

    <!-- ====== Footer Section Start -->
    @include('layouts.footer')
    <!-- ====== Footer Section End -->

    <!-- ====== Back To Top Start -->
    <a
        href="javascript:void(0)"
        class="
        hidden
        items-center
        justify-center
        bg-primary
        text-white
        w-10
        h-10
        rounded-md
        fixed
        bottom-8
        right-8
        left-auto
        z-[999]
        hover:bg-dark
        back-to-top
        shadow-md
        transition
        duration-300
        ease-in-out
      "
    >
      <span
          class="w-3 h-3 border-t border-l border-white rotate-45 mt-[6px]"
      ></span>
    </a>
    <!-- ====== Back To Top End -->

    <!-- ====== All Scripts -->
    <script src="{{ asset('/assets/js/main.js') }}"></script>
    <script>
        // ==== for menu scroll
        const pageLink = document.querySelectorAll(".ud-menu-scroll");

        pageLink.forEach((elem) => {
            elem.addEventListener("click", (e) => {
                const href = elem.getAttribute("href");
                if ({{ !request()->routeIs('home') ? 'true' : 'false' }} && href.startsWith('#')) {
                    window.location.href = '{{ route('home') }}' + href;

                    return true;
                }

                if (href.indexOf('#') !== -1) {
                    e.preventDefault();
                    document.querySelector(elem.getAttribute("href")).scrollIntoView({
                        behavior: "smooth",
                        offsetTop: 1 - 60,
                    });
                }
            });
        });
    </script>
    @stack('js')

    <!-- Matomo -->
    <script>
        var _paq = window._paq = window._paq || [];
        /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
        _paq.push(['trackPageView']);
        _paq.push(['enableLinkTracking']);
        (function() {
            var u="//piwik.atbakan.com/";
            _paq.push(['setTrackerUrl', u+'matomo.php']);
            _paq.push(['setSiteId', '1']);
            var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
            g.async=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
        })();
    </script>
    <!-- End Matomo Code -->

</body>
</html>
