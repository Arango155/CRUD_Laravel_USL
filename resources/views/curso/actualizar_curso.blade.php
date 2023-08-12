@extends('templates/layout')

@section("tituloPagina", "Crear un nuevo registro")

@section('contenido')
    <div class="card">
        <h5 class="card-header">Actualizar Curso</h5>
        <div class="card-body">

            <p class="card-text">
            <form action="{{route('curso.update', $cursos->id)}}" method="POST">
                @csrf
                @method("PUT")
                <label for="">ID</label>
                <input type="text" name="id" class="form-control" required value="{{$cursos->id}}">
                <br>
                <label for="">Nombre</label>
                <input type="text" name="nombre" class="form-control" required value="{{$cursos->nombre}}">


                <div class="form-group">
                    <label for="grado">Grado</label>
                    <select name="grado_id" id="grado_id" class="form-control" required value="{{$cursos->grado_id}}>
                        <option value="">Seleccionar Grado</option>
                        @foreach($grados as $grado)
                            <option value="{{ $grado->id }}">{{ $grado->nombre }}</option>
                        @endforeach
                    </select>
                </div><br>
                <br>
                <a href="{{route("curso.index")}}" class="btn btn-info">
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
