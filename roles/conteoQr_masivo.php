
<html>
	<head>
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
		<script src="js/jquery-3.4.1.min.js" type="text/javascript"></script>
		<script src="js/jquery-ui.min.js" type="text/javascript"></script>
		<script src="js/jquery-ui.js" type="text/javascript"></script>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/estilossicon.css">

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
		  .estilo-colorg{
				font-family: Montserrat, Medium;
				font-size: 100px;
				color:  #6f7271 ;
				font-weight: bold;
			}


		  </style>
		<script type="text/javascript">
			
			function listaDeDoc(text, listaEnviar){
				document.getElementById("listaDoc").value = text;
				document.getElementById("guardarDoc").value = listaEnviar;
			}

			function guardarQna(){
				var combo = document.getElementById("qnaOption");
				var selected = combo.options[combo.selectedIndex].text;
				document.getElementById("qnaSeleccionada").value = selected;
				document.getElementById("qnaSeleccionada2").value = selected;
				//alert(selected);
			}

			function guardarAnio(){
				var combo = document.getElementById("anioOption");
				var selected = combo.options[combo.selectedIndex].text;
				document.getElementById("anioSeleccionado").value = selected;
			}

			/*function guardarTurnado(){
				var combo = document.getElementById("turnadoOption");
				var selected = combo.options[combo.selectedIndex].text;
				document.getElementById("turnadoSeleccionado").value = selected;
			}*/

		</script>
	</head>
	<body>

	<?php 
		include "configuracion.php";
				$usuarioSeguir = $_GET['usuario_rol'];

			$sqlNombre = "SELECT nombrePersonal, id_rol FROM usuarios WHERE usuario = '$usuarioSeguir'";
			$result = mysqli_query($conexion,$sqlNombre);
			$nombreU = mysqli_fetch_row($result);
			$valor = "";
			$hoy = "select CURDATE()";
			$tiempo ="select curTime()";
			$diaActual = "";

			 if ($resultHoy = mysqli_query($conexion,$hoy) AND $resultTime = mysqli_query($conexion,$tiempo)) {
			 		$rowF = mysqli_fetch_row($resultHoy);  // cambiamos formato de hora 
			 		$fechaSistema = date("d-m-Y", strtotime($rowF[0])); //"05-04-2020";;
			 		$rowHora = mysqli_fetch_row($resultTime);

					$diaActual=date("w", strtotime($fechaSistema));
					
			 }

			 
		 ?>
 <br>
 <br>
 <br>

