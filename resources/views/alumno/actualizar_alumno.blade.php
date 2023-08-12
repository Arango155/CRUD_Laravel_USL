@extends('templates/layout')

@section("tituloPagina", "Crear un nuevo registro")

@section('contenido')
    <div class="card">
        <h5 class="card-header">Actualizar nuevo Alumno</h5>
        <div class="card-body">

            <p class="card-text">
            <form action="{{route('alumno.update', $alumnos->id)}}" method="POST">
                @csrf
                @method("PUT")
                <label for="">ID</label>
                <input type="text" name="id" class="form-control" required value="{{$alumnos->id}}">
                <br>
                <label for="">Nombre</label>
                <input type="text" name="nombre" class="form-control" required value="{{$alumnos->nombre}}">
                <br>

                <label for="">Apellido</label>
                <input type="text" name="apellido" class="form-control" required value="{{$alumnos->apellido}}">
                <br>

                <div class="form-group">
                    <label for="grado">Grado</label>
                    <select name="grado_id" id="grado" class="form-control" required{{$alumnos->grado_id}}>
                        <option value="">Seleccionar Grado</option>
                        @foreach($grados as $grado)
                            <option value="{{ $grado->id }}">{{ $grado->nombre }}</option>
                        @endforeach
                    </select>
                </div><br>

                <!--label for="">Grado</label>
                <input type="text" name="grado_id" class="form-control" required>
                <br-->

                <div class="form-group">
                    <label for="curso">Curso 1</label>
                    <select name="curso1_id" id="curso1_id" class="form-control" required{{$alumnos->curso1_id}}>
                        <option value="">Seleccionar Curso</option>
                        @foreach($cursos as $curso)
                            <option value="{{ $curso->id }}">{{ $curso->nombre }}</option>
                        @endforeach
                    </select>
                </div><br>

                <div class="form-group">
                    <label for="curso">Curso 2</label>
                    <select name="curso2_id" id="curso2_id" class="form-control" required{{$alumnos->curso2_id}}>
                        <option value="">Seleccionar Curso</option>
                        @foreach($cursos as $curso)
                            <option value="{{ $curso->id }}">{{ $curso->nombre }}</option>
                        @endforeach
                    </select>
                </div><br>

                <!--label for="">Curso</label>
                <input type="text" name="curso_id" class="form-control" required>
                <br-->
                <label for="">Fecha Actualización</label>
                <input type="date" name="fecha_registro" class="form-control" required{{$alumnos->fecha_registro}}>
                <br>

                <div class="form-group">
                    <label for="sucursal">Sucursal</label>
                    <select name="sucursal_id" id="sucursal" class="form-control" required{{$alumnos->sucursal_id}}>
                        <option value="">Seleccionar Sucursal</option>
                        @foreach($sucursales as $sucursal)
                            <option value="{{ $sucursal->id }}">{{ $sucursal->nombre }}</option>
                        @endforeach
                    </select>
                </div>


                <!--label for="">Sucursal</label>
                <input type="text" name="sucursal_id" class="form-control" required>
                <br-->

                <br>
                <a href="{{route("alumno.index2")}}" class="btn btn-info">
                    <span class="fas fa-undo-alt"></span> Regresar
                </a>
                <button class="btn btn-warning">
                    <span class="fas fa-user-edit"></span> Actualizar
                </button>

            </form>
            </p>

        </div>
    </div>
@endsection
