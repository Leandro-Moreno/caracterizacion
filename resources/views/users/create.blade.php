@extends('layouts.app', ['activePage' => 'user-management', 'titlePage' => __('Gestión de usuarios')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('user.storecontroller', 'id') }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('post')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Agregar usuario') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('user.index') }}" class="btn btn-sm btn-primary">{{ __('Volver a la lista') }}</a>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Primer nombre') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Primer nombre') }}" value="{{ old('name') }}" required="true" aria-required="true"/>
                      @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Segundo nombre') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('name2') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name2') ? ' is-invalid' : '' }}" name="name2" id="input-name2" type="text" placeholder="{{ __('Segundo nombre') }}" value="{{ old('name2') }}" aria-required="true"/>
                      @if ($errors->has('name2'))
                        <span id="name2-error" class="error text-danger" for="input-name2">{{ $errors->first('name2') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Primer apellido') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('apellido') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('apellido') ? ' is-invalid' : '' }}" name="apellido" id="input-apellido" type="text" placeholder="{{ __('Primer apellido') }}" value="{{ old('apellido') }}" aria-required="true"/>
                      @if ($errors->has('apellido'))
                        <span id="apellido-error" class="error text-danger" for="input-apellido">{{ $errors->first('apellido') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Segundo apellido') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('apellido2') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('apellido2') ? ' is-invalid' : '' }}" name="apellido2" id="input-apellido2" type="text" placeholder="{{ __('Segundo apellido') }}" value="{{ old('apellido2') }}" aria-required="true"/>
                      @if ($errors->has('apellido2'))
                        <span id="apellido2-error" class="error text-danger" for="input-apellido2">{{ $errors->first('apellido2') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="email" placeholder="{{ __('Email') }}" value="{{ old('email') }}" required />
                      @if ($errors->has('email'))
                        <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Tipo documento') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('tipo_doc') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('tipo_doc') ? ' is-invalid' : '' }}" name="tipo_doc" id="input-tipo_doc" type="text" placeholder="{{ __('Tipo documento') }}" value="{{ old('tipo_doc') }}" aria-required="true"/>
                      @if ($errors->has('tipo_doc'))
                        <span id="tipo_doc-error" class="error text-danger" for="input-tipo_doc">{{ $errors->first('tipo_doc') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Documento') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('documento') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('documento') ? ' is-invalid' : '' }}" name="documento" id="input-documento" type="text" placeholder="{{ __('Documento') }}" value="{{ old('documento') }}" aria-required="true"/>
                      @if ($errors->has('documento'))
                        <span id="documento-error" class="error text-danger" for="input-documento">{{ $errors->first('documento') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Profesión') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('profesion') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('profesion') ? ' is-invalid' : '' }}" name="profesion" id="input-profesion" type="text" placeholder="{{ __('Profesión') }}" value="{{ old('profesion') }}" aria-required="true"/>
                      @if ($errors->has('profesion'))
                        <span id="profesion-error" class="error text-danger" for="input-profesion">{{ $errors->first('profesion') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Cargo') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('cargo') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('cargo') ? ' is-invalid' : '' }}" name="cargo" id="input-cargo" type="text" placeholder="{{ __('Cargo') }}" value="{{ old('cargo') }}" aria-required="true"/>
                      @if ($errors->has('cargo'))
                        <span id="cargo-error" class="error text-danger" for="input-cargo">{{ $errors->first('cargo') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Unidad/Facultad') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('unidad') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('unidad') ? ' is-invalid' : '' }}" name="unidad" id="input-unidad" type="text" placeholder="{{ __('unidad o facultad') }}" value="{{ old('unidad') }}" aria-required="true"/>
                      @if ($errors->has('unidad'))
                        <span id="unidad-error" class="error text-danger" for="input-unidad">{{ $errors->first('unidad') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Tipo de Contrato') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('tipo_contrato') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('tipo_contrato') ? ' is-invalid' : '' }}" name="tipo_contrato" id="input-tipo_contrato" type="text" placeholder="{{ __('Tipo de contrato') }}" value="{{ old('tipo_contrato') }}" aria-required="true"/>
                      @if ($errors->has('tipo_contrato'))
                        <span id="tipo_contrato-error" class="error text-danger" for="input-tipo_contrato">{{ $errors->first('tipo_contrato') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Celular') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('celular') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('celular') ? ' is-invalid' : '' }}" name="celular" id="input-celular" type="number" placeholder="{{ __('Celular') }}" value="{{ old('celular') }}" aria-required="true"/>
                      @if ($errors->has('celular'))
                        <span id="celular-error" class="error text-danger" for="input-celular">{{ $errors->first('celular') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Direccion') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('direccion') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('direccion') ? ' is-invalid' : '' }}" name="direccion" id="input-direccion" type="text" placeholder="{{ __('Direccion') }}" value="{{ old('direccion') }}" aria-required="true"/>
                      @if ($errors->has('direccion'))
                        <span id="direccion-error" class="error text-danger" for="input-direccion">{{ $errors->first('direccion') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Barrio') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('barrio') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('barrio') ? ' is-invalid' : '' }}" name="barrio" id="input-barrio" type="text" placeholder="{{ __('Barrio') }}" value="{{ old('barrio') }}" aria-required="true"/>
                      @if ($errors->has('barrio'))
                        <span id="barrio-error" class="error text-danger" for="input-barrio">{{ $errors->first('barrio') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Localidad') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('localidad') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('localidad') ? ' is-invalid' : '' }}" name="localidad" id="input-localidad" type="text" placeholder="{{ __('Localidad') }}" value="{{ old('localidad') }}" aria-required="true"/>
                      @if ($errors->has('localidad'))
                        <span id="localidad-error" class="error text-danger" for="input-localidad">{{ $errors->first('localidad') }}</span>
                      @endif
                    </div>
                  </div>
                </div>          
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Agregar usuario') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
