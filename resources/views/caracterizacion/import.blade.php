@extends('layouts.app', ['activePage' => 'users-management', 'titlePage' => __('Gestión de Masiva Empleados')])
@section('content')
  <div class="content">
    <div class="container-fluid">
      @if (session('alert'))
          <div class="alert alert-success">
              {{ session('alert') }}
          </div>
      @endif
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('caracterizacion.importarCrear') }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
            @csrf

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Importar Caracterización') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ asset('prueba.xlsx') }}" class="btn btn-sm btn-success">{{ __('Cargar Excel') }}</a>
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
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-asistentes">{{ __('Archivo Excel') }}</label>
                  <div class="col-sm-7">
                    <div class="form-control-file">
                      <input class="form-control-file" name="caracterizacion" id="input-caracterizacion" type="file" required value="{{ old('caracterizacion') }}"  accept=".xlsx"/>
                    </div>
                  </div>
                </div>
                </div>

              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Añadir caracterizacion') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>



@endsection
