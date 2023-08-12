@extends('templates/layout')

@section("tituloPagina", "Crear un nuevo registro")

@section('contenido')
    <div class="card">
        <h5 class="card-header">Actualizar nuevo Catedrático</h5>
        <div class="card-body">

            <p class="card-text">
            <form action="{{route('catedratico.update', $catedraticos->id)}}" method="POST">
                @csrf
                @method("PUT")
                <label for="">ID</label>
                <input type="text" name="id" class="form-control" required value="{{$catedraticos->id}}">
                <label for="">Nombre</label>
                <input type="text" name="nombre" class="form-control" required value="{{$catedraticos->nombre}}">
                <label for="">Apellido</label>
                <input type="text" name="apellido" class="form-control" required value="{{$catedraticos->apellido}}">
                <label for="">Teléfono</label>
                <input type="text" name="telefono" class="form-control" required value="{{$catedraticos->sucursal_id}}">
                <label for="">Email</label>
                <input type="text" name="email" class="form-control" required value="{{$catedraticos->clase1_id}}">
                <label for="">Dirección</label>
                <input type="text" name="direccion" class="form-control" required value="{{$catedraticos->clase2_id}}">

                <br>
                <a href="{{route("catedratico.index")}}" class="btn btn-info">
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
