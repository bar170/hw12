<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('favicon-v2.ico') }}">
    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Vite (теперь только Tailwind) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @yield('head')
    @yield('head-bottom')
</head>

<body class="bg-gray-100 flex flex-col min-h-screen">
@include('layout.navbar')

<main class="flex-grow">
    <div id="app">
        @yield('body')
    </div>
</main>

@include('layout.footer')

<!-- Flowbite JS -->
<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

@yield('body-bottom')
</body>
</html>
