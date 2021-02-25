<?php 

		include "configuracion.php";
		//header ('Content-type: text/html; charset=utf-8');
		$usuarioEdito = $_POST['userName'];
		$unidadAdd = $_POST['unexp_1'];
		$rfcAdd = strtoupper($_POST['rfcL_1']);
		$curpAdd = strtoupper($_POST['curp']);	
		$apellido1Add = strtoupper($_POST['apellido1']);	
		$apellido2Add = strtoupper($_POST['apellido2']);	
		$nombreAdd = strtoupper($_POST['nombre']);
		$fechaIngresoAdd = $_POST['fechaIngreso'];
		// $tipoEntregaAdd = strtoupper($_POST['TipoEntregaArchivo']);
		$motivoR = $_POST['comentarioR'];
		$fechaDel = $_POST['del2'];
		$fechaAl = $_POST['al3'];
		$id_movIdentify = $_POST['id_env']; 
		$laAccion = $_POST['accionB'];
		$laQna = $_POST['qnaActual'];
		$documentosList = $_POST['guardarDoc'];

		$fechaArchivoAdd = 'Pendiente'; //strtoupper($_POST['fechaArchivo']
		$fechaRLaboralesAdd = 'Pendiente'; // strtoupper($_POST['fechaRLaborales'];
		$ofEntregaRLAdd = 'Pendiente'; // strtoupper($_POST['ofEntregaRL'];
		$archivoScan = 'Pendiente';// strtoupper($_POST['ejemplo_archivo_1'];
		$fechaEntregaUnidadAdd = 'Pendiente';// strtoupper($_POST['fechaEntregaUnidad'];
		$ofEntregaUnidadAdd = 'Pendiente'; //strtoupper($_POST['ofEntregaUnidad'];

		// $analista = $_POST['usuar'];
		
		$colorAccion = "negroB";

			$hoy = "select CURDATE()";
		   	$tiempo ="select curTime()";

	if($laAccion == "bandeja principal"){
		echo "<script> alert('Fomope enviado a revision'); window.location.href = '../lulu.php?usuario_rol=$usuarioEdito'</script>";
	}

	function generarExcel(){
				require "../librerias/conexion_excel.php";
				include "configuracion.php";
				include '../librerias/Classes/PHPExcel/IOFactory.php';

				$fileType = 'Excel5';
				$fileName = '../generarVolanteRechazo/rechazoBajas.xls';

				// Read the file
				$objReader = PHPExcel_IOFactory::createReader($fileType);
				$objPHPExcel = $objReader->load($fileName);
				$fecha_recibido =$_POST['fechaIngreso'];
				$motivoR = $_POST['comentarioR'];
				$idfom = $_POST['id'];
				$apellido1Add = strtoupper($_POST['apellido1']);	
				$apellido2Add = strtoupper($_POST['apellido2']);	
				$nombreAdd = strtoupper($_POST['nombre']);

				$usuario = $_POST['userName'];
					$sqlNombre = "SELECT * from usuarios WHERE usuario = '$usuario'";

					if($resName = mysqli_query($conexion, $sqlNombre)){
						$rowUser = mysqli_fetch_row($resName);

					}
				//header ('Content-type: text/html; charset=utf-8');
				$sqlUnidad = "SELECT unidad , rfc , apellido_1, apellido_2, nombre FROM fomope WHERE id_movimiento = '$idfom' ";
				
				if($resUni = mysqli_query($conexion, $sqlUnidad)){
					$rowUni = mysqli_fetch_row($resUni);
					$objPHPExcel->getActiveSheet()->setCellValue('H10',$fecha_recibido); 
			        $objPHPExcel->getActiveSheet()->setCellValue('D12', $apellido1Add." ".$apellido2Add." ".$nombreAdd); 
			        $objPHPExcel->getActiveSheet()->setCellValue('D14', $_POST['cod2_1']); 
			        $objPHPExcel->getActiveSheet()->setCellValue('D18', $_POST['unexp_1']); 
			        $objPHPExcel->getActiveSheet()->setCellValue('D22', $motivoR); 
			        $objPHPExcel->getActiveSheet()->setCellValue('B31', $rowUser[4]); 
				// Write the file
			        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, $fileType);
				        //$objWriter->save("fomopeDESCARGA.xlsx");
				    $writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

				    header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
				    header('Content-Disposition: attachment;filename='."volanteRechazo_".$rowUni[1].".xlsx"); //attachment inline
					header('Cache-Control: max-age=0');
//Location: ./analista.php?usuario_rol=$usuarioEdito
				    ob_end_clean();

			   		$writer->save('php://output');
			   		exit();

			}
	}

