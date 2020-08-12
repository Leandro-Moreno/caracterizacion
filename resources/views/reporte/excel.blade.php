<table>
    <thead>
    <tr>

        <th>Primer Apellido</th>
        <th>Segundo Apellido</th>
        <th>Primer Nombre</th>
        <th>Segundo Nombre</th>
        <th>Tipo_Documento</th>
        <th>Documento</th>
        <th>Profesión</th>
        <th>Cargo</th>
				<th>Correo</th>
        <th>Teléfonos de contacto (Celular)</th>

        <th>Direccón de Correspondencia</th>
        <th>Medio por el cual se enteró</th>
        <th>Tipo de Persona (Externo/Estudiante Uniandes, Empleado Uniandes, Egresado Uniandes)</th>
        <th>Aceptación de uso de datos</th>
        <th>Aceptación de uso de imagen</th>
        <th>Cumple con asistencia mínima</th>
        <th>Certificación entregada (Si/No)</th>
        <th>Consecutivo de Certificado</th>
        <th>Fecha entrega de certificación</th>
        <th>Valor de pago</th>
    </tr>
    </thead>
    <tbody>
    @foreach($asistentes as $asistente)
        <tr>
            <td>{{$asistente->usuarios->apellido}}</td>
            <td>{{$asistente->usuarios->apellido2}}</td>
            <td>{{$asistente->usuarios->name}}</td>
            <td>{{$asistente->usuarios->name2}}</td>
            <td>{{$asistente->usuarios->tipo_doc}}</td>
            <td>{{$asistente->usuarios->documento}}</td>
            <td>{{$asistente->usuarios->profesion}}</td>
            <td>{{$asistente->usuarios->cargo}}</td>
						<td>{{$asistente->usuarios->email}}</td>
            <td>{{$asistente->usuarios->celular}}</td>

            <td>{{$asistente->usuarios->direccion}}</td>
            <td>{{$asistente->usuarios->medio}}</td>
            <td>{{$asistente->usuarios->tipo_persona}}</td>
            <td>{{$asistente->usuarios->uso_datos}}</td>
            <td>No</td>
            <td>{{$asistente->usuarios->asistencia_minima}}</td>
            <td>Si. Digital.</td>
            <td>VI{{str_pad($asistente->asistencia, 6, '0', STR_PAD_LEFT)}}</td>
            <td>Fecha</td>
            <td>Valor</td>
        </tr>
    @endforeach
    </tbody>
</table>
