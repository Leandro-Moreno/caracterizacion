@extends('layouts.app', ['activePage' => 'caracterizacion', 'titlePage' => __('Caracterización')])

@section('content')
    <div id="app" class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">{{ __('Caracterizaciones Covid de empleados en Uniandes') }}</h4>
                            @can('view_note', App\Model\Caracterizacion\Caracterizacion::class )
                            <div id="ofBar">
                              <b> Nota de confidencialidad:</b>
                                <br>
                                La información personal de los empleados es reservada y confidencial. Por ninguna circunstancia esta información debe circularse. El uso de esta información es únicamente para tomar decisiones asociadas con el retorno gradual al campus y con el fin de cumplir con los protocolos de bioseguridad establecidos en la resolución 666 de 2020, expedida por el Ministerio de Salud y Protección Social.
                              </b>
                            </div>
                            @endcan
                        </div>
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="card-body">
                            @can('create', App\Model\Caracterizacion\Caracterizacion::class)
                                @include('caracterizacion.busqueda')
                            @endcan
                            <div class="table-responsive tableFixHead">
                                <table id="tablaCaracterizacion" class="table table-striped table-sm">
                                    <thead class=" text-primary">
                                    @can('view_list_facultad' , App\Model\Caracterizacion\Caracterizacion::class)
                                    <th id="facultad" class="th-sm">
                                        {{ __('Facultad') }}
                                    </th>
                                    @endcan
                                    <th id="dependencia" class="th-sm">
                                        {{ __('Dependencia') }}
                                    </th>
                                    <th id="cargo" class="th-sm">
                                        {{ __('Cargo') }}
                                    </th>
                                    <th id="cedula" class="th-sm">
                                        {{ __('Cédula') }}
                                    </th>
                                    <th id="nombre" class="th-sm" style="max-width: 100px; word-break: break-all;">
                                        {{ __('Nombres') }}
                                    </th>
                                    <th id="tipo_con"  class="th-sm">
                                        {{ __('Tipo de contrato') }}
                                    </th>
                                    <th id="estado" class="th-sm">
                                        {{ __('Estado Actual') }}
                                    </th>
                                    <th id="indispensable_presencial" class="th-sm">
                                        {{ __('Indispensable presencial') }}
                                    </th>
                                    <th id="por_que" class="th-sm">
                                        {{ __('¿Por qué?') }}
                                    </th>
                                    <th id="hora_entrada" class="th-sm">
                                        {{ __('Hora de Entrada') }}
                                    </th>
                                    <th id="hora_Salida" class="th-sm">
                                        {{ __('Hora de Salida') }}
                                    </th>
                                    <th id="dias_laborales" class="th-sm">
                                        {{ __('Días laborales') }}
                                    </th>
                                    <th id="envio_carta" class="th-sm">
                                        {{ __('Envío del consentimiento') }}
                                    </th>
                                    <th id="viabilidad" class="th-sm">
                                        {{ __('Viabilidad') }}
                                    </th>

                                    <th id="acciones" class="text-right">
                                        {{ __('Acción') }}
                                    </th>
                                    </thead>
                                    <tbody>
                                    @foreach($caracterizaciones as $dato)
                                        <tr>
                                        @can('view_list_facultad' , $dato)
                                            <td>
                                                {{ $dato->user->unidad->nombre_unidad }}
                                            </td>
                                        @endcan
                                            <td>
                                                {{ $dato->dependencia }}
                                            </td>
                                            <td>
                                                {{ $dato->user->cargo }}
                                            </td>
                                            <td>
                                                {{ $dato->user->documento }}
                                            </td>
                                            <td>
                                                {{ $dato->user->name }}
                                            </td>
                                            <td>
                                                {{ $dato->user->tipo_contrato }}
                                            </td>
                                            <td>
                                                {{ $dato->user->estado->nombre}}
                                            </td>
                                            <td class="text-center">
                                                {{ $dato->indispensable_presencial }}
                                            </td>
                                            <td>
                                                {{ $dato->por_que }}
                                            </td>
                                            <td>
                                                {{ $dato->horaEntrada }}
                                            </td>
                                            <td>
                                                {{ $dato->horaSalida }}
                                            </td>
                                            <td>
                                                {{ $dato->dias_laborales}}
                                            </td>
                                            <td>
                                                {{ $dato->envio_de_consentimiento}}
                                            </td>
                                            <td class="{{$dato->estadoColor}}">
                                                {{ $dato->viabilidad_caracterizacion }}
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

                                {{ $caracterizaciones->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script type="text/javascript">

        $(".toggle").click(function(e){
            $("#repTogg").prop( "checked" )?$( "#toggContenidoinds" ).text("No Indispensable"):$( "#toggContenidoinds" ).text("Si");
            $("#trabajo_en_casa").prop( "checked" )?$( "#toggTrabajo" ).text("No"):$( "#toggTrabajo" ).text("Si");
            $("#envio-consentimiento-togg").prop( "checked" )?$( "#toggEnvio" ).text("No Envío"):$( "#toggEnvio" ).text("Si Envío");
        });
        // $(document).ready( function () {
        //     $('#tablaCaracterizacion').DataTable();
        // } );
        //
    </script>
@endpush
