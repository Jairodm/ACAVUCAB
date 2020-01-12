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
    <title>ACAVUCAB - Registrar evento</title>
</head>

<body>


    @include('plantilla')


    <div class="container mt-2 pt-2">
        <h1 class="display-4 text-center">Registrar evento </h1>
        <hr class="bg-warning">

        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Información del evento</h4>
            <form method="POST" action="{{ route('registrar.evento') }}" validate>
                @csrf

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nombreEvento">Nombre del evento</label>
                        <input type="text" class="form-control" name="nombreEvento" placeholder="" value=""
                            required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="descripcionEvento">Descripción</label>
                        <input type="text" class="form-control" name="descripcionEvento" placeholder="" value=""
                            required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="fechaInicioEvento">Fecha Inicio</label>
                        <input type="date" class="form-control" name="fechaInicioEvento" placeholder="" value=""
                            required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="fechaFinEvento">Fecha Fin</label>
                        <input type="date" class="form-control" name="fechaFinEvento" placeholder="" value=""
                            required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="inicioEvento">Hora de inicio</label>
                        <input type="time" class="form-control" name="inicioEvento" placeholder=""
                            value="" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="finalEvento">Hora de finalización</label>
                        <input type="time" class="form-control" name="finalEvento" placeholder=""
                            value="" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="precioEvento">Precio de la entrada(opcional)</label>
                        <input type="text" class="form-control" name="precioEvento" placeholder="Monto en Bs."
                            value="">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="precioEvento">Cantidad de Entradas(opcional)</label>
                        <input type="text" class="form-control" name="cantidadEntradas" placeholder=""
                            value="">
                    </div>
                </div>

                <h1 style="font-size:30px" class="display-4">Ubicación </h1>
                <hr class="bg-warning">

                <div class="row">
                    <div class="col-md-5 mb-3">
                        <label for="estado">Estado</label>

                        <select class="custom-select d-block w-100" name="estado" required>
                            <option value="">Escoger...</option>
                            @foreach ($estado as $item)
                            
                            <option>{{$item}}</option>
                           @endforeach

                        </select>

                        <div class="invalid-feedback">
                            Por favor escoja un estado válido.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="municipio">Municipio</label>

                        <select class="custom-select d-block w-100" name="municipio" required>
                            <option value="">Escoger...</option>
                            @foreach ($municipio as $item)
                              
                              <option>{{$item}}</option>
                            @endforeach
                        </select>

                        <div class="invalid-feedback">
                            Por favor escoja un municipio válido.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="parroquia">Parroquia</label>

                        <select class="custom-select d-block w-100" name="parroquia" required>
                            <option value="">Escoger...</option>
                            @foreach ($parroquia as $item)
                              
                            <option>{{$item}}</option>
                            @endforeach
                        </select>

                        <div class="invalid-feedback">
                            Por favor escoja una parroquia válida.
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="passwordJuridico">Detalle de la dirección</label>
                        <input type="text" class="form-control" name="detalleDireccionEvento" placeholder="" value="" required>                              
                    </div>
                </div>

                <button type="submit" class="btn btn-warning">Registrar evento</button>

            </form>

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