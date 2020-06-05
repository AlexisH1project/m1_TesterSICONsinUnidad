<?php

$nombreDeArchivoDescarga = $_POST['nombreDecarga'];

$nombreParaD = explode("_", $nombreDeArchivoDescarga);
echo $nombreDeArchivoDescarga;
//$nombreParaD[0].$nombreParaD[1]."
	header("Content-disposition: attachment; filename=".$nombreParaD[0]."_".$nombreParaD[1].".zip");
	header("Content-type: application/zip");
	readfile("./documentosLoteo/".$nombreDeArchivoDescarga);
	//echo "<script> alert('El proceso de descarga se esta realizando'); window.location.href = '../FiltroDescargar.php'</script>";

?> 