<?php 
    include('conexion.php');
    
    /*
    HACER VALIDACIÓN
    */
    $usuario_alta = 1;
    $valida = 0;
    $alta = date("Y-m-d H:i:s");
    $mensaje = "";
    $orden = $_POST['orden'];
    $proveedor = $_POST['proveedor'];
    $tipo = $_POST['tipo'];
    $falla = $_POST['falla'];
    $cliente = ($_POST['cliente'] != 0 ) ? $_POST['cliente'] : NULL;
    $mensaje = (isset($orden)) && strlen(trim($orden))? "" : "<br>Numero de orden requerido";
    $query1 = "select id FROM servicio WHERE num_orden LIKE '%$orden%';";
    $result1 = mysqli_query($conexion, $query1);
    $mensaje .= ($proveedor != 0) ? "" : "<br>Proveedor requerido";
    $mensaje .= ($tipo != 0) ? "" : "<br>Tipo requerido";
    $mensaje .= ((isset($falla)) && strlen(trim($falla))) ? "" : "<br>Falla requerida</br>"; 
    if (mysqli_num_rows($result1) > 0 && isset($orden) && strlen(trim($orden))) {
        $mensaje = "<br>Número de orden ya existente";
    }
    $query = "INSERT INTO servicio( num_orden, fecha_inicio, fecha_fin, alta, id_status, id_proveedor,
     id_tipo, id_usr, falla, id_cte) VALUES 
     ('$orden', NULL,NULL,'$alta', '5', '$proveedor', '$tipo', $usuario_alta, '$falla', '$cliente')";
    $result = mysqli_query($conexion, $query);
    if (!$result || $mensaje != "") {
        $json[] = array(
            'valida' => 0,
            'mensaje' => 'No se pudo agregar el servicio' . $mensaje .$query,
        );
    }else{
        $json[] = array(
            'valida' => 1,
            'mensaje' => 'Servicio agregado exitosamente',
        );
    }
    $response = json_encode($json[0]);
    echo $response;  
?>