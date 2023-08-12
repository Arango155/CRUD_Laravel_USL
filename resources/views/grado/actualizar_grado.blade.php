@extends('templates/layout')

@section("tituloPagina", "Crear un nuevo registro")

@section('contenido')
    <div class="card">
        <h5 class="card-header">Actualizar Grado</h5>
        <div class="card-body">

            <p class="card-text">
            <form action="{{route('grado.update', $grados->id)}}" method="POST">
                @csrf
                @method("PUT")
                <label for="">ID</label>
                <input type="text" name="id" class="form-control" required value="{{$grados->id}}">
                <br>
                <label for="">Nombre</label>
                <input type="text" name="nombre" class="form-control" required value="{{$grados->nombre}}">



                <br>
                <a href="{{route("grado.index")}}" class="btn btn-info">
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
