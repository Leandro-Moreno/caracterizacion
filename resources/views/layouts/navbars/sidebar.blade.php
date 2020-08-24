<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Inicio') }}</p>
        </a>
      </li>
      @can('view', App\Model\Caracterizacion\Caracterizacion::class)
      <li class="nav-item {{ ( $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#Caracterizaciones" aria-expanded="{{ (  $activePage == 'viability-management') ? 'true' : 'false' }}">
            <i class="material-icons">supervised_user_circle</i>
          <p>{{ __('Caracterización Usuarios') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse {{ ($activePage == 'dashboard' || $activePage == 'caracterizacion' ||  $activePage == 'viability-management'|| $activePage == 'caracterizacion.importar' || $activePage == 'viability-management') ? ' show' : '' }}" id="Caracterizaciones">
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
            <li class="nav-item{{ $activePage == 'viability-management' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('user.index') }}">
                <i class="material-icons">supervisor_account</i>
                  <p>{{ __('Usuarios') }}</p>
              </a>
            </li>
            @endcan
            @can('importar', App\Model\Caracterizacion\Caracterizacion::class)
            <li class="nav-item{{ $activePage == 'users-management' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('caracterizacion.importar') }}">
                <i class="material-icons">import_export</i>
                  <p>{{ __('Importar / Exportar') }}</p>
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

      @can('view_viability', App\Model\Caracterizacion\Caracterizacion::class)
      <li class="nav-item {{ ( $activePage == 'user-viability') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#viabilidades" aria-expanded="{{ (  $activePage == 'viability-management') ? 'true' : 'false' }}">
            <i class="material-icons">timeline</i>
          <p>{{ __('Viabilidad') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse {{ ($activePage == 'dashboard' || $activePage == 'viabilidad' ||  $activePage == 'viability-management'|| $activePage == 'caracterizacion.importar' || $activePage == 'viability-management') ? ' show' : '' }}" id="viabilidades">
          <ul class="nav">
          @can('view_viability', App\Model\Caracterizacion\Caracterizacion::class)
            <li class="nav-item{{ $activePage == 'management' ? ' active' : '' }}">
              <a class="nav-link viabilidad-sst" href="caracterizacion?unidad=&rol=&estado=&viabilidad=Consultar+con+jefatura+servicio+médico+y+SST">
                <i class="material-icons text-white">touch_app</i>
                  <p>{{ __('Consultar con jefatura y servicio Medico SST') }}</p>
              </a>
            </li>
          @endcan
          @can('view_viability', App\Model\Caracterizacion\Caracterizacion::class)
            <li class="nav-item{{ $activePage == 'management' ? ' active' : '' }}">
              <a class="nav-link viabilidad-tp" href="caracterizacion?unidad=&rol=&estado=&viabilidad=Viable+trabajo+presencial">
                <i class="material-icons text-white">how_to_reg</i>
                  <p>{{ __('Viable trabajo presencial') }}</p>
              </a>
            </li>
            @endcan
            @can('view_viability', App\Model\Caracterizacion\Caracterizacion::class)
            <li class="nav-item{{ $activePage == 'management' ? ' active' : '' }}">
              <a class="nav-link viabilidad-tele" href="caracterizacion?unidad=&rol=&estado=&viabilidad=Trabajo+en+casa+y+consultar+a+telemedicina">
                <i class="material-icons text-white">transfer_within_a_station</i>
                  <p>{{ __('Trabajo en casa y consultar a telemedicina') }}</p>
              </a>
            </li>
            @endcan
            @can('view_viability', App\Model\Caracterizacion\Caracterizacion::class)
            <li class="nav-item{{ $activePage == 'management' ? ' active' : '' }}">
              <a class="nav-link viabilidad-tec" href="caracterizacion?unidad=&rol=&estado=&viabilidad=Trabajo+en+casa">
                <i class="material-icons text-white">add_business</i>
                  <p>{{ __('Trabajo en casa') }}</p>
              </a>
            </li>
            @endcan
            @can('view_viability', App\Model\Caracterizacion\Caracterizacion::class)
            <li class="nav-item{{ $activePage == 'management' ? ' active' : '' }}">
              <a class="nav-link viabilidad-sin" href="caracterizacion?unidad=&rol=&estado=&viabilidad=Sin+clasificación">
                <i class="material-icons text-black">person_add_disabled</i>
                  <p>{{ __('Sin clasificación') }}</p>
              </a>
            </li>
            @endcan
            @can('view_viability', App\Model\Caracterizacion\Caracterizacion::class)
            <li class="nav-item{{ $activePage == 'management' ? ' active' : '' }}">
              <a class="nav-link usuarios-activos" href="caracterizacion?unidad=&rol=&estado=1&viabilidad=">
                <i class="material-icons text-black">offline_pin</i>
                  <p>{{ __('Activo') }}</p>
              </a>
            </li>
            @endcan
            @can('view_viability', App\Model\Caracterizacion\Caracterizacion::class)
            <li class="nav-item{{ $activePage == 'management' ? ' active' : '' }}">
              <a class="nav-link usuarios-inactivos" href="caracterizacion?unidad=&rol=&estado=2&viabilidad=">
                <i class="material-icons text-black">cancel</i>
                  <p>{{ __('Inactivos') }}</p>
              </a>
            </li>
            @endcan
          </ul>
        </div>
      </li>
      @endcan

      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'correo'|| $activePage == 'admin-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#Configuracion" aria-expanded="{{ ($activePage == 'profile' || $activePage == 'correo') ? 'true' : 'false' }}">
            <i class="material-icons">settings_applications</i>
          <p>{{ __('Configuración') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse {{ ($activePage == 'profile' || $activePage == 'correo'|| $activePage == 'admin-management') ? ' show' : '' }}" id="Configuracion">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('profile.index') }}">
                <i class="material-icons">person</i>
                <p> {{ __('Perfil') }} </p>
              </a>
            </li>

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
