<style>

</style>

<div class="sidebar-overlay" id="sidebarOverlay"></div>

<button class="sidebar-toggle" id="sidebarToggle">
    <i class="bi bi-list"></i>
</button>

<div class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <div class="user-avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
        <div class="user-info">
            <h5>{{ Auth::user()->name }} {{ Auth::user()->surnames }}</h5>
            <p>{{ Auth::user()->email }}</p>
        </div>
    </div>

    <div class="sidebar-menu">
        <div class="menu-section">
            <div class="menu-section-title">Principal</div>
            <a href="" class="menu-item active">
                <i class="bi bi-house-door"></i>
                <span>Inicio</span>
            </a>
            <a href="" class="menu-item">
                <i class="bi bi-check-circle"></i>
                <span>Tareas completadas</span>
            </a>
            <a href="" class="menu-item">
                <i class="bi bi-calendar"></i>
                <span>Calendario</span>
            </a>
        </div>

        <div class="menu-section">
            <div class="menu-section-title">Mi Cuenta</div>
            <a href="#" class="menu-item">
                <i class="bi bi-person"></i>
                <span>Mi Perfil</span>
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
