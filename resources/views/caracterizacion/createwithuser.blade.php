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
                    <h4 class="card-title">{{ __('Crear Caracterización de ') . $userCaracterizacion->name . " " . $userCaracterizacion->apellido }}</h4>
                    <p class="card-category">{{ __('Correo')}}: {{$userCaracterizacion->email}}</p>
                    <p class="card-category">{{ __('Facultad')}}:{{$userCaracterizacion->unidad->nombre_unidad}}</p>
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
                                       @foreach($unidades as $unidad )
                                                    <option value="{{ $unidad->id }}" {{ $unidad->id ==  $userCaracterizacion->unidad_id ? 'selected="selected"' : '' }}>{{ $unidad->nombre_unidad }}</option>
                                          @endforeach                                    
                                    </select>
                                    </div>
                                 </div>
                              </div>
                              </div>
                              <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Dependencia') }}</label>
                                    <div class="col-sm-4">
                                      <div class="form-group{{ $errors->has('dependencia') ? ' has-danger' : '' }}">
                                      <textarea class="form-control{{ $errors->has('dependencia') ? ' is-invalid' : '' }}" name="dependencia" id="input-dependencia" type="" placeholder="{{ __('Dependencia') }}" value="{{old('dependencia', $userCaracterizacion->dependencia)}}" required>{{old('dependencia', $userCaracterizacion->dependencia)}}</textarea>
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
                                             <input class="form-control{{ $errors->has('cargo') ? ' is-invalid' : '' }}" name="cargo" id="input-cargo" type="text" placeholder="{{ __('Cargo') }}" value="{{old('cargo', $userCaracterizacion->cargo)}}" aria-required="true"/>
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
                                             <input class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" id="input-nombre" type="text" placeholder="{{ __('Nombre') }}" value="{{  old('nombre', $userCaracterizacion->name.' '.$userCaracterizacion->apellido) }}" required="true" aria-required="true"/>
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
                                             <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="text" placeholder="{{ __('email') }}" value="{{ old('email' , $userCaracterizacion->email) }}" required="true" aria-required="true"/>
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
                                             <input class="form-control{{ $errors->has('documento') ? ' is-invalid' : '' }}" name="documento" id="input-documento" type="text" placeholder="{{ __('Documento') }}" value="{{old('documento' , $userCaracterizacion->documento)}}" aria-required="true"/>
                                             @if ($errors->has('documento'))
                                             <span id="documento-error" class="error text-danger" for="input-documento">{{ $errors->first('documento') }}</span>
                                             @endif
                                          </div>
                                       </div>
                              </div>
                              <div class="row">
                                       <label class="col-md-2 col-form-label">{{ __('Tipo de Contrato') }}</label>
                                       <div class="col-md-4">
                                          <div class="form-group{{ $errors->has('tipo_contrato') ? ' has-danger' : '' }}">
                                             <input class="form-control{{ $errors->has('tipo_contrato') ? ' is-invalid' : '' }}" name="tipo_contrato" id="input-tipo_contrato" type="text" placeholder="{{ __('Tipo de Contrato') }}" value="{{ old('tipo_contrto' , $userCaracterizacion->tipo_contrato)}}" aria-required="true"/>
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
                                          <textarea class="form-control{{ $errors->has('direccion') ? ' is-invalid' : '' }}" name="direccion" id="input-direccion" type="" placeholder="{{ __('Dirección') }}" value="{{ old('direccion', $userCaracterizacion->direccion) }}"  rows="1" required>{{ old('direccion', $userCaracterizacion->direccion) }}</textarea>
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
                                          <textarea class="form-control{{ $errors->has('direccion2') ? ' is-invalid' : '' }}" name="direccionb" id="input-direccion2" type="" placeholder="{{ __('Barrio') }}" value="{{ old('barrio' ,$userCaracterizacion->direccion2) }}"  rows="1" required>{{ old('direccion2',$userCaracterizacion->direccion2) }}</textarea>
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
                                          <textarea class="form-control{{ $errors->has('direccion2') ? ' is-invalid' : '' }}" name="direccionl" id="input-direccion2" type="" placeholder="{{ __('Localidad') }}" value="{{ old('direccion2',$userCaracterizacion->direccion2) }}"  rows="1" required>{{ old('direccion2' ,$userCaracterizacion->direccion2) }}</textarea>
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
                                          <input name="indispensable_presencial" type="checkbox" checked="" value="1">{{ old('indispensable_presencial', 1) }}</input>
                                          <span class="toggle"></span>
                                          </label>
                                       </div>
                                       @if ($errors->has('indispensable_presencial'))
                                       <span id="indispensable_presencial-error" class="error text-danger" for="input-indispensable_presencial">{{ $errors->first('pregunta1') }}</span>
                                       @endif
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <label class="col-sm-2 col-form-label">{{ __('¿Por qué?') }}</label>
                                 <div class="col-sm-4">
                                    <div class="form-group{{ $errors->has('pregunta2') ? ' has-danger' : '' }}">
                                       <textarea class="form-control{{ $errors->has('pregunta2') ? ' is-invalid' : '' }}" name="pregunta2" id="input-pregunta2" type="" placeholder="{{ __('¿Por qué?') }}" value="{{ old('pregunta2') }}"  rows="4" required>{{ old('pregunta2') }}</textarea>
                                       @if ($errors->has('pregunta2'))
                                       <span id="pregunta2-error" class="error text-danger" for="input-pregunta2">{{ $errors->first('pregunta2') }}</span>
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
                                                <option value="{{ old('viabilidad') }}">Seleccionar</option>
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
                                    <div class="form-group{{ $errors->has('envio') ? ' has-danger' : '' }}">
                                       <div class="togglebutton">
                                          <label>
                                          <input name="envio" type="checkbox" checked="" value="1">{{ old('envio', 1) }}</input>
                                          <span class="toggle"></span>
                                          </label>
                                       </div>
                                       @if ($errors->has('envio'))
                                       <span id="envio-error" class="error text-danger" for="input-envio">{{ $errors->first('envio') }}</span>
                                       @endif
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                       <label class="col-sm-2 col-form-label">{{ __('Usuario que envía el consentimiento') }}</label>
                                       <div class="col-sm-5">
                                          <div class="form-group{{ $errors->has('userSender') ? ' has-danger' : '' }}">
                                             <select class="form-control{{ $errors->has('userSender') ? ' is-invalid' : '' }}" id="input-userSender" required="true" aria-required="true" name="userSender">
                                                <option value="">Seleccionar</option>
                                                @if ($sendingUser)
                                                   @foreach($sendingUser as $userSend)
                                                         <option value="{{ $userSend->id }}">{{ $userSend->name }} {{ $userSend->name2 }} {{ $userSend->apellido }} {{ $userSend->apellido2 }}</option>
                                                   @endforeach
                                                 @endif
                                             </select>
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
@endsection