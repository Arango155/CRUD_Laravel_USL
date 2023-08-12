@extends('templates/layout')

@section('tituloPagina', 'Crud con Laravel 8')

@section('contenido')

    <div class="card">
        <h5 class="card-header">CRUD con Laravel 8 y MySQL</h5>
        <div class="card-body">
            <div>
                <div class="col-sm-12">
                    @if($mensaje = Session::get('success'))
                        <div class="alert alert-success" role="alert">
                            {{ $mensaje }}
                        </div>
                    @endif

                </div>
            </div>
            <h5 class="card-title text-center">Listado de Cursos</h5>
            <p>
                <a href="{{route("curso.create")}}" class="btn btn-primary">
                    <span class="fas fa-user-plus"></span> Agregar nuevo Curso
                </a>
            </p>
            <hr>
            <p class="card-text">
            <div class="table table-responsive">
                <table class="table table-sm table-border">
                    <thead>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Grado</th>

                    <th>Editar</th>
                    <th>Eliminar</th>
                    </thead>
                    <tbody>
                    @foreach($cursos as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->nombre}}</td>
                            <td>{{$item->grado->nombre}}</td>

                            <td>
                                <form action="{{route("curso.edit", $item->id)}}" method="GET">
                                    <button class="btn btn-warning btn-sm">
                                        <span class="fas fa-user-edit"></span>
                                    </button>
                                </form>
                            </td>
                            <td>
                                <form action="{{route("curso.show", $item->id)}}" method="GET">
                                    <button class="btn btn-danger btn-sm">
                                        <span class="fas fa-user-times"></span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <hr>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    {{ $cursos->links() }}
                </div>
            </div>
            </p>
            <a href="{{route("home.index")}}" class="btn btn-info">
                <span class="fas fa-undo-alt"></span> Regresar
            </a>
        </div>
    </div>


@endsection
