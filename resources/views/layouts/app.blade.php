<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta name="title" content="@yield('title')">
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <meta property="fb:app_id"        content="499135290538548">
    <meta property="og:url"           content="@yield('url')" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="@yield('title')" />
    <meta property="og:description"   content="@yield('description')" />
    <meta property="og:image:url"     content="@yield('image')" />
    <meta property="og:image:width"   content="@yield('imageWidth')" />
    <meta property="og:image:height"  content="@yield('imageHeight')" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>LiveXtreme | @yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/parsley.css') }}" rel="stylesheet">

    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">

    @yield('stylesheets')
</head>
<body>
    <div id="app">
        @include('widgets._nav')
        @if (Request::segment(1) == '' OR Request::segment(1) == 'home')
            @include('widgets._jumbotron')
        @endif
        <main class="py-4">
            @yield('content')
        </main>
        @include('widgets._footer')
    </div>
    @include('widgets._loginModal')
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
{{--     <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js" charset="utf-8"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js" charset="utf-8"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    @yield('scripts')
    <script type="text/javascript">
        feather.replace();
    </script>
</body>
</html>
