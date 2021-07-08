<?php
    include ('conexion.php');
    $query = "SELECT s.num_orden, c.nombre, c.direccion, s.falla FROM servicio s
                JOIN cliente c ON s.id_cte = c.id";
    $result = mysqli_query($conexion, $query);
    $prueba = mysqli_fetch_array($result);
    ?>
    <table>
    <?php
    while($row = mysqli_fetch_array($result)){
        ?>
            <tr cliente-id="<?=$row['id'] ?>">
                <td><?=$row['num_orden'] ?></td></a>
                <td><?=$row['nombre'] ?></td>
                <td><?=$row['direccion'] ?></td>
                <td>
                <?php
                        $query = "SELECT u.nombre, u.id FROM usr u
                        JOIN usr_perfil up ON u.id = up.id_usr
                        JOIN perfil p ON up.id_perfil = p.id WHERE p.id = 3";
                        $result1 = mysqli_query($conexion, $query);
                    ?>
                    <select class="form-select" name="tecnico" id="tecnico" required>
                    <option value="">técnico</option>
                        <?php
                            while ($raw = mysqli_fetch_array($result1)) {
                                echo '<option value="' . $raw['id'] . '">' . $raw['nombre'] . '</option>';  
                            }
                        ?>
                    </select>
                
                </td>
            </tr>
        <?php
    }
    ?>