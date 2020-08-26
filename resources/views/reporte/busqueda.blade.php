<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12" style="text-align:center">
   <div class="input-group">
      <buscar-component></buscar-component>
      <span class="input-group-btn">
      <button class="btn btn-info" type="button" data-toggle="collapse" data-target="#busqueda-avanzada" aria-expanded="false" aria-controls="collapseExample">
      Búsqueda Avanzada
      </button>
      </span>
   </div>
   <form class="">
      <div id="busqueda-avanzada" name="busqueda-avanzada" class=" row collapse" style="padding-top:5px;padding-bottom:35px">
         <div class="row">
            <div class="col-lg-6 col-md-3 col-sm-6 col-xs-12" style="text-align:center;margin-top:20px">
               <label style="color:#505c61"> Filtrar por Facultad / Unidad </label><br>
               <select id="unidad" name="unidad" class="form-control" data-placeholder=" ">
                  <option  value="" selected >Seleccione...</option>
                  @foreach($unidades as $unidad )
                  <option value="{{ $unidad->id }}" {{ $unidad->id  ==  $unidad_obtenida ? 'selected="selected"' : '' }}>{{ $unidad->nombre_unidad }}</option>
                  @endforeach
               </select>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="text-align:center;margin-top:20px">
               <label style="color:#505c61"> Filtrar por Rol </label><br>
               <select id="rol" name="rol" class="form-control" style="min-width:inherit !important" data-placeholder=" ">
                  <option  value="" selected >Seleccione...</option>
                  @foreach($roles as $rol )
                  <option value="{{ $rol->id }}" {{ $rol->id  ==  $rol_obtenido ? 'selected="selected"' : '' }}>{{ $rol->nombre}}</option>
                  @endforeach
               </select>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="text-align:center;margin-top:20px">
               <label style="color:#505c61"> Filtrar por Estado de empleado </label><br>
               <select id="estado" name="estado" class="form-control" data-placeholder=" ">
                  <option  value="" selected >Seleccione...</option>
                  @foreach($estados as $estado )
                  <option value="{{ $estado->id }}" {{ $estado->id  ==  $estado_obtenido ? 'selected="selected"' : '' }}>{{ $estado->nombre}}</option>
                  @endforeach
               </select>
            </div>
            <div class="col-lg-6 col-md-3 col-sm-6 col-xs-12" style="text-align:center;margin-top:20px">
               <label style="color:#505c61"> Filtrar por Viabilidad</label><br>
               <select class="form-control{{ $errors->has('viabilidad') ? ' is-invalid' : '' }}" id="input-viabilidad" aria-required="true" name="viabilidad">
                    <option value="{{ old('viabilidad') }}" disabled>Seleccionar</option>
                     @foreach($viabilidades as $viabilidad)
                     <option value="{{$viabilidad}}" @if($viabilidad == $viabilidad_obtenida) selected @endif>{{$viabilidad}}</option>
                     @endforeach
                 </select>
            </div>
         </div>
         <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 "  style="margin-top:30px;text-align:center">
            <button class="btn btn-info buscar-asistentes"  type="submit">
            Buscar Asistentes de Manera Avanzada
            </button>
         </div>
      </div>
   </form>
</div>