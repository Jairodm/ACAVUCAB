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
    <title>ACAVUCAB - Consulta de beneficio</title>

    <style>
        .center_div {
            margin: 0 auto;
            width: 60%
                /* value of your choice which suits your alignment */
        }
    </style>


</head>

<body>
    @include('plantilla')

    <div class="container">
        <h1 class="display-4 text-center">Beneficio</h1>
        <hr class="bg-warning">


        <div class="container center_div">

            <form class="form" novalidate>


                    <div class="col-md-6 mb-3">
                            <label for="nombretarjeta">Nombre del beneficio:</label>
                            <input type="text" class="form-control" id="nombretarjeta" placeholder="" required>
        
        
                        </div>
        
                        <div class="col-md-6 mb-3">
                            <label for="vencimiento">Tipo de beneficio:</label>
                            <input type="text" class="form-control" id="valorDivisa" placeholder="" required>
                            <div class="invalid-feedback">
                                Valor requerido
                            </div>
        
                        </div>
        
                        <div class="col-md-6 mb-3">
                            <label for="vencimiento">Descripcion del beneficio:</label>
                            <input type="text" class="form-control" id="valorDivisa" placeholder="" required>
                            <div class="invalid-feedback">
                                Valor requerido
                            </div>
        
                        </div>


                <hr class="mb-4">
                <div class="col md-4 text-center">
                    <button class="btn btn-warning btn-lg " type="submit">Guardar cambios</button>
                </div>
            </form>

        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>

</html>