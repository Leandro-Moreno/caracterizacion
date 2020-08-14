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
                <form class="form-inline">
                  <div class="col-12">
                  <div class="input-group">
                      <buscar-component></buscar-component>
                      <span class="input-group-btn">
                        <button class="btn btn-primary" style="background:#2e91a9" type="button" data-toggle="collapse" data-target="#busqueda-avanzada" aria-expanded="false" aria-controls="collapseExample">
                         Búsqueda Avanzada 
                        </button>
                      </span> 
                    </div>
                    <form class="">
                    <div id="busqueda-avanzada" name="busqueda-avanzada" class=" row collapse" style="padding-top:5px;padding-bottom:35px">
                      <div class="row"> 
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="text-align:center;margin-top:20px">
                          <label style="color:#505c61"> Filtrar por Facultad </label><br>
                          <select id="unidad" name="unidad" class="form-control" data-placeholder=" ">
                          <option  value="" selected disabled>Seleccione...</option>
                          @foreach($unidades as $unidad )
                                  <option value="{{ $unidad->id }}" >{{ $unidad->nombre_unidad }}</option>
                              @endforeach 
                          </select>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="text-align:center;margin-top:20px">
                          <label style="color:#505c61"> Filtrar por Rol </label><br>  
                          <select id="role" name="role" class="form-control" style="min-width:inherit !important" data-placeholder=" ">
                            <option  value="" selected disabled>Seleccione...</option>
                            <option value="1">Empleado</option><option value="2">Facultad</option><option value="3">Servicios Salud</option><option value="4">Servicios Campus</option><option value="4">Servicios Campus</option>
                          </select>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="text-align:center;margin-top:20px">
                          <label style="color:#505c61"> Filtrar por Estado </label><br>  
                          <select id="estado" name="estado" class="form-control" data-placeholder=" ">
                            <option  value="" selected disabled>Seleccione...</option>
                            '<option value="1">Activo</option><option value="2">Inactivo</option>'
                          </select>
                        </div>
                      </div>
                      <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 "  style="margin-top:30px;text-align:center">
                          <button class="btn btn-info buscar-asistentes"  type="submit">
                              Buscar Asistentes de Manera Avanzada
                          </button>
                        </div>
                      </div>
                      </div>
                    </form>
                    @can('create' , App\Model\Caracterizacion\Caracterizacion::class)
                    <div  class="col-12 text-right">
                      <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary">{{ __('Agregar usuario') }}</a>
                    </div>
                    @endcan
                  </div>
                  </form>
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
                          <td>
                          {{ $user->estado->nombre }}
                          </td>
                          <td class="td-actions text-right">


                                  <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('user.edit', $user) }}" data-original-title="" title="Editar usuario">
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
  @push('js')
  <script type="text/javascript">
$(document).ready(function() {

$("#field").change(function() {
    var val = $(this).val();
    $("#operator").html(options[val]);
});
  var options = [

    '<option value="1">Activo</option><option value="2">Inactivo</option>',
    '<option value="1">FACULTADES</option><option value="2">AUDITORÍA INTERNA</option><option value="3">CENTRO DE ÉTICA</option><option value="4">CIDER</option><option value="5">CONECTA-TE</option><option value="6">DECANATURA DE ESTUDIANTES</option><option value="7">DIR GESTIÓN HUMANA Y ORGANIZACIONAL</option><option value="8">DIRECCIÓN CAMPUS SOSTENIBLE</option><option value="9">DIRECCIÓN DE ADMISIONES Y REGISTRO</option><option value="10">DIRECCIÓN DE EDUCACIÓN CONTINUA</option><option value="11">DIRECCIÓN DE PLANEACIÓN Y EVALUACIÓN</option><option value="12">DIRECCIÓN DE SERVICIOS DE INFORMACIÓN Y TECNOLOGÍA</option><option value="13">DIRECCIÓN FINANCIERA</option><option value="14">DIRECCIÓN SERVICIOS ADMINISTRATIVOS</option><option value="15">DIRECCIÓN SERVICIOS CAMPUS</option><option value="16">ESCUELA DE GOBIERNO</option><option value="17">FACULTAD DE ADMINISTRACIÓN</option><option value="18">FACULTAD DE ARQUITECTURA Y DISEÑO</option><option value="19">FACULTAD DE ARTES Y HUMANIDADES</option><option value="20">FACULTAD DE CIENCIAS</option><option value="21">FACULTAD DE CIENCIAS SOCIALES</option><option value="22">FACULTAD DE DERECHO</option><option value="23">FACULTAD DE ECONOMÍA</option><option value="24">FACULTAD DE EDUCACIÓN</option><option value="25">FACULTAD DE INGENIERÍA</option><option value="26">FACULTAD DE MEDICINA</option><option value="27">RECTORÍA</option><option value="28">SECRETARÍA GENERAL</option><option value="29">SISTEMA DE BIBLIOTECAS</option><option value="30">VICERRECTORÍA ACADÉMICA</option><option value="31">VICERRECTORÍA DE DESARROLLO Y EGRESADOS</option><option value="32">VICERRECTORÍA INVESTIGACIÓN Y CREACIÓN</option><option value="33">VICERRECTORÍA SERVICIOS Y SOSTENIBILIDAD</option>',
    '<option value="1">Empleado</option><option value="2">Facultad</option><option value="3">Servicios Salud</option><option value="4">Servicios Campus</option><option value="4">Servicios Campus</option>'
];
});
  </script>
  @endpush
@endsection

