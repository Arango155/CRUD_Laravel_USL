@extends('templates/layout')

@section("tituloPagina", "Eliminar un registro")

@section('contenido')
    <div class="card">
        <h5 class="card-header">Eliminar Curso</h5>
        <div class="card-body">

            <p class="card-text">
            <div class="alert alert-danger" role="alert">
                Estas seguro de eliminar este registro!!!

                <table class="table table-sm table-hover table-bodered" style="background-color: white">
                    <thead>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Grado</th>

                    </thead>
                    <tbody>
                    <tr>
                        <td>{{ $cursos->id}}</td>
                        <td>{{ $cursos->nombre}}</td>
                        <td>{{ $cursos->grado->nombre}}</td>

                    </tr>
                    </tbody>
                </table>
                <hr>
                <form action="{{route('curso.destroy', $cursos->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route("curso.index") }}" class="btn btn-info">
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
