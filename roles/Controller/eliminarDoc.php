<?php
		$noFomope =  $_POST['idMov'];
		$usuarioSeguir =  $_POST['usuario_rol'];

/*$esGet = 0;
	if(isset($_GET["idMov"])){
						$noFomope =  $_GET['idMov'];
						$esGet = 1;

	}else{
		$noFomope =  $_POST['idMov'];

	}
	if(isset($_GET["usuario_rol"])){ 
		$usuarioSeguir =  $_GET['usuarioSeguir'];
	}else{
		$usuarioSeguir =  $_POST['usuarioSeguir'];

	}*/

$nombreDeArchivoDescarga = $_POST['nombreDoc'];

$tipoArchivo = $_POST['extencionDoc'];
$soloNombre = explode(".", $nombreDeArchivoDescarga);

//echo $nombreDeArchivoDescarga."  ".$tipoArchivo;
//echo $usuarioSeguir."  ".$noFomope;

$dir_subida = './'.$_POST['ruta'].'/';
$dir_subida2 = './DOCUMENTOS_SUPR/';

					echo $dir_subida.$nombreDeArchivoDescarga;
					$concatenarNombreC = $dir_subida2.strtoupper($nombreDeArchivoDescarga);
					copy($dir_subida.$nombreDeArchivoDescarga, $concatenarNombreC);
					unlink($dir_subida.$nombreDeArchivoDescarga);
	
$separarNombreRuta = explode("/", $_POST['ruta']); 

	if($separarNombreRuta[0] == "DOCUMENTOS_MOV"){
		echo "<script> alert('Documento Eliminado'); window.location.href = '../verList.php?usuario_rol=$usuarioSeguir&idMov=$noFomope'</script>";
	}else{
		echo "<script> alert('Documento Eliminado'); window.location.href = '../verListEventuales.php?usuario_rol=$usuarioSeguir&idMov=$noFomope'</script>";
	}

	/*if($esGet == 0){
    	header('Location:../../roles/verList.php?usuario_rol='.$usuarioSeguir.'&idMov='.$noFomope);

	}else{
    	header('Location:../../roles/verList.php?usuario_rol='.urlencode($usuarioSeguir).'&idMov='.urlencode($noFomope));

	}*/

	//echo '<script> window.location.href = "./verList.php?usuario_rol=$usuarioSeguir+&idMov=$noFomope; <\script>';

/*
	if($tipoArchivo == "zip" || $tipoArchivo == "ZIP" || $tipoArchivo == "7z" || $tipoArchivo == "7Z"){
		header("Content-type: application/zip");
        header("Content-Transfer-Encoding: binary");
		readfile("./documentos/".$nombreDeArchivoDescarga); //C:/xampp2/htdocs/SICON_w/roles/Controller/
        readfile("./docFomopes/".$nombreDeArchivoDescarga); //C:/xampp2/htdocs/SICON_w/roles/Controller/

	}else{
		header("Content-type: application/PDF");
		readfile("./documentos/".$nombreDeArchivoDescarga); //C:/xampp2/htdocs/SICON_w/roles/Controller/
		readfile("./docFomopes/".$nombreDeArchivoDescarga); //C:/xampp2/htdocs/SICON_w/roles/Controller/

	}
*/

?>