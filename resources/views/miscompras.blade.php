<!doctype blade.php>
<htmlp lang="en">

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
    <title>ACAVUCAB - Mis compras</title>
</head>

<body>
        @include('plantilla')
    <div class="container mt-4 pt-4">
        <h1 class="display-4">Mis compras</h1>
        <hr class="bg-warning">
        <table class="table table-hover">
            <thead class="bg-warning">
                <tr>
                    <th scope="col" class="text-center">Nº de Factura</th>
                    <th scope="col" class="text-center">Fecha de Compra</th>
                    <th scope="col" class="text-center">Monto pagado</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($venta as $item)
                        <tr>
                                <th class="text-center">{{$item->numero_factura}}</th>
                                <th class="text-center">{{$item->fecha_venta}}</th>  
                                <th class="text-center">{{$item->monto_total_venta}}</th>  
                                <td class="text-center"><a href="{{route('consultarVenta', $item)}}">Consultar compra</a></td>                        
                </tr>
                @endforeach  
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <ul class="pagination justify-content-center">
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Previous" style="color:#fab700;">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
              </a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#" style="color:#fab700;">1</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#" style="color:#fab700;">2</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#" style="color:#fab700;">3</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Next" style="color:#fab700;">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
              </a>
            </li>
          </ul>
      
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