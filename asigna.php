<?php
    include('conexion.php');
    $id_tecnico = $_POST['id_tecnico'];
    $id_servicio = $_POST['id_servicio'];
    date_default_timezone_set("America/Mexico_City");
    $alta = date("Y-m-d H:i:s");
    $hoy = date("Ymd");
    $usr_asigna = 1;
    $valida = 0;
    $validaFTP = 0;
    $validaStatus = 0;
    $mensaje = "";
    $mensajeStatus = "";
    $mensajeFTP = "";
    
    $query = "INSERT INTO usr_servicio(id_servicio, id_usr_tecnico, id_usr_asigna, alta, id_status) VALUES 
                ('$id_servicio', '$id_tecnico', '$usr_asigna', '$alta', '1');";

    $result = mysqli_query($conexion, $query);
    

    if (!$result) {
        $valida = 0;
        $mensaje = 'Hubo un problema al asignar<br>Contacte al administrador';

    }else{  

        $valida = 1;
        $mensaje = 'Servicio agregado exitosamente<br>';
        $query1 = "UPDATE servicio SET id_status = 6 WHERE id = $id_servicio;"; 
        $result1 = mysqli_query($conexion, $query1);
        if (!$result1) {
            $validaStatus = 0;
            $mensajeStatus = 'No se actualizó status<br>';
        }else{
            $validaStatus = 1;
            $mensajeStatus = 'Se actualizó status<br>';
        }
        $host = "files.000webhost.com";
        $usrftp = "castpuebla";
        $pwdftp = "qwLK6734";
        $conn = ftp_connect($host) or die("no se puede conectar a $host");
        if (@ftp_login($conn, $usrftp, $pwdftp)) {
            ftp_chdir($conn, "public_html/mtto/img/");
            if (ftp_nlist($conn, $id_tecnico)) {
                ftp_chdir($conn, "/public_html/mtto/img/$id_tecnico");
            }else{
                ftp_mkdir($conn, $id_tecnico);
                ftp_chdir($conn, "/public_html/mtto/img/$id_tecnico");
            }
            
            if (ftp_nlist($conn, $hoy)) {
                ftp_chdir($conn, "/public_html/mtto/img/$id_tecnico/$hoy");
            }else{
                ftp_mkdir($conn, $hoy);
                ftp_chdir($conn, "/public_html/mtto/img/$id_tecnico/$hoy");   
            }

            if (ftp_nlist($conn, $id_servicio)) {
                ftp_chdir($conn, "/public_html/mtto/img/$id_tecnico/$hoy/$id_servicio");
            }else{
                ftp_mkdir($conn, $id_servicio);
                ftp_chdir($conn, "/public_html/mtto/img/$id_tecnico/$hoy/$id_servicio");   
            }
            $validaFTP = 1;
            $mensajeFTP = 'Se crearon carpetas de servicio<br>';
        } else {
            $validaFTP = 0;
            $mensajeFTP = 'No se crearon carpetas de servicio<br>';
        }
    }
    $json[] = array(
        'valida' => $valida,
        'mensaje' => $mensaje,
        'validaStatus' => $validaStatus,
        'mensajeStatus' => $mensajeStatus,
        'validaFTP' => $validaFTP,
        'mensajeFTP' => $mensajeFTP,
    );
    $response = json_encode($json[0]);
    echo $response;
?>