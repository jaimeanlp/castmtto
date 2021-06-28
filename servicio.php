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
    <div class="container p-4">
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <form id="servicio-form">
                            <div class="form-group p-2">
                                <input type="text" id="orden" name="orden" placeholder="No. de Orden" required>
                            </div>
                            <div class="form-group p-2">
                                <?php
                                    $query = "SELECT id, nombre FROM proveedor WHERE id_status = 1";
                                    $result = mysqli_query($conexion, $query);
                                ?>
                                <select class="form-select" name="proveedor" id="proveedor" required>
                                    <option value="">Proveedor</option>
                                    <?php
                                        while ($raw = mysqli_fetch_array($result)) {
                                         echo '<option value="' . $raw['id'] . '">' . $raw['nombre'] . '</option>';  
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group p-2">
                                <?php
                                    $query = "SELECT id, nombre FROM cat_tipo";
                                    $result = mysqli_query($conexion, $query);
                                ?>
                                <select class="form-select" name="tipo" id="tipo" required>
                                <option value="">Tipo de servicio</option>
                                    <?php
                                        while ($raw = mysqli_fetch_array($result)) {
                                         echo '<option value="' . $raw['id'] . '">' . $raw['nombre'] . '</option>';  
                                        }
                                    ?>
                                </select>
                            </div>            
                            <div class="form-group p-2">
                                <textarea id="falla" class="form-control" placeholder="Falla" required></textarea>
                            </div>

                            <div class="form-group p-2">
                                <?php
                                    $query = "SELECT id, CONCAT(nombre, ' ', direccion) as nombre  FROM cliente";
                                    $result = mysqli_query($conexion, $query);
                                ?>
                                <select class="form-select mi-selector" name="cliente" id="cliente" required>
                                    <option value="">Cliente</option>
                                    <?php
                                        while ($raw = mysqli_fetch_array($result)) {
                                         echo '<option value="' . $raw['id'] . '">' . $raw['nombre'] . '</option>';  
                                        }
                                    ?>
                                </select>
                            </div>
                            


                            <div class="form-group p-2">
                                <button type="submit" name="envia" id="envia"class="btn btn-primary btn-block text-center">Agregar servicio</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card my-4" id="serviceResult">
                    <div class="card-body">
                        <div class="alert alert-success" role="alert">
                            Servicio agregado correctamente
                        </div>
                    </div>          
                </div>
            </div>
            
            <div class="col-md-7">
                <div class="card my-4 p-0" id=div-filtro>
                <?php
                    $query = "SELECT id, nombre FROM cat_status";
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