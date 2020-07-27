@extends('layouts.app', ['activePage' => 'firmas', 'titlePage' => __('Firmas')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">{{ __('Firmas') }}</h4>
                <p class="card-category"> {{ __('Aquí puedes gestionar tus firmas') }}</p>
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
                    <a href="{{ route('firmas.create') }}" class="btn btn-sm btn-primary">{{ __('Añadir Firma') }}</a>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        {{ __('Nombre') }}
                      </th>
                      <th>
                        {{ __('Area') }}
                      </th>
                      <th>
                        {{ __('cargo') }}
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
                            {{ $dato->area }}
                          </td>
                          <td>
                            {{ $dato->cargo }}
                          </td>
                          <td class="td-actions text-right">
                              <form action="{{ route('firmas.destroy', $dato) }}" method="post">
                                  @csrf
                                  @method('delete')

                                  <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('firmas.edit', $dato) }}" data-original-title="" title="">
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
