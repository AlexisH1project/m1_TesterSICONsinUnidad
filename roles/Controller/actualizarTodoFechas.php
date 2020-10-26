<?php 
		include "configuracion.php";
		$Array_IDFomope = $_GET['id_fomope'];
		$userSeguir = $_GET['idSeguir'];
		$nombreTabla = $_GET['tabBD'];
		// $userSeguir = $_GET['idSeguir'];
		$porAutorizar = explode(",", $Array_IDFomope);
			for ($i = 0; $i < count($porAutorizar); $i++) {
						$banderaSinDatos = 0;
						$sqlExtraerF = "SELECT * FROM fomope WHERE id_movimiento = '$porAutorizar[$i]'";
						$resSqlExtraerF	= mysqli_query($conexion, $sqlExtraerF);
						$rowSqlExtraerF	= mysqli_fetch_row($resSqlExtraerF);
						if ($nombreTabla == "fomope") {
							$fechaValidacion = $_GET['Fvalidacion'];
							$fechaLabores = $_GET['Flab'];
							$fechaUr = $_GET['Fur'];

							if($fechaValidacion == ""){
								$sql2 = "UPDATE fomope SET  fechaValidacionPersonal = '$rowSqlExtraerF[125]' WHERE id_movimiento = '$porAutorizar[$i]'";
								mysqli_query($conexion, $sql2);	
							}else{
								$sql2 = "UPDATE fomope SET  fechaValidacionPersonal = '$fechaValidacion' WHERE id_movimiento = '$porAutorizar[$i]'";
								mysqli_query($conexion, $sql2);	
							}
							if ($fechaLabores == "") {
								$sql2 = "UPDATE fomope SET fechaEntregaRLaborales = '$rowSqlExtraerF[39]' WHERE id_movimiento = '$porAutorizar[$i]'";
								mysqli_query($conexion, $sql2);
							}else {
								$sql2 = "UPDATE fomope SET fechaEntregaRLaborales = '$fechaLabores' WHERE id_movimiento = '$porAutorizar[$i]'";
								mysqli_query($conexion, $sql2);
							}
							if ($fechaUr == "") {
								$sql2 = "UPDATE fomope SET fechaEntregaUnidad = '$rowSqlExtraerF[42]' WHERE id_movimiento = '$porAutorizar[$i]'";
								mysqli_query($conexion, $sql2);
							}else {
								$sql2 = "UPDATE fomope SET fechaEntregaUnidad = '$fechaUr' WHERE id_movimiento = '$porAutorizar[$i]'";
								mysqli_query($conexion, $sql2);
							}
						}else {
							$enFirma = $_GET['FenFirma']; // ***** 1
							$fPersonal = $_GET['Fpersonla']; // ***** 2
							$fFirmado = $_GET['Ffirmado']; // ***** 3
							$fechaUr = $_GET['Fur']; // ***** 4
							$fRecepcion = $_GET['Frecepcion']; // ***** 5

							$sqlExtraerF = "SELECT * FROM fomope_qr WHERE id_movimiento_qr = '$porAutorizar[$i]'";
							$resSqlExtraerF	= mysqli_query($conexion, $sqlExtraerF);
							$rowSqlExtraerF	= mysqli_fetch_row($resSqlExtraerF);
							if($enFirma == ""){    // **** 1
								$sql2 = "UPDATE fomope_qr SET  Fen_firma = '$rowSqlExtraerF[54]' WHERE id_movimiento_qr = '$porAutorizar[$i]'";
								mysqli_query($conexion, $sql2);	
							}else{
								$sql2 = "UPDATE fomope_qr SET  Fen_firma = '$enFirma' WHERE id_movimiento_qr = '$porAutorizar[$i]'";
								mysqli_query($conexion, $sql2);	
							}
							if ($fPersonal == "") {  // ***** 2
								$sql2 = "UPDATE fomope_qr SET envio_personal = '$rowSqlExtraerF[57]' WHERE id_movimiento_qr = '$porAutorizar[$i]'";
								mysqli_query($conexion, $sql2);
							}else {
								$sql2 = "UPDATE fomope_qr SET envio_personal = '$fPersonal' WHERE id_movimiento_qr = '$porAutorizar[$i]'";
								mysqli_query($conexion, $sql2);
							}
							if ($fFirmado == "") {  // ***** 3
								$sql2 = "UPDATE fomope_qr SET Ffirmado = '$rowSqlExtraerF[55]' WHERE id_movimiento_qr = '$porAutorizar[$i]'";
								mysqli_query($conexion, $sql2);
							}else {
								$sql2 = "UPDATE fomope_qr SET Ffirmado = '$fFirmado' WHERE id_movimiento_qr = '$porAutorizar[$i]'";
								mysqli_query($conexion, $sql2);
							}
							if ($fechaUr == "") { // *******4
								$sql2 = "UPDATE fomope_qr SET Fentrega_ur = '$rowSqlExtraerF[56]' WHERE id_movimiento_qr = '$porAutorizar[$i]'";
								mysqli_query($conexion, $sql2);
							}else {
								$sql2 = "UPDATE fomope_qr SET Fentrega_ur = '$fechaUr' WHERE id_movimiento_qr = '$porAutorizar[$i]'";
								mysqli_query($conexion, $sql2);
							}
							if ($fRecepcion == "") {  // ***** 5
								$sql2 = "UPDATE fomope_qr SET Frecepcion = '$rowSqlExtraerF[53]' WHERE id_movimiento_qr = '$porAutorizar[$i]'";
								mysqli_query($conexion, $sql2);
							}else {
								$sql2 = "UPDATE fomope_qr SET Frecepcion = '$fRecepcion' WHERE id_movimiento_qr = '$porAutorizar[$i]'";
								mysqli_query($conexion, $sql2);
							}
							
							
							
						}
						//$sql2 = "UPDATE fomope SET fechaEntregaUnidad = '$fechaUr',  fechaEntregaRLaborales = '$fechaLabores', fechaValidacionPersonal = '$fechaValidacion' WHERE id_movimiento = '$porAutorizar[$i]'";
						// echo '<script type="text/javascript">alert("Error en la conexion");</script>';
						// echo '<script type="text/javascript">alert("error '. mysqli_error($conexion).'");</script>';
						
			}
			echo "<script> alert('Autorización correcta'); window.location.href = '../actualizarFecha.php?usuario_rol=$userSeguir'</script>";



 ?>