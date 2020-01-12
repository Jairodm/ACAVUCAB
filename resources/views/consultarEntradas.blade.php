<!DOCTYPE blade.php>
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
        <title>ACAVUCAB - Consultar Evento</title>
    </head>

<body>
        @include('plantilla')

    <div class="container mt-2 pt-2">
        <h2 class="display-4 text-center">Evento </h2>
        <hr class="bg-warning"> 
        
        

        <div class="container mt-5 pt-3" style="text-align : center""> 
              <div style = "width: 750px ; display: inline-block">

                
                    <div class="row text-right">
                            

                        <div class="col-md-3">
                            <h5 class="row text-right">Nombre:</h5>
                        </div>
                        <div class="col-md-3">
                            <p class="row text-right" style="font-size:20px">{{$evento->nombre_evento}}</p>
                        </div>
                    </div>
                    <div class="row text-right">
                        <div class="col-md-3">
                            <h5 class="row text-right">Fecha Inicio:</h5>
                        </div>
                        <div class="col-md-3">
                            <p class="row text-right"  style="font-size:20px">{{$evento->fecha_inicio_evento}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <h5 class="row text-right">Hora Inicio:</h5>
                        </div>
                        <div class="col-md-3">
                            <p class="row text-right"  style="font-size:20px">{{$evento->hora_inicio_evento}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <h5 class="row text-right">Fecha Culminacion:</h5>
                        </div>
                        <div class="col-md-3">
                            <p class="row text-right"  style="font-size:20px">{{$evento->fecha_fin_evento}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <h5 class="row text-right">Hora Culminacion:</h5>
                        </div>
                        <div class="col-md-3">
                            <p class="row text-right"  style="font-size:20px">{{$evento->hora_fin_evento}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <h5 class="row text-right">Precio Entrada:</h5>
                        </div>
                        <div class="col-md-3">
                            @if( $evento->precio_entrada == null)
                            
                                <p class="row text-right"  style="font-size:20px">Gratis</p>
                            
                            @else 
                                <p class="row text-right"  style="font-size:20px">{{$evento->precio_entrada}}</p>
                            @endif
                        </div>
                        
                    </div>
                    <div class="row">
                        

                        @if( $evento->cantidad_entradas == null)
                        
                        @else 
                            <div class="col-md-3">
                                <h5 class="row text-right">Cantidad Disponible:</h5>
                            </div>

                            <div class="col-md-3">
                               <p class="row text-right"  style="font-size:20px">{{$evento->cantidad_entradas}}</p>
                            </div>
                        @endif
                        
                    </div>
                </div>
             
            
                </div>

           <hr class="bg-warning"> 
            <a href="{{route('index.evento')}}">
           <button  class="btn btn-warning">Regresar</button>
            </a>
            <a href="{{route('comprar.entradas', $evento)}}">
            <button class="btn btn-warning float-right">Comprar Entradas</button>
            </a>

        
   

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