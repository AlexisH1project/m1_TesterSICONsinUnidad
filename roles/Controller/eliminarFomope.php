
<?php
	include "configuracion.php";
		//header ('Content-type: text/html; charset=utf-8');
		
		$usuarioSegimiento = $_POST['usuario'];
		$id_rol = $_POST['id_rol'];
		$elBoton = $_POST['accionB'];
		$idFomope = $_POST['noFomope'];

	
	if($elBoton == "Eliminar"){

		$sqlRol = "SELECT * FROM usuarios WHERE usuario = '$usuarioSegimiento'";
		

		        if($resultado3 = mysqli_query($conexion,$sqlRol)){
	        		$row = mysqli_fetch_assoc($resultado3);
					$id_rol1 = $row['id_rol'];
					$unidadC = $row['unidadCorrespondiente'];
					
					}

		$hoy = "select CURDATE()";
		$tiempo ="select curTime()";

			 if ($resultHoy = mysqli_query($conexion,$hoy) AND $resultTime = mysqli_query($conexion,$tiempo)) {
			 		$row = mysqli_fetch_row($resultHoy);
			 		$row2 = mysqli_fetch_row($resultTime);
			 }

	


				$hoy = "select CURDATE()";
				$tiempo ="select curTime()";
					
					
			if ($resultHoy = mysqli_query($conexion,$hoy) AND $resultTime = mysqli_query($conexion,$tiempo)) {
							 		$row = mysqli_fetch_row($resultHoy);
							 		$row2 = mysqli_fetch_row($resultTime);
							 }
				 $sql2 = "INSERT INTO historial (id_movimiento,usuario,fechaMovimiento,horaMovimiento) VALUES ('$idFomope','$usuarioSegimiento','$row[0]','$row2[0]')";
				  if($resultado3 = mysqli_query($conexion,$sql2)){
				  }else{

				  	 echo "Error updating record: " . mysqli_error($conexion);
				  }

				
				$sqlEliminar = "UPDATE fomope SET color_estado = 'rojo' WHERE id_movimiento = '$idFomope'";
		

		        if($resultado3 = mysqli_query($conexion,$sqlEliminar)){
	        		
					
				if($id_rol1 == 2){
 					echo "<script> window.location.href = '../analista.php?usuario_rol=$usuarioSegimiento' </script>";
				}elseif ($id_rol1 == 3) {
								
				  echo "<script>window.location.href = '../capturistaTostado.php?usuario_rol=$usuarioSegimiento'</script>";
				}
				elseif ($id_rol1 == 0 && $unidadC != '') {
								
				  echo "<script>window.location.href = '../unidadCaptura.php?usuario_rol=$usuarioSegimiento'</script>";
				}
				elseif ($id_rol1 == 0 && $unidadC == '' ) {
								
				  echo "<script>window.location.href = '../luluConsulta.php?usuario_rol=$usuarioSegimiento'</script>";
				}
				elseif ($id_rol1 == 1) {
								
				  echo "<script>window.location.href = '../lulu.php?usuario_rol=$usuarioSegimiento'</script>";
				}

				
			}
	}else {
		

}
	

 ?>
	
