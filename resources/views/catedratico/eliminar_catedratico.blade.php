@extends('templates/layout')

@section("tituloPagina", "Crear un nuevo registro")

@section('contenido')
    <div class="card">
        <h5 class="card-header">Eliminar un Catedratico</h5>
        <div class="card-body">

            <p class="card-text">
            <div class="alert alert-danger" role="alert">
                Estas seguro de eliminar este registro!!!

                <table class="table table-sm table-hover table-bodered" style="background-color: white">
                    <thead>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Dirección</th>

                    </thead>
                    <tbody>
                    <tr>
                        <td>{{ $catedraticos->id}}</td>
                        <td>{{ $catedraticos->nombre}}</td>
                        <td>{{ $catedraticos->apellido}}</td>
                        <td>{{ $catedraticos->telefono}}</td>
                        <td>{{ $catedraticos->email}}</td>
                        <td>{{ $catedraticos->direccion}}</td>

                    </tr>
                    </tbody>
                </table>
                <hr>
                <form id="myButton" action="{{route('catedratico.destroy', $catedraticos->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route("catedratico.index") }}" class="btn btn-info">
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

@section('js')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include your custom JavaScript file -->
    <script src="path/to/your/script.js"></script>

    <script>

        $(document).ready(function() {
            $('#myButton').click(function(event) {
                event.preventDefault();

                Swal.fire({
                    title: 'Estas seguro?',
                    text: "No podras cambiar esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, eliminalo!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Swal.fire(
                        //     'Deleted!',
                        //     'Your file has been deleted.',
                        //     'success'
                        // )
                        this.submit();
                    }
                })

            });


        });



        // $('.formulario-eliminar').submit(function (e){
        //     e.preventDefault();
        // });


    </script>

@endsection
