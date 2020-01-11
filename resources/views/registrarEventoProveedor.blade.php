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


        <div class="col-md-8 order-md-1">
         
            <form method="POST" action="{{ route('agregar.evento.proveedor', $evento)}}" validate>
                @csrf

                <h1 style="font-size:30px" class="display-4">Proveedores que atenderán </h1>
                <hr class="bg-warning">

                <div class="row">
                    <div class="col-md-5 mb-3">
                        <label for="proveedorEvento">Proveedor</label>

                        <select class="custom-select d-block w-100" name="proveedor" required>
                            <option value="">Escoger...</option>
                            @foreach ($proveedor as $item)
                            
                            <option>{{$item->razon_social}}</option>
                           @endforeach

                        </select>

                        <div class="invalid-feedback">
                            Por favor escoja un proveedor válido.
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-warning">Agregar
                    proveedor</button>
            </form>


                <div class="container mt-4 pt-4">
                    <table class="table table-hover">
                        <thead class="bg-warning">
                            <tr>
                                <th scope="col" class="text-center">Proveedor</th>
                                <td class="text-center"></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($eventoProveedor as $item)
                            <tr>
                                    <th class="text-center">{{$item->razon_social}}</th>

                                <th class="text-center">
                                    <form action="{{route ('eliminar.proveedor.evento',['id'=>$item->rif_proveedor,'id2'=>$evento])}}" method="POST" class="d-inline">

                                        @method('DELETE')
                                        @csrf
                                        <button style="background-color: greenyellow"type="submit" class="btn btn-warning">Eliminar</button>
                            
                                    </form>
                                </th>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <form method="GET" action="{{ route('index.evento')}}" >
                    <button style="background-color: greenyellow"type="submit" class="btn btn-warning">Registrar evento</button>


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