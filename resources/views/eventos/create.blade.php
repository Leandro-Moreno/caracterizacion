@extends('layouts.app', ['activePage' => 'eventos', 'titlePage' => __('Eventos')])

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
                <h4 class="card-title">{{ __('Añadir evento') }}</h4>
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
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Nombre') }}</label>
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
                  <label class="col-sm-2 col-form-label">{{ __('Descripción') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('descripcion') ? ' has-danger' : '' }}">
                       <textarea class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" name="descripcion" id="input-descripcion" type="" placeholder="{{ __('Descripción') }}" value="{{ old('descripcion') }}"  rows="3" required>{{ old('descripcion') }}</textarea>
                      @if ($errors->has('descripcion'))
                        <span id="descripcion-error" class="error text-danger" for="input-descripcion">{{ $errors->first('descripcion') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-fecha">{{ __('Fecha') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('fecha') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('fecha') ? ' is-invalid' : '' }}" input type="date" name="fecha" id="input-fecha" placeholder="{{ __('Fecha') }}" value="{{ old('fecha') }}"  required/>
                      @if ($errors->has('fecha'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('fecha') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-hora">{{ __('Duración') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="hora" id="input-hora" type="number" placeholder="{{ __('Hora') }}" value="{{ old('hora') }}"  min="0" required step="any" />
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
