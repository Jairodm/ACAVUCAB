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
    <h1 class="display-4 text-center">Venta. Factura N°: {{$ventaActual->numero_factura}}</h1>
    <hr class="bg-warning">
    <div class="row">
        <div class="col-md-3">
            <h4>Cliente: {{$cliente->rif_cliente}}</h3>
        </div>
        <div class="col-md-3">
            <h4>Nombre: {{$cliente->primer_nombre ?? $cliente->denominacion_comercial}}</h3>
        </div>
        @if($cliente->primer_apellido)
        <div class="col-md-3">
            <h4>Apellido: {{$cliente->primer_apellido ?? ''}}</h3>
        </div>
        @else
        @endif
    </div>
    <form action="{{route('detalleVenta',$ventaActual->numero_factura)}}" method="get">
        <button type='submit' class='btn btn-warning mt-5'>Añadir productos</button>
    </form>
</div>
</body>
</html>