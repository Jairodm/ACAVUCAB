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
    <h1 class="display-4 text-center">Datos del Pago</h1>
    <hr class="bg-warning">
@if($TipoMetodoPago == 'Efectivo')
    <h2 class="">{{$TipoMetodoPago}}</h2>
    <form action="{{route('agregarMetodo',[$ventaActual,'Efectivo'])}}" method="post">
        @csrf
        <div class="row ">
            <div class="col-md-4">
                <label for="Efectivo">Denominación</label>
                <input type="number" class="form-control" name="denominacion" placeholder="" value="" required>
            </div>
            <div class="col-md-4">
                <label for="Debito">Cantidad de billetes</label>
                <input type="number" class="form-control" name="valor_moneda" placeholder="" value="" required>
            </div> 
        </div>
        <button class="btn btn-warning mt-3" type="submit">Pagar</button>    
    </form>
@endif
@if($TipoMetodoPago == 'Debito')
    <h2 class="">{{$TipoMetodoPago}}</h2>
    <form action="{{route('agregarMetodo',[$ventaActual,'Debito'])}}" method="post">
        @csrf
        <div class="row ">
            <div class="col-md-4">
                <label for="Efectivo">Banco</label>
                <input type="text" class="form-control" name="banco" placeholder="" value="" required>
            </div>
            <div class="col-md-4">
                <label for="Debito">Numero de Tarjeta</label>
                <input type="text" class="form-control" name="numero_tarjeta_debito" placeholder="" value="" required>
            </div> 
        </div>
        <button class="btn btn-warning mt-3" type="submit">Pagar</button>    
    </form>

@endif
@if($TipoMetodoPago == 'Credito')
    <h2 class="">{{$TipoMetodoPago}}</h2>
    <form action="{{route('agregarMetodo',[$ventaActual,'Credito'])}}" method="post">
        @csrf
        <div class="row ">
            <div class="col-md-4">
                <label for="Efectivo">Tipo de Tarjeta de Crédito</label>
                <input type="text" class="form-control" name="tipo_tarjeta_credito" placeholder="" value="" required>
            </div>
            <div class="col-md-4">
                <label for="Debito">Numero de tarjeta</label>
                <input type="text" class="form-control" name="numero_tarjeta_credito" placeholder="" value="" required>
            </div> 
            <div class="col-md-4">
                <label for="Debito">Fecha de vencimiento</label>
                <input type="text" class="form-control" name="fecha_vencimiento" placeholder="" value="" required>
            </div> 
        </div>
        <button class="btn btn-warning mt-3" type="submit">Pagar</button>    
    </form>

@endif
@if($TipoMetodoPago == 'Cheque')
    <h2 class="">{{$TipoMetodoPago}}</h2>
    <form action="{{route('agregarMetodo',[$ventaActual,'Cheque'])}}" method="post">
        @csrf
        <div class="row ">
            <div class="col-md-4">
                <label for="Efectivo">Banco</label>
                <input type="text" class="form-control" name="banco" placeholder="" value="" required>
            </div>
            <div class="col-md-4">
                <label for="Debito">Número de cheque</label>
                <input type="text" class="form-control" name="numero_cheque" placeholder="" value="" required>
            </div> 
            <div class="col-md-4">
                <label for="Debito">Número de cuenta</label>
                <input type="text" class="form-control" name="numero_cuenta" placeholder="" value="" required>
            </div> 
        </div>
        <button class="btn btn-warning mt-3" type="submit">Pagar</button>    
    </form>

@endif
@if($TipoMetodoPago == 'Divisa')
    <h2 class="">{{$TipoMetodoPago}}</h2>
    <form action="{{route('agregarMetodo',[$ventaActual,'Divisa'])}}" method="post">
        @csrf
        <div class="row ">
            <div class="col-md-4">
                <label for="Efectivo">Denominación</label>
                <input type="number" class="form-control" name="denominacion" placeholder="" value="" required>
            </div>
            <div class="col-md-4">
                <label for="Debito">Cantidad de billetes</label>
                <input type="number" class="form-control" name="valor_moneda" placeholder="" value="" required>
            </div> 
            <div class="col-md-3 mb-3">
                <label for="ingrediente">Seleccione divisa</label>
                <select class="custom-select d-block w-100"  name='nombre_divisa' >
                    <option value="">Escoger...</option>
                    @foreach ($divisas as $item)
                        <option>{{$item->nombre_divisa}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <button class="btn btn-warning mt-3" type="submit">Pagar</button>    
    </form>
@endif
<form action="{{route ('eliminarVenta',$ventaActual)}}" method="post">
    @method('DELETE')
    @csrf
    <button type="submit" class="btn btn-danger">Cancelar compra</button>
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