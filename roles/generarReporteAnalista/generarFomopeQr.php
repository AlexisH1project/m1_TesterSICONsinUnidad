
<?php

	//require 'Classes/PHPExcel.php';
    include "../configuracion.php";
    require "../librerias/conexion_excel.php";

	include '../librerias/Classes/PHPExcel/IOFactory.php';

		$fileType = 'Excel5';
		$fileName = 'reporteAnalistaQr.xls';

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

			$analistBuscada = $_POST['analista'];
            $laFecha1Buscada = $_POST['fechaImp1'];
            $laFecha2Buscada = $_POST['fechaImp2'];
            $nombreUser = $_POST['nombreUsuario'];
			

            	if($laFecha2Buscada != 0){
            			$sql = "SELECT * FROM conteo_qr WHERE fecha BETWEEN '$laFecha1Buscada' AND '$laFecha2Buscada' AND analistaAsignada = '$analistBuscada'";

            	}else{

	          		$sql = "SELECT * FROM conteo_qr WHERE fecha = '$laFecha1Buscada' AND analistaAsignada = '$analistBuscada'";

            	}
                        if($resultado = $mysqli->query($sql)){
                                $resR = mysqli_query($conexion,$sql);
                                $elResultado2 = mysqli_fetch_row($resR);

	                            if(mysqli_num_rows($resultado) > 0){
                            	
	                              while($rows = $resultado->fetch_assoc()){
	                                $objPHPExcel->getActiveSheet()->setCellValue('A'.$fila, $rows['curp']); 
	                                $objPHPExcel->getActiveSheet()->setCellValue('B'.$fila, $rows['rfc']); 
	                                $objPHPExcel->getActiveSheet()->setCellValue('C'.$fila, $rows['qna']); 
	                                $objPHPExcel->getActiveSheet()->setCellValue('D'.$fila, $rows['analistaAsignada']); 
	                                $objPHPExcel->getActiveSheet()->setCellValue('E'.$fila, $rows['usuarioAgrego']); 
	                                $objPHPExcel->getActiveSheet()->setCellValue('F'.$fila, $rows['fecha']);
	                                $objPHPExcel->getActiveSheet()->setCellValue('G'.$fila, $rows['unidad']);
	                                $fila++;
	                            	}
	                                $fila--;
	                            	$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A8:G".$fila);
									$objPHPExcel->getActiveSheet()->getStyle("A8:G".$fila)->applyFromArray($estiloTituloColumnas);

                        //  $objPHPExcel->getActiveSheet()->setCellValue('A77', $id_movimiento."- ".$descripcionCortaM."\n".$justificacion); 

								

                            // Write the file
		                            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, $fileType);
		                            //$objWriter->save("fomopeDESCARGA.xlsx");


		                        $writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

		                        header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
		                        header('Content-Disposition: attachment;filename='.$analistBuscada.".xlsx");
		                        header('Cache-Control: max-age=0');


		                        ob_end_clean();



		                        $writer->save('php://output');
			                    }else{

			                            echo "<script> alert('La informacion agregada no es correcta o no se encontro coincidencia , vuelve a intentar'); window.location.href = '../generarReporte.php?usuario_rol=$nombreUser'</script>";

			                    }

                        }else{
                            echo "<script> alert('Existe error en la busqueda'); window.location.href = '../generarReporte.php?usuario_rol=$nombreUser'</script>";

                        }
      
?>
