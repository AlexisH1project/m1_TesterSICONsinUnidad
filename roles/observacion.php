<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
	    include "configuracion.php";

		$noFomope = $_POST['noFomope'];
		$idRol = $_POST['id_rol'];
		$usuario = $_POST['usuarioSeguir'];
		$observacion = $_POST['obs'];


		/*echo $observacion;
		echo $idRol;
		
		echo $noFomope;	*/

	if(($observacion == "" AND $idRol == 2) OR ($observacion == "" AND $idRol == 3)){
		              		echo "<script> alert('Es necesario escribir un comentario de Rechazo'); window.location.href = './form_FOMOPEAnalista.php?noFomope=$noFomope&usuario=$usuario&id_rol=$idRol'</script>";

	}else if($observacion == "" AND $idRol == 4) {
		   			echo "<script> alert('Es necesario escribir un comentario de Rechazo'); window.location.href = './autorizaDario.php?noFomope=$noFomope&usuario=$usuario&id_rol=$idRol'</script>";
	}else{


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
		$hoy = "select CURDATE()";
		   	//$tiempo ="select curTime()";

			 if ($resultHoy = mysqli_query($conexion,$hoy)) {
			 		$row = mysqli_fetch_row($resultHoy);
			 		
			 }
	/*
	Detecto su id Rol verdadero que se le asigana desde la BD
		--> vuelvo a detectar el rol porque me parese que estamanejando unos que no me cuadran 
	*/

	$sqlRolReal = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
	if($sIsqlRolReal = mysqli_query($conexion,$sqlRolReal)){
		$roWsqlRolReal = mysqli_fetch_row($sIsqlRolReal);

		if($roWsqlRolReal[2] == 2){
			$sqlUpColor = "UPDATE fomope SET color_estado  = 'negro1', usuario_name = '$usuario', justificacionRechazo = '$observacion', fechaAutorizacion = '$row[0] - $usuario', fechaCaptura = 'En espera de Captura'  WHERE id_movimiento = '$noFomope'";
		}else if($roWsqlRolReal[2] == 3){
			$sqlUpColor = "UPDATE fomope SET color_estado  = 'negro1', usuario_name = '$usuario', justificacionRechazo = '$observacion', fechaCaptura = '$row[0] - $usuario', fechaAutorizacion = 'En espera de autorización'  WHERE id_movimiento = '$noFomope'";

		}else if($roWsqlRolReal[2] == 4){
			$sqlUpColor = "UPDATE fomope SET color_estado  = 'negro1', usuario_name = '$usuario', justificacionRechazo = '$observacion', fechaCaptura = '$row[0] - $usuario', fechaAutorizacion = 'En espera de autorización'  WHERE id_movimiento = '$noFomope'";

		}else if($roWsqlRolReal[2] == 7){
			$sqlUpColor = "UPDATE fomope SET color_estado  = 'negroB', usuario_name = '$usuario', justificacionRechazo = '$observacion', fechaCaptura = '$row[0] - $usuario', fechaAutorizacion = 'En espera de autorización'  WHERE id_movimiento = '$noFomope'";
		}
	}else{
		 echo "<script> alert('error en la BD'); ";//'$usuario

	}

		$sql = "INSERT INTO rechazos (id_movimiento, justificacionRechazo, usuario, fechaRechazo) VALUES ('$noFomope.', '$observacion', '$usuario', '$row[0]')";

		
		// $sql = 'UPDATE fomopesactivos SET estadoFomope  = 0 WHERE id_fomope='.$noFomope;
		
		if (mysqli_query($conexion,$sql) AND mysqli_query($conexion,$sqlUpColor)) {
					if($roWsqlRolReal[2] == 7){
						echo "<script> alert('el rechazo fue registrado'); window.location.href = './bandejaBajas.php?usuario_rol=$usuario'</script>";//'$usuario
					}else if($idRol == 4){
			         	 echo "<script> alert('el rechazo fue registrado'); window.location.href = './dario.php?usuario_rol=$usuario'</script>";//'$usuario
					}else if($idRol == 3){
			          echo "<script> alert('el rechazo fue registrado'); window.location.href = './analista.php?usuario_rol=$usuario'</script>";//'$usuario
					}  
		} else {
			echo '<script type="text/javascript">alert("error '. mysqli_error($conexion).'");</script>';
		}
	}

		// echo $conexion->insert_id;

?>

</body>
</html>
