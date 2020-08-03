
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
	<body onload="nobackbutton();">
		<?php
				include "configuracion.php";
				$usuarioSeguir =  $_GET['usuario_rol'];


				function leerPlantillaBD(){
					   	require "./librerias/conexion_excel.php";

						include './librerias/Classes/PHPExcel/IOFactory.php';

							$fileType = 'Excel5';
							$archivo = './documentos/ARCHIVO_PLANTILLA.xls';

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

		?>

			<br>
		  <a  href= <?php echo ("'./menuPrincipal.php?usuario_rol=$usuarioSeguir'");?>><img class="img-responsive" src="img/ss1.png" height="90" width="280"/></a>
	

		<nav class="navbar fixed-top navbar-expand-lg navbar-dark plantilla-input fixed-top">
		    <div class="container">
		      <div class="collapse navbar-collapse" id="navbarResponsive">
		        <ul class="navbar-nav ml-auto">          
		        
		          <li class="nav-item">
		            <a class="nav-link" href='../LoginMenu/vista/cerrarsesion.php'>CERRAR SESIÓN</a>
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
											$dir_subida = './documentos/';
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
											}
							}

						?>	


					</form>




	</center>

	
	</body>

</html>

