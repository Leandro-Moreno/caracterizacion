<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <div class="sidebar-wrapper">
    <ul class="nav">
      @can('view', App\Model\Caracterizacion\Caracterizacion::class)
      <li class="nav-item active">
        <div class="collapse show {{ ($activePage == 'dashboard' || $activePage == 'caracterizacion' ||  $activePage == 'viability-management'|| $activePage == 'caracterizacion.importar' || $activePage == 'viability-management') ? ' show' : '' }}" id="Caracterizaciones">
          <ul class="nav">
          @can('view', App\Model\Caracterizacion\Caracterizacion::class)
            <li class="nav-item{{ $activePage == 'caracterizacion' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('caracterizacion') }}">
                <i class="material-icons">next_week</i>
                  <p>{{ __('Caracterización') }}</p>
              </a>
            </li>
          @endcan
          @can('view', App\User::class)
            <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('user.index') }}">
                <i class="material-icons">supervisor_account</i>
                  <p>{{ __('Empleados') }}</p>
              </a>
            </li>
            @endcan
            @can('importar', App\Model\Caracterizacion\Caracterizacion::class)
            <li class="nav-item{{ $activePage == 'users-management' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('caracterizacion.importar') }}">
                <i class="material-icons">import_export</i>
                  <p>{{ __('Importar datos') }}</p>
              </a>
            </li>
            @endcan
            @can('view', App\Model\Reporte\Reporte::class)
            <li class="nav-item{{ $activePage == 'reporte' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('reporte') }}">
                <i class="material-icons">analytics</i>
                  <p>{{ __('Reportes') }}</p>
              </a>
            </li>
            @endcan
          </ul>
        </div>
      </li>
      @endcan



      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'correo'|| $activePage == 'admin-management') ? ' active' : '' }}">
        <div class="collapse {{ ($activePage == 'profile' || $activePage == 'correo'|| $activePage == 'admin-management') ? ' show' : '' }}" id="Configuracion">
          <ul class="nav">

            @can('viewSidebarAdmin', App\User::class)
            <li class="nav-item{{ $activePage == 'admin-management' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('user.admin') }}">
                <i class="material-icons">security</i>
                  <p>{{ __('Mostrar Administradores') }}</p>
              </a>
            </li>
            @endcan
          </ul>
        </div>
      </li>
      <li class="nav-item d-xl-none">
        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">

          <i class="material-icons">close</i>
          <p> {{ __('Cerrar sesión') }}</p>
        </a>
      </li>
    </ul>
  </div>
</div>
