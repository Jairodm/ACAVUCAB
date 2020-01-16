<!doctype blade.php>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/89cc030952.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="main.css"></script>
    <link rel="stylesheet" href="carrito.css">
    <title>ACAVUCAB - Menú de registro</title>

</head>



<body>
       @include('plantilla')

    <div>
        <a href="registrarEmpleado">
            <button
                style="position:absolute; top:25%; left:16%; height:100px; width:450px; font-size:30px; border-radius:20px;"
                type="button" class="btn btn-warning">Registrar empleado
            </button>
        </a>
        <a href="inventario">
            <button
                style="position:absolute; top:25%; left:54%; height:100px; width:450px; font-size:30px; border-radius:20px;"
                type="button" onclick="href = 'registrarClienteJuridico';" class="btn btn-warning">Inventario
            </button>
        </a>
        <a href="nómina">
            <button
                style="position:absolute; top:44%; left:16%; height:100px; width:450px; font-size:30px; border-radius:20px;"
                type="button" class="btn btn-warning">Nómina
            </button>
        </a>
        <a href="divisas">
            <button
                style="position:absolute; top:44%; left:54%; height:100px; width:450px; font-size:30px; border-radius:20px;"
                type="button" class="btn btn-warning">Divisas
            </button>
        </a>
        <a href="controlEntrada">
            <button
                style="position:absolute; top:63%; left:16%; height:100px; width:450px; font-size:30px; border-radius:20px;"
                type="button" class="btn btn-warning">Control de entrada
            </button>
        </a>
        <a href="RegistrarEvento">
                <button
                    style="position:absolute; top:63%; left:54%; height:100px; width:450px; font-size:30px; border-radius:20px;"
                    type="button" class="btn btn-warning">Registrar evento
                </button>
        </a>
        <a href="usuarios">
            <button
                style="position:absolute; top:82%; left:16%; height:100px; width:450px; font-size:30px; border-radius:20px;"
                type="button" class="btn btn-warning">Usuarios
            </button>
        </a>
        <a href="roles">
            <button
                style="position:absolute; top:82%; left:54%; height:100px; width:450px; font-size:30px; border-radius:20px;"
                type="button" class="btn btn-warning">Roles
            </button>
        </a>
                <a href="ventaTiendaFisica">
            <button
                style="position:absolute; top:101%; left:16%; height:100px; width:450px; font-size:30px; border-radius:20px;"
                type="button" class="btn btn-warning">Venta (Tienda Fisica)
            </button>
        </a>

    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
        </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
        </script>

</body>

</html>