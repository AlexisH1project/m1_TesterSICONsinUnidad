<?php 

function generarExcel(){
				require "../librerias/conexion_excel.php";
				include "configuracion.php";
				include '../librerias/Classes/PHPExcel/IOFactory.php';

				$fileType = 'Excel5';
				$fileName = '../generarVolanteRechazo/rechazoL.xls';

				// Read the file
				$objReader = PHPExcel_IOFactory::createReader($fileType);
				$objPHPExcel = $objReader->load($fileName);
				$usuario = $_GET['usuario'];
				$noFomope = $_GET['noFomope'];
				$motivoR = $_GET['comentarioR'];

				$queryID = "SELECT * FROM fomope_qr WHERE id_movimiento_qr = '$noFomope'" ;
				if($resultSelect = mysqli_query($conexion, $queryID)){
					$rowQr = mysqli_fetch_assoc($resultSelect);
					$apellido1Add = $rowQr['apellido_p'] ;	
					$apellido2Add = $rowQr['apellido_m'];	
					$nombreAdd = $rowQr['nombre'] ;
					$fecha_recibido = $rowQr['fini'];

					$sqlNombre = "SELECT * from usuarios WHERE usuario = '$usuario'";
					if($resName = mysqli_query($conexion, $sqlNombre)){
						$rowUser = mysqli_fetch_row($resName);
					}
					$movQuery = "SELECT * FROM ct_movimientosrh WHERE
					    tipo_mov = '$rowQr['tipo_movimiento']'";
					if($resMovimientos = mysqli_query($conexion, $movQuery)){
						$rowMovimientos = mysqli_fetch_row($resMovimientos);
					}

					$unidadQuery = "SELECT * FROM ct_unidades WHERE
					    UR = '$rowQr['unidad']'";
					if($resUnidad = mysqli_query($conexion, $unidadQuery)){
						$rowUnidad = mysqli_fetch_row($resUnidad);
					}


					$objPHPExcel->getActiveSheet()->setCellValue('H11',$fecha_recibido); 
			        $objPHPExcel->getActiveSheet()->setCellValue('D13', $apellido1Add." ".$apellido2Add." ".$nombreAdd); 
			        $objPHPExcel->getActiveSheet()->setCellValue('D15', $rowMovimientos[4]); 
			        $objPHPExcel->getActiveSheet()->setCellValue('D19', $rowUnidad[1]); 
			        $objPHPExcel->getActiveSheet()->setCellValue('D23', $motivoR); 
			        $objPHPExcel->getActiveSheet()->setCellValue('B32', $rowUser[4]); 
				//---> Write the file
			        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, $fileType);
				    $writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
				    header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
				    header('Content-Disposition: attachment;filename='."volanteRechazo_".$rowQr['rfc'].".xlsx"); // --->attachment inline
					header('Cache-Control: max-age=0');
				    ob_end_clean();
			   		$writer->save('php://output');
			   		exit();
				}else {
					echo "<script> alert ('no esta bien el query'); </script>";
				}
	}
		include "configuracion.php";
		$usuarioEdito = $_GET['usuario'];
		$noFomope = $_GET['noFomope'];
		$motivoR = $_GET['comentarioR'];
		//$laAccion = $_GET['tipButton'];
		    $hoy = "select CURDATE()";
		   	$tiempo ="select curTime()";
			if ($resultHoy = mysqli_query($conexion,$hoy) AND $resultTime = mysqli_query($conexion,$tiempo)) {
					 		$row = mysqli_fetch_row($resultHoy);
					 		$row2 = mysqli_fetch_row($resultTime);
			
			}
			$sqlNombre = "SELECT * from usuarios WHERE usuario = '$usuarioEdito'";
			if($resName = mysqli_query($conexion, $sqlNombre)){
				$rowUser = mysqli_fetch_row($resName);
				if($rowUser[2] == 1){
					$sql = "UPDATE fomope_qr SET color_estado = 'negro_1', usuario_modifico = '$usuarioEdito', motivo_rechazo = '$motivoR' WHERE id_movimiento_qr = '$noFomope'" ;
					
				}else if($rowUser[2] == 2){
					$sql = "UPDATE fomope_qr SET color_estado = 'negro_3', usuario_modifico = '$usuarioEdito', motivo_rechazo = '$motivoR' WHERE id_movimiento_qr = '$noFomope'" ;
					
				}else if($rowUser[2] == 3){
					$sql = "UPDATE fomope_qr SET color_estado = 'negro_2', usuario_modifico = '$usuarioEdito', motivo_rechazo = '$motivoR' WHERE id_movimiento_qr = '$noFomope'" ;
				}else if($rowUser[2] == 7){
					$sql = "UPDATE fomope_qr SET color_estado= 'negro_1', usuario_modifico = '$usuarioEdito', motivo_rechazo = '$motivoR' WHERE id_movimiento_qr = '$noFomope'" ;
				}
				$sql2 = "INSERT INTO historial_qr (id_movimiento_qr,usuario,fechaMovimiento,horaMovimiento) VALUES ('$noFomope','$usuarioEdito','$row[0]','$row2[0]')";

				$sql3 = "INSERT INTO rechazos_qr (id_movimiento_qr,justificacionRechazo,usuario,fechaRechazo) VALUES ($noFomope,'$motivoR','$usuarioEdito','$row[0]')";
			}
			
			if (mysqli_query($conexion,$sql) AND mysqli_query($conexion,$sql2) AND mysqli_query($conexion,$sql3) ) {
							generarExcel();
							

			}else {
						echo '<script type="text/javascript">alert("Error en la conexion");</script>';
						echo '<script type="text/javascript">alert("error '. mysqli_error($conexion).'");</script>';
					}
/*		}else if($laAccion == "bandeja de entrada"){
		              		echo "<script>window.location.href = '../lulu.php?usuario_rol=$usuarioEdito'</script>";

		}*/

 ?>