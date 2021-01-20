<?php 

		include "configuracion.php";
		//header ('Content-type: text/html; charset=utf-8');
		$rolSegimiento = $_POST['userName'];
		$id_Fom = $_POST['idFom'];

		$fechaRLaboralesAdd =  $_POST['fechaRLaborales'];
		$ofEntregaRLAdd =  $_POST['ofEntregaRL'];
		//$archivoScan = $_POST['ejemplo_archivo_1'];
		$fechaEntregaUnidadAdd = $_POST['fechaEntregaUnidad'];
		$ofEntregaUnidadAdd = $_POST['ofEntregaUnidad'];
		$ofEntregaSeg = $_POST['ofEntrega'];
		$dir_subida = './DOCUMENTOS_MOV/doc70/';

		$hoy = "select CURDATE()";
		$tiempo ="select curTime()";

			 if ($resultHoy = mysqli_query($conexion,$hoy) AND $resultTime = mysqli_query($conexion,$tiempo)) {
			 		$row = mysqli_fetch_row($resultHoy);
			 		$row2 = mysqli_fetch_row($resultTime);
			 }


		$sqlNameArch = "SELECT rfc, id_movimiento, nombre, apellido_1, apellido_2 FROM fomope WHERE id_movimiento = $id_Fom";

			if($result = mysqli_query($conexion,$sqlNameArch)){
				$rfcRow = mysqli_fetch_row($result);

			}

		$hoy = "select CURDATE()";
		$tiempo ="select curTime()";

			 if ($resultHoy = mysqli_query($conexion,$hoy) AND $resultTime = mysqli_query($conexion,$tiempo)) {
			 		$row = mysqli_fetch_row($resultHoy);
			 		$row2 = mysqli_fetch_row($resultTime);
			 }
			 $hora = str_replace ( ":", '',$row2[0] ); 
			 $fecha = str_replace ( "-", '',$row[0] ); 
			// Arreglo con todos los nombres de los archivos
		
		$files = array_diff(scandir($dir_subida), array('.', '..')); 

		$fichero_subido = $dir_subida . basename($_FILES['nameArchivo']['name']);
		$extencion2 = explode(".",$fichero_subido);
		$tamnio = count($extencion2);

		$extencion3 = $extencion2[$tamnio-1];

		if (move_uploaded_file($_FILES['nameArchivo']['tmp_name'], $fichero_subido)) {
			sleep(4);
			rename ($fichero_subido,$dir_subida.$rfcRow[0]."_DOC70_".$rfcRow[4]."_".$rfcRow[3]."_".$rfcRow[2]."_".$fecha.$hora."_".$id_Fom."_.pdf");
			
				
		}else {
			if ($result = mysqli_query($conexion,$sqlRol)) {
				$rowRol = mysqli_fetch_row($result);

		   		if($rowRol[0] == '0'){
               			echo "<script> alert('Existe un error al guardar el archivo'); window.location.href = '../verdeLulu.php?usuario_rol=$rolSegimiento'</script>";
				}else if($rowRol[0] == '1'){
               			echo "<script> alert('Existe un error al guardar el archivo'); window.location.href = '../verdeLulu.php?usuario_rol=$rolSegimiento'</script>";
				}
			}
		}

		if($fechaRLaboralesAdd <= $row[0] AND $fechaEntregaUnidadAdd <= $row[0]){

			$sqlRol = "SELECT id_rol FROM usuarios WHERE usuario = '$rolSegimiento'";


				if ($result = mysqli_query($conexion,$sqlRol)) {
					$rowRol = mysqli_fetch_row($result);
					$sqlH = "INSERT INTO historial (usuario,fechaMovimiento,horaMovimiento) VALUES ('$rolSegimiento','$row[0]','$row2[0]')";
										$resultH = mysqli_query($conexion,$sqlH);	
					if($rowRol[0] == '0'){

						$sqlCL = "UPDATE fomope SET color_estado='verde2',usuario_name='$rolSegimiento', oficioEntrega = '$ofEntregaSeg',fechaEntregaRLaborales='$fechaRLaboralesAdd',OfEntregaRLaborales='$ofEntregaRLAdd',fechaEntregaUnidad = '$fechaEntregaUnidadAdd',OfEntregaUnidad='$ofEntregaUnidadAdd', fechaCaptura= '$row[0] - $rolSegimiento' WHERE id_movimiento = '$id_Fom'";
							mysqli_query($conexion,$sqlCL);
	               			echo "<script> alert('Fomope Actualizado'); window.location.href = '../luluConsulta.php?usuario_rol=$rolSegimiento'</script>";


					}else if($rowRol[0] == '1'){
							$sqlL = "UPDATE fomope SET color_estado='guinda',usuario_name='$rolSegimiento', oficioEntrega = '$ofEntregaSeg', fechaEntregaRLaborales='$fechaRLaboralesAdd',OfEntregaRLaborales='$ofEntregaRLAdd',fechaEntregaUnidad = '$fechaEntregaUnidadAdd',OfEntregaUnidad='$ofEntregaUnidadAdd', fechaAutorizacion= '$row[0] - $rolSegimiento' WHERE id_movimiento = '$id_Fom'";
							mysqli_query($conexion,$sqlL);
	               			echo "<script> alert('Fomope Actualizado'); window.location.href = '../lulu.php?usuario_rol=$rolSegimiento'</script>";

					}

				}else {
					echo '<script type="text/javascript">alert("Error en la conexion");</script>';
					echo '<script type="text/javascript">alert("error '. mysqli_error($conexion).'");</script>';
				}

			}else{
			 		echo "<script> alert('La fecha no puede ser mayor a la actual'); window.location.href = '../verdeLulu.php?usuario_rol=$rolSegimiento&id_mov=$id_Fom'</script>";
			}


		

 ?>