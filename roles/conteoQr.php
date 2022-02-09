
<html>
	<head>
		<!-- ola kevss -->
		<meta charset="utf-8">
		<title>FOMOPE Autorizar</title>
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
			<style type="text/css">
			
			p.one {
			  border-style: solid;
			  border-color: hsl(0, 100%, 50%); /* red */
			}

			p.two {
			  border-style: solid;
			  border-color: hsl(240, 100%, 50%); /* blue */
			}

			p.three {
			  border-style: solid;
			  border-color: hsl(0, 0%, 73%); /* grey */
			}
			
			.formulario_fomope{
				padding-left: 10%;
				padding-right: 10%;
			}
			.bord {
			  border-style: solid;
			  border-color: #9f2241; /* grey */
			}
			.bordg {
			  border-style: solid;
			  border-color: #6f7271; /* grey */
			}
			input{
				text-transform: uppercase;
			}

			.estilo-color{
				font-family: Monserrat, Medium;
				font-size: 25px;
				color:  #9f2241 ;
				font-weight: bold;
			}
			.estilo-colorr{
				color:  #f2ebd7 ;
				font-weight: bold;
			}
			.estilo-colorn{
				color:  #000000 ;
				font-weight: bold;
			}
			.estilo-colorb{
				color:  #ffffff ;
				font-weight: bold;
			}

			.plantilla-titulos{
				background-color: #A9D0F5;
				font-family: Monserrat, Medium;
				font-size: 25px;
				font-weight: bold;
				padding: 12px 12px 0px 12px;
			}

			.plantilla-subtitulos{
				font-family: Monserrat, Medium;
				font-size: 18px;
				font-weight: bold;
			}
			.plantilla-subtitulosp{
				font-family: Monserrat, Medium;
				font-size: 22px;
				font-weight: bold;
			}
			.plantilla-subtitulospr{
				font-family: Monserrat, Medium;
				font-size: 25px;
				font-weight: bold;
			}

			.plantilla-inputb{
				text-color: #ffffff;
				font-family: Monserrat, Medium;
				padding: 12px;
			}
			.plantilla-input{
				background-color: #9f2241;
				font-family: Monserrat, Medium;
				padding: 12px;
			}
			.plantilla-inputg{
				background-color: #6f7271;
				font-family: Monserrat, Medium;
				padding: 25px;
			}
			.plantilla-inputv{
				background-color: #f2ebd7;
				font-family: Monserrat, Medium;
				padding: 12px;
			}

			.plantilla-label{
				font-weight: bold;
				border-color: hsl(0, 100%, 50%); /* red */
				font-family: Monserrat, Medium;
				font-size: 18px;
			}

			.plantilla-lugnac{
				background-color: #A9D0F5;
				font-family: Monserrat, Medium;
				font-size: 21px;
				font-weight: bold;
				padding: 12px 12px 2px 12px;
			}

			.plantilla-depend{
				background-color: #A9D0F5;
				font-family: Monserrat, Medium;
				font-size: 22px;
				font-weight: bold;
				padding: 12px 12px 8px 12px;
			}

			.plantilla-inputdepend{
				background-color: #CEE3F6;
				font-family: Monserrat, Medium;
				padding: 36px 12px 36px 12px;
			}

			.tamanio-button{
				font-weight: bold;
				font-size: 25px;
			}
			.tamanio-button2{
				font-weight: bold;
				font-size: 13px;
			}

		</style>
	<script>
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
							$(this).val(ui.item.value);
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
										// var idx2 = response[0]['idx'];
										// var unexp = response[0]['unexp'];
										// document.getElementById('unexp_'+indice).value = "ss";
									}
								}
							});
							return false;
						}
					});
				});
			});

			$(document).ready(function(){
				$(document).on('keydown', '.rfcL', function(){
					var id = this.id;
					var splitid = id.split('_');
					var indice = splitid[1];
					$('#'+id).autocomplete({
						source: function(request, response){
							$.ajax({
								url: "resultados_curp.php",
								type: 'post',
								dataType: "json",
								data: {
									busqueda: request.term,request:1

								},
								success: function(data){
									response(data);
									
								}
							});
						},select: function (event, ui){
							$(this).val(ui.item.label);
							var buscarid = ui.item.value;
							console.log(buscarid);
							//alert(buscarid);
							$.ajax({
								url: 'resultados_curp.php',
								type: 'post',
								data: {
									buscarid:buscarid,request:2,
									
								},
								success: function(data){
									
									$('#cuerpoTabla').children( 'tr' ).remove();
									console.log(data);
									var infEmpleado = eval(data);
									console.log(data);
									console.log(infEmpleado[0].apellido1);
								      console.log(infEmpleado.length);

									//document.getElementById("rfc").value = infEmpleado[1] ;
									
									document.getElementById("rfc").value = infEmpleado[0].rfc ;
								}
							});
							return false;
						}
					});
				});
			});

	</script>
	</head>
	<body>
			<?php
				include "configuracion.php";
				$usuarioSeguir =  $_GET['usuario_rol'];
			?>

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
		  <a  href= <?php echo ("'./menuPrincipal.php?usuario_rol=$usuarioSeguir'");?>><img class="img-responsive" src="img/ss1.png" height="90" width="280"/></a>
		
		
		<center>			
						<h3 class="estilo-color plantilla-subtitulospr">Sistema de Control de Registro de Formato de Movimiento de Personal (SICON).</h3>
				<br>
				<h5  class=" plantilla-subtitulop" > DEPARTAMENTO DE DICTAMINACIÓN SALARIAL Y CONTRATOS POR HONORARIOS - DDSCH</h5>

				<script type="text/javascript">

					function obtenerRadioSeleccionado(formulario, nombre, userRol){
						var contador = 0;
					     elementosSelectR = [];
					     elementos = document.getElementById(formulario).elements;
					     longitud = document.getElementById(formulario).length;
					     for (var i = 0; i < longitud; i++){
					         if(elementos[i].name == nombre && elementos[i].type == "checkbox" && elementos[i].checked == true){
										elementosSelectR[contador]=elementos[i].value;
										//alert(elementosSelectR[contador]);
										contador++;
					         }
					     }
					     if(contador > 0){
							window.location.href = './Controller/autorizarTodoLulu.php?id_fomope='+elementosSelectR+'&idSeguir='+userRol;

					     }
					     //return false;
					} 

				</script>
			
	
			<br>

			<form id="formConteo" method="post" action=""> 
			<div  id="content" class="rounded border border-dark plantilla-inputv text-center">
					<div class="form-row">
						<div class="col">
						<center>
							<div class="form-group col-md-12">
								<label class="plantilla-label" for="elRfc">*CURP:</label>
								
								<input type="text"  type="text" class="form-control rfcL border border-dark" id="rfcL_1" name="rfcL_1" placeholder="CURP" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Ingresa curp" maxlength="18"  required>
							</div>
						</div>
						<div class="col">

							<div class="form-group col-md-12">
								<label class="plantilla-label" for="elRfc">*RFC:</label>
								<input type="text"  type="text" class="form-control rfcL border border-dark" id="rfc" name="rfc" placeholder="RFC" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Ingresa rfc" maxlength="13"  required>
							</div>
						</div>
						<div class="col">
							<div class="form-group col-md-10" >
								<label class="plantilla-label estilo-colorg" for="unexp_1">Unidad:</label>
								<input onkeypress="return pulsar(event)" type="text" class="form-control unexp border border-dark" id="unexp_1" name="unexp_1" placeholder="Ej. 513" required>
							</div>
						</div>
					
						<div class="col">
							 <div class="form-group col-md-6 ">
									<label  class="plantilla-label" for="laUsuario">*ASIGNAR A: </label>
										 
										<select class="rounded border border-dark" id="usuarioOption" name="usuarioOption" onchange="guardarTurnado();">
											<?php
											if (!$conexion->set_charset("utf8")) {//asignamos la codificación comprobando que no falle
											       die("Error cargando el conjunto de caracteres utf8");
											}

											$consulta = "SELECT * FROM usuarios WHERE id_rol = 3 OR id_rol = 2 OR id_rol = 7 OR id_rol = 0";
											$resultado = mysqli_query($conexion , $consulta);
											$contador=0;
											?>
												<option  data-subtext=""></option>
											<?php

											while($turnado = mysqli_fetch_assoc($resultado)){ $contador++;?>
												<option  data-subtext="<?php echo $turnado["id_turnado"]; ?>"><?php echo $turnado["usuario"]; ?></option>
											<?php }?>          
											</select>
							</div>
						</div>

					
						</center>
					</div>

					
			
				<div class="col-sm-12">
					<div class="form-row">

					<div class="form-group col-md-12">
						<div class="col text-center">
							<!-- <input type="submit" name="buscar" class="btn btn btn-danger tamanio-button plantilla-input text-white bord" value="GUARDAR"><br> -->
							<button id="enviarT" type="submit" name="busca" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
											 Guardar
							</button>
							<!-- <button type="submit" name="buscar" class="btn btn-outline-info tamanio-button">Buscar</button> -->
						</div>
					</div>

					</div>
				</div>
			</form>

		</div>
	
	</div>
		<!-- Modal -->
		<div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
			<center>
					<?php
						if(isset($_POST['busca'])){
							$elCurp = $_POST['rfcL_1'];
							$asignadoA = $_POST['usuarioOption'];
							$elRfc = $_POST['rfc'];
							$laUnidad = $_POST['unexp_1'];

							$sqlQna = "SELECT * FROM m1ct_fechasnomina WHERE estadoActual = 'abierta'";

							if($resQna = mysqli_query($conexion,$sqlQna)){
								$rowQna = mysqli_fetch_row($resQna);
								// $fehaI = date("d-m-Y", strtotime($rowQna[4])); 
								// $fehaF = date("d-m-Y", strtotime($rowQna[5])); 
								$newQna = $rowQna[0];
							}

							$querySelect2 = "SELECT curp, qna, anio, rfc, analistaAsignada FROM conteo_qr WHERE rfc = '$elRfc' ORDER BY id_cont DESC";
							if($resultQry2 = mysqli_query($conexion, $querySelect2)){
								$rowQry2 = mysqli_fetch_row($resultQry2);
								// echo "<script> alert('$rowQry'); </script>";
								if($rowQry2[0] == $elCurp && $rowQry2[1] == $newQna && $rowQry2[4] == $asignadoA){
									echo "<script> var mensaje = confirm('Ya existe un registro con los mismos datos, ¿Deseas subir y duplicar el mismo registro?');

									</script>";
								}
							}
						}
					?>
			</center>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Understood</button>
			</div>
			</div>
		</div>
		</div>

		<br>
		<br>

					<?php 
				
					echo "<script>}else {
									alert('¡Haz denegado el registro!');
								}
							</script>";
						?>

					

