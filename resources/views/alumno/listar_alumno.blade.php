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
            <h5 class="card-title text-center">Listado de Alumnos</h5>
            <hr>
            <div class="d-md-flex justify-content-md-end">
                <form action="{{route('alumno.index2')}}" method="GET">
                    <div class="btn-group">
                        <input type="text" name="texto" class="form-control">
                        <input type="submit" value="buscar" class="btn btn-primary">
                    </div>
                </form>
               </div>
            <hr>
            <p>
                <a href="{{route("alumno.create")}}" class="btn btn-primary">
                    <span class="fas fa-user-plus"></span> Agregar nuevo Alumno
                </a>
            </p>
            <hr>
            <p class="card-text">
            <div class="table table-responsive">
                <table class="table table-sm table-border">
                    <thead>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Sucursal</th>
                    <th>Grado</th>
                    <th>Curso 1</th>
                    <th>Curso 2</th>


                    <th>Fecha de Registro</th>

                    <th>Editar</th>
                    <th>Eliminar</th>
                    </thead>
                    <tbody>
                    @foreach($alumnos as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->nombre}}</td>
                            <td>{{$item->apellido}}</td>
                            <td>{{$item->sucursal->nombre}}</td>
                            <td>{{$item->grado->nombre}}</td>
                            <td>{{$item->curso->nombre}}</td>
                            <td>{{$item->curso2->nombre}}</td>
                            <td>{{$item->fecha_registro}}</td>

                            <td>
                                <form action="{{route("alumno.edit", $item->id)}}" method="GET">
                                    <button class="btn btn-warning btn-sm">
                                        <span class="fas fa-user-edit"></span>
                                    </button>
                                </form>
                            </td>
                            <td>
                                <form action="{{route("alumno.show", $item->id)}}" method="GET">
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
                    {{ $alumnos->links() }}
                </div>
            </div>
            </p>
            <a href="{{route("home.index")}}" class="btn btn-info">
                <span class="fas fa-undo-alt"></span> Regresar
            </a>
        </div>

    </div>


@endsection
