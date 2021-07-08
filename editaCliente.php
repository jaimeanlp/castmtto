<?php
    include('conexion.php');
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $ref = $_POST['ref'];
    $latitud = $_POST['latitud'];
    $longitud = $_POST['longitud'];
    $id = $_POST['id'];
    print_r($_POST);
    $query = "UPDATE cliente SET nombre = '$nombre', direccion = '$direccion', 
                referencia = '$ref', latitud = '$latitud', longitud = '$longitud' WHERE id = '$id';";

    $result = mysqli_query($conexion, $query);

    $host = "files.000webhost.com";
    $usrftp = "castpuebla";
    $pwdftp = "qwLK6734";

    $conn = ftp_connect($host) or die("no se puede conectar a $host");

    if (@ftp_login($conn, $usrftp, $pwdftp)) {
        echo "Conectado como $ftp_user@$ftp_server\n";
    } else {
        echo "No se pudo conectar como $ftp_user\n";
    }

    
    if (!$result) {
        echo $query;
    }else{
        echo "cliente editado";
    }

?>