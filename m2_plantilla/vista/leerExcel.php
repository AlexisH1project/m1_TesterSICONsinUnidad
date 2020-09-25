
<html>
	<head>
		<meta charset="utf-8">
		<title>Consulta</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/estilo_form.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

		<link href='css/jquery-ui.min.css' type='text/css' rel='stylesheet'>
		<link href='css/jquery-ui.css' type='text/css' rel='stylesheet'>

		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

		<script src="js/funciones.js"></script>
		<script src="js/jquery-3.4.1.min.js" type="text/javascript"></script>
		<script src="js/jquery-ui.min.js" type="text/javascript"></script>
		<script src="js/jquery-ui.js" type="text/javascript"></script>
		<link rel="stylesheet" href="css/estilossicon.css">
			<style type="text/css">

		  <style>
		  .modal-header, h4, .close {
		    background-color: #5cb85c;
		    color:white !important;
		    text-align: center;
		    font-size: 30px;
		  }
		  .modal-footer {
		    background-color: #f9f9f9;
		  }

		  .columnaBoton {
			  width:50%;
			  float:left;
		}
		  
		  </style>
		  <script type="text/javascript">
			

			$(document).ready(function(){
				$(document).on('keydown', '.unexp', function(){
					var id = this.id;
					var splitid = id.split('_');
					var indice = splitid[1];
					$('#'+id).autocomplete({
						source: function(request, response){
							$.ajax({
								url: "resultados_ur.php",
								type: 'post',
								dataType: "json",
								data: {
									busqueda: request.term,request:1
								},
								success: function(data){
									response(data);
								}
							});
						},
						select: function (event, ui){
							$(this).val(ui.item.label);
							var buscarid = ui.item.value;
							$.ajax({
								url: 'resultados_ur.php',
								type: 'post',
								data: {
									buscarid:buscarid,request:2
								},
								dataType: 'json',
								success:function(response){
									var len = response.length;
									if(len > 0){
										var idx2 = response[0]['idx2'];
										var unexp = response[0]['unexp'];
										document.getElementById('unexp_'+indice).value = unexp;
									}
								}
							});
							return false;
						}
					});
				});
			});



		</script>



	</head>
	<body onload="nobackbutton();" >
		<?php



		        require_once "../controller/librerias/conexion_excel.php";
				include_once "../controller/librerias/Classes/PHPExcel/IOFactory.php";
				include "../controller/librerias/configuracion.php";


				$usuarioSeguir =  $_GET['usuario_rol'];



				function leerPlantillaBD(){

							$fileType = 'Excel5';
							$archivo = '../controller/documentos/ARCHIVO_PLANTILLA.xls';

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

										$elRamo = $sheet->getCell("A".$row)->getValue();
										$laUr = $sheet->getCell("B".$row)->getValue();
										$elGP = $sheet->getCell("C".$row)->getValue();
										$elGR = $sheet->getCell("D".$row)->getValue();
										$laZE = $sheet->getCell("E".$row)->getValue();
										$elNivel = $sheet->getCell("F".$row)->getValue();
										$elCPuesto = $sheet->getCell("G".$row)->getValue();
										$elRS = $sheet->getCell("H".$row)->getValue();
										$elCFP = $sheet->getCell("I".$row)->getValue(); //**************
										$elRSS = $sheet->getCell("J".$row)->getValue();
										$laCS = $sheet->getCell("K".$row)->getValue();
										$elTPlaza = $sheet->getCell("L".$row)->getValue();
										$elTPersonal = $sheet->getCell("M".$row)->getValue();
										$elTN = $sheet->getCell("N".$row)->getValue();
										$elGJP = $sheet->getCell("O".$row)->getValue();
										$elAP = $sheet->getCell("P".$row)->getValue();
										$laFIV = $sheet->getCell("Q".$row)->getValue();
										$laFFV = $sheet->getCell("R".$row)->getValue();
										$elNPlazas = $sheet->getCell("S".$row)->getValue();
										$elNHoras = $sheet->getCell("T".$row)->getValue();
										$elITabulador = $sheet->getCell("U".$row)->getValue();
										$elSTabulador = $sheet->getCell("V".$row)->getValue();
										$elRFC = $sheet->getCell("W".$row)->getValue();
										$nombreComp = $sheet->getCell("X".$row)->getValue();
										$laObservacion = $sheet->getCell("Y".$row)->getValue();
										$elEstatus = $sheet->getCell("Z".$row)->getValue();

										echo "\n";


								}
						}

			    function cargarPlantillaBD(){
			    	include "../controller/librerias/configuracion.php";

			    	$usuarioSeguir =  $_GET['usuario_rol'];
			    	$fileType = 'Excel5';
					$nombreArchivo = '../controller/documentos/ARCHIVO_PLANTILLA.xls';

			    	$objPHPExcel2 = PHPExcel_IOFactory::load($nombreArchivo);

			    	$objPHPExcel2->setActiveSheetIndex(0);

			    	$numRows = $objPHPExcel2->setActiveSheetIndex(0)->getHighestRow();

			    	//echo '<table border=1>';

			    	for ($i=2; $i<= $numRows; $i++){

			    		$ramoT= $objPHPExcel2->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
			    		$urT= $objPHPExcel2->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
			    		$gpT= $objPHPExcel2->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
			    		$gfrT= $objPHPExcel2->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
			    		$zeT= $objPHPExcel2->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
			    		$nivelT= $objPHPExcel2->getActiveSheet()->getCell('F'.$i)->getCalculatedValue();
			    		$codigoT= $objPHPExcel2->getActiveSheet()->getCell('G'.$i)->getCalculatedValue();
			    		$rsT= $objPHPExcel2->getActiveSheet()->getCell('H'.$i)->getCalculatedValue();
			    		$codFedPueT= $objPHPExcel2->getActiveSheet()->getCell('I'.$i)->getCalculatedValue();
			    		$rssT= $objPHPExcel2->getActiveSheet()->getCell('J'.$i)->getCalculatedValue();
			    		$csT= $objPHPExcel2->getActiveSheet()->getCell('K'.$i)->getCalculatedValue();
			    		$tpzsT= $objPHPExcel2->getActiveSheet()->getCell('L'.$i)->getCalculatedValue();
			    		$tpT= $objPHPExcel2->getActiveSheet()->getCell('M'.$i)->getCalculatedValue();
			    		$tnT= $objPHPExcel2->getActiveSheet()->getCell('N'.$i)->getCalculatedValue();
			    		$gjpT= $objPHPExcel2->getActiveSheet()->getCell('O'.$i)->getCalculatedValue();
			    		$apT= $objPHPExcel2->getActiveSheet()->getCell('P'.$i)->getCalculatedValue();
			    		$fivT= $objPHPExcel2->getActiveSheet()->getCell('Q'.$i)->getCalculatedValue();
			    		$ffvT= $objPHPExcel2->getActiveSheet()->getCell('R'.$i)->getCalculatedValue();
			    		$pzsT= $objPHPExcel2->getActiveSheet()->getCell('S'.$i)->getCalculatedValue();
			    		$nhT= $objPHPExcel2->getActiveSheet()->getCell('T'.$i)->getCalculatedValue();
			    		$itT= $objPHPExcel2->getActiveSheet()->getCell('U'.$i)->getCalculatedValue();
			    		$stT= $objPHPExcel2->getActiveSheet()->getCell('V'.$i)->getCalculatedValue();
			    		$rfcT= $objPHPExcel2->getActiveSheet()->getCell('W'.$i)->getCalculatedValue();
			    		$nombreT= $objPHPExcel2->getActiveSheet()->getCell('X'.$i)->getCalculatedValue();
			    		$observacionesT= $objPHPExcel2->getActiveSheet()->getCell('Y'.$i)->getCalculatedValue();
			    		$estatusT= $objPHPExcel2->getActiveSheet()->getCell('Z'.$i)->getCalculatedValue();
                      /*
				    	echo '<tr>';
				    	echo '<td>'.$ramoT.'</td>';
				    	echo '<td>'.$urT.'</td>';
				    	echo '<td>'.$gpT.'</td>';
				    	echo '<td>'.$gfrT.'</td>';
				    	echo '<td>'.$zeT.'</td>';
				    	echo '<td>'.$nivelT.'</td>';
				    	echo '<td>'.$codigoT.'</td>';
				    	echo '<td>'.$rsT.'</td>';
				    	echo '<td>'.$codFedPueT.'</td>';
				    	echo '<td>'.$rssT.'</td>';
				    	echo '<td>'.$csT.'</td>';
				    	echo '<td>'.$tpzsT.'</td>';
				    	echo '<td>'.$tpT.'</td>';
				    	echo '<td>'.$tnT.'</td>';
				        echo '<td>'.$gjpT.'</td>';
				        echo '<td>'.$apT.'</td>';
				        echo '<td>'.$fivT.'</td>';
				        echo '<td>'.$ffvT.'</td>';
				        echo '<td>'.$pzsT.'</td>';
				        echo '<td>'.$nhT.'</td>';
				        echo '<td>'.$itT.'</td>';
				        echo '<td>'.$stT.'</td>';
				        echo '<td>'.$rfcT.'</td>';
				        echo '<td>'.$nombreT.'</td>';
				        echo '<td>'.$observacionesT.'</td>';
				        echo '<td>'.$estatusT.'</td>';
				    	echo '</tr>';
                        */

                   //----------------Sacamos la Fecha 
						$hoy = "select CURDATE()";
						$tiempo ="select curTime()";
						if ($resultHoy = mysqli_query($conexion,$hoy) AND $resultTime = mysqli_query($conexion,$tiempo)) {
							$rowfecha = mysqli_fetch_row($resultHoy);
							$rowhora = mysqli_fetch_row($resultTime);
						}
							$hora = str_replace ( ":", '',$rowhora[0] ); 
							$fecha = str_replace ( "-", '',$rowfecha[0] ); 


                  //-----Tomamos el nombre que se extrae completo y lo partimos en apellidos y nombres
                        $posdiag = strpos($nombreT,"/");
                        $poscoma = strpos($nombreT,",");
                        $nombreTam = strlen($nombreT);

                        $apelli_1 = substr($nombreT, 0, $poscoma);
                        $apelli_2 = substr($nombreT, $poscoma+1, -($nombreTam-$posdiag));
                        $nombreS = substr($nombreT, $posdiag+1, $nombreTam);
                        //-----------------------------------

                  //----Si el RFC no existe en la tabla ct_empleados creamos un registro nuevo

                        $sqlDup = "SELECT rfc FROM ct_empleados WHERE rfc = '$rfcT'";
				    	$empDup = mysqli_query($conexion, $sqlDup);
				    	$valDup = mysqli_fetch_row($empDup);
				    	$empleadoReg = $valDup[0];

				    	if($empleadoReg != $rfcT) {

				    	  $sqlEmpleado = "INSERT INTO ct_empleados (rfc, apellido_1, apellido_2, nombre) VALUE ('$rfcT','$apelli_1','$apelli_2','$nombreS')";

				    	$sqlInsertarEmpleado = mysqli_query($conexion, $sqlEmpleado);


				    	}

				  //--Se extrae el RFC de la base de datos 
				    	$queryDup = "SELECT rfc FROM plazas_ctrlp_m2 WHERE rfc = '$rfcT' AND ramo = '$ramoT' AND unidadResponsable = '$urT' AND grupoPersonal = '$gpT' AND zonaEconomica = '$zeT' AND nivel= '$nivelT' AND codigoPuesto = '$codigoT' AND rangoSalarial = '$rsT' AND codigoFederalPuestos = '$codFedPueT' AND regimenDeSeguridadSocial = '$rssT' AND curvaSalarial = '$csT' AND tipoPlaza = '$tpzsT' AND tipoPersonal = '$tpT' AND tipoNombramiento = '$tnT' AND grupoJerarquicoDePersonal = '$gjpT' AND argumentoDePuestos = '$apT' AND numDePlazas = '$pzsT' AND numDeHoras = '$nhT' AND indiceTabulador = '$itT' AND subIndiceTabulador = '$stT' AND usuarioEdicion = '$usuarioSeguir'";
				    	$rfcDup = mysqli_query($conexion, $queryDup);
				    	$resDup = mysqli_fetch_row($rfcDup);
				    	$rfcDuplicado = $resDup[0];

				   //--Se extrae el ID del RFC de la base de datos
                    /*
				    	$id_Dup = "SELECT id_plaza FROM plazas_ctrlp_m2 WHERE rfc = '$rfcT'";
				    	$rfc_idDup = mysqli_query($conexion, $id_Dup);
				    	$res_idDup = mysqli_fetch_row($rfc_idDup);
				    	$id_rfcDuplicado = $res_idDup[0];
				    	*/




				    	if ($rfcDuplicado != $rfcT ){
	
				    	$queryExcel= "INSERT INTO plazas_ctrlp_m2 (ramo, unidadResponsable, grupoPersonal, gfuncionalResposabilidad, zonaEconomica, nivel, codigoPuesto, rangoSalarial, codigoFederalPuestos, regimenDeSeguridadSocial, curvaSalarial, tipoPlaza, tipoPersonal, tipoNombramiento, grupoJerarquicoDePersonal, argumentoDePuestos, fechaInicioVigencia, fechaFinalVigencia, numDePlazas, numDeHoras, indiceTabulador, subIndiceTabulador, rfc, observacionesExtras, estatus, usuarioEdicion, fechaCaptura) VALUE ('$ramoT', '$urT', '$gpT', '$gfrT', '$zeT', '$nivelT', '$codigoT','$rsT','$codFedPueT','$rssT','$csT','$tpzsT','$tpT','$tnT', '$gjpT','$apT','$fivT','$ffvT','$pzsT','$nhT','$itT','$stT','$rfcT','$observacionesT','$estatusT', '$usuarioSeguir', '$fecha')";

				    	if($querylast = mysqli_query($conexion, $queryExcel)){

				    	}
				    	



				    }else{
				    	$dupdata[$i-1] = $i;
				    	
				    }



				   
			        }
  			        //echo '</table>';

                        if(sizeof($dupdata)> 1){
                        $arrayDupdata = implode(",", $dupdata);
                        echo "<script type='text/javascript'>alert('La(s) fila(s) $arrayDupdata del archivo Excel ya habia(n) sido registrada(s).');</script>";
  			        	//echo "<script> alert('La(s) fila(s) $arrayDupdata del archivo Excel ya habia(n) sido registrada(s).'); ";
  			        }




			        }
		?>

			<br>
		  <a  href= <?php echo ("");?>><img class="img-responsive" src="img/ss1.png" height="90" width="280"/></a>
	

		<nav class="navbar fixed-top navbar-expand-lg navbar-dark plantilla-input fixed-top">
		    <div class="container">
		      <div class="collapse navbar-collapse" id="navbarResponsive">
		        <ul class="navbar-nav ml-auto">          
		        
		          <li class="nav-item">
		            <a class="nav-link" href='../../LoginMenu/vista/cerrarsesion.php'>CERRAR SESIÓN</a>
		          </li>
		        </ul>
		      </div>
		    </div>
		  </nav>		
		  <br>
		<center>			

		<center>	

				
			<h3 class="estilo-color plantilla-subtitulospr">Sistema de Control de Registro de Formato de Movimiento de Personal (SICON).</h3>
				<br>
				<h5 class=" plantilla-subtitulop"> DIRECCIÓN DE INTEGRACIÓN DE PUESTOS Y SERVICIOS PERSONALES - DIPSP</h5>
				<br>
				<h3>Consulta de Estado FOMOPE</h3>
				<br>
	</div>
					
				<form  enctype="multipart/form-data" id="formDatos" name="captura1" action="" method="POST"> 
					<!-- <form method="post" action="./generarFiltroExcel/reporteBusqueda.php"> -->
							<div class="col">
						  		<div class="md-form md-0">
								    <!-- <label  class="plantilla-label" for="archivo_1">Adjuntar un archivos</label> -->
								    <!--  <input type="hidden" name="MAX_FILE_SIZE" value="30000" /> -->
								    <input type="file" id="nameArchivo" name="nameArchivo" required>
								   <!--  <p class="help-block">Ejemplo de texto de ayuda.</p> -->
								</div>
							</div>

							<input type='submit' name='leerExcel' value="Leer Excel" class='btn btn btn-success text-white bord'>
							

						<?php	

							if(isset($_POST['leerExcel'])){
											$dir_subida = '../controller/documentos/';
											$fichero_subido = $dir_subida . basename($_FILES['nameArchivo']['name']);
											$extencion2 = explode(".",$fichero_subido);
											$tamnio = count($extencion2);
											$termino=0;
											$extencion3 = $extencion2[$tamnio-1];

											if (move_uploaded_file($_FILES['nameArchivo']['tmp_name'], $fichero_subido)) {
												$termino = 1;
												sleep(3);
												$concatenarNombreC = $dir_subida.strtoupper("archivo_Plantilla.".$extencion3);
												rename ($fichero_subido,$concatenarNombreC);
											}else{
											    echo "<script> alert('Existe un error al guardar el archivo'); ";
											}	
											
											if($termino == 1){
												leerPlantillaBD();
												cargarPlantillaBD();
											}
							}

						?>	


					</form>




	</center>

	
	</body>

</html>

