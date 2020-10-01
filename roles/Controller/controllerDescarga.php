<?php

$nombreDeArchivoDescarga = $_GET['nombreDecarga'];
$tipoArchivo = $_GET['extencion'];

	if($tipoArchivo == "zip" || $tipoArchivo == "ZIP" || $tipoArchivo == "7z" || $tipoArchivo == "7Z"){
		header("Content-type: application/zip");
        header("Content-Transfer-Encoding: binary");
		readfile("./DOCUMENTOS/".$nombreDeArchivoDescarga); //C:/xampp2/htdocs/SICON_w/roles/Controller/
		readfile("./DOCUMENTOS_MOV/".$nombreDeArchivoDescarga); //C:/xampp2/htdocs/SICON_w/roles/Controller/
        readfile("./DOC_FOMOPES/".$nombreDeArchivoDescarga); //C:/xampp2/htdocs/SICON_w/roles/Controller/
        readfile("./DOCUMENTOS_RES/".$nombreDeArchivoDescarga); //C:/xampp2/htdocs/SICON_w/roles/Controller/

	}else{
		header("Content-type: application/PDF");
		readfile("./DOCUMENTOS_MOV/".$nombreDeArchivoDescarga); //C:/xampp2/htdocs/SICON_w/roles/Controller/
		readfile("./DOCUMENTOS/".$nombreDeArchivoDescarga); //C:/xampp2/htdocs/SICON_w/roles/Controller/
		readfile("./DOC_FOMOPES/".$nombreDeArchivoDescarga); //C:/xampp2/htdocs/SICON_w/roles/Controller/
		readfile("./DOCUMENTOS_RES/".$nombreDeArchivoDescarga); //C:/xampp2/htdocs/SICON_w/roles/Controller/

	}


?>