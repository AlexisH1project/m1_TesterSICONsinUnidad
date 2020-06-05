<?php 

		include "configuracion.php";
		//header ('Content-type: text/html; charset=utf-8');
		$usuarioEdito = $_POST['userName'];
		$idFomope = $_POST['idFom'];
		$motivoR = $_POST['comentarioR'];

/*
			$tiempo =  date_default_timezone_set("America/Mexico_City");
			$tiempo =  time();
			$hoy = getdate();*/
			
		    $hoy = "select CURDATE()";
		   	$tiempo ="select curTime()";

		   	if($motivoR == ""){
		              		echo "<script> alert('Es necesario escribir un comentario de Rechazo'); window.location.href = '../verVerde2.php?usuario_rol=$usuarioEdito&id_mov=$idFomope'</script>";

		   	}else{
					 if ($resultHoy = mysqli_query($conexion,$hoy) AND $resultTime = mysqli_query($conexion,$tiempo)) {
					 		$row = mysqli_fetch_row($resultHoy);
					 		$row2 = mysqli_fetch_row($resultTime);
					 }


					$sql = "UPDATE fomope SET color_estado='gris', usuario_name = '$usuarioEdito', 	justificacionRechazo = '$motivoR' WHERE id_movimiento = '$idFomope'" ;

					 $sql2 = "INSERT INTO historial (id_movimiento,usuario,fechaMovimiento,horaMovimiento) VALUES ('$idFomope','$usuarioEdito','$row[0]','$row2[0]')";

					 $sql3 = "INSERT INTO rechazos (id_movimiento,justificacionRechazo,usuario,fechaRechazo) VALUES ('$idFomope','$motivoR','$usuarioEdito','$row[0]')";

					
					 if (mysqli_query($conexion,$sql) AND mysqli_query($conexion,$sql2) AND mysqli_query($conexion,$sql3) ) {
						
		              		echo "<script> alert('Fomope Rechazado'); window.location.href = '../lulu.php?usuario_rol=$usuarioEdito'</script>";
					

					}else {
						echo '<script type="text/javascript">alert("Error en la conexion");</script>';
						echo '<script type="text/javascript">alert("error '. mysqli_error($conexion).'");</script>';
					}
			}


 ?>