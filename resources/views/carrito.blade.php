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
    <title>ACAVUCAB - Carrito</title>
    <link rel="stylesheet" href="carrito.css">
</head>

<body>
  @include('plantilla')

    <div class="px-4 px-lg-0">
            <!-- For demo purpose -->
            <h1 class="display-4 text-center">Mi Carrito</h1>
             <hr class="bg-warning">
            <!-- End -->

            @if($errors->any())
            <div class="alert alert-danger">
            <label>{{$errors->first()}}</label>
            </div>
            @endif

            <table class="table table-hover">
              <thead class="bg-warning">
                  <tr>
                      <th scope="col" class="text-center"></th>
                      <th scope="col" class="text-center">Nombre</th>
                      <th scope="col" class="text-center">Tipo</th>
                      <th scope="col" class="text-center">Proveedor</th>
                      <th scope="col" class="text-center">Cantidad</th>
                      <th scope="col" class="text-center">Precio</th>
                      <th scope="col" class="text-center"></th>
                      <th scope="col" class="text-center"></th>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($carrito as $item)
                  <tr>    
                          <th class="text-center" ><img src="{{$item->cerveza->imagen_cerveza}}" class="mr-3" alt="" style="height: 150px; width: 120px"></th>
                          <th class="text-center" >{{$item->cerveza->nombre_cerveza}}</th>    
                          <th class="text-center" >{{$item->cerveza->tipoDeCerveza->nombre_tipo_cerveza}}</th>
                          <th class="text-center" >{{$item->cerveza->Proveedor->denominacion_comercial}}</th>
                          <th class="text-center" >{{$item->cantidad}}</th>
                          <th class="text-center" >{{$item->cerveza->precio}} Bs.</th>
                          <td class="text-center"><a href="{{route('consultarCarrito', $item->codigo_carrito)}}">Modificar</a></td>
                           
                          <td class="text-center"><form action="{{route('eliminarDeCarrito', $item->codigo_carrito)}}" method="POST" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button>Eliminar</button></form></td> 
                                                 
          </tr>
          @endforeach  
              </tbody>
          </table>
          
          <div class="col-md-8 order-md-1">
            <div class="row">
          <div class="col-md-6 mb-3">
            <label for="direccionFiscal">Monto total:</label>
            <input type="text" class="form-control" name="montoTotal" placeholder="" value="{{$total}}" readonly>                    
          </div>
          <div class="col-md-6 mb-3">
            <a href="{{route('escogerMetodoDigital', $total)}}">
                <button style="margin-top:31px" type="button" class="btn btn-warning">Procesar compra</button>
            </a>                    
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
















