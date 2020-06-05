<?php 

		include "configuracion.php";
		//header ('Content-type: text/html; charset=utf-8');
		$rolSegimiento = $_POST['userName'];
		$id_Fom = $_POST['idFom'];

		$unidadUp =  $_POST['unexp_1'];
		$rfcUp =  strtoupper($_POST['rfcL_1']);
		$curpUp = strtoupper($_POST['curp']);
		$apellido1Up = strtoupper($_POST['apellido1']);
		$apellido2Up = strtoupper($_POST['apellido2']);
		$nombreUp = strtoupper($_POST['nombre']);
		$fechaIngresoUp = $_POST['fechaIngreso'];
		$tipoEntregaUp = strtoupper($_POST['TipoEntregaArchivo']);

		$laQna = $_POST['qnaActual'];
		$documentosList = $_POST['guardarDoc'];

		
		$radioUpRechazar = "agregar";
		$motivoRUp = $_POST['comentarioR'];	
		$fechaDel = $_POST['del'];	
		$fechaAl = $_POST['al'];	

		$colorAccion = "amarillo0";
		//$accionB = $_POST['botonAccion'];
		$analista = $_POST['usuar'];
		$hoy = "select CURDATE()";
		$tiempo ="select curTime()";

			 if ($resultHoy = mysqli_query($conexion,$hoy) AND $resultTime = mysqli_query($conexion,$tiempo)) {
			 		$row = mysqli_fetch_row($resultHoy);
			 		$row2 = mysqli_fetch_row($resultTime);
			 }

		if($fechaIngresoUp <= $row[0] ){

					$sqlUser = "SELECT * FROM usuarios WHERE usuario = '$rolSegimiento'";
		if($resultado2 = mysqli_query($conexion,$sqlUser)){
					        		$rowU = mysqli_fetch_assoc($resultado2);
					        		$id_rol = $rowU['id_rol'];
					        		$unidadC = 	$rowU['unidadCorrespondiente'];

						if($id_rol == '0' ){
							$sqlL = "UPDATE fomope SET color_estado='$colorAccion',usuario_name='$rolSegimiento', unidad='$unidadUp',rfc='$rfcUp',curp='$curpUp',apellido_1='$apellido1Up',apellido_2='$apellido2Up',nombre='$nombreUp',fechaIngreso='$fechaIngresoUp',tipoEntrega='$tipoEntregaUp',tipoDeAccion='$radioUpRechazar',justificacionRechazo='$motivoRUp', fechaAutorizacion = '$row[0] - $rolSegimiento', analistaCap='$analista', vigenciaDel = '$fechaDel', vigenciaAl = '$fechaAl', quincenaAplicada = '$laQna' WHERE id_movimiento = '$id_Fom'";
								mysqli_query($conexion,$sqlL);

		               			echo "<script> alert('Fomope Actualizado'); window.location.href = '../luluConsulta.php?usuario_rol=$rolSegimiento'</script>";


						}else if($id_rol == '1'){
							$sqlCL = "UPDATE fomope SET color_estado='amarillo',usuario_name='$rolSegimiento', unidad='$unidadUp',rfc='$rfcUp',curp='$curpUp',apellido_1='$apellido1Up',apellido_2='$apellido2Up',nombre='$nombreUp',fechaIngreso='$fechaIngresoUp',tipoEntrega='$tipoEntregaUp',tipoDeAccion='$radioUpRechazar',justificacionRechazo='$motivoRUp', analistaCap='$analista', fechaCaptura = '$row[0] - $rolSegimiento' , vigenciaDel = '$fechaDel', vigenciaAl = '$fechaAl', quincenaAplicada = '$laQna' WHERE id_movimiento = '$id_Fom'";
								mysqli_query($conexion,$sqlCL);
		               			echo "<script> alert('Fomope Actualizado'); window.location.href = '../lulu.php?usuario_rol=$rolSegimiento'</script>";

						}
						/*if($id_rol == '0' && $unidadC == ''){
							$sqlL = "UPDATE fomope SET color_estado='$colorAccion',usuario_name='$rolSegimiento', unidad='$unidadUp',rfc='$rfcUp',curp='$curpUp',apellido_1='$apellido1Up',apellido_2='$apellido2Up',nombre='$nombreUp',fechaIngreso='$fechaIngresoUp',tipoEntrega='$tipoEntregaUp',tipoDeAccion='$radioUpRechazar',justificacionRechazo='$motivoRUp', fechaAutorizacion = '$row[0] - $rolSegimiento', analistaCap='$analista', vigenciaDel = '$fechaDel', vigenciaAl = '$fechaAl', quincenaAplicada = '$laQna' WHERE id_movimiento = '$id_Fom'";
								mysqli_query($conexion,$sqlL);

		               			echo "<script> alert('Fomope Actualizado'); window.location.href = '../luluConsulta.php?usuario_rol=$rolSegimiento'</script>";


						}else if($id_rol == '1'){
							$sqlCL = "UPDATE fomope SET color_estado='amarillo',usuario_name='$rolSegimiento', unidad='$unidadUp',rfc='$rfcUp',curp='$curpUp',apellido_1='$apellido1Up',apellido_2='$apellido2Up',nombre='$nombreUp',fechaIngreso='$fechaIngresoUp',tipoEntrega='$tipoEntregaUp',tipoDeAccion='$radioUpRechazar',justificacionRechazo='$motivoRUp', analistaCap='$analista', fechaCaptura = '$row[0] - $rolSegimiento' , vigenciaDel = '$fechaDel', vigenciaAl = '$fechaAl', quincenaAplicada = '$laQna' WHERE id_movimiento = '$id_Fom'";
								mysqli_query($conexion,$sqlCL);
		               			echo "<script> alert('Fomope Actualizado'); window.location.href = '../lulu.php?usuario_rol=$rolSegimiento'</script>";

						}else if($id_rol == '0' && $unidadC != ''){
							$sqlL = "UPDATE fomope SET color_estado='$colorAccion',usuario_name='$rolSegimiento', unidad='$unidadUp',rfc='$rfcUp',curp='$curpUp',apellido_1='$apellido1Up',apellido_2='$apellido2Up',nombre='$nombreUp',fechaIngreso='$fechaIngresoUp',tipoEntrega='$tipoEntregaUp',tipoDeAccion='$radioUpRechazar',justificacionRechazo='$motivoRUp', fechaAutorizacion = '$row[0] - $rolSegimiento', analistaCap='$analista', vigenciaDel = '$fechaDel', vigenciaAl = '$fechaAl', quincenaAplicada = '$laQna' WHERE id_movimiento = '$id_Fom'";
								mysqli_query($conexion,$sqlL);

		               			echo "<script> alert('Fomope Actualizado'); window.location.href = '../unidadCaptura.php?usuario_rol=$rolSegimiento'</script>";

						}*/
						$sqlH = "INSERT INTO historial (id_movimiento,usuario,fechaMovimiento,horaMovimiento) VALUES ('$id_Fom', $rolSegimiento','$row[0]','$row2[0]')";
								$resultH = mysqli_query($conexion,$sqlH);

								$arrayDoc = explode("_", $documentosList) ;
								//$limite = count($arrayDoc);

								//actualizamos la base para poder tener el registro de los documentos
								for($i=0; $i < count($arrayDoc)-1 ; $i++){
									$nombreAsignar = $arrayDoc[$i];
									$sqlAgregar =  "UPDATE fomope SET $arrayDoc[$i] = '$nombreAsignar' WHERE id_movimiento = '$id_Fom'";
									if ($resUpdate = mysqli_query($conexion, $sqlAgregar)){

									}else{
										echo "<script> alert ('error');</script>";
									}

								}

					}else {
						echo '<script type="text/javascript">alert("Error en la conexion");</script>';
						echo '<script type="text/javascript">alert("error '. mysqli_error($conexion).'");</script>';
					}

		}else{
			 echo "<script> alert('La fecha no puede ser mayor a la actual'); window.location.href = '../negroEditar.php?usuario_rol=$rolSegimiento&id_mov=$id_Fom'</script>";


		}
 ?>