
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
		  table {
    width: 100%;
    display:block;
}
thead {
    display: inline-block;
    width: 100%;
    height: 60px;
    background: white;
}
tbody {
    max-height: 400px;
    display: inline-block;
    width: 100%;
    
}

		th, td{
			min-width: 150px;
			max-width: 151px;
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
       
				include "../controller/librerias/configuracion.php";
				set_time_limit(1500);		
				$usuarioSeguir =  $_GET['usuario_rol'];

			    function cargarPlantillaBD(){


			    	include "../controller/librerias/configuracion.php";

			    	$usuarioSeguir =  $_GET['usuario_rol'];
					$nombreArchivo = '../controller/documentos/ARCHIVO_PLANTILLA.csv';
                    $dupdata;
                    $dupdata[0]=0;

					$docMov = fopen ($nombreArchivo , "r" );//leo el archivo que contiene los datos del producto
					while (($datos =fgetcsv($docMov,1000,",")) !== FALSE )//Leo linea por linea del archivo hasta un maximo de 1000 caracteres por linea leida usando coma(,) como delimitador
					{
					 $linea[]=array( //Arreglo Bidimensional para guardar los datos de cada linea leida del archivo
						'ramo' => $datos[0],
						'unidadResponsable' => $datos[1],
						'grupoPersonal' => $datos[2],
						'gfuncionalResposabilidad' => $datos[3],
						'zonaEconomica' => $datos[4],
						'nivel' => $datos[5],
						'codigoPuesto' => $datos[6],
						'rangoSalarial' => $datos[7],
						'codigoFederalPuestos' => $datos[8],
						'regimenDeSeguridadSocial' => $datos[9],
						'curvaSalarial' => $datos[10],
						'tipoPlaza' => $datos[11],
						'tipoPersonal' => $datos[12],
						'tipoNombramiento' => $datos[13],
						'grupoJerarquicoDePersonal' => $datos[14],
						'argumentoDePuestos' => $datos[15],
						'fechaInicioVigencia' => $datos[16],
						'fechaFinalVigencia' => $datos[17],
						'numDePlazas' => $datos[18],
						'numDeHoras' => $datos[19],
						'indiceTabulador' => $datos[20],
						'subIndiceTabulador' => $datos[21],
						'rfc' => $datos[22],
						'nombreC' => $datos[23],
						'clavePresupuestal' => $datos[24],
						'observacionesExtras' => $datos[25],
						'cfpAsignado' => $datos[26],
						'comprobanteExistencia_cfp' => $datos[27],
						'estatus' => $datos[28],
						'tipoMovimiento' => $datos[29]);
					}

					fclose ($docMov);//Cierra el archivo
					 
						$ingresado=0;//Variable que almacenara los insert exitosos
						$error=0;//Variable que almacenara los errores en almacenamiento
						$duplicado=0;//Variable que almacenara los registros duplicados


					    //----------------Sacamos la Fecha 
						$hoy = "select CURDATE()";
						$tiempo ="select curTime()";
						if ($resultHoy = mysqli_query($conexion,$hoy) AND $resultTime = mysqli_query($conexion,$tiempo)) {
							$rowfecha = mysqli_fetch_row($resultHoy);
							$rowhora = mysqli_fetch_row($resultTime);
						}
							$hora = str_replace ( ":", '',$rowhora[0] ); 
							$fecha = str_replace ( "-", '',$rowfecha[0] ); 
							$fechaSistema = date("Y-m-d", strtotime($rowfecha[0]));
							$anio= date("Y", strtotime($rowfecha[0]));
					// -------------------------- ahora detectamos en que qna nos encontramos
						$queryQna = "SELECT * FROM m1ct_fechasnomina";

						if($SiQueryQna = mysqli_query($conexion, $queryQna)){
							while($rowFechas = mysqli_fetch_row($SiQueryQna)){
									$qnaAplicada = $rowFechas[0];
									//echo "qna".$qnaAplicada."</br>";
								
							}
						}
                  

						foreach($linea as $indice=>$value) //Iteracion el array para extraer cada uno de los valores almacenados en cada items
						{
							$ramo = $value["ramo"];
							$unidadResponsable = $value["unidadResponsable"];
							$grupoPersonal = $value["grupoPersonal"];
							$gfuncionalResposabilidad = $value["gfuncionalResposabilidad"];
							$zonaEconomica = $value["zonaEconomica"];
							$nivel = $value["nivel"];
							$codigoPuesto = $value["codigoPuesto"];
							$rangoSalarial = $value["rangoSalarial"];
							$codigoFederalPuestos = $value["codigoFederalPuestos"];
							$regimenDeSeguridadSocial = $value["regimenDeSeguridadSocial"];
							$curvaSalarial = $value["curvaSalarial"];
							$tipoPlaza = $value["tipoPlaza"];
							$tipoPersonal = $value["tipoPersonal"];
							$tipoNombramiento = $value["tipoNombramiento"];
							$grupoJerarquicoDePersonal = $value["grupoJerarquicoDePersonal"];
							$argumentoDePuestos = $value["argumentoDePuestos"];
							$fechaInicioVigencia = $value["fechaInicioVigencia"];
							$fechaFinalVigencia = $value["fechaFinalVigencia"];
							$numDePlazas = $value["numDePlazas"];
							$numDeHoras = $value["numDeHoras"];
							$indiceTabulador = $value["indiceTabulador"];
							$subIndiceTabulador = $value["subIndiceTabulador"];
							$rfcT = $value["rfc"];
							$nombreT = $value["nombreC"];
							$clavePresupuestal = $value["clavePresupuestal"];
							$observacionesExtras = $value["observacionesExtras"];
							$cfpAsignado = $value["cfpAsignado"];
							$comprobanteExistencia_cfp = $value["comprobanteExistencia_cfp"];
							$estatus = $value["estatus"];
							$tipoMovimiento = $value["tipoMovimiento"];

						$sql=mysqli_query($conexion,"SELECT * FROM plazas_ctrlp_m2 WHERE codigoFederalPuestos = '$codigoFederalPuestos' AND rfc = '$rfcT'");//Consulta a la tabla productos
						$num=mysqli_num_rows($sql);//Cuenta el numero de registros devueltos por la consulta
						if ($num==0)//Si es == 0 inserto
						{
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
							$numEmp = mysqli_num_rows($empDup);
							if($numEmp == 0 AND $empDup = mysqli_query($conexion, $sqlDup)){
								$valDup = mysqli_fetch_row($empDup);
								$empleadoReg = $valDup[0];
								$sqlEmpleado = "INSERT INTO ct_empleados (rfc, apellido_1, apellido_2, nombre) VALUE ('$rfcT','$apelli_1','$apelli_2','$nombreS')";
								$sqlInsertarEmpleado = mysqli_query($conexion, $sqlEmpleado);
							}
							if ($insert=mysqli_query($conexion,"INSERT INTO plazas_ctrlp_m2 (ramo, unidadResponsable, grupoPersonal, gfuncionalResposabilidad, zonaEconomica, nivel, codigoPuesto, rangoSalarial, codigoFederalPuestos, regimenDeSeguridadSocial, curvaSalarial, tipoPlaza, tipoPersonal, tipoNombramiento, grupoJerarquicoDePersonal, argumentoDePuestos, fechaInicioVigencia, fechaFinalVigencia, numDePlazas, numDeHoras, indiceTabulador, subIndiceTabulador, rfc, clavePresupuestal, observacionesExtras, cfpAsignado, comprobanteExistencia_cfp, estatus, tipoMovimiento, usuarioEdicion, fechaCaptura, quincenaAplicada, anio, color_accion) VALUES ('$ramo', '$unidadResponsable', '$grupoPersonal', '$gfuncionalResposabilidad', '$zonaEconomica', '$nivel', '$codigoPuesto', '$rangoSalarial', '$codigoFederalPuestos', '$regimenDeSeguridadSocial', '$curvaSalarial', '$tipoPlaza', '$tipoPersonal', '$tipoNombramiento', '$grupoJerarquicoDePersonal', '$argumentoDePuestos', '$fechaInicioVigencia', '$fechaFinalVigencia', '$numDePlazas', '$numDeHoras', '$indiceTabulador', '$subIndiceTabulador', '$rfcT', '$clavePresupuestal', '$observacionesExtras', '$cfpAsignado', '$comprobanteExistencia_cfp', '$estatus', '$tipoMovimiento' ,'$usuarioSeguir', '$fechaSistema', '$qnaAplicada', '$anio', 'blanco')"))
							{
								echo $msj='<font color=green>Producto <b>'.$codigoFederalPuestos.'</b> Guardado</font><br/>';
								$ingresado+=1;
							}//fin del if que comprueba que se guarden los datos
							else//sino ingresa el producto
							{
								echo $msj='<font color=red>Producto <b>'.$codigoFederalPuestos.' </b> NO Guardado </font><br/>';
								$error+=1;
							}
						}//fin de if que comprueba que no haya en registro duplicado
						else
						{
							$duplicado+=1;
							echo $duplicate='<font color=red>El Producto codigo <b>'.$codigoFederalPuestos.'</b> Esta duplicado<br></font>';
						}
					}

						echo "<font color=green>".number_format($ingresado,2)." Productos Almacenados con exito<br/>";
						echo "<font color=red>".number_format($duplicado,2)." Productos Duplicados<br/>";
						echo "<font color=red>".number_format($error,2)." Errores de almacenamiento<br/>";

				}
			    	?>
		<a  href= <?php echo ("'../../roles/menuPrincipal.php?usuario_rol=$usuarioSeguir'");?>><img class="img-responsive" src="img/ss1.png" height="90" width="280"/></a>

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
												$concatenarNombreC = $dir_subida.strtoupper("ARCHIVO_PLANTILLA.".$extencion3);
												error_reporting(0);
												rename ($fichero_subido,$concatenarNombreC);
												error_reporting(-1);
											}else{
											    echo "<script> alert('Existe un error al guardar el archivo'); ";
											}	
											
											if($termino == 1){
												cargarPlantillaBD();
											}
							}

					?>	
				</form>
	</center>
	</body>
</html>