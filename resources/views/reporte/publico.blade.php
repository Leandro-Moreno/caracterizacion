@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'login', 'title' => __('Material Dashboard')])

@section('content')
<div class="container" style="height: auto;">
  <div class="row align-items-center">
    <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
      <form class="form" method="POST" action="{{ url('certificados/publico') }}">
        @csrf

        <div class="card card-login card-hidden mb-3">
          <div class="card-header card-header-primary text-center">
            <h4 class="card-title"><strong>{{ __('Validar certificado') }}</strong></h4>

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
            <p class="card-description text-center">{{ __('Digite el número de Certificado y el Documento de Identificación') }}</p>
            <div class="bmd-form-group{{ $errors->has('referencia') ? ' has-danger' : '' }}">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">check_circle_outline</i>
                  </span>
                </div>
                <input type="text" name="referencia" class="form-control" placeholder="{{ __('Referencia') }}" value="{{ old('referencia') }}" required>
              </div>
              @if ($errors->has('referencia'))
                <div id="referencia-error" class="error text-danger pl-3" for="referencia" style="display: block;">
                  <strong>{{ $errors->first('referencia') }}</strong>
                </div>
              @endif
            </div>
            <div class="bmd-form-group{{ $errors->has('documento') ? ' has-danger' : '' }}">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">fingerprint</i>
                  </span>
                </div>
                <input type="number" name="documento" class="form-control" placeholder="{{ __('Documento') }}" value="{{ old('documento') }}" required>
              </div>
              @if ($errors->has('documento'))
                <div id="documento-error" class="error text-danger pl-3" for="documento" style="display: block;">
                  <strong>{{ $errors->first('documento') }}</strong>
                </div>
              @endif
            </div>
          </div>
          <div class="card-footer justify-content-center">
            <button type="submit" class="btn btn-primary btn-link btn-lg">{{ __('Buscar') }}</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
