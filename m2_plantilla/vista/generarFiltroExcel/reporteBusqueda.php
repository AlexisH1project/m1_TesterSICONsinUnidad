
<?php

	//require 'Classes/PHPExcel.php';
    include "../../controller/librerias/configuracion.php";
    require "../../controller/librerias/conexion_excel.php";

	include '../../controller/librerias/Classes/PHPExcel/IOFactory.php';

		$fileType = 'Excel5';
		$fileName = 'reporteFiltro.xls';

		// Read the file
		$objReader = PHPExcel_IOFactory::createReader($fileType);
		$objPHPExcel = $objReader->load($fileName);


	   $fila = 8;
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

//            $nombreUser = $_POST['usuario_rol'];
			$arr = unserialize(stripslashes($_POST['array']));
			$arr2 = unserialize(stripslashes($_POST['array2']));

							//echo($arr[0]);
							// foreach($arr as $nombre=>$telefono)
				   //          {
				   //             // echo "<br>".$nombre." => ".$telefono;
				   //                 echo "{$nombre} => {$telefono} ";
				   //          }
				$tamanio = count($arr);
				$tamanio2 = count($arr2);
						var_dump($arr[1]);
		if($tamanio > 0 OR $tamanio2>0){
			if($tamanio>0){
				for($i=0; $i<$tamanio; $i++){
					$sqlImp  = "SELECT * FROM plazas_ctrlp_m2 WHERE id_plaza = '$arr[$i]'";
					if($resImp = mysqli_query($conexion, $sqlImp)){
						$imprimirRow = mysqli_fetch_row($resImp);
						switch ($imprimirRow[1]) {
											case 'negro1':
												$estadoF = 'DDSCH Rechazo';
												break;
											case 'negro':
												$estadoF = 'Unidad Edición';
												break;
											case 'amarillo':
												$estadoF = 'DSPO captura';
												break;		
											case 'amarillo0':
												$estadoF = 'DDSCH Autorización';
												break;
											case 'cafe':
												$estadoF = 'DSPO Autorización';
												break;	
											case 'naranja':
												$estadoF = 'DIPSP Autorización';
												break;
											case 'azul':
												$estadoF= 'DGRHO Autorización';
												break;
											case 'rosa':
												$estadoF = 'DSPO nomina';
												break;		
											case 'verde':
												$estadoF = 'DDSCH loteo';
												break;
											case 'verde2':
												$estadoF = 'DDSCH Autorización Loteo';
												break;	
											case 'gris':
												$estadoF = 'DDSCH Edición';
												break;
											case 'guinda':
												$estadoF = 'Finalizado';
												break;		
											default:
												
												break;
										}
										$objPHPExcel->setActiveSheetIndexByName('Hoja1');
						$objPHPExcel->getActiveSheet()->setCellValue('A'.$fila, $imprimirRow[0]); 
		                $objPHPExcel->getActiveSheet()->setCellValue('B'.$fila, $estadoF); 
		                $objPHPExcel->getActiveSheet()->setCellValue('C'.$fila, $imprimirRow[2]); 
		                $objPHPExcel->getActiveSheet()->setCellValue('D'.$fila, $imprimirRow[3]); 
		                $objPHPExcel->getActiveSheet()->setCellValue('E'.$fila, $imprimirRow[4]); 
		                $objPHPExcel->getActiveSheet()->setCellValue('F'.$fila, $imprimirRow[5]);
		                $objPHPExcel->getActiveSheet()->setCellValue('G'.$fila, $imprimirRow[6]);
		                $objPHPExcel->getActiveSheet()->setCellValue('H'.$fila, $imprimirRow[7]);
		                $objPHPExcel->getActiveSheet()->setCellValue('I'.$fila, $imprimirRow[8]);
		                $objPHPExcel->getActiveSheet()->setCellValue('J'.$fila, $imprimirRow[9]);
		                $objPHPExcel->getActiveSheet()->setCellValue('K'.$fila, $imprimirRow[10]);
		                $objPHPExcel->getActiveSheet()->setCellValue('L'.$fila, $imprimirRow[11]);
		                $objPHPExcel->getActiveSheet()->setCellValue('M'.$fila, $imprimirRow[12]);
		                $objPHPExcel->getActiveSheet()->setCellValue('N'.$fila, $imprimirRow[13]);
		                $objPHPExcel->getActiveSheet()->setCellValue('O'.$fila, $imprimirRow[14]);
		                $objPHPExcel->getActiveSheet()->setCellValue('P'.$fila, $imprimirRow[15]);
		                $objPHPExcel->getActiveSheet()->setCellValue('Q'.$fila, $imprimirRow[16]);
		                $objPHPExcel->getActiveSheet()->setCellValue('R'.$fila, $imprimirRow[17]);
		                $objPHPExcel->getActiveSheet()->setCellValue('S'.$fila, $imprimirRow[18]);
		                $objPHPExcel->getActiveSheet()->setCellValue('T'.$fila, $imprimirRow[19]);
		                $objPHPExcel->getActiveSheet()->setCellValue('U'.$fila, $imprimirRow[20]);
		                $objPHPExcel->getActiveSheet()->setCellValue('V'.$fila, $imprimirRow[21]);
		                $objPHPExcel->getActiveSheet()->setCellValue('W'.$fila, $imprimirRow[22]);
		                $objPHPExcel->getActiveSheet()->setCellValue('X'.$fila, $imprimirRow[23]);
		                $objPHPExcel->getActiveSheet()->setCellValue('Y'.$fila, $imprimirRow[24]);
		                $objPHPExcel->getActiveSheet()->setCellValue('Z'.$fila, $imprimirRow[25]);
						$objPHPExcel->getActiveSheet()->setCellValue('AA'.$fila, $imprimirRow[26]); 
						$objPHPExcel->getActiveSheet()->setCellValue('AB'.$fila, $imprimirRow[27]); 
						$objPHPExcel->getActiveSheet()->setCellValue('AC'.$fila, $imprimirRow[28]); 
						$objPHPExcel->getActiveSheet()->setCellValue('AD'.$fila, $imprimirRow[29]); 
						$objPHPExcel->getActiveSheet()->setCellValue('AE'.$fila, $imprimirRow[30]); 
					

		                $fila++;
					}else{
						echo "hay fallas";
					}
				}    
   
                        $fila--;
                    	$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A8:AE".$fila);
						$objPHPExcel->getActiveSheet()->getStyle("A8:AY".$fila)->applyFromArray($estiloTituloColumnas);
				}	
				



                // Write the file
                        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, $fileType);
                        //$objWriter->save("fomopeDESCARGA.xlsx");


                    $writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

                    header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
                    header('Content-Disposition: attachment;filename='."reporte.xlsx");
                    header('Cache-Control: max-age=0');


                    ob_end_clean();



                    $writer->save('php://output');
                

            }else{
                echo "<script> alert('No hay informacion de busqueda para generar reporte'); window.location.href = '../consultaEstado.php?usuario_rol=$nombreUser'</script>";

            }
			
      
?>
