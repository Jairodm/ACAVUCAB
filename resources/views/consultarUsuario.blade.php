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
    <title>ACAVUCAB - Consultar usuario</title>
</head>
<body>
        @include('plantilla')

    <div class="container mt-2 pt-2">
        <h1 class="display-4 text-center">Consulta de Usuario </h1>
        <hr class="bg-warning">       
        
        <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Información del usuario</h4>

            <form action="{{route ('editar.usuario', $usuario->id)}}" class="needs-validation" method="POST" novalidate>

                @method('PUT')
                @csrf
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label for="primerNombreEmpleado">ID</label>
                    <input type="text" class="form-control" id="primerNombreEmpleado" placeholder="" value="{{$usuario->id}}" readonly>
                      
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="segundoNombreEmpleado">Email</label>
                      <input type="text" class="form-control" id="segundoNombreEmpleado" placeholder="" value="{{$usuario->email}}" readonly>                    
                    </div>
                  </div>
                  

                  
                <br>
                <h4>Lista de Roles</h4>

                  <div class="form-group">

                        <ul class="list-unstyled">
                            @foreach ($roles as $rol)
                                
                                <li>

                                        <label>
                                            {{  Form::checkbox('roles[]',$rol->id,$usuario->roles()->find($rol->id))}}
                                            {{ $rol->name}}
                                        </label>
                                </li>
                            @endforeach

                        </ul>

                  </div>
        <div>
            
            <button style="background-color: greenyellow"type="submit" class="btn btn-warning">Guardar cambios</button>

        </div>
            

        </form>

       
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