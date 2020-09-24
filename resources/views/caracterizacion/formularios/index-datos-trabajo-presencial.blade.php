@if($caracterizacion->indispensable_presencial == "si" || $caracterizacion->indispensable_presencial == "Si")
<div class="row col-md-12">
  <div class="col-md-6">
    <label class="col-sm-4 col-form-label">{{ __('¿Por responsabilidades es indispensable su trabajo presencial?') }}</label>
    <div class="col-sm-8">
      <span>{{ $caracterizacion->indispensable_presencial }}</span>
    </div>
  </div>
  <div class="col-md-6">
    <label class="col-sm-4 col-form-label">{{ __('¿Por qué?') }}</label>
    <div class="col-sm-8">
      <span>{{ $caracterizacion->por_que }}</span>
    </div>
  </div>
</div>
  <div class="row col-md-12">
    <div class="col-md-6">
          <label class="col-sm-4 col-form-label">{{ __('Hora de Entrada') }}</label>
          <div class="col-sm-8">
            <span>{{ $caracterizacion->horaEntrada }}</span>
          </div>
    </div>
    <div class="col-md-6">
          <label class="col-sm-4 col-form-label">{{ __('Hora de Salida') }}</label>
          <div class="col-sm-8">
            <span>{{ $caracterizacion->horaSalida }}</span>
          </div>
    </div>
  </div>

  <div class="col-md-12">
        <label class="col-sm-4 col-form-label">{{ __('Días Laborales') }}</label>
        <div class="col-sm-8">
          <span>{{ $caracterizacion->dias_laborales }}</span>
        </div>
  </div>
@endif
