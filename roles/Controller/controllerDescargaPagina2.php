<?php

$nombreDeArchivoDescarga = $_GET['nombreDecarga'];
$tipoArchivo = $_GET['extencion'];
$ruta =	explode("/", $nombreDeArchivoDescarga); 
$from2 = '\\\\PWIDGRHOSISFO01\\pdfs2\\';

	if($tipoArchivo == "zip" || $tipoArchivo == "ZIP" || $tipoArchivo == "7z" || $tipoArchivo == "7Z" || $tipoArchivo == "RAR" || $tipoArchivo == "rar" || $tipoArchivo == "gz"|| $tipoArchivo == "GZ"){
		header("Content-type: application/zip");
        header("Content-Transfer-Encoding: binary");
		readfile("./DOCUMENTOS/".$nombreDeArchivoDescarga); //C:/xampp2/htdocs/SICON_w/roles/Controller/
		if($ruta[1] == "DOCUMENTOS_MOV"){
			readfile("./DOCUMENTOS_MOV/".$nombreDeArchivoDescarga); //C:/xampp2/htdocs/SICON_w/roles/Controller/
		}
		if($ruta[1] == "DOCUMENTOS_MOV"){
			readfile("./DOCUMENTOS_BAJAS/".$nombreDeArchivoDescarga); //C:/xampp2/htdocs/SICON_w/roles/Controller/
		}
        readfile("./DOCUMENTOS_MOV/".$nombreDeArchivoDescarga); //C:/xampp2/htdocs/SICON_w/roles/Controller/
        readfile($nombreDeArchivoDescarga); //C:/xampp2/htdocs/SICON_w/roles/Controller/
       	readfile("./DOCUMENTOS_RES/".$nombreDeArchivoDescarga); //C:/xampp2/htdocs/SICON_w/roles/Controller/
        readfile("./DOCUMENTOS_PDC/".$nombreDeArchivoDescarga); //C:/xampp2/htdocs/SICON_w/roles/Controller/

	}else{
		header("Content-type: application/PDF");
        header("Content-Transfer-Encoding: binary");
		echo $ruta[1];
		if($ruta[1] == "DOCUMENTOS_MOV"){
			readfile($nombreDeArchivoDescarga); //C:/xampp2/htdocs/SICON_w/roles/Controller/
		}
		if($ruta[1] == "DOCUMENTOS_BAJAS"){
			readfile($nombreDeArchivoDescarga); //C:/xampp2/htdocs/SICON_w/roles/Controller/
		}if($ruta[1] == "DOCUMENTOS_MOV_QR"){
			// $hoy = "select CURDATE()";
			// $tiempo ="select curTime()";
			// if ($resultHoy = mysqli_query($conexion,$hoy) AND $resultTime = mysqli_query($conexion,$tiempo)) {
			// 	$row = mysqli_fetch_row($resultHoy);
			// 	$fecha = str_replace ( "-", '',$row[0] ); 
			// }
			// $elCurp= explode("_", $ruta[3]);
			// $sqlRfc = "SELECT * FROM conteo_qr WHERE curp = '$elCurp[0]'" ;
			// $resultConteo = mysqli_query($conexion, $sqlRfc);
			// $rowConteo = mysqli_fetch_assoc($resultConteo);
			// copy($from2.$row[7].".pdf" , $nombreDeArchivoDescarga);
			readfile($nombreDeArchivoDescarga); //C:/xampp2/htdocs/SICON_w/roles/Controller/
		}else{
			// readfile("./DOCUMENTOS/".$nombreDeArchivoDescarga); //C:/xampp2/htdocs/SICON_w/roles/Controller/
			// readfile($nombreDeArchivoDescarga); //C:/xampp2/htdocs/SICON_w/roles/Controller/
			// readfile("./DOCUMENTOS_RES/".$nombreDeArchivoDescarga); //C:/xampp2/htdocs/SICON_w/roles/Controller/
		}

	}


?>