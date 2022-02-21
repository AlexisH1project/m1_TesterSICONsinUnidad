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
		$tipoEntregaAdd = strtoupper($_POST['TipoEntregaArchivo']);
		$radioAdd_rechazar = $_POST['botonAccion'];
		$motivoR = $_POST['comentarioR'];
		$fechaDel = $_POST['del2'];
		$fechaAl = $_POST['al3'];
		$id_movIdentify = $_POST['id_env']; 

		$laQna = $_POST['qnaActual'];
		$documentosList = $_POST['guardarDoc'];

		$fechaArchivoAdd = 'Pendiente'; //strtoupper($_POST['fechaArchivo']
		$fechaRLaboralesAdd = 'Pendiente'; // strtoupper($_POST['fechaRLaborales'];
		$ofEntregaRLAdd = 'Pendiente'; // strtoupper($_POST['ofEntregaRL'];
		$archivoScan = 'Pendiente';// strtoupper($_POST['ejemplo_archivo_1'];
		$fechaEntregaUnidadAdd = 'Pendiente';// strtoupper($_POST['fechaEntregaUnidad'];
		$ofEntregaUnidadAdd = 'Pendiente'; //strtoupper($_POST['ofEntregaUnidad'];
		$bandera = 0;
		$analista = $_POST['usuar'];
		$sub_unidad_post = $_POST['select_sub_ur'];
		
		$colorAccion = "";

		//**************************** SACAMOS SUB UR  */
		$sql_clave_ur = "SELECT * FROM ct_agenda_ur WHERE id_miembro = '$sub_unidad_post'";
		if($res_ur = mysqli_query($conexion, $sql_clave_ur)){
			$row_subur = mysqli_fetch_assoc($res_ur);
			$sub_unidad = $row_subur['sub_ur'];
		}

		// ******************************************sacamos el año
		$ConsultaAnio = "SELECT * FROM ct_anios ORDER BY id_anio DESC";
		$resultadoA = mysqli_query($conexion , $ConsultaAnio);
		$row_anio = mysqli_fetch_row($resultadoA);


			$hoy = "select CURDATE()";
		   	$tiempo ="select curTime()";
// **************************************	sacamos el año
			if ($resultHoy = mysqli_query($conexion,$hoy)) {
				$row = mysqli_fetch_row($resultHoy);
				$anioActual = explode("-", $row[0]);
			}

			   $sqlVRechazo = "SELECT color_estado, doc77, quincenaAplicada, anio FROM fomope WHERE rfc = '$rfcAdd' ORDER BY id_movimiento DESC";
			   if($resRechazo = mysqli_query($conexion, $sqlVRechazo)){
				   $rechazoActual = mysqli_fetch_row($resRechazo);
				   if($rechazoActual[0] == "negro" || $rechazoActual[0] == "negro1"){
					   if($rechazoActual[0] == "negro"){
						   $direccion= "DDSCH";
					   }else {
						   $direccion= "DSPO";
					   }
					   $bandera = 1;
				   }
			   }
