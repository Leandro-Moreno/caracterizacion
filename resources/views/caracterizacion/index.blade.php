@extends('layouts.app', ['activePage' => 'caracterizacion', 'titlePage' => __('Caracterización')])

@section('content')
    <div id="app" class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">{{ __('Caracterización') }}</h4>
                            <p class="card-category"> {{ __('Aquí puedes gestionar tus caractizar tus usuarios') }}</p>
                        </div>
                        <div class="card-body">
                            @can('create', App\Model\Caracterizacion\Caracterizacion::class)
                                <div class="row">
                                    <div class="col-12">
                                        <div  class="col-12 text-right">
                                            <a href="{{ route('caracterizacion.create') }}" class="btn btn-sm btn-primary">{{ __('Agregar Caracterizacion') }}</a>
                                        </div>
                                    </div>
                                </div>
                                @include('caracterizacion.busqueda')
                            @endcan
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <th id="nombre">
                                        {{ __('Nombres') }}
                                    </th>
                                    <th id="email">
                                        {{ __('Email') }}
                                    </th>
                                    <th id="facultad">
                                        {{ __('Facultad') }}
                                    </th>
                                    <th id="trabajo_presencial">
                                        {{ __('Indispensable trabajo presencial') }}
                                    </th>
                                    <th id="cargo">
                                        {{ __('Cargo') }}
                                    </th>
                                    <th id="hora_entrada">
                                        {{ __('Hora de Entrada') }}
                                    </th>
                                    <th id="hora_Salida">
                                        {{ __('Hora de Salida') }}
                                    </th>
                                    <th id="viabilidad">
                                        {{ __('Viabilidad') }}
                                    </th>
                                    <th id="observacion">
                                        {{ __('Observación') }}
                                    </th>
                                    <th id="notas">
                                        {{ __('Notas/Comentarios') }}
                                    </th>
                                    <th id="cosnentimiento">
                                        {{ __('Envio Consentimiento') }}
                                    </th>
                                    <th id="acciones" class="text-right">
                                        {{ __('Accion') }}
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
                                                {{ $dato->user->cargo }}
                                            </td>
                                            <td>
                                                {{ $dato->horaEntrada }}
                                            </td>
                                            <td>
                                                {{ $dato->horaSalida }}
                                            </td>
                                            <td class="table-{{ $dato->estadoColor }}">
                                                {{ $dato->viabilidad_caracterizacion }}
                                            </td>
                                            <td>
                                                {{ $dato->observacion_cambios_de_estado }}
                                            </td>
                                            <td>
                                                {{ $dato->notas_comentarios_ma_andrea_leyva }}
                                            </td>
                                            <td>
                                                {{ $dato->envio_de_consentimiento }}
                                            </td>
                                            @can('create', App\Model\Caracterizacion\Caracterizacion::class)
                                                <td class="td-actions text-right">
                                                    <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('caracterizacion.edit', $dato->id)}}" data-original-title="Editar Caracterizaciones" title="Editar Caracterizaciones">
                                                        <i class="material-icons">edit</i>
                                                        <div class="ripple-container"></div>
                                                </td>
                                            @endcan
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
