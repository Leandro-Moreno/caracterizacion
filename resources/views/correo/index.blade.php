@extends('layouts.app', ['activePage' => 'correo', 'titlePage' => __('Gestión de correo')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('correo.update', $correo) }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('put')



            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Editar Correo') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('correo') }}" class="btn btn-sm btn-primary">{{ __('Volver a la lista') }}</a>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Host') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('host') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('host') ? ' is-invalid' : '' }}" name="host" id="input-host" type="text" placeholder="{{ __('Host') }}" value="{{ old('host', $correo->host) }}" required="true" aria-required="true"/>
                      @if ($errors->has('host'))
                        <span id="host-error" class="error text-danger" for="input-host">{{ $errors->first('host') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('driver') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('driver') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('driver') ? ' is-invalid' : '' }}" name="driver" id="input-driver" type="text" placeholder="{{ __('driver') }}" value="{{ old('driver', $correo->driver) }}" required="true" aria-required="true"/>
                      @if ($errors->has('driver'))
                        <span id="driver-error" class="error text-danger" for="input-driver">{{ $errors->first('driver') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('port') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('port') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('port') ? ' is-invalid' : '' }}" name="port" id="input-port" type="text" placeholder="{{ __('port') }}" value="{{ old('port', $correo->port) }}" required="true" aria-required="true"/>
                      @if ($errors->has('port'))
                        <span id="port-error" class="error text-danger" for="input-port">{{ $errors->first('port') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('encryption') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('encryption') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('encryption') ? ' is-invalid' : '' }}" name="encryption" id="input-encryption" type="text" placeholder="{{ __('encryption') }}" value="{{ old('encryption', $correo->encryption) }}" required="true" aria-required="true"/>
                      @if ($errors->has('encryption'))
                        <span id="encryption-error" class="error text-danger" for="input-encryption">{{ $errors->first('encryption') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('username') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('username') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" id="input-username" type="text" placeholder="{{ __('username') }}" value="{{ old('username', $correo->username) }}" required />
                      @if ($errors->has('username'))
                        <span id="username-error" class="error text-danger" for="input-username">{{ $errors->first('username') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-password">{{ __('Password') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" input type="password" name="password" id="input-password" placeholder="{{ __('Password') }}" value="{{ old('username', $correo->password) }}" required/>
                      @if ($errors->has('password'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('password') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('address') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('address') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" id="input-address" type="text" placeholder="{{ __('address') }}" value="{{ old('address', $correo->address) }}" required />
                      @if ($errors->has('address'))
                        <span id="address-error" class="error text-danger" for="input-address">{{ $errors->first('address') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('name') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('name') }}" value="{{ old('name', $correo->name) }}" required="true" aria-required="true"/>
                      @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
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
