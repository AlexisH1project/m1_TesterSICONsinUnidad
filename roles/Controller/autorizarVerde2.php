<?php 

		include "configuracion.php";
		//header ('Content-type: text/html; charset=utf-8');
		$usuarioEdito = $_POST['userName'];
		$idFomope = $_POST['idFom'];
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


			$sql = "UPDATE fomope SET color_estado='guinda', usuario_name = '$usuarioEdito', fechaEntregaArchivo='$row[0]', fechaAutorizacion = '$row[0] - $usuarioEdito' WHERE id_movimiento = '$idFomope'" ;
			$sql2 = "INSERT historial (id_movimiento,usuario,fechaMovimiento,horaMovimiento) VALUES ($idFomope,'$usuarioEdito','$row[0]','$row2[0]')";

			 if (mysqli_query($conexion,$sql) AND mysqli_query($conexion,$sql2) ) {
				
              		echo "<script> alert('Fomope Autorizado'); window.location.href = '../lulu.php?usuario_rol=$usuarioEdito'</script>";
			

			}else {
				echo '<script type="text/javascript">alert("Error en la conexion");</script>';
				echo '<script type="text/javascript">alert("error '. mysqli_error($conexion).'");</script>';
			}



 ?>