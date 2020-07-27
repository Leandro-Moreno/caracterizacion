@extends('layouts.app', ['activePage' => 'asistentes', 'titlePage' => __('Asistentes')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">{{ __('Asistentes') }}</h4>
                <p class="card-category"> {{ __('Aquí puedes gestionar tus asistentes') }}</p>
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
                <div class="row">
                  <div class="col-12 text-right">
                    <a href="{{ route('asistentes.create') }}" class="btn btn-sm btn-primary">{{ __('Añadir asistentes') }}</a>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table table-striped">
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
                        {{ __('Acción') }}
                      </th>
                    </thead>
                    <tbody>
                      @foreach($datos as $dato)
                        <tr>
                          <td>
                            {{ $dato->nombre }}
                          </td>
                          <td>
                            {{ $dato->fecha }}
                          </td>
                          <td>
                            {{ $dato->hora }} Horas
                          </td>
                          <td class="td-actions text-right">
                              <a rel="tooltip" class="btn btn-success btn-link" href="{{ url('descargar/asistentes/'.$dato->id) }}" data-original-title="" title="">
                                REPORTE<i class="material-icons">cloud_download</i>
                                <div class="ripple-container"></div>
                              </a>
                              <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('asistentes.show', $dato) }}" data-original-title="" title="">
                                USUARIOS<i class="material-icons">search</i>
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
