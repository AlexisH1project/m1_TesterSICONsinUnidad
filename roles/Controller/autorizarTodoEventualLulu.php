<?php 

		include "configuracion.php";
		$Array_IDFomope = $_GET['id_fomope'];
		$userSeguir = $_GET['idSeguir'];
		$capturista = $_GET['capturista'];

		$porAutorizar = explode(",", $Array_IDFomope);

		 $hoy = "select CURDATE()";
		 $tiempo ="select curTime()";

			


			for ($i = 0; $i < count($porAutorizar); $i++) {
				$sql = "SELECT color_estado FROM fomope_qr WHERE id_movimiento_qr = '$porAutorizar[$i]'";

				if($result = mysqli_query($conexion, $sql)){
					$row = mysqli_fetch_row($result);
					if($row[0] == "amarillo0"){
							if ($resultHoy = mysqli_query($conexion,$hoy) AND $resultTime = mysqli_query($conexion,$tiempo)) {
									 		$fechaH = mysqli_fetch_row($resultHoy);
									 		$horaH = mysqli_fetch_row($resultTime);
									 }
									$sql2 = "UPDATE fomope_qr SET color_estado = 'azul', usuario_modifico = '$userSeguir', fechaAutorizacion = '$fechaH[0] - $userSeguir' WHERE id_movimiento_qr = '$porAutorizar[$i]'";

							if(mysqli_query($conexion, $sql2)){
								 
									$sqlH = "INSERT INTO historial_qr (id_movimiento_qr,usuario,fechaMovimiento,horaMovimiento) VALUES ('$porAutorizar[$i]','$userSeguir','$fechaH[0]','$horaH[0]')";
										$resultH = mysqli_query($conexion,$sqlH);					
							}else{
									echo '<script type="text/javascript">alert("Error en la conexion");</script>';
									echo '<script type="text/javascript">alert("error '. mysqli_error($conexion).'");</script>';
							}

					}else if($row[0] == "verde2"){
								if ($resultHoy = mysqli_query($conexion,$hoy) AND $resultTime = mysqli_query($conexion,$tiempo)) {
										 		$fechaH = mysqli_fetch_row($resultHoy);
										 		$horaH = mysqli_fetch_row($resultTime);
												$sql2 = "UPDATE fomope_qr SET color_estado = 'guinda', usuario_modifico = '$userSeguir', fechaAutorizacion = '$fechaH[0] - $userSeguir' WHERE id_movimiento_qr = '$porAutorizar[$i]'";

								if(mysqli_query($conexion, $sql2)){
									 
										$sqlH = "INSERT INTO historial_qr (id_movimiento_qr,usuario,fechaMovimiento,horaMovimiento) VALUES ('$porAutorizar[$i]','$userSeguir','$fechaH[0]','$horaH[0]')";
											$resultH = mysqli_query($conexion,$sqlH);					
								}else{
										echo '<script type="text/javascript">alert("Error en la conexion");</script>';
										echo '<script type="text/javascript">alert("error '. mysqli_error($conexion).'");</script>';
								}	
							 }

							}
					
				}else{
						echo '<script type="text/javascript">alert("Error en la conexion");</script>';
						echo '<script type="text/javascript">alert("error '. mysqli_error($conexion).'");</script>';
				}

		}

		              		echo "<script> alert('Autorizacion Correcta'); window.location.href = '../luluEventuales.php?usuario_rol=$userSeguir'</script>";



 ?>