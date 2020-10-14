
   <div class="col-md-12">
         <label class="col-sm-4 col-form-label">{{ __('Facultad/Unidad') }}</label>
         <div class="col-sm-8">
           <span>{{ $user->unidad->nombre_unidad }}</span>
         </div>
  </div>
   <div class="col-md-12">
      <label class="col-sm-4 col-form-label">{{ __('Dependencia') }}</label>
      <div class="col-sm-8">
        <span>{{ $caracterizacion->dependencia }}</span>
      </div>
   </div>
   <div class="col-md-12">
      <label class="col-sm-4 col-form-label">{{ __('Cargo') }}</label>
      <div class="col-sm-8">
        <span>{{ $user->cargo }}</span>
      </div>
   </div>
   <div class="col-md-12">
      <label class="col-sm-4 col-form-label">{{ __('Nombre') }}</label>
      <div class="col-sm-8">
        <span>{{ $user->name }}</span>
      </div>
   </div>
