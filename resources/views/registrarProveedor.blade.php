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
    <title>ACAVUCAB - Registro de proveedor</title>
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
        <h1 class="display-4 text-center">Registro de proveedor </h1>
        <hr class="bg-warning">       
        
        <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Información del proveedor</h4>
                <form class="needs-validation" novalidate>
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label for="denominacionComercial">Denominación comercial</label>
                      <input type="text" class="form-control" id="denominacionComercial" placeholder="" value="" required>
                      
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="razonSocial">Razón social</label>
                      <input type="text" class="form-control" id="razonSocial" placeholder="" value="">                    
                    </div>
                  </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="correosProveedor">Correos electrónicos</label>
                             <input type="text" class="form-control" id="correosProveedor" placeholder="email1@abc.com, email2@xyz.com, ....." value="" required>                          
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="telefonosProveedor">Números telefónicos</label>
                            <input type="text" class="form-control" id="telefonosProveedor" placeholder="Ej: 02125552323, 04147773344, ......" value="" required>                    
                        </div>
                        
                    </div>

                    <h1 style="font-size:30px"class="display-4">Dirección </h1>
                    <hr class="bg-warning">

                    <div class="row">
                      <div class="col-md-5 mb-3">
                        <label for="estado">Estado</label>
                        <select class="custom-select d-block w-100" id="estado" required>
                          <option value="">Escoger...</option>
                          <option>DIstrito Capital</option>
                        </select>
                        <div class="invalid-feedback">
                          Por favor escoja un estado válido.
                        </div>
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="municipio">Municipio</label>
                        <select class="custom-select d-block w-100" id="municipio" required>
                          <option value="">Escoger...</option>
                          <option>Libertador</option>
                        </select>
                        <div class="invalid-feedback">
                          Por favor escoja un municipio válido.
                        </div>
                      </div>
                      <div class="col-md-3 mb-3">
                        <label for="parroquia">Parroquia</label>
                        <select class="custom-select d-block w-100" id="parroquia" required>
                          <option value="">Escoger...</option>
                          <option>El Recreo</option>
                        </select>
                        <div class="invalid-feedback">
                          Por favor escoja una parroquia válida.
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 mb-3">
                          <label for="passwordJuridico">Detalle de la dirección</label>
                          <input type="text" class="form-control" id="passwordJuridico" placeholder="" value="" required>                              
                      </div>
                    </div>

                    <h1 style="font-size:30px"class="display-4">Dirección fiscal</h1>
                  <hr class="bg-warning">

                  <div class="row">
                      <div class="col-md-5 mb-3">
                        <label for="estado">Estado</label>
                        <select class="custom-select d-block w-100" id="estado" required>
                          <option value="">Escoger...</option>
                          <option>DIstrito Capital</option>
                        </select>
                        <div class="invalid-feedback">
                          Por favor escoja un estado válido.
                        </div>
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="municipio">Municipio</label>
                        <select class="custom-select d-block w-100" id="municipio" required>
                          <option value="">Escoger...</option>
                          <option>Libertador</option>
                        </select>
                        <div class="invalid-feedback">
                          Por favor escoja un municipio válido.
                        </div>
                      </div>
                      <div class="col-md-3 mb-3">
                        <label for="parroquia">Parroquia</label>
                        <select class="custom-select d-block w-100" id="parroquia" required>
                          <option value="">Escoger...</option>
                          <option>El Recreo</option>
                        </select>
                        <div class="invalid-feedback">
                          Por favor escoja una parroquia válida.
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 mb-3">
                          <label for="passwordJuridico">Detalle de la dirección</label>
                          <input type="text" class="form-control" id="passwordJuridico" placeholder="" value="" required>                              
                      </div>
                    </div>

                  
        <br>
        
        <button style="margin-bottom:80px"type="button" class="btn btn-warning">Continuar</button>
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