<?php

		//---> Funcion recurciba la cual nos ayuda a extraer los documentos de varias carpetas contenidas de una direccion inicial. Esta funcion solo se activa una vez al final del codigo
		function showFiles($from, $curp, $generarID, $laQna){
			set_time_limit(3600);
			include "configuracion.php";
			//$to = '../roles/Controller/DOCUMENTOS_RES/';
			//$to = './SICON/'.$nameCarpetaOTRO[1];
			//$to = './Controller/DOCUMENTOS_RES/'.$nameCarpetaOTRO[1];
			$nameCarpetaOTRO= explode("\\Archivos2\\", $from);
			$to = './Controller/DOCUMENTOS_MOV_QR/'.$nameCarpetaOTRO[1];
			$nameCarpetaSICON= explode("./Controller/DOCUMENTOS_MOV_QR/", $to);


			$dir = opendir($from);
			$files = array();
			while ($current = readdir($dir)){
				if( $current != "." && $current != "..") {
					if(is_dir($from.$current)) {
						showFiles($from.$current.'/', $curp, $generarID, $laQna);
					}
					else {
						$files[] = $current;
						
					}
				}
			}
		
			$iterator = new DirectoryIterator($from);
			// $iterator2 = new DirectoryIterator($to);
			foreach ($iterator as $fileinfo) { //----------> iniciamos a recorrer los docuementos de la carpeta del servidor donde se van a extraer
				$docModificado = 0 ;
				$contadorExistenDoc = 0; 
				$existeRFC = 0;
				if ($fileinfo->isFile()) {
					// Arreglo con todos los nombres de los archivos
					$nombreDocServ = explode(".",$fileinfo);
					$curpInterator = explode("_",$nombreDocServ[0]);
					//echo("nombre:: ". $nombreDocServ[0]);
													//$files = array_diff(scandir($to), array('.', '..')); 
					$totalDoc = count(glob($to.'{*.pdf,*.PDF}',GLOB_BRACE));  //---> total de documentos en la carpeta a la cual se van a pasar 
					/*echo '<h2> COMÁRANDO: '.$nameCarpetaSICON[1].'</h2>';
					echo '<h2> COMÁRANDO: '.$nameCarpetaOTRO[1].'</h2>';*/
					if($nameCarpetaSICON[1] == $nameCarpetaOTRO[1]){												
													// foreach($iterator2 as $file){
												
								//--->  iniciamos a detectar como se encuentra la estrucutra del nombre del documento para poder saber si 
										// -----> Esta comparacion es para saber si existen los documentos con las mismas caracteristicas 
													if($curp == $curpInterator[0]) {
														// echo "creeeeeea el docccc". "\n";
														$bktimea = filectime($from.$fileinfo->getFilename()); // obtener tiempo unix
														$fromV =$from.$fileinfo->getCTime(); // ----> antes de copiar , se obtiene su id de creacion 
													// 	echo "c: ". filectime($from.$fileinfo->getFilename())."</br>".
													// 	"a: ". fileatime($from.$fileinfo->getFilename())."</br>".	
													// 	"m: ". filemtime($from.$fileinfo->getFilename())."</br>"
													// ;  
													$extencionFile = explode(".",$fileinfo);
														// echo "ANTES OBTENEMOS info". $bktimea ." ". $fromV . $to.$fileinfo->getFilename()."</br>";
													copy($from.$fileinfo->getFilename() , $to.$extencionFile[0]."_".$laQna."_".$generarID.".".$extencionFile[1]);
													touch($to.$extencionFile[0]."_".$laQna."_".$generarID.".".$extencionFile[1], $bktimea); 
														// $bktimea2 = filectime($to.$file->getFilename()); // obtener tiempo unix
														// echo "DESPUES info". $bktimea2 ."</br>";
													}
				}// --->> IF si se encuentra en la misma capeta
						}
					}
				}
?>

		
	</center>
	</body>

</html>

