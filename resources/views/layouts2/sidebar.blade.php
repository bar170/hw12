<!-- resources/views/layouts/sidebar.blade.php -->
<aside class="w-64 bg-white shadow-md p-4">

    <nav class="space-y-2">

        {{-- Общие пункты --}}
        <a href="{{ route('dashboard') }}" class="block px-3 py-2 rounded hover:bg-gray-100">
            Главная
        </a>

        <a href="{{ route('home') }}" class="block px-3 py-2 rounded hover:bg-gray-100">
            Поиск поездок
        </a>

        <a href="{{ route('profile.edit') }}" class="block px-3 py-2 rounded hover:bg-gray-100">
            Профиль
        </a>

        {{-- Если попутчик --}}
        @role('passenger')
        <a href="#" class="block px-3 py-2 rounded hover:bg-gray-100">
            Мои поездки
        </a>
        @endrole

        {{-- Если перевозчик --}}
        @role('carrier')
        <hr class="my-3">

        <a href="#" class="block px-3 py-2 rounded hover:bg-gray-100">
            Создать поездку
        </a>

        <a href="#" class="block px-3 py-2 rounded hover:bg-gray-100">
            Мои маршруты
        </a>

        <a href="#" class="block px-3 py-2 rounded hover:bg-gray-100">
            Автопарк
        </a>

        <a href="#" class="block px-3 py-2 rounded hover:bg-gray-100">
            Сотрудники
        </a>

        <a href="#" class="block px-3 py-2 rounded hover:bg-gray-100">
            Статистика
        </a>
        @endrole

        {{-- Если сотрудник --}}
        @role('employee')
        <hr class="my-3">

        <a href="#" class="block px-3 py-2 rounded hover:bg-gray-100">
            Управление рейсами
        </a>
        @endrole

        {{-- Если админ --}}
        @role('admin')
        <hr class="my-3">

        <a href="{{ route('admin.dashboard') }}" class="block px-3 py-2 rounded hover:bg-gray-100">
            Админка
        </a>

        <a href="{{ route('admin.companies.index') }}" class="block px-3 py-2 rounded hover:bg-gray-100">
            Компании
        </a>

        <a href="#" class="block px-3 py-2 rounded hover:bg-gray-100">
            Пользователи
        </a>

        <a href="#" class="block px-3 py-2 rounded hover:bg-gray-100">
            Жалобы
        </a>
        @endrole

    </nav>

</aside>
