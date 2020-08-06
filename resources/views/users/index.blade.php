@extends('layouts.app', ['activePage' => 'user-management', 'titlePage' => __('Gestión de usuarios')])

@section('content')
  <div id="app" class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">{{ __('Usuario') }}</h4>
                <p class="card-category"> {{ __('Aquí puedes administrar usuarios') }}</p>
              </div>
              <div class="card-body">
                @if (session('status'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="row">
                  <div class="col-12 text-right">
                    <buscar-component></buscar-component>
                    <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary">{{ __('Agregar usuario') }}</a>
                  </div>
                  <div class="col-12 text-right">
                    <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary">{{ __('Agregar usuario') }}</a>
                  </div>
                </div>
                <div class="table-responsive">
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
                      <th class="text-right">
                        {{ __('Acciones') }}
                      </th>
                    </thead>
                    <tbody>
                      @foreach($users as $user)
                        <tr>
                          <td>
                            {{ $user->name }}  {{ $user->apellido }}
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
                          {{ $user->direccion }}{{ $user->direccion2 }}
                          </td>
                          <td class="td-actions text-right">


                                  <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('user.edit', $user) }}" data-original-title="" title="Editar usuario">
                                    <i class="material-icons">edit</i>
                                    <div class="ripple-container"></div>
                                  </a>
                                  <a rel="tooltip" class="btn btn-primary btn-link" href="{{ route('caracterizacion.ucreate', $user) }}" data-original-title="" title="Editar/Crear Caracterización">
                                  <i class="material-icons">next_week</i>
                                    <div class="ripple-container"></div>
                                  </a>


                          </td>
                        </tr>
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
