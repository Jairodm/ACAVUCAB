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
    <title>ACAVUCAB - Divisas</title>

    <style>
            .center_div{
                margin: 0 auto;
                width:60% /* value of your choice which suits your alignment */
              }
    </style>

    
</head>

<body>
       @include('plantilla')
    <div class="container">
            <h1 class="display-4 text-center">Divisa</h1>
            @error('nombre_divisa')
            <div class="alert alert-danger">El nombre es obligatorio</div>
            @enderror
            @error('valor_divisa')
            <div class="alert alert-danger">El valor es obligatorio</div>
            @enderror
             <hr class="bg-warning">
      
            
                <div class="container center_div">
              
                <form class="form" method="POST" action="{{route('registrar.Divisa')}}" novalidate>
                    @csrf
                  <hr class="mb-4">

                    <div class="col-md-6 mb-3">
                      <label for="nombretarjeta">Nombre de Divisa:</label>
                      <input name ="nombre_divisa" type="text" class="form-control" id="nombreDivisa" placeholder="" required value = "{{old('nombre_divisa')}}">
                     
                      
                    </div>
                
                    <div class="col-md-6 mb-3">
                      <label for="vencimiento">Valor de Divisa en Bs:</label>
                    <input name="valor_divisa" type="text" class="form-control" id="valorDivisa" placeholder="" required value = "{{old('valor_divisa')}}">
                      <div class="invalid-feedback">
                        Valor requerido
                      </div>
                   
                    </div>

                
                  <hr class="mb-4">
                  <div class="col md-4 text-center">
                        <button class="btn btn-warning btn-lg " type="submit">Registrar</button>
                        </div>
                </form>
              
            </div>

          </div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>