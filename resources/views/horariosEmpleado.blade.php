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
    <title>ACAVUCAB - Horarios empleado</title>
</head>

<body>
        <nav class="navbar navbar-expand-lg bg-warning navbar-light sticky-top">

                <div id="navb" class="navbar-collapse collapse hide">
                    <ul class="nav navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link " href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <span class="fas fa-bars"></span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="productos">Nuestros productos</a>
                                <a class="dropdown-item" href="eventos">Eventos</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="diarioCerveza">Diario de una cerveza</a>
                            </div>
                        </li>
                    </ul>
        
                    <div id="navb" class="navbar-collapse collapse hide">
                        <ul class="navbar-nav">
                            <li class="nav-item ">
                                <a class="nav-brand" href="index"><img class="logo" src="logooo.png" height="58rem"></a>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <span class="fas fa-user"></span>Mi cuenta</a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="inicioSesion">Iniciar sesión</a>
                                    <a class="dropdown-item" href="#">Mi cuenta</a>
                                    <!--Aquí iría una comprobación del tipo de usuario logeado
                                    para saber si mandarlo a ConsultarClienteNatural, ConsultarClientejuridico,
                                    ConsultarEmpleado o ConsultarProveedor-->
                                    <a class="dropdown-item" href="miscompras">Mis compras</a>
                                    <a class="dropdown-item" href="menuAdministrador">Administrador</a>
                                    <a class="dropdown-item" href="menuProveedor">Proveedor</a>
                                    <a class="dropdown-item" href="menuRegistro">Registrarse</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Cerrar sesión</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="carrito"><span class="fas fa-shopping-cart">
                                    </span>Carrito</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
    
    <div class="container mt-2 pt-2">
        <h2 class="display-4 text-center">Horario </h2>
        <hr class="bg-warning">
            <table class="table table-hover">
                    <thead class="bg-warning">
                        <tr>
                            <th scope="col" class="text-center">Día de la semana</th>
                            <th scope="col" class="text-center">Hora de llegada</th>
                            <th scope="col" class="text-center">Hora de salida</th>
                            <th scope="col" class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($horario_y_Empleado as $item)
                        <tr>
                                <th class="text-center">{{$item->horario->dia}}</th>
                                <th class="text-center">{{$item->horario->hora_entrada}}</th>  
                                <th class="text-center">{{$item->horario->hora_salida}}</th>   
                                <td class="text-center">
                                <form action="{{route ('eliminar.horarioEmpleado', $item->codigo_horario_y_empleado)}}" method="POST" class="d-inline">

                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-warning btn-lg " style="background-color:red; color:white; font-size:15px"  type="submit">Eliminar horario del empleado</button>
                        
                                </form>
                            </td>             
                </tr>
                @endforeach  
                    </tbody>
                </table>

                <a href="{{route('registrarHorarioEmpleado', $empleado->cedula_empleado)}}">
                    <button style="margin-right:30px" type="button" class="btn btn-warning">Agregar horario al empleado</button>
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