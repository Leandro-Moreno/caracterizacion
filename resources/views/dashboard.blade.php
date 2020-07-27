@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Inicio')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        @if (Auth::user()->rol_id == 3)
        <div class="col-lg-4 col-md-6 col-sm-6">
          <a class="nav-link" href="{{ route('certificados') }}">
          <div class="card card-stats">
            <div class="card-header card-header-primary card-header-icon">
              <div class="card-icon">
                <i class="material-icons">picture_as_pdf</i>
              </div>
              <p class="card-category">{{ __('Administrar') }}</p>
              <h4 class="card-title">{{ __('Certificados') }}
              </h4>
            </div>
            <div class="card-footer">
              <div class="stats">

              </div>
            </div>
          </div>
          </a>
        </div>
        @endif

        @if (Auth::user()->rol_id <= 2)
        @if($eventos->count() > 0)
        <div class="col-lg-4 col-md-6 col-sm-6">
          <a class="" href="{{ route('eventos') }}">
          <div class="card card-stats">
            <div class="card-header card-header-primary card-header-icon">
              <div class="card-icon">
                <i class="material-icons">next_week</i>
              </div>
              <p class="card-category">{{ __('Administrar') }}</p>
              <h4 class="card-title">{{ __('Eventos') }}
              </h4>
            </div>
            <div class="card-footer">
              <div class="stats col-xl-12">
                <div class="table-responsive">
                  <table class="table">

                      <tbody>
                  @foreach($eventos as $evento)
                  <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$evento->nombre}}</td>
                    <td class="td-actions text-right"><a rel="tooltip" class="" href="{{ route('eventos.edit', $evento) }}" data-original-title="" title="">
                      <i class="material-icons">edit</i>
                      <div class="ripple-container"></div>
                    </a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              </div>
              </div>
            </div>
          </div>
          </a>
        </div>
        @endif
        <div class="col-lg-4 col-md-6 col-sm-6">
          <a class="" href="{{ route('asistentes') }}">
          <div class="card card-stats">
            <div class="card-header card-header-danger   card-header-icon">
              <div class="card-icon">
                <i class="material-icons">supervisor_account</i>
              </div>
              <p class="card-category">{{ __('Administrar') }}</p>
              <h4 class="card-title">{{ __('Usuarios') }}
              </h4>
            </div>
            <div class="card-footer">
              <div class="stats col-lg-12 col-md-12 col-sm-12">
                <div class="table-responsive">
                  <table class="table">

                      <tbody>
                  @foreach($asistencia as $asistentes)
                  <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$asistentes->name}} {{$asistentes->apellido}}</td>
                    <td class="td-actions text-right"><a rel="tooltip" class="" href="{{ route('user.edit', $asistentes) }}" data-original-title="" title="">
                      <i class="material-icons">edit</i>
                      <div class="ripple-container"></div>
                    </a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              </div>
              </div>
            </div>
          </div>
        </a>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
          <a class="" href="{{ route('firmas') }}">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">create</i>
              </div>
              <p class="card-category">{{ __('Administrar') }}</p>
              <h4 class="card-title">{{ __('Firmas') }}
              </h4>
            </div>
            <div class="card-footer">
              <div class="stats col-lg-12 col-md-12 col-sm-12">
                <div class="table-responsive">
                  <table class="table">

                      <tbody>
                  @foreach($firmas as $firma)
                  <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$firma->nombre}}</td>
                    <td class="td-actions text-right"><a rel="tooltip" class="" href="{{ route('firmas.edit', $firma) }}" data-original-title="" title="">
                      <i class="material-icons">edit</i>
                      <div class="ripple-container"></div>
                    </a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              </div>
              </div>
            </div>
          </div>
        </a>
        </div>
        @endif


      </div>
    </div>
  </div>
@endsection
