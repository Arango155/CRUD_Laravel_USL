@extends('templates/layout')

@section('tituloPagina', 'Academia Rapidito')

@section('contenido')

    <div class="card">

        <h5 class="card-header">Academia Rapidito</h5>
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
            <p class="card-text">
            <div class="table-responsive">
                <table class="table table-striped" id="alumnos-table">
                    <thead>
                    <th data-filter="text">ID</th>
                    <th data-filter="text">Nombre</th>
                    <th data-filter="select">Grado</th>
                    <th data-filter="select">Curso</th>

                    <th data-filter="select">Sucursal</th>
                    <th data-filter="select">Fecha de Creación</th>
                    <th data-filter="select">Fecha de Edición</th>
                    </thead>
                    <tbody>
                    @foreach($alumnos as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->nombre}}</td>
                            <td>{{$item->grado->nombre}}</td>
                            <td>{{$item->curso->nombre}}</td>
                            <!--td>$item->fecha_registro}}</td-->
                            <td>{{$item->sucursal->nombre}}</td>
                            <td>{{$item->created_at}}</td>
                            <td>{{$item->updated_at}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <hr>
            </p>
            <a href="{{route("home.index")}}" class="btn btn-info">
                <span class="fas fa-undo-alt"></span> Regresar
            </a>
            <a href="{{route('alumno.export')}}" class="btn btn-success">
                <i class="fas fa-file-excel"></i> Excel
            </a>
        </div>

    </div>

@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/dataTable.min.css') }}">
@endsection

@section('scripts')
    <script src="{{ asset('js/dataTable.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#alumnos-table').DataTable({
                language: {
                    search: "Buscar:",
                    lengthMenu: "Mostrar _MENU_ registros por página",
                    info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
                    infoEmpty: "No se encontraron registros",
                    infoFiltered: "(filtrados de un total de _MAX_ registros)",
                    paginate: {
                        first: "Primero",
                        last: "Último",
                        next: "Siguiente",
                        previous: "Anterior"
                    }
                },
                initComplete: function () {
                    this.api().columns().every(function () {
                        var column = this;
                        var filterType = $(column.header()).data('filter');
                        var select = $('<select class="form-control"><option value=""></option></select>')
                            .appendTo($(column.header()).empty())
                            .on('change', function () {
                                var val = $.fn.dataTable.util.escapeRegex($(this).val());
                                column.search(val ? '^' + val + '$' : '', true, false).draw();
                            });

                        if (filterType === 'select') {
                            column.data().unique().sort().each(function (d, j) {
                                select.append('<option value="' + d + '">' + d + '</option>');
                            });
                        } else if (filterType === 'text') {
                            select.replaceWith('<input type="text" class="form-control" placeholder="Filtrar..." />');
                        }
                    });
                }
            });
        });
    </script>
@endsection
