@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Inicio')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
      @can('view', App\Model\Caracterizacion\Caracterizacion::class)
        <div class="col-lg-4 col-md-6 col-sm-6">
          <a class="" href="caracterizacion">
          <div class="card card-stats">
            <div class="card-header card-header-primary card-header-icon">
              <div class="card-icon">
                <i class="material-icons">next_week</i>
              </div>
              <p class="card-category">{{ __('Administrar') }}</p>
              <h4 class="card-title">{{ __('Caracterizaciones') }}
              </h4>
            </div>
            <div class="card-footer">
              <div class="stats col-xl-12">
                <div class="table-responsive">
                  <table class="table">
                      <tbody>
                  
                  <tr>
                  @foreach($envio_consentimiento as $envio)
                    @can('updateDashboard', $envio)
                      <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$envio->user->name}} {{$envio->user->apellido}}</td>
                        <td>{{$envio->envio_de_consentimiento}}</td>
                        <td class="td-actions text-right"><a rel="tooltip" class="" href="{{ route('caracterizacion.edit', $envio) }}" data-original-title="" title="">
                          <i class="material-icons">edit</i>
                          <div class="ripple-container"></div>
                        </a></td>
                      </tr>
                    @endcan
                  @endforeach
                </tbody>
              </table>
              </div>
              </div>
            </div>
          </div>
          </a>
        </div>
      @endcan
      @can('view', App\User::class)
        <div class="col-lg-4 col-md-6 col-sm-6">
          <a class="" href="user">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">supervisor_account</i>
              </div>
              <p class="card-category">{{ __('Administrar') }}</p>
              <h4 class="card-title">{{ __('Empleados') }}
              </h4>
            </div>
            <div class="card-footer">
              <div class="stats col-lg-12 col-md-12 col-sm-12">
                <div class="table-responsive">
                  <table class="table">
                    <tbody>
                    @foreach($ultimos_usuarios as $ultimousuario)
                    @can('updateDashboard' , $ultimousuario)
                      <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$ultimousuario->email}}</td>
                        <td class="td-actions text-right"><a rel="tooltip" class="" href="{{ route('user.edit', $ultimousuario) }}" data-original-title="" title="">
                          <i class="material-icons">edit</i>
                          <div class="ripple-container"></div>
                        </a></td>
                      </tr>
                    @endcan
                    @endforeach
                  </tbody>
              </table>
              </div>
              </div>
            </div>
          </div>
        </a>
        </div>
        @endcan
        @can('view', App\Model\Reporte\Reporte::class)
        <div class="col-lg-4 col-md-6 col-sm-6">
          <a class="nav-link" href="/reporte">
          <div class="card card-stats">
            <div class="card-header card-header-primary card-header-icon">
              <div class="card-icon">
                <i class="material-icons">picture_as_pdf</i>
              </div>
              <p class="card-category">{{ __('Administrar') }}</p>
              <h4 class="card-title">{{ __('Reportes') }}
              </h4>
            </div>
            <div class="card-footer">
              <div class="stats">

              </div>
            </div>
          </div>
          </a>
        </div>
        @endcan
      </div>
    </div>
    @can('view_note', App\Model\Caracterizacion\Caracterizacion::class )
    <div id="ofBar">
      <b> Nota de confidencialidad:</b>
        <br>  
        La información personal de los empleados es reservada y confidencial. Por ninguna circunstancia esta información debe circularse. El uso de esta información es únicamente para tomar decisiones asociadas con el retorno gradual al campus y con el fin de cumplir con los protocolos de bioseguridad establecidos en la resolución 666 de 2020, expedida por el Ministerio de Salud y Protección Social.
      </b><a id="close-bar">X</a>
    </div>
    @endcan
  </div>
@endsection

