
<html>
	<head>
		<!-- ola kevss -->
		<meta charset="utf-8">
		<title>Generar reporte</title>
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
	            	
	            echo ("'./dario.php?usuario_rol=$usuarioSeguir'"); }elseif ($id_rol1 == 2) {
	            	
	            echo ("'./analista.php?usuario_rol=$usuarioSeguir'"); } elseif ($id_rol1 == 1) {
	            	
	            echo ("'./lulu.php?usuario_rol=$usuarioSeguir'"); }?> ><img src="./img/2_ic.png" alt="x" height="17" width="20"/>      Bandeja</a>
	          </li>
	        	<?php if($id_rol1 == 2 || $id_rol1 == 3 ) {


	            	
	           ?>
	       <?php }else{

	        		
	            	
	           ?>
	            <li class=" estilo-color">
	            <a href=  <?php echo ("'./FiltroDescargar.php?usuario_rol=$usuarioSeguir'"); ?> ><img src="./img/icreport2.png" alt="x" height="17" width="20"/>      Descarga de Documentos</a>
	          </li>
	            <?php 
	        }
	           ?>
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
	         

	          <li class=" estilo-color">
	              <a  href= <?php echo ("'./consultaEstado.php?usuario_rol=$usuarioSeguir'");?> ><img src="./img/ic-consulta.png" alt="x" height="17" width="17"/> Consulta</a>
	          </li>
	          <?php if($id_rol1 == 2 || $id_rol1 == 3 || $id_rol1 == 4 || $id_rol1 == 5) {


	            	
	           ?>
	       <?php }else{

	        		
	            	
	           ?>
	            <li class=" estilo-color">
	            <a href=  <?php echo ("'./guardarVista.php?usuario_rol=$usuarioSeguir'"); ?> ><img src="./img/upload1.png" alt="x" height="17" width="20"/>     Guardar Documentos</a>
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
				<form method="post" action="generarReporteAnalista/generarFomope.php"> 
					<br>
		    <br>
		    <br>

				<div class="plantilla-inputv text-center">

					<div class="form-row">
						<div class="col">
							<div class="form-group col-md-12">
								<label  class="plantilla-label estilo-colorg" for="analista">Analista: </label>
									 
									<select class="form-control unexp border border-dark custom-select" name="analista">
										<?php
										if (!$conexion->set_charset("utf8")) {//asignamos la codificación comprobando que no falle
										       die("Error cargando el conjunto de caracteres utf8");
										}

										$consulta = "SELECT usuario FROM usuarios WHERE id_rol = 3 ";
										$resultado = mysqli_query($conexion , $consulta);
										$contador=0;

										while($misdatos = mysqli_fetch_assoc($resultado)){ $contador++;?>
										<option  data-subtext="<?php echo $misdatos['usuario']; ?>"><?php echo $misdatos['usuario']; ?></option>
										<?php }?>          
										</select>
							</div>
						</div>

						<div class="col">

							<div class="form-group col-md-12">
								<label class="plantilla-label estilo-colorg" for="fechaImp1">Fecha a Imprimir:</label>
								<input type="date" class="form-control border-dark" id="fechaImp1" name="fechaImp1" required>
							</div>
						</div>

								<input type="input" class="form-control border-dark" id="nombreUsuario" name="nombreUsuario" value="<?php echo "$usuarioSeguir" ?>" style="display:none">
			
						<div class="col">
							<div class="form-group col-md-12">
								<label class="plantilla-label estilo-colorg" for="fechaImp2">Rango de Fecha:</label>
								<input type="date" class="form-control border-dark" id="fechaImp2" name="fechaImp2">
							</div>
						</div>		
					</div>
			
				<div class="col-sm-12">
					<div class="form-row">

					<div class="form-group col-md-12">
						<div class="col text-center">
							<input type="submit" name="impReporte" class="btn btn btn-danger tamanio-button plantilla-input text-white bord" value="Generar Reporte"><br>
						</div>
					</div>

					</div>
				</div>
		</div>
	
			</form>
</center>	


        <!-- Page Content  -->
		<div id="content" class="p-4 p-md-5 pt-5">


<center>
<form method="post" action="generarReporteAnalista/generarFomopeQr.php"> 
  <br>
<br>
<br>

<div class="plantilla-inputv text-center">

  <div class="form-row">
	  <div class="col">
		  <div class="form-group col-md-12">
			  <label  class="plantilla-label estilo-colorg" for="analista">Analista: </label>
				   
				  <select class="form-control unexp border border-dark custom-select" name="analista">
					  <?php
					  if (!$conexion->set_charset("utf8")) {//asignamos la codificación comprobando que no falle
							 die("Error cargando el conjunto de caracteres utf8");
					  }

					  $consulta = "SELECT usuario FROM usuarios WHERE id_rol = 3 ";
					  $resultado = mysqli_query($conexion , $consulta);
					  $contador=0;

					  while($misdatos = mysqli_fetch_assoc($resultado)){ $contador++;?>
					  <option  data-subtext="<?php echo $misdatos['usuario']; ?>"><?php echo $misdatos['usuario']; ?></option>
					  <?php }?>          
					  </select>
		  </div>
	  </div>

	  <div class="col">

		  <div class="form-group col-md-12">
			  <label class="plantilla-label estilo-colorg" for="fechaImp1">Fecha a Imprimir:</label>
			  <input type="date" class="form-control border-dark" id="fechaImp1" name="fechaImp1" required>
		  </div>
	  </div>

			  <input type="input" class="form-control border-dark" id="nombreUsuario" name="nombreUsuario" value="<?php echo "$usuarioSeguir" ?>" style="display:none">

	  <div class="col">
		  <div class="form-group col-md-12">
			  <label class="plantilla-label estilo-colorg" for="fechaImp2">Rango de Fecha:</label>
			  <input type="date" class="form-control border-dark" id="fechaImp2" name="fechaImp2">
		  </div>
	  </div>		
  </div>

<div class="col-sm-12">
  <div class="form-row">

  <div class="form-group col-md-12">
	  <div class="col text-center">
		  <input type="submit" name="impReporte" class="btn btn btn-danger tamanio-button plantilla-input text-white bord" value="Generar Reporte QR"><br>

	  </div>
  </div>

  </div>
</div>
</div>

</form>
</center>	
			<script src="js/bootstrap.min.js"></script>
   	<script src="js/main.js"></script>
			  
	</center>
	</body>

</html>

