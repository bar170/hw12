<!DOCTYPE html>
<html lang="ru" x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }" x-init="$watch('darkMode', val => localStorage.setItem('darkMode', val))" :class="{ 'dark': darkMode }">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('favicon-v2.ico') }}">
    <title>@yield('title', 'Arbusik - Админ панель')</title>

    {{-- Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Дополнительные стили --}}
    @stack('styles')
</head>

<body class="bg-gray-50 dark:bg-gray-900 antialiased">

{{-- Кнопка темы --}}
<button @click="darkMode = !darkMode" class="fixed bottom-4 right-4 z-50 p-3 bg-white dark:bg-gray-800 rounded-full shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-200 dark:border-gray-700">
    <svg x-show="!darkMode" class="w-5 h-5 text-gray-800" fill="currentColor" viewBox="0 0 20 20">
        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"/>
    </svg>
    <svg x-show="darkMode" class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
        <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"/>
    </svg>
</button>

{{-- Контейнер с правильным позиционированием --}}
<div class="flex h-screen overflow-hidden">
    {{-- Sidebar --}}
    @include('admin.layouts.sidebar')

    {{-- Main Content - с отступом под sidebar --}}
    <div class="flex-1 flex flex-col w-0 overflow-hidden ml-64 transition-all duration-300" id="main-content">

        {{-- Topbar --}}
        @include('admin.layouts.topbar')

        {{-- Page Heading --}}
        @hasSection('page-header')
            <div class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 px-6 py-4">
                <div class="flex items-center justify-between">
                    <h1 class="text-xl font-semibold text-gray-800 dark:text-white">
                        @yield('page-header')
                    </h1>
                    @yield('header-actions')
                </div>
            </div>
        @endif

        {{-- Page Content --}}
        <main class="flex-1 overflow-y-auto bg-gray-50 dark:bg-gray-900 p-6">
            @yield('content')
        </main>

        {{-- Footer --}}
        @include('admin.layouts.footer')
    </div>
</div>

{{-- Logout Modal --}}
<div id="logout-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <!-- ... содержимое модалки ... -->
</div>

@stack('scripts')
</body>
</html>

@push('scripts')
    <script>
        // Синхронизация отступа main-content с состоянием sidebar
        document.addEventListener('alpine:init', () => {
            Alpine.effect(() => {
                const sidebarOpen = Alpine.store('sidebar')?.open ?? window.innerWidth >= 768;
                const mainContent = document.getElementById('main-content');
                if (mainContent) {
                    if (sidebarOpen) {
                        mainContent.classList.remove('ml-0');
                        mainContent.classList.add('ml-64');
                    } else {
                        mainContent.classList.remove('ml-64');
                        mainContent.classList.add('ml-0');
                    }
                }
            });
        });
    </script>
@endpush
