<aside id="sidebar"
       class="fixed top-0 left-0 z-40 w-64 h-screen bg-white border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700 transition-transform duration-300"
       :class="{ '-translate-x-full': !sidebarOpen, 'translate-x-0': sidebarOpen }"
       x-data="{ sidebarOpen: window.innerWidth >= 768 }"
       x-init="window.addEventListener('resize', () => sidebarOpen = window.innerWidth >= 768)">

    {{-- Логотип --}}
    <div class="flex items-center justify-between h-16 px-4 border-b border-gray-200 dark:border-gray-700">
        <a href="{{ url('/') }}" class="flex items-center space-x-2">
            <img src="{{ Vite::asset('resources/images/logo.jpg') }}" class="h-8 w-8 rounded-full" alt="Logo">
            <span class="text-lg font-semibold text-gray-800 dark:text-white">Arbusik.ru</span>
        </a>
        <button @click="sidebarOpen = false" class="p-1 rounded-lg md:hidden hover:bg-gray-100 dark:hover:bg-gray-700">
            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    {{-- Меню --}}
    <div class="h-full px-3 py-4 overflow-y-auto">
        <!-- ... содержимое меню ... -->
    </div>
</aside>

{{-- Оверлей для мобилок --}}
<div x-show="sidebarOpen"
     @click="sidebarOpen = false"
     class="fixed inset-0 z-30 bg-gray-900 bg-opacity-50 md:hidden">
</div>
