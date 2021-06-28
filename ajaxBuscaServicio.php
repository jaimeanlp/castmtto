<?php
    include('conexion.php');
    $search = $_POST['search'];

    if(!empty($search)){

        $query = "SELECT s.id, s.num_orden as orden, CONCAT(c.nombre, ' ', c.direccion) as cliente, s.falla FROM servicio s
        LEFT JOIN cliente c ON s.id_cte = c.id
        WHERE num_orden LIKE '%$search%';";

        $result = mysqli_query($conexion, $query);
        if(!$result){
            die('Error de consulta'.mysqli_error($conexion));

        }

        while($row = mysqli_fetch_array($result)){
            ?>
            <table>
            <tr>
                <td><?=$row['orden'] ?></td>
                <td><?=$row['cliente'] ?></td>
                <td><?=$row['falla'] ?></td>
            </tr>
            <table>
            <?php
        }

    }
?>