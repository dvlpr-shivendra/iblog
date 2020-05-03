<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $post->title ?? 'CoderProphet' }}</title>

    <meta name="description" content="{{ $post->description ?? "" }}">

    <meta property="og:title" content="{{ $post->title ?? 'CoderProphet' }}" />
    <meta property="og:type" content="Programming.Posts" />
    <meta property="og:url" content="{{ env('APP_URL') }}" />
    <meta property="og:image" content="{{ $post->thumbnail ?? '/images/logo.svg'}}" />
    <meta property="og:site_name" content="{{ env('APP_NAME')}}" />

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:description" content="{{ $post->description ?? "" }}" />
    <meta name="twitter:title" content="{{ $post->title ?? 'CoderProphet' }}" />
    <meta name="twitter:image" content="{{ $post->thumbnail ?? '/images/logo.svg'}}" />   

    @if (isset($post))
    <meta property="article:tag" content="employees" />
    <meta property="article:published_time" content="2016-08-29T06:27:55+00:00" />
    <meta property="og:updated_time" content="2018-02-10T17:29:32+00:00" />
    @endif

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;700&display=swap" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
      body {font-family: 'Manrope', sans-serif;}
    </style>

    @stack('styles')

</head>
<body class="">

    <div id="app">

        @include('partials.navbar')
        @include('partials.flash')
        @include('partials.search')

        <main class="py-10 px-2">
            @yield('content')
        </main>
    </div>

    <footer class="footer p-t-25 p-b-25">
      <div class="content has-text-centered">
        <p>Designed & Developed by Shivendra TechSter</p>
      </div>
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>

    @stack('scripts')

</body>
</html>
