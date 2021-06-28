<?php
    include ('conexion.php');
    $query = "SELECT s.id, s.num_orden as orden, CONCAT(c.nombre, ' ', c.direccion) as cliente, s.falla FROM servicio s
    LEFT JOIN cliente c ON s.id_cte = c.id";
    $result = mysqli_query($conexion, $query);
    ?>
    <table>
    <?php
    while($row = mysqli_fetch_array($result)){
        ?>
            <tr service-id="<?=$row['id'] ?>">
                <td>
                <a href="#" class="service-item"><?=$row['orden'] ?></td></a>
                <td><?=$row['cliente'] ?></td>
                <td><?=$row['falla'] ?></td>
            </tr>
        <?php
    }
    ?>
    <?php
?>