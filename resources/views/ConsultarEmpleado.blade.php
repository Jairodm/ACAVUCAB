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
    <title>ACAVUCAB - Consultar empleado</title>
</head>
<body>

        @include('plantilla')

    <div class="container mt-2 pt-2">
        <h1 class="display-4 text-center">Consulta de empleado </h1>
        <hr class="bg-warning">       
        
        <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Información del empleado</h4>

            <form action="{{route ('editar.empleado', $empleado->cedula_empleado)}}" class="needs-validation" method="POST" novalidate>

                @method('PUT')
                @csrf
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label for="primerNombreEmpleado">Primer nombre</label>
                    <input type="text" class="form-control" id="primerNombreEmpleado" placeholder="" value="{{$empleado->primer_nombre_empleado}}" readonly>
                      
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="segundoNombreEmpleado">Segundo nombre</label>
                      <input type="text" class="form-control" id="segundoNombreEmpleado" placeholder="" value="{{$empleado->segundo_nombre_empleado}}" readonly>                    
                    </div>
                  </div>

                  <div class="row">
                        <div class="col-md-6 mb-3">
                          <label for="primerApellidoEmpleado">Primer apellido</label>
                          <input type="text" class="form-control" id="primerApellidoEmpleado" placeholder="" value="{{$empleado->primer_apellido_empleado}}" readonly>
                          
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="segundoApellidoEmpleado">Segundo apellido</label>
                          <input type="text" class="form-control" id="segundoApellidoEmpleado" placeholder="" value="{{$empleado->segundo_apellido_empleado}}" readonly>                    
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                          <label for="CedulaEmpleado">Cédula de identidad</label>
                          <input type="text" class="form-control" id="CedulaEmpleado" placeholder="" value="{{$empleado->cedula_empleado}}" readonly>
                          
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="fnacEmpleado">Fecha de nacimiento</label>
                            <input type="text" class="form-control" id="fnacEmpleado" placeholder="" value="{{$empleado->fecha_nacimiento}}" readonly>                           
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="salarioEmpleado">Salario</label>
                            <input type="text" name="salario" class="form-control" placeholder="Monto en Bs." value="{{$empleado->salario}}" required>                    
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="cargoEmpleado">Cargo</label>
                                       <br>
                                       
                                       <select class="custom-select d-block w-100" name="cargoEmpleado" required>
                                        <option selected="selected">
                                            {{$empleado->cargo->nombre_cargo}}
                                        </option>
                                        
                                        @foreach ($cargo as $item)
                                          
                                          <option>{{$item}}</option>
                                        @endforeach
                                      </select>                                      
                        </div>
                    </div>

                  
                    <br>
                    <div>
                        @can('index.beneficios.vacaciones')
                        <a href="{{route('beneficiosYVacaciones', $empleado->cedula_empleado)}}">
                            <button style="margin-right:30px" type="button" class="btn btn-warning">Beneficios y vacaciones</button>
                        </a>
                        @endcan
                        
                        <a href="{{route('horariosEmpleado', $empleado->cedula_empleado)}}">
                            <button style="margin-right:30px" type="button" class="btn btn-warning">Horario de trabajo</button>
                        </a>
                        
                        
                        <a href="{{route('asistenciasEmpleado', $empleado->cedula_empleado)}}">
                            <button style="margin-right:30px" type="button" class="btn btn-warning">Asistencias</button>
                        </a>
            
                        <button style="background-color: greenyellow"type="submit" class="btn btn-warning">Guardar cambios</button>
            
            
            
                        <!-- Formulario para el boton elimina-->
            
                        
            
                    </form>
                    <br>
                    <br>
                    @can('eliminar.empleado')
                    <form action="{{route ('eliminar.empleado',     $empleado->cedula_empleado)}}" method="POST" class="d-inline">
            
                        @method('DELETE')
                        @csrf
                        <button style="background-color: red; color:white"type="submit" class="btn btn-warning">Eliminar Empleado</button>
            
                    </form>
                    @endcan
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