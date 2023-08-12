@extends('templates/layout')

@section("tituloPagina", "Crear un nuevo registro")

@section('contenido')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="card">
        <h5 class="card-header">Agregar nuevo Alumno</h5>
        <div class="card-body">

            <p class="card-text">
            <form action="{{ route('alumno.store')}}" method="POST">
                @csrf
                <!--Ingreso del ID-->
                <label for="">ID</label>
                <input type="text" name="id" class="form-control" required><br>

                <!--Ingreso del Nombre-->
                <label for="">Nombre</label>
                <input type="text" name="nombre" class="form-control" required><br>

                <!--Ingreso del Apellido-->
                <label for="">Apellido</label>
                <input type="text" name="apellido" class="form-control" required><br>

                <!--label for="">Grado</label>
                <input type="text" name="grado_id" class="form-control" required-->
                <!--Seleccionar Grado-->
                <div class="form-group">
                    <label for="grado">Grado</label>
                    <select name="grado_id" id="grado_id" class="form-control" required>
                        <option value="">Seleccionar Grado</option>
                        @foreach($grados as $grado)
                            <option value="{{ $grado->id }}">{{ $grado->nombre }}</option>
                        @endforeach
                    </select>
                </div><br>
                <!--Seleccionar Curso-->
                <!--label for="">Curso</label>
                <input type="text" name="curso_id" class="form-control" required-->
                <div class="form-group">
                    <label for="cursos">Curso 1</label>
                    <select name="curso1_id" id="curso1_id" class="form-control" required>
                        <option value="">Seleccionar Curso</option>
                        @foreach($cursos as $curso)
                            <option value="{{ $curso->id }}">{{ $curso->nombre }}</option>
                        @endforeach
                    </select>
                </div><br>

                <div class="form-group">
                    <label for="cursos">Curso 2</label>
                    <select name="curso2_id" id="curso2_id" class="form-control" required>
                        <option value="">Seleccionar Curso</option>
                        @foreach($cursos as $curso)
                            <option value="{{ $curso->id }}">{{ $curso->nombre }}</option>
                        @endforeach
                    </select>
                </div><br>

                <!--Ingreso de Fecha del Registro-->
                <label for="">Fecha Registro</label>
                <input type="date" name="fecha_registro" class="form-control" required><br>

                <!--Seleccionar Sucursal-->
                <div class="form-group">
                    <label for="sucursal">Sucursal</label>
                    <select name="sucursal_id" id="sucursal_id" class="form-control" required>
                        <option value="">Seleccionar Sucursal</option>
                        @foreach($sucursales as $sucursal)
                            <option value="{{ $sucursal->id }}">{{ $sucursal->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <br>
                <a href="{{route("alumno.index2")}}" class="btn btn-info">
                    <span class="fas fa-undo-alt"></span> Regresar
                </a>
                <button class="btn btn-primary">
                    <span class="fas fa-user-plus"></span> Agregar
                </button>

            </form>
            </p>

        </div>
    </div>
@endsection
