<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align:center">
   <div class="input-group">
      <buscar-component></buscar-component>
      <span class="input-group-btn">
      <button class="btn btn-info" type="button" data-toggle="collapse" data-target="#busqueda-avanzada" aria-expanded="false" aria-controls="collapseExample">
      Búsqueda Avanzada
      </button>
      </span>
   <form class="">
      <div id="busqueda-avanzada" name="busqueda-avanzada" class=" row collapse" style="padding-top:5px;padding-bottom:35px">
         <div class="row">
            <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12" style="text-align:center;margin-top:20px">
               <label style="color:#505c61"> Filtrar por Facultad / Unidad </label><br>
               <select id="unidad" name="unidad" class="form-control" data-placeholder=" ">
                  <option  value="" selected >Seleccione...</option>
                  @foreach($unidades as $unidad )
                  <option value="{{ $unidad->id }}" {{ $unidad->id  ==  $unidad_obtenida ? 'selected="selected"' : '' }}>{{ $unidad->nombre_unidad }}</option>
                  @endforeach
               </select>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="text-align:center;margin-top:20px">
               <label style="color:#505c61"> Filtrar por Viabilidad</label><br>
               <select id="viabilidad" name="viabilidad" class="form-control" data-placeholder=" ">
                  <option  value="{{ old('viabilidad') }}"  selected>Seleccionar</option>
                  <option  value="Consultar con jefatura servicio médico y SST">Consultar con jefatura servicio médico y SST</option>
                  <option  value="Viable trabajo presencial">Viable trabajo presencial</option>
                  <option  value="Trabajo en casa y consultar a telemedicina">Trabajo en casa y consultar a telemedicina</option>
                  <option  value="Trabajo en casa">Trabajo en casa</option>
                  <option  value="Sin clasificación">Sin clasificación</option>
               </select>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="text-align:center;margin-top:20px">
               <label style="color:#505c61">Filtrar por Indispensable trabajo presencial</label><br>
               <select id="indispensable" name="indispensable" class="form-control" data-placeholder=" ">
                  <option  value="{{ old('indispensable') }}"  selected>Seleccionar</option>
                  <option  value="Si">Si</option>
                  <option  value="No">No</option>
               </select>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12" style="text-align:center;margin-top:20px">
               <label style="color:#505c61"> Filtrar por Estado de empleado </label><br>
               <select id="estado" name="estado" class="form-control" data-placeholder=" ">
                  <option  value="" selected >Seleccione...</option>
                  @foreach($estados as $estado )
                  <option value="{{ $estado->id }}" {{ $estado->id  ==  $estado_obtenido ? 'selected="selected"' : '' }}>{{ $estado->nombre}}</option>
                  @endforeach
               </select>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="text-align:center;margin-top:20px">
               <label style="color:#505c61"> Filtrar por Envío Carta de Autorización </label><br>
               <select id="envioCarta" name="envioCarta" class="form-control" data-placeholder=" ">
                 <option  value="{{ old('viabilidad') }}"  selected>Seleccionar</option>
                 <option  value="si">Si</option>
                 <option  value="no">No</option>
               </select>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="text-align:center;margin-top:20px">
               <label style="color:#505c61"> Filtrar por Dependencia </label><br>
               <select id="filtroDependencia" name="filtroDependencia" class="form-control" data-placeholder=" ">
                 <option  value="{{ old('filtroDependencia') }}"  selected>Seleccionar</option>

                 @foreach($listado_dependencias as $dependencia)
                 <option value="{{ $dependencia['dependencia'] }}" >{{$dependencia['dependencia']}}</option>
                 @endforeach
               </select>
            </div>
         </div>
         <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 "  style="margin-top:30px;text-align:center">
            <button class="btn btn-success buscar-asistentes"  type="submit">
            Buscar Asistentes de Manera Avanzada
            </button>
         </div>
      </div>
   </form>
</div>
