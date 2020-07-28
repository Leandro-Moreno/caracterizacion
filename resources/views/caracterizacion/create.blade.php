@extends('layouts.app', ['activePage' => 'eventos', 'titlePage' => __('Caracterización')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('eventos.store') }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            @method('post')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Añadir Caracterización') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('eventos') }}" class="btn btn-sm btn-primary">{{ __('Volver a la lista') }}</a>
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
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#unidad" aria-controls="unidad" role="tab" data-toggle="tab" class="btn btn-sm btn-primary">Empleado</a></li>
                    <li role="presentation"><a href="#centro" aria-controls="centro" role="tab" data-toggle="tab" class="btn btn-sm btn-primary">Centro Medico</a></li>
                    <li role="presentation"><a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab" class="btn btn-sm btn-primary" >GHDO</a></li>
                </ul> 
                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="unidad"><div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Facultad') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('firma') ? ' has-danger' : '' }}">
                      <select class="form-control{{ $errors->has('firma') ? ' is-invalid' : '' }}" id="input-firma" required="true" aria-required="true" name="firma">
                        <option value="{{ old('firma') }}">Seleccionar</option>
                        @foreach($firmas as $firma )
                        <option value="{{ $firma->id }}">{{ $firma->nombre }}</option>
                        @endforeach
                      </select>
                      @if ($errors->has('firma'))
                        <span id="firma-error" class="error text-danger" for="input-firma">{{ $errors->first('firma') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Depedencia') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('firma2') ? ' has-danger' : '' }}">
                      <select class="form-control{{ $errors->has('firma2') ? ' is-invalid' : '' }}" id="input-firma2" required="true" aria-required="true" name="firma2">
                        <option value="{{ old('firma2') }}">Seleccionar</option>
                        @foreach($firmas as $firma )
                        <option value="{{ $firma->id }}">{{ $firma->nombre }}</option>
                        @endforeach
                      </select>
                      @if ($errors->has('firma2'))
                        <span id="firma-error" class="error text-danger" for="input-firma">{{ $errors->first('firma2') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Cargo') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('firma2') ? ' has-danger' : '' }}">
                      <select class="form-control{{ $errors->has('firma2') ? ' is-invalid' : '' }}" id="input-firma2" required="true" aria-required="true" name="firma2">
                        <option value="{{ old('firma2') }}">Seleccionar</option>
                        @foreach($firmas as $firma )
                        <option value="{{ $firma->id }}">{{ $firma->nombre }}</option>
                        @endforeach
                      </select>
                      @if ($errors->has('firma2'))
                        <span id="firma-error" class="error text-danger" for="input-firma">{{ $errors->first('firma2') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Viabilidad por Caracterización') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('firma2') ? ' has-danger' : '' }}">
                      <select class="form-control{{ $errors->has('firma2') ? ' is-invalid' : '' }}" id="input-firma2" required="true" aria-required="true" name="firma2">
                        <option value="{{ old('firma2') }}">Seleccionar</option>
                        @foreach($firmas as $firma )
                        <option value="{{ $firma->id }}">{{ $firma->nombre }}</option>
                        @endforeach
                      </select>
                      @if ($errors->has('firma2'))
                        <span id="firma-error" class="error text-danger" for="input-firma">{{ $errors->first('firma2') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Tipo de contrato') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('firma2') ? ' has-danger' : '' }}">
                      <select class="form-control{{ $errors->has('firma2') ? ' is-invalid' : '' }}" id="input-firma2" required="true" aria-required="true" name="firma2">
                        <option value="{{ old('firma2') }}">Seleccionar</option>
                        @foreach($firmas as $firma )
                        <option value="{{ $firma->id }}">{{ $firma->nombre }}</option>
                        @endforeach
                      </select>
                      @if ($errors->has('firma2'))
                        <span id="firma-error" class="error text-danger" for="input-firma">{{ $errors->first('firma2') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Nombres') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('nombre') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" id="input-nombre" type="text" placeholder="{{ __('Nombre') }}" value="{{ old('nombre') }}" required="true" aria-required="true"/>
                      @if ($errors->has('nombre'))
                        <span id="nombre-error" class="error text-danger" for="input-nombre">{{ $errors->first('nombre') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Estado') }}</label>
                  <div class="col-sm-7">
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
                <!--Tab Unidad-->
                </div>
                    <div role="tabpanel" class="tab-pane" id="centro">
                    <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Nombres') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('nombre') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" id="input-nombre" type="text" placeholder="{{ __('Nombre') }}" value="{{ old('nombre') }}" required="true" aria-required="true"/>
                      @if ($errors->has('nombre'))
                        <span id="nombre-error" class="error text-danger" for="input-nombre">{{ $errors->first('nombre') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Depedencia') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('dependencia') ? ' has-danger' : '' }}">
                       <textarea class="form-control{{ $errors->has('dependencia') ? ' is-invalid' : '' }}" name="dependencia" id="input-dependencia" type="" placeholder="{{ __('Depedencia') }}" value="{{ old('dependencia') }}"  rows="3" required>{{ old('dependencia') }}</textarea>
                      @if ($errors->has('dependencia'))
                        <span id="dependencia-error" class="error text-danger" for="input-dependencia">{{ $errors->first('dependencia') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Cargo') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('cargo') ? ' has-danger' : '' }}">
                       <textarea class="form-control{{ $errors->has('cargo') ? ' is-invalid' : '' }}" name="cargo" id="input-cargo" type="" placeholder="{{ __('Cargo') }}" value="{{ old('cargo') }}"  rows="3" required>{{ old('cargo') }}</textarea>
                      @if ($errors->has('cargo'))
                        <span id="cargo-error" class="error text-danger" for="input-cargo">{{ $errors->first('cargo') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Firma Izquierda') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('firma') ? ' has-danger' : '' }}">
                      <select class="form-control{{ $errors->has('firma') ? ' is-invalid' : '' }}" id="input-firma" required="true" aria-required="true" name="firma">
                        <option value="{{ old('firma') }}">Seleccionar</option>
                        @foreach($firmas as $firma )
                        <option value="{{ $firma->id }}">{{ $firma->nombre }}</option>
                        @endforeach
                      </select>
                      @if ($errors->has('firma'))
                        <span id="firma-error" class="error text-danger" for="input-firma">{{ $errors->first('firma') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Firma Derecha') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('firma2') ? ' has-danger' : '' }}">
                      <select class="form-control{{ $errors->has('firma2') ? ' is-invalid' : '' }}" id="input-firma2" required="true" aria-required="true" name="firma2">
                        <option value="{{ old('firma2') }}">Seleccionar</option>
                        @foreach($firmas as $firma )
                        <option value="{{ $firma->id }}">{{ $firma->nombre }}</option>
                        @endforeach
                      </select>
                      @if ($errors->has('firma2'))
                        <span id="firma-error" class="error text-danger" for="input-firma">{{ $errors->first('firma2') }}</span>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Estado') }}</label>
                  <div class="col-sm-7">
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
                </div></div>
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
