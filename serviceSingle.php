<?php

    include('conexion.php');
    $id = $_POST['id'];
    $query = "SELECT * FROM servicio WHERE id = $id;";

    $result = mysqli_query($conexion, $query);

    while ($raw = mysqli_fetch_array($result)) {
        $json[] = array(
            'num_orden' => $raw['num_orden'],
            'proveedor' => $raw['id_proveedor'],
            'tipo' => $raw['id_tipo'],
            'falla' => $raw['falla'],
            'cliente' => $raw['id_cte'],
            'id' => $raw['id']
        );
    };
    $jsonString = json_encode($json[0]);
    echo $jsonString;
?>