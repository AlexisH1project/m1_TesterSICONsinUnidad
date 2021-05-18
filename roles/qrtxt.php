
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
			
				<h3>Sistema para guardar archivos .txt generados en la aplicación QR</h3>
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
							$arrayView = explode("_", $listaMostrar);
												 $tamanio = count($arrayView);
												if($tamanio > 1 ){
												echo '
													<div class="form-group col-md-12 estilo-colorn" >	
					  									<label for="existe">Existen Documentos adjuntos. </label>
													</div>

												';	
												}
		if(isset($_POST['guardarAdj'])){
			$nombreCompletoArch = $nombreArch."_".$listaCompleta;
			// consultamos para saber el id y el nombre corto del nombre 
			$dir_subida = './Controller/txt/';
			$newQna = $_POST["qnaSeleccionada2"];
			$newTurnado = $_POST["usuarioOption"];
			$colorFomopeQr="amarillo0";
			// Arreglo con todos los nombres de los archivos
			$files = array_diff(scandir($dir_subida), array('.', '..')); 
											
			foreach($files as $file){
				// Divides en dos el nombre de tu archivo utilizando el . 
				$data = explode("_",$file);
				$data2 = explode(".",$file);
				$indice = count($data2);	
				$extencion = $data2[$indice-1];
				// Nombre del archivo
				$extractRfc = $data[0];
				$nameAdj = $data[1];
				// Extensión del archivo 
				}
			//ingresamos el color al fomope_qr
				$sql_id_rol =  "SELECT id_rol FROM usuarios WHERE usuario = '$newTurnado'";
				$resColor = mysqli_query($conexion,$sql_id_rol);
				$id_rol_res = mysqli_fetch_row($resColor);

				if($id_rol_res[0] == "" OR $id_rol_res[0] == 0){
					$colorFomopeQr="amarillo0";
				}else if($id_rol_res[0] == 2 OR $id_rol_res[0] == 7){
                    $colorFomopeQr="cafe";
				}else if($id_rol_res[0] == 3 ){
                    $colorFomopeQr="amarillo";
				}else if($id_rol_res[0] == 4){
                    $colorFomopeQr="azul";
				}
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
			$arrayDoc = explode("_", $enviarDoc) ;
			//actualizamos la base para poder tener el registro de los documentos
			include "./configuracion.php";
			$usuarioSeguir = $_GET['usuario_rol'];
			$hoy = "select CURDATE()";
			// Abrir el archivo en modo de sólo lectura:
			$archivo = fopen($fichero_subido,"rb");
			if( $archivo == false ) {
			    echo "Error al abrir el archivo";
			}else{
			    $cadena2 = fread($archivo, filesize($fichero_subido));  // Leemos hasta el final del archivo
			    if( ($cadena2 == false)){
			        echo "Error al leer el archivo";
			    }else{
			        echo "<p>\$contenido2 es: [".$cadena2."]</p>";
			    }
			}
			// Cerrar el archivo:
			fclose($archivo);
			$qrTexto2 = explode("\n", $cadena2);
			//aqui va el for para separar el qr dependiendo los registros que vengan en el archivo
			echo "el espacio: ".$qrTexto2[0]."finn";
			$tamqr = sizeof($qrTexto2);
			$contDuplicados = 0;
			$contNormales = 0;
			$contReg = 0;
			for($i = 0; $i < $tamqr-1; $i++){
				
				$qrTexto = explode("|", $qrTexto2[$i]);
				if(count($qrTexto) < 3){  // son los espacios que hay en el txt , renglones sin informacion, enters
					continue;
				}
				$llave = substr($qrTexto[0], 0, 5);
				$tipoRegistro = '';
				///ingresaar empleado ct_empleados
				$sqlEmpleado = "SELECT rfc, curp FROM ct_empleados WHERE rfc = '$qrTexto[3]'";
				$rfcEmp = mysqli_query($conexion,$sqlEmpleado);
				$rfcArr = mysqli_fetch_row($rfcEmp);
				$rfc = $rfcArr[0];
				$apeP = explode(",", $qrTexto[4]);
				$apeM = explode("/", $apeP[1]);
				$nombreCom = $apeM[1];
				if($rfc != $qrTexto[3]){ //si es igual quiere decir que existe un empleado con los mismos datos ... no se registra
					$sqlAgregarEmpl = "INSERT INTO ct_empleados (rfc, curp, apellido_1, apellido_2, nombre) VALUES ('$qrTexto[3]','$qrTexto[7]','$apeP[0]','$apeM[0]','$nombreCom')";
					if ($resUpdateEmpl = mysqli_query($conexion, $sqlAgregarEmpl)){
						//echo "<script>alert(' Se registro el empleado: El registro $rfc, $qrTexto[3],$qrTexto[7],$apeP[0],$apeM[0],$nombreCom: se mandó a rechazos') ;</script>";
					}else{
							//echo "<script>alert(' Error: El registro $qrTexto[3],$qrTexto[7],$apeP[0],$apeM[0],$nombreCom: se mandó a rechazos') ;</script>";
					}
				}else{
				}
				$anio = $_POST["anioSeleccionado"];//substr($qrTexto[35], 0, 4);
				if ($resultHoy = mysqli_query($conexion,$hoy)) {
				$rowHoy = mysqli_fetch_row($resultHoy);
				}
				$sqlComparar =  "SELECT tex_con, COUNT(tex_con) FROM fomope_qr WHERE tex_con = '$qrTexto2[$i]'";
				$resBus = mysqli_query($conexion,$sqlComparar);
				$text_con = mysqli_fetch_row($resBus);
				$textoC = $text_con[0];
				$cantidad = $text_con[1];
				if($textoC == $qrTexto2[$i] && $cantidad >= 2){
					$contReg = $contReg + 1;
					unset($qrTexto);
				}elseif($textoC == $qrTexto2[$i]){
					$estatus = "Rechazado duplicado";
					$contDuplicados = $contDuplicados + 1;
						 	
				}elseif($textoC != $qrTexto2[$i]){
					$contNormales = $contNormales + 1;
					$estatus = "Revisión";
				}
// **********************detectamos con empty() si la cadena es vacia "false " si no NO guardamos nada en el switch 
				if(empty($llave)){
					$llave = "0" ;// renglos con salto de linea
				}
					switch ($llave) {
							case '4008':
								if($qrTexto[22] == "M04001" || $qrTexto[22] == "M04002" || $qrTexto[22] == "M04003" || $qrTexto[22] == "M04004" || $qrTexto[22] == "M04005" || $qrTexto[22] == "M04011"){
									$tipoRegistro = 'MÉDICOS RESIDENTES';
									$sqlAgregar = "INSERT INTO fomope_qr (estatus, tipoRegistro,qna, llave, tipo_movimiento, lote, rfc,apellido_p, apellido_m,nombre, estado_civil, sar, curp, num_acta_banco, clabe, tipo, banco, calle, num_exterior, num_interior, colonia, codigo_post, estado_municipio, cr, ap, unidad, partida, codigo_puesto, edo_ai, gf, funcion, subfuncion, num_puesto, Tipo_trabajo, fing_gf, fing_ssa, num_horas, rango, quin, fini, fter, con_36, genero, entidad_nac, tex_con, anio, usuario_modifico, fechaAutorizacion, personaAsignada, color_estado) VALUES ('$estatus','$tipoRegistro' ,'$newQna','$qrTexto[0]','$qrTexto[1]','$qrTexto[2]','$qrTexto[3]','$apeP[0]','$apeM[0]','$nombreCom','$qrTexto[5]','$qrTexto[6]','$qrTexto[7]','$qrTexto[8]','$qrTexto[9]', '$qrTexto[10]','$qrTexto[11]','$qrTexto[12]','$qrTexto[13]','$qrTexto[14]','$qrTexto[15]','$qrTexto[16]','$qrTexto[17]','$qrTexto[18]','$qrTexto[19]','$qrTexto[20]', '$qrTexto[21]','$qrTexto[22]','$qrTexto[23]','$qrTexto[24]','$qrTexto[25]','$qrTexto[26]','$qrTexto[27]','$qrTexto[28]','$qrTexto[29]', '$qrTexto[30]','$qrTexto[31]','$qrTexto[32]','$qrTexto[33]','$qrTexto[34]','$qrTexto[35]','$qrTexto[36]','$qrTexto[37]','$qrTexto[38]','$qrTexto2[$i]', '$anio', '$usuarioSeguir', '$rowF[0]', '$newTurnado', '$colorFomopeQr')";
								}else{
									$tipoRegistro = 'CARAVANAS';
									$sqlAgregar = "INSERT INTO fomope_qr (estatus, tipoRegistro,qna, llave, tipo_movimiento, lote, rfc,apellido_p, apellido_m,nombre, estado_civil, sar, curp, num_acta_banco, clabe, tipo, banco, calle, num_exterior, num_interior, colonia, codigo_post, estado_municipio, cr, ap, unidad, partida, codigo_puesto, edo_ai, gf, funcion, subfuncion, num_puesto, Tipo_trabajo, fing_gf, fing_ssa, num_horas, rango, quin, fini, fter, con_36, genero, entidad_nac, tex_con, anio, usuario_modifico, fechaAutorizacion, personaAsignada, color_estado) VALUES ('$estatus','$tipoRegistro' ,'$newQna','$qrTexto[0]','$qrTexto[1]','$qrTexto[2]','$qrTexto[3]','$apeP[0]','$apeM[0]','$nombreCom','$qrTexto[5]','$qrTexto[6]','$qrTexto[7]','$qrTexto[8]','$qrTexto[9]', '$qrTexto[10]','$qrTexto[11]','$qrTexto[12]','$qrTexto[13]','$qrTexto[14]','$qrTexto[15]','$qrTexto[16]','$qrTexto[17]','$qrTexto[18]','$qrTexto[19]','$qrTexto[20]', '$qrTexto[21]','$qrTexto[22]','$qrTexto[23]','$qrTexto[24]','$qrTexto[25]','$qrTexto[26]','$qrTexto[27]','$qrTexto[28]','$qrTexto[29]', '$qrTexto[30]','$qrTexto[31]','$qrTexto[32]','$qrTexto[33]','$qrTexto[34]','$qrTexto[35]','$qrTexto[36]','$qrTexto[37]','$qrTexto[38]','$qrTexto2[$i]', '$anio', '$usuarioSeguir', '$rowF[0]', '$newTurnado', '$colorFomopeQr')";
								}
							break;
							case '4508':
								if($qrTexto[22] == "M04001" || $qrTexto[22] == "M04002" || $qrTexto[22] == "M04003" || $qrTexto[22] == "M04004" || $qrTexto[22] == "M04005" || $qrTexto[22] == "M04011"){
									$tipoRegistro = 'MÉDICOS RESIDENTES';
									$sqlAgregar = "INSERT INTO fomope_qr (estatus, tipoRegistro,qna, llave, tipo_movimiento, lote, rfc,apellido_p, apellido_m,nombre, estado_civil, sar, curp, num_acta_banco, clabe, tipo, banco, calle, num_exterior, num_interior, colonia, codigo_post, estado_municipio, cr, ap, unidad, partida, codigo_puesto, edo_ai, gf, funcion, subfuncion, num_puesto, Tipo_trabajo, fing_gf, fing_ssa, num_horas, rango, quin, fini, fter, con_36, genero, entidad_nac, tex_con, anio, usuario_modifico, fechaAutorizacion, personaAsignada, color_estado) VALUES ('$estatus','$tipoRegistro' ,'$newQna','$qrTexto[0]','$qrTexto[1]','$qrTexto[2]','$qrTexto[3]','$apeP[0]','$apeM[0]','$nombreCom','$qrTexto[5]','$qrTexto[6]','$qrTexto[7]','$qrTexto[8]','$qrTexto[9]', '$qrTexto[10]','$qrTexto[11]','$qrTexto[12]','$qrTexto[13]','$qrTexto[14]','$qrTexto[15]','$qrTexto[16]','$qrTexto[17]','$qrTexto[18]','$qrTexto[19]','$qrTexto[20]', '$qrTexto[21]','$qrTexto[22]','$qrTexto[23]','$qrTexto[24]','$qrTexto[25]','$qrTexto[26]','$qrTexto[27]','$qrTexto[28]','$qrTexto[29]', '$qrTexto[30]','$qrTexto[31]','$qrTexto[32]','$qrTexto[33]','$qrTexto[34]','$qrTexto[35]','$qrTexto[36]','$qrTexto[37]','$qrTexto[38]','$qrTexto2[$i]', '$anio', '$usuarioSeguir', '$rowF[0]', '$newTurnado', '$colorFomopeQr')";
								}else{
									$tipoRegistro = 'CARAVANAS';
									$sqlAgregar = "INSERT INTO fomope_qr (estatus, tipoRegistro,qna, llave, tipo_movimiento, lote, rfc,apellido_p, apellido_m,nombre, estado_civil, sar, curp, num_acta_banco, clabe, tipo, banco, calle, num_exterior, num_interior, colonia, codigo_post, estado_municipio, cr, ap, unidad, partida, codigo_puesto, edo_ai, gf, funcion, subfuncion, num_puesto, Tipo_trabajo, fing_gf, fing_ssa, num_horas, rango, quin, fini, fter, con_36, genero, entidad_nac, tex_con, anio, usuario_modifico, fechaAutorizacion, personaAsignada, color_estado) VALUES ('$estatus','$tipoRegistro' ,'$newQna','$qrTexto[0]','$qrTexto[1]','$qrTexto[2]','$qrTexto[3]','$apeP[0]','$apeM[0]','$nombreCom','$qrTexto[5]','$qrTexto[6]','$qrTexto[7]','$qrTexto[8]','$qrTexto[9]', '$qrTexto[10]','$qrTexto[11]','$qrTexto[12]','$qrTexto[13]','$qrTexto[14]','$qrTexto[15]','$qrTexto[16]','$qrTexto[17]','$qrTexto[18]','$qrTexto[19]','$qrTexto[20]', '$qrTexto[21]','$qrTexto[22]','$qrTexto[23]','$qrTexto[24]','$qrTexto[25]','$qrTexto[26]','$qrTexto[27]','$qrTexto[28]','$qrTexto[29]', '$qrTexto[30]','$qrTexto[31]','$qrTexto[32]','$qrTexto[33]','$qrTexto[34]','$qrTexto[35]','$qrTexto[36]','$qrTexto[37]','$qrTexto[38]','$qrTexto2[$i]', '$anio', '$usuarioSeguir', '$rowF[0]', '$newTurnado', '$colorFomopeQr')";
								}
							break;
							case '4005':
								if(count($qrTexto) == 38 AND $qrTexto[28] == "0001"){
									$tipoRegistro = 'PERSONAL DE CONFIANZA (REINGRESO)';	
									$sqlAgregar = "INSERT INTO fomope_qr (estatus, tipoRegistro,qna, llave, tipo_movimiento, lote, rfc,apellido_p, apellido_m,nombre, estado_civil, sar, curp, num_acta_banco, clabe, tipo, banco, calle, num_exterior, num_interior, colonia, codigo_post, estado_municipio, cr, ap, unidad, partida, codigo_puesto, edo_ai, gf, funcion, subfuncion, num_puesto, Tipo_trabajo, fing_gf, fing_ssa, num_horas, rango, quin, fini, fter, con_36, genero, entidad_nac, tex_con, anio, usuario_modifico, fechaAutorizacion, personaAsignada, color_estado) VALUES ('$estatus', '$tipoRegistro' ,'$newQna','$qrTexto[0]','$qrTexto[1]','$qrTexto[2]','$qrTexto[3]','$apeP[0]','$apeM[0]','$nombreCom','$qrTexto[5]','$qrTexto[6]','$qrTexto[7]','$qrTexto[8]','$qrTexto[9]', '$qrTexto[10]','$qrTexto[11]','$qrTexto[12]','$qrTexto[13]','$qrTexto[14]','$qrTexto[15]','$qrTexto[16]','$qrTexto[17]','$qrTexto[18]','$qrTexto[19]','$qrTexto[20]', '$qrTexto[21]','$qrTexto[22]','$qrTexto[23]','$qrTexto[24]','$qrTexto[25]','$qrTexto[26]','$qrTexto[27]','$qrTexto[28]','$qrTexto[29]', '$qrTexto[30]','$qrTexto[31]','$qrTexto[32]','$qrTexto[33]','$qrTexto[34]','$qrTexto[35]','$qrTexto[36]','','','$qrTexto2[$i]', '$anio', '$usuarioSeguir', '$rowF[0]', '$newTurnado', '$colorFomopeQr')";	

								}else if(count($qrTexto) == 40 AND $qrTexto[28] == "0001"){
									$tipoRegistro = 'PERSONAL DE CONFIANZA (ALTA)';	
									$sqlAgregar = "INSERT INTO fomope_qr (estatus, tipoRegistro,qna, llave, tipo_movimiento, lote, rfc,apellido_p, apellido_m,nombre, estado_civil, sar, curp, num_acta_banco, clabe, tipo, banco, calle, num_exterior, num_interior, colonia, codigo_post, estado_municipio, cr, ap, unidad, partida, codigo_puesto, edo_ai, gf, funcion, subfuncion, num_puesto, Tipo_trabajo, fing_gf, fing_ssa, num_horas, rango, quin, fini, fter, con_36, genero, entidad_nac, tex_con, anio, usuario_modifico, fechaAutorizacion, personaAsignada, color_estado) VALUES ('$estatus','$tipoRegistro' ,'$newQna','$qrTexto[0]','$qrTexto[1]','$qrTexto[2]','$qrTexto[3]','$apeP[0]','$apeM[0]','$nombreCom','$qrTexto[5]','$qrTexto[6]','$qrTexto[7]','$qrTexto[8]','$qrTexto[9]', '$qrTexto[10]','$qrTexto[11]','$qrTexto[12]','$qrTexto[13]','$qrTexto[14]','$qrTexto[15]','$qrTexto[16]','$qrTexto[17]','$qrTexto[18]','$qrTexto[19]','$qrTexto[20]', '$qrTexto[21]','$qrTexto[22]','$qrTexto[23]','$qrTexto[24]','$qrTexto[25]','$qrTexto[26]','$qrTexto[27]','$qrTexto[28]','$qrTexto[29]', '$qrTexto[30]','$qrTexto[31]','$qrTexto[32]','$qrTexto[33]','$qrTexto[34]','$qrTexto[35]','$qrTexto[36]','$qrTexto[37]','$qrTexto[38]','$qrTexto2[$i]', '$anio', '$usuarioSeguir', '$rowF[0]', '$newTurnado', '$colorFomopeQr')";					 		

								}else{	
									$tipoRegistro = 'EVENTUALES';	
									$sqlAgregar = "INSERT INTO fomope_qr (estatus, tipoRegistro,qna, llave, tipo_movimiento, lote, rfc,apellido_p, apellido_m,nombre, estado_civil, sar, curp, num_acta_banco, clabe, tipo, banco, calle, num_exterior, num_interior, colonia, codigo_post, estado_municipio, cr, ap, unidad, partida, codigo_puesto, edo_ai, gf, funcion, subfuncion, num_puesto, Tipo_trabajo, fing_gf, fing_ssa, num_horas, rango, quin, fini, fter, con_36, genero, entidad_nac, tex_con, anio, usuario_modifico, fechaAutorizacion, personaAsignada, color_estado, enNomina) VALUES ('$estatus', '$tipoRegistro' ,'$newQna','$qrTexto[0]','$qrTexto[1]','$qrTexto[2]','$qrTexto[3]','$apeP[0]','$apeM[0]','$nombreCom','$qrTexto[5]','$qrTexto[6]','$qrTexto[7]','$qrTexto[8]','$qrTexto[9]', '$qrTexto[10]','$qrTexto[11]','$qrTexto[12]','$qrTexto[13]','$qrTexto[14]','$qrTexto[15]','$qrTexto[16]','$qrTexto[17]','$qrTexto[18]','$qrTexto[19]','$qrTexto[20]', '$qrTexto[21]','$qrTexto[22]','$qrTexto[23]','$qrTexto[24]','$qrTexto[25]','$qrTexto[26]','$qrTexto[27]','$qrTexto[28]','$qrTexto[29]', '$qrTexto[30]','$qrTexto[31]','$qrTexto[32]','$qrTexto[33]','$qrTexto[34]','$qrTexto[35]','$qrTexto[36]','','','$qrTexto2[$i]', '$anio', '$usuarioSeguir', '$rowF[0]', '$newTurnado', '$colorFomopeQr', '0')";	
								}
							break;
							case '4505':
							case '5011':
								$tipoRegistro = 'EVENTUALES';
								$sqlAgregar = "INSERT INTO fomope_qr (estatus, tipoRegistro,qna, llave, tipo_movimiento, lote, rfc,apellido_p, apellido_m,nombre, estado_civil, sar, curp, num_acta_banco, clabe, tipo, banco, calle, num_exterior, num_interior, colonia, codigo_post, estado_municipio, cr, ap, unidad, partida, codigo_puesto, edo_ai, gf, funcion, subfuncion, num_puesto, Tipo_trabajo, fing_gf, fing_ssa, num_horas, rango, quin, fini, fter, con_36, genero, entidad_nac, tex_con, anio, usuario_modifico, fechaAutorizacion, personaAsignada, color_estado, enNomina) VALUES ('$estatus', '$tipoRegistro' ,'$newQna','$qrTexto[0]','$qrTexto[1]','$qrTexto[2]','$qrTexto[3]','$apeP[0]','$apeM[0]','$nombreCom','$qrTexto[5]','$qrTexto[6]','$qrTexto[7]','$qrTexto[8]','$qrTexto[9]', '$qrTexto[10]','$qrTexto[11]','$qrTexto[12]','$qrTexto[13]','$qrTexto[14]','$qrTexto[15]','$qrTexto[16]','$qrTexto[17]','$qrTexto[18]','$qrTexto[19]','$qrTexto[20]', '$qrTexto[21]','$qrTexto[22]','$qrTexto[23]','$qrTexto[24]','$qrTexto[25]','$qrTexto[26]','$qrTexto[27]','$qrTexto[28]','$qrTexto[29]', '$qrTexto[30]','$qrTexto[31]','$qrTexto[32]','$qrTexto[33]','$qrTexto[34]','$qrTexto[35]','$qrTexto[36]','','','$qrTexto2[$i]', '$anio', '$usuarioSeguir', '$rowF[0]', '$newTurnado', '$colorFomopeQr', '0')";					 		
							break;
							case '4002':
							case '5009':
							case '4302':
								if(count($qrTexto) == 38){
									$tipoRegistro = 'PERSONAL DE CONFIANZA (REINGRESO)';	
									$sqlAgregar = "INSERT INTO fomope_qr (estatus, tipoRegistro,qna, llave, tipo_movimiento, lote, rfc,apellido_p, apellido_m,nombre, estado_civil, sar, curp, num_acta_banco, clabe, tipo, banco, calle, num_exterior, num_interior, colonia, codigo_post, estado_municipio, cr, ap, unidad, partida, codigo_puesto, edo_ai, gf, funcion, subfuncion, num_puesto, Tipo_trabajo, fing_gf, fing_ssa, num_horas, rango, quin, fini, fter, con_36, genero, entidad_nac, tex_con, anio, usuario_modifico, fechaAutorizacion, personaAsignada, color_estado, enNomina) VALUES ('$estatus', '$tipoRegistro' ,'$newQna','$qrTexto[0]','$qrTexto[1]','$qrTexto[2]','$qrTexto[3]','$apeP[0]','$apeM[0]','$nombreCom','$qrTexto[5]','$qrTexto[6]','$qrTexto[7]','$qrTexto[8]','$qrTexto[9]', '$qrTexto[10]','$qrTexto[11]','$qrTexto[12]','$qrTexto[13]','$qrTexto[14]','$qrTexto[15]','$qrTexto[16]','$qrTexto[17]','$qrTexto[18]','$qrTexto[19]','$qrTexto[20]', '$qrTexto[21]','$qrTexto[22]','$qrTexto[23]','$qrTexto[24]','$qrTexto[25]','$qrTexto[26]','$qrTexto[27]','$qrTexto[28]','$qrTexto[29]', '$qrTexto[30]','$qrTexto[31]','$qrTexto[32]','$qrTexto[33]','$qrTexto[34]','$qrTexto[35]','$qrTexto[36]','','','$qrTexto2[$i]', '$anio', '$usuarioSeguir', '$rowF[0]', '$newTurnado', '$colorFomopeQr', '0')";	

								}else if(count($qrTexto) == 40){
									$tipoRegistro = 'PERSONAL DE CONFIANZA (ALTA)';	
									$sqlAgregar = "INSERT INTO fomope_qr (estatus, tipoRegistro,qna, llave, tipo_movimiento, lote, rfc,apellido_p, apellido_m,nombre, estado_civil, sar, curp, num_acta_banco, clabe, tipo, banco, calle, num_exterior, num_interior, colonia, codigo_post, estado_municipio, cr, ap, unidad, partida, codigo_puesto, edo_ai, gf, funcion, subfuncion, num_puesto, Tipo_trabajo, fing_gf, fing_ssa, num_horas, rango, quin, fini, fter, con_36, genero, entidad_nac, tex_con, anio, usuario_modifico, fechaAutorizacion, personaAsignada, color_estado, enNomina) VALUES ('$estatus','$tipoRegistro' ,'$newQna','$qrTexto[0]','$qrTexto[1]','$qrTexto[2]','$qrTexto[3]','$apeP[0]','$apeM[0]','$nombreCom','$qrTexto[5]','$qrTexto[6]','$qrTexto[7]','$qrTexto[8]','$qrTexto[9]', '$qrTexto[10]','$qrTexto[11]','$qrTexto[12]','$qrTexto[13]','$qrTexto[14]','$qrTexto[15]','$qrTexto[16]','$qrTexto[17]','$qrTexto[18]','$qrTexto[19]','$qrTexto[20]', '$qrTexto[21]','$qrTexto[22]','$qrTexto[23]','$qrTexto[24]','$qrTexto[25]','$qrTexto[26]','$qrTexto[27]','$qrTexto[28]','$qrTexto[29]', '$qrTexto[30]','$qrTexto[31]','$qrTexto[32]','$qrTexto[33]','$qrTexto[34]','$qrTexto[35]','$qrTexto[36]','$qrTexto[37]','$qrTexto[38]','$qrTexto2[$i]', '$anio', '$usuarioSeguir', '$rowF[0]', '$newTurnado', '$colorFomopeQr', '0')";					 		

								}			 		
							break;
							case '0':
							break;
							default:
								$tipoRegistro = 'ESTRUCTURA';
								if(count($qrTexto) == 38){
									$sqlAgregar = "INSERT INTO fomope_qr (estatus, tipoRegistro,qna, llave, tipo_movimiento, lote, rfc,apellido_p, apellido_m,nombre, estado_civil, sar, curp, num_acta_banco, clabe, tipo, banco, calle, num_exterior, num_interior, colonia, codigo_post, estado_municipio, cr, ap, unidad, partida, codigo_puesto, edo_ai, gf, funcion, subfuncion, num_puesto, Tipo_trabajo, fing_gf, fing_ssa, num_horas, rango, quin, fini, fter, con_36, genero, entidad_nac, tex_con, anio, usuario_modifico, fechaAutorizacion, personaAsignada, color_estado, enNomina) VALUES ('$estatus', '$tipoRegistro' ,'$newQna','$qrTexto[0]','$qrTexto[1]','$qrTexto[2]','$qrTexto[3]','$apeP[0]','$apeM[0]','$nombreCom','$qrTexto[5]','$qrTexto[6]','$qrTexto[7]','$qrTexto[8]','$qrTexto[9]', '$qrTexto[10]','$qrTexto[11]','$qrTexto[12]','$qrTexto[13]','$qrTexto[14]','$qrTexto[15]','$qrTexto[16]','$qrTexto[17]','$qrTexto[18]','$qrTexto[19]','$qrTexto[20]', '$qrTexto[21]','$qrTexto[22]','$qrTexto[23]','$qrTexto[24]','$qrTexto[25]','$qrTexto[26]','$qrTexto[27]','$qrTexto[28]','$qrTexto[29]', '$qrTexto[30]','$qrTexto[31]','$qrTexto[32]','$qrTexto[33]','$qrTexto[34]','$qrTexto[35]','$qrTexto[36]','','','$qrTexto2[$i]', '$anio', '$usuarioSeguir', '$rowF[0]', '$newTurnado', '$colorFomopeQr','0')";	
								}else if(count($qrTexto) == 40){
									$sqlAgregar = "INSERT INTO fomope_qr (estatus, tipoRegistro,qna, llave, tipo_movimiento, lote, rfc,apellido_p, apellido_m,nombre, estado_civil, sar, curp, num_acta_banco, clabe, tipo, banco, calle, num_exterior, num_interior, colonia, codigo_post, estado_municipio, cr, ap, unidad, partida, codigo_puesto, edo_ai, gf, funcion, subfuncion, num_puesto, Tipo_trabajo, fing_gf, fing_ssa, num_horas, rango, quin, fini, fter, con_36, genero, entidad_nac, tex_con, anio, usuario_modifico, fechaAutorizacion, personaAsignada, color_estado, enNomina) VALUES ('$estatus','$tipoRegistro' ,'$newQna','$qrTexto[0]','$qrTexto[1]','$qrTexto[2]','$qrTexto[3]','$apeP[0]','$apeM[0]','$nombreCom','$qrTexto[5]','$qrTexto[6]','$qrTexto[7]','$qrTexto[8]','$qrTexto[9]', '$qrTexto[10]','$qrTexto[11]','$qrTexto[12]','$qrTexto[13]','$qrTexto[14]','$qrTexto[15]','$qrTexto[16]','$qrTexto[17]','$qrTexto[18]','$qrTexto[19]','$qrTexto[20]', '$qrTexto[21]','$qrTexto[22]','$qrTexto[23]','$qrTexto[24]','$qrTexto[25]','$qrTexto[26]','$qrTexto[27]','$qrTexto[28]','$qrTexto[29]', '$qrTexto[30]','$qrTexto[31]','$qrTexto[32]','$qrTexto[33]','$qrTexto[34]','$qrTexto[35]','$qrTexto[36]','$qrTexto[37]','$qrTexto[38]','$qrTexto2[$i]', '$anio', '$usuarioSeguir', '$rowF[0]', '$newTurnado', '$colorFomopeQr','0')";					 		
								}
							break;
					}
					unset($qrTexto);
					if ($resUpdate = mysqli_query($conexion, $sqlAgregar)){
						//echo "<script>alert('El registro $qrTexto[3] se agregó correctament') ;</script>";
					}else{
						//echo '<script type="text/javascript">alert("error '. mysqli_error($conexion).'");</script>';
					}
			}
	
				
		//if ($resUpdate = mysqli_query($conexion, $sqlAgregar)){
			echo "<script>alert('Los registros se hicieron correctamente; registros: $contNormales, registros duplicados: $contDuplicados, registros previamente registrados: $contReg') ;</script>";
		//}else{
			//echo '<script type="text/javascript">alert("error '. mysqli_error($conexion).'");</script>';
		//}
		//echo "<script>alert('Registros previamente registrados: $contReg') ;</script>";
	}
	?>	
	</div>
		<br>
	
	</center>
			
<script src="js/bootstrap.min.js"></script>
   	<script src="js/main.js"></script>
			
	</body>

</html>