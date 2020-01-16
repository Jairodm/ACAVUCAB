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
    <h1 class="display-4 text-center">Tienda Física</h1>
    <hr class="bg-warning"> 
    <form action="{{route('TiendaFisica')}}" method="get">
        <div class="row">
            <div class="col-md-4 mb-2">
                <label for="codigo_cliente">Rif o Cédula del Cliente</label>
                <input type="text" class="form-control" name="rif_cliente" placeholder="" value="{{$mostrarCliente ?? ''}}" >
            </div>
            <div class="col-md-4 mb-2">
                <label for="codigo_cliente">Nombre del Cliente</label>
                <input type="text" class="form-control" name="nombre_cliente" placeholder="" value="{{$nombreCliente ?? ''}}" readonly>
            </div>
            <div class="col-md-4 mt-1">
                <br>
                <button type="submit" class="btn btn-warning float-right">Buscar cliente existente</button>
            </div>
        </div>
    </form>
    <a href="" class="btn btn-success float-right">Añadir nuevo cliente</a> 
    @if($mostrarCliente == 'El cliente no está registrado' ?? '')
    @else
    <form action="{{route('crearVenta',$mostrarCliente)}}" method="get">
        @csrf
        <button type="submit" class="btn btn-warning">Nueva venta</button>
    </form>     
    @endif


</div>








</body>







</html>