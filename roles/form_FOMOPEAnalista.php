
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Autorizar FOMOPE</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/estilo_form.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<link href='jquery/jquery-ui.min.css' type='text/css' rel='stylesheet'>
		<link href='jquery/jquery-ui.css' type='text/css' rel='stylesheet'>

		<script type="text/javascript" src="./include/jquery-1.7.1.min.js"></script>
		<script type="text/javascript" src="./include/jquery.validate.js"></script>

		

		  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

		<script src="js/funciones.js"></script>

		<script src="jquery/jquery-3.4.1.min.js" type="text/javascript"></script>
		<script src="jquery/jquery-ui.min.js" type="text/javascript"></script>
		<script src="jquery/jquery-ui.js" type="text/javascript"></script>
		<script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js" ></script>	

	<script src="js/jquery-3.4.1.min.js" type="text/javascript"></script>
		<script src="js/jquery-ui.min.js" type="text/javascript"></script>
		<script src="js/jquery-ui.js" type="text/javascript"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
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
		  </style>

		  <script type="text/javascript">
		  		
			function verDoc(nombre,laExtencion){
				window.location.href = 'Controller/controllerDescargaPagina2.php?nombreDecarga='+nombre+'&extencion='+laExtencion;

			}
		  </script>

	</head>
	<body>
		<?php 

			include "configuracion.php";
				$noFomope = $_GET['noFomope'];
				//echo $noFomope;
				$id_rol = $_GET['id_rol'];
				//echo $id_rol;
				$usuarioSeguir = $_GET['usuario'];
			//echo $usuario;
			$consulta2 = " SELECT * FROM fomope WHERE id_movimiento =" .$noFomope;

		        if($resultado2 = mysqli_query($conexion,$consulta2)){
	        		$row = mysqli_fetch_assoc($resultado2);
					$id_fomope = $row['id_movimiento'];
					$rfc_fom = $row['rfc'];
					$color_est = $row['color_estado'];
					$curp_fom = $row['curp'];
					$apellido_1 = $row['apellido_1'];
					$apellido_2 =  $row['apellido_2'];
					$nombre_s = $row['nombre'];
					$fecha_ingreso =  $row['fechaIngreso'];
					$oficio_entrega = $row['oficioEntrega'];
					$tipo_entrega =  $row['tipoEntrega'];
					$tipo_de_accion = $row['tipoDeAccion'];
					$justificacio_fom = $row['justificacionRechazo'];
					$unidad = $row['unidad'];
					$quincena_apli = $row['quincenaAplicada'];
					$anio_fo = $row['anio'];
	        		$of_unidad = $row['oficioUnidad'];
					$fecha_oficio = $row['fechaOficio'];
					$fecha_recibido = $row['fechaRecibido'];
					$codigo = $row['codigo'];
					$no_puesto = $row['n_puesto'];
					$clave_presupuestaria = $row['clavePresupuestaria'];
					$codigo_movimiento = $row['codigoMovimiento'];
					$concepto = $row['descripcionMovimiento'];
					$del_1 = $row['vigenciaDel'];
					$al_1 = $row['vigenciaAl'];
					$estado_en = $row['entidad'];
					$consecutivo_maestro_impuestos = $row['consecutivoMaestroPuestos'];
					$plaza = $row['puestos'];
					$observaciones = $row['observaciones'];
				
					$fecha_envio_dipsp = $row['fechaEnviadaRubricaDipsp'];
					$fecha_envio_dgrh = $row['fechaEnviadaRubricaDgrho'];
					$fecha_recibido_spc = $row['fechaRecepcionSpc'];
					$fecha_envio_spc = $row['fechaEnvioSpc'];
					$fecha_recibo_dspo = $row['fechaReciboDspo'];
					$folio_spc = $row['folioSpc'];
					$fecha_capt_nomin = $row['fechaCapturaNomina'];
					$fecha_entrega_archivo_gral = $row['fechaEntregaArchivo'];
					$clave_concepto = "$codigo_movimiento"."_"."$concepto";
	        		
			}
	
			$v = "-";
	        	
			$sqlNombre = "SELECT nombrePersonal FROM usuarios WHERE usuario = '$usuarioSeguir'";
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
    	<br>
    	<br>
    	<br>

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



		
		
        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">

      
      		

		<div class="formulario_fomope">

		
			<br><br>
	<center>
			 <form name="captura1" action="aceptar.php" method="POST"> 
						
						<div class="col text-center">
						
			</div>

			<div class="form-row">
					<div class="form-group col-md-6">
						<label class="plantilla-label estilo-colorg"for="unidad1">Unidad:</label>
						<input onkeypress="return pulsar(event)" type="text" class="form-control unexp border border-dark" id="unidad1" name="unidad1" placeholder="Ej. OAG-CA-3735-2020" value="<?php echo $unidad; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly>
					</div>
				</div>
				<div class="form-row">
							<input type="text" class="form-control" id="noFomope" name="noFomope" value="<?php echo $noFomope?>" style="display:none">
						</div>
						<div class="form-row">
							<input type="text" class="form-control" id="id_rol" name="id_rol" value="<?php echo $id_rol?>" style="display:none">
						</div>
						<div class="form-row">
							<input type="text" class="form-control" id="usuarioSeguir" name="usuarioSeguir" value="<?php echo $usuarioSeguir?>" style="display:none">
						</div>
						<div class="form-row">
							<input type="text" class="form-control" id="color_esta" name="color_esta" value="<?php echo $color_est?>" style="display:none">
						</div>
						<div class="form-group col-md-6">
						<label class="plantilla-label" for="listD">Documentos :</label>
			</div>
					<table class="table table-hover table-white">
						<?php 
							include "configuracion.php";
							$existenD =0;
							$sql="SELECT * from fomope WHERE id_movimiento = '$noFomope' ";
							$result=mysqli_query($conexion,$sql);
							$ver = mysqli_fetch_row($result);
