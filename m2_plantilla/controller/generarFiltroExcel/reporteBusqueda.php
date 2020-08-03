
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


			for ($row = 2; $row <= $highestRow; $row++){ 

					if($sheet->getCell("A".$row)->getValue() == ""){
						if($row == $highestRow){
							break;
						}
						$row++;
					}
					echo $sheet->getCell("A".$row)->getValue()." - ";
					echo $sheet->getCell("B".$row)->getValue()." - ";
					echo $sheet->getCell("C".$row)->getValue()." - ";
					echo $sheet->getCell("D".$row)->getValue()." - ";
					echo $sheet->getCell("E".$row)->getValue()." - ";
					echo $sheet->getCell("F".$row)->getValue()." - ";
					echo $sheet->getCell("G".$row)->getValue()." - ";
					echo $sheet->getCell("H".$row)->getValue()." - ";
					echo $sheet->getCell("I".$row)->getValue()." - ";
					echo $sheet->getCell("J".$row)->getValue()." - ";
					echo $sheet->getCell("K".$row)->getValue()." - ";
					echo $sheet->getCell("L".$row)->getValue()." - ";
					echo $sheet->getCell("M".$row)->getValue()." - ";
					echo $sheet->getCell("N".$row)->getValue()." - ";
					echo $sheet->getCell("O".$row)->getValue()." - ";
					echo $sheet->getCell("P".$row)->getValue()." - ";
					echo $sheet->getCell("Q".$row)->getValue()." - ";
					echo $sheet->getCell("R".$row)->getValue()." - ";
					echo $sheet->getCell("S".$row)->getValue()." - ";
					echo $sheet->getCell("T".$row)->getValue()." - ";
					echo $sheet->getCell("U".$row)->getValue()." - ";
					echo $sheet->getCell("V".$row)->getValue()." - ";
					echo $sheet->getCell("W".$row)->getValue()." - ";
					echo $sheet->getCell("X".$row)->getValue()." - ";
					echo $sheet->getCell("Y".$row)->getValue()." - ";
					echo $sheet->getCell("Z".$row)->getValue()." - ";

					echo "\n";

			}
      
?>
