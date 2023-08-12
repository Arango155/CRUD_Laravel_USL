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
        <h5 class="card-header">Agregar nuevo Catedrático</h5>
        <div class="card-body">

            <p class="card-text">
            <form action="{{ route('catedratico.store')}}" method="POST">
                @csrf
                <label for="">ID</label>
                <input type="text" name="id" class="form-control" required>
                <label for="">Nombre</label>
                <input type="text" name="nombre" class="form-control" required>
                <label for="">Apellido</label>
                <input type="text" name="apellido" class="form-control" required>
                <label for="">Teléfono</label>
                <input type="text" name="telefono" class="form-control" required>
                <label for="">Email</label>
                <input type="text" name="email" class="form-control" required>
                <label for="">Dirección</label>
                <input type="text" name="direccion" class="form-control" required>

                <br>
                <a href="{{route("catedratico.index")}}" class="btn btn-info">
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
