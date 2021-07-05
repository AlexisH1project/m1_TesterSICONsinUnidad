<?php

$nombreDeArchivoDescarga = $_GET['nombreDecarga'];
$tipoArchivo = $_GET['extencion'];
$ruta =	explode("/", $nombreDeArchivoDescarga); 

	if($tipoArchivo == "zip" || $tipoArchivo == "ZIP" || $tipoArchivo == "7z" || $tipoArchivo == "7Z" || $tipoArchivo == "RAR" || $tipoArchivo == "rar" || $tipoArchivo == "gz"|| $tipoArchivo == "GZ"){
		header("Content-type: application/zip");
        header("Content-Transfer-Encoding: binary");
         header('Content-Disposition: attachment; filename='.basename("./".$ruta[2]."/".$ruta[3]));
		readfile("./".$ruta[2]."/".$ruta[3]); //C:/xampp2/htdocs/SICON_w/roles/Controller/
	}else{
		// header("Content-type: application/PDF");
		echo $nombreDeArchivoDescarga;
		if($ruta[2] == "DOCUMENTOS_MOV"){
			// readfile("./DOCUMENTOS_MOV/".$nombreDeArchivoDescarga); //C:/xampp2/htdocs/SICON_w/roles/Controller/
			echo '<center>
			<div class="box" >
				<embed src="$nombreDeArchivoDescarga" type="application/pdf" width="65%" height="600px" />
			</div>
			</center>"';
		}
		if($ruta[2] == "DOCUMENTOS_RES"){
			// readfile("./DOCUMENTOS_MOV/".$nombreDeArchivoDescarga); //C:/xampp2/htdocs/SICON_w/roles/Controller/
			echo '<center>
			<div class="box" >
				<embed src="$nombreDeArchivoDescarga" type="application/pdf" width="65%" height="600px" />
			</div>
			</center>"';
		}
		if($ruta[2] == "DOCUMENTOS_BAJAS"){
			readfile("./DOCUMENTOS_BAJAS/".$nombreDeArchivoDescarga); //C:/xampp2/htdocs/SICON_w/roles/Controller/
		}
		// readfile("./DOCUMENTOS/".$nombreDeArchivoDescarga); //C:/xampp2/htdocs/SICON_w/roles/Controller/
		// readfile("./DOC_FOMOPES/".$nombreDeArchivoDescarga); //C:/xampp2/htdocs/SICON_w/roles/Controller/
        // // readfile($nombreDeArchivoDescarga); //C:/xampp2/htdocs/SICON_w/roles/Controller/
		// readfile("./DOCUMENTOS_RES/".$nombreDeArchivoDescarga); //C:/xampp2/htdocs/SICON_w/roles/Controller/
		// readfile("./DOCUMENTOS_PDC/".$nombreDeArchivoDescarga); //C:/xampp2/htdocs/SICON_w/roles/Controller/

	}


?>