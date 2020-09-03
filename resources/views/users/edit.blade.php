@extends('layouts.app', ['activePage' => 'user-management', 'titlePage' => __('Gestión de usuarios')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('user.update', $user) }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('put')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Editar usuario') }}</h4>
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
                      <label class="col-md-3 col-form-label">{{ __('Nombres') }}</label>
                      <div class="col-md-9">
                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                          <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Nombres y Apellidos') }}" value="{{ old('name', $user->name) }}" required="true" aria-required="true"/>
                          @if ($errors->has('name'))
                            <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
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
                          <input class="form-control{{ $errors->has('tipo_doc') ? ' is-invalid' : '' }}" name="tipo_doc" id="input-tipo_doc" type="text" placeholder="{{ __('Tipo documento') }}" value="{{ old('tipo_doc', $user->tipo_doc) }}" aria-required="true" required/>
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
                          <input class="form-control{{ $errors->has('documento') ? ' is-invalid' : '' }}" name="documento" id="input-documento" type="text" placeholder="{{ __('Documento') }}" value="{{ old('documento', $user->documento) }}" aria-required="true" required/>
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
                          <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="email" placeholder="{{ __('Email') }}" value="{{ old('email', $user->email) }}" required />
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
                          <input class="form-control{{ $errors->has('cargo') ? ' is-invalid' : '' }}" name="cargo" id="input-cargo" type="text" placeholder="{{ __('Cargo') }}" value="{{ old('cargo', $user->cargo) }}" aria-required="true"/>
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
                            <option value="{{ $user->unidad_id }}">{{$user->unidad->nombre_unidad}}</option>
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
                      <label class="col-md-3 col-form-label">{{ __('Direccion') }}</label>
                      <div class="col-md-9">
                        <div class="form-group{{ $errors->has('direccion') ? ' has-danger' : '' }}">
                          <input class="form-control{{ $errors->has('direccion') ? ' is-invalid' : '' }}" name="direccion" id="input-direccion" type="text" placeholder="{{ __('Direccion') }}" value="{{ old('direccion', $user->direccion) }}" aria-required="true"/>
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
                          <input class="form-control{{ $errors->has('celular') ? ' is-invalid' : '' }}" name="celular" id="input-celular" type="number" placeholder="{{ __('Celular') }}" value="{{ old('celular', $user->celular) }}" aria-required="true"/>
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
                        <div class="form-group{{ $errors->has('barrio') ? ' has-danger' : '' }}">
                          <input class="form-control{{ $errors->has('barrio') ? ' is-invalid' : '' }}" name="barrio" id="input-barrio" type="text" placeholder="{{ __('Barrio') }}" value="{{ old('barrio', $user->barrio) }}" aria-required="true"/>
                          @if ($errors->has('barrio'))
                            <span id="barrio-error" class="error text-danger" for="input-barrio">{{ $errors->first('barrio') }}</span>
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="row">
                      <label class="col-md-3 col-form-label">{{ __('Localidad') }}</label>
                      <div class="col-md-9">
                        <div class="form-group{{ $errors->has('localidad') ? ' has-danger' : '' }}">
                          <input class="form-control{{ $errors->has('localidad') ? ' is-invalid' : '' }}" name="localidad" id="input-localidad" type="text" placeholder="{{ __('Localidad') }}" value="{{ old('localidad', $user->localidad) }}" aria-required="true"/>
                          @if ($errors->has('localidad'))
                            <span id="localidad-error" class="error text-danger" for="input-localidad">{{ $errors->first('localidad') }}</span>
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
                          <input class="form-control{{ $errors->has('tipo_contrato') ? ' is-invalid' : '' }}" name="tipo_contrato" id="input-tipo_contrato" type="text" placeholder="{{ __('Tipo Contrato') }}" value="{{ old('tipo_contrato', $user->tipo_contrato) }}" aria-required="true"/>
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
                                    <option value="{{ $user->estado_id }}" >{{$user->estado->nombre}}</option>
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
                                        <option value="{{ $user->rol_id }}">{{$user->rol->nombre}}</option>
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
