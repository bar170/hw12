<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('favicon-v2.ico') }}">
    <title>@yield('title', 'Arbusik')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @yield('head')
</head>

<body class="bg-gray-100 flex flex-col min-h-screen">

@include('layout.navbar')

<div class="flex flex-1">

    {{-- SIDEBAR (только на десктопе) --}}
    @auth
        <aside class="hidden md:block w-64 bg-white border-r border-gray-200 p-4">
            @include('layout.sidebar')
        </aside>
    @endauth

    {{-- ОСНОВНОЙ КОНТЕНТ — ВСЕГДА ПО ЦЕНТРУ --}}
    <main class="flex-1 flex justify-center">
        <div class="w-full max-w-3xl px-4 py-6">
            @yield('body')
        </div>
    </main>

</div>

@include('layout.footer')

{{-- Мобильный sidebar --}}
@include('layout.mobile-sidebar')

<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

@yield('body-bottom')
</body>
</html>
