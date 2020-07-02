
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

		</script>
	</head>
	<body>

	<?php 
		include "configuracion.php";
				$usuarioSeguir = $_GET['usuario_rol'];

			$sqlNombre = "SELECT nombrePersonal, id_rol FROM usuarios WHERE usuario = '$usuarioSeguir'";
			$result = mysqli_query($conexion,$sqlNombre);
			$nombreU = mysqli_fetch_row($result);
		 ?>
 <br>
 <br>
 <br>


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
				<h5>DDSCH</h5>

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
						    <input type="file" id="nameArchivo" name="nameArchivo" >
						   <!--  <p class="help-block">Ejemplo de texto de ayuda.</p> -->
						  </div>
						</div>
		
				</div>		
							<div class="columnaBoton">	
								 <input type="submit" name="guardarAdj" class="btn btn btn-danger tamanio-button plantilla-input text-white bord" value="Guardar"><br> 

							</div>
							
						</div>
					</div>

			</form>

			<form enctype="multipart/form-data" method="post" action="">
				<div class="form-group col-md-12">
						<div class="col text-center">
							<div class="columnaBoton">
								<input type="submit" class="btn btn-secondary" name="borrar" value="Borrar">
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
			    }
			    else
			    {
			   
			         $cadena2 = fread($archivo, filesize($fichero_subido));  // Leemos hasta el final del archivo
			        if( ($cadena2 == false)){
			            echo "Error al leer el archivo";
			        }
			        else
			        {
			            echo "<p>\$contenido2 es: [".$cadena2."]</p>";
			        }
			    }
			    // Cerrar el archivo:
			    fclose($archivo);
			    					
			    				$qrTexto2 = explode("\n", $cadena2);
			    				//aqui va el for para separar el qr dependiendo los registros que vengan en el archivo
			    				$tamqr = sizeof($qrTexto2);
									for($i = 0; $i < $tamqr; $i++){
	
										$qrTexto = explode("|", $qrTexto2[$i]);
										$llave = substr($qrTexto[0], 0, 4);
					    				$tipoRegistro = '';
										 if ($resultHoy = mysqli_query($conexion,$hoy)) {
										 		$rowHoy = mysqli_fetch_row($resultHoy);
										 }
												
											$sqlComparar =  "SELECT tex_con, rfc FROM fomope_qr WHERE tex_con = '$qrTexto2[$i]'";
										$resBus = mysqli_query($conexion,$sqlComparar);
										$text_con = mysqli_fetch_row($resBus);
										$textoC = $text_con[0];
										if($textoC == $qrTexto2[$i]){
												$estatus = "Rechazado duplicado";
											
														switch ($llave) {
														 	case '4008':
														 			$tipoRegistro = 'CARAVANAS'	;
														 			 $sqlAgregar = "INSERT INTO fomope_qr (estatus, tipoRegistro, llave, tipo_movimiento, lote, rfc, nombre, estado_civil, sar, curp, num_acta_banco, clabe, tipo, banco, calle, num_exterior, num_interior, colonia, codigo_post, estado_municipio, cr, ap, unidad, partida, codigo_puesto, edo_ai, gf, funcion, subfuncion, num_puesto, Tipo_trabajo, fing_gf, fing_ssa, num_horas, rango, quin, fini, fter, con_36, genero, entidad_nac, tex_con) VALUES ('$estatus','$tipoRegistro' ,'$qrTexto[0]','$qrTexto[1]','$qrTexto[2]','$qrTexto[3]','$qrTexto[4]','$qrTexto[5]','$qrTexto[6]','$qrTexto[7]','$qrTexto[8]','$qrTexto[9]', '$qrTexto[10]','$qrTexto[11]','$qrTexto[12]','$qrTexto[13]','$qrTexto[14]','$qrTexto[15]','$qrTexto[16]','$qrTexto[17]','$qrTexto[18]','$qrTexto[19]','$qrTexto[20]', '$qrTexto[21]','$qrTexto[22]','$qrTexto[23]','$qrTexto[24]','$qrTexto[25]','$qrTexto[26]','$qrTexto[27]','$qrTexto[28]','$qrTexto[29]', '$qrTexto[30]','$qrTexto[31]','$qrTexto[32]','$qrTexto[33]','$qrTexto[34]','$qrTexto[35]','$qrTexto[36]','$qrTexto[37]','$qrTexto[38]','$qrTexto2[$i]')";					 		
														 		break;
														 	case '4508':
														 			$tipoRegistro = 'CARAVANAS'	;
														 			 $sqlAgregar = "INSERT INTO fomope_qr (estatus, tipoRegistro, llave, tipo_movimiento, lote, rfc, nombre, estado_civil, sar, curp, num_acta_banco, clabe, tipo, banco, calle, num_exterior, num_interior, colonia, codigo_post, estado_municipio, cr, ap, unidad, partida, codigo_puesto, edo_ai, gf, funcion, subfuncion, num_puesto, Tipo_trabajo, fing_gf, fing_ssa, num_horas, rango, quin, fini, fter, con_36, genero, entidad_nac, tex_con) VALUES ('$estatus', '$tipoRegistro' ,'$qrTexto[0]','$qrTexto[1]','$qrTexto[2]','$qrTexto[3]','$qrTexto[4]','$qrTexto[5]','$qrTexto[6]','$qrTexto[7]','$qrTexto[8]','$qrTexto[9]', '$qrTexto[10]','$qrTexto[11]','$qrTexto[12]','$qrTexto[13]','$qrTexto[14]','$qrTexto[15]','$qrTexto[16]','$qrTexto[17]','$qrTexto[18]','$qrTexto[19]','$qrTexto[20]', '$qrTexto[21]','$qrTexto[22]','$qrTexto[23]','$qrTexto[24]','$qrTexto[25]','$qrTexto[26]','$qrTexto[27]','$qrTexto[28]','$qrTexto[29]', '$qrTexto[30]','$qrTexto[31]','$qrTexto[32]','$qrTexto[33]','$qrTexto[34]','$qrTexto[35]','$qrTexto[36]','','','$qrTexto2[$i]')";					 		
														 		break;
														 	case '4005':
														 			$tipoRegistro = 'EVENTUALES';	
														 			  $sqlAgregar = "INSERT INTO fomope_qr (estatus, tipoRegistro, llave, tipo_movimiento, lote, rfc, nombre, estado_civil, sar, curp, num_acta_banco, clabe, tipo, banco, calle, num_exterior, num_interior, colonia, codigo_post, estado_municipio, cr, ap, unidad, partida, codigo_puesto, edo_ai, gf, funcion, subfuncion, num_puesto, Tipo_trabajo, fing_gf, fing_ssa, num_horas, rango, quin, fini, fter, con_36, genero, entidad_nac, tex_con) VALUES ('$estatus','$tipoRegistro' ,'$qrTexto[0]','$qrTexto[1]','$qrTexto[2]','$qrTexto[3]','$qrTexto[4]','$qrTexto[5]','$qrTexto[6]','$qrTexto[7]','$qrTexto[8]','$qrTexto[9]', '$qrTexto[10]','$qrTexto[11]','$qrTexto[12]','$qrTexto[13]','$qrTexto[14]','$qrTexto[15]','$qrTexto[16]','$qrTexto[17]','$qrTexto[18]','$qrTexto[19]','$qrTexto[20]', '$qrTexto[21]','$qrTexto[22]','$qrTexto[23]','$qrTexto[24]','$qrTexto[25]','$qrTexto[26]','$qrTexto[27]','$qrTexto[28]','$qrTexto[29]', '$qrTexto[30]','$qrTexto[31]','$qrTexto[32]','$qrTexto[33]','$qrTexto[34]','$qrTexto[35]','$qrTexto[36]','$qrTexto[37]','$qrTexto[38]','$qrTexto2[$i]')";						 		
														 		break;
														 	case '4505':
														 			$tipoRegistro = 'EVENTUALES';
														 			 $sqlAgregar = "INSERT INTO fomope_qr (estatus, tipoRegistro, llave, tipo_movimiento, lote, rfc, nombre, estado_civil, sar, curp, num_acta_banco, clabe, tipo, banco, calle, num_exterior, num_interior, colonia, codigo_post, estado_municipio, cr, ap, unidad, partida, codigo_puesto, edo_ai, gf, funcion, subfuncion, num_puesto, Tipo_trabajo, fing_gf, fing_ssa, num_horas, rango, quin, fini, fter, con_36, genero, entidad_nac, tex_con) VALUES ('$estatus', '$tipoRegistro' ,'$qrTexto[0]','$qrTexto[1]','$qrTexto[2]','$qrTexto[3]','$qrTexto[4]','$qrTexto[5]','$qrTexto[6]','$qrTexto[7]','$qrTexto[8]','$qrTexto[9]', '$qrTexto[10]','$qrTexto[11]','$qrTexto[12]','$qrTexto[13]','$qrTexto[14]','$qrTexto[15]','$qrTexto[16]','$qrTexto[17]','$qrTexto[18]','$qrTexto[19]','$qrTexto[20]', '$qrTexto[21]','$qrTexto[22]','$qrTexto[23]','$qrTexto[24]','$qrTexto[25]','$qrTexto[26]','$qrTexto[27]','$qrTexto[28]','$qrTexto[29]', '$qrTexto[30]','$qrTexto[31]','$qrTexto[32]','$qrTexto[33]','$qrTexto[34]','$qrTexto[35]','$qrTexto[36]','','','$qrTexto2[$i]')";					 		
														 		break;

														 	default:
														 		
														 		break;
														 }
														 if ($resUpdate = mysqli_query($conexion, $sqlAgregar)){

													echo "<script>alert(' Duplicado: El registro $qrTexto[3] se mandó a rechazos') ;</script>";

												}else{
													echo '<script type="text/javascript">alert("error '. mysqli_error($conexion).'");</script>';
												
											 }
											 unset($qrTexto);
											 	}else{
											 		$estatus = "Revisión";
											 			 switch ($llave) {
														 	case '4008':
														 			$tipoRegistro = 'CARAVANAS'	;
														 			 $sqlAgregar = "INSERT INTO fomope_qr (estatus, tipoRegistro, llave, tipo_movimiento, lote, rfc, nombre, estado_civil, sar, curp, num_acta_banco, clabe, tipo, banco, calle, num_exterior, num_interior, colonia, codigo_post, estado_municipio, cr, ap, unidad, partida, codigo_puesto, edo_ai, gf, funcion, subfuncion, num_puesto, Tipo_trabajo, fing_gf, fing_ssa, num_horas, rango, quin, fini, fter, con_36, genero, entidad_nac, tex_con) VALUES ('$estatus','$tipoRegistro' ,'$qrTexto[0]','$qrTexto[1]','$qrTexto[2]','$qrTexto[3]','$qrTexto[4]','$qrTexto[5]','$qrTexto[6]','$qrTexto[7]','$qrTexto[8]','$qrTexto[9]', '$qrTexto[10]','$qrTexto[11]','$qrTexto[12]','$qrTexto[13]','$qrTexto[14]','$qrTexto[15]','$qrTexto[16]','$qrTexto[17]','$qrTexto[18]','$qrTexto[19]','$qrTexto[20]', '$qrTexto[21]','$qrTexto[22]','$qrTexto[23]','$qrTexto[24]','$qrTexto[25]','$qrTexto[26]','$qrTexto[27]','$qrTexto[28]','$qrTexto[29]', '$qrTexto[30]','$qrTexto[31]','$qrTexto[32]','$qrTexto[33]','$qrTexto[34]','$qrTexto[35]','$qrTexto[36]','$qrTexto[37]','$qrTexto[38]','$qrTexto2[$i]')";					 		
														 		break;
														 	case '4508':
														 			$tipoRegistro = 'CARAVANAS'	;
														 			 $sqlAgregar = "INSERT INTO fomope_qr (estatus, tipoRegistro, llave, tipo_movimiento, lote, rfc, nombre, estado_civil, sar, curp, num_acta_banco, clabe, tipo, banco, calle, num_exterior, num_interior, colonia, codigo_post, estado_municipio, cr, ap, unidad, partida, codigo_puesto, edo_ai, gf, funcion, subfuncion, num_puesto, Tipo_trabajo, fing_gf, fing_ssa, num_horas, rango, quin, fini, fter, con_36, genero, entidad_nac, tex_con) VALUES ('$estatus', '$tipoRegistro' ,'$qrTexto[0]','$qrTexto[1]','$qrTexto[2]','$qrTexto[3]','$qrTexto[4]','$qrTexto[5]','$qrTexto[6]','$qrTexto[7]','$qrTexto[8]','$qrTexto[9]', '$qrTexto[10]','$qrTexto[11]','$qrTexto[12]','$qrTexto[13]','$qrTexto[14]','$qrTexto[15]','$qrTexto[16]','$qrTexto[17]','$qrTexto[18]','$qrTexto[19]','$qrTexto[20]', '$qrTexto[21]','$qrTexto[22]','$qrTexto[23]','$qrTexto[24]','$qrTexto[25]','$qrTexto[26]','$qrTexto[27]','$qrTexto[28]','$qrTexto[29]', '$qrTexto[30]','$qrTexto[31]','$qrTexto[32]','$qrTexto[33]','$qrTexto[34]','$qrTexto[35]','$qrTexto[36]','','','$qrTexto2[$i]')";					 		
														 		break;
														 	case '4005':
														 			$tipoRegistro = 'EVENTUALES';	
														 			  $sqlAgregar = "INSERT INTO fomope_qr (estatus, tipoRegistro, llave, tipo_movimiento, lote, rfc, nombre, estado_civil, sar, curp, num_acta_banco, clabe, tipo, banco, calle, num_exterior, num_interior, colonia, codigo_post, estado_municipio, cr, ap, unidad, partida, codigo_puesto, edo_ai, gf, funcion, subfuncion, num_puesto, Tipo_trabajo, fing_gf, fing_ssa, num_horas, rango, quin, fini, fter, con_36, genero, entidad_nac, tex_con) VALUES ('$estatus','$tipoRegistro' ,'$qrTexto[0]','$qrTexto[1]','$qrTexto[2]','$qrTexto[3]','$qrTexto[4]','$qrTexto[5]','$qrTexto[6]','$qrTexto[7]','$qrTexto[8]','$qrTexto[9]', '$qrTexto[10]','$qrTexto[11]','$qrTexto[12]','$qrTexto[13]','$qrTexto[14]','$qrTexto[15]','$qrTexto[16]','$qrTexto[17]','$qrTexto[18]','$qrTexto[19]','$qrTexto[20]', '$qrTexto[21]','$qrTexto[22]','$qrTexto[23]','$qrTexto[24]','$qrTexto[25]','$qrTexto[26]','$qrTexto[27]','$qrTexto[28]','$qrTexto[29]', '$qrTexto[30]','$qrTexto[31]','$qrTexto[32]','$qrTexto[33]','$qrTexto[34]','$qrTexto[35]','$qrTexto[36]','$qrTexto[37]','$qrTexto[38]','$qrTexto2[$i]')";						 		
														 		break;
														 	case '4505':
														 			$tipoRegistro = 'EVENTUALES';
														 			 $sqlAgregar = "INSERT INTO fomope_qr (estatus, tipoRegistro, llave, tipo_movimiento, lote, rfc, nombre, estado_civil, sar, curp, num_acta_banco, clabe, tipo, banco, calle, num_exterior, num_interior, colonia, codigo_post, estado_municipio, cr, ap, unidad, partida, codigo_puesto, edo_ai, gf, funcion, subfuncion, num_puesto, Tipo_trabajo, fing_gf, fing_ssa, num_horas, rango, quin, fini, fter, con_36, genero, entidad_nac, tex_con) VALUES ('$estatus', '$tipoRegistro' ,'$qrTexto[0]','$qrTexto[1]','$qrTexto[2]','$qrTexto[3]','$qrTexto[4]','$qrTexto[5]','$qrTexto[6]','$qrTexto[7]','$qrTexto[8]','$qrTexto[9]', '$qrTexto[10]','$qrTexto[11]','$qrTexto[12]','$qrTexto[13]','$qrTexto[14]','$qrTexto[15]','$qrTexto[16]','$qrTexto[17]','$qrTexto[18]','$qrTexto[19]','$qrTexto[20]', '$qrTexto[21]','$qrTexto[22]','$qrTexto[23]','$qrTexto[24]','$qrTexto[25]','$qrTexto[26]','$qrTexto[27]','$qrTexto[28]','$qrTexto[29]', '$qrTexto[30]','$qrTexto[31]','$qrTexto[32]','$qrTexto[33]','$qrTexto[34]','$qrTexto[35]','$qrTexto[36]','','','$qrTexto2[$i]')";					 		
														 		break;

														 	default:
														 		
														 		break;
														 }
											 		

											 		/* $sqlAgregar = "INSERT INTO fomope_qr (tipoRegistro, llave, tipo_movimiento, lote, rfc, nombre, estado_civil, sar, curp, num_acta_banco, clabe, tipo, banco, calle, num_exterior, num_interior, colonia, codigo_post, estado_municipio, cr, ap, unidad, partida, codigo_puesto, edo_ai, gf, funcion, subfuncion, num_puesto, Tipo_trabajo, fing_gf, fing_ssa, num_horas, rango, quin, fini, fter, con_36, genero, entidad_nac, tex_con) VALUES ('$tipoRegistro' ,'$qrTexto[0]','$qrTexto[1]','$qrTexto[2]','$qrTexto[3]','$qrTexto[4]','$qrTexto[5]','$qrTexto[6]','$qrTexto[7]','$qrTexto[8]','$qrTexto[9]', '$qrTexto[10]','$qrTexto[11]','$qrTexto[12]','$qrTexto[13]','$qrTexto[14]','$qrTexto[15]','$qrTexto[16]','$qrTexto[17]','$qrTexto[18]','$qrTexto[19]','$qrTexto[20]', '$qrTexto[21]','$qrTexto[22]','$qrTexto[23]','$qrTexto[24]','$qrTexto[25]','$qrTexto[26]','$qrTexto[27]','$qrTexto[28]','$qrTexto[29]', '$qrTexto[30]','$qrTexto[31]','$qrTexto[32]','$qrTexto[33]','$qrTexto[34]','$qrTexto[35]','$qrTexto[36]','$qrTexto[37]','$qrTexto[38]','$cadena2')";*/

											 	if ($resUpdate = mysqli_query($conexion, $sqlAgregar)){

													echo "<script>alert('El registro $qrTexto[3] se agregó correctament') ;</script>";

												}else{
													echo '<script type="text/javascript">alert("error '. mysqli_error($conexion).'");</script>';
												}
											 }


										//borrando el array para poder ingresar los datos del siguiente registro

										unset($qrTexto);
											
								
			    				
			    				
								//Consultar la bd y comparar cadena 
								//Si ya existe el registro aqui vamos a corroborar para saber si lo metemos o no a la bd.
								 
									
									}
								}

									
								 //Si no existe se inserta 
						

					if(isset($_POST['borrar'])){
						$usuarioSeguir = $_GET['usuario_rol'];
							//session_destroy();
		   	  				echo "<script type='text/javascript'>javascript:window.location='./qrtxt.php?usuario_rol=$usuarioSeguir'</script>";  

					}


						?>	

	</div>
		<br>
			
	</center>

			
<script src="js/bootstrap.min.js"></script>
   	<script src="js/main.js"></script>
			
	</body>

</html>
