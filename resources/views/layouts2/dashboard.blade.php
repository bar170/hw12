<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Arbusik' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 text-gray-900">

<div class="flex min-h-screen">

    {{-- Sidebar: скрыт на телефоне --}}
    <aside class="hidden md:block w-64 bg-white shadow-md p-4">
        @include('layouts2.sidebar')
    </aside>

    {{-- Контент по центру --}}
    <main class="flex-1 p-4 md:p-6 max-w-4xl mx-auto">
        @yield('content')
    </main>

</div>

</body>
</html>
