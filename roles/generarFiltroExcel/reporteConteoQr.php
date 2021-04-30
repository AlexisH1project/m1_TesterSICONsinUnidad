
<?php

	//require 'Classes/PHPExcel.php';
    include "../configuracion.php";
    require "../librerias/conexion_excel.php";

	include '../librerias/Classes/PHPExcel/IOFactory.php';

		$fileType = 'Excel5';
		$fileName = 'reporteConteoQr.xls';

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

            $nombreUser = $_POST['usuario_rol'];
            $botonAccion = $_POST['accionBoton'];
			$arr = unserialize(stripslashes($_POST['array']));
							//echo($arr[0]);
							// foreach($arr as $nombre=>$telefono)
				   //          {
				   //             // echo "<br>".$nombre." => ".$telefono;
				   //                 echo "{$nombre} => {$telefono} ";
				   //          }
					
		if($arr[1][0] != NULL){   // ponemos esa posicion de arreglo ya que en el nos damos cuenta si no se agrego algun dato mas ya que por defaul en la posicion [0][0] se agrga un 0
			if($arr[1][0] != NULL){
				$tamanio = count($arr);
				for($i=0; $i<$tamanio; $i++){
					$sqlImp  = "SELECT * FROM conteo_qr WHERE id_cont = '$arr[$i]'";
					if($resImp = mysqli_query($conexion, $sqlImp)){
						$imprimirRow = mysqli_fetch_row($resImp);
						// if($botonAccion == 'Reporte Fomopes Operados' ){
						// 	continue;
						// }
						$objPHPExcel->setActiveSheetIndexByName('CONTEO QR');
						$objPHPExcel->getActiveSheet()->setCellValue('A'.$fila, $imprimirRow[1]); 
		                $objPHPExcel->getActiveSheet()->setCellValue('B'.$fila, $imprimirRow[2]); 
		                $objPHPExcel->getActiveSheet()->setCellValue('C'.$fila, $imprimirRow[3]); 
		                $objPHPExcel->getActiveSheet()->setCellValue('D'.$fila, $imprimirRow[4]); 
		                $objPHPExcel->getActiveSheet()->setCellValue('E'.$fila, $imprimirRow[5]); 
		                $objPHPExcel->getActiveSheet()->setCellValue('F'.$fila, $imprimirRow[6]);
		                $objPHPExcel->getActiveSheet()->setCellValue('G'.$fila, $imprimirRow[7]);
		                $objPHPExcel->getActiveSheet()->setCellValue('H'.$fila, $imprimirRow[8]);
		                $fila++;
					}else{
						echo "hay fallas";
					}
				}    
   
                        $fila--;
                    	$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A7:H".$fila);
						$objPHPExcel->getActiveSheet()->getStyle("A7:H".$fila)->applyFromArray($estiloTituloColumnas);
		}
                // Write the file
                        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, $fileType);
                        //$objWriter->save("fomopeDESCARGA.xlsx");


                    $writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

                    header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
                    header('Content-Disposition: attachment;filename='."reporteConteoQr.xlsx");
                    header('Cache-Control: max-age=0');


                    ob_end_clean();



                    $writer->save('php://output');
                

            }else{
                echo "<script> alert('No hay informacion de busqueda para generar reporte');</script>"; // window.location.href = '../consultaEstado.php?usuario_rol=$nombreUser'

            }
			
      
?>
