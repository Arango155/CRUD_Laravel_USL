@extends('layout/plantilla')

@section("tituloPagina", "Crear un nuevo registro")

@section('contenido')
    <div class="card">
        <h5 class="card-header">Actualizar nuevo Alumno</h5>
        <div class="card-body">

            <p class="card-text">
            <form action="{{route('nota.update', $alumnos->id)}}" method="POST">
                @csrf
                @method("PUT")


                <div class="row">
                    <div class="col">
                        <label for="">ID</label>
                        <input type="text" name="id" class="form-control" required value="{{$alumnos->id}}">
                    </div>
                    <div class="col">
                        <label for="">Fecha Actualización</label>
                        <input type="date" name="fecha_registro" class="form-control" required value="{{$alumnos->fecha_registro}}">
                    </div>
                </div>
                <br>

                <div class="row">
                    <div class="col">
                        <label for="">Nombre</label>
                        <input type="text" name="nombre" class="form-control" required value="{{$alumnos->nombre}}">
                    </div>
                    <div class="col">
                        <label for="">Apellido</label>
                        <input type="text" name="apellido" class="form-control" required value="{{$alumnos->apellido}}">
                    </div>
                </div>
                <br>

                <div class="row">
                    <div class="col">
                        <label for="">Curso 1</label>
                        <input type="text" name="curso1_id" class="form-control" required value="{{$alumnos->curso1_id}}">
                    </div>
                    <div class="col">
                        <label for="">Nota 1</label>
                        <input type="text" name="nota1" class="form-control" required value="{{$alumnos->nota1}}">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <label for="">Curso 2</label>
                        <input type="text" name="curso2_id" class="form-control" required value="{{$alumnos->curso2_id}}">
                    </div>
                    <div class="col">
                        <label for="">Nota 2</label>
                        <input type="text" name="nota2" class="form-control" required value="{{$alumnos->nota2}}">
                    </div>
                </div>


                <div class="row">
                    <div class="col">
                        <label for="">Grado</label>
                        <input type="text" name="grado_id" class="form-control" required value="{{$alumnos->grado_id}}">
                    </div>
                    <div class="col">
                        <label for="">Sucursal</label>
                        <input type="text" name="sucursal_id" class="form-control" required value="{{$alumnos->sucursal_id}}">
                    </div>
                </div>




                <br>
                <a href="{{route("nota.index")}}" class="btn btn-info">
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
