<div class="tab-content">
<div role="tabpanel" class="tab-pane active" id="empleado">
   <div class="col-md-6">
      <div class="row">
         <label class="col-sm-4 col-form-label">{{ __('Facultad/Unidad') }}</label>
         <div class="col-sm-7">
            <div class="form-group{{ $errors->has('unidad_id') ? ' has-danger' : '' }}">
               <select class="form-control{{ $errors->has('unidad_id') ? ' is-invalid' : '' }}" id="input-rol"  aria-required="true" name="unidad_id">
                  <option value="">Seleccionar</option>
                  @foreach($unidades as $unidad )
                  <option value="{{ $unidad->id }}" {{ $unidad->id ==  $user->unidad_id ? 'selected="selected"' : '' }}>{{ $unidad->nombre_unidad }}</option>
                  @endforeach                                    
               </select>
            </div>
         </div>
      </div>
   </div>
   <div class="row">
      <label class="col-sm-2 col-form-label">{{ __('Dependencia') }}</label>
      <div class="col-sm-4">
         <div class="form-group{{ $errors->has('dependencia') ? ' has-danger' : '' }}">
            <textarea class="form-control{{ $errors->has('dependencia') ? ' is-invalid' : '' }}" name="dependencia" id="input-dependencia" type="" placeholder="{{ __('Dependencia') }}" value="{{old('dependencia', $caracterizacion->dependencia)}}" >{{old('dependencia', $caracterizacion->dependencia)}}</textarea>
            @if ($errors->has('dependencia'))
            <span id="dependencia-error" class="error text-danger" for="input-dependencia">{{ $errors->first('dependencia') }}</span>
            @endif
         </div>
      </div>
   </div>
   <div class="row">
      <label class="col-md-2 col-form-label">{{ __('Cargo') }}</label>
      <div class="col-md-4">
         <div class="form-group{{ $errors->has('cargo') ? ' has-danger' : '' }}">
            <input class="form-control{{ $errors->has('cargo') ? ' is-invalid' : '' }}" name="cargo" id="input-cargo" type="text" placeholder="{{ __('Cargo') }}" value="{{old('cargo', $user->cargo)}}" aria-required="true"/>
            @if ($errors->has('cargo'))
            <span id="cargo-error" class="error text-danger" for="input-cargo">{{ $errors->first('cargo') }}</span>
            @endif
         </div>
      </div>
   </div>
   <div class="row">
      <label class="col-sm-2 col-form-label">{{ __('Nombres') }}</label>
      <div class="col-sm-4">
         <div class="form-group{{ $errors->has('nombre') ? ' has-danger' : '' }}">
            <input class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" id="input-nombre" type="text" placeholder="{{ __('Nombre') }}" value="{{  old('nombre', $user->name.' '.$user->apellido) }}"  aria-required="true"/>
            @if ($errors->has('nombre'))
            <span id="nombre-error" class="error text-danger" for="input-nombre">{{ $errors->first('nombre') }}</span>
            @endif
         </div>
      </div>
   </div>
   <div class="row">
      <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
      <div class="col-sm-4">
         <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
            <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="text" placeholder="{{ __('email') }}" value="{{ old('email' , $user->email) }}"  aria-required="true"/>
            @if ($errors->has('email'))
            <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
            @endif
         </div>
      </div>
   </div>
   <div class="row">
      <label class="col-md-2 col-form-label">{{ __('Documento') }}</label>
      <div class="col-md-4">
         <div class="form-group{{ $errors->has('documento') ? ' has-danger' : '' }}">
            <input class="form-control{{ $errors->has('documento') ? ' is-invalid' : '' }}" name="documento" id="input-documento" type="text" placeholder="{{ __('Documento') }}" value="{{old('documento' , $user->documento)}}" aria-required="true"/>
            @if ($errors->has('documento'))
            <span id="documento-error" class="error text-danger" for="input-documento">{{ $errors->first('documento') }}</span>
            @endif
         </div>
      </div>
   </div>
   <div class="row">
      <label class="col-md-2 col-form-label">{{ __('Tipo de Contrato') }}</label>
      <div class="col-md-4">
         <div class="form-group{{ $errors->has('tipo_contrato') ? ' has-danger' : '' }}">
            <input class="form-control{{ $errors->has('tipo_contrato') ? ' is-invalid' : '' }}" name="tipo_contrato" id="input-tipo_contrato" type="text" placeholder="{{ __('Tipo de Contrato') }}" value="{{ old('tipo_contrto' , $user->tipo_contrato)}}" aria-required="true"/>
            @if ($errors->has('tipo_contrato'))
            <span id="tipo_contrato-error" class="error text-danger" for="input-tipo_contrato">{{ $errors->first('tipo_contrato') }}</span>
            @endif
         </div>
      </div>
   </div>
   <div class="row">
      <label class="col-sm-2 col-form-label">{{ __('Dirección') }}</label>
      <div class="col-sm-4">
         <div class="form-group{{ $errors->has('direccion') ? ' has-danger' : '' }}">
            <textarea class="form-control{{ $errors->has('direccion') ? ' is-invalid' : '' }}" name="direccion" id="input-direccion" type="" placeholder="{{ __('Dirección') }}" value="{{ old('direccion', $user->direccion) }}"  rows="1" >{{ old('direccion', $user->direccion) }}</textarea>
            @if ($errors->has('direccion'))
            <span id="direccion-error" class="error text-danger" for="input-direccion">{{ $errors->first('direccion') }}</span>
            @endif
         </div>
      </div>
   </div>
   <div class="row">
      <label class="col-sm-2 col-form-label">{{ __('Barrio') }}</label>
      <div class="col-sm-4">
         <div class="form-group{{ $errors->has('direccion2') ? ' has-danger' : '' }}">
            <textarea class="form-control{{ $errors->has('direccion2') ? ' is-invalid' : '' }}" name="direccionb" id="input-direccion2" type="" placeholder="{{ __('Barrio') }}" value="{{ old('barrio' ,$user->direccion2) }}"  rows="1" >{{ old('direccion2',$user->direccion2) }}</textarea>
            @if ($errors->has('direccion2'))
            <span id="direccion2-error" class="error text-danger" for="input-direccion2">{{ $errors->first('direccion2') }}</span>
            @endif
         </div>
      </div>
   </div>
   <div class="row">
      <label class="col-sm-2 col-form-label">{{ __('Localidad') }}</label>
      <div class="col-sm-4">
         <div class="form-group{{ $errors->has('direccion2') ? ' has-danger' : '' }}">
            <textarea class="form-control{{ $errors->has('direccion2') ? ' is-invalid' : '' }}" name="direccionl" id="input-direccion2" type="" placeholder="{{ __('Localidad') }}" value="{{ old('direccion2',$user->direccion2) }}"  rows="1" >{{ old('direccion2' ,$user->direccion2) }}</textarea>
            @if ($errors->has('direccion2'))
            <span id="direccion2-error" class="error text-danger" for="input-direccion2">{{ $errors->first('direccion2') }}</span>
            @endif
         </div>
      </div>
   </div>
   <div class="row">
      <label class="col-sm-2 col-form-label">{{ __('¿Por responsabilidades es indispensable su trabajo presencial?') }}</label>
      <div class="col-sm-4">
         <div class="form-group{{ $errors->has('indispensable_presencial') ? ' has-danger' : '' }}">
            <div class="togglebutton">
               <label id="lb-indispensable">
                  <input data-target="#toggle-indispensable" aria-expanded="false" aria-controls="collapse" data-toggle="collapse" name="indispensable_presencial" type="checkbox" value="{{$caracterizacion->indispensable_presencial}}" {{ $caracterizacion->indispensable_presencial ==  'Si' ? 'cheked="cheked"' : '' }}></input>
                  <span class="toggle"></span>
               </label>
            </div>
            @if ($errors->has('indispensable_presencial'))
            <span id="indispensable_presencial-error" class="error text-danger" for="input-indispensable_presencial" >{{ $errors->first('pregunta1') }}</span>
            @endif
         </div>
      </div>
   </div>
   <div id="toggle-indispensable" name="toggle-indispensable" class="collapse">
      <div class="row">
         <label class="col-sm-2 col-form-label">{{ __('¿Por qué?') }}</label>
         <div class="col-sm-4">
            <div class="form-group{{ $errors->has('por_que') ? ' has-danger' : '' }}">
               <textarea class="form-control{{ $errors->has('por_que') ? ' is-invalid' : '' }}" name="por_que" id="input-por_que" type="" placeholder="{{ __('¿Por qué?') }}" value="{{ old('por_que') }}"  rows="4">{{ old('por_que') }}</textarea>
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
               <input class="form-control" name="hora_entrada" id="input-hora" type="time" placeholder="{{ __('Hora') }}" value="{{ old('hora') }}"  />
            </div>
         </div>
      </div>
      <div class="row">
         <label class="col-sm-2 col-form-label" for="input-hora">{{ __('Hora de Salida') }}</label>
         <div class="col-sm-4">
            <div class="form-group">
               <input class="form-control" name="hora_salida" id="input-hora" type="time" placeholder="{{ __('Hora') }}" value="{{ old('hora') }}"  />
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
                           <option value="{{$dia_laboral}}" @if(in_array($dia_laboral, $dias_laborales)) selected @endif>{{$dia_laboral}}</option>
                     @endforeach
               </select>
            </div>
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
</script>
@endpush