<?php 

		include "configuracion.php";
		$Array_IDFomope = $_GET['id_fomope'];
		$userSeguir = $_GET['idSeguir'];
		$idUserAsignado = $_GET['idAsignado'];

		
		$porAutorizar = explode(",", $Array_IDFomope);
		$sqlRol = "SELECT id_rol FROM usuarios WHERE usuario = '$userSeguir'";
		$sqlRolAsign = "SELECT id_rol FROM usuarios WHERE usuario = '$idUserAsignado'";
		$hoy = "select CURDATE()";
		$tiempo ="select curTime()";

			for ($i = 0; $i < count($porAutorizar); $i++) {
				$sql = "SELECT * FROM fomope_qr WHERE id_movimiento_qr = '$porAutorizar[$i]'";

				if($result = mysqli_query($conexion, $sql)){
					$row = mysqli_fetch_assoc($result);
					if($row['estatus'] == "Revisión"){
						if ($resultHoy = mysqli_query($conexion,$hoy) AND $resultTime = mysqli_query($conexion,$tiempo)) {
									 		$fechaH = mysqli_fetch_row($resultHoy);
									 		$horaH = mysqli_fetch_row($resultTime);
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
						}
					}
									 //actulizamos la hora de autorizacion
							$sql2 = "UPDATE fomope_qr SET color_estado = '$colorEstatus', fechaAutorizacion = '$fechaH[0] - $userSeguir' WHERE id_movimiento_qr = '$porAutorizar[$i]'";

							if(mysqli_query($conexion, $sql2)){
								 
									$sqlH = "INSERT INTO historial_qr (id_movimiento_qr,usuario,fechaMovimiento,horaMovimiento) VALUES ('$porAutorizar[$i]','$userSeguir','$fechaH[0]','$horaH[0]')";
										$resultH = mysqli_query($conexion,$sqlH);					
							}else{
									echo '<script type="text/javascript">alert("Error en la conexion");</script>';
									echo '<script type="text/javascript">alert("error '. mysqli_error($conexion).'");</script>';
							}

					}
					
				}else{
						echo '<script type="text/javascript">alert("Error en la conexion");</script>';
						echo '<script type="text/javascript">alert("error '. mysqli_error($conexion).'");</script>';
				}

		}

		if ($resR = mysqli_query($conexion,$sqlRol) ){
			$rowRol = mysqli_fetch_row($resR);
				if($rowRol[0] == 1){
						echo "<script> alert('Autorizacion Correcta'); window.location.href = '../LuluEventuales.php?usuario_rol=$userSeguir'</script>";
					}elseif($rowRol[0] == 2){
						echo "<script> alert('Autorizacion Correcta'); window.location.href = '../analista.php?usuario_rol=$userSeguir'</script>";
					}elseif($rowRol[0] == 3){
						echo "<script> alert('Autorizacion Correcta'); window.location.href = '../capturistaTostado.php?usuario_rol=$userSeguir'</script>";
					}
			
		}
					
		
 ?>