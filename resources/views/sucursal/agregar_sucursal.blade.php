@extends('layout/plantilla')

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
        <h5 class="card-header">Agregar Sucursal</h5>
        <div class="card-body">

            <p class="card-text">
            <form action="{{ route('sucursal.store')}}" method="POST">
                @csrf
                <!--Ingreso del ID-->
                <label for="">ID</label>
                <input type="text" name="id" class="form-control" required><br>

                <!--Ingreso del Nombre-->
                <label for="">Nombre</label>
                <input type="text" name="nombre" class="form-control" required><br>


                <br>
                <a href="{{route("sucursal.index")}}" class="btn btn-info">
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
