<nav class="space-y-2">

    <a href="{{ route('home') }}" class="sidebar-link">Главная</a>
    <a href="/" class="sidebar-link">Поиск поездок</a>
    <a href="{{ route('profile.edit') }}" class="sidebar-link">Профиль</a>

    <hr class="my-3">

    <a href="#" class="sidebar-link">Мои поездки</a>
    <a href="#" class="sidebar-link">Создать поездку</a>
    <a href="#" class="sidebar-link">Мои маршруты</a>
    <a href="#" class="sidebar-link">Автопарк</a>
    <a href="#" class="sidebar-link">Сотрудники</a>
    <a href="#" class="sidebar-link">Статистика</a>
    <a href="#" class="sidebar-link">Отзывы</a>

    <hr class="my-3">

    <a href="{{ route('admin.dashboard') }}" class="sidebar-link">Админка</a>
    <a href="{{ route('admin.companies.index') }}" class="sidebar-link">Компании</a>
    <a href="#" class="sidebar-link">Пользователи</a>
    <a href="#" class="sidebar-link">Жалобы</a>

</nav>
