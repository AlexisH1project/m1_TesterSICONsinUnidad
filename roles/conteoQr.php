
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
									document.getElementById("nombreUser").value = infEmpleado[0].nombre ;
									document.getElementById("apellido1").value = infEmpleado[0].apellido1 ;
									document.getElementById("apellido2").value = infEmpleado[0].apellido2 ;
								}
							});
							return false;
						}
					});
				});
			});
			// ******************************************************Autocompletar el apellido1 
			$(document).ready(function(){
				$(document).on('keydown', '.apellido1', function(){
					var id = this.id;
					var indice = 1;
					$('#'+id).autocomplete({
						source: function(request, response){
							$.ajax({
								url: "resultados_apellido1.php",
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
								url: 'resultados_apellido1.php',
								type: 'post',
								data: {
									buscarid:buscarid,request:2
								},
								dataType: 'json',
								success:function(response){
									var len = response.length;
									if(len > 0){
										// var  = response[0]['name_p1'];
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
// ******************************************************Autocompletar el apellido2
$(document).ready(function(){
				$(document).on('keydown', '.apellido2', function(){
					var id = this.id;
					var indice = 1;
					$('#'+id).autocomplete({
						source: function(request, response){
							$.ajax({
								url: "resultados_apellido2.php",
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
								url: 'resultados_apellido2.php',
								type: 'post',
								data: {
									buscarid:buscarid,request:2
								},
								dataType: 'json',
								success:function(response){
									var len = response.length;
									if(len > 0){
										// var  = response[0]['name_p1'];
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

	// ******************************************************Autocompletar el NOMBRE 
	$(document).ready(function(){
				$(document).on('keydown', '.nombre', function(){
					var id = this.id;
					var indice = 1;
					$('#'+id).autocomplete({
						source: function(request, response){
							$.ajax({
								url: "resultados_nombre.php",
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
							console.log(buscarid);
							$.ajax({
								url: 'resultados_nombre.php',
								type: 'post',
								data: {
									buscarid:buscarid,request:2
								},
								dataType: 'json',
								success:function(response){
									var len = response.length;
									if(len > 0){
										// var  = response[0]['name_p1'];
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

			function detectarDatos() {
				var getcurp = document.getElementById("rfcL_1");
				console.log("CURP:: "+getcurp.value);
			}

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
								<br>
								<label class="plantilla-label" for="NAME">*NOMBRE COMPLETO:</label>
								<input type="text"  type="text" class="form-control nombre border border-dark" placeholder="NOMBRE" name="nombreUser" id="nombreUser" required>
								<input type="text"  type="text" class="form-control apellido1 border border-dark" placeholder="APELLIDO PATERNO" name="apellido1" id="apellido1" required>
								<input type="text"  type="text" class="form-control apellido2 border border-dark" placeholder="APELLIDO MATERNO" name="apellido2"  id="apellido2" required>
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
							<input type="submit" name="buscar" class="btn btn btn-danger tamanio-button plantilla-input text-white bord" value="GUARDAR"><br>
							<!-- <button id="enviarT" type="button" name="busca" onclick = "detectarDatos()" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
											 Guardar
							</button> -->
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
						$var_PHP = '<script> document.writeln(getcurp); </script>'; // igualar el valor de la variable JavaScript a PHP 

						echo $var_PHP;    // muestra el resultado 
						
						// if(isset($_POST['busca'])){
						// 	$elCurp = $_POST['rfcL_1'];
						// 	$asignadoA = $_POST['usuarioOption'];
						// 	$elRfc = $_POST['rfc'];
						// 	$laUnidad = $_POST['unexp_1'];

						// 	$sqlQna = "SELECT * FROM m1ct_fechasnomina WHERE estadoActual = 'abierta'";

						// 	if($resQna = mysqli_query($conexion,$sqlQna)){
						// 		$rowQna = mysqli_fetch_row($resQna);
						// 		// $fehaI = date("d-m-Y", strtotime($rowQna[4])); 
						// 		// $fehaF = date("d-m-Y", strtotime($rowQna[5])); 
						// 		$newQna = $rowQna[0];
						// 	}

						// 	$querySelect2 = "SELECT curp, qna, anio, rfc, analistaAsignada FROM conteo_qr WHERE rfc = '$elRfc' ORDER BY id_cont DESC";
						// 	if($resultQry2 = mysqli_query($conexion, $querySelect2)){
						// 		$rowQry2 = mysqli_fetch_row($resultQry2);
						// 		// echo "<script> alert('$rowQry'); </script>";
						// 		if($rowQry2[0] == $elCurp && $rowQry2[1] == $newQna && $rowQry2[4] == $asignadoA){
						// 			echo "SII hay registro";
						// 		}
						// 	}
						// }
					?>
						<input type="text" id="qnaSeleccionada2" name="qnaSeleccionada2" value = "<?php echo "<script> document.writeln(getcurp); </script>" ?>">

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
						include "configuracion.php";

			if(isset($_POST['buscar'])){	

							$from = '\\\\PWIDGRHOSISFO01\\Archivos2\\';
							$from2 = '\\\\PWIDGRHOSISFO01\\pdfs2\\';
							$to = './Controller/DOCUMENTOS_MOV_QR/FMP/';

							$elCurp = $_POST['rfcL_1'];
							$asignadoA = $_POST['usuarioOption'];
							$elRfc = $_POST['rfc'];
							$laUnidad = $_POST['unexp_1'];
							$elNombre = strtoupper($_POST['nombreUser']);
							$elAp1 = strtoupper($_POST['apellido1']);
							$elAp2 = strtoupper($_POST['apellido2']);

							$hoy = "select CURDATE()";
							$tiempo ="select curTime()";
							if ($resultHoy = mysqli_query($conexion,$hoy) AND $resultTime = mysqli_query($conexion,$tiempo)) {
								$row = mysqli_fetch_row($resultHoy);
								$fecha = str_replace ( "-", '',$row[0] ); 
								$row2 = mysqli_fetch_row($resultTime);
								$elanio = explode("-",$row[0]);
							}
							$sqlQna = "SELECT * FROM m1ct_fechasnomina WHERE estadoActual = 'abierta'";

							if($resQna = mysqli_query($conexion,$sqlQna)){
								$rowQna = mysqli_fetch_row($resQna);
								// $fehaI = date("d-m-Y", strtotime($rowQna[4])); 
								// $fehaF = date("d-m-Y", strtotime($rowQna[5])); 
								$newQna = $rowQna[0];
							}

							$querySelect2 = "SELECT curp, qna, anio, rfc, analistaAsignada, unidad FROM conteo_qr WHERE rfc = '$elRfc' ORDER BY id_cont DESC";
							if($resultQry2 = mysqli_query($conexion, $querySelect2)){
								if($rowQry2 = mysqli_fetch_row($resultQry2)){
								// echo "<script> alert('$rowQry'); </script>";
								
								if($rowQry2[0] == $elCurp && $rowQry2[1] == $newQna && $rowQry2[4] == $asignadoA && $rowQry2[5] == $laUnidad){
									echo "<script>alert('Ya existe registro con estos datos, verificar.'); </script>";
									
								}else {
									$sql = "INSERT INTO conteo_qr (curp, fecha, hora, usuarioAgrego, qna, anio, rfc, analistaAsignada, unidad, apellido_p, apellido_m, nombre) VALUES ('$elCurp', '$row[0]', '$row2[0]', '$usuarioSeguir', '$newQna', '$elanio[0]', '$elRfc', '$asignadoA', '$laUnidad', '$elAp1', '$elAp2', '$elNombre') ";
									if(mysqli_query($conexion,$sql)){
										if(file_exists($from2.$elRfc.".pdf")){
											copy($from2.$elRfc.".pdf" , $to.$elCurp."_FMP_".$newQna."_".$fecha.".PDF");
											// touch($to.$extencionFile[0]."_X_".$generarID.".".$extencionFile[1], $bktimea); 
											showFiles($from,$elCurp,$fecha,$newQna); //enviamos la direccion y el curp
											echo("
											<br>
											<br>
											<div class='col-sm-12'>
											<div class='plantilla-inputv text-dark ''>
											<div class='card-body'><h2 align='center'>GUARDADO CORRECTAMENTE: </h2> <i>$elCurp</i></div>
											</div>
											</div>");
										}else{
											echo("
											<br>
											<br>
											<div class='col-sm-12'>
											<div class='plantilla-inputv text-dark ''>
											<div class='card-body'><h2 align='center'>NO EXISTEN DOCUMENTOS</h2> <i>Se guardo el registro Correctamente.</i> </div>
											</div>
											</div>");	
										}
									}
								}
							  }else {
								$sql = "INSERT INTO conteo_qr (curp, fecha, hora, usuarioAgrego, qna, anio, rfc, analistaAsignada, unidad, apellido_p, apellido_m, nombre) VALUES ('$elCurp', '$row[0]', '$row2[0]', '$usuarioSeguir', '$newQna', '$elanio[0]', '$elRfc', '$asignadoA', '$laUnidad', '$elAp1', '$elAp2', '$elNombre') ";
									if(mysqli_query($conexion,$sql)){
										if(file_exists($from2.$elRfc.".pdf")){
											copy($from2.$elRfc.".pdf" , $to.$elCurp."_FMP_".$newQna."_".$fecha.".PDF");
											// touch($to.$extencionFile[0]."_X_".$generarID.".".$extencionFile[1], $bktimea); 
											showFiles($from,$elCurp,$fecha,$newQna); //enviamos la direccion y el curp
											echo("
											<br>
											<br>
											<div class='col-sm-12'>
											<div class='plantilla-inputv text-dark ''>
											<div class='card-body'><h2 align='center'>GUARDADO CORRECTAMENTE: </h2> <i>$elCurp</i></div>
											</div>
											</div>");
										}else{
											echo("
											<br>
											<br>
											<div class='col-sm-12'>
											<div class='plantilla-inputv text-dark ''>
											<div class='card-body'><h2 align='center'>NO EXISTEN DOCUMENTOS</h2> <i>Se guardo el registro Correctamente.</i> </div>
											</div>
											</div>");	
										}
									}
							  }
							}else{
								echo "se pudo ";
							}
						}
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
			$to = './Controller/DOCUMENTOS_MOV_QR/';

			$sqlCarpDocs = "SELECT * FROM ct_documentos_qr";
			$conectar = mysqli_query($conexion, $sqlCarpDocs);
			while($rowCarpDocs=mysqli_fetch_row($conectar)){ 
				if($rowCarpDocs[2] == "FMP"){
					continue;
				}else{
					if(file_exists($from.$rowCarpDocs[2]."\\".$curp."_".$rowCarpDocs[2].".PDF")){
						if($rowCarpDocs[2] == "ACTA" OR	$rowCarpDocs[2] == "BAN" OR	$rowCarpDocs[2] == "CED" OR	$rowCarpDocs[2] == "CONS" OR	$rowCarpDocs[2] == "CURP" OR $rowCarpDocs[2] == "IDE" OR $rowCarpDocs[2] == "RFC"){
							copy($from.$rowCarpDocs[2]."\\".$curp."_".$rowCarpDocs[2].".PDF", $to.$rowCarpDocs[2]."/".$curp."_".$rowCarpDocs[2]."_0_X.PDF");
						}else{
							copy($from.$rowCarpDocs[2]."\\".$curp."_".$rowCarpDocs[2].".PDF", $to.$rowCarpDocs[2]."/".$curp."_".$rowCarpDocs[2]."_".$laQna."_".$generarID.".PDF");
						}
						// echo "doccsssssssss::::  ".$rowCarpDocs[2];
					}
				}
			}
		}
?>

		
	</center>
	</body>

</html>

