<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Menu
    </div>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('user.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Usuários</span>
        </a>
    </li>    
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dentista.index') }}">
            <i class="fas fa-fw fa-user-md"></i>
            <span>Dentistas</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('especialidade.index') }}">
            <i class="fas fa-tooth"></i>
            <span>Especialidades</span>
        </a>
    </li>
</ul>