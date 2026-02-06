<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('favicon-v2.ico') }}">

    <title>@yield('title')</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    @yield('head')
    @yield('head-bottom')
</head>

<body class="bg-light d-flex flex-column min-vh-100">
    @include('layout.navbar')

    <main class="flex-grow-1">
        <div id="app">
            @yield('body')
        </div>
    </main>

    @include('layout.footer')

    @yield('body-bottom')
</body>
</html>
