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
    <title>ACAVUCAB - Beneficios</title>
</head>

<body>
        @include('plantilla')
    <div class="container mt-2 pt-2">
        <h2 class="display-4 text-center">Beneficios </h2>
        <hr class="bg-warning">
            <table class="table table-hover">
                    <thead class="bg-warning">
                        <tr>
                            <th scope="col" class="text-center">Nombre de beneficio</th>
                            <th scope="col" class="text-center">Tipo de beneficio</th>
                            <th scope="col" class="text-center">Beneficio obtenido</th>
                            <th scope="col" class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">Seguro</td>
                            <td class="text-center">Seguro médico en caso de accidente</td>
                            <td class="text-center">Suma asegurada: 100.000 Bs </td>
                            <td class="text-center"><a href="ConsultarBeneficio">Editar beneficio</a></td>
                        </tr>
                    </tbody>
                </table>
        <a href="RegistrarBeneficio"><button type="button" class="btn btn-warning">Añadir beneficio</button></a>
    </div>

    <div class="container mt-2 pt-2">
            <h2 class="display-4 text-center">Vacaciones</h2>
            <hr class="bg-warning">
                <table class="table table-hover">
                        <thead class="bg-warning">
                            <tr>
                                <th scope="col" class="text-center">Fecha de inicio</th>
                                <th scope="col" class="text-center">Fecha de finalización</th>
                                <th scope="col" class="text-center"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">10/11/2019</td>
                                <td class="text-center">24/12/2019</td>
                                <td class="text-center"><a href="ConsultarVacacion">Editar vacaciones </a></td>
                            </tr>
                        </tbody>
                    </table>
            <a href="RegistrarVacacion"><button type="button" class="btn btn-warning">Añadir vacaciones</button></a>
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