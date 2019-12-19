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
    <title>ACAVUCAB - Despacho</title>
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
            <h4 class="display-7 text-center"><i class="fas fa-shopping-bag"></i> Compra Nº XXXXX</h4>
            <h5>Datos de la compra</h5>
            <h6>Cliente:</h6>
            <h6>C.I o RIF:</h6>
            <h6>Fecha:</h6>
            <h6>Productos comprados:</h6>
            <hr class="bg-warning">
                <ul class="list-unstyled">
                        <li class="media">
                            <a href="#"><img src="Cerveza5.jpg" class="mr-3" alt="" style="height: 150px; width: 120px"></a>                      <div class="media-body">
                            <a href="#" style="color:black;"><h4 class="mt-0 mb-1">Título de cerveza</h4></a>
                            Descripcion de la cerveza
                            <h6>Precio: 5555 BS </h6>
                            <h6>Cantidad en stock: 555</h6>
                          </div>
                          
                        </li>
                        <hr class="bg-warning">
                        <li class="media my-4">
                            <a href="#"><img src="Cerveza5.jpg" class="mr-3" alt="" style="height: 150px; width: 120px"></a>
                            <div class="media-body">
                                <a href="#" style="color:black;"><h4 class="mt-0 mb-1">Título de cerveza</h4></a>
                                 Descripcion de la cerveza
                                <h6>Precio: 5555 BS </h6>
                                <h6>Cantidad en stock: 555</h6>
                            </div>
                        </li>
                        <hr class="bg-warning">
                      </ul>
    <div class="container">
<!-- Button trigger modal -->
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#basicExampleModal">
    Ver estatus
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Estatus de la compra</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h6>Fecha estimada: DD/MM/AAAA</h6>
          <h6>Dirección de envio: Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eius aliquam, sunt eligendi dignissimos quae nostrum. Commodi magnam voluptate recusandae rem debitis eveniet quibusdam accusamus. Consequatur, quidem totam! Est, architecto porro.</h6>
          <h6>Estatus: XXXXXX</h6>
          <h6 class="text-left">Monto total: XXXXXX</h6>  
          <button class="btn btn-warning ">Modificar estatus</button>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning">Descargar orden</button>
        </div>
      </div>
    </div>
  </div>
        </div>
        <!-- Pagination -->
    <ul class="pagination justify-content-center mt-2 pt-2">
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Previous" style="color:#fab700;">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
              </a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#" style="color:#fab700;">1</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#" style="color:#fab700;">2</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#" style="color:#fab700;">3</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Next" style="color:#fab700;">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
              </a>
            </li>
    </ul>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>












