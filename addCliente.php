<?php 
    include('conexion.php');
    
    /*
    HACER VALIDACIÓN
    */

    $nombre = $_POST['nombre'];
    $direccion =$_POST['direccion'];
    $ref = $_POST['ref'];
    $latitud = $_POST['latitud'];
    $longitud = $_POST['longitud'];

    $query = "INSERT INTO cliente(nombre, direccion, longitud, latitud, referencia, id_status) VALUES 
                ('$nombre', '$direccion', '$longitud', '$latitud', '$ref', '1');";

    $result = mysqli_query($conexion, $query);
    if (!$result) {
        $json[] = array(
            'valida' => 0,
            'mensaje' => 'No se pudo agregar el cliente',
        );
    }else{
        $json[] = array(
            'valida' => 1,
            'mensaje' => 'Cliente agregado correctamente',
        );
    }
    $response = json_encode($json[0]);
    echo $response;
    
?>