<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->

  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Inicio') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'certificados' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('certificados') }}">
          <i class="material-icons">picture_as_pdf</i>
            <p>{{ __('Mis Certificados') }}</p>
        </a>
      </li>
      @if (Auth::user()->rol_id <= 2)
      <li class="nav-item {{ ($activePage == 'eventos' || $activePage == 'asistentes'|| $activePage == 'user-management'|| $activePage == 'firmas') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#Eventos" aria-expanded="{{ ($activePage == 'eventos' || $activePage == 'asistentes'|| $activePage == 'user-management'|| $activePage == 'firmas') ? 'true' : 'false' }}">
            <i class="material-icons">supervised_user_circle</i>
          <p>{{ __('Administrar Eventos') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse {{ ($activePage == 'eventos' || $activePage == 'asistentes'|| $activePage == 'user-management'|| $activePage == 'firmas') ? ' show' : '' }}" id="Eventos">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'eventos' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('eventos') }}">
                <i class="material-icons">next_week</i>
                  <p>{{ __('Eventos') }}</p>
              </a>
            </li>

            <li class="nav-item{{ $activePage == 'asistentes' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('asistentes') }}">
                <i class="material-icons">how_to_reg</i>
                  <p>{{ __('Asistencia') }}</p>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'firmas' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('firmas') }}">
                <i class="material-icons">create</i>
                  <p>{{ __('firmas') }}</p>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('user.index') }}">
                <i class="material-icons">supervisor_account</i>
                  <p>{{ __('Administrar usuarios') }}</p>
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
