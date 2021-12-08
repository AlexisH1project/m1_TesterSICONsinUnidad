
<html>
	<head>
		<meta charset="utf-8">
		<title>cargar movs</title>
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

				$usuarioSeguir =  $_GET['usuario_rol'];

		class CargarPlantilla{
				public $arrayDuplicados;
				public $existeError;

				function getExiteErr(){
					return $this -> existeError;

				}

			    function cargarPlantillaBD(){
					$arrayDuplicados[] = array();
					$this -> arrayDuplicados = $arrayDuplicados;
					$this -> existeError = 0;
										
					include "../controller/librerias/configuracion.php";
			    	$usuarioSeguir =  $_GET['usuario_rol'];
					$nombreArchivo = '../controller/documentos/MOVS_PLAZAS.csv';
                    $dupdata;
                    $dupdata[0]=0;
					$datosIncorrectos[] = array(); // arreglo para los datos incorrectos 
					$docMov = fopen ($nombreArchivo , "r" );//leo el archivo que contiene los datos del producto
					// $arrayFilas  = explode($docMov,"\n");
					// echo count($arrayFilas);
					while (($datos =fgetcsv($docMov,1000,",")) !== FALSE )//Leo linea por linea del archivo hasta un maximo de 1000 caracteres por linea leida usando coma(,) como delimitador
					{
					 $numero = count($datos);
					 if($numero != "24"){ // si el numero de col es diferente a las que deben de ser no se tomaran en cuanta y se guardan en otra lista
						$lineaIncorrecta[]=array( //Arreglo Bidimensional para guardar los datos de cada linea leida del archivo
							'folio_shcp' => trim($datos[0]),
							'estatus' => trim($datos[1]),
							'motivo_mov'=> trim($datos[2]),
							'cfp' => trim($datos[3]),
							'ramo' => $datos[4],
							'ur' => $datos[5],
							'zona' => $datos[6],
							'nivel' => $datos[7],
							'codigo' => $datos[8],
							'plazas' => $datos[9],
							'ramo2' => $datos[10],
							'ur2' => $datos[11],
							'zona2' => $datos[12],
							'nivel2' => $datos[13],
							'codigo2' => $datos[14],
							'plazas2' => $datos[15],
							'cfp2' => trim($datos[16]),
							'fechaVigencia' => $datos[17],
							'rfcT' => $datos[18],
							'nombre' => $datos[19],
							'autorizo' => $datos[20],
							'observaciones' => $datos[21],
							'oficioSolicitud' => $datos[22],
							'oficioRespuesta' => $datos[23]);
						array_push($datosIncorrectos, $lineaIncorrecta);
					 }else{
						$linea[]=array( //Arreglo Bidimensional para guardar los datos de cada linea leida del archivo
							'folio_shcp' => trim($datos[0]),
							'estatus' => trim($datos[1]),
							'motivo_mov'=> trim($datos[2]),
							'cfp' => trim($datos[3]),
							'ramo' => $datos[4],
							'ur' => $datos[5],
							'zona' => $datos[6],
							'nivel' => $datos[7],
							'codigo' => $datos[8],
							'plazas' => $datos[9],
							'ramo2' => $datos[10],
							'ur2' => $datos[11],
							'zona2' => $datos[12],
							'nivel2' => $datos[13],
							'codigo2' => $datos[14],
							'plazas2' => $datos[15],
							'cfp2' => trim($datos[16]),
							'fechaVigencia' => $datos[17],
							'rfcT' => $datos[18],
							'nombre' => $datos[19],
							'autorizo' => $datos[20],
							'observaciones' => $datos[21],
							'oficioSolicitud' => $datos[22],
							'oficioRespuesta' => $datos[23]);
					 }	
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
                  
					if($numero == 24){
						foreach($linea as $indice=>$value) //Iteracion el array para extraer cada uno de los valores almacenados en cada items
						{
							
							$folio_shcp = $value["folio_shcp"]; //cancelacion ............
							$estatus1 = utf8_encode($value["estatus"]); // Es el dato real solo que sin acentos 
							$estatus = utf8_encode(strtoupper($value["estatus"]));
							$motivo_mov1 = utf8_encode($value["motivo_mov"]);
							$motivo_mov = utf8_encode(strtoupper($value["motivo_mov"]));
							$cfp = $value["cfp"];
							$ramo = $value["ramo"];
							$ur = $value["ur"];
							$zona = $value["zona"];
							$nivel = $value["nivel"];
							$codigo = $value["codigo"];
							$plazas = $value["plazas"];
							$ramo2 = $value["ramo2"];
							$ur2 = $value["ur2"];
							$zona2 = $value["zona2"];
							$nivel2 = $value["nivel2"];
							$codigo2 = $value["codigo2"];
							$plazas2 = $value["plazas2"];
							$cfp2 = $value["cfp2"]; // creacion .................
							$fechaVigencia = $value["fechaVigencia"];
							$rfcT = $value["rfcT"];
							$nombreT = utf8_encode($value["nombre"]);
							$autorizo = utf8_encode($value["autorizo"]);
							$observaciones = utf8_encode($value["observaciones"]);
							$oficioSolicitud = $value["oficioSolicitud"];
							$oficioRespuesta = $value["oficioRespuesta"];

							$arrayErr = array('idMov' => $folio_shcp , 'status' => $estatus1, 'motivoM' =>  $estatus,'cfp' => $cfp );
// no se me hizo necesario poner esta validacion ---> $sql=mysqli_query($conexion,"SELECT * FROM movimientos_m2 WHERE codFederalPuestos = '$cfp'");//Consulta a la tabla productos
// no se me hizo necesario poner esta validacion ---> $num=mysqli_num_rows($sql);//Cuenta el numero de registros devueltos por la consulta
						//-----Tomamos el nombre que se extrae completo y lo partimos en apellidos y nombres
							$posdiag = strpos($nombreT,"/"); //Encuentre la posición de la primera aparición de /
							$poscoma = strpos($nombreT,",");//Encuentre la posición de la primera aparición de ,
							$nombreTam = strlen($nombreT);
	
							$apelli_1 = substr($nombreT, 0, $poscoma); //Devuelve una parte del string definida por los parámetros 0 y poscoma.
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
							$numExiteCfpP = 0;
	// ******************************Proceso (1) ,query candados: Autorizado/Conversion; Autorizado/Reubicación 
						if($sqlExiteCfpP =mysqli_query($conexion,"SELECT * FROM plazas_ctrlp_m2 WHERE codigoFederalPuestos = '$cfp2'")){
							// $numExiteCfpP = mysqli_num_rows($sqlExiteCfpP);
							$numExiteCfpP = 1;
							$rowEjemplo = mysqli_fetch_row($sqlExiteCfpP);
						}//Consulta a plazas 
	// ******************************Autorizado/Conversion 
						if($cfp2 != "" && $estatus == "AUTORIZADO" && $motivo_mov == "CONVERSIÓN" && $numExiteCfpP != 0){ //|| $cfp2 == "00-000-000000") $num==0 
				//****************/ ahora corroboramos que el cfp2 no exista aun en la bd
								$sqlCfp2= mysqli_query($conexion,"SELECT * FROM plazas_ctrlp_m2 WHERE codigoFederalPuestos = '$cfp'");//Consulta a la tabla productos
								$num2=mysqli_num_rows($sqlCfp2);//Cuenta el numero de registros devueltos por la consulta
								$rowColor = mysqli_fetch_row($sqlCfp2);
								if ($num2 != 0 && $rowColor[34] != "rojo") // se necesita saber si hay registro en la plantilla para poder CANCELARLO 
								{
									// if(){
										$queryInsertMov = "INSERT INTO movimientos_m2 (folio_shcp, estatus, motivo_mov, codFederalPuestos, ramo, ur, zona, nivel, codigo, plazas, ramo2, ur2, zona2,	nivel2, codigo2, plazas2, codFederalPuestos2, fechaVigencia, rfc, autorizo, observacionesExtras,oficioDeSolicitud, oficioRespuesta, usuarioEdicion,	fechaCaptura, quincenaAplicada, anio ) VALUES ('$folio_shcp', '$estatus1','$motivo_mov1','$cfp','$ramo','$ur','$zona','$nivel','$codigo','$plazas','$ramo2','$ur2','$zona2','$nivel2','$codigo2','$plazas2','$cfp2','$fechaVigencia','$rfcT','$autorizo','$observaciones','$oficioSolicitud','$oficioRespuesta' ,'$usuarioSeguir', '$fechaSistema', '$qnaAplicada', '$anio')";
										$queryUpdatePlaza = "UPDATE plazas_ctrlp_m2 SET cfpAsignado = '$cfp2', 	comprobanteExistencia_cfp = '1', estatus = 'Autorizado', tipoMovimiento = 'Conversión' , color_accion = 'rojo' WHERE codigoFederalPuestos = '$cfp'";
										// $queryInsertPlaza = "INSERT INTO plazas_ctrlp_m2 (ramo , unidadResponsable , grupoPersonal , gfuncionalResposabilidad , zonaEconomica , nivel , codigoPuesto , rangoSalarial , codigoFederalPuestos , regimenDeSeguridadSocial , curvaSalarial , tipoPlaza , tipoPersonal , tipoNombramiento , grupoJerarquicoDePersonal , argumentoDePuestos , fechaInicioVigencia , fechaFinalVigencia , numDePlazas , numDeHoras , indiceTabulador , subIndiceTabulador , rfc , clavePresupuestal , observacionesExtras , cfpAsignado , comprobanteExistencia_cfp , estatus , tipoMovimiento , usuarioEdicion , fechaCaptura , quincenaAplicada , anio ) VALUE ";
										if ($insert=mysqli_query($conexion,$queryInsertMov) && $updateP=mysqli_query($conexion,$queryUpdatePlaza))
										{
											echo $msj='<font color=green>Producto <b>'.$cfp.'</b> Guardado</font><br/>';
											$ingresado+=1;
										}//fin del if que comprueba que se guarden los datos
										else//sino ingresa el producto
										{
											$this -> existeError = 1;
											array_push($value, "Existe error en Actualizar la plaza o al Guardar MOV ".$cfp);
											array_push($this -> arrayDuplicados, $value);
											// echo $msj='<font color=red>Producto <b>'.$cfp.' </b> NO Guardado </font><br/>';
											$error+=1;
										}
									// }
								}else
								{
									$duplicado+=1;
									$this -> existeError = 1;
									array_push($value, "No existe plaza o la plaza ya fue cancelada");
									array_push($this -> arrayDuplicados, $value);
								// 	echo $duplicate='<font color=red>El Producto codigo <b>'.$cfp.'</b> Esta duplicado<br></font>';
								}
						}else//fin de if que comprueba que no haya en registro duplicado
// ******************************Autorizado/Reubicacion 
						if($cfp2 != "" && $estatus == "AUTORIZADO" && $motivo_mov == "REUBICACIÓN"  && $numExiteCfpP != 0){ //|| $cfp2 == "00-000-000000") $num==0 && 
							//****************/ ahora corroboramos que el cfp2 no exista aun en la bd
											// $sqlCfp2= mysqli_query($conexion,"SELECT * FROM movimientos_m2 WHERE codFederalPuestos = '$cfp' AND codFederalPuesto2 = '$cfp2' ");//Consulta a la tabla productos
											// $num2=mysqli_num_rows($sqlCfp2);//Cuenta el numero de registros devueltos por la consulta
											$sqlCfp2= mysqli_query($conexion,"SELECT * FROM plazas_ctrlp_m2 WHERE codigoFederalPuestos = '$cfp'");//Consulta a la tabla productos
											$num2=mysqli_num_rows($sqlCfp2);//Cuenta el numero de registros devueltos por la consulta
											$rowColor = mysqli_fetch_row($sqlCfp2);
											if ($num2 != 0 && $rowColor[34] != "rojo") // se necesita saber si hay registro en la plantilla para poder CANCELARLO 
											{
												$queryInsertMov = "INSERT INTO movimientos_m2 (folio_shcp, estatus, motivo_mov, codFederalPuestos, ramo, ur, zona, nivel, codigo, plazas, ramo2, ur2, zona2,	nivel2, codigo2, plazas2, codFederalPuestos2, fechaVigencia, rfc, autorizo, observacionesExtras,oficioDeSolicitud, oficioRespuesta, usuarioEdicion,	fechaCaptura, quincenaAplicada, anio ) VALUES ('$folio_shcp', '$estatus1','$motivo_mov1','$cfp','$ramo','$ur','$zona','$nivel','$codigo','$plazas','$ramo2','$ur2','$zona2','$nivel2','$codigo2','$plazas2','$cfp2','$fechaVigencia','$rfcT','$autorizo','$observaciones','$oficioSolicitud','$oficioRespuesta' ,'$usuarioSeguir', '$fechaSistema', '$qnaAplicada', '$anio')";
												$queryUpdatePlaza = "UPDATE plazas_ctrlp_m2 SET cfpAsignado = '$cfp2', 	comprobanteExistencia_cfp = '1', estatus = 'Autorizado', tipoMovimiento = 'Reubicación', color_accion = 'rojo' WHERE codigoFederalPuestos = '$cfp'";
												if ($insert=mysqli_query($conexion,$queryInsertMov) && $updateP=mysqli_query($conexion,$queryUpdatePlaza))
												{
													echo $msj='<font color=green>Producto <b>'.$cfp.'</b> Guardado</font><br/>';
													$ingresado+=1;
												}//fin del if que comprueba que se guarden los datos
												else//sino ingresa el producto
												{
													// echo $msj='<font color=red>Producto <b>'.$cfp.' </b> NO Guardado </font><br/>';
													$this -> existeError = 1;
													array_push($value, "Existe error en Actualizar la plaza o al Guardar MOV ".$cfp);
													array_push($this -> arrayDuplicados, $value);
													$error+=1;
												}
											}else
											{
												$duplicado+=1;
												$this -> existeError = 1;
												array_push($value, "No existe plaza o la plaza ya fue cancelada");
												array_push($this -> arrayDuplicados, $value);
											// 	echo $duplicate='<font color=red>El Producto codigo <b>'.$cfp.'</b> Esta duplicado<br></font>';
											}
									}								
		// ******************************Autorizado/Cambio de Adscripción 
									else 
									if($cfp2 != "" && $estatus == "AUTORIZADO" && $motivo_mov == "CAMBIO DE ADSCRIPCIÓN"  && $numExiteCfpP != 0){ //|| $cfp2 == "00-000-000000")
		//****************/ ahora corroboramos que el cfp2 no exista aun en la bd
										// $sqlCfp2= mysqli_query($conexion,"SELECT * FROM movimientos_m2 WHERE codFederalPuestos = '$cfp2'");//Consulta a la tabla productos
										// $num3=mysqli_num_rows($sqlCfp2);//Cuenta el numero de registros devueltos por la consulta
										$sqlCfp2= mysqli_query($conexion,"SELECT * FROM plazas_ctrlp_m2 WHERE codigoFederalPuestos = '$cfp'");//Consulta a la tabla productos
										$num2=mysqli_num_rows($sqlCfp2);//Cuenta el numero de registros devueltos por la consulta
										$rowColor = mysqli_fetch_row($sqlCfp2);
											if ($num2 != 0 && $rowColor[34] != "rojo") // se necesita saber si hay registro en la plantilla para poder CANCELARLO 
											{
												$queryInsertMov = "INSERT INTO movimientos_m2 (folio_shcp, estatus, motivo_mov, codFederalPuestos, ramo, ur, zona, nivel, codigo, plazas, ramo2, ur2, zona2,	nivel2, codigo2, plazas2, codFederalPuestos2, fechaVigencia, rfc, autorizo, observacionesExtras,oficioDeSolicitud, oficioRespuesta, usuarioEdicion,	fechaCaptura, quincenaAplicada, anio ) VALUES ('$folio_shcp', '$estatus1','$motivo_mov1','$cfp','$ramo','$ur','$zona','$nivel','$codigo','$plazas','$ramo2','$ur2','$zona2','$nivel2','$codigo2','$plazas2','$cfp2','$fechaVigencia','$rfcT','$autorizo','$observaciones','$oficioSolicitud','$oficioRespuesta' ,'$usuarioSeguir', '$fechaSistema', '$qnaAplicada', '$anio')";
												$queryUpdatePlaza = "UPDATE plazas_ctrlp_m2 SET cfpAsignado = '$cfp2', 	comprobanteExistencia_cfp = '1', estatus = 'Autorizado', tipoMovimiento = 'Cambio de Adscripción', color_accion = 'rojo' WHERE codigoFederalPuestos = '$cfp'";
												if ($insert=mysqli_query($conexion,$queryInsertMov) && $updateP=mysqli_query($conexion,$queryUpdatePlaza))
												{
													echo $msj='<font color=green>Producto <b>'.$cfp.'</b> Guardado</font><br/>';
													$ingresado+=1;
												}//fin del if que comprueba que se guarden los datos
												else//sino ingresa el producto
												{
													$this -> existeError = 1;
													// echo $msj='<font color=red>Producto <b>'.$cfp.' </b> NO Guardado </font><br/>';
													array_push($value, "Existe error en Actualizar la plaza o al Guardar MOV ".$cfp);
													array_push($this -> arrayDuplicados, $value);
													$error+=1;
												}
											}else
											{
												$duplicado+=1;
												$this -> existeError = 1;
												array_push($value, "No existe plaza o la plaza ya fue cancelada ".$cfp);
												array_push($this -> arrayDuplicados, $value);

											// 	echo $duplicate='<font color=red>El Producto codigo <b>'.$cfp.'</b> Esta duplicado<br></font>';
											}
									}else
										// ******************************Autorizado/Nueva Creación 
										if($cfp2 != "" && $estatus == "AUTORIZADO" && $motivo_mov == "NUEVA CREACIÓN"  && $numExiteCfpP != 0){ //|| $cfp2 == "00-000-000000")
										//****************/ ahora corroboramos que el cfp2 no exista aun en la bd
											// $sqlCfp2= mysqli_query($conexion, "SELECT * FROM movimientos_m2 WHERE codFederalPuestos = '$cfp2'");//Consulta a la tabla productos
											// $num3=mysqli_num_rows($sqlCfp2);//Cuenta el numero de registros devueltos por la consulta
													$sqlExistP = mysqli_query($conexion, "SELECT * FROM plazas_ctrlp_m2 WHERE codigoFederalPuestos = '$cfp2'");//Consulta a la tabla productos
											// $numeXt = mysqli_num_rows($sqlExistP);//Cuenta el numero de registros devueltos por la consulta
												// if ($numeXt == 0)
												// {
													$queryUpdatePlaza = "UPDATE plazas_ctrlp_m2 SET cfpAsignado = '$cfp2', 	comprobanteExistencia_cfp = '1', estatus = 'Autorizado', tipoMovimiento = 'Nueva Creación', color_accion = 'blanco' WHERE codigoFederalPuestos = '$cfp'";
												// }
												// if ($num3 == 0)
												// {
													$queryInsertMov = "INSERT INTO movimientos_m2 (folio_shcp, estatus, motivo_mov, codFederalPuestos, ramo, ur, zona, nivel, codigo, plazas, ramo2, ur2, zona2,	nivel2, codigo2, plazas2, codFederalPuestos2, fechaVigencia, rfc, autorizo, observacionesExtras,oficioDeSolicitud, oficioRespuesta, usuarioEdicion,	fechaCaptura, quincenaAplicada, anio ) VALUES ('$folio_shcp', '$estatus1','$motivo_mov1','$cfp','$ramo','$ur','$zona','$nivel','$codigo','$plazas','$ramo2','$ur2','$zona2','$nivel2','$codigo2','$plazas2','$cfp2','$fechaVigencia','$rfcT','$autorizo','$observaciones','$oficioSolicitud','$oficioRespuesta' ,'$usuarioSeguir', '$fechaSistema', '$qnaAplicada', '$anio')";

													if ($insert=mysqli_query($conexion,$queryInsertMov))
													{
														echo $msj='<font color=green>Producto <b>'.$cfp.'</b> Guardado</font><br/>';
														$ingresado+=1;
													}//fin del if que comprueba que se guarden los datos
													else//sino ingresa el producto
													{
														// echo $msj='<font color=red>Producto <b>'.$cfp.' </b> NO Guardado </font><br/>';
														$this -> existeError = 1;
														array_push($value, "Existe error al crear la plaza");
														array_push($this -> arrayDuplicados, $value);
														$error+=1;
													}
												// }else
												// {
												// 	$duplicado+=1;
												// 	array_push($arrayDuplicados, $value);
												// 	echo $duplicate='<font color=red>El Producto codigo <b>'.$cfp.'</b> Esta duplicado<br></font>';
												// }
										}else 
// ****************************** ****************** Transito/Conversión
										if(($cfp2 == "" && $estatus == "TRANSITO" && $motivo_mov == "CONVERSIÓN" && $numExiteCfpP != 0) || ($cfp2 == "" && $estatus == "TRANSITO" && $motivo_mov == "CAMBIO DE ADSCRIPCIÓN" && $numExiteCfpP != 0)){ //|| $cfp2 == "00-000-000000")
										//****************/ ahora corroboramos que el cfp2 no exista aun en la bd
											$sqlCfp2= mysqli_query($conexion,"SELECT * FROM plazas_ctrlp_m2 WHERE codigoFederalPuestos = '$cfp'");//Consulta a la tabla productos
											$num2=mysqli_num_rows($sqlCfp2);//Cuenta el numero de registros devueltos por la consulta
																		// $sqlCfp2= mysqli_query($conexion, "SELECT * FROM movimientos_m2 WHERE codFederalPuestos = '$cfp2'");//Consulta a la tabla productos
																		// $num3=mysqli_num_rows($sqlCfp2);//Cuenta el numero de registros devueltos por la consulta
			
											if ($num2 != 0)
											{
												$queryInsertMov = "INSERT INTO movimientos_m2 (folio_shcp, estatus, motivo_mov, codFederalPuestos, ramo, ur, zona, nivel, codigo, plazas, ramo2, ur2, zona2,	nivel2, codigo2, plazas2, codFederalPuestos2, fechaVigencia, rfc, autorizo, observacionesExtras,oficioDeSolicitud, oficioRespuesta, usuarioEdicion,	fechaCaptura, quincenaAplicada, anio ) VALUES ('$folio_shcp', '$estatus1','$motivo_mov1','$cfp','$ramo','$ur','$zona','$nivel','$codigo','$plazas','$ramo2','$ur2','$zona2','$nivel2','$codigo2','$plazas2','$cfp2','$fechaVigencia','$rfcT','$autorizo','$observaciones','$oficioSolicitud','$oficioRespuesta' ,'$usuarioSeguir', '$fechaSistema', '$qnaAplicada', '$anio')";
												$queryUpdatePlaza = "UPDATE plazas_ctrlp_m2 SET comprobanteExistencia_cfp = '', estatus = 'Transito', tipoMovimiento = 'Conversón', color_accion = 'amarillo' WHERE codigoFederalPuestos = '$cfp'";
												if ($insert=mysqli_query($conexion,$queryInsertMov) && $updateP=mysqli_query($conexion,$queryUpdatePlaza))
												{
													echo $msj='<font color=green>Producto <b>'.$cfp.'</b> Guardado</font><br/>';
													$ingresado+=1;
												}//fin del if que comprueba que se guarden los datos
												else//sino ingresa el producto
												{
													$this -> existeError = 1;
													// echo $msj='<font color=red>Producto <b>'.$cfp.' </b> NO Guardado </font><br/>';
													array_push($value, "Existe error en Actualizar la plaza o al Guardar MOV ".$cfp);
													$error+=1;
												}
																			// }else
																			// {
																			// 	$duplicado+=1;
																			// 	array_push($arrayDuplicados, $value);
																			// 	echo $duplicate='<font color=red>El Producto codigo <b>'.$cfp.'</b> Esta duplicado<br></font>';
																			// }
											}else{
												$duplicado+=1;
												$this -> existeError = 1;
												array_push($value, "No existe plaza o la plaza ya fue cancelada ".$cfp);
												array_push($this -> arrayDuplicados, $value);
												// echo $duplicate='<font color=red>El Producto codigo <b>'.$cfp.'</b> Esta duplicado<br></font>';
											}

										}else{
											$duplicado+=1;
											$this -> existeError = 1;
											array_push($value, "No cumple con las especificaciones que se necesitan ".$cfp);
											array_push($this -> arrayDuplicados, $value);
											// echo $duplicate='<font color=red>El Producto codigo <b>'.$cfp.'</b> Esta duplicado<br></font>';
										}
						}//finaliza el for (con los datos correctos en el excel)
				?>
					
						<?php
					
						echo ' <script>window.location.href = "./generarFiltroExcel/reporteErroresMovs.php?arrayErr="'.serialize($this -> arrayDuplicados).' </script>';
					
						// generarReporteErrores($arrayDuplicados);
						echo "<font color=green>".number_format($ingresado,2)." Movimientos con exito<br/>";
						echo "<font color=red>".number_format($duplicado,2)." Movimientos Duplicados<br/>";
						// echo "<font color=red>".$error." Errores de almacenamiento<br/>";
						echo "<font color=red> MOVIMIENTOS QUE NO SE PUDIERON ALMACENAR:<br/>";
						// print_r($arrayDuplicados);
						
					} //cerramos IF que las columnas sean 24
				} //cerramos funcion cargarPlantillaBD()

				function getArrayDuplicados(){
					return $this -> arrayDuplicados;
				}
	} // cerramos la Class
			    	?>
			
		<a  href= <?php echo ("'../../roles/menuPrincipal.php?usuario_rol=$usuarioSeguir'");?>><img class="img-responsive" src="img/ss1.png" height="90" width="280"/></a>
		<div id="resp"></div>
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

				
			<h3 class="estilo-color plantilla-subtitulospr">Sistema de Control Plantilla.</h3>
				<br>
				<h3>CARGA DE MOVIMIENTOS</h3>
				<br>
				<h5 class=" plantilla-subtitulop"> Seleccionar Excel: </h5>
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
						$termino=0;

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
												$concatenarNombreC = $dir_subida.strtoupper("MOVS_PLAZAS.".$extencion3);
												error_reporting(0);
												rename ($fichero_subido,$concatenarNombreC);
												error_reporting(-1);
											}else{
											    echo "<script> alert('Existe un error al guardar el archivo'); ";
											}	
											
											if($termino == 1){
												echo '<script>alert("Se leyo correctamente la plantilla");</script>';
												// $generarPlantilla = new CargarPlantilla();
												// $generarPlantilla->cargarPlantillaBD();

											}
							}

					?>	
				</form>
				<form method="post" action="./generarFiltroExcel/reporteErroresMovs.php">
					<?php
					if($termino == 1){
						$generarPlantilla = new CargarPlantilla();
						$generarPlantilla->cargarPlantillaBD();
						$arrayGet = $generarPlantilla->getArrayDuplicados();
						$existeErr = $generarPlantilla->getExiteErr();
						$arrayS = serialize($arrayGet);
						if($existeErr == 1){ // si es 1 significa que existe un error 
					?>
					<input type='hidden' name='arrayErr' class='btn btn btn-success text-white bord' value='<?php  echo base64_encode($arrayS); ?>'>
					<input type='submit' name='accionBoton' class='derecha btn btn-outline-warning' value="Rechazados">
					<?php 
						}
					}
					?>
				</form>
	</center>
	
	</body>
</html>