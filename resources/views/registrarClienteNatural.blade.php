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
    <title>ACAVUCAB - Registro cliente natural</title>
</head>
<body>

      @include('plantilla')

    <div class="container mt-2 pt-2">
        <h1 class="display-4 text-center">Registro cliente natural </h1>
        <hr class="bg-warning">       
        
        <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Información del cliente</h4>
                <form method="POST" action="{{ route('cliente.natural.crear') }}" validate>
                    @csrf
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label for="primerNombreNatural">Primer nombre</label>
                      <input type="text" class="form-control" name="primerNombreNatural" placeholder="" value="" required>
                      
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="segundoNombreNatural">Segundo nombre</label>
                      <input type="text" class="form-control" name="segundoNombreNatural" placeholder="" value="">                    
                    </div>
                  </div>

                  <div class="row">
                        <div class="col-md-6 mb-3">
                          <label for="primerApellidoNatural">Primer apellido</label>
                          <input type="text" class="form-control" name="primerApellidoNatural" placeholder="" value="" required>
                          
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="segundoApellidoNatural">Segundo apellido</label>
                          <input type="text" class="form-control" name="segundoApellidoNatural" placeholder="" value="" required>                    
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                          <label for="CedulaNatural">Cédula de identidad</label>
                          <select>
                                <option value="V">V</option>
                                <option value="E">E</option>
                              </select> 
                          <input type="text" class="form-control" name="CedulaNatural" placeholder="" value="" required>
                          
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="rifNatural">RIF</label>
                            <select name = "tipoRif">
                                  <option value="V">V</option>
                                  <option value="E">E</option>
                                  <option value="P">P</option>
                                  <option value="G">G</option>
                                  <option value="J">J</option>
                                  <option value="C">C</option>
                                </select> 
                            <input type="text" class="form-control" name="rifNatural" placeholder="" value="" required>                   
                        </div>
                    </div>

                  <div class="row">
                      <div class="col-md-3 mb-3">
                        <label for="codigotelefonoNatural">Código telefónico</label>
                        <input type="text" class="form-control" name="codigotelefonoNatural" maxlength="4" placeholder="" value="" required> 
                      </div>
                        <div class="col-md-6 mb-3">
                            <label for="telefonoNatural">Número telefónico</label>
                        <input type="text" class="form-control" name="telefonoNatural" maxlength="7" placeholder="" value="" required>            
                       </div>        
                   

                  </div>

                    <h1 style="font-size:30px"class="display-4">Dirección </h1>
                    <hr class="bg-warning">

                   
                    <div class="row">
                        <div class="col-md-10 mb-3">
                        <label for="direccionFisica">Dirección Física</label>
                        <input type="text" class="form-control" name="direccionFisica" placeholder="" value="" required>  
                       </div>
                    </div>

                    <div class="row">

                    


                        <div class="col-md-5 mb-3">
                          <label for="estado">Estado</label>
     
                          <select class="custom-select d-block w-100" name="estado" required>
                              <option value="">Escoger...</option>
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

                          <select class="custom-select d-block w-100" name="municipio" required>
                            <option value="">Escoger...</option>
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
                            <option value="">Escoger...</option>
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
        
        <button type="submit" class="btn btn-warning">Continuar</button>
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