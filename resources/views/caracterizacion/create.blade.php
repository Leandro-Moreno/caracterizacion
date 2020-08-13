@extends('layouts.app', ['activePage' => 'eventos', 'titlePage' => __('Caracterización')])
@section('content')
<div class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-12">
            <form method="post" action="{{ route('caracterizacion.store') }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
               @csrf
               @method('post')
               <div class="card ">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title">{{ __('Crear Caracterización') }}</h4>

                  </div>
                  <div class="card-body ">
                     <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#empleado" aria-controls="empleado" role="tab" data-toggle="tab" class="btn btn-sm btn-primary">Empleado</a></li>
                        @can('createTab' , App\Model\Caracterizacion\Caracterizacion::class)<li role="presentation"><a href="#centro" aria-controls="centro" role="tab" data-toggle="tab" class="btn btn-sm btn-danger">Centro Medico</a></li>@endcan
                        @can('createTab' , App\Model\Caracterizacion\Caracterizacion::class)<li role="presentation"><a href="#ghdo" aria-controls="ghdo" role="tab" data-toggle="tab" class="btn btn-sm btn-success" >GHDO</a></li>@endcan
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
                                    @if ($unidades)
                                            @foreach($unidades as $unidad)
                                                <option value="{{ $unidad->id }}">{{ $unidad->nombre_unidad }}</option>
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
                                          <textarea class="form-control{{ $errors->has('dependencia') ? ' is-invalid' : '' }}" name="dependencia" id="input-dependencia" type="" placeholder="{{ __('Dependencia') }}" value="{{ old('dependencia') }}"  rows="1" required>{{ old('deondencia') }}</textarea>
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
                                             <input class="form-control{{ $errors->has('cargo') ? ' is-invalid' : '' }}" name="cargo" id="input-cargo" type="text" placeholder="{{ __('Cargo') }}" value="" aria-required="true"/>
                                             @if ($errors->has('cargo'))
                                             <span id="cargo-error" class="error text-danger" for="input-cargo">{{ $errors->first('cargo') }}</span>
                                             @endif
                                          </div>
                                       </div>
                              </div>
                              <div class="row">
                                       <label class="col-sm-2 col-form-label">{{ __('Nombres') }}</label>
                                       <div class="col-sm-4">
                                          <div class="form-group{{ $errors->has('nombre') ? ' has-danger' : '' }}">
                                             <input class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" id="input-nombre" type="text" placeholder="{{ __('Nombre') }}" value="{{  old('nombre') }}" required="true" aria-required="true"/>
                                             @if ($errors->has('nombre'))
                                             <span id="nombre-error" class="error text-danger" for="input-nombre">{{ $errors->first('nombre') }}</span>
                                             @endif
                                          </div>
                                       </div>
                              </div>
                              <div class="row">
                                       <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                                       <div class="col-sm-4">
                                          <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                             <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="text" placeholder="{{ __('email') }}" value="{{ old('email' ) }}" required="true" aria-required="true"/>
                                             @if ($errors->has('email'))
                                             <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                                             @endif
                                          </div>
                                       </div>
                              </div>
                              <div class="row">
                                       <label class="col-md-2 col-form-label">{{ __('Documento') }}</label>
                                       <div class="col-md-4">
                                          <div class="form-group{{ $errors->has('documento') ? ' has-danger' : '' }}">
                                             <input class="form-control{{ $errors->has('documento') ? ' is-invalid' : '' }}" name="documento" id="input-documento" type="text" placeholder="{{ __('Documento') }}" value="{{old('documento' )}}" aria-required="true"/>
                                             @if ($errors->has('documento'))
                                             <span id="documento-error" class="error text-danger" for="input-documento">{{ $errors->first('documento') }}</span>
                                             @endif
                                          </div>
                                       </div>
                              </div>
                              <div class="row">
                                       <label class="col-md-2 col-form-label">{{ __('Celular') }}</label>
                                       <div class="col-md-4">
                                          <div class="form-group{{ $errors->has('celular') ? ' has-danger' : '' }}">
                                             <input class="form-control{{ $errors->has('celular') ? ' is-invalid' : '' }}" name="celular" id="input-celular" type="text" placeholder="{{ __('Celular') }}" value="{{old('celular' )}}" aria-required="true"/>
                                             @if ($errors->has('celular'))
                                             <span id="celular-error" class="error text-danger" for="input-celular">{{ $errors->first('celular') }}</span>
                                             @endif
                                          </div>
                                       </div>
                              </div>
                              <div class="row">
                                       <label class="col-md-2 col-form-label">{{ __('Tipo de Docuemento') }}</label>
                                       <div class="col-md-4">
                                          <div class="form-group{{ $errors->has('tipo_doc') ? ' has-danger' : '' }}">
                                             <input class="form-control{{ $errors->has('tipo_doc') ? ' is-invalid' : '' }}" name="tipo_doc" id="input-tipo_doc" type="text" placeholder="{{ __('Tipo de Documento') }}" value="{{ old('tipo_doc' )}}" aria-required="true"/>
                                             @if ($errors->has('tipo_doc'))
                                             <span id="tipo_doc-error" class="error text-danger" for="input-tipo_doc">{{ $errors->first('tipo_doc') }}</span>
                                             @endif
                                          </div>
                                       </div>
                              </div>
                              <div class="row">
                                       <label class="col-md-2 col-form-label">{{ __('Tipo de Contrato') }}</label>
                                       <div class="col-md-4">
                                          <div class="form-group{{ $errors->has('tipo_contrato') ? ' has-danger' : '' }}">
                                             <input class="form-control{{ $errors->has('tipo_contrato') ? ' is-invalid' : '' }}" name="tipo_contrato" id="input-tipo_contrato" type="text" placeholder="{{ __('Tipo de Contrato') }}" value="" aria-required="true"/>
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
                                          <textarea class="form-control{{ $errors->has('direccion') ? ' is-invalid' : '' }}" name="direccion" id="input-direccion" type="" placeholder="{{ __('Dirección') }}" value="{{ old('direccion') }}"  rows="1" required>{{ old('direccion') }}</textarea>
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
                                          <textarea class="form-control{{ $errors->has('direccion2') ? ' is-invalid' : '' }}" name="direccionb" id="input-direccion2" type="" placeholder="{{ __('Barrio') }}" value="{{ old('barrio') }}"  rows="1" required>{{ old('direccion2') }}</textarea>
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
                                          <textarea class="form-control{{ $errors->has('direccion2') ? ' is-invalid' : '' }}" name="direccionl" id="input-direccion2" type="" placeholder="{{ __('Localidad') }}" value="{{ old('direccion2') }}"  rows="1" required>{{ old('direccion2') }}</textarea>
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
                                          <input id="indispensableTogg" name="indispensable_presencial" type="checkbox" checked="" value="Si">{{ old('indispensable_presencial', 'Si') }}</input>
                                          <span class="toggle"></span>
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
                                       <textarea class="form-control{{ $errors->has('por_que') ? ' is-invalid' : '' }}" name="por_que" id="input-por_que" type="" placeholder="{{ __('¿Por qué?') }}" value="{{ old('por_que') }}"  rows="4" required>{{ old('por_que') }}</textarea>
                                       @if ($errors->has('por_que'))
                                       <span id="por_que-error" class="error text-danger" for="input-por_que">{{ $errors->first('por_que ') }}</span>
                                       @endif
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <label class="col-sm-2 col-form-label" for="input-hora">{{ __('Hora de Entrada') }}</label>
                                 <div class="col-sm-4">
                                 <div class="form-group">
                                    <input class="form-control" name="hora_entrada" id="input-hora" type="time" placeholder="{{ __('Hora') }}" value="{{ old('hora') }}"  />
                                 </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <label class="col-sm-2 col-form-label" for="input-hora">{{ __('Hora de Salida') }}</label>
                                 <div class="col-sm-4">
                                 <div class="form-group">
                                    <input class="form-control" name="hora_salida" id="input-hora" type="time" placeholder="{{ __('Hora') }}" value="{{ old('hora') }}"  />
                                 </div>
                                 </div>
                              </div>
                              <div class="row">
                                       <label class="col-sm-2 col-form-label">{{ __('Días Laborales') }}</label>
                                       <div class="col-sm-5">
                                          <div class="form-group{{ $errors->has('dias_laborales') ? ' has-danger' : '' }}">
                                             <select class="form-control{{ $errors->has('dias_laborales') ? ' is-invalid' : '' }}" id="input-dias_laborales" required="true" aria-required="true" rows="3" name="dias_laborales" multiple>
                                                <option value="{{ old('dias_laborales') }}" disabled selected>Seleccionar</option>
                                                <option value="1">Lunes </option>
                                                <option value="2">Martes</option>
                                                <option value="3">Miercoles</option>
                                                <option value="4">Jueves</option>
                                                <option value="5">Viernes</option>
                                                <option value="5">Sabado</option>
                                             </select>
                                          </div>
                                       </div>
                              </div>
                            </div>
                            <!--Tab Centro Meidco-->
                            <div role="tabpanel" class="tab-pane" id="centro">
                            <div class="row">
                                       <label class="col-sm-2 col-form-label">{{ __('Viabilidad por caracterización') }}</label>
                                       <div class="col-sm-5">
                                          <div class="form-group{{ $errors->has('viabilidad') ? ' has-danger' : '' }}">
                                             <select class="form-control{{ $errors->has('viabilidad') ? ' is-invalid' : '' }}" id="input-viabilidad" required="true" aria-required="true" name="viabilidad_caracterizacion">
                                                <option value="{{ old('viabilidad') }}" disabled>Seleccionar</option>
                                                <option value="Consultar con jefatura servicio médico y SST">Consultar con jefatura servicio médico y SST</option>
                                                <option value="Viable trabajo presencial">Viable trabajo presencial</option>
                                                <option value="Trabajo en casa y consultar a telemedicina">Trabajo en casa y consultar a telemedicina</option>
                                                <option value="Trabajo en casa">Trabajo en casa</option>
                                                <option value="Sin clasificación">Sin clasificación</option>
                                             </select>
                                          </div>
                                       </div>
                              </div>
                              <div class="row">
                                 <label class="col-sm-2 col-form-label">{{ __('Observación') }}</label>
                                 <div class="col-sm-4">
                                    <div class="form-group{{ $errors->has('observacion_cambios_de_estado') ? ' has-danger' : '' }}">
                                       <textarea class="form-control{{ $errors->has('observacion_cambios_de_estado') ? ' is-invalid' : '' }}" name="observacion_cambios_de_estado" id="input-observacion_cambios_de_estado" type="" placeholder="{{ __('Observación') }}" value="{{ old('observacion_cambios_de_estado') }}"  rows="3" required>{{ old('observacion_cambios_de_estado') }}</textarea>
                                       @if ($errors->has('observacion_cambios_de_estado'))
                                       <span id="observacion_cambios_de_estado-error" class="error text-danger" for="input-observacion_cambios_de_estado">{{ $errors->first('observacion') }}</span>
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
                                       <textarea class="form-control{{ $errors->has('notas_comentarios_ma_andrea_leyva') ? ' is-invalid' : '' }}" name="notas_comentarios_ma_andrea_leyva" id="input-notas_comentarios_ma_andrea_leyva" type="" placeholder="{{ __('Notas/Comentarios') }}" value="{{ old('notas_comentarios_ma_andrea_leyva') }}"  rows="3" required>{{ old('notas_comentarios_ma_andrea_leyva') }}</textarea>
                                       @if ($errors->has('notas_comentarios_ma_andrea_leyva'))
                                       <span id="notas_comentarios_ma_andrea_leyva-error" class="error text-danger" for="input-notas_comentarios_ma_andrea_leyva">{{ $errors->first('notas_comentarios_ma_andrea_leyva') }}</span>
                                       @endif
                                    </div>
                                 </div>
                              </div>
                           <div class="row">
                                 <label class="col-sm-2 col-form-label">{{ __('Envío del consentimiento') }}</label>
                                 <div class="col-sm-4">
                                    <div class="form-group{{ $errors->has('envio_de_consentimiento') ? ' has-danger' : '' }}">
                                       <div class="togglebutton">
                                          <label>
                                          <input name="envio_de_consentimiento" type="checkbox" checked="" value="Si">{{ old('envio_de_consentimiento', 'Si') }}</input>
                                          <span class="toggle"></span>
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
                  <button type="submit" class="btn btn-primary">{{ __('Añadir Caracterización') }}</button>
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
    if($("#indispensableTogg").prop( "checked" )){
    }
      $("#indispensableTogg").prop( "checked" )?$( "#toggContenido" ).text("No activo"):$( "#toggContenido" ).text("Activo");
      });
  </script>
  @endpush
@endsection
