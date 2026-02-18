<nav class="bg-white shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex justify-between items-center h-16">

            {{-- Логотип --}}
            <a href="{{ url('/') }}" class="flex items-center space-x-2">
                <img src="{{ Vite::asset('resources/images/logo.jpg') }}"
                     alt="Arbusik Logo"
                     class="w-8 h-8 rounded-full">
                <span class="font-semibold text-xl text-gray-800">Arbusik.ru</span>
            </a>

            {{-- Мобильная кнопка --}}
            <button class="md:hidden text-gray-600 hover:text-gray-800"
                    onclick="document.getElementById('mobile-sidebar').classList.toggle('hidden')">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>

            {{-- Десктопное меню --}}
            <div class="hidden md:flex items-center space-x-6">

                @auth
                    <a href="/" class="nav-link">Найти попутчика</a>
                    <a href="/" class="nav-link">Стать водителем</a>
                    <a href="{{ route('about') }}" class="nav-link">О нас</a>
                @endauth

                {{-- Правый блок --}}
                @guest
                    <a href="{{ route('login') }}" class="nav-link">Вход</a>
                    <a href="{{ route('register') }}" class="nav-link">Регистрация</a>
                @else
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center space-x-2 nav-link">
                            <span>{{ Auth::user()->name }}</span>
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>

                        <div x-show="open" @click.away="open = false"
                             class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-10">
                            <a href="{{ route('home') }}" class="dropdown-item">Моя страница</a>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item w-full text-left">
                                    Выйти
                                </button>
                            </form>
                        </div>
                    </div>
                @endguest
            </div>
        </div>

        {{-- Мобильное меню --}}
        <div id="mobile-menu" class="hidden md:hidden pt-2 pb-3 space-y-1">

            @auth
                <a href="/" class="mobile-link">Найти попутчика</a>
                <a href="/" class="mobile-link">Стать водителем</a>
                <a href="{{ route('about') }}" class="mobile-link">О нас</a>
            @endauth

            @guest
                <a href="{{ route('login') }}" class="mobile-link">Вход</a>
                <a href="{{ route('register') }}" class="mobile-link">Регистрация</a>
            @else
                <div class="px-3 py-2 text-base font-medium text-gray-700">{{ Auth::user()->name }}</div>
                <a href="{{ route('home') }}" class="mobile-link">Моя страница</a>

                <form method="POST" action="{{ route('logout') }}" class="px-3 py-2">
                    @csrf
                    <button type="submit" class="text-base font-medium text-gray-700 hover:text-gray-900">
                        Выйти
                    </button>
                </form>
            @endguest
        </div>
    </div>
</nav>
