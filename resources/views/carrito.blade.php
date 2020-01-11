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
    <title>ACAVUCAB - Carrito</title>
    <link rel="stylesheet" href="carrito.css">
</head>

<body>
  @include('plantilla')

    <div class="px-4 px-lg-0">
            <!-- For demo purpose -->
            <h1 class="display-4 text-center">Productos en Carrito</h1>
             <hr class="bg-warning">
            <!-- End -->
          
            <div class="pb-5">
              <div class="container">
                <div class="row">
                  <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">
          
                    <!-- Shopping cart table -->
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th scope="col" class="border-0 bg-light">
                              <div class="p-2 px-3 text-uppercase">Producto</div>
                            </th>
                            <th scope="col" class="border-0 bg-light">
                              <div class="py-2 text-uppercase">Precio</div>
                            </th>
                            <th scope="col" class="border-0 bg-light">
                              <div class="py-2 text-uppercase">Cantidad</div>
                            </th>
                            <th scope="col" class="border-0 bg-light">
                              <div class="py-2 text-uppercase">Eliminar</div>
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row" class="border-0">
                              <div class="p-2">
                                <img src="Cerveza5.jpg" class="mr-3" alt="" style="height: 150px; width: 120px">
                                <div class="ml-3 d-inline-block align-middle">
                                  <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block align-middle">Cerveza</a></h5><span class="text-muted font-weight-normal font-italic d-block">Categoria: Ale</span>
                                </div>
                              </div>
                            </th>
                            <td class="border-0 align-middle"><strong>$79.00</strong></td>
                            <td class="border-0 align-middle">
                                
                                    <div class="quantity">
                                            
                                            <input type="number" step="1" max="99" min="1" value="1" title="Qty" class="qty"
                                                   size="4">
                                            
                                    </div>
                            </td>
                            <td class="border-0 align-middle"><a href="#" class="text-dark"><i class="fa fa-trash"></i></a></td>
                          </tr>
                          <tr>
                            <th scope="row">
                              <div class="p-2">
                                <img src="Cerveza5.jpg" class="mr-3" alt="" style="height: 150px; width: 120px">
                                <div class="ml-3 d-inline-block align-middle">
                                  <h5 class="mb-0"><a href="#" class="text-dark d-inline-block">Cerveza</a></h5><span class="text-muted font-weight-normal font-italic">Categoria: Ale</span>
                                </div>
                              </div>
                            </th>
                            <td class="align-middle"><strong>$79.00</strong></td>
                            <td class="align-middle">
                                
                                    <div class="quantity">
                                            
                                            <input type="number" step="1" max="99" min="1" value="1" title="Qty" class="qty"
                                                   size="4">
                                            
                                    </div>
                            </td>
                            <td class="align-middle"><a href="#" class="text-dark"><i class="fa fa-trash"></i></a>
                                
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">
                              <div class="p-2">
                                <img src="Cerveza5.jpg" class="mr-3" alt="" style="height: 150px; width: 120px">
                                <div class="ml-3 d-inline-block align-middle">
                                  <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block">Cerveza</a></h5><span class="text-muted font-weight-normal font-italic">Categoria: Ale</span>
                                </div>
                              </div>
                              <td class="align-middle"><strong>$79.00</strong></td>
                              <td class="align-middle">
                                  
                                    <div class="quantity">
                                            
                                            <input type="number" step="1" max="99" min="1" value="1" title="Qty" class="qty"
                                                   size="4">
                                            
                                    </div>
                              </td>
                              <td class="align-middle"><a href="#" class="text-dark"><i class="fa fa-trash"></i></a>
                              </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <!-- End -->
                  </div>
                </div>
          
                <div class="row py-3 p-4 ">
                  <div class="col-lg-6">
                    
                  </div>
                  <div class="col-lg-6 bg-white rounded shadow-lg">
                    <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Resumen de compra </div>
                    <div class="p-4">
                      
                      <ul class="list-unstyled mb-4">
                        <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Subtotal </strong><strong>$390.00</strong></li>
                        <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Envio</strong><strong>$10.00</strong></li>
                        <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">IVA</strong><strong>$0.00</strong></li>
                        <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong>
                          <h5 class="font-weight-bold">$400.00</h5>
                        </li>
                      </ul>
                      <a href="presupuesto" class="btn btn-warning py-2 btn-block">Generar presupuesto</a>
                      <a href="EscogerMetodoDePagoCompraDigital" class="btn btn-warning py-2 btn-block">Proceder al Pago</a>
                    </div>
                  </div>
                </div>
          
              </div>
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
















