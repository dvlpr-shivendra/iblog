<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;700&display=swap" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
      body {font-family: 'Manrope', sans-serif;}
    </style>

    @stack('styles')

</head>
<body>

    <div id="app">

        @include('partials.navbar')
        @include('partials.flash')
        @include('partials.search')

        <main class="py-10 px-2">
            @yield('content')
        </main>
    </div>

    <footer class="footer p-t-25 p-b-25">
        <div class="content has-text-centered has-text-grey">
          <p>
            Designed & Developed by Shivendra TechSter with Laravel and Bulma CSS.
          </p>
        </div>
      </footer>

    <script src="{{ asset('js/app.js') }}"></script>

    @stack('scripts')

</body>
</html>
