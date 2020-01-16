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
    <title>ACAVUCAB - Escoger método de pago</title>
</head>

<body>
        @include('plantilla')
            <div class="container mt-2 pt-2">
                <h2 class="display-4 text-center">Mis métodos de pago </h2>
                <hr class="bg-warning">
                    <table class="table table-hover">
                            <thead class="bg-warning">
                                <tr>
                                    <th scope="col" class="text-center">Tipo</th>
                                    <th scope="col" class="text-center">Número de la tarjeta de crédito</th>
                                    <th scope="col" class="text-center">Nombre del titular</th>
                                    <th scope="col" class="text-center">Fecha de vencimiento</th>
                                    <th scope="col" class="text-center"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($metodo_pago as $item)
                                <tr>
                                        <th class="text-center">{{$item->tipo_tarjeta_credito}}</th>
                                        <th class="text-center">{{$item->numero_tarjeta_credito}}</th>
                                        <th class="text-center">{{$item->nombre_titular}}</th>
                                        <th class="text-center">{{$item->fecha_vencimiento}}</th>    
                                        <td class="text-center"><a href="{{route('digitalProcesar', [$item->codigo_metodo_pago, $total])}}">Escoger método</a></td>                        
                        </tr>
                        @endforeach  
                            </tbody>
                        </table>
                        <a href="{{route('registrarMetodoCliente', $cliente)}}">
                            <button style="margin-right:30px" type="button" class="btn btn-warning">Agregar método de pago</button>
                        </a>
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