<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Marca de la Aplicación -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
        <div class="sidebar-brand-icon">
            <i class="fas fa-building"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Coworking</div>
    </a>

    <!-- Separador -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Inicio</span></a>
    </li>

    <!-- Verificar el Rol del Usuario -->
    @role('admin')
        <!-- Menú para Administradores -->
        <!-- Separador -->
        <hr class="sidebar-divider">

        <!-- Encabezado -->
        <div class="sidebar-heading">
            Administración
        </div>

        <!-- Nav Item - Salas -->
        <li class="nav-item {{ request()->is('rooms*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('rooms.index') }}">
                <i class="fas fa-fw fa-door-open"></i>
                <span>Salas</span>
            </a>
        </li>

        <!-- Nav Item - Reservaciones -->
        <li class="nav-item {{ request()->is('admin/reservations') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.reservations.index') }}">
                <i class="fas fa-fw fa-calendar-alt"></i>
                <span>Reservaciones</span>
            </a>
        </li>
    @endrole

    @role('cliente')
        <!-- Menú para Clientes -->
        <!-- Separador -->
        <hr class="sidebar-divider">

        <!-- Encabezado -->
        <div class="sidebar-heading">
            Cliente
        </div>

        <!-- Nav Item - Mis Reservaciones -->
        <li class="nav-item {{ request()->is('reservations*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('reservations.index') }}">
                <i class="fas fa-fw fa-calendar-alt"></i>
                <span>Mis Reservaciones</span>
            </a>
        </li>
    @endrole

    <!-- Separador -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Botón para Ocultar Sidebar -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- Fin del Sidebar -->
