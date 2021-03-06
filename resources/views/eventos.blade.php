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
    <title>ACAVUCAB - Eventos</title>
</head>

<body>
        @include('plantilla')


    <div class="container mt-2 pt-2">
        <h2 class="display-4 text-center">Eventos</h2>
        <hr class="bg-warning">
            <table class="table table-hover">
                    <thead class="bg-warning">
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center" width='300px'>Nombre del Evento</th>
                            <th class="text-center" width='200px'>Precio Entrada</th>
                            <th width ='150px'>
                              @can('registrar.evento')
                              <a href="{{ route('registrar.get.evento')}}" class="btn btn-md btn-warning pull-right" style="background-color:greenyellow">Crear Evento</a>
                              @endcan
                          
                             </th>
                            <th colspan="2">&nbsp;</th>
                            
                            
                            
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($eventos as $item)
                        <tr>
                                <th class="text-center">{{$item->codigo_evento}}</th>
                                <th class="text-center">{{$item->nombre_evento}}</th>

                                @if( $item->precio_entrada == null)
                                  <th class="text-center">Gratis</th>
                                @else 
                                  <th class="text-center">{{$item->precio_entrada}}</th>
                                @endif


                          @can('comprar.entradas')                           <!-- Consultar de cliente -->
                                <td class="text-center"><a href="{{route('consultar.entradas', $item)}}" class="btn btn-warning" style="background-color: greenyellow" >Consultar Evento</a></td>
                          @endcan 
                            @can('consultar.evento')                           <!-- Consultar de administrador -->
                            <td class="text-center"><a href="{{route('consultar.evento', $item)}}" class="btn btn-warning" style="background-color: greenyellow" >Consultar datos</a></td>
                            @endcan 
                            
                            <td>
                                @can('eliminar.evento')
                                <form action="{{route ('eliminar.evento',     $item->codigo_evento)}}" method="POST" class="d-inline">

                                    @method('DELETE')
                                    @csrf
                                    <button style="background-color: greenyellow"type="submit" class="btn btn-warning">Eliminar</button>
                        
                                </form>
                                @endcan
                            </td>
                        </tr>
                             @endforeach
                    </tbody>
                </table>
                {{ $eventos->links() }}
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