<?php
				if($nombreU[1] == 7){
?>
							<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar" class=" bordv">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-outline-secondary">
	          <i class="fa fa-bars"></i>
	          <br>
	          <span class="sr-only">Menú</span>
	        </button>
        </div>
				<div class="p-4 ">

		  		<img class="img-responsive" src="img/ss1.png" height="50" width="190">
	        <ul class="list-unstyled components mb-5">
	        	<br>
	        	<center>
	        	<li class=" estilo-color">
	            <a href= <?php echo ("'./menuPrincipal.php?usuario_rol=$usuarioSeguir'");?>><img src="./img/iclogin.png" alt="x" height="17" width="17"/><?php echo (" $nombreU[0]"); ?></span></a>
	          </li>
	      </center>
	           <li class=" estilo-color">
	            <a href=  <?php echo ("'./Controller/consultaRoles.php?usuarioSeguir=$usuarioSeguir''"); ?> ><img src="./img/2_ic.png" alt="x" height="17" width="20"/>Bandeja</a>
	          </li>
	          <li class=" estilo-color">
	              <a href= <?php echo ("'./consultaEstado.php?usuario_rol=$usuarioSeguir'");?>><img src="./img/ic-consulta.png" alt="x" height="17" width="17"/> Consulta</a>
	          </li>
	          
	          <br>
	          <br>
	          <br>
	          <br>
	          <br>
	          <br>
	          <br>
	          <br>
	          <br>
	          <br>
	          <li class=" estilo-color">
	              <a class="nav-link" href=  "../LoginMenu/vista/cerrarsesion.php" ><img src="./img/iclogout.png" alt="x" height="17" width="17"/> Cerrar Sesión</a>
	          </li>
	          
	          </li>
	          <li class=" estilo-color">
             
	          </li>

	        </ul>
<?php
				}else{
?>
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar" class=" bordv">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-outline-secondary">
	          <i class="fa fa-bars"></i>
	          <br>
	          <span class="sr-only">Menú</span>
	        </button>
        </div>
				<div class="p-4 ">

		  		<img class="img-responsive" src="img/ss1.png" height="50" width="190">
	        <ul class="list-unstyled components mb-5">
	        	<br>
	        	<center>
	        	<li class=" estilo-color">
	            <a href= <?php echo ("'./menuPrincipal.php?usuario_rol=$usuarioSeguir'");?>><img src="./img/iclogin.png" alt="x" height="17" width="17"/><?php echo (" $nombreU[0]"); ?></span></a>
	          </li>
	      </center>
	          <li class=" estilo-color">
	            <a href=  <?php echo ("'./Controller/consultaRoles.php?usuarioSeguir=$usuarioSeguir''"); ?> ><img src="./img/2_ic.png" alt="x" height="17" width="20"/>      Bandeja</a>
	          </li>
	           <li class=" estilo-color">
	            <a href=  <?php echo ("'./FiltroDescargar.php?usuario_rol=$usuarioSeguir'"); ?> ><img src="./img/icreport2.png" alt="x" height="17" width="20"/>      Descarga de Documentos</a>
	          </li>
	          <li class=" estilo-color">
	            <a href=  <?php echo ("'./generarReporte.php?usuario_rol=$usuarioSeguir'"); ?> ><img src="./img/icreport.png" alt="x" height="17" width="20"/>Generar Reporte</a>
	          </li>
	          <li class=" estilo-color">
	              <a href= <?php echo ("'./consultaEstado.php?usuario_rol=$usuarioSeguir'");?>><img src="./img/ic-consulta.png" alt="x" height="17" width="17"/> Consulta</a>
	          </li>
	          
	          <br>
	          <br>
	          <br>
	          <br>
	          <br>
	          <br>
	          <br>
	          <br>
	          <br>
	          <br>
	          <li class=" estilo-color">
	              <a class="nav-link" href=  "../LoginMenu/vista/cerrarsesion.php" ><img src="./img/iclogout.png" alt="x" height="17" width="17"/> Cerrar Sesión</a>
	          </li>
	          
	          </li>
	          <li class=" estilo-color">
             
	          </li>

	        </ul>
<?php
				}
