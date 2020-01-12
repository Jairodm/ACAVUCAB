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
    <title>ACAVUCAB - Consulta cliente natural</title>
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
        <h1 class="display-4 text-center">Consulta cliente natural </h1>
        <hr class="bg-warning">       
        
        <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Información del cliente</h4>
                <form action="{{route ('editar.natural', $cliente->rif_cliente)}}" class="needs-validation" method="POST" novalidate>

                  @method('PUT')
                  @csrf
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label for="primerNombreNatural">Primer nombre</label>
                      
                      <input type="text" class="form-control" name="primerNombreNatural" placeholder="" value="{{$cliente->primer_nombre}}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="segundoNombreNatural">Segundo nombre</label>
                      <input type="text" class="form-control" name="segundoNombreNatural" placeholder="" value="{{$cliente->segundo_nombre}}" required>                    
                    </div>
                  </div>

                  <div class="row">
                        <div class="col-md-6 mb-3">
                          <label for="primerApellidoNatural">Primer apellido</label>
                          <input type="text" class="form-control" name="primerApellidoNatural" placeholder="" value="{{$cliente->primer_apellido}}" required>
                          
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="segundoApellidoNatural">Segundo apellido</label>
                          <input type="text" class="form-control" name="segundoApellidoNatural" placeholder="" value="{{$cliente->segundo_apellido}}" required>                    
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                          <label for="CedulaNatural">Cédula de identidad</label>
                          <input type="text" class="form-control" name="CedulaNatural" placeholder="" value="{{$cliente->cedula_natural}}" readonly>
                          
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="rifNatural">RIF</label>
                            <input type="text" class="form-control" name="rifNatural" placeholder="" value="{{$cliente->rif_cliente}}" readonly>                   
                        </div>
                    </div>

                  <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="telefonoNatural">Número telefónico</label>
                        @foreach ($telefono as $item2)
                        <input type="text" class="form-control" name="telefonoNatural" placeholder="" value="{{$item2->codigo_area}}-{{$item2->numero}}" required>                    
                        @endforeach
                      </div>
                        <div class="col-md-6 mb-3">
                          <label for="CorreoNatural">Correo Electronico</label>
                          <input type="text" class="form-control" name="CorreoNatural" placeholder="" value="{{$cliente->usuarios->first()->nombre_usuario}}" readonly>                    
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="puntosNatural">Puntos disponibles</label>
                            <input type="text" class="form-control" name="puntosNatural" placeholder="" value="{{$cliente->cantidad_puntos}}" readonly>                    
                        </div>
                    </div>

                    <h1 style="font-size:30px"class="display-4">Dirección </h1>
                    <hr class="bg-warning">

                    <div class="row">
                        <div class="col-md-5 mb-3">
                          <label for="estado">Estado</label>
                          <select class="custom-select d-block w-100" id="estado" required>
                            <option value="">{{$cliente->lugarFisica->lugar->lugar->nombre_lugar}}</option>
                            @foreach ($estado as $item)
                              
                              <option>{{$item}}</option>
                          @endforeach
                          </select>
                          <div class="invalid-feedback">
                            Por favor escoja un estado válido.
                          </div>
                        </div>
                        <div class="col-md-4 mb-3">
                          <label for="municipio">Municipio</label>
                          <select class="custom-select d-block w-100" id="municipio" required>
                            <option value="">{{$cliente->lugarFisica->lugar->nombre_lugar}}</option>
                            @foreach ($municipio as $item)
                              
                              <option>{{$item}}</option>
                          @endforeach
                          </select>
                          <div class="invalid-feedback">
                            Por favor escoja un municipio válido.
                          </div>
                        </div>
                        <div class="col-md-3 mb-3">
                          <label for="parroquia">Parroquia</label>
                          <select class="custom-select d-block w-100" name="parroquia" required>
                            <option selected>{{$cliente->lugarFisica->nombre_lugar}}</option>
                            @foreach ($parroquia as $item)
                              
                              <option>{{$item}}</option>
                          @endforeach
                          </select>
                          <div class="invalid-feedback">
                            Por favor escoja una parroquia válida.
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6 mb-3">
                        <label for="direccionFiscal">Dirección física</label>
                        <input type="text" class="form-control" name="direccionFisica" placeholder="" value="{{$cliente->direccion_fisica}}" required>                    
                      </div>

                  
        <br>
        <a href="{{route('ConsultarMetodosDePago', $cliente->rif_cliente)}}">
          <button style="margin-right:30px" type="button" class="btn btn-warning">Métodos de pago</button>
        </a>
        <button style="background-color: greenyellow"type="submit" class="btn btn-warning">Guardar cambios</button>
        </form>
        <form action="{{route ('eliminar.natural',$cliente->rif_cliente)}}" method="POST" class="d-inline">
            
          @method('DELETE')
          @csrf
          <button style="margin-bottom:50px; background-color: red; color:white"type="submit" class="btn btn-warning">Eliminar cliente</button>

      </form>
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