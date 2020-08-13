@extends('layouts.app', ['activePage' => 'caracterizacion', 'titlePage' => __('Caracterización')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="put" action="{{ route('caracterizacion.update', $caracterizacion) }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
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
                        @can('editTab' , App\Model\Caracterizacion\Caracterizacion::class)<li role="presentation"><a href="#centro" aria-controls="centro" role="tab" data-toggle="tab" class="btn btn-sm btn-danger">Centro Medico</a></li>@endcan
                        @can('editTab' , App\Model\Caracterizacion\Caracterizacion::class)<li role="presentation"><a href="#ghdo" aria-controls="ghdo" role="tab" data-toggle="tab" class="btn btn-sm btn-success" >GHDO</a></li>@endcan
                     </ul>
                     <div class="row">
                        <div class="col-md-12 text-right">
                           <a href="{{ route('caracterizacion.index') }}" class="btn btn-sm btn-primary">{{ __('Volver a la lista') }}</a>
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
                           <div role="tabpanel" class="tab-pane active" id="empleado">
                           <div class="col-md-6">
                              <div class="row">
                                 <label class="col-sm-4 col-form-label">{{ __('Facultad/Unidad') }}</label>
                                 <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('unidad_id') ? ' has-danger' : '' }}">
                                    <select class="form-control{{ $errors->has('unidad_id') ? ' is-invalid' : '' }}" id="input-rol" required="true" aria-required="true" name="unidad_id">
                                       <option value="">Seleccionar</option>
                                      @if ($user)
                                          @foreach($unidades as $unidad )
                                                    <option value="{{ $unidad->id }}" {{ $unidad->id ==  $user->unidad_id ? 'selected="selected"' : '' }}>{{ $unidad->nombre_unidad }}</option>
                                          @endforeach
                                        @endif

                                    </select>
                                    </div>
                                 </div>
                              </div>
                              </div>
                              <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Dependencia') }}</label>
                                    <div class="col-sm-4">
                                      <div class="form-group{{ $errors->has('dependencia') ? ' has-danger' : '' }}">
                                          <textarea class="form-control{{ $errors->has('dependencia') ? ' is-invalid' : '' }}" name="dependencia" id="input-dependencia" type="" placeholder="{{ __('Dependencia') }}" value="{{ old('dependencia',  $caracterizacion->dependencia) }}"  rows="1" required>{{ old('dependencia',  $caracterizacion->dependencia)}}</textarea>
                                          @if ($errors->has('dependencia'))
                                          <span id="dependencia-error" class="error text-danger" for="input-dependencia">{{ $errors->first('dependencia') }}</span>
                                          @endif
                                      </div>
                                    </div>
                                </div>
                              <div class="row">
                                       <label class="col-md-2 col-form-label">{{ __('Cargo') }}</label>
                                       <div class="col-md-4">
                                          <div class="form-group{{ $errors->has('cargo') ? ' has-danger' : '' }}">
                                             <input class="form-control{{ $errors->has('cargo') ? ' is-invalid' : '' }}" name="cargo" id="input-cargo" type="text" placeholder="{{ __('Cargo') }}" value="{{old('cargo', $user->cargo)}}" aria-required="true"/>
                                             @if ($errors->has('cargo'))
                                             <span id="cargo-error" class="error text-danger" for="input-cargo">{{ $errors->first('cargo') }}</span>
                                             @endif
                                          </div>
                                       </div>
                              </div>
                              <div class="row">
                                       <label class="col-md-2 col-form-label">{{ __('Tipo de Contrato') }}</label>
                                       <div class="col-md-4">
                                          <div class="form-group{{ $errors->has('tipo_contrato') ? ' has-danger' : '' }}">
                                             <input class="form-control{{ $errors->has('tipo_contrato') ? ' is-invalid' : '' }}" name="tipo_contrato" id="input-tipo_contrato" type="text" placeholder="{{ __('Tipo de Contrato') }}" value="{{ old('tipo_contrto' , $user->tipo_contrato)}}" aria-required="true"/>
                                             @if ($errors->has('tipo_contrato'))
                                             <span id="tipo_contrato-error" class="error text-danger" for="input-tipo_contrato">{{ $errors->first('tipo_contrato') }}</span>
                                             @endif
                                          </div>
                                       </div>
                              </div>
                              <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Dirección') }}</label>
                                    <div class="col-sm-4">
                                      <div class="form-group{{ $errors->has('direccion') ? ' has-danger' : '' }}">
                                          <textarea class="form-control{{ $errors->has('direccion') ? ' is-invalid' : '' }}" name="direccion" id="input-direccion" type="" placeholder="{{ __('Dirección') }}" value="{{ old('direccion', $user->direccion) }}"  rows="1" required>{{ old('direccion', $user->direccion) }}</textarea>
                                          @if ($errors->has('direccion'))
                                          <span id="direccion-error" class="error text-danger" for="input-direccion">{{ $errors->first('direccion') }}</span>
                                          @endif
                                      </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Barrio') }}</label>
                                    <div class="col-sm-4">
                                      <div class="form-group{{ $errors->has('direccion2') ? ' has-danger' : '' }}">
                                          <textarea class="form-control{{ $errors->has('direccion2') ? ' is-invalid' : '' }}" name="direccionb" id="input-direccion2" type="" placeholder="{{ __('Barrio') }}" value="{{ old('barrio' ,$user->direccion2) }}"  rows="1" required>{{ old('direccion2',$user->direccion2) }}</textarea>
                                          @if ($errors->has('direccion2'))
                                          <span id="direccion2-error" class="error text-danger" for="input-direccion2">{{ $errors->first('direccion2') }}</span>
                                          @endif
                                      </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Localidad') }}</label>
                                    <div class="col-sm-4">
                                      <div class="form-group{{ $errors->has('direccion2') ? ' has-danger' : '' }}">
                                          <textarea class="form-control{{ $errors->has('direccion2') ? ' is-invalid' : '' }}" name="direccionl" id="input-direccion2" type="" placeholder="{{ __('Localidad') }}" value="{{ old('direccion2',$user->direccion2) }}"  rows="1" required>{{ old('direccion2' ,$user->direccion2) }}</textarea>
                                          @if ($errors->has('direccion2'))
                                          <span id="direccion2-error" class="error text-danger" for="input-direccion2">{{ $errors->first('direccion2') }}</span>
                                          @endif
                                      </div>
                                    </div>
                                </div>
                              <div class="row">
                                 <label class="col-sm-2 col-form-label">{{ __('¿Por responsabilidades es indispensable su trabajo presencial?') }}</label>
                                 <div class="col-sm-4">
                                    <div class="form-group{{ $errors->has('indispensable_presencial') ? ' has-danger' : '' }}">
                                       <div class="togglebutton">
                                          <label>
                                          <input name="indispensable_presencial" type="checkbox"  id="repTogg" value="{{$caracterizacion->indispensable_presencial}}"  {{ $caracterizacion->indispensable_presencial === 'Si' ? 'checked="checked"' : '' }}>{{ $caracterizacion->indispensable_presencial}}</input>
                                          <span class="toggle"></span>
                                          <span id="toggContenidoinds">{{ $caracterizacion->indispensable_presencial === 'Si' ? "Activo":"No activo" }}</span>
                                          </label>
                                       </div>
                                       @if ($errors->has('indispensable_presencial'))
                                       <span id="indispensable_presencial-error" class="error text-danger" for="input-indispensable_presencial">{{ $errors->first('indispensable_presencial') }}</span>
                                       @endif
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <label class="col-sm-2 col-form-label">{{ __('¿Por qué?') }}</label>
                                 <div class="col-sm-4">
                                    <div class="form-group{{ $errors->has('por_que') ? ' has-danger' : '' }}">
                                       <textarea class="form-control{{ $errors->has('por_que') ? ' is-invalid' : '' }}" name="por_que" id="input-por_que" type="" placeholder="{{ __('¿Por qué?') }}" value="{{ old('por_que', $caracterizacion->por_que) }}"  rows="4" required>{{ old('por_que', $caracterizacion->por_que) }}</textarea>
                                       @if ($errors->has('por_que'))
                                       <span id="por_que-error" class="error text-danger" for="input-por_que">{{ $errors->first('por_que') }}</span>
                                       @endif
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <label class="col-sm-2 col-form-label" for="input-hora">{{ __('Hora de Entrada') }}</label>
                                 <div class="col-sm-4">
                                 <div class="form-group">
                                    <input class="form-control" name="hora_entrada" id="input-hora" type="time" placeholder="{{ __('Hora') }}" value="{{ old('hora', $caracterizacion->horaEntrada) }}"  />
                                 </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <label class="col-sm-2 col-form-label" for="input-hora">{{ __('Hora de Salida') }}</label>
                                 <div class="col-sm-4">
                                 <div class="form-group">
                                    <input class="form-control" name="hora_salida" id="input-hora" type="time" placeholder="{{ __('Hora') }}" value="{{ old('hora', $caracterizacion->horaSalida) }}"  />
                                 </div>
                                 </div>
                              </div>
                              <div class="row">
                                       <label class="col-sm-2 col-form-label">{{ __('Días Laborales') }}</label>
                                       <div class="col-sm-5">
                                          <div class="form-group{{ $errors->has('dias_laborales') ? ' has-danger' : '' }}">
                                             <select class="form-control{{ $errors->has('dias_laborales') ? ' is-invalid' : '' }}" id="input-dias_laborales" required="true" aria-required="true" rows="3" name="dias_laborales" multiple>
                                                <option value="{{ old('dias_laborales') }}" disabled selected>Seleccionar</option>
                                                <option value="1" @if($caracterizacion->dias_laborales == '1') selected  @endif >Lunes </option>
                                                <option value="2" @if($caracterizacion->dias_laborales == '2') selected  @endif >Martes</option>
                                                <option value="3" @if($caracterizacion->dias_laborales == '3') selected  @endif >Miercoles</option>
                                                <option value="4" @if($caracterizacion->dias_laborales == '4') selected  @endif >Jueves</option>
                                                <option value="5" @if($caracterizacion->dias_laborales == '5') selected  @endif >Viernes</option>
                                                <option value="6"  @if($caracterizacion->dias_laborales == '6') selected  @endif >Sabado</option>
                                             </select>
                                          </div>
                                       </div>
                              </div>
                              <div class="row">
                                 <label class="col-sm-2 col-form-label">{{ __('Trabajo en casa') }}</label>
                                 <div class="col-sm-4">
                                    <div class="form-group{{ $errors->has('trabajo_en_casa') ? ' has-danger' : '' }}">
                                       <div class="togglebutton">
                                          <label>
                                          <input id="trabajo_en_casa" name="trabajo_en_casa" type="checkbox"  value="{{$caracterizacion->trabajo_en_casa}}"  @if($caracterizacion->trabajo_en_casa == 'Si') checked @endif>{{$caracterizacion->trabajo_en_casa}}</input>
                                          <span class="toggle"></span>
                                          <span id="toggTrabajo">{{ $caracterizacion->trabajo_en_casa == 'Si' ? "Si":"No" }}</span>
                                          </label>
                                       </div>
                                       @if ($errors->has('trabajo_en_casa'))
                                       <span id="trabajo_en_casa-error" class="error text-danger" for="input-trabajo_en_casa">{{ $errors->first('trabajo_en_casa') }}</span>
                                       @endif
                                    </div>
                                 </div>
                              </div>
                            </div>
                            <!--Tab Centro Meidco-->
                            <div role="tabpanel" class="tab-pane" id="centro">
                            <div class="row">
                                       <label class="col-sm-2 col-form-label">{{ __('Viabilidad por caracterización') }}</label>
                                       <div class="col-sm-5">
                                          <div class="form-group{{ $errors->has('viabilidad_caracterizacion') ? ' has-danger' : '' }}">
                                             <select class="form-control{{ $errors->has('viabilidad_caracterizacion') ? ' is-invalid' : '' }}" id="input-viabilidad_caracterizacion" required="true" aria-required="true" name="viabilidad_caracterizacion_caracterizacion">
                                                <option value="{{ old('viabilidad_caracterizacion') }}"disabled selected>Seleccionar</option>

                                                <option value="1" @if($caracterizacion->viabilidad_caracterizacion === 'Consultar con jefatura servicio médico y SST') selected  @endif >Consultar con jefatura servicio médico y SST</option>
                                                <option value="2" @if($caracterizacion->viabilidad_caracterizacion === 'Viable trabajo presencial') selected  @endif >Viable trabajo presencial</option>
                                                <option value="3" @if($caracterizacion->viabilidad_caracterizacion === 'Viable trabajo presencial') selected  @endif >Trabajo en casa y consultar a telemedicina</option>
                                                <option value="4" @if($caracterizacion->viabilidad_caracterizacion === 'Trabajo en casa y consultar a telemedicina') selected  @endif >Trabajo en casa</option>
                                                <option value="5" @if($caracterizacion->viabilidad_caracterizacion === 'Trabajo en casa') selected  @endif >Sin clasificación</option>
                                             </select>
                                          </div>
                                       </div>
                              </div>

                              <div class="row">
                                 <label class="col-sm-2 col-form-label">{{ __('Observación') }}</label>
                                 <div class="col-sm-4">
                                    <div class="form-group{{ $errors->has('observacion_cambios_de_estado') ? ' has-danger' : '' }}">
                                       <textarea class="form-control{{ $errors->has('observacion_cambios_de_estado') ? ' is-invalid' : '' }}" name="observacion_cambios_de_estado" id="input-observacion_cambios_de_estado" type="" placeholder="{{ __('Observación') }}" value="{{ old('observacion_cambios_de_estado', $caracterizacion->observacion_cambios_de_estado) }}"  rows="3" required>{{ old('observacion_cambios_de_estado', $caracterizacion->observacion_cambios_de_estado) }}</textarea>
                                       @if ($errors->has('observacion_cambios_de_estado'))
                                       <span id="observacion_cambios_de_estado-error" class="error text-danger" for="input-observacion_cambios_de_estado">{{ $errors->first('observacion_cambios_de_estado') }}</span>
                                       @endif
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div role="tabpanel" class="tab-pane" id="ghdo">
                              <div class="row">
                                 <label class="col-sm-2 col-form-label">{{ __('Notas/Comentarios') }}</label>
                                    <div class="col-sm-4">
                                       <div class="form-group{{ $errors->has('notas_comentarios_ma_andrea_leyva') ? ' has-danger' : '' }}">
                                          <textarea class="form-control{{ $errors->has('notas_comentarios_ma_andrea_leyva') ? ' is-invalid' : '' }}" name="notas_comentarios_ma_andrea_leyva" id="input-notas_comentarios_ma_andrea_leyva" type="" placeholder="{{ __('Notas / Comentarios') }}" value="{{ old('notas_comentarios_ma_andrea_leyva', $caracterizacion->notas_comentarios_ma_andrea_leyva)}}"  rows="3" required>{{ old('notas_comentarios_ma_andrea_leyva', $caracterizacion->notas_comentarios_ma_andrea_leyva)}}</textarea>
                                          @if ($errors->has('notas_comentarios_ma_andrea_leyva'))
                                          <span id="notas_comentarios_ma_andrea_leyva-error" class="error text-danger" for="input-notas_comentarios_ma_andrea_leyva">{{ $errors->first('notas_comentarios_ma_andrea_leyva') }}</span>
                                          @endif
                                       </div>
                                    </div>
                              </div>
                              <div class="row">
                                 <label class="col-sm-2 col-form-label">{{ __('Envío del consentimiento') }}</label>
                                 <div class="col-sm-4">                                    <div class="form-group{{ $errors->has('envio_de_consentimiento') ? ' has-danger' : '' }}">
                                       <div class="togglebutton">
                                          <label>
                                          <input id="#envio-consentimiento-togg" name="envio_de_consentimiento" type="checkbox"  value="{{$caracterizacion->envio_de_consentimiento}}" {{ $caracterizacion->envio_de_consentimiento === 'Si' ? 'checked="checked"' : '' }}>{{  $caracterizacion->envio_de_consentimiento }}</input>
                                          <span class="toggle"></span>
                                          <span id="toggEnvio">{{ $caracterizacion->envio_de_consentimiento === 'Si' ? "Activo":"No activo" }}</span>
                                          </label>
                                       </div>
                                       @if ($errors->has('envio_de_consentimiento'))
                                       <span id="envio_de_consentimiento-error" class="error text-danger" for="input-envio_de_consentimiento">{{ $errors->first('envio_de_consentimiento') }}</span>
                                       @endif
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
               </div>
               <div class="card-footer ml-auto mr-auto">
                  <button type="submit" class="btn btn-primary">{{ __('Guardar Caracterización') }}</button>
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
