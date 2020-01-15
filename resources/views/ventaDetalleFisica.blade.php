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
    <h1 class="display-4 text-center">Detalles</h1>
    <h4>Factura N°:{{$ventaActual}}</h4>
    <hr class="bg-warning">


    <form action="/ventaDetalleFisica/{{$ventaActual}}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-6">
                    <label for="ingrediente">Producto</label>
                    <select class="custom-select d-block w-100"  name='cerveza' >
                        <option value="">Escoger...</option>
                        @foreach($cervezas as $item)
                        <option>{{$item->nombre_cerveza}}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Por favor escoja un ingrediente válido.
                    </div>
            </div>
            <div class="col-md-6">
                <label for="codigo_cliente">Cantidad</label>
                <input type="text" class="form-control" name="cantidad_venta" placeholder="" value="" required>
            </div>
        </div>
        <button type="submit" class="btn btn-warning mt-3">Añadir</button>
    </form> 
    <h3 class="display-6 text-center">Detalle Venta</h3>
    <table class="table table-hover">
        <thead class="bg-warning">
            <tr>
                <th scope="col" class="text-center">Código</th>
                <th scope="col" class="text-center">Producto</th>
                <th scope="col" class="text-center">Cantidad</th>
                <th scope="col" class="text-center">Precio Unitario</th>
                <th scope="col" class="text-center">Total</th>
                <th scope="col" class="text-center"></th>
                <th scope="col" class="text-center"></th>
                <th colspan="2">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach($detalleVenta as $productos)
            <tr>
                <th class="text-center">{{$productos->cerveza}}</th>
                <th class="text-center"></th>
                <th class="text-center" id="cantidadCer">{{$productos->cantidad_venta}}</th>
                <th class="text-center" id="precioUnit">{{$productos->precio_unitario_venta}}</th>                                
                <th class="text-center" id='totalProducto'>{{($productos->cantidad_venta)*($productos->precio_unitario_venta)}}</th>
                
                <td class="text-center"><a href="" class="btn btn-danger">Eliminar</a></td>
                
                <th></th>
            </tr>
            @endforeach
            
        </tbody>
    </table>
    <h1 class="display-4 ">Total factura: {{$totalFactura ?? ''}} </h1> 

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