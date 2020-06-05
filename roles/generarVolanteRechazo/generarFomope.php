

<!DOCTYPE html>
<html>
<head>
	
</head>
<body>
	
		
		<?php

				require "../librerias/conexion_excel.php";
				include "../configuracion.php";
				include '../librerias/Classes/PHPExcel/IOFactory.php';
			
				$fileType = 'Excel5';
				$fileName = 'rechazoT.xls';

				// Read the file
				$objReader = PHPExcel_IOFactory::createReader($fileType);
				$objPHPExcel = $objReader->load($fileName);
				$fecha_recibido =$_POST['fechareci'];
				$motivoR = $_POST['comentarioR'];
				$idfom = $_POST['noFomope'];
				//header ('Content-type: text/html; charset=utf-8');

				$sqlUnidad = "SELECT unidad , rfc FROM fomope WHERE id_movimiento = '$idfom' ";
				if($resUni = mysqli_query($conexion, $sqlUnidad)){
					$rowUni = mysqli_fetch_row($resUni);
					$objPHPExcel->getActiveSheet()->setCellValue('G7',$fecha_recibido); 
			        $objPHPExcel->getActiveSheet()->setCellValue('C9', $_POST['cod2_1']); 
			        $objPHPExcel->getActiveSheet()->setCellValue('C13', $rowUni[0]); 
			        $objPHPExcel->getActiveSheet()->setCellValue('C18', $motivoR); 

				// Write the file
			        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, $fileType);
				        //$objWriter->save("fomopeDESCARGA.xlsx");


				    $writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

				    header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
				    header('Content-Disposition: attachment;filename='."volanteRechazo_".$rowUni[1].".xlsx");
				    header('Cache-Control: max-age=0');
				    ob_end_clean();
				  
			   		$writer->save('php://output');
			   		exit();

					          		 
				}

?>
</body>
</html>

