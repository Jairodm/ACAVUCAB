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
    <title>ACAVUCAB - Agregar receta</title>


@include('plantilla')
<div class="container mt-2 pt-2">
<h1 style="font-size:30px; margin-top:30px"class="display-4">Receta </h1>
<hr class="bg-warning">
<h3 class="mb-3">Cerveza: {{$cerveza->nombre_cerveza}}</h3>

    <div class="row">
        <div class="col-md-5 mb-3">
            <label for="ingrediente">Ingrediente</label>
            <select class="custom-select d-block w-100" id="ingrediente" name='ingrediente' >
                <option value="">Escoger...</option>
                @foreach ($listadoIngredientes as $item)
                <option>{{$item->nombre_ingrediente}}</option>
                @endforeach
            </select>
            <div class="invalid-feedback">
                Por favor escoja un ingrediente válido.
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <label for="cantidad">Cantidad</label>
            <input type="text" class="form-control" id="cantidad" placeholder="" value="" >   
            <div class="invalid-feedback">
                Por favor escoja una cantidad válida.
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <label for="unidad">Unidad</label>
            <select class="custom-select d-block w-100" id="unidad" name="receta">
                <option value="">Escoger...</option>
                @foreach ($receta as $item)
                    <option>{{$item->unidad_ingrediente}}</option>
                @endforeach
            </select>
            <div class="invalid-feedback">
                Por favor escoja una unidad válida.
            </div>
        </div>
    </div>
<a href="{{ route ('ingredientes')}}" class="btn btn-warning">Añadir ingrediente</a>
    <hr class="bg-warning">
    <div class="container mt-4 pt-4">
        <table id = "dataTable" class="table table-hover">
            <thead class="bg-warning">
                <tr>
                    <th scope="col" class="text-center">Ingrediente</th>
                    <th scope="col" class="text-center">Descripción</th>
                    <th scope="col" class="text-center">Cantidad</th>
                    <th scope="col" class="text-center">Unidad</th>
                    <th scope="col" class="text-center"></th>
                    <td class="text-center"></td>
                </tr>
            </thead>
            <tbody>
                @foreach($ingrediente as $item)
                   
                <tr>
                    <th scope="row" class="text-center">{{$item->nombre_ingrediente}}</th>
                    <td class="text-center">{{$item->descripcion_receta}} </td>
                    <td class="text-center">{{$item->cantidad_ingrediente}}</td>
                    <td class="text-center">{{$item->unidad_ingrediente}}</td>
                    <td class="text-right">
                        <a href="" class="btn btn-warning  btn-sm ">Editar</a>
                        <a href="" class="btn btn-danger  btn-sm d-inline">Eliminar</a>
                    </td>
                </tr>
                    
                @endforeach
            </tbody>
        </table>
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




