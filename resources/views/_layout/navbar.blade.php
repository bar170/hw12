<nav class="bg-white shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Левая часть с логотипом -->
            <div class="flex items-center">
                <a href="{{ url('/') }}" class="flex items-center space-x-2">
                    <img src="{{ Vite::asset('resources/images/logo.jpg') }}"
                         alt="Arbusik Logo"
                         class="w-8 h-8 rounded-full">
                    <span class="font-semibold text-xl text-gray-800">Arbusik.ru</span>
                </a>
            </div>

            <!-- Мобильное меню кнопка -->
            <div class="flex md:hidden">
                <button type="button"
                        class="text-gray-500 hover:text-gray-600 focus:outline-none"
                        onclick="document.getElementById('mobile-menu').classList.toggle('hidden')">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>

            <!-- Десктопное меню -->
            <div class="hidden md:flex md:items-center md:space-x-6">
                <!-- Левая часть навигации для авторизованных -->
                @auth
                    <a href="/" class="text-gray-700 hover:text-gray-900 px-3 py-2 text-sm font-medium">Найти попутчика</a>
                    <a href="/" class="text-gray-700 hover:text-gray-900 px-3 py-2 text-sm font-medium">Стать водителем</a>
                    <a href="{{ route('about') }}" class="text-gray-700 hover:text-gray-900 px-3 py-2 text-sm font-medium">О нас</a>
                @endauth

                <!-- Правая часть навигации -->
                <div class="flex items-center space-x-4">
                    @guest
                        @if (Route::has('login'))
                            <a href="{{ route('login') }}" class="text-gray-700 hover:text-gray-900 px-3 py-2 text-sm font-medium">Вход</a>
                        @endif
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-gray-700 hover:text-gray-900 px-3 py-2 text-sm font-medium">Регистрация</a>
                        @endif
                    @else
                        <!-- Выпадающее меню профиля -->
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open"
                                    class="flex items-center space-x-2 text-gray-700 hover:text-gray-900 px-3 py-2 text-sm font-medium focus:outline-none">
                                <span>{{ Auth::user()->name }}</span>
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>
                            <div x-show="open"
                                 @click.away="open = false"
                                 class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-10">
                                <a href="{{ route('home') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Моя страница</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        Выйти
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endguest
                </div>
            </div>
        </div>

        <!-- Мобильное меню (скрыто по умолчанию) -->
        <div id="mobile-menu" class="hidden md:hidden">
            <div class="pt-2 pb-3 space-y-1">
                @auth
                    <a href="/" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">Найти попутчика</a>
                    <a href="/" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">Стать водителем</a>
                    <a href="{{ route('about') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">О нас</a>
                @endauth

                @guest
                    @if (Route::has('login'))
                        <a href="{{ route('login') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">Вход</a>
                    @endif
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">Регистрация</a>
                    @endif
                @else
                    <div class="px-3 py-2 text-base font-medium text-gray-700">{{ Auth::user()->name }}</div>
                    <a href="{{ route('home') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">Моя страница</a>
                    <form method="POST" action="{{ route('logout') }}" class="px-3 py-2">
                        @csrf
                        <button type="submit" class="text-base font-medium text-gray-700 hover:text-gray-900">
                            Выйти
                        </button>
                    </form>
                @endguest
            </div>
        </div>
    </div>
</nav>
