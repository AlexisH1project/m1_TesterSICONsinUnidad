<?php 

		include "configuracion.php";
		//header ('Content-type: text/html; charset=utf-8');
		$usuarioEdito = $_GET['usuario'];
		$idFomope = $_GET['noFomope'];
/*
			$tiempo =  date_default_timezone_set("America/Mexico_City");
			$tiempo =  time();
			$hoy = getdate();*/
			
		    $hoy = "select CURDATE()";
		   	$tiempo ="select curTime()";

			 if ($resultHoy = mysqli_query($conexion,$hoy) AND $resultTime = mysqli_query($conexion,$tiempo)) {
			 		$row = mysqli_fetch_row($resultHoy);
			 		$row2 = mysqli_fetch_row($resultTime);
			 }
			 
			$sql = "UPDATE fomope SET color_estado='verde', usuario_name = '$usuarioEdito', fechaAutorizacion = '$row[0] - $usuarioEdito' WHERE id_movimiento = '$idFomope'" ;

			$sql2 = "INSERT historial (id_movimiento,usuario,fechaMovimiento,horaMovimiento) VALUES ('$idFomope','$usuarioEdito','$row[0]','$row2[0]')";

			$sqlRol = "SELECT id_rol FROM usuarios WHERE usuario = '$usuarioEdito'";

			 if (mysqli_query($conexion,$sql) AND mysqli_query($conexion,$sql2) AND $resR = mysqli_query($conexion,$sqlRol) ){

					$rowRol = mysqli_fetch_row($resR);
					if($rowRol[0] == "2"){

              			echo "<script> alert('Fomope Actualizado'); window.location.href = '../analista.php?usuario_rol=$usuarioEdito'</script>";

					}else if($rowRol[0] == "3"){
              			echo "<script> alert('Fomope Actualizado'); window.location.href = '../capturistaTostado.php?usuario_rol=$usuarioEdito'</script>";


					}

			

			}else {
				echo '<script type="text/javascript">alert("Error en la conexion");</script>';
				echo '<script type="text/javascript">alert("error '. mysqli_error($conexion).'");</script>';
			}



 ?>