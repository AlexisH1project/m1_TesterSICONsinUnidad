<?php 
		include "configuracion.php";
		$Array_IDFomope = $_GET['idMov'];
		$usuarioSeguir = $_GET['usuario_rol'];
		$porAutorizar = explode(",", $Array_IDFomope);

		$hoy = "select CURDATE()";
		$tiempo ="select curTime()";
		
		if ($resultHoy = mysqli_query($conexion,$hoy) AND $resultTime = mysqli_query($conexion,$tiempo)) {
			$row = mysqli_fetch_row($resultHoy);
			$row2 = mysqli_fetch_row($resultTime);
			
			$hora = str_replace ( ":", '',$row2[0] ); 
			$fecha = str_replace ( "-", '',$row[0] ); 
		}
		$nameDoc = "registroQR_".$fecha.$hora."_ingreso.txt";	
		$nameDoc2 = "registroQR_".$fecha.$hora."_reingreso.txt";	
		$creaArchivo = fopen("txt/".$nameDoc2, "a");
		$creaArchivo2 = fopen("txt/".$nameDoc, "a");
		$file = fopen("txt/".$nameDoc2, "w");
		$file2 = fopen("txt/".$nameDoc, "w");

		$banderaDoc = 0;
		$banderaDoc2 = 0;

			for ($i = 0; $i < count($porAutorizar); $i++) {
				$sql = "SELECT * FROM fomope_qr WHERE id_movimiento_qr =". $porAutorizar[$i];
				if($result = mysqli_query($conexion, $sql)){
					$registros = mysqli_fetch_assoc($result);
					$sqlUpdate = "UPDATE fomope_qr SET enNomina = 1, fechaAutorizacion = '$row[0] - $usuarioSeguir' WHERE id_movimiento_qr = '$porAutorizar[$i]'";
					if(intval($registros['tipo_movimiento']) >= 4300 AND intval($registros['tipo_movimiento']) <= 5000){
						 //reingreso 
						fwrite($file, $registros['tex_con']);
						// echo $registros['tex_con'];
						// fclose($file);
						$banderaDoc = 1;
						$nameDescargar = $nameDoc2;
					}else{
						// 	$file = fopen("txt/".$nameDoc, "w");
						fwrite($file2, $registros['tex_con']);
						$banderaDoc2 = 2;
						$nameDescargar = $nameDoc;
					// 	fclose($file);
					// 	// echo $registros['tex_con'];
					}
					//actulizamos la hora de autorizacion nomina 
					if(mysqli_query($conexion, $sqlUpdate)){
							$sqlH = "INSERT INTO historial_qr (id_movimiento_qr,usuario,fechaMovimiento,horaMovimiento) VALUES ('$porAutorizar[$i]','$usuarioSeguir','$row[0]','$row2[0]')";
							$resultH = mysqli_query($conexion,$sqlH);					
					}else{
							echo '<script type="text/javascript">alert("Error en la conexion");</script>';
							echo '<script type="text/javascript">alert("error '. mysqli_error($conexion).'");</script>';
					}
				}else{
						echo '<script type="text/javascript">alert("Error en la conexion");</script>';
						echo '<script type="text/javascript">alert("error '. mysqli_error($conexion).'");</script>';
				}
		}
		fclose($file);
		fclose($file2);

	if($banderaDoc2 == 2 AND $banderaDoc == 1){
		$zip = new ZipArchive();
		// Ruta absoluta
		$nombreArchivoZip = "./txt/registrosQR.zip";

		if (!$zip->open($nombreArchivoZip, ZipArchive::CREATE | ZipArchive::OVERWRITE)) {
			exit("Error abriendo ZIP en $nombreArchivoZip");
		}
		// Si no hubo problemas, continuamos
		$rutaAbsoluta1 = "./txt/".$nameDoc;
		$rutaAbsoluta2 = "./txt/".$nameDoc2;
		// Su nombre resumido, algo como "script.js"
		$zip->addFile($rutaAbsoluta1, $nameDoc.".txt");
		$zip->addFile($rutaAbsoluta2, $nameDoc2.".txt");
	
		$nombreAmigable = "registrosQR_".$fecha.".zip";
		header('Content-Type: application/octet-stream');
		header("Content-Transfer-Encoding: Binary");
		header("Content-disposition: attachment; filename=$nombreAmigable");
		// Leer el contenido binario del zip y enviarlo
		readfile($nombreArchivoZip);	
		exit;
		// unlink($nombreArchivoZip);
		unlink($rutaAbsoluta1);
		unlink($rutaAbsoluta2);
		
	}else{
		header('Content-Description: File Transfer');
		header("Content-Disposition: attachment; filename= $nameDescargar");
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length: ' . filesize("./txt/" . $nameDescargar));
		header("Content-Type: text/plain");
		readfile('./txt/' . $nameDescargar);
		exit;
			if($banderaDoc2 == 2){
					unlink('./txt/' . $nameDoc);
			}elseif($banderaDoc == 1){
				unlink('./txt/' . $nameDoc2);
			}
	}

 ?>
