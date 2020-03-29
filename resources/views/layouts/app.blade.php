<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @stack('styles')

</head>
<body class="font-montserrat">

    <div id="app">

        @include('partials.navbar')

        <main class="py-10 px-2">
            @yield('content')
        </main>
    </div>

    <script src="{{</script>

    @stack('scripts')

</body>
</html>
