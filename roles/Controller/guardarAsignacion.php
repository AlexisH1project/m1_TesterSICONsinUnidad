<?php 

		include "configuracion.php";
		//header ('Content-type: text/html; charset=utf-8');
		
		$rolSegimiento = $_GET['usuario'];
		$noFomope = $_GET['noFomope'];
		$asignado = $_GET['usuarioAsignado'];
		$hoy = "select CURDATE()";
		$tiempo ="select curTime()";

			 if ($resultHoy = mysqli_query($conexion,$hoy) AND $resultTime = mysqli_query($conexion,$tiempo)) {
			 		$row = mysqli_fetch_row($resultHoy);
			 		$row2 = mysqli_fetch_row($resultTime);
			 }
		
			$sqlRol = "SELECT id_rol FROM usuarios WHERE usuario = '$rolSegimiento'";
				if ($result = mysqli_query($conexion,$sqlRol)) {
					$rowRol = mysqli_fetch_row($result);
					//ingresamos el color al fomope_qr
					if($rowRol[0] == 3 OR $rowRol[0] == 7){
			            $colorFomopeQr="amarillo";
					}
					$sqlH = "INSERT INTO historial (usuario,fechaMovimiento,horaMovimiento) VALUES ('$rolSegimiento','$row[0]','$row2[0]')";
					$resultH = mysqli_query($conexion,$sqlH);	
					if($rowRol[0] == '1'){
						$sqlCL = "UPDATE fomope_qr SET color_estado = 'colorFomopeQr' , usuario_modifico = '$rolSegimiento', personaAsignada = '$asignado', fechaAutorizacion= '$row[0] - $rolSegimiento' WHERE id_movimiento_qr = '$noFomope'";
							if(mysqli_query($conexion,$sqlCL)){
	               				echo "<script> alert('Fomope Actualizado'); window.location.href = '../LuluEventuales.php?usuario_rol=$rolSegimiento'</script>";
							}else{
								echo '<script type="text/javascript">alert("error '. mysqli_error($conexion).'");</script>';
							}
					}else{
						
						echo '<script type="text/javascript">alert("Error en la conexion");</script>';

					}

				}else {
					echo '<script type="text/javascript">alert("Error en la conexion");</script>';
					echo '<script type="text/javascript">alert("error '. mysqli_error($conexion).'");</script>';
				}


 ?>