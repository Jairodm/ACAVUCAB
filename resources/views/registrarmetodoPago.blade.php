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
    <title>ACAVUCAB - Metodo de pago</title>
</head>

<body>
        @include('plantilla')


    <div class="container">
            <h1 class="display-4 text-center">Registrar Metodo de pago</h1>
             <hr class="bg-warning">
      
            <div class="container">
              
                <form class="needs-validation" novalidate>
                  
                   
                  <hr class="mb-4">
      
                  <h4 class="mb-3">Tarjeta De Credito</h4>
      
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label for="nombretarjeta">Nombre en Tarjeta</label>
                      <input type="text" class="form-control" id="nombretarjeta" placeholder="" required>
                      <small class="text-muted">Nombre mostrado en la tarjeta</small>
                      <div class="invalid-feedback">
                        El nombre en tarjeta es requerido
                      </div>
                    </div>
                    <div class="col-md-6 mb-3">
                          <label for="numerotarjeta">Numero de Tarjeta de Credito</label>
                          <input type="text" class="form-control" id="numerotarjeta" placeholder="" required>
                          <div class="invalid-feedback">
                            Numero de tarjeta requerido
                          </div>

                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3 mb-3">
                      <label for="vencimiento">Fecha de vencimiento</label>
                      <input type="text" class="form-control" id="vencimiento" placeholder="" required>
                      <div class="invalid-feedback">
                        Fecha requerida
                      </div>
                    </div>
                    <div class="col-md-3 mb-3">
                      <label for="reverso">CVV</label>
                      <input type="text" class="form-control" id="reverso" placeholder="" required>
                      <div class="invalid-feedback">
                        Codigo requerido
                      </div>
                    </div>
                     <div class="d-block my-3">
                        <div class="custom-control custom-radio">
                          <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                          <label class="custom-control-label" for="credit">Visa</label>
                        </div>

                        <div class="custom-control custom-radio">
                          <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
                          <label class="custom-control-label" for="debit">Master</label>
                        </div>
                        
                      </div>
                  </div>

                  <label for="cedula">Cedula de Identidad</label>
                  <div class="row">
                        <div class="col-md-3 mb-3 order-3 align-self-end">
                                <input type="text" class="form-control" id="cedula" placeholder="" required>
                          <div class="invalid-feedback">
                            Cedula requerida
                          </div>
                        </div>
                        <div class="col-md-auto order-1">
                          
                          

                          <select class="custom-select d-block w-100" id="seleccionartipo" required>
                                <option value=""></option>
                                <option>V</option>
                                <option>E</option>
                                <option>N</option>
                              </select>
                              <div class="invalid-feedback">
                                Please select a valid country.
                              </div>
                        </div>
                    </div>
                  <hr class="mb-4">
                  <div class="col md-4 text-center">
                        <button class="btn btn-warning btn-lg " type="submit">Registrar</button>
                        </div>
                </form>
              
            </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>