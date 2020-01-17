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
    <title>ACAVUCAB - Orden compra</title>

    <style>
        .center_div {
            margin: 0 auto;
            width: 60%
                /* value of your choice which suits your alignment */
        }
    </style>


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


    <div class="container">
        <h1 class="display-4 text-center">Orden de compra</h1>
        <hr class="bg-warning">


        <div class="container center_div">

            <form action="{{route ('recibir.orden', $eyo->codigo_estatus)}}" class="needs-validation" method="POST" novalidate>

                @csrf
        
                        <div class="col-md-6 mb-3">
                            <label for="vencimiento">Fecha de la orden:</label>
                            <input type="text" class="form-control" name="fecha"  value="{{$eyo->ordenCompra->fecha_orden_compra}}" placeholder="" readonly>
                            <div class="invalid-feedback">
                                Valor requerido
                            </div>
        
                        </div>
        
                        <div class="col-md-6 mb-3">
                            <label for="vencimiento">Proveedor:</label>
                            <input type="text" class="form-control" name="descripcionBeneficio"  value="{{$eyo->ordenCompra->proveedor->denominacion_comercial}}" placeholder="" readonly>
                            <div class="invalid-feedback">
                                Valor requerido
                            </div>
        
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="vencimiento">Cerveza solicitada:</label>
                            <input type="text" class="form-control" name="fecha"  value="{{$detalle->cervezax->nombre_cerveza}}" placeholder="" readonly>
                            <div class="invalid-feedback">
                                Valor requerido
                            </div>
        
                        </div>
        
                        <div class="col-md-6 mb-3">
                            <label for="vencimiento">Cantidad solicitada:</label>
                            <input type="text" class="form-control" name="descripcionBeneficio"  value="{{$detalle->cantidad_compra}}" placeholder="" readonly>
                            <div class="invalid-feedback">
                                Valor requerido
                            </div>
        
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="vencimiento">Monto a pagar:</label>
                            <input type="text" class="form-control" name="descripcionBeneficio"  value="{{$eyo->ordenCompra->monto_total_orden_compra}} Bs." placeholder="" readonly>
                            <div class="invalid-feedback">
                                Valor requerido
                            </div>
        
                        </div>


                <hr class="mb-4">
                    <button class="btn btn-warning  btn-lg " type="submit">Declarar recepción de los productos</button>
                    
            </form>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>

</html>