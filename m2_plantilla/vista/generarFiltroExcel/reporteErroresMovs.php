
<?php
	include "../../controller/librerias/configuracion.php";
	require "../../controller/librerias/conexion_excel.php";
	
	include '../../controller/librerias/Classes/PHPExcel/IOFactory.php';
	
	$fileType = 'Excel5';
	$fileName = 'reporteError.xls';
	
	$objReader = PHPExcel_IOFactory::createReader($fileType);
	$objPHPExcel = $objReader->load($fileName);	
	$arr = $_POST['arrayErr'];
	// $resultado = str_replace('"', "'", utf8_encode($arr));
	// $arrS = unserialize($arr);
	// var_export(unserialize(stripslashes($arr)));
	// print_r(unserialize(stripslashes($arr)));
	// print_r(unserialize(base64_decode($arr)));
	$resultArr = unserialize(base64_decode($arr));
	// echo $resultArr[3]['folio_shcp'];
	// print_r($resultado);
				// Read the file
							$objReader = PHPExcel_IOFactory::createReader($fileType);
							$objPHPExcel = $objReader->load($fileName);
							   $fila = 2;
							   $estiloTituloColumnas = array(
								'font' => array(
									'name'  => 'Calibri',
									'size' =>8,
									'color' => array(
										'rgb' => '000000'
									)
								),
								'borders' => array(
									'allborders' => array(
										'style' => PHPExcel_Style_Border::BORDER_THIN
									)
								),
								'alignment' =>  array(
									'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
									'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
								)
							);
								$estiloInformacion = new PHPExcel_Style();
								$estiloInformacion->applyFromArray( array(
									'font' => array(
										'name'  => 'Calibri',
										'size' =>11,
										'color' => array(
											'rgb' => '000000'
										)
									),
									'fill' => array(
										'type'  => PHPExcel_Style_Fill::FILL_SOLID
									),
									'borders' => array(
										'allborders' => array(
											'style' => PHPExcel_Style_Border::BORDER_THIN
										)
									),
									'alignment' =>  array(
										'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
										'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
									)
								));
									
								// if($arr[1][0] != NULL ){   // ponemos esa posicion de arreglo ya que en el nos damos cuenta si no se agrego algun dato mas ya que por defaul en la posicion [0][0] se agrga un 0
										$tamanio = count($resultArr);
										for($i=0; $i<$tamanio; $i++){
												$objPHPExcel->setActiveSheetIndexByName('Hoja1');
												$objPHPExcel->getActiveSheet()->setCellValue('A'.$fila, $resultArr[$i]['folio_shcp']); 
												$objPHPExcel->getActiveSheet()->setCellValue('B'.$fila, $resultArr[$i]['estatus']); 
												// $objPHPExcel->getActiveSheet()->setCellValue('C'.$fila, $resultArr[$i]['motivo_mov']); 
												$objPHPExcel->getActiveSheet()->setCellValue('C'.$fila, $resultArr[$i]['cfp']); 
												$objPHPExcel->getActiveSheet()->setCellValue('D'.$fila, $resultArr[$i][0]); 
						
												$fila++;
										}    
												$fila--;
												$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A2:D".$fila);
												$objPHPExcel->getActiveSheet()->getStyle("A2:D".$fila)->applyFromArray($estiloTituloColumnas);
										// Write the file
												$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, $fileType);
												$writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
						
											header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
											header('Content-Disposition: attachment;filename='."reporte.xlsx");
											header('Cache-Control: max-age=0');
											ob_end_clean();
											$writer->save('php://output');
						
								// 	}else{
								// 		echo "<script> alert('No hay informacion de busqueda para generar reporte');</script>"; // window.location.href = '../consultaEstado.php?usuario_rol=$nombreUser'
						
								// 	}
?>
