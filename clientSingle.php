<?php
    include('conexion.php');
    $id = $_POST['id'];
    $query = "SELECT * FROM cliente WHERE id = $id;";

    $result = mysqli_query($conexion, $query);

    while ($raw = mysqli_fetch_array($result)) {
        $json[] = array(
            'nombre' => $raw['nombre'],
            'direccion' => $raw['direccion'],
            'referencia' => $raw['referencia'],
            'latitud' => $raw['latitud'],
            'longitud' => $raw['longitud'],
            'id' => $raw['id']
        );
    };
    $jsonString = json_encode($json[0]);
    echo $jsonString;
?>