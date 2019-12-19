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
    <title>ACAVUCAB - Consultar empleado</title>
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
                            <a class="nav-brand" href="{{route ('index')}}"><img class="logo" src="{{asset('logooo.png')}}" height="58rem"></a>
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
        <h1 class="display-4 text-center">Consulta de empleado </h1>
        <hr class="bg-warning">       
        
        <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Información del empleado</h4>

            <form action="{{route ('editar.empleado', $empleado->cedula_empleado)}}" class="needs-validation" method="POST" novalidate>

                @method('PUT')
                @csrf
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label for="primerNombreEmpleado">Primer nombre</label>
                    <input type="text" class="form-control" id="primerNombreEmpleado" placeholder="" value="{{$empleado->primer_nombre_empleado}}" readonly>
                      
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="segundoNombreEmpleado">Segundo nombre</label>
                      <input type="text" class="form-control" id="segundoNombreEmpleado" placeholder="" value="{{$empleado->segundo_nombre_empleado}}" readonly>                    
                    </div>
                  </div>

                  <div class="row">
                        <div class="col-md-6 mb-3">
                          <label for="primerApellidoEmpleado">Primer apellido</label>
                          <input type="text" class="form-control" id="primerApellidoEmpleado" placeholder="" value="{{$empleado->primer_apellido_empleado}}" readonly>
                          
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="segundoApellidoEmpleado">Segundo apellido</label>
                          <input type="text" class="form-control" id="segundoApellidoEmpleado" placeholder="" value="{{$empleado->segundo_apellido_empleado}}" readonly>                    
                        </div>
                    </div>

                  <div class="row">
                        <div class="col-md-6 mb-3">
                          <label for="CedulaEmpleado">Cédula de identidad</label>
                          <input type="text" class="form-control" id="CedulaEmpleado" placeholder="" value="{{$empleado->cedula_empleado}}" readonly>
                          
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="CorreoEmpleado">Correo Electronico</label>
                          <input type="text" class="form-control" id="CorreoEmpleado" placeholder="" value="" readonly>                    
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="fnacEmpleado">Fecha de nacimiento</label>
                            <input type="text" class="form-control" id="fnacEmpleado" placeholder="" value="{{$empleado->fecha_nacimiento}}" readonly>                           
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="cargoEmpleado">Cargo</label>
                            <input type="text" name="fk_cargo"  class="form-control" placeholder="" value="{{$empleado->cargo->nombre_cargo}}" required>                    
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="passwordEmpleado">Contraseña</label>
                            <input type="password" class="form-control" id="passwordEmpleado" placeholder="" value="" required>                    
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="salarioEmpleado">Salario</label>
                            <input type="text" name="salario" class="form-control" placeholder="Monto en Bs." value="{{$empleado->salario}}" required>                    
                        </div>
                    </div>

                  
        <br>
        <div>
            <a href="beneficiosYVacaciones">
                <button style="margin-right:30px" type="button" class="btn btn-warning">Beneficios y vacaciones</button>
            </a>
            <button style="background-color: greenyellow"type="submit" class="btn btn-warning">Guardar cambios</button>

            <!-- Formulario para el boton elimina-->

            

        </form>

        <form action="{{route ('eliminar.empleado',     $empleado->cedula_empleado)}}" method="POST" class="d-inline">

            @method('DELETE')
            @csrf
            <button style="background-color: greenyellow"type="submit" class="btn btn-warning">Eliminar Empleado</button>

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