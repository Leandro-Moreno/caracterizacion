<table class="table table-responsive table-bordered">
   <thead>
       <tr>
           <th>
               {{ __('Nombres') }}
           </th>
           <th>
               {{ __('Email') }}
           </th>
           <th>
               {{ __('Facultad/ Unidad') }}
           </th>
           <th>
               {{ __('Dependencia') }}
           </th>
           <th>
               {{ __('Cargo') }}
           </th>
           <th>
               {{ __('Indispensable trabajo presencial') }}
           </th>
           <th>
               {{ __('¿Por qué?') }}
           </th>
           <th>
               {{ __('Hora de Entrada') }}
           </th>
           <th>
               {{ __('Hora de Salida') }}
           </th>
           <th>
               {{ __('Días laborales') }}
           </th>
           <th>
               {{ __('Caracterizacion') }}
           </th>
           <th>
               {{ __('Trabajo en casa') }}
           </th>
           <th>
               {{ __('Observaciones del Departamento médico') }}
           </th>
           <th>
               {{ __('Envío carta de autorización') }}
           </th>
           <th>
               {{ __('Notas de Servicios Campus') }}
           </th>
           <th>
               {{ __('Envío de consentimiento') }}
           </th>
           <th>
               {{ __('Tipo de Documento') }}
           </th>
           <th>
               {{ __('Documento') }}
           </th>
           <th>
               {{ __('Localidad') }}
           </th>
           <th>
               {{ __('Barrio') }}
           </th>
           <th>
               {{ __('Dirección') }}
           </th>
       </tr>
   </thead>
   <tbody>
       @foreach($caracterizacion as $dato)
       <tr>
           <td>
               {{ $dato->user->name }}
           </td>
           <td>
               {{ $dato->user->email }}
           </td>
           <td>
               {{ $dato->user->unidad->nombre_unidad }}
           </td>
           <td>
               {{ $dato->dependencia }}
           </td>
           <td>
               {{ $dato->user->cargo }}
           </td>
           <td>
               {{ $dato->indispensable_presencial }}
           </td>
           <td>
               {{ $dato->por_que }}
           </td>
           <td>
               {{ $dato->horaEntrada }}
           </td>
           <td>
               {{ $dato->horaSalida }}
           </td>
           <td>
               {{ $dato->dias_laborales }}
           </td>
           <td>
               {{ $dato->viabilidad_caracterizacion }}
           </td>
           <td>
               {{ $dato->trabajo_en_casa }}
           </td>
           <td>
               {{ $dato->observacion_cambios_de_estado }}
           </td>
           <td>
               {{ $dato->envio_de_carta_autorizacion }}
           </td>
           <td>
               {{ $dato->notas_comentarios_ma_andrea_leyva }}
           </td>
           <td>
               {{ $dato->envio_de_consentimiento }}
           </td>
           <td>
               {{ $dato->user->tipo_doc }}
           </td>
           <td>
               {{ $dato->user->documento }}
           </td>
           <td>
               {{ $dato->user->localidad }}
           </td>
           <td>
               {{ $dato->user->barrio }}
           </td>
           <td>
               {{ $dato->user->direccion }}
           </td>
       </tr>
       @endforeach
   </tbody>
</table>
