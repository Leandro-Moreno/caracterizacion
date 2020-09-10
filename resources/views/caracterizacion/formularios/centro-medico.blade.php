<div role="tabpanel" class="tab-pane" id="centro">
<div class="row">
           <label class="col-sm-2 col-form-label">{{ __('Viabilidad por caracterización') }}</label>
           <div class="col-sm-5">
              <div class="form-group{{ $errors->has('viabilidad') ? ' has-danger' : '' }}">
                 <select class="form-control{{ $errors->has('viabilidad') ? ' is-invalid' : '' }}" id="input-viabilidad" aria-required="true" name="viabilidad_caracterizacion">
                    <option value="{{ old('viabilidad') }}" disabled selected>Seleccionar</option>
                     @foreach($viabilidades as $viabilidad)
                     <option value="{{$viabilidad}}" @if($viabilidad == $caracterizacion->viabilidad_caracterizacion) selected @endif>{{$viabilidad}}</option>
                     @endforeach
                 </select>
              </div>
           </div>
  </div>
  <div class="row">
     <label class="col-sm-2 col-form-label">{{ __('Observación Dir. Servicios Campus') }}</label>
     <div class="col-sm-4">
        <div class="form-group{{ $errors->has('observacion_cambios_de_estado') ? ' has-danger' : '' }}">
           <textarea class="form-control{{ $errors->has('observacion_cambios_de_estado') ? ' is-invalid' : '' }}" name="observacion_cambios_de_estado" id="input-observacion_cambios_de_estado" type="" placeholder="{{ __('Observación') }}" value="{{ old('observacion_cambios_de_estado') }}"  rows="3" >{{old('observacion_cambios_de_estado', $caracterizacion->observacion_cambios_de_estado) }}</textarea>
           @if ($errors->has('observacion_cambios_de_estado'))
           <span id="observacion_cambios_de_estado-error" class="error text-danger" for="input-observacion_cambios_de_estado">{{ $errors->first('observacion') }}</span>
           @endif
        </div>
     </div>
  </div>
</div>
