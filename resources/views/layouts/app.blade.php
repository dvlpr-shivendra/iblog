<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Modest Developer Blog' }}</title>

    <meta name="description" content="{{ $description ?? "Blog of a working developer. Here you can find posts about html, css, javascript, php, laravel, linux and programming in general" }}">

    <meta property="og:title" content="{{ $title ?? 'Modest Developer Blog' }}" />
    <meta property="og:type" content="Programming.Posts" />
    <meta property="og:url" content="{{ env('APP_URL') }}" />
    <meta property="og:image" content="{{ isset($thumbnail) ? url("storage/$thumbnail") : asset('/images/logo.svg') }}" />
    <meta property="og:site_name" content="{{ env('APP_NAME')}}" />

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:description" content="{{ $description ?? "Blog of a working developer. Here you can find posts about html, css, javascript, php, laravel, linux and programming in general" }}" />
    <meta name="twitter:title" content="{{ $title ?? 'Modest Developer Blog' }}" />
    <meta name="twitter:image" content="{{ isset($thumbnail) ? url("storage/$thumbnail") : asset('/images/logo.svg') }}" />   

    @if (isset($post))
    <meta property="article:tag" content="{{ implode(', ', $post->tags()->pluck('title')->toArray()) }}" />
    <meta property="article:published_time" content="{{ $post->created_at }}" />
    <meta property="og:updated_time" content="{{ $post->updated_at }}" />
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

    @include('partials.footer')

    <script src="{{ asset('js/app.js') }}"></script>

    @stack('scripts')

</body>
</html>
