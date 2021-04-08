<?php 

		include "configuracion.php";
		//header ('Content-type: text/html; charset=utf-8');
		$usuarioEdito = $_POST['usuario'];
		$idFomope = $_POST['noFomope'];
		$idUserAsignado = $_POST['user'];

		$consecutivoMP = $_POST['consema'];
		$fechaEnvSPC = $_POST['fechenvvb'];
		$fechaReciDSPO = $_POST['fecharecdspo'];
		$folio = $_POST['foliospc'];

			$sqlRolAsign = "SELECT id_rol FROM usuarios WHERE usuario = '$idUserAsignado'";
		    $hoy = "select CURDATE()";
		   	$tiempo ="select curTime()";

			 if ($resultHoy = mysqli_query($conexion,$hoy) AND $resultTime = mysqli_query($conexion,$tiempo)) {
			 		$row = mysqli_fetch_row($resultHoy);
			 		$row2 = mysqli_fetch_row($resultTime);
			 }

		if ($resRA = mysqli_query($conexion,$sqlRolAsign) ){
				$rowRolA = mysqli_fetch_row($resRA);
				
			if($rowRolA[0] == 1 || $rowRolA[0] == 0){
				$colorEstatus = "amarillo0";
			}elseif($rowRolA[0] == 2){
				$colorEstatus = "cafe";
			}elseif($rowRolA[0] == 3){
				$colorEstatus = "amarillo";
			}elseif($rowRolA[0] == 4){
				$colorEstatus = "guinda";
			}elseif($idUserAsignado == "aceptar" || $idUserAsignado == "autorizar"){
					$colorEstatus = "guinda";
					// $idUserAsignado = 
				}
		}
			 
			$sql = "UPDATE fomope_qr SET color_estado='$colorEstatus', usuario_modifico = '$usuarioEdito', fechaAutorizacion = '$row[0] - $usuarioEdito', personaAsignada = '$idUserAsignado', consecutivoMaestroPuestos = '$consecutivoMP', fechaEnvioSpc = '$fechaEnvSPC', fechaReciboDspo = '$fechaReciDSPO', folioSpc = '$folio' WHERE id_movimiento_qr = '$idFomope'" ;

			$sql2 = "INSERT historial_qr (id_movimiento_qr,usuario,fechaMovimiento,horaMovimiento) VALUES ('$idFomope','$usuarioEdito','$row[0]','$row2[0]')";

			$sqlRol = "SELECT id_rol FROM usuarios WHERE usuario = '$usuarioEdito'";

			 if (mysqli_query($conexion,$sql) AND mysqli_query($conexion,$sql2) AND $resR = mysqli_query($conexion,$sqlRol) ){

					$rowRol = mysqli_fetch_row($resR);
					if($rowRol[0] == 1){
							echo "<script> alert('Autorizacion Correcta'); window.location.href = '../LuluEventuales.php?usuario_rol=$usuarioEdito'</script>";
					}elseif($rowRol[0] == 2){
						echo "<script> alert('Autorizacion Correcta'); window.location.href = '../analista.php?usuario_rol=$usuarioEdito'</script>";
					}elseif($rowRol[0] == 3){
						echo "<script> alert('Autorizacion Correcta'); window.location.href = '../capturistaTostado.php?usuario_rol=$usuarioEdito'</script>";
					}
					// else{
              		// 	echo "<script> alert('Fomope Enviado'); window.location.href = '../bandejaEventuales.php?usuario_rol=$usuarioEdito'</script>";
					// }

			}else {
				echo '<script type="text/javascript">alert("Error en la conexion");</script>';
				echo '<script type="text/javascript">alert("error '. mysqli_error($conexion).'");</script>';
			}



 ?>