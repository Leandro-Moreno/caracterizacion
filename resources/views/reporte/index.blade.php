@extends('layouts.app', ['activePage' => 'reporte', 'titlePage' => __('Reportes')])

@section('content')
  <div id="app" class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">{{ __('Caracterización') }}</h4>
                <p class="card-category"> {{ __('Reporte') }}</p>
              </div>
              <div class="card-body">
                @if (session('status'))
                  <div class="row">
                  <form class="form-inline">
                  <div class="col-12">
                    <div class="col-6 text-right">
                      <buscar-component></buscar-component>
                    </div>
                    <div class="col-12 text-right">
                    <select id="field" class="form-control mr-sm-3" name="field">
                        <option disabled selected >Seleccione...</option>
                        <option value="0">Estado</option>
                        <option value="1">Facultad</option>
                        <option value="2">Rol</option>                      
                    </select>
                    <select id="operator" class="form-control mr-sm-3" name="operator">
                    </select>
                      <input name="buscarpor" class="form-control mr-sm-2" type="search" placeholder="Buscar por nombre" aria-label="Search">
                      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                    </div>
                  </div>
                  </form>
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
                              Buscar Caracterizaciones de Manera Avanzada
                          </button>
                        </div>
                      </div>
                      </div>
                    </form>
                    <div  class="col-12 text-right">
                      <a href="{{ route('reporte.grafico') }}" class="btn btn-sm btn-primary">{{ __('Tabla Gráfica') }}</a>
                    </div>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                    <th>
                        {{ __('Nombres') }}
                      </th>
                      <th>
                        {{ __('Email') }}
                      </th>
                      <th>
                        {{ __('Facultad/ Unidad') }}
                      </th>
                      <th>
                        {{ __('Indispensable trabajo presencial') }}
                      </th>
                      <th>
                        {{ __('Hora de Entrada') }}
                      </th>
                      <th>
                        {{ __('Hora de Salida') }}
                      </th>
                      <th>
                        {{ __('Viabilidad') }}
                      </th>
                    </thead>
                    <tbody>
                      @foreach($caracterizaciones as $dato)
                        <tr>
                          <td>
                            {{ $dato->user->name }} {{ $dato->user->apellido }}
                          </td>
                          <td>
                            {{ $dato->user->email }}
                          </td>
                          <td>
                            {{ $dato->user->unidad->nombre_unidad }}
                          </td>
                          <td>
                            {{ $dato->trabajo_en_casa }}
                          </td>
                          <td>
                            {{ $dato->horaEntrada }}
                          </td>
                          <td>
                            {{ $dato->horaSalida }}
                          </td>
                          <?php
                          $datoc = explode('|', $dato->viabilidad_caracterizacion);
                          
                          $color = $datoc[1];
                          
                          ?>
                          <td style="background-color: {{$color}} ; color:black">
                            {{ $datoc[0]}}
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
  {{ $caracterizaciones->links() }}
@endsection
@push('js')
  <script type="text/javascript">

  $(".toggle").click(function(e){
      $("#repTogg").prop( "checked" )?$( "#toggContenidoinds" ).text("No Indispensable"):$( "#toggContenidoinds" ).text("Si");
      $("#trabajo_en_casa").prop( "checked" )?$( "#toggTrabajo" ).text("No"):$( "#toggTrabajo" ).text("Si");
      $("#envio-consentimiento-togg").prop( "checked" )?$( "#toggEnvio" ).text("No Envío"):$( "#toggEnvio" ).text("Si Envío");
   });
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
