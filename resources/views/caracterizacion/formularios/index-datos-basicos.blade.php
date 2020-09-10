
   <div class="col-md-6">
         <label class="col-sm-4 col-form-label">{{ __('Facultad/Unidad') }}</label>
         <div class="col-sm-8">
           <span>{{ $user->unidad->nombre_unidad }}</span>
         </div>
  </div>
   <div class="col-md-6">
      <label class="col-sm-4 col-form-label">{{ __('Dependencia') }}</label>
      <div class="col-sm-8">
        <span>{{ $caracterizacion->dependencia }}</span>
      </div>
   </div>
   <div class="col-md-6">
      <label class="col-sm-4 col-form-label">{{ __('Cargo') }}</label>
      <div class="col-sm-8">
        <span>{{ $user->cargo }}</span>
      </div>
   </div>
   <div class="col-md-6">
      <label class="col-sm-4 col-form-label">{{ __('Nombre') }}</label>
      <div class="col-sm-8">
        <span>{{ $user->name }}</span>
      </div>
   </div>
   <div class="col-md-6">
      <label class="col-sm-4 col-form-label">{{ __('Email') }}</label>
      <div class="col-sm-8">
        <span>{{ $user->email }}</span>
      </div>
   </div>

   <div class="col-md-6">
      <label class="col-sm-4 col-form-label">{{ __('Documento') }}</label>
      <div class="col-sm-8">
        <span>{{ $user->documento }}</span>
      </div>
   </div>
   <div class="col-md-6">
      <label class="col-sm-4 col-form-label">{{ __('Tipo de Contrato') }}</label>
      <div class="col-sm-8">
        <span>{{ $user->tipo_contrato }}</span>
      </div>
   </div>
   <div class="col-md-6">
      <label class="col-sm-4 col-form-label">{{ __('Dirección') }}</label>
      <div class="col-sm-8">
        <span>{{ $user->direccion }}</span>
      </div>
   </div>
   <div class="col-md-6">
      <label class="col-sm-4 col-form-label">{{ __('Barrio') }}</label>
      <div class="col-sm-8">
        <span>{{ $user->barrio }}</span>
      </div>
   </div>
   <div class="col-md-6">
      <label class="col-sm-4 col-form-label">{{ __('Localidad') }}</label>
      <div class="col-sm-8">
        <span>{{ $user->localidad }}</span>
      </div>
   </div>
