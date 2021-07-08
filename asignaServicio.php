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

    <script type="text/javascript" src="asigna.js"></script>
</head>
<body>
<?php include('header.php')?>

<body>
    
    <div class="container p-4">
        <h1 align="center">Asignar</h1>
        <?php   
        ?>
    </div>
    <div class="container p-4">
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr>
                                <td>No. Orden</td>
                                <td>Cliente</td>
                                <td>Direccion</td>
                                </tr>
                            </thead>
                            <tbody id="clientesTabla">
                                
                            </tbody>
                        </table>
                    </div>
                </div>          
                </div>
            </div>
            
            <div class="col-md-5">
               
            </div>
        </div>
    </div>
</body>
</html>