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
    <title>ACAVUCAB - Reporte Top 10 cerveza</title>
</head>

<body>


    @include('plantilla')


    <div class="container mt-2 pt-2">
        <h1 class="display-4 text-center">Top 5 cervezas más vendidas en Eventos</h1>
        <hr class="bg-warning">

        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Indique Periodo de tiempo</h4>
            <form method="POST" action="{{ route('reporte.top5.evento') }}" validate>
                @csrf

                

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="fechaInicioEvento">Fecha Inicio</label>
                        <input type="date" class="form-control" name="fechaInicio" placeholder="" value=""
                            required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="fechaFinEvento">Fecha Fin</label>
                        <input type="date" class="form-control" name="fechaFin" placeholder="" value=""
                            required>
                    </div>
                </div>
                

                <button type="submit" class="btn btn-warning">Generar reporte</button>

            </form>

        </div>
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