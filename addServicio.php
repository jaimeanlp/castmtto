<?php 
    include('conexion.php');
    
    /*
    HACER VALIDACIÓN
    */
    $usuario_alta = 1;
    $alta = date("Y-m-d H:i:s");
    $orden = $_POST['orden'];
    $proveedor = $_POST['proveedor'];
    $tipo = $_POST['tipo'];
    $falla = $_POST['falla'];
    $cliente = $_POST['cliente'];
     
    $query = "INSERT INTO servicio( num_orden, fecha_inicio, fecha_fin, alta, id_status, id_proveedor,
     id_tipo, id_usr, falla, id_cte) VALUES 
     ('$orden', NULL,NULL,'$alta', '1', '$proveedor', '$tipo', $usuario_alta, '$falla', '$cliente')";
    $result = mysqli_query($conexion, $query);
    if (!$result) {
        echo $query;
    }else{
        echo "servicio agregado";
    }
    
?>