
<?php

    include "../configuracion.php";
	include "../Controller/Correo.php";
//     require "../librerias/conexion_excel.php";

// 	include '../librerias/Classes/PHPExcel/IOFactory.php';

// 		$fileType = 'Excel5';
// 		$fileName = 'reporte_ev.xls';

// 		// Read the file
// 		$objReader = PHPExcel_IOFactory::createReader($fileType);
// 		$objPHPExcel = $objReader->load($fileName);


// 	   $fila = 8;
// 	   $estiloTituloColumnas = array(
//     	'font' => array(
// 			'name'  => 'Calibri',
// 			'size' =>8,
// 			'color' => array(
// 				'rgb' => '000000'
// 			)
//     	),
//     	'borders' => array(
// 			'allborders' => array(
// 				'style' => PHPExcel_Style_Border::BORDER_THIN
// 			)
//     	),
//     	'alignment' =>  array(
// 			'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
// 			'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
//     	)
// 	);
// 		$estiloInformacion = new PHPExcel_Style();

// 			$estiloInformacion->applyFromArray( array(
// 		    	'font' => array(
// 					'name'  => 'Calibri',
// 					'size' =>11,
// 					'color' => array(
// 						'rgb' => '000000'
// 					)
// 		    	),
// 		    	'fill' => array(
// 					'type'  => PHPExcel_Style_Fill::FILL_SOLID
// 				),
// 		    	'borders' => array(
// 					'allborders' => array(
// 						'style' => PHPExcel_Style_Border::BORDER_THIN
// 					)
// 		    	),
// 				'alignment' =>  array(
// 					'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
// 					'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
// 		    	)
// 			));

//             // $nombreUser = $_POST['usuario_rol'];
//             $total_estatus = $_POST['contador_estatus']-1;
// // ********************** recibir todos los estatus
// 			$array_estatus[0] = '';
// 			for($c_estatus=0; $c_estatus <= $total_estatus; $c_estatus++){
// 				$array_estatus[$c_estatus] = $_POST['estatus'.$c_estatus];
// 				echo $array_estatus[$c_estatus] .'<br>';
// 			}
// // ************************* Terminamos de asignar los estatus al arreglo 
// 			$arr = unserialize(base64_decode($_POST['array_busqueda']));
// 		if($arr[1][0] != NULL ){   // ponemos esa posicion de arreglo ya que en el nos damos cuenta si no se agrego algun dato mas ya que por defaul en la posicion [0][0] se agrga un 0
// 				$tamanio = count($arr);
// 				for($i=0; $i<$tamanio; $i++){
// 					$sqlImp  = "SELECT * FROM fomope_qr WHERE id_movimiento_qr = '$arr[$i]'";
// 					if($resImp = mysqli_query($conexion, $sqlImp)){
// 						$imprimirRow = mysqli_fetch_row($resImp);
// 						// if($botonAccion == 'Reporte Fomopes Operados' && ( $estadoF == 'DSPO Rechazo' || $estadoF == 'Unidad Edición' || $estadoF == 'DDSCH Autorización' || $estadoF == 'DDSCH Edición' || $estadoF == 'Eliminado')){
// 						// 	continue;
// 						// }
// 						$objPHPExcel->setActiveSheetIndexByName('Eventuales');
// 						$objPHPExcel->getActiveSheet()->setCellValue('A'.$fila, $imprimirRow[26]); 
// 		                $objPHPExcel->getActiveSheet()->setCellValue('B'.$fila, $imprimirRow[71]); 
// 		                $objPHPExcel->getActiveSheet()->setCellValue('C'.$fila, $imprimirRow[3]); 
// 		                $objPHPExcel->getActiveSheet()->setCellValue('D'.$fila, $imprimirRow[7]); 
// 		                $objPHPExcel->getActiveSheet()->setCellValue('E'.$fila, $imprimirRow[8]); 
// 		                $objPHPExcel->getActiveSheet()->setCellValue('F'.$fila, $imprimirRow[9]);
// 		                $objPHPExcel->getActiveSheet()->setCellValue('G'.$fila, $imprimirRow[10]);
// 		                $objPHPExcel->getActiveSheet()->setCellValue('H'.$fila, $imprimirRow[5]);
// 		                $objPHPExcel->getActiveSheet()->setCellValue('I'.$fila, $array_estatus[$i]);
	
// 		                $fila++;
// 					}else{
// 						echo "hay fallas";
// 					}
// 				}    
   
//                         $fila--;
//                     	$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A8:I".$fila);
// 						$objPHPExcel->getActiveSheet()->getStyle("A8:I".$fila)->applyFromArray($estiloTituloColumnas);
//                 // Write the file
//                         $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, $fileType);
//                         //$objWriter->save("fomopeDESCARGA.xlsx");


//                     $writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

//                     header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
//                     header('Content-Disposition: attachment;filename='."reporte.xlsx");
//                     header('Cache-Control: max-age=0');


//                     ob_end_clean();



//                     $writer->save('php://output');
                

//             }else{
//                 echo "<script> alert('No hay informacion de busqueda para generar reporte');</script>"; //  window.location.href = '../reporte_correo_ev.php?usuario_rol=$nombreUser'

//             }
			
		$generar_correo = new Correo();
		echo $generar_correo->enviar();
?>
