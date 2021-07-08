<?php
    include('conexion.php');
    $id_tecnico = $_POST['id_tecnico'];
    $id_servicio = $_POST['id_servicio'];
    $alta = date("Y-m-d H:i:s");
    $usr_asigna = 1;
    
    $query = "INSERT INTO usr_servicio(id_servicio, id_usr_tecnico, id_usr_asigna, alta, id_status) VALUES 
                ('$id_servicio', '$id_tecnico', '$usr_asigna', '$alta', '1');";

    $result = mysqli_query($conexion, $query);
    if (!$result) {
        echo $query;
    }else{
        echo "asignado";
        $host = "files.000webhost.com";
        $usrftp = "castpuebla";
        $pwdftp = "qwLK6734";
    
        $conn = ftp_connect($host) or die("no se puede conectar a $host");
    
        if (@ftp_login($conn, $usrftp, $pwdftp)) {
            echo "Conectado como $usrftp@$host\n";
        } else {
            echo "No se pudo conectar como $ftp_user\n";
        }
    }


?>