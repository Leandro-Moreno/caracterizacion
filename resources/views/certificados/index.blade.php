@extends('layouts.app', ['activePage' => 'certificados', 'titlePage' => __('Certificados')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">{{ __('Certificados') }}</h4>
                <p class="card-category"> {{ __('Aquí puedes gestionar tus certificados') }}</p>
              </div>
              <div class="card-body">
                @if (session('status'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif

                @if (session('error'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('error') }}</span>
                      </div>
                    </div>
                  </div>
                @endif

                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                          {{ __('Nombre') }}
                      </th>
                      <th>
                        {{ __('Fecha') }}
                      </th>
                      <th>
                        {{ __('Duración') }}
                      </th>
                      <th class="text-right">
                        {{ __('Descargar') }}
                      </th>
                    </thead>
                    <tbody>
                      @foreach($datos as $dato)
                        <tr>
                          <td>
                            {{ $dato->eventos->nombre }}
                          </td>
                          <td>
                            {{ $dato->eventos->fecha }}
                          </td>
                          <td>
                            {{ $dato->eventos->hora }} Horas
                          </td>
                          <td class="td-actions text-right">
                            <a rel="tooltip" class="btn btn-success btn-link" href="{{ url('certificados/'.$dato->evento_id.'/'.Auth::user()->id) }}" data-original-title="" title="">
                              <i class="material-icons">cloud_download</i> DESCARGAR
                              <div class="ripple-container"></div>
                            </a>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
