<?php 

		include "configuracion.php";
		//header ('Content-type: text/html; charset=utf-8');
		$usuarioEdito = $_POST['usuario'];
		$idFomope = $_POST['noFomope'];
		$oficio = $_POST['oficio'];
		$recepcion = $_POST['recepcion'];
		$enFirma = $_POST['enFirma'];
		$firmado = $_POST['firmado'];
		$entregaUR = $_POST['entregaUR'];
		$envioPersonal = $_POST['envioPersonal'];
		$archivo = $_POST['archivo'];
		$userSelect = $_POST['user'];
		    $hoy = "select CURDATE()";
		   	$tiempo ="select curTime()";

			 if ($resultHoy = mysqli_query($conexion,$hoy) AND $resultTime = mysqli_query($conexion,$tiempo)) {
			 		$row = mysqli_fetch_row($resultHoy);
			 		$row2 = mysqli_fetch_row($resultTime);
			 }
		 	$queryUser = "SELECT * FROM usuarios WHERE usuario = '$userSelect'";

				if ($userSelect == "autorizado") {
					$colorSee = "guinda";
				}else if($resutUser = mysqli_query($conexion, $queryUser)){
				$rowUser = mysqli_fetch_assoc($resutUser);
				if($rowUser['id_rol'] == 2 || $rowUser['id_rol'] == 3 || $rowUser['id_rol'] == 7){
					$colorSee = "amarillo";
				}else if($rowUser['id_rol'] == 4){
					$colorSee = "azul";
				}else{
					$colorSee = "amarillo0";
				}
				$colorRechazo = "negro_".strval($rowUser['id_rol']);
			}

			$sql = "UPDATE fomope_qr SET color_estado='$colorSee', usuario_modifico = '$usuarioEdito', fechaAutorizacion = '$row[0] - $usuarioEdito', personaAsignada = '$userSelect', oficio = '$oficio', Frecepcion = '$recepcion', Fen_firma = '$enFirma', Ffirmado = '$firmado', Fentrega_ur = '$entregaUR', envio_personal = '$envioPersonal', archivo = '$archivo' WHERE id_movimiento_qr = '$idFomope'" ;

			$sql2 = "INSERT historial_qr (id_movimiento_qr,usuario,fechaMovimiento,horaMovimiento) VALUES ('$idFomope','$usuarioEdito','$row[0]','$row2[0]')";

			$sqlRol = "SELECT id_rol FROM usuarios WHERE usuario = '$usuarioEdito'";
			 if (mysqli_query($conexion,$sql) AND mysqli_query($conexion,$sql2) AND $resR = mysqli_query($conexion,$sqlRol) ){

					$rowRol = mysqli_fetch_row($resR);
					if($rowRol[0] == 1){

              			echo "<script> alert('Fomope Enviado'); window.location.href = '../LuluEventuales.php?usuario_rol=$usuarioEdito'</script>";

					}else{
              			echo "<script> alert('Fomope Enviado'); window.location.href = '../bandejaEventuales.php?usuario_rol=$usuarioEdito'</script>";
					}

			}else {
				echo '<script type="text/javascript">alert("Error en la conexion");</script>';
				echo '<script type="text/javascript">alert("error '. mysqli_error($conexion).'");</script>';
			}



 ?>