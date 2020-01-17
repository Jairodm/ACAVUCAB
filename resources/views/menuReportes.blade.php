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
    <link rel="stylesheet" href="carrito.css">
    <title>ACAVUCAB - Menú de registro</title>

</head>



<body>
       @include('plantilla')

    <div>
        @can('reporte.top10cerveza')
        <a href="{{route ('vista.reporte.top10.cerveza')}}">
            <button
                style="position:absolute; top:25%; left:16%; height:100px; width:450px; font-size:30px; border-radius:20px;"
                type="button" class="btn btn-warning">Top 10 Cervezas 
            </button>
        </a>
        @endcan
        @can('reporte.top5evento')
        <a href="{{route ('vista.reporte.top5.evento')}}">
            <button
                style="position:absolute; top:25%; left:54%; height:100px; width:450px; font-size:30px; border-radius:20px;"
                type="button" class="btn btn-warning">Top 5 Cervezas eventos
            </button>
        </a>
        @endcan
        @can('reporte.top10cliente')
        <a href="{{route ('vista.reporte.top10.cliente')}}">
            <button
                style="position:absolute; top:44%; left:16%; height:100px; width:450px; font-size:30px; border-radius:20px;"
                type="button" class="btn btn-warning">Top 10 clientes
            </button>
        </a>
        @endcan
        @can('reporte.inventario')
        <a href="{{route ('vista.reporte.inventario')}}">
            <button
                style="position:absolute; top:44%; left:54%; height:100px; width:450px; font-size:30px; border-radius:20px;"
                type="button" class="btn btn-warning">Movimiento Inventario
            </button>
        </a>
        @endcan
        @can('reporte.tipocerveza')
        <a href="{{route ('vista.reporte.tipoCerveza')}}">
            <button
                style="position:absolute; top:63%; left:16%; height:100px; width:450px; font-size:30px; border-radius:20px;"
                type="button" class="btn btn-warning">Tipo de cerveza más vendido
            </button>
        </a>
        @endcan
   
        
        <a href="{{route ('vista.reporte.listaordenes')}}">
                <button
                    style="position:absolute; top:63%; left:54%; height:100px; width:450px; font-size:30px; border-radius:20px;"
                    type="button" class="btn btn-warning">Lista de ordenes
                </button>
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