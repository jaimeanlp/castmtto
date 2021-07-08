<?php
    include ('conexion.php');
    $query = "SELECT s.id, s.num_orden as orden, IFNULL(CONCAT(c.nombre, ' ', c.direccion), 'SIN CLIENTE') as cliente, s.falla, IFNULL(u.nombre, 'asignar') as asigna FROM servicio s
    LEFT JOIN cliente c ON s.id_cte = c.id
    LEFT JOIN usr_servicio us ON s.id = us.id_servicio
    LEFT JOIN usr u ON us.id_usr_tecnico = u.id";
    $result = mysqli_query($conexion, $query);
    ?>
    <table>
    <?php
    while($row = mysqli_fetch_array($result)){
        ?>
            <tr service-id="<?=$row['id'] ?>">
                <td><a href="#" class="service-item"><?=$row['orden'] ?></td></a>
                <td><?=$row['cliente'] ?></td>
                <td><?=$row['falla'] ?></td>
                <?php
                if ($row['asigna'] == 'asignar') {
                    ?>
                    <td><a href="#" class="asigna-item"><?=$row['asigna'] ?></td></a>
                    <?php
                }else{
                    ?>
                    <td><?=$row['asigna'] ?></td>
                    <?php
                }
                ?>
                
            </tr>
        <?php
    }
    ?>
    <?php
?>