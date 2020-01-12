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
    <title>ACAVUCAB - Consulta de proveedor</title>
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
        <h1 class="display-4 text-center">Consulta de proveedor </h1>
        <hr class="bg-warning">       
        
        <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Información del proveedor</h4>
                <form action="{{route ('editar.proveedor', $proveedor->rif_proveedor)}}" class="needs-validation" method="POST" novalidate>

                  @method('PUT')
                  @csrf
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label for="denominacionComercial">Denominación comercial</label>
                      <input type="text" class="form-control"name="denominacionComercial" placeholder="" value="{{$proveedor->denominacion_comercial}}" required>
                      
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="razonSocial">Razón social</label>
                      <input type="text" class="form-control" name="razonSocial" placeholder="" value="{{$proveedor->razon_social}}">                    
                    </div>
                  </div>

                  <div class="row">
                        <div class="col-md-6 mb-3">
                                <label for="rifProveedor">RIF</label>
                                <input type="text" class="form-control" name="rifProveedor" placeholder="" value="{{$proveedor->rif_proveedor}}" readonly>                   
                            </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="direccionFiscal">Dirección física</label>
                        <input type="text" class="form-control" name="direccionFisica" placeholder="" value="{{$proveedor->direccion_fisica}}" required>                    
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="direccionFiscal">Dirección fiscal</label>
                        <input type="text" class="form-control" name="direccionFiscal" placeholder="" value="{{$proveedor->direccion_fiscal}}" required>                    
                      </div>
                  </div>
                  <hr class="bg-warning">
                    <div class="row">
                      
                      <div class="col-md-6 mb-3">
                        <label for="numerosTelefonicos">Números telefónicos</label>
                        <table class="table table-hover">
                          <thead class="bg-warning">
                              <tr>
                                  <th scope="col" class="text-center">Número de teléfono</th>
                                  <th scope="col" class="text-center"></th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($telefono as $item)
                              <tr>
                                      <th class="text-center">{{$item->codigo_area}}-{{$item->numero}}</th>
                                      <td class="text-center"><a href="{{route('consultarTelefono', $item->codigo_telefono)}}">Consultar</a></td>     
                              </tr>
                      @endforeach  
                          </tbody>
                      </table>
                      
                      </div>
                        <div class="col-md-6 mb-3">
                            <label for="correosElectronicos">Correos electrónicos</label>
                            <table class="table table-hover">
                              <thead class="bg-warning">
                                  <tr>
                                      <th scope="col" class="text-center">Dirección de correo</th>
                                      <th scope="col" class="text-center"></th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach ($correo as $item)
                                  <tr>
                                          <th class="text-center">{{$item->direccion_correo}}</th>
                                          <td class="text-center"><a href="{{route('consultarCorreo', $item->codigo_correo)}}">Consultar</a></td>                        
                                  </tr>
                          @endforeach  
                              </tbody>
                          </table>
                          
                        </div>
                        
                        
                    </div>
                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="numerosTelefonicos">Agregar teléfonos (separados por un espacio)</label>
                        <input type="text" class="form-control" name="numerosTelefonicos" placeholder="" value="" required>                    
                    </div>
                      <div class="col-md-6 mb-3">
                        <label for="codigotelefonoNatural">Agregar correos (separados por un espacio)</label>
                        <input style="box-shadow: none" type="text" class="form-control" name="correosElectronicos" placeholder="" value="" required> 
                      </div>
                    </div>
                    <h1 style="font-size:30px"class="display-4">Dirección física </h1>
                    <hr class="bg-warning">

                    <div class="row">
                      <div class="col-md-5 mb-3">
                        <label for="estado">Estado</label>

                        <select class="custom-select d-block w-100" name="estadoFisica" required>
                          <option value="">{{$proveedor->lugarFisica->lugar->lugar['nombre_lugar']}}</option>
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

                        <select class="custom-select d-block w-100" name="municipioFisica" required>
                          <option value="">{{$proveedor->lugarFisica->lugar['nombre_lugar']}}</option>
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

                        <select class="custom-select d-block w-100" name="parroquiaFisica" required>
                          <option selected>
                            {{$proveedor->lugarFisica['nombre_lugar']}}
                        </option>
                          @foreach ($parroquia as $item)
                              
                            <option>{{$item}}</option>
                          @endforeach
                        </select>

                        <div class="invalid-feedback">
                          Por favor escoja una parroquia válida.
                        </div>
                      </div>
                    </div>

                    <h1 style="font-size:30px"class="display-4">Dirección fiscal</h1>
                  <hr class="bg-warning">

                  <div class="row">
                      <div class="col-md-5 mb-3">
                        <label for="estado">Estado</label>

                        <select class="custom-select d-block w-100" name="estadoFiscal" required>
                          <option value="">{{$proveedor->lugarFiscal->lugar->lugar['nombre_lugar']}}</option>
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

                        <select class="custom-select d-block w-100" name="municipioFiscal" required>
                          <option value="">{{$proveedor->lugarFiscal->lugar['nombre_lugar']}}</option>
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

                        <select class="custom-select d-block w-100" name="parroquiaFiscal" required>
                          <option selected>
                            {{$proveedor->lugarFiscal['nombre_lugar']}}
                        </option>
                          @foreach ($parroquia as $item)
                              
                            <option>{{$item}}</option>
                            @endforeach
                        </select>

                        <div class="invalid-feedback">
                          Por favor escoja una parroquia válida.
                        </div>
                      </div>
                    </div>

                  
        <br>

        <a href="{{route('ContactoProveedor', $proveedor->rif_proveedor)}}">
          <button style="margin-right:30px" type="button" class="btn btn-warning">Personas de contacto</button>
        </a>
        
        <button style="background-color: greenyellow;;"type="submit" class="btn btn-warning">Guardar cambios</button>
                    </form>
                    <form action="{{route ('eliminar.proveedor',$proveedor->rif_proveedor)}}" method="POST" class="d-inline">
            
                      @method('DELETE')
                      @csrf
                      <button style="margin-bottom:50px; background-color: red; color:white"type="submit" class="btn btn-warning">Eliminar proveedor</button>
          
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