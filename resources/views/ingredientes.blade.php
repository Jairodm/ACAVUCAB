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
    <title>ACAVUCAB - Ingredientes</title>
</head>
<body>
    
   
@include('plantilla')
<div class="container mt-2 pt-2">
    @error('nombre_ingrediente')
    <div class="alert alert-danger">El nombre es obligatorio</div>
    @enderror
    @error('descripcion_ingrediente')
    <div class="alert alert-danger">La descripción es obligatoria</div>
    @enderror
    <h1 style="font-size:30px; margin-top:30px"class="display-4">Ingredientes </h1>
    <hr class="bg-warning">
<form action="{{route('registrarIngrediente')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-md-4 mb-3">
            <label for="cantidad">Nombre del Ingrediente</label>
        <input type="text" class="form-control" id="cantidad" name="nombre_ingrediente" value="{{old('nombre_ingrediente')}}" >   
            <div class="invalid-feedback">
                Por favor escoja una cantidad válida.
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <label for="cantidad">Descripción del Ingrediente</label>
        <input type="text" class="form-control" id="cantidad" name="descripcion_ingrediente" value="{{old('descripcion_ingrediente')}}" >   
            <div class="invalid-feedback">
                Por favor escoja una cantidad válida.
            </div>
        </div>
        <div class="col-md-4 mt-4 ">
            <button class="btn btn-warning " type="submit">Guardar</button>
        </div>
       
    </div> 
</form>
    <hr class="bg-warning">
    <h1 style="font-size:30px; margin-top:15px"class="display-4">Listado de Ingredientes </h1>
        <table class="table table-hover" style="margin-top:15px">
                <thead class="bg-warning">
                    <tr>
                        <th scope="col" class="text-center">Nombre</th>
                        <th scope="col" class="text-center">Descripción</th>
                        <th scope="col" class="text-center"></th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($ingredientes as $item)
                    <tr>
                        <th scope="row" class="text-center ">{{$item->nombre_ingrediente}}</th>
                        <td class="text-center ">{{$item->descripcion_ingrediente}}</td>
                    <td class="text-center btn btn-primary btn-sm mt-2"><a href="{{route('modificarIngrediente',$item->codigo_ingrediente)}}" style="color: black">Modificar</a></td>

                    </tr>
                   @endforeach
                </tbody>
            </table>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body> 
</html>
