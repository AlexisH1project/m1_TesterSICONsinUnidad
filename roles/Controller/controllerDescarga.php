<?php

$nombreDeArchivoDescarga = $_GET['nombreDecarga'];
$tipoArchivo = $_GET['extencion'];

	if($tipoArchivo == "zip" || $tipoArchivo == "ZIP"){
		header("Content-type: application/zip");
        header("Content-Transfer-Encoding: binary");
		readfile("./documentos/".$nombreDeArchivoDescarga); //C:/xampp2/htdocs/SICON_w/roles/Controller/
	}else{
		header("Content-type: application/PDF");
		readfile("./documentos/".$nombreDeArchivoDescarga); //C:/xampp2/htdocs/SICON_w/roles/Controller/
	}


?>