<!DOCTYPE html>
<html lang="en">
<head>
  <?php include('conexion.php')?>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CAST - Cliente</title>
	<script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <script type="text/javascript" src="cliente.js"></script>
</head>
<body>
<?php include('header.php')?>

<body>
    
    <div class="container p-4">
        <h1 align="center">CLIENTES</h1>
        <?php
        ?>
    </div>
    <div class="container p-4">
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <form id="servicio-form">
                            <div class="form-group p-2">
                                <input type="hidden" name="id" id="id" value="">
                                <input type="text" id="nombre" name="nombre" placeholder="Nombre" required>
                            </div>           
                            <div class="form-group p-2">
                                <textarea id="direccion" class="form-control" placeholder="Dirección" required></textarea>
                            </div>
                            <div class="form-group p-2">
                                <textarea id="ref" class="form-control" placeholder="Referencia" required></textarea>
                            </div>
                            <div class="form-group p-2">
                                <input type="text" id="longitud" name="longitud" placeholder="Longitud">
                            </div>
                            <div class="form-group p-2">
                                <input type="text" id="latitud" name="latitud" placeholder="Latitud" required>
                            </div>
                            <div class="form-group p-2">
                                <button type="submit" name="envia" id="envia"class="btn btn-primary btn-block text-center">Agregar cliente</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card my-4" id="serviceResult">
                    <div class="card-body">
                        <div class="alert alert-success" role="alert">
                            Cliente agregado correctamente
                        </div>
                    </div>          
                </div>
            </div>
            
            <div class="col-md-7">
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <td>Nombre</td>
                            <td>Dirección</td>
                            <td>Referencia</td>
                            <td>Latitud</td>
                            <td>Longitud</td>
                        </tr>
                    </thead>
                    <tbody id="clientesTabla">
                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>