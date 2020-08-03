<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Inicio') }}</p>
        </a>
      </li>

      @if (Auth::user()->rol_id >= 2)
      <li class="nav-item {{ ( $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#Eventos" aria-expanded="{{ (  $activePage == 'user-management') ? 'true' : 'false' }}">
            <i class="material-icons">supervised_user_circle</i>
          <p>{{ __('Caracterización Usuarios') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse {{ ($activePage == 'caracterizacion' ||  $activePage == 'user-management'|| $activePage == 'firmas') ? ' show' : '' }}" id="Eventos">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'caracterizacion' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('caracterizacion') }}">
                <i class="material-icons">next_week</i>
                  <p>{{ __('Caracterización') }}</p>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('user.index') }}">
                <i class="material-icons">supervisor_account</i>
                  <p>{{ __('Administrar usuarios') }}</p>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'user' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('user.index') }}">
                <i class="material-icons">how_to_reg</i>
                  <p>{{ __('Reportes') }}</p>
              </a>
            </li>
          </ul>
        </div>
      </li>



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
              <a class="nav-link" href="{{ route('profile.edit') }}">
                <i class="material-icons">person</i>
                <p> {{ __('Perfil') }} </p>
              </a>
            </li>

            <li class="nav-item{{ $activePage == 'correo' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('correo') }}">
                <i class="material-icons">email</i>
                <p> {{ __('Configuración de Correo') }} </p>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'admin-management' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('user.admin') }}">
                <i class="material-icons">security</i>
                  <p>{{ __('Mostrar Administradores') }}</p>
              </a>
            </li>
          </ul>
        </div>
      </li>
      @endif
      <li class="nav-item d-xl-none">
        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">

          <i class="material-icons">close</i>
          <p> {{ __('Cerrar sesión') }}</p>
        </a>
      </li>
    </ul>
  </div>
</div>
