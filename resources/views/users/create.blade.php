@extends('layouts.app', ['activePage' => 'user-management', 'titlePage' => __('Gestión de usuarios')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="POST" action="{{ route('createuser') }}" autocomplete="off" class="form-horizontal">
            @csrf
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Crear usuario') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('user.index') }}" class="btn btn-sm btn-primary">{{ __('Volver a la lista') }}</a>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="row">
                      <label class="col-md-3 col-form-label">{{ __('Primer nombre') }}</label>
                      <div class="col-md-9">
                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                          <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Primer nombre') }}" value="{{ old('name') }}" required="true" aria-required="true"/>
                          @if ($errors->has('name'))
                            <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="row">
                    <label class="col-md-3 col-form-label">{{ __('Segundo nombre') }}</label>
                    <div class="col-md-9">
                      <div class="form-group{{ $errors->has('name2') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('name2') ? ' is-invalid' : '' }}" name="name2" id="input-name2" type="text" placeholder="{{ __('Segundo nombre') }}" value="{{ old('name2') }}" aria-required="true"/>
                        @if ($errors->has('name2'))
                          <span id="name2-error" class="error text-danger" for="input-name2">{{ $errors->first('name2') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                  </div>
                  <div class="col-md-6">
                    <div class="row">
                    <label class="col-md-3 col-form-label">{{ __('Primer apellido') }}</label>
                    <div class="col-md-9">
                      <div class="form-group{{ $errors->has('apellido') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('apellido') ? ' is-invalid' : '' }}" name="apellido" id="input-apellido" type="text" placeholder="{{ __('Primer apellido') }}" value="{{ old('apellido') }}" aria-required="true"/>
                        @if ($errors->has('apellido'))
                          <span id="apellido-error" class="error text-danger" for="input-apellido">{{ $errors->first('apellido') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                  </div>
                  <div class="col-md-6">
                    <div class="row">
                      <label class="col-md-3 col-form-label">{{ __('Segundo apellido') }}</label>
                      <div class="col-md-9">
                        <div class="form-group{{ $errors->has('apellido2') ? ' has-danger' : '' }}">
                          <input class="form-control{{ $errors->has('apellido2') ? ' is-invalid' : '' }}" name="apellido2" id="input-apellido2" type="text" placeholder="{{ __('Segundo apellido') }}" value="{{ old('apellido2') }}" aria-required="true"/>
                          @if ($errors->has('apellido2'))
                            <span id="apellido2-error" class="error text-danger" for="input-apellido2">{{ $errors->first('apellido2') }}</span>
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="row">
                      <label class="col-md-3 col-form-label">{{ __('Tipo documento') }}</label>
                      <div class="col-md-9">
                        <div class="form-group{{ $errors->has('tipo_doc') ? ' has-danger' : '' }}">
                          <input class="form-control{{ $errors->has('tipo_doc') ? ' is-invalid' : '' }}" name="tipo_doc" id="input-tipo_doc" type="text" placeholder="{{ __('Tipo documento') }}" value="{{ old('tipo_doc') }}" aria-required="true"/>
                          @if ($errors->has('tipo_doc'))
                            <span id="tipo_doc-error" class="error text-danger" for="input-tipo_doc">{{ $errors->first('tipo_doc') }}</span>
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="row">
                      <label class="col-md-3 col-form-label">{{ __('Documento') }}</label>
                      <div class="col-md-9">
                        <div class="form-group{{ $errors->has('documento') ? ' has-danger' : '' }}">
                          <input class="form-control{{ $errors->has('documento') ? ' is-invalid' : '' }}" name="documento" id="input-documento" type="text" placeholder="{{ __('Documento') }}" value="{{ old('documento') }}" aria-required="true"/>
                          @if ($errors->has('documento'))
                            <span id="documento-error" class="error text-danger" for="input-documento">{{ $errors->first('documento') }}</span>
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="row">
                      <label class="col-md-3 col-form-label">{{ __('Email') }}</label>
                      <div class="col-md-9">
                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                          <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="email" placeholder="{{ __('Email') }}" value="{{ old('email') }}" required />
                          @if ($errors->has('email'))
                            <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <hr />
                <div class="row">
                  <div class="col-md-6">
                    <div class="row">
                      <label class="col-md-3 col-form-label">{{ __('Cargo') }}</label>
                      <div class="col-md-9">
                        <div class="form-group{{ $errors->has('cargo') ? ' has-danger' : '' }}">
                          <input class="form-control{{ $errors->has('cargo') ? ' is-invalid' : '' }}" name="cargo" id="input-cargo" type="text" placeholder="{{ __('Cargo') }}" value="{{ old('cargo') }}" aria-required="true"/>
                          @if ($errors->has('cargo'))
                            <span id="cargo-error" class="error text-danger" for="input-cargo">{{ $errors->first('cargo') }}</span>
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="row">
                      <label class="col-sm-3 col-form-label">{{ __('Facultad/Unidad') }}</label>
                      <div class="col-sm-7">
                        <div class="form-group{{ $errors->has('unidad_id') ? ' has-danger' : '' }}">
                          <select class="form-control{{ $errors->has('unidad_id') ? ' is-invalid' : '' }}" id="input-rol" required="true" aria-required="true" name="unidad_id">
                            @foreach($unidades as $unidad)
                              <option value="{{ $unidad->id }}">{{ $unidad->nombre_unidad }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="row">
                      <label class="col-md-3 col-form-label">{{ __('Dependecia') }}</label>
                      <div class="col-md-9">
                        <div class="form-group{{ $errors->has('dependencia') ? ' has-danger' : '' }}">
                          <input class="form-control{{ $errors->has('dependencia') ? ' is-invalid' : '' }}" name="dependencia" id="input-dependencia" type="text" placeholder="{{ __('Dependencia') }}" value="{{ old('dependencia') }}" aria-required="true"/>
                          @if ($errors->has('dependencia'))
                            <span id="dependencia-error" class="error text-danger" for="input-dependencia">{{ $errors->first('dependencia') }}</span>
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="row">
                      <label class="col-md-3 col-form-label">{{ __('Direccion') }}</label>
                      <div class="col-md-9">
                        <div class="form-group{{ $errors->has('direccion') ? ' has-danger' : '' }}">
                          <input class="form-control{{ $errors->has('direccion') ? ' is-invalid' : '' }}" name="direccion" id="input-direccion" type="text" placeholder="{{ __('Direccion') }}" value="{{ old('direccion') }}" aria-required="true"/>
                          @if ($errors->has('direccion'))
                            <span id="direccion-error" class="error text-danger" for="input-direccion">{{ $errors->first('direccion') }}</span>
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="row">
                      <label class="col-md-3 col-form-label">{{ __('Celular') }}</label>
                      <div class="col-md-9">
                        <div class="form-group{{ $errors->has('celular') ? ' has-danger' : '' }}">
                          <input class="form-control{{ $errors->has('celular') ? ' is-invalid' : '' }}" name="celular" id="input-celular" type="number" placeholder="{{ __('Celular') }}" value="{{ old('celular') }}" aria-required="true"/>
                          @if ($errors->has('celular'))
                            <span id="celular-error" class="error text-danger" for="input-celular">{{ $errors->first('celular') }}</span>
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="row">
                      <label class="col-md-3 col-form-label">{{ __('Barrio') }}</label>
                      <div class="col-md-9">
                        <div class="form-group{{ $errors->has('direccion2') ? ' has-danger' : '' }}">
                          <input class="form-control{{ $errors->has('direccion2') ? ' is-invalid' : '' }}" name="direccion2" id="input-direccion2" type="text" placeholder="{{ __('Direccion') }}" value="{{ old('direccion2') }}" aria-required="true"/>
                          @if ($errors->has('direccion2'))
                            <span id="direccion2-error" class="error text-danger" for="input-direccion2">{{ $errors->first('direccion2') }}</span>
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="row">
                      <label class="col-md-3 col-form-label">{{ __('Localidad') }}</label>
                      <div class="col-md-9">
                        <div class="form-group{{ $errors->has('direccion2') ? ' has-danger' : '' }}">
                          <input class="form-control{{ $errors->has('direccion2') ? ' is-invalid' : '' }}" name="direccion2" id="input-direccion2" type="text" placeholder="{{ __('Direccion') }}" value="{{ old('direccion2') }}" aria-required="true"/>
                          @if ($errors->has('direccion2'))
                            <span id="direccion2-error" class="error text-danger" for="input-direccion2">{{ $errors->first('direccion2') }}</span>
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="row">
                      <label class="col-md-3 col-form-label">{{ __('Tipo Contrato') }}</label>
                      <div class="col-md-9">
                        <div class="form-group{{ $errors->has('tipo_contrato') ? ' has-danger' : '' }}">
                          <input class="form-control{{ $errors->has('tipo_contrato') ? ' is-invalid' : '' }}" name="tipo_contrato" id="input-tipo_contrato" type="text" placeholder="{{ __('Tipo Contrato') }}" value="{{ old('tipo_contrato') }}" aria-required="true"/>
                          @if ($errors->has('tipo_contrato'))
                            <span id="tipo_contrato-error" class="error text-danger" for="input-tipo_contrato">{{ $errors->first('tipo_contrato') }}</span>
                          @endif
                        </div>
                      </div>
                    </div>
                  </div> 
                  <div class="col-md-6">
                        <div class="row">
                              <label class="col-sm-3 col-form-label">{{ __('Estado') }}</label>
                            <div class="col-sm-9">
                              <div class="form-group{{ $errors->has('estado_id') ? ' has-danger' : '' }}">
                                <select class="form-control{{ $errors->has('estado_id') ? ' is-invalid' : '' }}" id="input-estado" required="true" aria-required="true" name="estado_id">
                                    @foreach($estados as $estado)
                                      <option value="{{ $estado->id }}">{{ $estado->nombre }}</option>
                                    @endforeach
                                </select>     
                              </div>
                            </div>
                        </div>
                    </div>         
                    @can('updateByRol', App\User::class)
                      <div class="col-md-6">
                          <div class="row">
                            <label class="col-sm-3 col-form-label">{{ __('Rol') }}</label>
                            <div class="col-sm-9">
                                <div class="form-group{{ $errors->has('rol_id') ? ' has-danger' : '' }}">
                                  <select class="form-control{{ $errors->has('rol_id') ? ' is-invalid' : '' }}" id="input-rol" required="true" aria-required="true" name="rol_id">
                                            @foreach($roles as $rol)
                                         <option value="{{ $rol->id }}">{{ $rol->nombre }}</option>
                                            @endforeach
                                  </select>   
                              </div>
                          </div>
                      </div>
                    @endcan
                    
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
