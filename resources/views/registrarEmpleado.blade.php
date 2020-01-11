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
    <title>ACAVUCAB - Registrar empleado</title>
</head>
<body>
    @include('plantilla')

    <div class="container mt-2 pt-2">
        <h1 class="display-4 text-center">Registrar Empleado </h1>
        <hr class="bg-warning">       
        
        <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Información del empleado</h4>
                <form method="POST" action="{{ route('registrar.crear') }}" validate>
                    @csrf
                             <div class="row">
                               <div class="col-md-6 mb-3">
                                 <label for="primerNombreEmpleado">Primer nombre</label>
                                 <input type="text" name="primer_nombre_empleado" class="form-control" placeholder="" required>
                                 
                               </div>
                               <div class="col-md-6 mb-3">
                                 <label for="segundoNombreEmpleado">Segundo nombre</label>
                                 <input type="text" name="segundo_nombre_empleado" class="form-control" placeholder="">                    
                               </div>
                             </div>
           
                             <div class="row">
                                   <div class="col-md-6 mb-3">
                                     <label for="primerApellidoEmpleado">Primer apellido</label>
                                     <input type="text" name="primer_apellido_empleado" class="form-control"  placeholder="" required>
                                     
                                   </div>
                                   <div class="col-md-6 mb-3">
                                     <label for="segundoApellidoEmpleado">Segundo apellido</label>
                                     <input type="text" name="segundo_apellido_empleado" class="form-control" placeholder="" required>                    
                                   </div>
                               </div>
           
                             <div class="row">
                                   <div class="col-md-6 mb-3">
                                     <label for="CedulaEmpleado">Cédula de identidad</label>
<<<<<<< HEAD
                                     <select name="tipo_documento">
=======
                                     <select>
>>>>>>> c14f3a3cd0783e63f7facc8c7a7aa0ece3b2d474
                                           <option value="V">V</option>
                                           <option value="E">E</option>
                                         </select> 
                                     <input type="text" name="cedula_empleado" class="form-control"  placeholder="" required>
                                     
                                   </div>
                                   <!--<div class="col-md-6 mb-3">
                                     <label for="CorreoEmpleado">Correo Electronico</label>
                                     <input type="text" class="form-control" id="CorreoEmpleado" placeholder="" value="" required>                    
                                   </div>-->
                               </div>
           
                               <div class="row">
<<<<<<< HEAD
                                <div class="col-md-6 mb-3">
                                    <label for="fnacEmpleado">Fecha de nacimiento</label>
                                    <input type="date" name="fecha_nacimiento" class="form-control" placeholder="" required>                              
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="cargoEmpleado">Cargo</label>
                                    <br>
                                    <select class="custom-select d-block w-100" name="cargoEmpleado" required>
                                     <option value="">Escoger...</option>
                                     @foreach ($cargo as $item)
                                       
                                       <option>{{$item}}</option>
                                     @endforeach
                                   </select>                   
                                </div>
                            </div>
=======
                                   <div class="col-md-6 mb-3">
                                       <label for="fnacEmpleado">Fecha de nacimiento</label>
                                       <input type="text" name="fecha_nacimiento" class="form-control" placeholder="" required>                              
                                   </div>
                                   <div class="col-md-6 mb-3">
                                       <label for="cargoEmpleado">Cargo</label>
                                       <input type="text" name="fk_cargo"  class="form-control" placeholder="" required>                    
                                   </div>
                               </div>
>>>>>>> c14f3a3cd0783e63f7facc8c7a7aa0ece3b2d474
           
                               <div class="row">
                                   <!--<div class="col-md-6 mb-3">
                                       <label for="passwordEmpleado">Contraseña</label>
                                       <input type="password" class="form-control" id="passwordEmpleado" placeholder="" value="" required>                    
                                   </div>-->
                                   <div class="col-md-6 mb-3">
                                       <label for="salarioEmpleado">Salario</label>
                                       <input type="text" name="salario" class="form-control" placeholder="Monto en Bs."  required>                    
                                   </div>
                               </div>
           
                             
                   <br>
                   
                   <button class="btn btn-warning" type="submit">Continuar</button>
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