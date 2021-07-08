<?php
    include ('conexion.php');
    $query = "SELECT * FROM cliente";
    $result = mysqli_query($conexion, $query);
    ?>
    <table>
    <?php
    while($row = mysqli_fetch_array($result)){
        ?>
            <tr cliente-id="<?=$row['id'] ?>">
                <td>
                <a href="#" class="cliente-item"><?=$row['nombre'] ?></td></a>
                <td><?=$row['direccion'] ?></td>
                <td><?=$row['referencia'] ?></td>
                <td><?=$row['latitud'] ?></td>
                <td><?=$row['longitud'] ?></td>
            </tr>
        <?php
    }
    ?>
    <?php
?>