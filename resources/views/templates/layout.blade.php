<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="" href="https://cdn.datatables.net/fixedheader/3.1.6/css/fixedHeader.dataTables.min.css">
    <link rel="stylesheet" href="css/home.css">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css"
    />

    <title>USL</title>


<link rel="stylesheet" href="css/nav.css">


<body>

<nav class="navbar navbar-dark ">
    <div class="container-fluid">
        <a href="{{route("home.index")}}"  class="titulo">USL</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>

    <section class="offcanvas offcanvas-start" tabindex="-1" id="navbarToggleExternalContent">
        <div class="offcanvas-header" data-bs-theme="dark">
            <a href="{{route("home.index")}}"  class="navclas2">Home</a>
            <button
                class="btn-close"
                type="button"
                aria-label="Close"
                data-bs-dismiss="offcanvas"
            ></button>
        </div>
        <div
            class="offcanvas-body d-flex flex-column justify-content-between px-0"
        >
            <ul class="navbar-nav fs-5 justify-content-evenly">
                <li class="nav-item p-3 py-md-1">
                    <a href="{{route("alumno.index2")}}" class="navlink">Alumnos</a>
                </li>
                <li class="nav-item p-3 py-md-1">
                    <a href="{{route("catedratico.index")}}" class="navlink" >Catedráticos</a>
                </li>
                <li class="nav-item p-3 py-md-1">
                    <a href="{{route("sucursal.index")}}" class="navlink">Sucursales</a>
                </li>
                <li class="nav-item p-3 py-md-1">
                    <a href="{{route("grado.index")}}" class="navlink">Grados</a>
                </li>

                <li class="nav-item p-3 py-md-1">
                    <a href="{{route("curso.index")}}" class="navlink">Cursos</a>
                </li>
                <li class="nav-item p-3 py-md-1">
                    <a href="{{route("nota.index")}}" class="navlink">Asignación de Notas</a>
                </li>
                <li class="nav-item p-3 py-md-1">
                    <a href="{{route("reporte.index")}}" class="navlink">Reportes Alumnos</a>
                </li>

            </ul>
            <!-- enlaces redes sociales -->


        </div>




        <div >
            <a class="not" href="https://www.instagram.com/jos.arango/" target="_blank"><i class="bi bi-instagram px-2 text-info fs-2"></i></a>
            <a class="not" href="https://www.facebook.com/josue.arango24/" target="_blank"><i class="bi bi-facebook px-2 text-info fs-2"></i></a>
            <a class="not" href="https://github.com/Arango155" target="_blank"><i class="bi bi-github px-2 text-info fs-2"></i></a>
            <a class="not" href="https://www.linkedin.com/in/josue-arango-289b03198" target="_blank"><i class="bi bi-linkedin px-2 text-info fs-2"></i></a>
            <a class="not" href="https://wa.me/54403980" target="_blank"><i class="bi bi-whatsapp px-2 text-info fs-2"></i></a>
        </div>
    </section>

</nav>



@yield('contenido')



<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.6/js/dataTables.fixedHeader.min.js"></script>
<script>
    let temp = $("#btn1").clone();
    $("#btn1").click(function(){
        $("#btn1").after(temp);
    });

    $(document).ready(function(){
        var table = $('#example').DataTable({
            orderCellsTop: true,
            fixedHeader: true
        });

        //Creamos una fila en el head de la tabla y lo clonamos para cada columna
        $('#example thead tr').clone(true).appendTo( '#example thead' );

        $('#example thead tr:eq(1) th').each( function (i) {
            var title = $(this).text(); //es el nombre de la columna
            $(this).html( '<input type="text" placeholder="Search...'+title+'" />' );

            $( 'input', this ).on( 'keyup change', function () {
                if ( table.column(i).search() !== this.value ) {
                    table
                        .column(i)
                        .search( this.value )
                        .draw();
                }
            } );
        } );
    });

</script>



@yield('js')


</body>
</html>
