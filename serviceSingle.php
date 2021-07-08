<?php

    include('conexion.php');

    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $query = "SELECT * FROM servicio WHERE id = $id;";

        $result = mysqli_query($conexion, $query);

        while ($row = mysqli_fetch_array($result)) {
            $json[] = array(
                'num_orden' => $row['num_orden'],
                'proveedor' => $row['id_proveedor'],
                'tipo' => $row['id_tipo'],
                'falla' => $row['falla'],
                'cliente' => $row['id_cte'],
                'id' => $row['id']
            );
        };
        $jsonString = json_encode($json[0]);
        echo $jsonString;
    }else if (isset($_POST['id_servicio'])) {
        $id = $_POST['id_servicio'];
        $query = "SELECT s.num_orden, c.nombre, c.direccion, s.falla, c.latitud, c.longitud FROM servicio s
        JOIN cliente c ON s.id_cte = c.id
        WHERE s.id = $id;";

        $result = mysqli_query($conexion, $query);
        $row = mysqli_fetch_array($result);
        ?>
        <p>No. Orden: <?=$row['num_orden'] ?></p>   
        <p>Dirección: <?=$row['direccion'] ?></p>
        <?php 
        $gps = "https://www.google.com/maps/search/?api=1&query=" . $row['latitud'] . "," . $row['longitud'] . "&zoom=20";
        ?>
        <p><a href="<?=$gps?>" target="_blank">Ver</a></p>
        <p>Falla: <?=$row['falla'] ?></p>
        
        <?php
            $query = "SELECT u.nombre, u.id FROM usr u
            JOIN usr_perfil up ON u.id = up.id_usr
            JOIN perfil p ON up.id_perfil = p.id WHERE p.id = 3";
            $result = mysqli_query($conexion, $query);
        ?>
            <div class="form-group p-2">
                <select class="form-select" id="tecnico" required>
                    <option value="">Técnico</option>
                    <?php
                        while ($raw = mysqli_fetch_array($result)) {
                            echo '<option value="' . $raw['id'] . '">' . $raw['nombre'] . '</option>';  
                        }
                    ?>
                </select>
            </div>
            <div class="form-group p-2">
                <input type="hidden" id="idServicio" value="<?=$id?>">            
                <button type="button" id="asigna" class="btn btn-primary btn-block text-center">Asignar servicio</button>
                <button type="button" id="cancela" class="btn btn-danger btn-block text-center">Cancelar</button>
            </div>
        <?php
    }
?>