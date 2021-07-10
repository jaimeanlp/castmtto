<?php
include('conexion.php');

$id_status = $_POST['id_status'];
$id_servicio = $_POST['id_servicio'];

$query = "UPDATE servicio SET id_status = $id_status WHERE id = $id_servicio;";
$result = mysqli_query($conexion, $query);

if (!$result) {
    $json[] = array(
        'valida' => 1,
        'mensaje' => 'Hubo un problema al actualizar',
    );
}else{
    $json[] = array(
        'valida' => 1,
        'mensaje' => 'Se actualizó el status',
    );
}
$response = json_encode($json[0]);
echo $response;

?>