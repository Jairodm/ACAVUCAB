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
    <title>ACAVUCAB - Nómina de Empleados</title>
</head>

<body>
        @include('plantilla')


    <div class="container mt-2 pt-2">
        <h2 class="display-4 text-center">Nómina </h2>
        <hr class="bg-warning">
            <table class="table table-hover">
                    <thead class="bg-warning">
                        <tr>
                            <th scope="col" class="text-center">ddsa</th>
                            <th scope="col" class="text-center">Nombre</th>
                            <th scope="col" class="text-center">Apellido</th>
                            <th scope="col" class="text-center">Fecha NAC</th>
                            <th scope="col" class="text-center">Cargo</th>
                            <th scope="col" class="text-center"></th>
                            <th colspan="2">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($empleados as $item)
                        <tr>
                                <th class="text-center">{{$item->cedula_empleado}}</th>
                                <th class="text-center">{{$item->primer_nombre_empleado}}</th>
                                <th class="text-center">{{$item->primer_apellido_empleado}}</th>
                                <th class="text-center">{{$item->fecha_nacimiento}}</th>                                
                                <th class="text-center">{{$item->cargo->nombre_cargo}}</th>

                            @can('Consultar.empleado')
                            <td class="text-center"><a href="{{route('ConsultarEmpleado', $item)}}" class="btn btn-warning" style="background-color: greenyellow" >Consultar datos</a></td>
                            @endcan 
                        </tr>
                             @endforeach
                    </tbody>
                </table>
                {{ $empleados->links() }}
    </div>
    

    <form method="POST" action="{{ route('leerAsistencias') }}" validate>
      @csrf

      <div class="col md-4 text-center">
          <button class="btn btn-warning btn-lg " type="submit">Leer asistencias</button>
          </div>
     </form>

     @can('reporte.asistencia')
     <div  class="col md-4 text-center" style="margin-bottom:50px">
      <a href="{{route('reporte.asistencia')}}">
      <button style="" type="button" class="btn btn-warning btn-lg ">Generar Reporte de asistencia</button>
      </a>
    </div>
    @endcan

      
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