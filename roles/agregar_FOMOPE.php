
<?php
	include "configuracion.php";
	include './librerias/Classes/PHPWord-master/src/PhpWord/Autoloader.php';
		\PhpOffice\PhpWord\Autoloader::register();

		use PhpOffice\PhpWord\TemplateProcessor;

		//header ('Content-type: text/html; charset=utf-8');
		
		$usuarioSegimiento = $_POST['usuarioSeguir'];
		$noFomope = $_POST['noFomope'];
		$usuario_rol = $_POST['id_rol'];
		$usuario = $_POST['usuarioSeguir'];

		$elBoton = $_POST['accionB'];

		$idFomope = $_POST['noFomope'];
		$elRol = $_POST['id_rol'];
		$usuarioEdito = $_POST['usuarioSeguir'];

		
		$qna_Add =$_POST['qnaOption'];
		$anio_Add =$_POST['anio'];
		$of_unidad =$_POST['ofunid'];
		$fecha_oficio =$_POST['fechaofi'];
		$fecha_recibido =$_POST['fechareci'];
		$codigo =$_POST['codigo'];
		$no_puesto =$_POST['num_pues'];
		$clave_presupuestaria =$_POST['clavepres'];
		
		//$codigo_movimiento =$_POST['cod2_1'];
		//$concepto =$_POST['concept'];//descripción del movimiento		 
		$movimientoYcodigo = $_POST['cod2_1'];
		$nombreCompletoMov = explode("_", $_POST['cod2_1']);
		$codigo_movimiento = $nombreCompletoMov[0];
		$concepto = $nombreCompletoMov[1];
		$del_1 =$_POST['del2'];
		$al_1 =$_POST['al3'];
		$estado_en =$_POST['cod3_1'];
		$consecutivo_maestro_impuestos =$_POST['consema'];
		$observaciones =$_POST['observ'];
		$fecha_recibido_spc =$_POST['fecharecspc'];
		$fecha_envio_spc =$_POST['fechenvvb'];
		$fecha_recibo_dspo =$_POST['fechenvvb'];
		$folio_spc = $_POST['foliospc'];

	

	function genearExcel($elMotivo){
				require "./librerias/conexion_excel.php";
				include "configuracion.php";
				include './librerias/Classes/PHPExcel/IOFactory.php';

				$fileType = 'Excel5';
				$fileName = './generarVolanteRechazo/rechazoT.xls';

					$hoy = "select CURDATE()";

				 if ($resultHoy = mysqli_query($conexion,$hoy)) {
				 		$row = mysqli_fetch_row($resultHoy);
				 }

				// Read the file
				$objReader = PHPExcel_IOFactory::createReader($fileType);
				$objPHPExcel = $objReader->load($fileName);
				$fecha_recibido =  $row[0]   ; 
				$motivoR = $elMotivo;
				$idfom = $_POST['noFomope'];
				$usuario = $_POST['usuarioSeguir'];
				$sqlNombre = "SELECT * from usuarios WHERE usuario = '$usuario'";

				if($resName = mysqli_query($conexion, $sqlNombre)){
					$rowUser = mysqli_fetch_row($resName);

				}
				//header ('Content-type: text/html; charset=utf-8');

				$sqlUnidad = "SELECT unidad , rfc , apellido_1, apellido_2, nombre FROM fomope WHERE id_movimiento = '$idfom' ";
				if($resUni = mysqli_query($conexion, $sqlUnidad)){
					$rowUni = mysqli_fetch_row($resUni);
					$objPHPExcel->getActiveSheet()->setCellValue('H10',$fecha_recibido); 
			        $objPHPExcel->getActiveSheet()->setCellValue('D12', $rowUni[2]." ".$rowUni[3]." ".$rowUni[4]); 
			        $objPHPExcel->getActiveSheet()->setCellValue('D14', $_POST['cod2_1']); 
			        $objPHPExcel->getActiveSheet()->setCellValue('D18', $rowUni[0]); 
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
	function generarWord(){

		include "configuracion.php";
		
		$templateWord = new TemplateProcessor('./generarWordProfesionalCarrera/DGRHO_DIPSP_2020_MEMORANDUM_126.docx');
		 
		$idFomope = $_POST['noFomope'];
		$fechaA = date("d-m-Y");
		$sql="SELECT * FROM `fomope` WHERE id_movimiento = '$idFomope' ";
		$res=mysqli_query($conexion,$sql)or die("problema con la consulta");
		if($data=mysqli_fetch_array($res)){  

		    $nombre = $data['nombre'];
		    $apellido_P = $data['apellido_1'];
		    $apellido_M = $data['apellido_2'];
		    $unidadO = $data['unidad'];
		     $idProfesionalC = $data['idProfesionalCarrera'];
		  

		// // --- Asignamos valores a la plantilla
		$templateWord->setValue('nombres',$nombre);
		$templateWord->setValue('fecha', $fechaA);
		$templateWord->setValue('apellido1',$apellido_P);
		$templateWord->setValue('apellido2',$apellido_M);
		$templateWord->setValue('unidad',$unidadO);
		$templateWord->setValue('idProfCar',$idProfesionalC);


		// // --- Guardamos el documento
		$templateWord->saveAs('generarWordProfesionalCarrera/documentos/DGRHO_DIPSP_2020_MEMORANDUM_'.$idProfesionalC.'.docx');
		header("Content-Disposition: attachment; filename=DGRHO_DIPSP_2020_MEMORANDUM_".$idProfesionalC.".docx; charset=iso-8859-1");
		echo file_get_contents('generarWordProfesionalCarrera/documentos/DGRHO_DIPSP_2020_MEMORANDUM_'.$idProfesionalC.'.docx');     
		exit();
	}

	}
	
	
	$sqlRolReal = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
	if($sIsqlRolReal = mysqli_query($conexion,$sqlRolReal)){
		$roWsqlRolReal = mysqli_fetch_row($sIsqlRolReal);
	}

	if($elBoton == "Capturar" || $elBoton == "aceptar y modificar"){
		

		$sqlRol = "SELECT id_rol FROM usuarios WHERE usuario = '$usuario'";
		$resRol = mysqli_query($conexion,$sqlRol);
		$datoId = mysqli_fetch_row($resRol);


		$hoy = "select CURDATE()";
		$tiempo ="select curTime()";

			 if ($resultHoy = mysqli_query($conexion,$hoy) AND $resultTime = mysqli_query($conexion,$tiempo)) {
			 		$row = mysqli_fetch_row($resultHoy);
			 		$row2 = mysqli_fetch_row($resultTime);
			 }

		if($elBoton == "Capturar" || $roWsqlRolReal[2] == 3 || $elBoton == "aceptar y modificar"){
			$colorAenviar = "cafe";
			$estadoFecha = "En espera de autorización";
		}else if($roWsqlRolReal[2] == 7){
			$estadoFecha = $row[0]." - ".$usuario;
			$colorAenviar = "guinda";
		}else{
			$estadoFecha = $row[0]." - ".$usuario;
			$colorAenviar = "negro1";
		}

		if($fecha_recibido <= $row[0] AND $fecha_oficio <= $row[0] AND $fecha_recibido_spc <= $row[0] AND $fecha_envio_spc <= $row[0] AND $fecha_recibo_dspo <= $row[0] ){

			if($elBoton == "aceptar y modificar"){
				//puede ser de un rechazo que se realizo desde DISPCH , SE ACTUALIZA FECHAS Y LA QNA QUE VIENE DESDE LULU
				$sql1 = "UPDATE fomope SET usuario_name='$usuario',color_estado='$colorAenviar',quincenaAplicada='$qna_Add',qnaDeAfectacion='$qna_Add',fechaIngreso='$fecha_recibido',anio='$anio_Add',oficioUnidad='$of_unidad',fechaOficio='$fecha_oficio',fechaRecibido='$fecha_recibido',codigo='$codigo',n_puesto='$no_puesto',clavePresupuestaria='$clave_presupuestaria',codigoMovimiento='$codigo_movimiento',descripcionMovimiento='$concepto',vigenciaDel='$del_1',vigenciaAl='$al_1',entidad='$estado_en',consecutivoMaestroPuestos='$consecutivo_maestro_impuestos',observaciones='$observaciones',fechaRecepcionSpc='$fecha_recibido_spc',fechaEnvioSpc='$fecha_envio_spc',fechaReciboDspo='$fecha_recibo_dspo',folioSpc='$folio_spc', fechaCaptura = '$row[0] - $usuario', fechaAutorizacion = '$estadoFecha' WHERE id_movimiento = '$noFomope' " ;
			}else{
				$sql1 = "UPDATE fomope SET usuario_name='$usuario',color_estado='$colorAenviar',qnaDeAfectacion='$qna_Add',anio='$anio_Add',oficioUnidad='$of_unidad',fechaOficio='$fecha_oficio',fechaRecibido='$fecha_recibido',codigo='$codigo',n_puesto='$no_puesto',clavePresupuestaria='$clave_presupuestaria',codigoMovimiento='$codigo_movimiento',descripcionMovimiento='$concepto',vigenciaDel='$del_1',vigenciaAl='$al_1',entidad='$estado_en',consecutivoMaestroPuestos='$consecutivo_maestro_impuestos',observaciones='$observaciones',fechaRecepcionSpc='$fecha_recibido_spc',fechaEnvioSpc='$fecha_envio_spc',fechaReciboDspo='$fecha_recibo_dspo',folioSpc='$folio_spc', fechaCaptura = '$row[0] - $usuario', fechaAutorizacion = '$estadoFecha' WHERE id_movimiento = '$noFomope' " ;
			}

				$hoy = "select CURDATE()";
				$tiempo ="select curTime()";
					
					
			if ($resultHoy = mysqli_query($conexion,$hoy) AND $resultTime = mysqli_query($conexion,$tiempo)) {
							 		$row = mysqli_fetch_row($resultHoy);
							 		$row2 = mysqli_fetch_row($resultTime);
							 }
				 $sql2 = "INSERT INTO historial (id_movimiento,usuario,fechaMovimiento,horaMovimiento) VALUES ('$noFomope','$usuario','$row[0]','$row2[0]')";

				if (mysqli_query($conexion,$sql2)) {
			    	
			          //echo "<script> alert('Fomope rechazado'); window.location.href = './analista.php?usuario_rol=Tostado'</script>";//Tostado


				} else {
				    //echo "Error updating record: " . mysqli_error($conexion);
				    echo '<script type="text/javascript">alert("error '. mysqli_error($conexion).'");</script>';
				}
					
					if (mysqli_query($conexion,$sql1)) {
						if($datoId[0] == 2){
							   echo "<script> alert('el fomope fue capturado'); window.location.href = './analista.php?usuario_rol=$usuario'</script>";
							}elseif ($datoId[0] == 3) {
								  echo "<script> alert('el fomope fue actualizado'); window.location.href = './capturistaTostado.php?usuario_rol=$usuario'</script>";
							}elseif ($datoId[0] == 7) {
								echo "<script> alert('el fomope fue actualizado'); window.location.href = './bandejaBajas.php?usuario_rol=$usuario'</script>";
						  	}
							

					}else {
						echo '<script type="text/javascript">alert("Error en la conexion");</script>';
						echo '<script type="text/javascript">alert("error '. mysqli_error($conexion).'");</script>';
					}
		}else{
					 echo "<script> alert('Se detecto incosistencia en las fechas');window.location.href='./form_FOMOPE.php?usuario=$usuario&id_rol=$usuario_rol&noFomope=$noFomope'</script>";
		}
	}else if($elBoton == "descargar" || $elBoton == "Aceptar rechazo por captura"){
		
//sdsd

		 $hoy = "select CURDATE()";
		   	$tiempo ="select curTime()";

					 if ($resultHoy = mysqli_query($conexion,$hoy) AND $resultTime = mysqli_query($conexion,$tiempo)) {
					 		$row = mysqli_fetch_row($resultHoy);
					 		$row2 = mysqli_fetch_row($resultTime);
					 }   //p

		 $sql2 = "INSERT INTO historial (id_movimiento,usuario,fechaMovimiento,horaMovimiento) VALUES ('$idFomope','$usuarioEdito','$row[0]','$row2[0]')";

	
		$hoy = "select CURDATE()";
		$tiempo ="select curTime()";

			 if ($resultHoy = mysqli_query($conexion,$hoy) AND $resultTime = mysqli_query($conexion,$tiempo)) {
			 		$row = mysqli_fetch_row($resultHoy);
			 		$row2 = mysqli_fetch_row($resultTime);
			 }

			if ($elBoton == "Aceptar rechazo por captura"){
					$motivoR = $_POST['comentarioR2'];

		 		$sql3 = "INSERT INTO rechazos (id_movimiento,justificacionRechazo,usuario,fechaRechazo) VALUES ($idFomope,'$motivoR','$usuarioEdito','$row[0]')";

				$sql1 = "UPDATE fomope SET justificacionRechazo = '$motivoR2', usuario_name='$usuario',color_estado='negro',qnaDeAfectacion='$qna_Add',anio='$anio_Add',oficioUnidad='$of_unidad',fechaOficio='$fecha_oficio',fechaRecibido='$fecha_recibido',codigo='$codigo',n_puesto='$no_puesto',clavePresupuestaria='$clave_presupuestaria',codigoMovimiento='$codigo_movimiento',descripcionMovimiento='$concepto',vigenciaDel='$del_1',vigenciaAl='$al_1',entidad='$estado_en',consecutivoMaestroPuestos='$consecutivo_maestro_impuestos',observaciones='$observaciones',fechaRecepcionSpc='$fecha_recibido_spc',fechaEnvioSpc='$fecha_envio_spc',fechaReciboDspo='$fecha_recibo_dspo',folioSpc='$folio_spc', fechaCaptura = '$row[0] - $usuario' WHERE id_movimiento = '$noFomope' " ;

			}else{
					$motivoR = $_POST['comentarioR'];

		 		$sql3 = "INSERT INTO rechazos (id_movimiento,justificacionRechazo,usuario,fechaRechazo) VALUES ($idFomope,'$motivoR','$usuarioEdito','$row[0]')";

				$sql1 = "UPDATE fomope SET justificacionRechazo = '$motivoR', usuario_name='$usuario',color_estado='negro1',qnaDeAfectacion='$qna_Add',anio='$anio_Add',oficioUnidad='$of_unidad',fechaOficio='$fecha_oficio',fechaRecibido='$fecha_recibido',codigo='$codigo',n_puesto='$no_puesto',clavePresupuestaria='$clave_presupuestaria',codigoMovimiento='$codigo_movimiento',descripcionMovimiento='$concepto',vigenciaDel='$del_1',vigenciaAl='$al_1',entidad='$estado_en',consecutivoMaestroPuestos='$consecutivo_maestro_impuestos',observaciones='$observaciones',fechaRecepcionSpc='$fecha_recibido_spc',fechaEnvioSpc='$fecha_envio_spc',fechaReciboDspo='$fecha_recibo_dspo',folioSpc='$folio_spc', fechaCaptura = '$row[0] - $usuario', fechaAutorizacion = 'En espera de autorización' WHERE id_movimiento = '$noFomope' " ;

			}

				$hoy = "select CURDATE()";
				$tiempo ="select curTime()";
					
				if (mysqli_query($conexion,$sql1)) {
					if (mysqli_query($conexion,$sql2) AND mysqli_query($conexion,$sql3) ) {
							genearExcel($motivoR);
																			
					}else {
						echo '<script type="text/javascript">alert("Error en la conexion");</script>';
						echo '<script type="text/javascript">alert("error '. mysqli_error($conexion).'");</script>';
					}
				}else {
						echo '<script type="text/javascript">alert("Error en la conexion");</script>';
						echo '<script type="text/javascript">alert("error '. mysqli_error($conexion).'");</script>';
					}
				

	}else if($elBoton == "generar"){
		
		$idProfCarrera = $_POST['idProfesional'];



		 $hoy = "select CURDATE()";
		   	$tiempo ="select curTime()";

					 if ($resultHoy = mysqli_query($conexion,$hoy) AND $resultTime = mysqli_query($conexion,$tiempo)) {
					 		$row = mysqli_fetch_row($resultHoy);
					 		$row2 = mysqli_fetch_row($resultTime);
					 }
				

					
			$sql = "UPDATE fomope SET usuario_name = '$usuarioEdito', idProfesionalCarrera = '$idProfCarrera' WHERE id_movimiento = '$idFomope'" ;	
				if (mysqli_query($conexion,$sql)) {
					if (mysqli_query($conexion,$sql)) {
						generarWord();
															
					}else {
						echo '<script type="text/javascript">alert("Error en la conexion");</script>';
						echo '<script type="text/javascript">alert("error '. mysqli_error($conexion).'");</script>';
					}
				}else {
						echo '<script type="text/javascript">alert("Error en la conexion");</script>';
						echo '<script type="text/javascript">alert("error '. mysqli_error($conexion).'");</script>';
					}
				

	}else if($elBoton == "bandeja principal"){
		

		$sqlRol = "SELECT id_rol FROM usuarios WHERE usuario = '$usuario'";
		$resRol = mysqli_query($conexion,$sqlRol);
		$datoId = mysqli_fetch_row($resRol);
				if($datoId[0] == 2){
 					echo "<script> window.location.href = './analista.php?usuario_rol=$usuarioEdito' </script>";
				}elseif ($datoId[0] == 3) {
								
				  echo "<script>window.location.href = './capturistaTostado.php?usuario_rol=$usuario'</script>";
				}elseif ($datoId[0] == 7) {
								
					echo "<script>window.location.href = './bandejaBajas.php?usuario_rol=$usuario'</script>";
				  }
	}
	

 ?>
	
