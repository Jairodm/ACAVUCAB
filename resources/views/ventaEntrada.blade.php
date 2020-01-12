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
    <title>ACAVUCAB - Comprar Entradas</title>
</head>

<body>
        @include('plantilla')

    <div class="container mt-2 pt-2">
        <h2 class="display-4 text-center">Comprar Entradas</h2>
        <hr class="bg-warning">
        
          <form method="POST" action="{{ route('pagar.entrada',$evento) }}" validate>
            @csrf
            <ul class="list-unstyled">
                    <li class="media">
                        <a href="#"><img src="Cerveza5.jpg" class="mr-3" alt="" style="height: 150px; width: 120px"></a>                      
                      <div class="media-body">
                        <a href="#" style="color:black;"><h4 class="mt-0 mb-1">Nombre del Evento: {{$evento->nombre_evento}}</h4></a>
                        <h6>Fecha del Evento: {{$evento->fecha_inicio_evento}}</h6>
                        <h6>Entradas disponibles: {{$evento->cantidad_entradas}}</h6>
                      </div>
                      
                    </li>
                    <hr class="bg-warning">
            </ul>
            <table class="table table-hover">
                    <thead class="bg-warning">
                        <tr>
                            <th scope="col" class="text-center">Precio</th>
                            <th scope="col" class="text-center">Cantidad</th>
                            <th scope="col" class="text-center">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>

                            <td class="text-center"><input type="text" id="precio" name= "precio" value="{{$evento->precio_entrada}}" hidden>{{$evento->precio_entrada}}</td>

                            <td class="text-center"><input type="text" id="cantidadEnt" name="cantidadEnt"></td>
                            <td class="text-center" id="total" name="total"></td>
                            
                        </tr>
                    </tbody>
                </table>
                <hr class="bg-warning">
                <a href="EscogerMetodoDePagoEntrada">
               <button type="submit" class="btn btn-warning float-right">Pagar</button>
               </a>
            </form>
        
         

                <button onclick="calculate()" class="btn btn-warning float-left">Calcular monto</button>
            
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

    <script>
        function calculate()
            { 
            var field1=document.getElementById("precio").value;
            var field2=document.getElementById("cantidadEnt").value;

            var resultado = parseFloat(field1)*parseFloat(field2);

            if(!isNaN(resultado))
            {
                document.getElementById("total").innerHTML=resultado;
            }

        }
    
    </script>
</body>

</html>