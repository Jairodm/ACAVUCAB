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
            @error('nombre_ingrediente')
            <div class="alert alert-danger">El nombre es obligatorio</div>
            @enderror
            @error('cantidad_ingrediente')
            <div class="alert alert-danger">La cantidad es obligatorio</div>
            @enderror
            @error('unidad_ingrediente')
            <div class="alert alert-danger">La unidad es obligatoria</div>
            @enderror
<form action="{{route('modificar',$receta->codigo_receta)}}" method="post">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-md-3 mb-3">
            <label for="ingrediente">Ingrediente</label>
            <select class="custom-select d-block w-100"  name='nombre_ingrediente' >
                <option selected>{{$receta->ingrediente->nombre_ingrediente}}</option>
                @foreach ($ingrediente as $item)
                <option>{{$item->nombre_ingrediente}}</option>
                @endforeach
            </select>
            <div class="invalid-feedback">
                Por favor escoja un ingrediente válido.
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <label for="cantidad">Descripción</label>
            <input type="text" class="form-control"  placeholder="" value="{{$receta->descripcion_receta}}" name="descripcion_receta" >   
            <div class="invalid-feedback">
                Por favor escoja una cantidad válida.
            </div>
        </div>
        <div class="col-md-2 mb-3">
            <label for="cantidad">Cantidad</label>
            <input type="text" class="form-control"  placeholder="" value="{{$receta->cantidad_ingrediente}}" name="cantidad_ingrediente" >   
            <div class="invalid-feedback">
                Por favor escoja una cantidad válida.
            </div>
        </div>
        <div class="col-md-2 mb-3">
            <label for="unidad">Unidad</label>
            <input type="text" class="form-control"  placeholder="" value="{{$receta->unidad_ingrediente}}" name="unidad_ingrediente" >   
            <div class="invalid-feedback">
                Por favor escoja una unidad válida.
            </div>
        </div>
        <div class="col-md-2 mt-4">
            <button type="submit" class="btn btn-warning">Modificar receta</button>
        </div>
    </div>
</form>
<form action="{{route ('eliminarReceta',$receta->codigo_receta)}}" method="post">
    @method('DELETE')
    @csrf
    <button type="submit" class="btn btn-danger">Eliminar de la receta</button>
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