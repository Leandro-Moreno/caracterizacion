@extends('layouts.app', ['activePage' => 'caracterizacion', 'titlePage' => __('Caracterización')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="put" action="" autocomplete="off" class="form-horizontal" novalidate enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Editar Caracterización de ') . $user->name . " " . $user->apellido }}</h4>
                <p class="card-category">{{ __('Correo')}}: {{$user->email}}</p>
                <p class="card-category">{{ __('Facultad')}}:{{$user->unidad->nombre_unidad}}</p>
              </div>
                <div class="card-body ">
                     <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#empleado" aria-controls="empleado" role="tab" data-toggle="tab" class="btn btn-sm btn-primary">Empleado</a></li>
                        @can('editPestañaSalud' , App\Model\Caracterizacion\Caracterizacion::class)<li role="presentation"><a href="#centro" aria-controls="centro" role="tab" data-toggle="tab" class="btn btn-sm btn-danger">Centro Medico</a></li>@endcan
                        @can('editPestañaGHDO' , App\Model\Caracterizacion\Caracterizacion::class)<li role="presentation"><a href="#ghdo" aria-controls="ghdo" role="tab" data-toggle="tab" class="btn btn-sm btn-success" >GHDO</a></li>@endcan
                     </ul>
                     <div class="row">
                        <div class="col-md-12 text-right">
                           <a href="{{ route('caracterizacion') }}" class="btn btn-sm btn-primary">{{ __('Volver a la lista') }}</a>
                        </div>
                     </div>
                     @if ($errors->any())
                     <div class="row">
                        <div class="col-sm-12">
                           <div class="alert alert-danger">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <i class="material-icons">close</i>
                              </button>
                              @foreach ($errors->all() as $error)
                              <span>{{ $error }}</span>
                              @endforeach
                           </div>
                        </div>
                     </div>
                     @endif
                     <div role="tabpanel">
                        <!-- Tab panes -->
                        <div class="tab-content">
                          @include('caracterizacion.formularios.datos-basicos')
                           @can('editPestañaSalud' , App\Model\Caracterizacion\Caracterizacion::class)
                             @include('caracterizacion.formularios.centro-medico')
                           @endcan
                           @can('editPestañaGHDO' , App\Model\Caracterizacion\Caracterizacion::class)
                            @include('caracterizacion.formularios.ghdo')
                          @endcan
                        </div>
                     </div>
               </div>
               <div class="card-footer ml-auto mr-auto">
                  <button type="button" class="btn btn-primary">{{ __('Guardar Caracterización') }}</button>
               </div>
         </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  @push('js')
  <script type="text/javascript">

  $(".toggle").click(function(e){
      $("#repTogg").prop( "checked" )?$( "#toggContenidoinds" ).text("No Indispensable"):$( "#toggContenidoinds" ).text("Si");
      $("#trabajo_en_casa").prop( "checked" )?$( "#toggTrabajo" ).text("No"):$( "#toggTrabajo" ).text("Si");
      $("#envio-consentimiento-togg").prop( "checked" )?$( "#toggEnvio" ).text("No Envío"):$( "#toggEnvio" ).text("Si Envío");
   });

  </script>
  @endpush
@endsection
