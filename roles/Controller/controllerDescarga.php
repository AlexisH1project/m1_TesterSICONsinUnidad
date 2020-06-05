<?php

$nombreDeArchivoDescarga = $_GET['nombreDecarga'];
echo $nombreDeArchivoDescarga;

	header("Content-type: application/PDF");
	readfile("./documentos/".$nombreDeArchivoDescarga); //C:/xampp2/htdocs/SICON_w/roles/Controller/
	
?>