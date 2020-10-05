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
				if($resultSelect = mysqli_query($conexion,$queryID)){
					$rowQr = mysqli_fetch_assoc($resultSelect);
					$apellido1Add = $rowQr['apellido_p'] ;	
					$apellido2Add = $rowQr['apellido_m'];	
					$nombreAdd = $rowQr['nombre'] ;
					$fecha_recibido = $rowQr['fini'];
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
			        $objPHPExcel->getActiveSheet()->setCellValue('D15', $rowQr['codigo_puesto']); 
			        $objPHPExcel->getActiveSheet()->setCellValue('D19', $rowQr['unidad']); 
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
				}else {
					echo "no esta bien el query";
				}
					
	}

		include "configuracion.php";
		//header ('Content-type: text/html; charset=utf-8');
		$usuarioEdito = $_GET['usuario'];
		$noFomope = $_GET['noFomope'];
		$motivoR = $_GET['comentarioR'];
		//$laAccion = $_GET['tipButton'];

		ECHO $usuarioEdito ."  ". $noFomope ."  ". $motivoR ;

/*
			$tiempo =  date_default_timezone_set("America/Mexico_City");
			$tiempo =  time();
			$hoy = getdate();*/
		    $hoy = "select CURDATE()";
		   	$tiempo ="select curTime()";
					 if ($resultHoy = mysqli_query($conexion,$hoy) AND $resultTime = mysqli_query($conexion,$tiempo)) {
					 		$row = mysqli_fetch_row($resultHoy);
					 		$row2 = mysqli_fetch_row($resultTime);
					 }
			generarExcel();

/*
					$sql = "UPDATE fomope SET color_estado='negro', usuario_name = '$usuarioEdito', 	justificacionRechazo = '$motivoR' WHERE id_movimiento = '$idFomope'" ;

					 $sql2 = "INSERT INTO historial (id_movimiento,usuario,fechaMovimiento,horaMovimiento) VALUES ('$idFomope','$usuarioEdito','$row[0]','$row2[0]')";

					 $sql3 = "INSERT INTO rechazos (id_movimiento,justificacionRechazo,usuario,fechaRechazo) VALUES ($idFomope,'$motivoR','$usuarioEdito','$row[0]')";

					
					 if (mysqli_query($conexion,$sql) AND mysqli_query($conexion,$sql2) AND mysqli_query($conexion,$sql3) ) {
							generarExcel();
							

					}else {
						echo '<script type="text/javascript">alert("Error en la conexion");</script>';
						echo '<script type="text/javascript">alert("error '. mysqli_error($conexion).'");</script>';
					}*/
/*		}else if($laAccion == "bandeja de entrada"){
		              		echo "<script>window.location.href = '../lulu.php?usuario_rol=$usuarioEdito'</script>";

		}*/

 ?>