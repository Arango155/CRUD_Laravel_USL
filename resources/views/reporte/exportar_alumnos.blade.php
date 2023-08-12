<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Grado</th>
            <th>Curso</th>

            <th>Sucursal</th>
            <th>Fecha de Creación</th>
            <th>Fecha de Actualización</th>
        </tr>
    </thead>
</table>
<tbody>
@foreach($alumnos as $alumno)
    <tr>
        <td>{{$alumno->id}}</td>
        <td>{{$alumno->nombre}}</td>
        <td>{{$alumno->grado->nombre}}</td>
        <td>{{$alumno->curso->nombre}}</td>

        <td>{{$alumno->sucursal->nombre}}</td>
        <td>{{$alumno->created_at}}</td>
        <td>{{$alumno->updated_at}}</td>
    </tr>
@endforeach
</tbody>
