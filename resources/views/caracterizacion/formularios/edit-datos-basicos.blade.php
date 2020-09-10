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
         <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Nombre') }}" value="{{  old('name', $user->name) }} "  aria-required="true"/>
            @if ($errors->has('name'))
            <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
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
         <div class="form-group{{ $errors->has('barrio') ? ' has-danger' : '' }}">
            <textarea class="form-control{{ $errors->has('barrio') ? ' is-invalid' : '' }}" name="barrio" id="input-barrio" type="" placeholder="{{ __('Barrio') }}" value="{{ old('barrio' ,$user->barrio) }}"  rows="1" >{{ old('barrio',$user->barrio) }}</textarea>
            @if ($errors->has('barrio'))
            <span id="barrio-error" class="error text-danger" for="input-barrio">{{ $errors->first('barrio') }}</span>
            @endif
         </div>
      </div>
   </div>
   <div class="row">
      <label class="col-sm-2 col-form-label">{{ __('Localidad') }}</label>
      <div class="col-sm-4">
         <div class="form-group{{ $errors->has('localidad') ? ' has-danger' : '' }}">
            <textarea class="form-control{{ $errors->has('localidad') ? ' is-invalid' : '' }}" name="localidad" id="input-localidad" type="" placeholder="{{ __('Localidad') }}" value="{{ old('localidad',$user->localidad) }}"  rows="1" >{{ old('localidad' ,$user->localidad) }}</textarea>
            @if ($errors->has('localidad'))
            <span id="localidad-error" class="error text-danger" for="input-localidad">{{ $errors->first('localidad') }}</span>
            @endif
         </div>
      </div>
   </div>
