<?php 

		include "configuracion.php";
		$Array_IDFomope = $_GET['id_fomope'];
		$userSeguir = $_GET['idSeguir'];

		$porAutorizar = explode(",", $Array_IDFomope);

		 $hoy = "select CURDATE()";
		   	$tiempo ="select curTime()";

			


			for ($i = 0; $i < count($porAutorizar); $i++) {
				$sql = "SELECT color_estado FROM fomope_qr WHERE id_movimiento_qr = '$porAutorizar[$i]'";

				if($result = mysqli_query($conexion, $sql)){
					$row = mysqli_fetch_assoc($result);
					if($row[] == "cafe"){
						if ($resultHoy = mysqli_query($conexion,$hoy) AND $resultTime = mysqli_query($conexion,$tiempo)) {
									 		$fechaH = mysqli_fetch_row($resultHoy);
									 		$horaH = mysqli_fetch_row($resultTime);
									 }
									 //actulizamos la hora de autorizacion
							$sql2 = "UPDATE fomope SET color_estado = 'naranja', usuario_name = '$userSeguir', fechaAutorizacion = '$fechaH[0] - $userSeguir' WHERE id_movimiento = '$porAutorizar[$i]'";

							if(mysqli_query($conexion, $sql2)){
								 
									$sqlH = "INSERT INTO historial (id_movimiento,usuario,fechaMovimiento,horaMovimiento) VALUES ('$porAutorizar[$i]','$userSeguir','$fechaH[0]','$horaH[0]')";
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

		              		echo "<script> alert('Autorizacion Correcta'); window.location.href = '../analista.php?usuario_rol=$userSeguir'</script>";



 ?>