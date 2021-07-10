<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema CAST</title>
    <script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="index.js"></script>
    <?php include('conexion.php');?>
    <?php include('header.php');?>
</head>
<body>
    
    <div class="container p-4">
        <h1 align="center">SERVICIOS</h1>
        <?php
        ?>
    </div>
    <div class="alert alert-success text-center" id="serviceResult" role="alert">
                            Servicio agregado correctamente
    </div>
    <div class="container p-4">
        <div class="row">
            <div class="col-md-4">
                    
            </div>
            <div class="col-md-8">
                <div class="card my-4 p-0" id=div-filtro>
                <?php
                    $query = "SELECT id, nombre FROM cat_status WHERE id IN (5,6,7,8,9)";
                    $result = mysqli_query($conexion, $query);
                ?>
                    <select class="form-select" name="select-filtro" id="select-filtro">
                        <option value="0">Selecciona filtro para servicios</option>
                    <?php
                        while ($raw = mysqli_fetch_array($result)) {
                            echo '<option value="' . $raw['id'] . '">' . $raw['nombre'] . '</option>';  
                        }
                    ?>
                    
                    </select>
                </div>
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <td>No. Orden</td>
                            <td>Cliente</td>
                            <td>Falla</td>
                            <td>Asignación</td>
                        </tr>
                    </thead>
                    <tbody id="serviciosTabla">
                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>