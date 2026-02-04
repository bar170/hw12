<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Arbusik</div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Админка</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">Пользователи</div>

    <!-- USERS -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#"
           data-bs-toggle="collapse"
           data-bs-target="#collapseUsers"
           aria-expanded="false"
           aria-controls="collapseUsers">
            <i class="fas fa-fw fa-cog"></i>
            <span>Users</span>
        </a>
        <div id="collapseUsers" class="collapse" data-bs-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Users:</h6>
                <a class="collapse-item" href="#">Список</a>
                <a class="collapse-item" href="#">Добавить</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">Перевозчики</div>

    <!-- COMPANIES -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#"
           data-bs-toggle="collapse"
           data-bs-target="#collapseCompanies"
           aria-expanded="false"
           aria-controls="collapseCompanies">
            <i class="fas fa-fw fa-folder"></i>
            <span>Компании</span>
        </a>
        <div id="collapseCompanies" class="collapse" data-bs-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Компании:</h6>
                <a class="collapse-item" href="{{ route('admin.companies.index') }}">Список</a>
                <a class="collapse-item" href="#">Добавить</a>
            </div>
        </div>
    </li>

    <!-- TRANSPORT -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#"
           data-bs-toggle="collapse"
           data-bs-target="#collapseTransport"
           aria-expanded="false"
           aria-controls="collapseTransport">
            <i class="fas fa-fw fa-folder"></i>
            <span>Транспорт</span>
        </a>
        <div id="collapseTransport" class="collapse" data-bs-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Транспорт:</h6>
                <a class="collapse-item" href="#">Список</a>
                <a class="collapse-item" href="#">Добавить</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
