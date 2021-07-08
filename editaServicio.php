<?php

    include('conexion.php');


    $usuario_alta = 1;
    $alta = date("Y-m-d H:i:s");
    $orden = $_POST['orden'];
    $proveedor = $_POST['proveedor'];
    $tipo = $_POST['tipo'];
    $falla = $_POST['falla'];
    $cliente = $_POST['cliente'];
    $id = $_POST['id'];

    $query = "UPDATE servicio SET id_proveedor='$proveedor', id_tipo='$tipo', falla='$falla', id_cte='$cliente' WHERE id = '$id';";
    echo $query;     

    
    $result = mysqli_query($conexion, $query);
    if (!$result) {
        echo $query;
    }else{
        echo "servicio editado";
    }

?>