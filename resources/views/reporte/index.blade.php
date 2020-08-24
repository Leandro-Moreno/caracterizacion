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
            @can('create', App\Model\Caracterizacion\Caracterizacion::class)
              @include('reporte.busqueda')
            @endcan
               <div class="row">
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
                                 {{ $dato->indispensable_presencial }}
                              </td>
                              <td>
                                 {{ $dato->horaEntrada }}
                              </td>
                              <td>
                                 {{ $dato->horaSalida }}
                              </td>
                              @can('view_facultad', $dato)
                              <td class="{{$dato->estadoColor}}">
                                 {{$dato->viabilidad_caracterizacion}}
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
    });

</script>
@endpush