if($bandera == 1 AND $rechazoActual[1] == "" AND $laQna == $rechazoActual[2] AND $row_anio[1] == $rechazoActual[3]){
		echo '<script type="text/javascript"> alert("No puede ser registrado este movimiento, ya que existe un último movimiento de esta persona en bandeja de rechazo en la '.$direccion.'. Se sugiere editar el rechazo."); </script>';
		echo "<script>window.location.href = '../blancoLulu.php?usuario_rol=$usuarioEdito'</script>";
}else{
	function generarExcel(){
				require "../librerias/conexion_excel.php";
				include "configuracion.php";
				include '../librerias/Classes/PHPExcel/IOFactory.php';

				$fileType = 'Excel5';
				$fileName = '../generarVolanteRechazo/rechazoL.xls';

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
					$objPHPExcel->getActiveSheet()->setCellValue('H11',$fecha_recibido); 
			        $objPHPExcel->getActiveSheet()->setCellValue('D13', $apellido1Add." ".$apellido2Add." ".$nombreAdd); 
			        $objPHPExcel->getActiveSheet()->setCellValue('D15', $_POST['cod2_1']); 
			        $objPHPExcel->getActiveSheet()->setCellValue('D19', $_POST['unexp_1']); 
			        $objPHPExcel->getActiveSheet()->setCellValue('D23', $motivoR); 
			        $objPHPExcel->getActiveSheet()->setCellValue('B32', $rowUser[4]); 
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

		$sqlRol = "SELECT id_rol FROM usuarios WHERE usuario = '$usuarioEdito'";
		if($resultSqlRol = mysqli_query($conexion,$sqlRol)){
			$idRolActual = mysqli_fetch_row($resultSqlRol);
		}

		  

		if($fechaArchivoAdd == "" || $fechaRLaboralesAdd == "" || $fechaEntregaUnidadAdd == ""){
			$fechaArchivoAdd = "Pendiente";
			$fechaRLaboralesAdd = "Pendiente";
			$fechaEntregaUnidadAdd = "Pendiente";
		}
			if($radioAdd_rechazar == "bandeja principal" ){
				$sqlRol = "SELECT id_rol FROM usuarios WHERE usuario = '$usuarioEdito'";
				$resRol = mysqli_query($conexion,$sqlRol);
				$datoId = mysqli_fetch_row($resRol);
						if($datoId[0] == 0){
		 					echo "<script> window.location.href = '../luluConsulta.php?usuario_rol=$usuarioEdito' </script>";
						}elseif ($datoId[0] == 1) {
										
						  echo "<script>window.location.href = '../lulu.php?usuario_rol=$usuarioEdito'</script>";
						}
			
			}else if($radioAdd_rechazar == "Aceptar" AND $idRolActual[0] == 1){
				$colorAccion = "amarillo";
			}else if($radioAdd_rechazar == "Aceptar" AND $idRolActual[0] == 0){
				$colorAccion = "amarillo0";
			}else{
				$colorAccion = "negro";
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

			
			if($id_rol == 0 AND $radioAdd_rechazar != "bandeja principal"){
			
			if($id_movIdentify != "x"){

				$sql = "UPDATE fomope SET color_estado = '$colorAccion', usuario_name = '$usuarioEdito', tipoEntrega = '$tipoEntregaAdd', tipoDeAccion = '$radioAdd_rechazar', quincenaAplicada = '$laQna', anio = '$row_anio[1]', analistaCap = '$analista',  fechaCaptura = '$row[0] - $usuarioEdito' WHERE id_movimiento = '$id_movIdentify' "; 

				}else{

					$sql = "INSERT INTO fomope (color_estado,usuario_name,unidad,rfc,curp,apellido_1,apellido_2,nombre,fechaIngreso,tipoEntrega,tipoDeAccion,justificacionRechazo,quincenaAplicada,anio,oficioUnidad,fechaOficio,fechaRecibido,codigo,n_puesto,clavePresupuestaria,codigoMovimiento,descripcionMovimiento,vigenciaDel,vigenciaAl,entidad,consecutivoMaestroPuestos,puestos,observaciones,fechaEnviadaRubricaDspo,fechaEnviadaRubricaDipsp,fechaEnviadaRubricaDgrho,fechaRecepcionSpc,fechaEnvioSpc,fechaReciboDspo,folioSpc,fechaCapturaNomina,fechaEntregaArchivo,fechaEntregaRLaborales,OfEntregaRLaborales,fomopeDigital,fechaEntregaUnidad,OfEntregaUnidad,analistaCap,fechaCaptura,sub_unidad ) VALUES ('$colorAccion','$usuarioEdito','$unidadAdd','$rfcAdd','$curpAdd','$apellido1Add','$apellido2Add','$nombreAdd','$fechaIngresoAdd','$tipoEntregaAdd','$radioAdd_rechazar','$motivoR','$laQna','','','','','','','','','','$fechaDel','$fechaAl','','','','','','','','','','','','','$fechaArchivoAdd','$fechaRLaboralesAdd','$ofEntregaRLAdd','$archivoScan','$fechaEntregaUnidadAdd','$ofEntregaUnidadAdd','$analista','$row[0] - $usuarioEdito', '$sub_unidad')";
				}
			

			}else if ($id_rol == 1 AND $radioAdd_rechazar != "bandeja principal"){
			
				if($id_movIdentify!= "x"){

					$sql = "UPDATE fomope SET color_estado = '$colorAccion', usuario_name = '$usuarioEdito', tipoEntrega = '$tipoEntregaAdd', tipoDeAccion = '$radioAdd_rechazar', quincenaAplicada = '$laQna', anio = '$row_anio[1]', fechaAutorizacion =  '$row[0] - $usuarioEdito', analistaCap = '$analista',  fechaCaptura = '$row[0] - $usuarioEdito' WHERE id_movimiento = '$id_movIdentify' "; 
 //cuando la fecha de autorizacion ya tenga un dato significa que puede pasar 
				}else{

					$sql = "INSERT INTO fomope (color_estado,usuario_name,unidad,rfc,curp,apellido_1,apellido_2,nombre,fechaIngreso,tipoEntrega,tipoDeAccion,justificacionRechazo,quincenaAplicada,anio,oficioUnidad,fechaOficio,fechaRecibido,codigo,n_puesto,clavePresupuestaria,codigoMovimiento,descripcionMovimiento,vigenciaDel,vigenciaAl,entidad,consecutivoMaestroPuestos,puestos,observaciones,fechaEnviadaRubricaDspo,fechaEnviadaRubricaDipsp,fechaEnviadaRubricaDgrho,fechaRecepcionSpc,fechaEnvioSpc,fechaReciboDspo,folioSpc,fechaCapturaNomina,fechaEntregaArchivo,fechaEntregaRLaborales,OfEntregaRLaborales,fomopeDigital,fechaEntregaUnidad,OfEntregaUnidad,fechaAutorizacion,analistaCap,fechaCaptura,sub_unidad  ) VALUES ('$colorAccion','$usuarioEdito','$unidadAdd','$rfcAdd','$curpAdd','$apellido1Add','$apellido2Add','$nombreAdd','$fechaIngresoAdd','$tipoEntregaAdd','$radioAdd_rechazar','$motivoR','$laQna','','','','','','','','','','$fechaDel','$fechaAl','','','','','','','','','','','','','$fechaArchivoAdd','$fechaRLaboralesAdd','$ofEntregaRLAdd','$archivoScan','$fechaEntregaUnidadAdd','$ofEntregaUnidadAdd','$row[0] - $usuarioEdito', '$analista', '$row[0] - $usuarioEdito', '$sub_unidad' )";

			    }
			}
			if (mysqli_query($conexion,$sql)) {
						
				if($colorAccion == "negro"){
						$sql2 = "SELECT MAX(id_movimiento) AS id FROM fomope";

		             	if($resultado = mysqli_query($conexion,$sql2)){

	             			if ($row = mysqli_fetch_row($resultado)) {
								$id = trim($row[0]);
							}

							if ($resultHoy = mysqli_query($conexion,$hoy) AND $resultTime = mysqli_query($conexion,$tiempo)) {
						 		$row = mysqli_fetch_row($resultHoy);
						 		$row2 = mysqli_fetch_row($resultTime);
					 		}
							$sqlH = "INSERT INTO historial (id_movimiento,usuario,fechaMovimiento,horaMovimiento) VALUES ('$id', '$usuarioEdito','$row[0]','$row2[0]')";
							 	mysqli_query($conexion,$sqlH);

							$sqlAgregarRechazo = "INSERT INTO rechazos (id_movimiento,justificacionRechazo,usuario,fechaRechazo) VALUES ('$id', '$motivoR', '$usuarioEdito','$row[0]')";  
							if (mysqli_query($conexion,$sqlAgregarRechazo)){

									$sqlUser = "SELECT id_rol FROM usuarios WHERE usuario = '$usuarioEdito'";
									if($resultU = mysqli_query($conexion,$sqlUser)){
										$rowRol = mysqli_fetch_row($resultU);
										if($rowRol[0] == 0){
													generarExcel();
													echo "<script> alert('Fomope enviado a revision'); window.location.href = '../luluConsulta.php?usuario_rol=$usuarioEdito'</script>";

										}else if ($rowRol[0] == 1){
													
														generarExcel();
										 				echo "<script> alert('Fomope enviado a revision'); window.location.href = '../lulu.php?usuario_rol=$usuarioEdito'</script>";

										}
									}

									
							}else{
								echo '<script type="text/javascript">alert("Error en la conexion");</script>';
								echo '<script type="text/javascript">alert("error '. mysqli_error($conexion).'");</script>';
							}  	
		             	}else{

							echo '<script type="text/javascript">alert("Error en la conexion");</script>';
							echo '<script type="text/javascript">alert("error '. mysqli_error($conexion).'");</script>';
		             	}

				}else{
					$sql2 = "SELECT MAX(id_movimiento) AS id FROM fomope";	



		             	if($resultado = mysqli_query($conexion,$sql2)){

	             			if ($row = mysqli_fetch_row($resultado)) {
								$id = trim($row[0]);
								$arrayDoc = explode("_", $documentosList) ;
								//$limite = count($arrayDoc);

								//actualizamos la base para poder tener el registro de los documentos
								for($i=0; $i < count($arrayDoc)-1 ; $i++){
									$nombreAsignar = $arrayDoc[$i];
									$sqlAgregar =  "UPDATE fomope SET $arrayDoc[$i] = '$nombreAsignar' WHERE id_movimiento = '$id'";
									if ($resUpdate = mysqli_query($conexion, $sqlAgregar)){

									}else{
										echo "<script> alert ('error');</script>";
									}

								}
								
							}

							if ($resultHoy = mysqli_query($conexion,$hoy) AND $resultTime = mysqli_query($conexion,$tiempo)) {
						 		$row = mysqli_fetch_row($resultHoy);
						 		$row2 = mysqli_fetch_row($resultTime);
					 		}
							$sqlH = "INSERT INTO historial (id_movimiento,usuario,fechaMovimiento,horaMovimiento) VALUES ('$id', '$usuarioEdito','$row[0]','$row2[0]')";
							 	mysqli_query($conexion,$sqlH);
							 
						}
					$sql3 = "SELECT rfc FROM ct_empleados WHERE rfc = '$rfcAdd'";
						if ($resulta = mysqli_query($conexion,$sql3)) {

							if($ves=mysqli_fetch_row($resulta)){
						
							}else {
								$sql4 = "INSERT INTO ct_empleados (rfc, curp, apellido_1, apellido_2, nombre) VALUES ('$rfcAdd', '$curpAdd', '$apellido1Add', '$apellido2Add', '$nombreAdd')";
								if (mysqli_query($conexion,$sql4)) {

								}
							}

						}

										if($id_rol == 0){

										 echo "<script> alert('Fomope enviado a revision'); window.location.href = '../luluConsulta.php?usuario_rol=$usuarioEdito'</script>";

										}else if ($id_rol == 1){
										 echo "<script> alert('Fomope enviado a revision'); window.location.href = '../lulu.php?usuario_rol=$usuarioEdito'</script>";

										}
								
				}
				

			}else {
				echo '<script type="text/javascript">alert("Error en la conexion");</script>';
				echo '<script type="text/javascript">alert("error '. mysqli_error($conexion).'");</script>';
			}

		}

 ?>