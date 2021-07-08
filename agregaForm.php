<?php
include('conexion.php');
?>
<div class="card">
                    <div class="card-body">
                        <form id="servicio-form">
                            <div class="form-group p-2">
                                <input type="hidden" id="idServicio" name="idServicio" value="">
                                <input type="text" id="orden" name="orden" placeholder="No. de Orden" required>
                            </div>
                            <div class="form-group p-2">
                                <?php
                                    $query = "SELECT id, nombre FROM proveedor WHERE id_status = 1";
                                    $result = mysqli_query($conexion, $query);
                                ?>
                                <select class="form-select" name="proveedor" id="proveedor" required>
                                    <option value="">Proveedor</option>
                                    <?php
                                        while ($raw = mysqli_fetch_array($result)) {
                                         echo '<option value="' . $raw['id'] . '">' . $raw['nombre'] . '</option>';  
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group p-2">
                                <?php
                                    $query = "SELECT id, nombre FROM cat_tipo";
                                    $result = mysqli_query($conexion, $query);
                                ?>
                                <select class="form-select" name="tipo" id="tipo" required>
                                <option value="">Tipo de servicio</option>
                                    <?php
                                        while ($raw = mysqli_fetch_array($result)) {
                                         echo '<option value="' . $raw['id'] . '">' . $raw['nombre'] . '</option>';  
                                        }
                                    ?>
                                </select>
                            </div>            
                            <div class="form-group p-2">
                                <textarea id="falla" class="form-control" placeholder="Falla" required></textarea>
                            </div>

                            <div class="form-group p-2">
                                <?php
                                    $query = "SELECT id, CONCAT(nombre, ' ', direccion) as nombre  FROM cliente";
                                    $result = mysqli_query($conexion, $query);
                                ?>
                                <select class="form-select mi-selector" name="cliente" id="cliente" required>
                                    <option value="">Cliente</option>
                                    <?php
                                        while ($raw = mysqli_fetch_array($result)) {
                                         echo '<option value="' . $raw['id'] . '">' . $raw['nombre'] . '</option>';  
                                        }
                                    ?>
                                </select>
                            </div>
                            <script>
                            $(document).ready(function() {
                                $('.mi-selector').select2();
                            });
                            </script>

                            <div class="form-group p-2">
                                <button type="button" name="envia" id="envia"class="btn btn-primary btn-block text-center">Agregar servicio</button>
                            </div>
                        </form>
                    </div>
                </div>
                
<?php
?>