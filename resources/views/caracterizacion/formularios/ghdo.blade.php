<div role="tabpanel" class="tab-pane" id="ghdo">
<div class="row">
      <label class="col-sm-2 col-form-label">{{ __('Notas/Comentarios') }}</label>
      <div class="col-sm-4">
         <div class="form-group{{ $errors->has('notas_comentarios_ma_andrea_leyva') ? ' has-danger' : '' }}">
            <textarea class="form-control{{ $errors->has('notas_comentarios_ma_andrea_leyva') ? ' is-invalid' : '' }}" name="notas_comentarios_ma_andrea_leyva" id="input-notas_comentarios_ma_andrea_leyva" type="" placeholder="{{ __('Notas/Comentarios') }}" value="{{ old('notas_comentarios_ma_andrea_leyva') }}"  rows="3" >{{ $caracterizacion->notas_comentarios_ma_andrea_leyva }}</textarea>
            @if ($errors->has('notas_comentarios_ma_andrea_leyva'))
            <span id="notas_comentarios_ma_andrea_leyva-error" class="error text-danger" for="input-notas_comentarios_ma_andrea_leyva">{{ $errors->first('notas_comentarios_ma_andrea_leyva') }}</span>
            @endif
         </div>
      </div>
   </div>
<div class="row mt-2 mb-4">
         <label class="col-sm-2 col-form-label">{{ __('Envío de carta de Autorización') }}</label>
         <div class="col-sm-4">
            <div class="form-group{{ $errors->has('envio_de_carta_autorizacion') ? ' has-danger' : '' }}">
               <div class="form-check">
                 <label class="form-check-label">
                   <input class="form-check-input" name="envio_de_carta_autorizacion" type="checkbox" value="si">
                   <span class="form-check-sign">
                     <span class="check"></span>
                   </span>
                 </label>
               </div>
               @if ($errors->has('envio_de_carta_autorizacion'))
               <span id="envio_de_carta_autorizacion-error" class="error text-danger" for="input-envio_de_carta_autorizacion">{{ $errors->first('envio_de_carta_autorizacion') }}</span>
               @endif
            </div>
         </div>
</div>

<div class="row mt-2 mb-4">
      <label class="col-sm-2 col-form-label">{{ __('Envío del consentimiento') }}</label>
      <div class="col-sm-4">
         <div class="form-group{{ $errors->has('envio_de_consentimiento') ? ' has-danger' : '' }}">
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" name="envio_de_consentimiento" type="checkbox" value="si">
                <span class="form-check-sign">
                  <span class="check"></span>
                </span>
              </label>
            </div>
            @if ($errors->has('envio_de_consentimiento'))
            <span id="envio_de_consentimiento-error" class="error text-danger" for="input-envio_de_consentimiento">{{ $errors->first('envio_de_consentimiento') }}</span>
            @endif
         </div>
      </div>
</div>

</div>
