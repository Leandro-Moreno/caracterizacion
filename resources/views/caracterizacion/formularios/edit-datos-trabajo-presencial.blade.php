<div class="row">
      <label class="col-sm-2 col-form-label">{{ __('¿Por responsabilidades es indispensable su trabajo presencial?') }}</label>
      <div class="col-sm-4">
         <div class="form-group{{ $errors->has('indispensable_presencial') ? ' has-danger' : '' }}">
            <div class="form-check">
               <label class="form-check-label" id="lb-indispensable">
                  <input  class="form-check-input" data-target="#toggle-indispensable" aria-expanded="false" aria-controls="collapse" data-toggle="collapse" name="indispensable_presencial" type="checkbox" value="{{$caracterizacion->indispensable_presencial}}" {{ $caracterizacion->indispensable_presencial ==  "Si" ? 'checked' : '' }}></input>
                  <span class="form-check-sign">
                        <span class="check"></span>
                  </span>
               </label>
            </div>
            @if ($errors->has('indispensable_presencial'))
            <span id="indispensable_presencial-error" class="error text-danger" for="input-indispensable_presencial" >{{ $errors->first('indispensable_presencial') }}</span>
            @endif
         </div>
      </div>
   </div>
   <div id="toggle-indispensable" name="toggle-indispensable" class="collapse {{ $caracterizacion->indispensable_presencial ==  "Si" ? 'show' : '' }}">
      <div class="row">
      <label class="col-sm-2 col-form-label">{{ __('¿Por qué?') }}</label>
      <div class="col-sm-4">
         <div class="form-group{{ $errors->has('por_que') ? ' has-danger' : '' }}">
            <textarea class="form-control{{ $errors->has('por_que') ? ' is-invalid' : '' }}" name="por_que" id="input-por_que" type="" placeholder="{{ __('¿Por qué?') }}" value="{{ old('por_que') }}"  rows="4">{{ old('por_que', $caracterizacion->por_que) }}</textarea>
            @if ($errors->has('por_que'))
            <span id="por_que-error" class="error text-danger" for="input-por_que">{{ $errors->first('por_que') }}</span>
            @endif
         </div>
      </div>
   </div>
   <div class="row">
      <label class="col-sm-2 col-form-label" for="input-hora">{{ __('Hora de Entrada') }}</label>
      <div class="col-sm-4">
         <div class="form-group">
            <input class="form-control" name="hora_entrada" id="input-hora" type="time" placeholder="{{ __('Hora') }}" value="{{ old('hora', $caracterizacion->horaEntrada) }}"  />
         </div>
      </div>
   </div>
   <div class="row">
      <label class="col-sm-2 col-form-label" for="input-hora">{{ __('Hora de Salida') }}</label>
      <div class="col-sm-4">
         <div class="form-group">
            <input class="form-control" name="hora_salida" id="input-hora" type="time" placeholder="{{ __('Hora') }}" value="{{ old('hora', $caracterizacion->horaSalida) }}"  />
         </div>
      </div>
   </div>
   <div class="row">
      <label class="col-sm-2 col-form-label">{{ __('Días Laborales') }}</label>
      <div class="col-sm-5">
         <div class="form-group{{ $errors->has('dias_laborales') ? ' has-danger' : '' }}">
            <select class="form-control{{ $errors->has('dias_laborales') ? ' is-invalid' : '' }}" id="input_dias_laborales"  aria-required="true" rows="3" name="dias_laborales[]" multiple="multiple" >
               <option value="Ninguno" selected disabled >Seleccionar</option>
                  @foreach($semana_laboral as $dia_laboral)
                        <option value="{{$dia_laboral}}" @if($dias_laborales != null && in_array($dia_laboral, $dias_laborales) ) selected @endif>{{$dia_laboral}}</option>
                  @endforeach
            </select>
         </div>
      </div>
   </div>
</div>
@push('js')
<link rel="stylesheet" href="https://unpkg.com/multiple-select@1.5.2/dist/multiple-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://unpkg.com/multiple-select@1.5.2/dist/multiple-select.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
$('#input_dias_laborales').multipleSelect();
});
$(".toggle").click(function(e){

    $("#trabajo_en_casa").prop( "checked" )?$( "#toggTrabajo" ).text("No"):$( "#toggTrabajo" ).text("Si");
    $("#envio-consentimiento-togg").prop( "checked" )?$( "#toggEnvio" ).text("No Envío"):$( "#toggEnvio" ).text("Si Envío");
 });
</script>
@endpush
