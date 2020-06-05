<?php 
    include "configuracion.php";

	$noFomope = $_POST['noFomope'];
	//echo $noFomope;
	$idRol = $_POST['id_rol'];
	//echo $idRol;
		$usuario = $_POST['usuarioSeguir'];
		//echo $usuario;
		$color_es = $_POST['color_esta'];
	
		if($idRol == 3){
			
					$hoy = "select CURDATE()";
					$tiempo ="select curTime()";
						
							
					if ($resultHoy = mysqli_query($conexion,$hoy) AND $resultTime = mysqli_query($conexion,$tiempo)) {
									 		$row = mysqli_fetch_row($resultHoy);
									 		$row2 = mysqli_fetch_row($resultTime);
									 }
						 	$sql = "UPDATE fomope SET color_estado  = 'naranja', usuario_name = '$usuario', fechaEnviadaRubricaDspo = '$row[0]', fechaAutorizacion = '$row[0] - $usuario'  WHERE id_movimiento= '$noFomope'";
					 	

							$hoy = "select CURDATE()";
							$tiempo ="select curTime()";
								
									
							if ($resultHoy = mysqli_query($conexion,$hoy) AND $resultTime = mysqli_query($conexion,$tiempo)) {
											 		$row = mysqli_fetch_row($resultHoy);
											 		$row2 = mysqli_fetch_row($resultTime);
											 }
								 $sql2 = "INSERT INTO historial (id_movimiento,usuario,fechaMovimiento,horaMovimiento) VALUES ('$noFomope','$usuario','$row[0]','$row2[0]')";

								if (mysqli_query($conexion,$sql2)) {
							    	
							          //echo "<script> alert('Fomope rechazado'); window.location.href = './analista.php?usuario_rol='$usuario'</script>";//'$usuario


								} else {
								    //echo "Error updating record: " . mysqli_error($conexion);
								    echo '<script type="text/javascript">alert("error '. mysqli_error($conexion).'");</script>';
								}
							
							if (mysqli_query($conexion,$sql)) {
          							echo "<script> alert('Fomope autorizado'); window.location.href = './analista.php?usuario_rol=$usuario'</script>";//'$usuario
						    	
										

							} else {
							    echo "Error updating record: " . mysqli_error($conexion);
							}

					}else if ($idRol == 4 && $color_es == 'naranja') {
						$hoy = "select CURDATE()";
							$tiempo ="select curTime()";
								
									
							if ($resultHoy = mysqli_query($conexion,$hoy) AND $resultTime = mysqli_query($conexion,$tiempo)) {
											 		$row = mysqli_fetch_row($resultHoy);
											 		$row2 = mysqli_fetch_row($resultTime);
											 }
						 $sql = "UPDATE fomope SET color_estado  = 'azul', usuario_name = '$usuario',  fechaAutorizacion = '$row[0] - $usuario' WHERE id_movimiento= '$noFomope'";
							$hoy = "select CURDATE()";
							$tiempo ="select curTime()";
								
									
							if ($resultHoy = mysqli_query($conexion,$hoy) AND $resultTime = mysqli_query($conexion,$tiempo)) {
											 		$row = mysqli_fetch_row($resultHoy);
											 		$row2 = mysqli_fetch_row($resultTime);
											 }
								 $sql2 = "INSERT INTO historial (id_movimiento,usuario,fechaMovimiento,horaMovimiento) VALUES ('$noFomope','$usuario','$row[0]','$row2[0]')";

								if (mysqli_query($conexion,$sql2)) {
							    	
							          //echo "<script> alert('Fomope rechazado'); window.location.href = './analista.php?usuario_rol='$usuario'</script>";//'$usuario


								} else {
								    //echo "Error updating record: " . mysqli_error($conexion);
								    echo '<script type="text/javascript">alert("error '. mysqli_error($conexion).'");</script>';
								}
							
							if (mysqli_query($conexion,$sql)) {
          							echo "<script> alert('Fomope autorizado'); window.location.href = './dario.php?usuario_rol=$usuario'</script>";//'$usuario
						    	
										

							} else {
							    echo "Error updating record: " . mysqli_error($conexion);
							}
					}else if ($idRol == 4 && $color_es == 'azul') {
						$hoy = "select CURDATE()";
							$tiempo ="select curTime()";
								
									
							if ($resultHoy = mysqli_query($conexion,$hoy) AND $resultTime = mysqli_query($conexion,$tiempo)) {
											 		$row = mysqli_fetch_row($resultHoy);
											 		$row2 = mysqli_fetch_row($resultTime);
											 }
						 $sql = "UPDATE fomope SET color_estado  = 'rosa', usuario_name = '$usuario',  fechaAutorizacion = '$row[0] - $usuario' WHERE id_movimiento= '$noFomope'";
						 
							$hoy = "select CURDATE()";
							$tiempo ="select curTime()";
								
									
							if ($resultHoy = mysqli_query($conexion,$hoy) AND $resultTime = mysqli_query($conexion,$tiempo)) {
											 		$row = mysqli_fetch_row($resultHoy);
											 		$row2 = mysqli_fetch_row($resultTime);
											 }
								 $sql2 = "INSERT INTO historial (id_movimiento,usuario,fechaMovimiento,horaMovimiento) VALUES ('$noFomope','$usuario','$row[0]','$row2[0]')";

								if (mysqli_query($conexion,$sql2)) {
							    	
							          //echo "<script> alert('Fomope rechazado'); window.location.href = './analista.php?usuario_rol='$usuario'</script>";//'$usuario


								} else {
								    //echo "Error updating record: " . mysqli_error($conexion);
								    echo '<script type="text/javascript">alert("error '. mysqli_error($conexion).'");</script>';
								}
							
							if (mysqli_query($conexion,$sql)) {
          							echo "<script> alert('Fomope autorizado'); window.location.href = './dario.php?usuario_rol=$usuario'</script>";//'$usuario
						    	
										

							} else {
							    echo "Error updating record: " . mysqli_error($conexion);
							}
					}
?>