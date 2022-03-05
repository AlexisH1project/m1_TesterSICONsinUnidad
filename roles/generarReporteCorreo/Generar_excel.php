<?php


    // class Generar_excel
    // {
    //     public function __construct(){

    //     }
	
	function llenar_info_excel_eventual($imprimirRow , $estaus){
		
		include "../configuracion.php";
		// require "../librerias/conexion_excel.php";
		// include '../librerias/Classes/PHPExcel/IOFactory.php';

			$hoy = "select CURDATE()";
			$tiempo ="select curTime()";
		
				 if ($resultHoy = mysqli_query($conexion,$hoy) AND $resultTime = mysqli_query($conexion,$tiempo)) {
						 $row = mysqli_fetch_row($resultHoy);
						 $row2 = mysqli_fetch_row($resultTime);
						 $hora = str_replace ( ":", '',$row2[0] ); 
						 $fecha = str_replace ( "-", '',$row[0] ); 
						 $el_id_file = $fecha.$hora;
				 }
		// 	//----------------Sacamos la Hora 
		// 	$fileType = 'Excel5';
		// 	$fileName = 'reporteFiltro.xls';

		// 	// Read the file
		// 	$objReader = PHPExcel_IOFactory::createReader($fileType);
		// 	$objPHPExcel = $objReader->load($fileName);


		// 	$fila = 8;
		// 	$estiloTituloColumnas = array(
		// 		'font' => array(
		// 			'name'  => 'Calibri',
		// 			'size' =>8,
		// 			'color' => array(
		// 				'rgb' => '000000'
		// 			)
		// 		),
		// 		'borders' => array(
		// 			'allborders' => array(
		// 				'style' => PHPExcel_Style_Border::BORDER_THIN
		// 			)
		// 		),
		// 		'alignment' =>  array(
		// 			'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		// 			'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
		// 		)
		// 	);
		// 				$estiloInformacion = new PHPExcel_Style();

		// 					$estiloInformacion->applyFromArray( array(
		// 						'font' => array(
		// 							'name'  => 'Calibri',
		// 							'size' =>11,
		// 							'color' => array(
		// 								'rgb' => '000000'
		// 							)
		// 						),
		// 						'fill' => array(
		// 							'type'  => PHPExcel_Style_Fill::FILL_SOLID
		// 						),
		// 						'borders' => array(
		// 							'allborders' => array(
		// 								'style' => PHPExcel_Style_Border::BORDER_THIN
		// 							)
		// 						),
		// 						'alignment' =>  array(
		// 							'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		// 							'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
		// 						)
		// 					));

		// 					$tamanio = count($imprimirRow);
		// 					// echo "el dato es el siguiente:::::::".$tamanio;
		// 					for ($i=0; $i <$tamanio ; $i++) { 
		// 						$objPHPExcel->setActiveSheetIndexByName('rep_qna');
		// 						$objPHPExcel->getActiveSheet()->setCellValue('A'.$fila, $imprimirRow[0][26]); 
		// 						$objPHPExcel->getActiveSheet()->setCellValue('B'.$fila, $imprimirRow[0][71]); 
		// 						$objPHPExcel->getActiveSheet()->setCellValue('C'.$fila, $imprimirRow[0][3]); //qna 
		// 						$objPHPExcel->getActiveSheet()->setCellValue('D'.$fila, $imprimirRow[0][48]); // fecha autorizacion
		// 						$objPHPExcel->getActiveSheet()->setCellValue('E'.$fila, $imprimirRow[0][47]); // persona asignada  
		// 						$objPHPExcel->getActiveSheet()->setCellValue('F'.$fila, $imprimirRow[0][7]);  // rfc 
		// 						$objPHPExcel->getActiveSheet()->setCellValue('G'.$fila, $imprimirRow[0][8]); // ap_p
		// 						$objPHPExcel->getActiveSheet()->setCellValue('H'.$fila, $imprimirRow[0][9]); // ap_m
		// 						$objPHPExcel->getActiveSheet()->setCellValue('I'.$fila, $imprimirRow[0][10]); // nombre 
		// 						$objPHPExcel->getActiveSheet()->setCellValue('J'.$fila, $imprimirRow[0][5]); // tipo de movimiento 
		// 			// sacammos descripcion del mov
		// 						$sql_desc = "SELECT * FROM ct_movimientosrh WHERE cod_mov =".$imprimirRow[0][5];
		// 						if($res_desc = mysqli_query($conexion, $sql_desc)){
		// 							$row_desc = mysqli_fetch_assoc($res_desc);
		// 							$objPHPExcel->getActiveSheet()->setCellValue('K'.$fila, $row_desc['tipo_mov']); // descripcion del mov
		// 						}
		// 						$objPHPExcel->getActiveSheet()->setCellValue('L'.$fila, strtoupper($estaus[$i])); // estatus
					
		// 						$fila++;
								
		// 					}

		// 					$fila--;
		// 					$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A8:L".$fila);
		// 					$objPHPExcel->getActiveSheet()->getStyle("A8:L".$fila)->applyFromArray($estiloTituloColumnas);
		// 			// Write the file
		// 					$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, $fileType);
		// 					//$objWriter->save("fomopeDESCARGA.xlsx");
		// 					$writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		// 					header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
		// 					header('Content-Disposition: attachment;filename='."reporte.xlsx");
		// 					header('Cache-Control: max-age=0');
		// 					ob_end_clean();
		// 					$writer->save('./archivo_'.$el_id_file.'.xls'); //php://output
		echo "el archivo es:: ".$el_id_file;
        }

    // }

?>