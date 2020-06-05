
<?php

	//require 'Classes/PHPExcel.php';
    include "../configuracion.php";
    require "../librerias/conexion_excel.php";

	include '../librerias/Classes/PHPExcel/IOFactory.php';

		$fileType = 'Excel5';
		$fileName = 'reporteAnalista.xls';

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

      /*      if ($laFecha1Buscada == ""){
                            echo "<script> alert('Existe un error al guardar el archivo'); window.location.href = '../lulu.php?usuario_rol=$nombreUsuario'</script>";
            }else{*/

            	if($laFecha2Buscada != 0){
            			$sql = "SELECT unidad, apellido_1, apellido_2, nombre, fechaIngreso, analistaCap FROM fomope WHERE fechaIngreso BETWEEN '$laFecha1Buscada' AND '$laFecha2Buscada' AND analistaCap = '$analistBuscada'";

            	}else{

	          		$sql = "SELECT unidad, apellido_1, apellido_2, nombre, fechaIngreso, analistaCap FROM fomope WHERE fechaIngreso = '$laFecha1Buscada' AND analistaCap = '$analistBuscada'";

            	}
                        if($resultado = $mysqli->query($sql)){
                                $resR = mysqli_query($conexion,$sql);
                                $elResultado2 = mysqli_fetch_row($resR);

	                            if(mysqli_num_rows($resultado) > 0){
                            	
	                              while($rows = $resultado->fetch_assoc()){
	                                $objPHPExcel->getActiveSheet()->setCellValue('A'.$fila, $rows['unidad']); 
	                                $objPHPExcel->getActiveSheet()->setCellValue('B'.$fila, $rows['apellido_1']); 
	                                $objPHPExcel->getActiveSheet()->setCellValue('C'.$fila, $rows['apellido_2']); 
	                                $objPHPExcel->getActiveSheet()->setCellValue('D'.$fila, $rows['nombre']); 
	                                $objPHPExcel->getActiveSheet()->setCellValue('E'.$fila, $rows['analistaCap']); 
	                                $objPHPExcel->getActiveSheet()->setCellValue('F'.$fila, $rows['fechaIngreso']);
	                                $fila++;
	                            	}
	                                $fila--;
	                            	$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A8:F".$fila);
									$objPHPExcel->getActiveSheet()->getStyle("A8:F".$fila)->applyFromArray($estiloTituloColumnas);

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
