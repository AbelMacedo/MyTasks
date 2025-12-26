<div class="sidebar-overlay" id="sidebarOverlay"></div>
<button class="sidebar-toggle" id="sidebarToggle">
    <i class="bi bi-list"></i>
</button>
<div class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <div class="user-avatar">
            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
        </div>
        <div class="user-info">
            <h5>{{ Auth::user()->name }} {{ Auth::user()->surnames }}</h5>
            <p>{{ Auth::user()->email }}</p>
        </div>
    </div>
    <div class="sidebar-menu">
        <div class="menu-section">
            <div class="menu-section-title">Principal</div>
            <a href="{{ route('home') }}" class="menu-item {{ request()->routeIs('home') ? 'active' : '' }}">
                <i class="bi bi-house-door-fill"></i>
                <span>Inicio</span>
            </a>
            <a href="{{ route('tasks.completed_tasks') }}"
                class="menu-item {{ request()->routeIs('tasks.completed_tasks') ? 'active' : '' }}">
                <i class="bi bi-check-circle-fill"></i>
                <span>Tareas completadas</span>
            </a>
            <a href="#" class="menu-item">
                <i class="bi bi-calendar-event-fill"></i>
                <span>Calendario</span>
                <span class="menu-badge">Pronto</span>
            </a>
        </div>
        <div class="menu-section">
            <div class="menu-section-title">Mi Cuenta</div>
            <a href="#" class="menu-item">
                <i class="bi bi-person-fill"></i>
                <span>Mi Perfil</span>
            </a>
            <a href="#" class="menu-item">
                <i class="bi bi-gear-fill"></i>
                <span>Configuración</span>
            </a>
        </div>
    </div>
    <div class="sidebar-footer">
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit" class="btn-logout">
                <i class="bi bi-box-arrow-right"></i>
                <span>Cerrar Sesión</span>
            </button>
        </form>
    </div>
</div>

<script>
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebar = document.getElementById('sidebar');
    const sidebarOverlay = document.getElementById('sidebarOverlay');

    function toggleSidebar() {
        sidebar.classList.toggle('active');
        sidebarOverlay.classList.toggle('active');
    }

    sidebarToggle.addEventListener('click', toggleSidebar);
    sidebarOverlay.addEventListener('click', toggleSidebar);

    const menuItems = document.querySelectorAll('.menu-item');
    menuItems.forEach(item => {
        item.addEventListener('click', () => {
            if (window.innerWidth <= 768) {
                toggleSidebar();
            }
        });
    });

    sidebar.addEventListener('touchmove', (e) => {
        e.stopPropagation();
    });
</script>
