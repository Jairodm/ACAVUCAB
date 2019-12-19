<!DOCTYPE blade.php>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Modern Business - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/modern-business.css" rel="stylesheet">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
  integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/89cc030952.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="main.css"></script>

</head>

<body>

  <!-- Navigation -->
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


  <!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">Diario de una Cerveza
    </h1>



    <!-- Image Header -->
    <img class="img-fluid rounded mb-4" src="cerveza2.jpg" alt="" style="height: 350px; width: 1220px">

    <hr class="bg-warning">

    <ul class="list-unstyled">
            <li class="media">
                <a href="#"><img src="Cerveza5.jpg" class="mr-3" alt="" style="height: 150px; width: 120px"></a>                      <div class="media-body">
                <a href="#" style="color:black;"><h4 class="mt-0 mb-1">Título de cerveza</h4></a>
                Descripcion de la cerveza
                <h6>Precio: 5555 BS </h6>
                <h6>Precio con Descuento: 555</h6>
                <a href="ConsultarProductoCliente" class="btn btn-warning">Mas informacion</a>
              </div>
              
            </li>
            <hr class="bg-warning">
            <li class="media my-4">
                <a href="#"><img src="Cerveza5.jpg" class="mr-3" alt="" style="height: 150px; width: 120px"></a>
                <div class="media-body">
                    <a href="#" style="color:black;"><h4 class="mt-0 mb-1">Título de cerveza</h4></a>
                     Descripcion de la cerveza
                    <h6>Precio: 5555 BS </h6>
                    <h6>Precio con Descuento: 5555</h6>
                    <a href="ConsultarProductoCliente" class="btn btn-warning">Mas informacion</a>
                </div>
            </li>
            <hr class="bg-warning">
          </ul>

    <!-- Marketing Icons Section 
    <div class="row">
      <div class="col-lg-4 mb-4">
        <div class="card h-100">
          <h4 class="card-header">Cerveza 1</h4>
          <div class="card-body">
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p>
          </div>
          <div class="card-footer">
            <a href="#" class="btn btn-warning">Learn More</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-4">
        <div class="card h-100">
          <h4 class="card-header">Cerveza 2</h4>
          <div class="card-body">
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis ipsam eos, nam perspiciatis natus commodi similique totam consectetur praesentium molestiae atque exercitationem ut consequuntur, sed eveniet, magni nostrum sint fuga.</p>
          </div>
          <div class="card-footer">
            <a href="#" class="btn btn-warning">Learn More</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-4">
        <div class="card h-100">
          <h4 class="card-header">Cerveza 3</h4>
          <div class="card-body">
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p>
          </div>
          <div class="card-footer">
            <a href="#" class="btn btn-warning">Learn More</a>
          </div>
        </div>
      </div>
    </div>
     /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>