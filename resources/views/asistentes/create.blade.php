@extends('layouts.app', ['activePage' => 'asistentes', 'titlePage' => __('asistentes')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('asistentes.store') }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            @method('post')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Añadir asistentes') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ asset('prueba.xlsx') }}" class="btn btn-sm btn-success">{{ __('prueba.XLSX') }}</a>
                      <a href="{{ route('asistentes') }}" class="btn btn-sm btn-primary">{{ __('Volver a la lista') }}</a>
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
                  <label class="col-sm-2 col-form-label">{{ __('Evento') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('evento') ? ' has-danger' : '' }}">
                      <select class="form-control{{ $errors->has('evento') ? ' is-invalid' : '' }}" id="input-evento" required="true" aria-required="true" name="evento">
                        <option value="{{ old('evento') }}">Seleccionar</option>
                        @foreach($eventos as $evento )
                        <option value="{{ $evento->id }}">{{ $evento->nombre }}</option>
                        @endforeach
                      </select>
                      @if ($errors->has('evento'))
                        <span id="evento-error" class="error text-danger" for="input-evento">{{ $errors->first('evento') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-asistentes">{{ __('Asistentes') }}</label>
                  <div class="col-sm-7">
                    <div class="form-control-file">
                      <input class="form-control-file" name="asistentes" id="input-asistentes" type="file" required value="{{ old('asistentes') }}"  accept=".xlsx"/>
                    </div>
                  </div>
                </div>
                </div>

              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Añadir asistentes') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>



@endsection