?>
	       <!-- <div class="mb-5">
						<h3 class="h6 mb-3">Subscribe for newsletter</h3>
						<form action="#" class="subscribe-form">
	            <div class="form-group d-flex">
	            	<div class="icon"><span class="icon-paper-plane"></span></div>
	              <input type="text" class="form-control" placeholder="Enter Email Address">
	            </div>
	          </form>
					</div>-->

	        <!--<div class="footer">
	        	<p>Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0.
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
						  Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0.</p>
	        </div>-->

	      </div>
    	</nav>



    	<nav class="navbar fixed-top navbar-expand-lg navbar-dark bordv plantilla-inputv fixed-top">
		    <center>
		    	<div class="container plantilla-inputv " align="center">
		      <div class="collapse navbar-collapse" id="navbarResponsive">
		      	
		      		<div class="form-row " >
		      		 
		        <ul class="navbar-nav ml-auto">          
		       
		        	
		        	<h3  class="estilo-colorn">Sistema de Control de Registro de Formato de Movimiento de Personal
		          </h3>
		          <h3  class="estilo-colorv">............
		          </h3>
		        </ul>

		         <ul class="navbar-nav ml-auto">          
		      
		         <h5 class=" estilo-color">Departamento Dirección General de Recursos Humanos y Organización/Dirección integral de puestos y servicios personales</h5>
		        </ul>  
		      </div>
		      <br>
		     
		    </div> 
		</center>
		    <br>
		    <br>
		  </nav>
		  <div class="form-group col-md-10">
						<div class="col text-center">
			<br>
		    <br>
		    <br>
		    <br>
			
				<h3>Sistema para guardar archivos (.txt) generados en la aplicación QR</h3>
				<h3>Conteo inicial de QR</h3>
				<br>

				<?php
					if(isset($_POST["listaDoc"])){ 
						$listaMostrar = $_POST["listaDoc"];
					}else{
						$listaMostrar = "";
					}

				?>
			
			<form enctype="multipart/form-data" method="post" action=""> 

				<div class="rounded border border-dark plantilla-inputv text-center">
					<div class="form-row">
						
						
						<div class="col">
						    	<div class="form-group">
						    <label  class="plantilla-label" for="archivo_1">Adjuntar un archivo</label>
						    <!--  <input type="hidden" name="MAX_FILE_SIZE" value="30000" /> -->
						    <input type="file" id="nameArchivo" name="nameArchivo" required>
						   <!--  <p class="help-block">Ejemplo de texto de ayuda.</p> -->
						  </div>
						</div>
						
						<div class="col">
							 <div class="form-group col-md-8 ">
									<label  class="plantilla-label" for="laQna">*QNA: </label>
										 
										<select class="rounded border border-dark" id="qnaOption" name="qnaOption" onchange="guardarQna();" required>
											<?php
											if (!$conexion->set_charset("utf8")) {//asignamos la codificación comprobando que no falle
											       die("Error cargando el conjunto de caracteres utf8");
											}

											$consulta = "SELECT * FROM ct_quincena";
											$resultado = mysqli_query($conexion , $consulta);
											$contador=0;

											while($misdatos = mysqli_fetch_assoc($resultado)){ $contador++;?>
											<option  data-subtext="<?php echo $misdatos["id_qna"]; ?>"><?php echo $misdatos["qna"]; ?></option>
											<?php }?>          
											</select>
							</div>
						</div>
					
						<div class="col">
							 <div class="form-group col-md-8 ">
									<label  class="plantilla-label" for="laAnio">*AÑO: </label>
										 
										<select class="rounded border border-dark" id="anioOption" name="anioOption" onchange="guardarAnio();" required>
											<?php
											if (!$conexion->set_charset("utf8")) {//asignamos la codificación comprobando que no falle
											       die("Error cargando el conjunto de caracteres utf8");
											}

											$consulta = "SELECT * FROM ct_anios";
											$resultado = mysqli_query($conexion , $consulta);
											$contador=0;

											while($anio = mysqli_fetch_assoc($resultado)){ $contador++;?>
											<option  data-subtext="<?php echo $anio["id_anio"]; ?>"><?php echo $anio["num_anio"]; ?></option>
											<?php }?>          
											</select>
							</div>
						</div>

						<div class="col">
							 <div class="form-group col-md-8 ">
									<label  class="plantilla-label" for="laUsuario">*ASIGNAR A: </label>
										 
										<select class="rounded border border-dark" id="usuarioOption" name="usuarioOption" onchange="guardarTurnado();">
											<?php
											if (!$conexion->set_charset("utf8")) {//asignamos la codificación comprobando que no falle
											       die("Error cargando el conjunto de caracteres utf8");
											}

											$consulta = "SELECT * FROM usuarios WHERE id_rol = 3 OR id_rol = 2 OR id_rol = 7 OR id_rol = 0 OR id_rol = 4";
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
						
						<div class="col">
							 <div class="form-group col-md-8 ">
									<input type="text" id="anioSeleccionado" name="anioSeleccionado" style="display: none;">

							</div>
						</div>
				</div>		
						<!-- 	<div class="columnaBoton">	
								 <input type="submit" name="guardarAdj" class="btn btn btn-danger tamanio-button plantilla-input text-white bord" value="Guardar"><br> 

							</div> -->
									<button id="enviarT" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
											 Enviar
											</button>
							  			<br>
							<!-- Modal -->
						<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
											  <div class="modal-dialog" role="document">
											    <div class="modal-content">
											      <div class="modal-header">
											        <h5 class="modal-title" id="exampleModalLabel">Confirmar</h5>
											        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
											          <span aria-hidden="true">&times;</span>
											        </button>
											      </div>
											      <div class="modal-body">
											        Estas seguro de enviar esta información con quincena:
											        <h3>	<output type="text" id="qnaSeleccionada" name="qnaSeleccionada"> </output> </h3>
											        <input type="text" id="qnaSeleccionada2" name="qnaSeleccionada2" style="display: none;">
											      </div>
													
											      <div class="modal-footer">

											        <button type="button" class="btn btn-secondary" data-dismiss="modal">Regresar</button>
							        				<input type="submit" name="guardarAdj" class="btn btn btn-danger tamanio-button plantilla-input text-white bord" value="Guardar">
											      </div>
											    </div>
											  </div>
											</div>
						</div>
					</div>
			</form>
			
		</div>
		<?php
						
		if(isset($_POST['guardarAdj'])){
			$from = '\\\\PWIDGRHOSISFO01\\Archivos2\\';
			$from2 = '\\\\PWIDGRHOSISFO01\\pdfs2\\';
			$to = './Controller/DOCUMENTOS_MOV_QR/FMP/';

			// $nombreCompletoArch = $nombreArch."_".$listaCompleta;
			// consultamos para saber el id y el nombre corto del nombre 
			$dir_subida = './Controller/txt/';
			$newQna = $_POST["qnaSeleccionada2"];
			$newTurnado = $_POST["usuarioOption"];
			$colorFomopeQr="amarillo0";
			// Arreglo con todos los nombres de los archivos
			$files = array_diff(scandir($dir_subida), array('.', '..')); 
			$conteoDupl = "";
			$conteoInsert = "";
			//ingresamos el color al fomope_qr
				$sql_id_rol =  "SELECT id_rol FROM usuarios WHERE usuario = '$newTurnado'";
				$resColor = mysqli_query($conexion,$sql_id_rol);
				$id_rol_res = mysqli_fetch_row($resColor);

			//guardamos el archivo que se selecciono en la carpeta 
			$nombreAr =  basename($_FILES['nameArchivo']['name']);
			$fichero_subido = $dir_subida . basename($_FILES['nameArchivo']['name']);
			$extencion2 = explode(".",$fichero_subido);
			$tamnio = count($extencion2);
			$extencion3 = $extencion2[$tamnio-1]; //el ".pdf"
			if (move_uploaded_file($_FILES['nameArchivo']['tmp_name'], $fichero_subido)) {
				sleep(3);								
			//los mandamos a la funcion para que al volver a cargar la pagina no se pierdan los datos de ese input
			} else{
				echo "<script> alert('Existe un error al guardar el archivo'); ";
			}
			// $arrayDoc = explode("_", $enviarDoc) ;
			//actualizamos la base para poder tener el registro de los documentos
			include "./configuracion.php";
			$usuarioSeguir = $_GET['usuario_rol'];
			$hoy = "select CURDATE()";
			$tiempo ="select curTime()";
			if ($resultHoy = mysqli_query($conexion,$hoy) AND $resultTime = mysqli_query($conexion,$tiempo)) {
				$row = mysqli_fetch_row($resultHoy);
				$fecha = str_replace ( "-", '',$row[0] ); 
				$row2 = mysqli_fetch_row($resultTime);
				$elanio = explode("-",$row[0]);
			}
			// Abrir el archivo en modo de sólo lectura:
			$archivo = fopen($fichero_subido,"rb");
			if( $archivo == false ) {
			    echo "Error al abrir el archivo";
			}else{
			    $cadena2 = fread($archivo, filesize($fichero_subido));  // Leemos hasta el final del archivo
			    if( ($cadena2 == false)){
			        echo "Error al leer el archivo";
			    }else{
			        // echo "<p>\$contenido2 es: [".$cadena2."]</p>";
			    }
			}
			// Cerrar el archivo:
			fclose($archivo);
			$qrTexto2 = explode("\n", $cadena2);
			//aqui va el for para separar el qr dependiendo los registros que vengan en el archivo
			// echo "el espacio: ".$qrTexto2[0]."finn";
			$tamqr = sizeof($qrTexto2);
			$contDuplicados = 0;
			$contNormales = 0;
			$contReg = 0;
			for($i = 0; $i < $tamqr-1; $i++){
				
				$qrTexto = explode("|", $qrTexto2[$i]);
				$movQrMAYUS = strtoupper($qrTexto2[$i]); // hacemos mayusculas todo el mov
				if(count($qrTexto) < 3){  // son los espacios que hay en el txt , renglones sin informacion, enters
					continue;
				}
				$qrTexto[2] = strtoupper($qrTexto[2]); // hacemos mayusculas el LOTE
				$llave = substr($qrTexto[0], 0, 5);
				$tipoRegistro = '';
				///ingresaar empleado ct_empleados
				$apeP = explode(",", $qrTexto[4]);
				$apeM = explode("/", $apeP[1]);
				$nombreCom = $apeM[1];
				$elRfc = $qrTexto[3];
				$anio = $_POST["anioSeleccionado"];//substr($qrTexto[35], 0, 4);
				$querySelect2 = "SELECT curp, qna, anio, rfc, analistaAsignada, unidad FROM conteo_qr WHERE rfc = '$qrTexto[3]' ORDER BY id_cont DESC";
							if($resultQry2 = mysqli_query($conexion, $querySelect2)){
								$rowQry2 = mysqli_fetch_row($resultQry2);
								// echo "<script> alert('$rowQry'); </script>";
								if($rowQry2[0] == $qrTexto[7] && $rowQry2[1] == $newQna && $rowQry2[5] == $qrTexto[20]){
									// echo "<script>alert('Ya existe registro con estos datos, verificar.'); </script>";
									$conteoDupl = $conteoDupl. $rowQry2[0] . "," ;
									$contDuplicados++;
								}else {
									$sql = "INSERT INTO conteo_qr (curp, fecha, hora, usuarioAgrego, qna, anio, rfc, analistaAsignada, unidad, apellido_p, apellido_m, nombre) VALUES ('$qrTexto[7]', '$row[0]', '$row2[0]', '$usuarioSeguir', '$newQna', '$elanio[0]', '$qrTexto[3]', '$newTurnado', '$qrTexto[20]', '$apeP[0]', '$apeM[0]', '$nombreCom')";
									if(mysqli_query($conexion,$sql)){
										// echo "<script>alert('Se inserto un MOV.'); </script>";
										$contNormales++;
										if(file_exists($from2.$qrTexto[3].".pdf")){
											copy($from2.$qrTexto[3].".pdf", $to.$qrTexto[7]."_FMP_".$newQna."_".$fecha.".PDF");
											$conteoInsert = $conteoInsert. $qrTexto[3] . "," ;
										}										
										showFiles($from,$qrTexto[7],$fecha,$newQna); //enviamos la direccion y el curp

									}else{
										echo "<script>alert('ERROR AL INSERT MOV.'); </script>";
									}
								}
							}
			
			}
			echo "<script>alert('Los registros se hicieron correctamente; $conteoInsert registros:  $contNormales, registros duplicados: $contDuplicados, registros previamente registrados: $conteoDupl') ;</script>";
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
		if(file_exists($from.$rowCarpDocs[2]."\\".$curp."_".$rowCarpDocs[2].".PDF")){
			copy($from.$rowCarpDocs[2]."\\".$curp."_".$rowCarpDocs[2].".PDF", $to.$rowCarpDocs[2]."/".$curp."_".$rowCarpDocs[2]."_".$laQna."_".$generarID.".PDF");
			// echo "doccsssssssss::::  ".$rowCarpDocs[2];
		}
	}

}
?>
	</div>
		<br>
	
	</center>
			
<script src="js/bootstrap.min.js"></script>
   	<script src="js/main.js"></script>
			
	</body>

</html>