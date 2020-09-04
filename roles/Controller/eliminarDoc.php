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

		// Arreglo con todos los nombres de los archivos
		$files = array_diff(scandir($dir_subida), array('.', '..')); 

	foreach($files as $file){
	    // Divides en dos el nombre de tu archivo utilizando el . 
	    $data = explode("_",$file);
	    $data2 = explode(".",$file);
		$indice = count($data2);	

		$extencion = $data2[$indice-1];
	    // Nombre del archivo
	    $extractRfc = $data[0];
	    $nameAdj = $data[1];
		//echo "<script> alert(''); </script>";

	    // Extensión del archivo 
	    if($data2[0] == $soloNombre[0]){
			//echo "<script> alert('$idDoc[1]'); </script>";

					$fichero_subido2 = $dir_subida2 . $file;
					$extencion2 = explode(".",$fichero_subido2);
					$tamnio = count($extencion2);
					$extencion3 = $extencion2[$tamnio-1]; //el ".pdf"

					$concatenarNombreC = $dir_subida2.strtoupper($nombreDeArchivoDescarga);
					copy($dir_subida.$file, $concatenarNombreC);
					unlink($dir_subida.$nombreDeArchivoDescarga);
	        		break;
	   	}
	}
	echo "<script> alert('Documento Eliminado'); window.location.href = '../verList.php?usuario_rol=$usuarioSeguir&idMov=$noFomope'</script>";
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