// if($radioAdd_rechazar == "Aceptar rechazo por captura"){	
		$sqlRol = "SELECT id_rol FROM usuarios WHERE usuario = '$usuarioEdito'";
		if($resultSqlRol = mysqli_query($conexion,$sqlRol)){
			$idRolActual = mysqli_fetch_row($resultSqlRol);
		}

		if($fechaArchivoAdd == "" || $fechaRLaboralesAdd == "" || $fechaEntregaUnidadAdd == ""){
			$fechaArchivoAdd = "Pendiente";
			$fechaRLaboralesAdd = "Pendiente";
			$fechaEntregaUnidadAdd = "Pendiente";
		}
			
			if ($resultHoy = mysqli_query($conexion,$hoy) AND $resultTime = mysqli_query($conexion,$tiempo)) {
						 		$row = mysqli_fetch_row($resultHoy);
						 		$anioActual = explode("-", $row[0]);
						 		$row2 = mysqli_fetch_row($resultTime);
			}
			$sqlUser = "SELECT * FROM usuarios WHERE usuario = '$usuarioEdito'";
			if($resultado2 = mysqli_query($conexion,$sqlUser)){
										$rowU = mysqli_fetch_assoc($resultado2);
										$id_rol = $rowU['id_rol'];
										$unidadC = 	$rowU['unidadCorrespondiente'];
			}

 //cuando la fecha de autorizacion ya tenga un dato significa que puede pasar 
			$sql = "INSERT INTO fomope (color_estado,usuario_name,unidad,rfc,curp,apellido_1,apellido_2,nombre,fechaIngreso,tipoEntrega,tipoDeAccion,justificacionRechazo,quincenaAplicada,anio,oficioUnidad,fechaOficio,fechaRecibido,codigo,n_puesto,clavePresupuestaria,codigoMovimiento,descripcionMovimiento,vigenciaDel,vigenciaAl,entidad,consecutivoMaestroPuestos,puestos,observaciones,fechaEnviadaRubricaDspo,fechaEnviadaRubricaDipsp,fechaEnviadaRubricaDgrho,fechaRecepcionSpc,fechaEnvioSpc,fechaReciboDspo,folioSpc,fechaCapturaNomina,fechaEntregaArchivo,fechaEntregaRLaborales,OfEntregaRLaborales,fomopeDigital,fechaEntregaUnidad,OfEntregaUnidad,fechaAutorizacion,analistaCap,  	fechaCaptura  ) VALUES ('$colorAccion','$usuarioEdito','$unidadAdd','$rfcAdd','$curpAdd','$apellido1Add','$apellido2Add','$nombreAdd','$fechaIngresoAdd','$tipoEntregaAdd','$radioAdd_rechazar','$motivoR','$laQna','','','','','','','','','','$fechaDel','$fechaAl','','','','','','','','','','','','','$fechaArchivoAdd','$fechaRLaboralesAdd','$ofEntregaRLAdd','$archivoScan','$fechaEntregaUnidadAdd','$ofEntregaUnidadAdd','$row[0] - $usuarioEdito', '$analista', '$row[0] - $usuarioEdito' )";
			
			if (mysqli_query($conexion,$sql)) {
						$sql2 = "SELECT MAX(id_movimiento) AS id FROM fomope";

		             	if($resultado = mysqli_query($conexion,$sql2)){

	             			if ($row = mysqli_fetch_row($resultado)) {
								$id = trim($row[0]);
							}

							if ($resultHoy = mysqli_query($conexion,$hoy) AND $resultTime = mysqli_query($conexion,$tiempo)) {
						 		$row = mysqli_fetch_row($resultHoy);
						 		$row2 = mysqli_fetch_row($resultTime);
					 		}
							$sqlH = "INSERT INTO historial (id_movimiento,usuario,fechaMovimiento,horaMovimiento,accion) VALUES ('$id', '$usuarioEdito','$row[0]','$row2[0]','bajas')";
							 	mysqli_query($conexion,$sqlH);

							$sqlAgregarRechazo = "INSERT INTO rechazos (id_movimiento,justificacionRechazo,usuario,fechaRechazo, modulo) VALUES ('$id', '$motivoR', '$usuarioEdito','$row[0]', 'bajas')";
							if (mysqli_query($conexion,$sqlAgregarRechazo)){

									$sqlUser = "SELECT id_rol FROM usuarios WHERE usuario = '$usuarioEdito'";

									if($resultU = mysqli_query($conexion,$sqlUser)){
										$rowRol = mysqli_fetch_row($resultU);
										generarExcel();
									 	echo "<script> alert('Fomope enviado a revision'); window.location.href = '../lulu.php?usuario_rol=$usuarioEdito'</script>";
									}
							}else{
								echo '<script type="text/javascript">alert("Error en la conexion");</script>';
								echo '<script type="text/javascript">alert("error '. mysqli_error($conexion).'");</script>';
							}  	
		             	}else{

							echo '<script type="text/javascript">alert("Error en la conexion");</script>';
							echo '<script type="text/javascript">alert("error '. mysqli_error($conexion).'");</script>';
		             	}

			}else {
				echo '<script type="text/javascript">alert("Error en la conexion");</script>';
				echo '<script type="text/javascript">alert("error '. mysqli_error($conexion).'");</script>';
			}
	// }
		

 ?>