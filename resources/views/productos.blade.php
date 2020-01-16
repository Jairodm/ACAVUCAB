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
    <title>ACAVUCAB - Catálogo</title>
</head>

<body>
        @include('plantilla')   
    
    <div class="container mt-2 pt-2">
        <h2 class="display-4">Nuestras cervezas</h2>
        <hr class="bg-warning">
            <ul class="list-unstyled">
                @foreach ($cerveza as $item) 
                                                
                    <li class="media">
                        
                        <a href="{{route('ConsultarProductoCliente', $item)}}"><img src="{{$item->imagen_cerveza}}" class="mr-3" alt="" style="height: 150px; width: 120px"></a>                      <div class="media-body">
                        <a href="{{route('ConsultarProductoCliente', $item)}}" style="color:black;"><h4 class="mt-0 mb-1">{{$item->nombre_cerveza}}</h4></a>
                        <h6>Tipo de cerveza: {{$item->tipoDeCerveza->nombre_tipo_cerveza}} </h6>
                        <h6>Proveedor: {{$item->Proveedor->denominacion_comercial}} </h6>
                        <h6>Precio: {{$item->precio}} </h6>
                      </div>
                      
                    </li>
                    <hr class="bg-warning">  
                @endforeach
                    
                  </ul>
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