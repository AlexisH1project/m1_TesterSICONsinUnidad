<?php 

		include "configuracion.php";
		//header ('Content-type: text/html; charset=utf-8');
		$rolSegimiento = $_POST['usuario'];
		$id_Fom = $_POST['noFomope'];
		$elRol =  $_POST['id_rol'];
		$motivoR = $_POST['comentarioR'];

	

		$sqlNameArch = "SELECT rfc, id_movimiento FROM fomope WHERE id_movimiento = $id_Fom";

			if($result = mysqli_query($conexion,$sqlNameArch)){
				$rfcRow = mysqli_fetch_row($result);

			}
			// Arreglo con todos los nombres de los archivos
		if($motivoR == ""){
				echo "<script> alert('Es necesario escribir un cometario'); window.location.href = '../form_FOMOPE.php?usuario=$rolSegimiento&noFomope=$id_Fom&id_rol=$elRol'</script>";
		}else{
				$hoy = "select CURDATE()";
				$tiempo ="select curTime()";

			 if ($resultHoy = mysqli_query($conexion,$hoy) AND $resultTime = mysqli_query($conexion,$tiempo)) {
			 		$row = mysqli_fetch_row($resultHoy);
			 		$row2 = mysqli_fetch_row($resultTime);
			 }
				$sqlH = "INSERT INTO historial (usuario,fechaMovimiento,horaMovimiento) VALUES ('$rolSegimiento','$row[0]','$row2[0]')";
				$resultH = mysqli_query($conexion,$sqlH);	
					if($elRol == '2'){
						$sqlT = "UPDATE fomope SET color_estado='negro',usuario_name='$rolSegimiento',	justificacionRechazo= 'Rechazado por: $rolSegimiento  -  $motivoR', fechaCaptura= '$row[0] - $rolSegimiento' WHERE id_movimiento = '$id_Fom'";
							mysqli_query($conexion,$sqlT);
	               			echo "<script> alert('Fomope Rechazado'); window.location.href = '../analista.php?usuario_rol=$rolSegimiento'</script>";
					}else if($elRol == '3'){
							$sqlCT = "UPDATE fomope SET color_estado='negro',usuario_name='$rolSegimiento',	justificacionRechazo= 'Rechazado por: $rolSegimiento  -  $motivoR', fechaCaptura= '$row[0] - $rolSegimiento' WHERE id_movimiento = '$id_Fom'";
							mysqli_query($conexion,$sqlCT);
	               			echo "<script> alert('Fomope Rechazado'); window.location.href = '../capturistaTostado.php?usuario_rol=$rolSegimiento'</script>";

					}
					 $sqlRech = "INSERT INTO rechazos (id_movimiento,justificacionRechazo,usuario,fechaRechazo) VALUES ($id_Fom,'$motivoR','$rolSegimiento','$row[0]')";
					 mysqli_query($conexion,$sqlRech);
		}
		
 ?>