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
    <title>ACAVUCAB - Consultar producto</title>
</head>
<body>

       @include('plantilla')

    <div class="container mt-2 pt-2">
        <h1 class="display-4 text-center">Consulta de producto </h1>
        <hr class="bg-warning">       
        
        <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Información del producto</h4>
                <form action="{{route ('registrarEnCarrito', $cerveza->codigo_cerveza)}}" class="needs-validation" method="POST" novalidate>

                    @method('POST')
                    @csrf
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label for="nombreCerveza">Nombre de la cerveza</label>
                      <input type="text" class="form-control" id="nombreCerveza" placeholder="" value="{{$cerveza->nombre_cerveza}}" readonly>                      
                    </div>
                    <div class="col-md-6 mb-3">
                            <label for="precioCerveza">Precio</label>
                             <input type="text" class="form-control" id="precioCerveza" placeholder="" value="{{$cerveza->precio}}" readonly>                          
                        </div>
                </div>

                  <div class="row">
                        <div class="col-md-6 mb-3">
                                <label for="tipoCerveza">Tipo de cerveza</label>
                                <input type="text" class="form-control" id="tipoCerveza" placeholder="" value="{{$cerveza->tipoDeCerveza->nombre_tipo_cerveza}}" readonly> 
                      </div>
                      <div class="col-md-6 mb-3">
                            <label for="proveedorCerveza">Proveedor</label>
                            <input type="text" class="form-control" id="proveedorCerveza" placeholder="" value="{{$cerveza->Proveedor->denominacion_comercial}}" readonly> 
                  </div>
                    </div>

                    <h1 style="font-size:30px; margin-top:30px"class="display-4">Receta </h1>
                    <hr class="bg-warning">

                    <table id = "dataTable" class="table table-hover">
                        <thead class="bg-warning">
                            <tr>
                                <th scope="col" class="text-center">Ingrediente</th>
                                <th scope="col" class="text-center">Descripción</th>
                                <th scope="col" class="text-center">Cantidad</th>
                                <th scope="col" class="text-center">Unidad</th>
                                <td class="text-center"></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($receta as $item)
                               
                            <tr>
                                <th scope="row" class="text-center">{{$item->ingrediente->nombre_ingrediente}}</th>
                                <td class="text-center">{{$item->descripcion_receta}} </td>
                                <td class="text-center">{{$item->cantidad_ingrediente}}</td>
                                <td class="text-center">{{$item->unidad_ingrediente}}</td>
                            </tr>
                                
                            @endforeach
                        </tbody>
                    </table>
            
            <div class="row">
                    <div class="col-md-6 mb-3">
                            <label for="cantidad">Cantidad</label>
                            <input type="numeric" class="form-control" name="cantidadProducto" placeholder="" value="" required>
                            
                  </div>
                    <div class="col-md-6 mb-3">
                            <button style="margin-top:32px"type="submit" class="btn btn-warning">Agregar a mi carrito</button>      
                    </div>
                </div>
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