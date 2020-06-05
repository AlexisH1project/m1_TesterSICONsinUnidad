<?php 

		include "configuracion.php";
		//header ('Content-type: text/html; charset=utf-8');
		$rolSegimiento = $_POST['usuarioSeguir'];
		$ur = $_POST['ur'];
		$correoAdmin1 =  $_POST['correoAd1'];
		$correoAdmin2 =  $_POST['correoAd2'];	
		$cc1 = $_POST['cc1'];
		$cc2 = $_POST['cc2'];
		$cc3 = $_POST['cc3'];
		$cc4 = $_POST['cc4'];
		$cc5 = $_POST['cc5'];
		

		$hoy = "select CURDATE()";
		$tiempo ="select curTime()";

			 if ($resultHoy = mysqli_query($conexion,$hoy) AND $resultTime = mysqli_query($conexion,$tiempo)) {
			 		$row = mysqli_fetch_row($resultHoy);
			 		$row2 = mysqli_fetch_row($resultTime);
			 }


			$sqlRol = "SELECT id_rol FROM usuarios WHERE usuario = '$rolSegimiento'";

				if ($result = mysqli_query($conexion,$sqlRol)) {
					$rowRol = mysqli_fetch_row($result);

						$sqlH = "INSERT INTO historial (usuario,fechaMovimiento,horaMovimiento) VALUES ('$rolSegimiento','$row[0]','$row2[0]')";
										$resultH = mysqli_query($conexion,$sqlH);	

					// if($rowRol[0] == '3'){

					// 	$sqlCL = "UPDATE correos_ur SET correoAdmin1 = '$correoAdmin1', correoAdmin2 = '$correoAdmin2', cc1 = '$cc1', cc2 = '$cc2', cc3 = '$cc3',cc4 = '$cc4',cc5 = '$cc5' WHERE UR = '$ur'";
					// 		mysqli_query($conexion,$sqlCL);
	    //            			echo "<script> alert('Correos Actualizados'); window.location.href = '../capturistaTostado.php?usuario_rol=$rolSegimiento'</script>";


					// }else 
				if($rowRol[0] == '2'){
							$sqlCL = "UPDATE correos_ur SET correoAdmin1 = '$correoAdmin1',correoAdmin2 = '$correoAdmin2', cc1 = '$cc1', cc2 = '$cc2', cc3 = '$cc3',cc4 = '$cc4',cc5 = '$cc5' WHERE UR = '$ur'";
							mysqli_query($conexion,$sqlCL);
	               			echo "<script> alert('Correos Actualizados'); window.location.href = '../correosUR.php?usuario_rol=$rolSegimiento'</script>";

					}


				}else {
					echo '<script type="text/javascript">alert("Error en la conexion");</script>';
					echo '<script type="text/javascript">alert("error '. mysqli_error($conexion).'");</script>';
				}

			


		

 ?>