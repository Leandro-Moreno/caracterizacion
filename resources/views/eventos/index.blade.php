@extends('layouts.app', ['activePage' => 'eventos', 'titlePage' => __('Eventos')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">{{ __('Eventos') }}</h4>
                <p class="card-category"> {{ __('Aquí puedes gestionar tus eventos') }}</p>
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
                    <a href="{{ route('eventos.create') }}" class="btn btn-sm btn-primary">{{ __('Añadir evento') }}</a>
                  </div>
                </div>
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
                            {{ $dato->hora }}
                          </td>
                          <td class="td-actions text-right">
                              <form action="{{ route('eventos.destroy', $dato) }}" method="post">
                                  @csrf
                                  @method('delete')

                                  <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('eventos.edit', $dato) }}" data-original-title="" title="">
                                    <i class="material-icons">edit</i>
                                    <div class="ripple-container"></div>
                                  </a>
                              </form>
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
