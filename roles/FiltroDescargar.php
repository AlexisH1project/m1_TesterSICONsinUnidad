
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
			

	</head>
	<body>
		<?php 
		include "configuracion.php";
			$usuarioSeguir = $_GET['usuario_rol'];


			$sqlNombre = "SELECT nombrePersonal FROM usuarios WHERE usuario = '$usuarioSeguir'";
			$result = mysqli_query($conexion,$sqlNombre);
			$nombreU = mysqli_fetch_row($result);
			$consultaR = " SELECT * FROM usuarios WHERE usuario = '$usuarioSeguir'";
			 if($resultado3 = mysqli_query($conexion,$consultaR)){
	        		$row = mysqli_fetch_assoc($resultado3);
					$id_rol1 = $row['id_rol'];

					
			}	
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
	            <a  href= <?php echo ("'./menuPrincipal.php?usuario_rol=$usuarioSeguir'");?> ><img src="./img/iclogin.png" alt="x" height="17" width="17"/><?php echo (" $nombreU[0]"); ?></a>
	          </li>
	        	</center>
	        	
	          <li class=" estilo-color">
	            <a href= <?php if($id_rol1 == 0){echo ("'./luluConsulta.php?usuario_rol=$usuarioSeguir'"); }elseif ($id_rol1 == 4) {
	            	
	            echo ("'./dario.php?usuario_rol=$usuarioSeguir'"); } elseif ($id_rol1 == 1) {
	            	
	            echo ("'./lulu.php?usuario_rol=$usuarioSeguir'"); }?> ><img src="./img/2_ic.png" alt="x" height="17" width="20"/>      Bandeja</a>
	          </li>
	          <li class=" estilo-color">
	            <a href=  <?php echo ("'./generarReporte.php?usuario_rol=$usuarioSeguir'"); ?> ><img src="./img/icreport.png" alt="x" height="17" width="20"/>Generar Reporte</a>
	          </li>
	          <li class=" estilo-color">
	              <a  href= <?php echo ("'./consultaEstado.php?usuario_rol=$usuarioSeguir'");?> ><img src="./img/ic-consulta.png" alt="x" height="17" width="17"/> Consulta</a>
	          </li>
	           <?php if( $id_rol1 == 0 || $id_rol1 == 1) {


	            	
	           ?>
			 <li class=" estilo-color">
				              <a href= <?php echo ("'./guardarVista.php?usuario_rol=$usuarioSeguir'");?>><img  src="./img/upload1.png" alt="x" height="17" width="20"/> Guardar Documentos</a>
				          </li>
	       <?php }else{

	        		
	            	
	           ?>
	             
	            <?php 
	        }
	           ?>
	           </li>
	         
	          <?php if($id_rol1 == 2 || $id_rol1 == 0 || $id_rol1 == 1 || $id_rol1 == 4 || $id_rol1 == 5) {


	            	
	           ?>
	            
	       <?php }else{

	        		
	            	
	           ?>
	            <li class=" estilo-color">
	            <a href=  <?php echo ("'./generarReportePC.php?usuario_rol=$usuarioSeguir'"); ?> ><img src="./img/icreport2.png" alt="x" height="17" width="20"/>Reporte Profesional</a>
	          </li>
	            <?php 
	        }
	           ?>
	          
	         
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
<br>


        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
      	<center>
				<form method="post" action=""> 
				<div class="rounded border border-dark plantilla-inputv text-center">

				  			<label  class="plantilla-label estilo-colorg" for="nombreT">NOMBRE COMPLETO: </label>
					<div class="form-row">
					
				  			

						   <div class="form-group col-md-4">
						        <input type="text" class="form-control unexp border border-dark" id="apellido1" name="apellido1" placeholder="Apellido Paterno" maxlength="30" required>
						      </div>
						

						
						     <div class="form-group col-md-4">
						        <input type="text" class="form-control unexp border border-dark" id="apellido2" name="apellido2" placeholder="Apellido Materno" maxlength="30" required>
						      </div>

						     <div class="form-group col-md-4">
						        <input type="text" class="form-control unexp border border-dark" id="nombre" name="nombre" placeholder="Nombre" maxlength="40" value="" required >
						      </div>
						
			
				<div class="col-sm-12">
					<div class="form-row">

					<div class="form-group col-md-12">
						<div class="col text-center">
							<input type="submit" name="buscar" class="btn btn btn-danger tamanio-button plantilla-input text-white bord" value="Buscar"><br>

							<!-- <button type="submit" name="buscar" class="btn btn-outline-info tamanio-button">Buscar</button> -->
						</div>
					</div>

					</div>
				</div>
			</form>




		</div>
	
	</div>

		<br>
		<br>

		<table class="table table-hover table-white">
						<thead>
						    <tr>
							<!-- <td>Observacion</td>
							<td>ID Fomope</td> -->
						      <th class="estilo-colorg" scope="titulo">Nombre</th>
						      <th class="estilo-colorg" scope="titulo">Archivo</th>
						      
						   </tr>
					 	 </thead>

					<?php 
						$banderHay = 0;
						if(isset($_POST['buscar'])){// $_SERVER['REQUEST_METHOD'] == 'POST' if(){
							$elNombre = strtoupper($_POST['nombre']);
							$elApellido1 = strtoupper($_POST['apellido1']);
							$elApellido2 = strtoupper($_POST['apellido2']);
							//echo $elApellido1 . $elApellido2 .  $elNombre;

								$dir_subida = './Controller/documentos/';

								// Arreglo con todos los nombres de los archivos
								$files = array_diff(scandir($dir_subida), array('.', '..')); 
								
								foreach($files as $file){
								    // Divides en dos el nombre de tu archivo utilizando el . 
								    $data = explode("_",$file);
								    $data2 = explode("_.",$file);
									$indice = count($data2);	

									$extencion = $data2[$indice-1];
								    // Nombre del archivo
								    $extractRfc = $data[0];
								    $nameAdj = $data[1];

								    //Identificamos que nombre real de archivo es, interpretanso la nombreclatura doc_ 
					
						
										$sqlNombreDoc = "SELECT nombre_documento FROM m1ct_documentos WHERE documentos = '$nameAdj'";
										$resNombreDoc = mysqli_query($conexion,$sqlNombreDoc);
										$rowNombreDoc = mysqli_fetch_row($resNombreDoc);
										//$nombreAdescargar = $ver[4]."_".$ver[$i]."_".$ver[6]."_".$ver[7]."_".$ver[8]."_.PDF";

								    //echo $data[4];
								    // Extensión del archivo 

								    if(($data[2] == $elApellido1) AND ($data[3] == $elApellido2) AND ($data[4] == $elNombre)){
								      		$nombreCompleto = $elApellido1." ".$elApellido2." ".$elNombre;
								   			$banderHay ++;
								    		

						?>        	
						<tr>
													<td><?php echo $nombreCompleto  ?></td>
													<td><?php echo $rowNombreDoc[0] ?></td>
													<td>
													<form method="post" action="./Controller/verPDF.php">
														<input type="text" name="nombreDecarga" value="<?php echo $file ?>" style="display:none" >
														<input type="submit" name="Descargar" value="Ver"  class="btn btn-info">
														<!-- <button type="button" class="btn btn-info" id="" >Descargar</button>  -->
													</form>
													</td>
						</tr>
												
							<?php

									    }
									}
									
								
							?>

			<?php
								$dir_subida = './Controller/Documentos/';

								// Arreglo con todos los nombres de los archivos
								$files = array_diff(scandir($dir_subida), array('.', '..')); 
								
								foreach($files as $file){
								    // Divides en dos el nombre de tu archivo utilizando el . 
								    $data = explode("_",$file);
								    $data2 = explode("_.",$file);
									$indice = count($data2);	

									$extencion = $data2[$indice-1];
								    // Nombre del archivo
								    $extractRfc = $data[0];
								    $nameAdj = $data[1];

								    

								    if(($data[1] == $elApellido1) AND ($data[2] == $elApellido2) AND ($data[3] == $elNombre)){
								      		$nombreCompleto = $elApellido1." ".$elApellido2." ".$elNombre;
								   			$banderHay ++;
								    		

						?>        	
						<tr>
													<td><?php echo $nombreCompleto  ?></td>
													<td>Archivos de Loteo</td>
													<td>
													<form method="post" action="./Controller/decargaZip.php">
														<input type="text" name="nombreDecarga" value="<?php echo $file ?>" style="display:none" >
														<input type="submit" name="Descargar" value="Descargar"  class="btn btn-info">
														<!-- <button type="button" class="btn btn-info" id="" >Descargar</button>  -->
													</form>
													</td>
						</tr>
												
							<?php

									    }
									}
									if($banderHay == 0){
											
											echo('
												<br>
												<br>
												<div class="col-sm-12 ">
												<div class="p-3 mb-5 bg-warning text-dark ">
												    <div class="card-body"><h2 align="center">No existe resultados de la busqueda, vuelve intentar.</h2></div>
											</div>
											</div>');
									}

								}
								
							?>

		</table>

					
				
<script src="js/bootstrap.min.js"></script>
   	<script src="js/main.js"></script>
			
			
			  
	</center>
	</body>

</html>

