@extends('layouts.app', ['activePage' => 'caracterizacion', 'titlePage' => __('Caracterización')])
@section('title', __('Unauthorized'))
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">{{ __('Sin permisos') }}</h4>
              <p class="card-category"> {{ __('Su rol no le permite editar esta pagina.') }}</p>
            </div>
            <div class="card-body">
              hola
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
@endsection