/*
								for($i=47; $i<=117; $i++){
									if($ver[$i] == ""){
										
									}else{
										$sqlNombreDoc = "SELECT nombre_documento FROM m1ct_documentos WHERE documentos = '$ver[$i]'";
										$resNombreDoc = mysqli_query($conexion,$sqlNombreDoc);
										$rowNombreDoc = mysqli_fetch_row($resNombreDoc);
										$nombreAdescargar = $ver[4]."_".$ver[$i]."_".$ver[6]."_".$ver[7]."_".$ver[8]."_.PDF";

										echo "
												<tr>
												<td>$rowNombreDoc[0]</td>
												<td>";
								?>

												  <button onclick="verDoc('<?php echo $nombreAdescargar ?>')" type="button" class="btn btn-outline-secondary" > Ver</button>
							<?php	echo "

												</td>
										";	
									}
								}*/
				////////////// inicia la busqueda del archivo en carpeta 
					$banderaMov = 0;  // si entramos y encontramos doc en la carpeta documentosMov

					////////////// inicia la busqueda del archivo en carpeta 
					if($ver[45] == "BAJAS"){
						$dir_subida = './Controller/DOCUMENTOS/';
						$dir_subidaMov = './Controller/DOCUMENTOS_BAJAS/';
						$rutaEnviar = './DOCUMENTOS_BAJAS/';
						$catalogoDocs = "m1ct_documentos";
					}else{
						$dir_subida = './Controller/DOCUMENTOS/';
						$dir_subidaMov = './Controller/DOCUMENTOS_MOV/';
						$rutaEnviar = './DOCUMENTOS_MOV/';
						$catalogoDocs = "m1ct_documentos";
					}

					// Arreglo con todos los nombres de los archivos
					$files = array_diff(scandir($dir_subida), array('.', '..')); 
					$contDoc=0;
					$ruta = $dir_subidaMov;
					$index=0;

					if(is_dir($ruta)) {
                    if($dir = opendir($ruta)) {
                    while(($archivo = readdir($dir)) !== false) {    
                    if($archivo != '.' && $archivo != '..') {   
                    if (is_dir($ruta.$archivo)) {                
                    $leercarpeta = $ruta.$archivo. "/";
                    if(is_dir($leercarpeta)){
                    if($dir2 = opendir($leercarpeta)){
                    while(($archivo2 = readdir($dir2)) !== false){
                    if($archivo2 != '.' && $archivo2 != '..') {
                    
                    $datosPDF[$index]= $archivo2;
                    $index++;

                	} }                   
                    closedir($dir2);
                    } }
                    } } }
                    closedir($dir);
                    } }
					// Arreglo con todos los nombres de los archivos
					$files = array_diff(scandir($dir_subida), array('.', '..')); 
					$contDoc=0;

							foreach($datosPDF as $file){	
											$data = explode("_",$file);
											$conId = count($data);
										    $data2 = explode(".",$file);
											$indice = count($data2);	

											$extencion = $data2[$indice-1];
										    // Nombre del archivo
										    $extractRfc = $data[0];
										    $extractDoc = $data[1];
									 		if($ver[4] == $extractRfc && $data[6] == $noFomope || $ver[5] == $extractRfc && $data[6] == $noFomope){
									 			$banderaMov = 1;
													$sqlNombreDoc2 = "SELECT nombre_documento FROM m1ct_documentos WHERE documentos = '$extractDoc'";
														$resNombreDoc2 = mysqli_query($conexion,$sqlNombreDoc2);
														$rowNombreDoc2 = mysqli_fetch_row($resNombreDoc2);
										 					echo "
													<tr>
													<td>$rowNombreDoc2[0]</td>
													";
									 			$nombreAdescargar = $rutaEnviar.$extractDoc."/".$data[0]."_".$data[1]."_".$data[2]."_".$data[3]."_".$data[4]."_".$data[5]."_".$data[6]."_."."$extencion";
											
						?>	
												<td>
												<button onclick="verDoc('<?php echo $nombreAdescargar ?>','<?php echo $extencion ?>')" type="button" class="btn btn-outline-secondary" > Ver</button>
												</td>
														
						<?php
												
												}
										  }

		if($banderaMov == 0){
					foreach($files as $file){
					    // Divides en dos el nombre de tu archivo utilizando el . 
					    $data = explode("_",$file);
					    $conId = count($data);
					    $data2 = explode(".",$file);
						$indice = count($data2);	

						$extencion = $data2[$indice-1];
					    // Nombre del archivo
					    $extractRfc = $data[0];
					    $extractDoc = $data[1];
					    // Extensión del archivo 

					    if($ver[4] == $extractRfc){
					    	$existenD++;
					    		//$losDocEnCarpeta[$contDoc] = $data[1];
					    		$sqlNombreDoc = "SELECT nombre_documento FROM m1ct_documentos WHERE documentos = '$extractDoc'";
										$resNombreDoc = mysqli_query($conexion,$sqlNombreDoc);
										$rowNombreDoc = mysqli_fetch_row($resNombreDoc);
										if($conId == 7){ // || $conId == 8
									 				$nombreAdescargar = $data[0]."_".$data[1]."_".$data[2]."_".$data[3]."_".$data[4]."_".$data[5]."_."."$extencion";
									 			}else{
									 				$nombreAdescargar = $data[0]."_".$data[1]."_".$data[2]."_".$data[3]."_".$data[4]."_."."$extencion";
									 			}
							 			$nombreAdescargar = $rutaEnviar.$extractDoc."/".$nombreAdescargar;
										//$documentosPC = $documentosPC."_".$data[1];
										echo "
												<tr>
												<td>$rowNombreDoc[0]</td>
												<td>";
					    		//$contDoc++;
						?>
							<button onclick="verDoc('<?php echo $nombreAdescargar ?>','<?php echo $extencion ?>')" type="button" class="btn btn-outline-secondary" > Ver</button>
							<?php	echo "

												</td>
										";	
					    }


					}
////////////// termina parte de ver nomebre desde la carpeta
								if($existenD == 0){
									echo('
											<br>
											<br>
											<div class="col-sm-12 ">
											<div class="plantilla-inputv text-dark ">
											    <div class="card-body"><h2 align="center">No existen documentos adjuntos.</h2></div>
										</div>
										</div>');
								}
					}
					?>

					

					</table>
			<br>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label class="plantilla-label estilo-colorg" for="rfc_fomo">RFC:</label>
						<input onkeypress="return pulsar(event)" type="text" class="form-control unexp border border-dark" id="rfc_fomo" name="rfc_fomo" placeholder="Ej. OAG-CA-3735-2020" value="<?php echo $rfc_fom; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly>
					</div>

					<div class="form-group col-md-6">
						<label class="plantilla-label estilo-colorg" for="curp1">Curp:</label>
						<input onkeypress="return pulsar(event)" type="text" class="form-control unexp border border-dark" id="curp1" name="curp1" placeholder="Ej. OAG-CA-3735-2020" value="<?php echo $curp_fom; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly>
					</div>
				</div>
					<div class="form-row">
					<div class="form-group col-md-5">
						<label class="plantilla-label estilo-colorg" for="apPater">Apellido Paterno:</label>
						<input onkeypress="return pulsar(event)" type="text" class="form-control unexp border border-dark" id="apPater" name="apPater" placeholder="Ej. OAG-CA-3735-2020" value="<?php echo $apellido_1; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly>
					</div>
				<div class="form-row">
					<div class="form-group col-md-5">
						<label class="plantilla-label estilo-colorg"for="apmater">*Apellido Materno:</label>
						<input onkeypress="return pulsar(event)" type="text" class="form-control unexp border border-dark" id="apmater" name="apmater" placeholder="Ej. OAG-CA-3735-2020" value="<?php echo $apellido_2; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly>
					</div>

					<div class="form-group col-md-5">
						<label class="plantilla-label estilo-colorg" for="nombres">Nombre(s):</label>
						<input onkeypress="return pulsar(event)" type="text" class="form-control unexp border border-dark" id="nombres" name="nombres" placeholder="Ej. OAG-CA-3735-2020" value="<?php echo $nombre_s; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly>
					</div>
				</div>

				<div class="form-row">
					<div class="form-group col-md-6">
						<label class="plantilla-label estilo-colorg" for="fechIngr">*Fecha ingreso:</label>
						<input onkeypress="return pulsar(event)" type="text" class="form-control unexp border border-dark" id="fechIngr" name="fechIngr" placeholder="Ej. OAG-CA-3735-2020" value="<?php echo $fecha_ingreso; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly>
					</div>

					<div class="form-group col-md-6">
						<label class="plantilla-label estilo-colorg" for="ofentre">*Oficio entrega:</label>
						<input onkeypress="return pulsar(event)" type="text" class="form-control unexp border border-dark" id="ofentre" name="ofentre" placeholder="Ej. OAG-CA-3735-2020" value="<?php echo $oficio_entrega; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly>
					</div>

					<div class="form-group col-md-6">
						<label class="plantilla-label estilo-colorg" for="tipoentre">Tipo de entrega:</label>
						<input onkeypress="return pulsar(event)" type="text" class="form-control unexp border border-dark" id="tipoentre" name="tipoentre" placeholder="Ej. OAG-CA-3735-2020" value="<?php echo $tipo_entrega; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly>
					</div>

					<div class="form-group col-md-6">
						<label class="plantilla-label estilo-colorg" for="tipoacc">Tipo de acción:</label>
						<input onkeypress="return pulsar(event)" type="text" class="form-control unexp border border-dark" id="tipoacc" name="tipoacc" placeholder="Ej. OAG-CA-3735-2020" value="<?php echo $tipo_de_accion; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly>
					</div>
				</div>

					<div class="form-group col-md-10">
						<label class="plantilla-label estilo-colorg" for="justirech">Justificación rechazo:</label>
						<input onkeypress="return pulsar(event)" type="text" class="form-control unexp border border-dark" id="justirech" name="justirech" placeholder="Ej. OAG-CA-3735-2020" value="<?php echo $justificacio_fom; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly>

				</div>
				<div class="form-row">
					<div class="form-group col-md-4">
						<label class="plantilla-label estilo-colorg" for="quinapli">Quincena aplicada:</label>
						<input onkeypress="return pulsar(event)" type="text" class="form-control unexp border border-dark" id="quinapli" name="quinapli" placeholder="Ej. OAG-CA-3735-2020" value="<?php echo $quincena_apli; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly>
					</div>


					<div class="form-group col-md-4">
						<label class="plantilla-label estilo-colorg" for="aniofo">Año:</label>
						<input onkeypress="return pulsar(event)" type="text" class="form-control unexp border border-dark" id="aniofo" name="aniofo" placeholder="Ej. OAG-CA-3735-2020" value="<?php echo $anio_fo; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly>
				
				</div>
					<div class="form-group col-md-4">
						<label class="plantilla-label estilo-colorg" for="ofunid">*Oficio Unidad:</label>
						<input onkeypress="return pulsar(event)" type="text" class="form-control unexp border border-dark" id="ofunid" name="ofunid" placeholder="Ej. OAG-CA-3735-2020" value="<?php echo $of_unidad; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly>

				</div>
			</div>
				<div class="form-row">
					<div class="form-group col-md-8">
						<label class="plantilla-label estilo-colorg" for="fechaofi">*Fecha de oficio:</label>
						<input onkeypress="return pulsar(event)" type="date" class="form-control border border-dark" id="fechaofi" name="fechaofi" placeholder="Fecha Oficio" value="<?php echo $fecha_oficio; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly>
						<small name= "alertFechaIngreso" id= "alertFechaIngreso" class="text-danger">
				        </small>  
					</div>
				
				<div class="form-row">
					<div class="form-group col-md-13">
						<label class="plantilla-label estilo-colorg" for="fechareci">*Fecha de recibido:</label>
						<input onkeypress="return pulsar(event)" type="date" class="form-control border border-dark" id="fechareci" name="fechareci" placeholder="Fecha de recibido" value="<?php echo $fecha_recibido; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly>
						<small name= "alertFechaIngreso" id= "alertFechaIngreso" class="text-danger">
				        </small>  
					</div>
				</div>
					<div class="form-row">
					<div class="form-group col-md-114">
						<label class="plantilla-label estilo-colorg" for="codigo">*Código:</label>
						<input onkeypress="return pulsar(event)" type="text" class="form-control border border-dark" id="codigo" name="codigo" placeholder="Ej. 165" value="<?php echo $codigo; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly>
					</div>
				</div>
			</div>
					<div class="form-row">
					<div class="form-group col-md-10">
						<label class="plantilla-label estilo-colorg" for="NO">No. de puesto:</label>
						<input onkeypress="return pulsar(event)" type="text" class="form-control border border-dark" id="num_pues" name="num_pues" placeholder="Ej. 0001" value="<?php echo $no_puesto; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly>

				</div>
					<div class="form-group col-md-7">
						<label class="plantilla-label estilo-colorg" for="NO">Clave presupuestaria:</label>
						<input onkeypress="return pulsar(event)" type="text" class="form-control border border-dark" id="clavepres" name="clavepres" placeholder="Ej. 0001" value="<?php echo $clave_presupuestaria; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly>
					</div>
				
					
					<div class="form-group col-md-12">
						<label class="plantilla-label estilo-colorg" for="codmov">*Código de movimiento:</label>
						<input onkeypress="return pulsar(event)" type="text" class="form-control cod2 border border-dark" id="cod2_1" name="cod2_1" placeholder="Ej. 4550" value="<?php echo $clave_concepto; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly>
					</div>
				</div>

				<div class="form-row">
					<div class="form-group col-md-6">
							<div class="text-center">
								<label class="plantilla-label estilo-colorg" for="del2">*Del:</label>
							</div>
							<input onkeypress="return pulsar(event)" type="date" class="form-control border border-dark" id="del2" name="del2" placeholder="Del" value="<?php echo $del_1; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly>
							<small name= "alertVigencia" id= "alertVigencia" class="text-danger">
				        	</small> 
						</div>
						<div class="form-group col-md-6">
							<div class="text-center">
								<label class="plantilla-label estilo-colorg" for="al3">al:</label>
							</div>
							<input onkeypress="return pulsar(event)" type="date" class="form-control border border-dark" id="al3" name="al3" placeholder="al" value="<?php echo $al_1; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly> <!---->
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
						<label class="plantilla-label estilo-colorg" for="estad">*Estado:</label>
						<input onkeypress="return pulsar(event)" type="text" class="form-control border border-dark" id="estad" name="estad" placeholder="Ej. Ciudad de México" maxlength="13" value="<?php echo $estado_en; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly>
					</div>
					<div class="form-group col-md-5">
						<label class="plantilla-label estilo-colorg" for="consema">*Consecutivo maestro de puestos:</label>
						<input onkeypress="return pulsar(event)" type="text" class="form-control colon border border-dark" id="consema" name="consema" placeholder="Ej. 170" value="<?php echo $consecutivo_maestro_impuestos; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-5">
						<label class="plantilla-label estilo-colorg" for="plaza1">*Plaza:</label>
						<input onkeypress="return pulsar(event)" type="text" class="form-control colon border border-dark" id="plaza1" name="plaza1" placeholder="Ej. 1" value="<?php echo $plaza; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly>
					</div>
				</div>
					<div class="form-group col-md-5">
						<label class="plantilla-label estilo-colorg" for="observ">*Observaciones:</label>
						<input onkeypress="return pulsar(event)" type="text" class="form-control colon border border-dark" id="observ" name="observ" placeholder="Ej. 11-01-19 LA DIRECTORA GENERAL INDICA QUE SE REQUIERE OFICIO DE AUTORIZACION CON JUSTIFICACION PARA OCUPACION." value="<?php echo $observaciones; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly>
					</div>
					
					<div class="form-group col-md-6">
						<label class="plantilla-label estilo-colorg" for="fechaendipsp">*Fecha de envio DIPSP:</label>
						<input onkeypress="return pulsar(event)" type="date" class="form-control border border-dark" id="fechaendipsp" name="fechaendipsp" placeholder="Fecha de envio a firma DGRH" value="<?php echo $fecha_envio_dipsp; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly>
						<small name= "alertFechaIngreso" id= "alertFechaIngreso" class="text-danger">
				        </small>  
					</div>


					 <div class="form-group col-md-6">
						<label class="plantilla-label estilo-colorg" for="fechaendgrh">*Fecha de envio a firma DGRH:</label>
						<input onkeypress="return pulsar(event)" type="date" class="form-control border border-dark" id="fechaendgrh" name="fechaendgrh" placeholder="Fecha de envio a firma DGRH" value="<?php echo $fecha_envio_dgrh; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly>
						<small name= "alertFechaIngreso" id= "alertFechaIngreso" class="text-danger">
				        </small>  
					</div>

					<div class="form-group col-md-6">
						<label class="plantilla-label estilo-colorg" for="fecharecspc">*Fecha de recibido en SPC:</label>
						<input onkeypress="return pulsar(event)" type="date" class="form-control border border-dark" id="fecharecspc" name="fecharecspc" placeholder="Fecha de recibido en SPC" value="<?php echo $fecha_recibido_spc; ?>"  onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly>
						<small name= "alertFechaIngreso" id= "alertFechaIngreso" class="text-danger">
				        </small>  
					</div>
					<div class="form-group col-md-6">
						<label class="plantilla-label estilo-colorg" for="fechenvvb">*Fecha de envio a VoBo SPC:</label>
						<input onkeypress="return pulsar(event)" type="date" class="form-control border border-dark" id="fechenvvb" name="fechenvvb" placeholder="Fecha de envio a VoBo SPC" value="<?php echo $fecha_envio_spc; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly>
						<small name= "alertFechaIngreso" id= "alertFechaIngreso" class="text-danger">
				        </small>  
					</div>

					
					<div class="form-group col-md-5">
						<label class="plantilla-label estilo-colorg" for="foliospc">*Folio SPC:</label>
						<input onkeypress="return pulsar(event)"  type="text" class="form-control colon border border-dark" id="foliospc" name="foliospc" placeholder="Ej. 2020" value="<?php echo $folio_spc; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly>
					</div>
					<div class="form-group col-md-6">
							<div class="text-center">
								<label class="plantilla-label estilo-colorg" for="fechanom">Fecha captura nomina:</label>
							</div>
							<input onkeypress="return pulsar(event)" type="date" class="form-control border border-dark" id="fechanom" name="fechanom" placeholder="Ej" value="<?php echo $fecha_capt_nomin; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly> <!--required-->
						</div>
					 <div class="form-group col-md-6">
							<div class="text-center">
								<label class="plantilla-label estilo-colorg" for="al3">Fecha entregada del trabajador para archivo gral.- Lourdes Arredondo Cortes:</label>
							</div>
							<input onkeypress="return pulsar(event)" type="date" class="form-control border border-dark" id="fechaenlo" name="fechaenlo" placeholder="fechaenlo" value="<?php echo $fecha_entrega_archivo_gral; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly> <!--required-->
						</div>

			<!--</form>-->

		</div>
		<br><br>
		

			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
								  Autorizar
								</button>

								<!-- Modal -->
								<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  <div class="modal-dialog" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								        <h5 class="modal-title" id="exampleModalLabel">Autorización Fomope</h5>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
								      </div>
								      <div class="modal-body">
								        ¿Está seguro que la información a autorizar es la correcta?
								      </div>
								      <div class="modal-footer">
								        <button type="button" class="btn btn-secondary" data-dismiss="modal">Regresar</button>
								       	<button type="submit" class="btn btn-primary">Autorizar</button>
								       	
								      </div>
								    </div>
								  </div>
								</div>
								<br>
								</form>
								<br>

					<form name="captura" action="observacion.php" method="POST"> 
							<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal1" data-whatever="@getbootstrap" >Rechazar</button>

							<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title" id="exampleModalLabel">Motivo de rechazo</h5>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <div class="modal-body">
							        <form>
							         <textarea class="form-control border border-dark" id="obs" name="obs" rows = "4" value = "" placeholder="Observación por rechazo"></textarea>
							          <div class="form-row">
										<input type="text" class="form-control" id="noFomope" name="noFomope" value="<?php echo $noFomope?>" style="display:none">
										</div>
										<div class="form-row">
											<input type="text" class="form-control" id="id_rol" name="id_rol" value="<?php echo $id_rol?>" style="display:none">
										</div>
										<div class="form-row">
											<input type="text" class="form-control" id="usuarioSeguir" name="usuarioSeguir" value="<?php echo $usuarioSeguir?>" style="display:none">
										</div>
										<div class="form-row">
							<input type="text" class="form-control" id="color_esta" name="color_esta" value="<?php echo $color_est?>" style="display:none">
						</div>
							        </form>
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-secondary" data-dismiss="modal">Regresar</button>
							        <button type="submit" class="btn btn-primary">Rechazar</button>
							      </div>
							    </div>
							  </div>
							</div>
					</form>

      	</center>

<script src="js/bootstrap.min.js"></script>
   	<script src="js/main.js"></script>
								

	</body>
</html>
