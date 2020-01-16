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
    <title>ACAVUCAB - Venta Tienda Física</title>
</head>
<body>
@include('plantilla') 

<div class="container mt-2 pt-2">
    <h1 class="display-4 text-center">Selecciona un método</h1>
    <hr class="bg-warning">
    <div class="row text-center">
        <div class="col-md-4">
            <label for="Efectivo">Efectivo</label>
            <form action="{{route('metodoPagoVentaFisica',[$ventaActual,'Efectivo'])}}" method="get">
                <button class="btn btn-warning" type="submit">Aceptar</button>
            </form>
        </div>
        <div class="col-md-4">
            <label for="Debito">Tarjeta Débito</label>
            <form action="{{route('metodoPagoVentaFisica',[$ventaActual,'Debito'])}}" method="get">
                <button class="btn btn-warning" type="submit">Aceptar</button>
            </form>
        </div>
        <div class="col-md-4">
            <label for="Crédito">Tarjeta Crédito</label>
            <form action="{{route('metodoPagoVentaFisica',[$ventaActual,'Credito'])}}" method="get">
            <button class="btn btn-warning" type="submit">Aceptar</button>
            </form>
        </div>
    </div>
    <div class="row mt-3 text-center">
        <div class="col-md-4">
            <label for="Divisa">Divisa</label>
            <form action="{{route('metodoPagoVentaFisica',[$ventaActual,'Divisa'])}}" method="get">
                <button class="btn btn-warning" type="submit">Aceptar</button>
            </form>
        </div>
        <div class="col-md-4">
            <label for="Cheque">Cheque</label>
            <form action="{{route('metodoPagoVentaFisica',[$ventaActual,'Cheque'])}}" method="get">
                <button class="btn btn-warning" type="submit">Aceptar</button>
            </form>
        </div>
    </div>
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