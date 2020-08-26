
<?php

	//require 'Classes/PHPExcel.php';
    require "../librerias/conexion_excel.php";

	include '../librerias/Classes/PHPExcel/IOFactory.php';

		$fileType = 'Excel5';
		$archivo = 'reporteFiltro.xls';

		// Read the file
		$inputFileType = PHPExcel_IOFactory::identify($archivo);
		$objReader = PHPExcel_IOFactory::createReader($inputFileType);

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

			$objPHPExcel = $objReader->load($archivo);
			$sheet = $objPHPExcel->getSheet(0); 
			$highestRow = $sheet->getHighestRow(); 
			$highestColumn = $sheet->getHighestColumn();

			echo $highestRow . "\n";
			echo $highestColumn . "\n";

			//Creamos array para asignar los valores de las columnas y poder recorrer el arreglo y saber si el valor es vacio 
			$columnasExcel = array(1 => "A",
			 						2 => "B",
			 						3 => "C",
			 						4 => "D", 
			 						5 => "E",
			 						6 =>"F",
			 						7 => "G",
			 						8 => "H",
			 						9 => "I",
			 						10 => "J",
			 						11 => "K",
			 						12 => "L",
			 						13 => "M",
			 						14 => "N",
			 						15 => "O",
			 						16 => "P",
			 						17 => "Q",
			 						18 => "R",
			 						19 => "S",
			 						20 => "T",
			 						21 => "U",
			 						22 => "V",
			 						23 => "W",
			 						24 => "X",
			 						25 => "Y",
			 						26 => "Z");

			for ($row = 2; $row <= $highestRow; $row++){ 
				$alertaElim = 0;
				if($row == $highestRow){
					break;
				}

				for ($i=1; $i < count($columnasExcel)-1 ; $i++) { 
						//echo $sheet->getCell($columnasExcel[$i].$row)->getValue()." - ";
						if($sheet->getCell($columnasExcel[$i].$row)->getValue() == ""){
							//echo "<script> alert('Hay columna en blanco'); </script>";

							$alertaElim = 1;
							//$row++;
							break;
							//$row++;
						}
				}

				if($alertaElim == 0){
					for ($j=1; $j < count($columnasExcel)-1 ; $j++) { 
						echo $sheet->getCell($columnasExcel[$j].$row)->getValue()." - ";
					}
					echo "\n";
				}
			}
?>
