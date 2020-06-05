<?php 

		include "../configuracion.php";

		$idFomope = $_POST['noFomope'];
		$elRol = $_POST['id_rol'];
		$usuarioEdito = $_POST['usuario'];
		$motivoR = $_POST['comentarioR'];



		 $hoy = "select CURDATE()";
		   	$tiempo ="select curTime()";

					 if ($resultHoy = mysqli_query($conexion,$hoy) AND $resultTime = mysqli_query($conexion,$tiempo)) {
					 		$row = mysqli_fetch_row($resultHoy);
					 		$row2 = mysqli_fetch_row($resultTime);
					 }


					$sql = "UPDATE fomope SET color_estado='negro1', usuario_name = '$usuarioEdito', 	justificacionRechazo = '$motivoR' WHERE id_movimiento = '$idFomope'" ;

					 $sql2 = "INSERT INTO historial (id_movimiento,usuario,fechaMovimiento,horaMovimiento) VALUES ('$idFomope','$usuarioEdito','$row[0]','$row2[0]')";

					 $sql3 = "INSERT INTO rechazos (id_movimiento,justificacionRechazo,usuario,fechaRechazo) VALUES ($idFomope,'$motivoR','$usuarioEdito','$row[0]')";

					
					 if (mysqli_query($conexion,$sql) AND mysqli_query($conexion,$sql2) AND mysqli_query($conexion,$sql3) ) {
						
		              		echo "<script> alert('Fomope Actualizado'); window.location.href = '../analista.php?usuario_rol=$usuarioEdito'</script>";
					

					}else {
						echo '<script type="text/javascript">alert("Error en la conexion");</script>';
						echo '<script type="text/javascript">alert("error '. mysqli_error($conexion).'");</script>';
					}
	
		require "conexion_excel.php";

		include 'Classes/PHPExcel/IOFactory.php';

		$fileType = 'Excel5';
		$fileName = 'reporteAnalista.xls';

		// Read the file
		$objReader = PHPExcel_IOFactory::createReader($fileType);
		$objPHPExcel = $objReader->load($fileName);

		//header ('Content-type: text/html; charset=utf-8');
		$usuarioSegimiento = $_POST['usuario'];
		$id_Fom = $_POST['noFomope'];
		$rol =  $_POST['id_rol'];
		$elComentarioR =  $_POST['comentarioR'];

		$sqlVte = "SELECT ";

		$objPHPExcel->getActiveSheet()->setCellValue('G7'.$fila, $rows['unidad']); 
        $objPHPExcel->getActiveSheet()->setCellValue('B'.$fila, $rows['apellido_1']); 
        $objPHPExcel->getActiveSheet()->setCellValue('C'.$fila, $rows['apellido_2']); 
        $objPHPExcel->getActiveSheet()->setCellValue('D'.$fila, $rows['nombre']); 
        $objPHPExcel->getActiveSheet()->setCellValue('E'.$fila, $rows['analistaCap']); 
        $objPHPExcel->getActiveSheet()->setCellValue('F'.$fila, $rows['fechaIngreso']);

	// Write the file
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, $fileType);
	        //$objWriter->save("fomopeDESCARGA.xlsx");


	    $writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

	    header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
	    header('Content-Disposition: attachment;filename='."volanteRechazo".$row[].".xlsx");
	    header('Cache-Control: max-age=0');


	    ob_end_clean();



	    $writer->save('php://output');
 ?>