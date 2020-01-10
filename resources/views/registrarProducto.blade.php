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
    <title>ACAVUCAB - Agregar producto</title>

    <SCRIPT language="javascript">
		function addRow(tableID) {

			var table = document.getElementById(tableID);

			var rowCount = table.rows.length;
			var row = table.insertRow(rowCount);

			var cell1 = row.insertCell(0);
			var element1 = document.createElement("input");
			element1.type = "checkbox";
			element1.name="chkbox[]";
			cell1.appendChild(element1);

			var cell2 = row.insertCell(1);
			cell2.innerHTML = rowCount + 1;

			var cell3 = row.insertCell(2);
			var element2 = document.createElement("input");
			element2.type = "text";
			element2.name = "txtbox[]";
			cell3.appendChild(element2);


		}

		function deleteRow(tableID) {
			try {
			var table = document.getElementById(tableID);
			var rowCount = table.rows.length;

			for(var i=0; i<rowCount; i++) {
				var row = table.rows[i];
				var chkbox = row.cells[0].childNodes[0];
				if(null != chkbox && true == chkbox.checked) {
					table.deleteRow(i);
					rowCount--;
					i--;
				}


			}
			}catch(e) {
				alert(e);
			}
		}

	</SCRIPT>
</head>
<body>

  @include('plantilla')

    <div class="container mt-2 pt-2">
        <h1 class="display-4 text-center">Agregar producto </h1>
        <hr class="bg-warning">       
        
        <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Información del producto</h4>
        <form action="{{route('cerveza.crear')}}" method="POST" validate>
            @csrf 
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label for="nombreCerveza">Nombre de la cerveza</label>
                      <input type="text" class="form-control" name="nombreCerveza" placeholder="" value="" required>                      
                    </div>
                    <div class="col-md-6 mb-3">
                            <label for="precioCerveza">Precio</label>
                             <input type="text" class="form-control" name="precio" placeholder="Monto en Bs." value="" required>                          
                        </div>
                    
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                            <label for="tipoCerveza">Proveedor</label>
                            <br>
                            <select class="custom-select d-block w-100" name="proveedor" required>
                                <option value="">Escoger...</option>
                                @foreach ($proveedor as $item)
                                  <option>{{$item}}</option>
                                @endforeach
                              </select>  
                  </div>
                </div>

                  <div class="row">
                        <div class="col-md-6 mb-3">
                                <label for="tipoCerveza">Tipo de cerveza</label>
                                <br>
                                <select class="custom-select d-block w-100" name="tipoCerveza" required>
                                    <option value="">Escoger...</option>
                                    @foreach ($tipoCerveza as $item)
                                      
                                      <option>{{$item}}</option>
                                    @endforeach
                                  </select>
                      </div>
                        <div class="col-md-6 mb-3">
                            <a href="registrarTipoCerveza">
                                <button style="background-color:greenyellow; margin-top:20px"type="button" class="btn btn-warning">Agregar tipo de cerveza</button>      
                            </a>
                            </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 mb-3">
                              <label for="tipoCerveza">Foto</label>
                              <br>
                              <select class="custom-select d-block w-100" name="fotoCerveza" required>
                                  <option value="">Escoger...</option>
                                  @foreach ($fotoCerveza as $item)
                                    
                                    <option>{{$item}}</option>
                                  @endforeach
                                </select>  
                    </div>
                  </div>



            <button style="margin-bottom:50px"type="submit" class="btn btn-warning">Registrar producto</button>
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