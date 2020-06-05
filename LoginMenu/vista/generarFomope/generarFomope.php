
<?php

	//require 'Classes/PHPExcel.php';
    include "configuracion.php";

	include 'Classes/PHPExcel/IOFactory.php';

		$fileType = 'Excel5';
		$fileName = 'fomopeBlanco.xls';

		// Read the file
		$objReader = PHPExcel_IOFactory::createReader($fileType);
		$objPHPExcel = $objReader->load($fileName);


		$noFomope = $_GET['noFomope'];
			// echo $noFomope;
			$consulta2 = " SELECT * FROM fomopesRegistrados WHERE id_fomope = $noFomope";

	        if($resultado2 = mysqli_query($conexion,$consulta2)){
        		$row = mysqli_fetch_assoc($resultado2);
        		$id_ur = $row['unidad_expedidora'];
        		$lugarFecha = $row['lugfech_expedicion'];
        		$CURP = $row['curp'];

                $sexo = str_split($CURP);

                if($sexo[10] == 'M'){
                    $sexo ="MUJER";
                }else if($sexo[10] == 'H'){
                    $sexo ="HOMBRE";                    
                }

        		$fechaIngreso = $row['fechaIngreso'];
        		$fechaSiguiente = $row['fechaSiguiente'];
        		$dependencia = $row['dependencia'];
        		$dp_ap = $row['dp_ap'];
        		$dp_unidad = $row['dp_unidad'];
				$dp_partida	 = $row['dp_partida'];
				$dp_codigo	 = $row['dp_codigo'];
				$dp_pg	 = $row['dp_pg'];
				$dp_ai	 = $row['dp_ai'];
				$dp_gf = $row['dp_gf'];
				$dp_funcion	 = $row['dp_funcion'];
				$dp_subfuncion	 = $row['dp_subfuncion'];
				$dp_puesto = $row['dp_puesto'];
				$clave_cresponS = $row['clave_centrorespon'];
        		$CURPsustituido = $row['CURPsustituido'];
        		$efectosdel = $row['efectosdel'];
        		$efectosal = $row['efectosal'];

        		$motivo = $row['motivo'];

        		$numerodocumentoanterior = $row['no_documento'];
        		$vigenciadel = $row['fechvigencia_del'];
        		$vigenciaal = $row['fechvigencia_al'];
        		$noDocumento = $row['no_documentovigencia'];
        		$noEmpleado = $row['no_empleado'];
        		$tipoTrabajador = $row['tipo_trabajador'];
        		$lote = $row['lote'];
        		$qna = $row['qna'];
        		$id_movimiento = $row['tipomov_codigo'];
        		$clave_crespon = $row['clave_crespon'];
        		$noConcurso = $row['concurso'];

        		
        		$ap = $row['cp_ap'];
        		$unidad = $row['cp_unidad'];
        		$partida = $row['cp_partida'];
        		$codigo = $row['cp_codigo'];
        		$pg = $row['cp_pg'];
        		$ai = $row['cp_ai'];
        		$gf = $row['cp_gf'];
        		$funcion = $row['cp_funcion'];
        		$subfuncion = $row['cp_subfuncion'];
        		$puesto = $row['cp_puesto'];
        		$grupo = $row['grupo'];
        		$grado = $row['grado'];
        		$nivel = $row['nivel'];

        		$tipo_mando = $row['tipo_mando'];
        		$horario = $row['horas_laborales'];
        		$part1 = $row['partida_presupuestal'];
        		$anterior1 = $row['anterior'];
        		$actual1 = $row['actual'];

        		$part2 = $row['partida_presupuestal_2'];
        		$anterior2 = $row['anterior_2'];
        		$actual2 = $row['actual_2'];

        		$part3 = $row['partida_presupuestal_3'];
        		$anterior3 = $row['anterior_3'];
        		$actual3 = $row['actual_3'];
        		$justificacion	= $row['justificacion'];
        		
        		$nombre_trabajador	= $row['nombre_trabajador'];
        		$valida	= $row['valida'];
        		$autoriza_unexp = $row ['autoriza_unexp'];
        		$autoingreso_snomina	= $row['autoingreso_snomina'];
        		$id_observaciones	= $row['id_observaciones'];
        	}



        	$consultaUR = " SELECT * FROM ct_unidades WHERE UR = '".$id_ur."'";
        	if($consultaUR = mysqli_query($conexion,$consultaUR)){
        		$row = mysqli_fetch_assoc($consultaUR);
        		$descripcionUR = utf8_encode($row['descripcion']);
        	}

            $consultaMov = " SELECT * FROM ct_movimientos WHERE codigo_movimiento = '".$id_movimiento."'";
            if($consultaMov = mysqli_query($conexion,$consultaMov)){
                $row = mysqli_fetch_assoc($consultaMov);
                $cod_movimiento= utf8_encode($row['codigo_movimiento']);
                $descripcionCortaM= utf8_encode($row['descripcionCorta_mov']);

            }


        	$consultaCurp = " SELECT * FROM datosPersonales WHERE curp = '".$CURP."'";
        		
        	  if($consultaCurp = mysqli_query($conexion,$consultaCurp)){
        		$row = mysqli_fetch_assoc($consultaCurp);
        		$id_cp = $row['id_cp'];
        		$nombre = $row['nombre'];
        		$primerApellido = $row['primerApellido'];
        		$segundoApellido = $row['segundoApellido'];
        		$rfc = $row['rfc'];
        		$estadoCivil = $row['estadoCivil'];
        		$calle = $row['calle'];
        		$numExterior = $row['numExterior'];
        		$numInterior = $row['numInterior'];
        		$telefono = $row['telefono'];
        		$lugarNacimiento = $row['lugarNacimiento'];        	
        	}

        	$consultaCP = " SELECT * FROM ct_codigopostal WHERE codigo_postal = '".$id_cp."'";
        	echo $id_cp;
        	if($consultaCP = mysqli_query($conexion,$consultaCP)){
        		$row = mysqli_fetch_assoc($consultaCP);
        		$codigo_postal = $row['codigo_postal'];
        		$alc_mun = utf8_encode($row['alc_mun']);
        		$estado = utf8_encode($row['estado']);
        		$colonia = utf8_encode($row['colonia']);	
        		echo $codigo_postal;

        	}

        	$consultaEmpleado = " SELECT * FROM datosempleado WHERE curp = '".$CURP."'";
        	if($consultaEmpleado = mysqli_query($conexion,$consultaEmpleado)){
        		$row = mysqli_fetch_assoc($consultaEmpleado);
        		$clabeinterbancaria = $row['clabeinterbancaria'];
        		$fechaingreso = $row['fechaingreso'];
        	}


        	$consultaCurpS = " SELECT * FROM datosPersonales WHERE curp = '".$CURPsustituido."'";
        		
        	if($consultaCurpS = mysqli_query($conexion,$consultaCurpS)){
        		$row = mysqli_fetch_assoc($consultaCurpS);
        		$rfcS = $row['rfc'];
        		$primerApellidoS = $row['primerApellido'];
        		$segundoApellidoS = $row['segundoApellido'];
        		$nombreS = $row['nombre'];
        	
        	}

	        
        	$consultaCRS = " SELECT * FROM ct_clavederesponsabilidad WHERE clave = $clave_cresponS";
	
        	if($consultaCRS = mysqli_query($conexion,$consultaCRS)){
        		$row = mysqli_fetch_assoc($consultaCRS);
        		$nombreCRS = utf8_encode($row['nombre']);
        	}
        	
        	$consultaCR = " SELECT * FROM ct_clavederesponsabilidad WHERE clave = $clave_crespon";
	
        	if($consultaCR = mysqli_query($conexion,$consultaCR)){
        		$row = mysqli_fetch_assoc($consultaCR);
        		$nombreCR = utf8_encode($row['nombre']);
        	}

        	$consultaPuesto = " SELECT * FROM ct_tabulador WHERE codigo = '".$dp_codigo."'";
        	if($consultaPuestoS = mysqli_query($conexion,$consultaPuesto)){
        		$row = mysqli_fetch_assoc($consultaPuestoS);
        		$descripcionPuesto = utf8_encode($row['nombre']);
        	}


        	$consultaPuestoS = " SELECT * FROM ct_tabulador WHERE codigo = '".$codigo."'";
        	if($consultaPuestoS = mysqli_query($conexion,$consultaPuestoS)){
        		$row = mysqli_fetch_assoc($consultaPuestoS);
        		$descripcionPuestoS = utf8_encode($row['nombre']);
        	}

		// Change the file
		// $objPHPExcel->setActiveSheetIndex(0)
		//             ->setCellValue('M5', 'Hello')  // 
		$objPHPExcel->getActiveSheet()->setCellValue('M5',utf8_encode($id_ur)); 
		$objPHPExcel->getActiveSheet()->setCellValue('P8',utf8_encode($lugarFecha)); 
		$objPHPExcel->getActiveSheet()->setCellValue('A14',utf8_encode( $rfc)); 
		$objPHPExcel->getActiveSheet()->setCellValue('O14',utf8_encode( $CURP)); 
		$objPHPExcel->getActiveSheet()->setCellValue('A16',utf8_encode( $primerApellido)); 
		$objPHPExcel->getActiveSheet()->setCellValue('K16',utf8_encode( $segundoApellido)); 
		$objPHPExcel->getActiveSheet()->setCellValue('W16',utf8_encode( $nombre)); 
		$objPHPExcel->getActiveSheet()->setCellValue('A19',utf8_encode( $calle)); 
		$objPHPExcel->getActiveSheet()->setCellValue('T19',utf8_encode( $numExterior)); 
		$objPHPExcel->getActiveSheet()->setCellValue('AA19', $numInterior); 
		$objPHPExcel->getActiveSheet()->setCellValue('A21', $colonia); 
		$objPHPExcel->getActiveSheet()->setCellValue('J21', $id_cp); 
		$objPHPExcel->getActiveSheet()->setCellValue('O21', $alc_mun); 
		$objPHPExcel->getActiveSheet()->setCellValue('V21', $estado); //Estado  ......
		$objPHPExcel->getActiveSheet()->setCellValue('AA21', $telefono); 
		$objPHPExcel->getActiveSheet()->setCellValue('A23', $clabeinterbancaria); 
		$objPHPExcel->getActiveSheet()->setCellValue('A27', $sexo); //genero 
		$objPHPExcel->getActiveSheet()->setCellValue('D27', $estadoCivil); //Estado civil
		$objPHPExcel->getActiveSheet()->setCellValue('G27', $lugarNacimiento); 
		$objPHPExcel->getActiveSheet()->setCellValue('T27', $fechaIngreso); //fecha gobierno federal
		$objPHPExcel->getActiveSheet()->setCellValue('T29', $fechaSiguiente); //FECHA secretaria de salud
		$objPHPExcel->getActiveSheet()->setCellValue('X27', $dependencia); 
		$objPHPExcel->getActiveSheet()->setCellValue('E33', $dp_ap); 
		$objPHPExcel->getActiveSheet()->setCellValue('G33', $dp_unidad); 
		$objPHPExcel->getActiveSheet()->setCellValue('I33', $dp_partida); 
		$objPHPExcel->getActiveSheet()->setCellValue('K33', $dp_codigo); 
		$objPHPExcel->getActiveSheet()->setCellValue('O33', $dp_pg); 
		$objPHPExcel->getActiveSheet()->setCellValue('Q33', $dp_ai); 
		$objPHPExcel->getActiveSheet()->setCellValue('S33', $dp_gf); 
		$objPHPExcel->getActiveSheet()->setCellValue('U33', $dp_funcion); 
		$objPHPExcel->getActiveSheet()->setCellValue('X33', $dp_subfuncion); 
		$objPHPExcel->getActiveSheet()->setCellValue('AB33', $dp_puesto); 
		$objPHPExcel->getActiveSheet()->setCellValue('F34', $nombreCRS); 
		$objPHPExcel->getActiveSheet()->setCellValue('G35', $descripcionPuestoS); 
		$objPHPExcel->getActiveSheet()->setCellValue('I37', $clave_cresponS); 
		$objPHPExcel->getActiveSheet()->setCellValue('A40', $primerApellidoS); //datos del sustituido
		$objPHPExcel->getActiveSheet()->setCellValue('k40', $segundoApellidoS); 
		$objPHPExcel->getActiveSheet()->setCellValue('W40', $nombreS); 
		$objPHPExcel->getActiveSheet()->setCellValue('C44', $rfcS); 
		$objPHPExcel->getActiveSheet()->setCellValue('D46', $efectosdel); 
		$objPHPExcel->getActiveSheet()->setCellValue('N46', $efectosal); 
		$objPHPExcel->getActiveSheet()->setCellValue('AB45', $motivo); 
		$objPHPExcel->getActiveSheet()->setCellValue('AB47', $numerodocumentoanterior); 
		$objPHPExcel->getActiveSheet()->setCellValue('C52', $vigenciadel);  //vigencia
		$objPHPExcel->getActiveSheet()->setCellValue('C53', $vigenciaal); 
		$objPHPExcel->getActiveSheet()->setCellValue('I52', $noDocumento);  // operacion
		$objPHPExcel->getActiveSheet()->setCellValue('M52', $noEmpleado); 
		$objPHPExcel->getActiveSheet()->setCellValue('S52', $tipoTrabajador); 
		$objPHPExcel->getActiveSheet()->setCellValue('X52', $lote); 
		$objPHPExcel->getActiveSheet()->setCellValue('AB52', $qna); 
		$objPHPExcel->getActiveSheet()->setCellValue('G54', $id_movimiento); 
		$objPHPExcel->getActiveSheet()->setCellValue('N54', $nombreCR); 
		$objPHPExcel->getActiveSheet()->setCellValue('A55', 'movimientos'); 
		$objPHPExcel->getActiveSheet()->setCellValue('X55', $clave_crespon); 
		$objPHPExcel->getActiveSheet()->setCellValue('X57', $noConcurso);
		$objPHPExcel->getActiveSheet()->setCellValue('A62', $ap);  // clave presupuestal
		$objPHPExcel->getActiveSheet()->setCellValue('D62', $unidad); 
		$objPHPExcel->getActiveSheet()->setCellValue('G62', $partida); 
		$objPHPExcel->getActiveSheet()->setCellValue('J62', $codigo); 
		$objPHPExcel->getActiveSheet()->setCellValue('N62', $pg); 
		$objPHPExcel->getActiveSheet()->setCellValue('P62', $ai); 
		$objPHPExcel->getActiveSheet()->setCellValue('R62', $gf); 
		$objPHPExcel->getActiveSheet()->setCellValue('U62', $funcion); 
		$objPHPExcel->getActiveSheet()->setCellValue('X62', $subfuncion); 
		$objPHPExcel->getActiveSheet()->setCellValue('AA62', $puesto); 
		$objPHPExcel->getActiveSheet()->setCellValue('G65', $descripcionPuestoS); 
		$objPHPExcel->getActiveSheet()->setCellValue('N66', $clave_crespon); 
		$objPHPExcel->getActiveSheet()->setCellValue('AC64', $grupo); 
		$objPHPExcel->getActiveSheet()->setCellValue('AC65', $grado); 
		$objPHPExcel->getActiveSheet()->setCellValue('AC66', $nivel); 
		$objPHPExcel->getActiveSheet()->setCellValue('H67', $tipo_mando); 
		$objPHPExcel->getActiveSheet()->setCellValue('Y67', $horario); 
		$objPHPExcel->getActiveSheet()->setCellValue('I71', $anterior1); //PERCEPCIONES
		$objPHPExcel->getActiveSheet()->setCellValue('I72', $anterior2); 
		$objPHPExcel->getActiveSheet()->setCellValue('I73', $anterior3); 
		$objPHPExcel->getActiveSheet()->setCellValue('Q71', $actual1); 
		$objPHPExcel->getActiveSheet()->setCellValue('Q72', $actual2); 
		$objPHPExcel->getActiveSheet()->setCellValue('Q73', $actual3); 
		$objPHPExcel->getActiveSheet()->setCellValue('A77', $id_movimiento."- ".$descripcionCortaM."\n".$justificacion); 
		$objPHPExcel->getActiveSheet()->setCellValue('A86', utf8_encode($nombre_trabajador)); 
		$objPHPExcel->getActiveSheet()->setCellValue('J86', utf8_encode($valida)); 
		$objPHPExcel->getActiveSheet()->setCellValue('Q86', utf8_encode($autoriza_unexp)); 
		$objPHPExcel->getActiveSheet()->setCellValue('Y86', utf8_encode($autoingreso_snomina)); 


		// Write the file
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, $fileType);
		//$objWriter->save("fomopeDESCARGA.xlsx");


	$writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

	header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
	header('Content-Disposition: attachment;filename="fomopeDESCARGA.xlsx"');
	header('Cache-Control: max-age=0');


	ob_end_clean();



	$writer->save('php://output');


?>
