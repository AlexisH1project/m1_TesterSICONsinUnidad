
<?php

$host = "localhost";
$usuario = "root";
$contrasena = "s!(0n_25";
$nombre_bd = "fomope2";

$conexion = mysqli_connect($host, $usuario, $contrasena, $nombre_bd);

if(!$conexion){

	die("La conexion fallo: " . mysqli_connect_error());
	
}

?>
