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
                     <h4 class="card-title">{{ __('Añadir Caracterización') }}</h4>
                     <p class="card-category"></p>
                  </div>
                  <div class="card-body ">
                     <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#empleado" aria-controls="empleado" role="tab" data-toggle="tab" class="btn btn-sm btn-primary">Empleado</a></li>
                        <li role="presentation"><a href="#centro" aria-controls="centro" role="tab" data-toggle="tab" class="btn btn-sm btn-danger">Centro Medico</a></li>
                        <li role="presentation"><a href="#ghdo" aria-controls="ghdo" role="tab" data-toggle="tab" class="btn btn-sm btn-success" >GHDO</a></li>
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
                                          <textarea class="form-control{{ $errors->has('dependencia') ? ' is-invalid' : '' }}" name="dependencia" id="input-dependencia" type="" placeholder="{{ __('Dependencia') }}" value="{{ old('direccion') }}"  rows="1" required>{{ old('direccion') }}</textarea>
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
                                             <input class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" id="input-nombre" type="text" placeholder="{{ __('Nombre') }}" value="{{ old('nombre') }}" required="true" aria-required="true"/>
                                             @if ($errors->has('nombre'))
                                             <span id="nombre-error" class="error text-danger" for="input-nombre">{{ $errors->first('nombre') }}</span>
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
                                      <div class="form-group{{ $errors->has('dependencia') ? ' has-danger' : '' }}">
                                          <textarea class="form-control{{ $errors->has('dependencia') ? ' is-invalid' : '' }}" name="dependencia" id="input-dependencia" type="" placeholder="{{ __('Dirección') }}" value="{{ old('direccion') }}"  rows="1" required>{{ old('direccion') }}</textarea>
                                          @if ($errors->has('dependencia'))
                                          <span id="dependencia-error" class="error text-danger" for="input-dependencia">{{ $errors->first('dependencia') }}</span>
                                          @endif
                                      </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Barrio') }}</label>
                                    <div class="col-sm-4">
                                      <div class="form-group{{ $errors->has('dependencia') ? ' has-danger' : '' }}">
                                          <textarea class="form-control{{ $errors->has('dependencia') ? ' is-invalid' : '' }}" name="dependencia" id="input-dependencia" type="" placeholder="{{ __('Barrio') }}" value="{{ old('barrio') }}"  rows="1" required>{{ old('direccion2') }}</textarea>
                                          @if ($errors->has('dependencia'))
                                          <span id="dependencia-error" class="error text-danger" for="input-dependencia">{{ $errors->first('dependencia') }}</span>
                                          @endif
                                      </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Localidad') }}</label>
                                    <div class="col-sm-4">
                                      <div class="form-group{{ $errors->has('direccion2') ? ' has-danger' : '' }}">
                                          <textarea class="form-control{{ $errors->has('direccion2') ? ' is-invalid' : '' }}" name="direccion2" id="input-direccion2" type="" placeholder="{{ __('Localidad') }}" value="{{ old('direccion2') }}"  rows="1" required>{{ old('direccion2') }}</textarea>
                                          @if ($errors->has('direccion2'))
                                          <span id="direccion2-error" class="error text-danger" for="input-direccion2">{{ $errors->first('direccion2') }}</span>
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
                                          <div class="form-group{{ $errors->has('viabiliadad') ? ' has-danger' : '' }}">
                                             <select class="form-control{{ $errors->has('viabiliadad') ? ' is-invalid' : '' }}" id="input-viabiliadad" required="true" aria-required="true" name="viabiliadad">
                                                <option value="{{ old('viabiliadad') }}">Seleccionar</option>
                                                <option value="1">Consultar con jefatura servicio médico y SST</option>
                                                <option value="2">Viable trabajo presencial</option>
                                                <option value="3">Trabajo en casa y consultar a telemedicina</option>
                                                <option value="4">Trabajo en casa</option>
                                                <option value="5">Sin clasificación</option>
                                             </select>
                                          </div>
                                       </div>
                              </div>
                              <div class="row">
                                 <label class="col-sm-2 col-form-label">{{ __('Revisión Departamento Medico y Seguridad en el trabajo') }}</label>
                                 <div class="col-sm-4">
                                    <div class="form-group{{ $errors->has('revision1') ? ' has-danger' : '' }}">
                                       <textarea class="form-control{{ $errors->has('revision1') ? ' is-invalid' : '' }}" name="revision1" id="input-revision1" type="" placeholder="{{ __('Revisión Departamento Medico y Seguridad en el trabajo') }}" value="{{ old('revision1') }}"  rows="4" required>{{ old('revision1') }}</textarea>
                                       @if ($errors->has('revision1'))
                                       <span id="revision1-error" class="error text-danger" for="input-revision1">{{ $errors->first('revision1') }}</span>
                                       @endif
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <label class="col-sm-2 col-form-label">{{ __('Revisión Telemedicina') }}</label>
                                 <div class="col-sm-4">
                                    <div class="form-group{{ $errors->has('revision2') ? ' has-danger' : '' }}">
                                       <textarea class="form-control{{ $errors->has('revision2') ? ' is-invalid' : '' }}" name="revision2" id="input-revision2" type="" placeholder="{{ __('Revisión Telemedicina') }}" value="{{ old('revision2') }}"  rows="3" required>{{ old('revision2') }}</textarea>
                                       @if ($errors->has('revision2'))
                                       <span id="revision2-error" class="error text-danger" for="input-revision2">{{ $errors->first('revision2') }}</span>
                                       @endif
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <label class="col-sm-2 col-form-label">{{ __('Observación') }}</label>
                                 <div class="col-sm-4">
                                    <div class="form-group{{ $errors->has('observacion') ? ' has-danger' : '' }}">
                                       <textarea class="form-control{{ $errors->has('observacion') ? ' is-invalid' : '' }}" name="observacion" id="input-observacion" type="" placeholder="{{ __('Observación') }}" value="{{ old('observacion') }}"  rows="3" required>{{ old('observacion') }}</textarea>
                                       @if ($errors->has('observacion'))
                                       <span id="observacion-error" class="error text-danger" for="input-observacion">{{ $errors->first('observacion') }}</span>
                                       @endif
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div role="tabpanel" class="tab-pane" id="ghdo">
                           <div class="row">
                                 <label class="col-sm-2 col-form-label">{{ __('Notas/Comentarios') }}</label>
                                 <div class="col-sm-4">
                                    <div class="form-group{{ $errors->has('notas') ? ' has-danger' : '' }}">
                                       <textarea class="form-control{{ $errors->has('notas') ? ' is-invalid' : '' }}" name="notas" id="input-notas" type="" placeholder="{{ __('Notas/Comentarios') }}" value="{{ old('notas') }}"  rows="3" required>{{ old('notas') }}</textarea>
                                       @if ($errors->has('notas'))
                                       <span id="notas-error" class="error text-danger" for="input-notas">{{ $errors->first('notas') }}</span>
                                       @endif
                                    </div>
                                 </div>
                              </div>
                           <div class="row">
                                 <label class="col-sm-2 col-form-label">{{ __('Envío del consentimiento') }}</label>
                                 <div class="col-sm-4">
                                    <div class="form-group{{ $errors->has('estado') ? ' has-danger' : '' }}">
                                       <div class="togglebutton">
                                          <label>
                                          <input name="estado" type="checkbox" checked="" value="{{ old('estado', 1) }}">{{ old('estado', 1) }}</input>
                                          <span class="toggle"></span>
                                          </label>
                                       </div>
                                       @if ($errors->has('estado'))
                                       <span id="estado-error" class="error text-danger" for="input-estado">{{ $errors->first('estado') }}</span>
                                       @endif
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                       <label class="col-sm-2 col-form-label">{{ __('Usuario que envía el consentimiento') }}</label>
                                       <div class="col-sm-5">
                                          <div class="form-group{{ $errors->has('user') ? ' has-danger' : '' }}">
                                             <select class="form-control{{ $errors->has('user') ? ' is-invalid' : '' }}" id="input-user" required="true" aria-required="true" name="user">
                                                <option value="">Seleccionar</option>
                                             </select>
                                          </div>
                                       </div>
                              </div>
                           </div>
                        </div>
                     </div>
               </div>
               <div class="card-footer ml-auto mr-auto">
                  <button type="submit" class="btn btn-primary">{{ __('Añadir evento') }}</button>
               </div>
         </div>
         </form>
      </div>
   </div>
</div>
</div>
@endsection