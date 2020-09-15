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
               {{ __('Indispensable trabajo presencial') }}
           </th>
           <th>
               {{ __('Hora de Entrada') }}
           </th>
           <th>
               {{ __('Hora de Salida') }}
           </th>
           <th>
               {{ __('Viabilidad') }}
           </th>
       </tr>
   </thead>
   <tbody>
       @foreach($viabilidades as $dato)
       <tr>
           <td>
               {{ $dato->name }}
           </td>
           <td>
               {{ $dato->email }}
           </td>
           <td>
               {{ $dato->nombre_unidad }}
           </td>
           <td>
               {{ $dato->indispensable_presencial }}
           </td>
           <td>
               {{ $dato->horaEntrada }}
           </td>
           <td>
               {{ $dato->horaSalida }}
           </td>
           <td>
               {{ $dato->viabilidad_caracterizacion }}
           </td>
       </tr>
       @endforeach
   </tbody>
</table>