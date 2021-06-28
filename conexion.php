<?php
	$db_host = "localhost";
	$db_name = "id17068005_castpuebla";
	$db_usr = "id17068005_jaime";
	$db_pwd = "f#4ir#U/9hte4V\$E";
	$conexion=mysqli_connect($db_host, $db_usr, $db_pwd,$db_name);

	if(mysqli_connect_errno()){
		echo "Falla al conectar a base de datos";
		echo $db_host;
		exit();
	}else{
		//echo "Conexión exitosa";
	}
?>