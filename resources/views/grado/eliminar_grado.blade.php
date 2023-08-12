@extends('templates/layout')

@section("tituloPagina", "Eliminar un registro")

@section('contenido')
    <div class="card">
        <h5 class="card-header">Eliminar Grado</h5>
        <div class="card-body">

            <p class="card-text">
            <div class="alert alert-danger" role="alert">
                Estas seguro de eliminar este registro!!!

                <table class="table table-sm table-hover table-bodered" style="background-color: white">
                    <thead>
                    <th>ID</th>
                    <th>Nombre</th>

                    </thead>
                    <tbody>
                    <tr>
                        <td>{{ $grados->id}}</td>
                        <td>{{ $grados->nombre}}</td>

                    </tr>
                    </tbody>
                </table>
                <hr>
                <form action="{{route('grado.destroy', $grados->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route("grado.index") }}" class="btn btn-info">
                        <span class="fas fa-undo-alt"></span> Regresar
                    </a>
                    <button class="btn btn-danger">
                        <span class="fas fa-user-times"></span> Eliminar
                    </button>
                </form>
            </div>
            </p>

        </div>
    </div>
@endsection
