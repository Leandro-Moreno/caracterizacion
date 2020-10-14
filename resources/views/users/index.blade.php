@extends('layouts.app', ['activePage' => 'user-management', 'titlePage' => __('Gestión de empleados')])

@section('content')
  <div id="app" class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">{{count($users)}} {{ __('Empleados') }}</h4>
                <p class="card-category"> {{ __('Aquí puedes administrar empleados') }}</p>
              </div>
              <div class="card-body">
                @include('users.busqueda')
                    @can('create' , App\Model\Caracterizacion\Caracterizacion::class)
                    <div  class="col-12 text-right">
                      <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary">{{ __('Agregar empleado') }}</a>
                    </div>
                    @endcan
                <div class="table-responsive tableFixHead">
                  <table class="table table-striped">
                    <thead class=" text-primary">
                      <th>
                          {{ __('Nombre') }}
                      </th>
                      <th>
                        {{ __('Email') }}
                      </th>
                      <th>
                          {{ __('Documento') }}
                      </th>
                      <th>
                          {{ __('Cargo') }}
                      </th>
                      <th>
                          {{ __('Tipo de Contrato') }}
                      </th>
                      <th>
                          {{ __('Unidad/Facultad') }}
                      </th>
                      <th>
                          {{ __('Celular') }}
                      </th>
                      <th>
                          {{ __('Dirección') }}
                      </th>
                      <th>
                          {{ __('Estado') }}
                      </th>
                      <th class="text-right">
                        {{ __('Acciones') }}
                      </th>
                    </thead>
                    <tbody>
                      @foreach($users as $user)
                    <?php $userview = $user;?>
                      @can('viewbyRolUser', $userview)
                        <tr>
                          <td>
                            {{ $user->name }}
                          </td>
                          <td>
                          {{ $user->email }}
                          </td>
                          <td>
                          {{ $user->documento }}
                          </td>
                          <td>
                          {{ $user->cargo }}
                          </td>
                          <td>
                          {{ $user->tipo_contrato }}
                          </td>
                          <td>
                            {{ $user->unidad->nombre_unidad }}
                          </td>
                          <td>
                          {{ $user->celular }}
                          </td>
                          <td>
                          {{$user->localidad}}<br/>{{ $user->barrio }}<br/>{{ $user->direccion }}
                          </td>
                          <td>
                          {{ $user->estado->nombre }}
                          </td>
                          <td class="td-actions text-right">


                                  <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('user.edit', $user) }}" data-original-title="" title="Editar empleado">
                                    <i class="material-icons">edit</i>
                                    <div class="ripple-container"></div>
                                  </a>
                                  @can('updateu', App\Model\Caracterizacion\Caracterizacion::class)
                                  <a rel="tooltip" class="btn btn-primary btn-link" href="{{ isset( $user->caracterizacion ) ? route('caracterizacion.edit', $user->caracterizacion->id) : route('caracterizacion.ucreate', $user) }}" data-original-title="" title="Editar/Crear Caracterización">
                                  <i class="material-icons">next_week</i>
                                    <div class="ripple-container"></div>
                                  </a>
                                  @endcan


                          </td>
                        </tr>
                        @endcan
                      @endforeach
                    </tbody>
                  </table>
                </div>
                {{ $users->links() }}
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
