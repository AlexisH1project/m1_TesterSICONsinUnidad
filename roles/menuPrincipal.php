
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
		  .estilo-colorg{
				font-family: Montserrat, Medium;
				font-size: 100px;
				color:  #6f7271 ;
				font-weight: bold;
			}
		  </style>



	</head>
	<body>
		<?php 
		include "configuracion.php";
		$usuarioSeguir = $_GET['usuario_rol'];

			$sqlNombre = "SELECT nombrePersonal, id_rol FROM usuarios WHERE usuario = '$usuarioSeguir'";
			$result = mysqli_query($conexion,$sqlNombre);
			$nombreU = mysqli_fetch_row($result);
			echo "<br><br><br><br>"; 
			if($nombreU[1] == 2){ 

		 ?>
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
	            <a  ><img src="./img/iclogin.png" alt="x" height="17" width="17"/><?php echo (" $nombreU[0]"); ?></a>
	          </li>
	        	</center>
	          <li class=" estilo-color">
	            <a href= <?php  echo ("'./Controller/consultaRoles.php?usuarioSeguir=$usuarioSeguir'");?> ><img src="./img/2_ic.png" alt="x" height="17" width="20"/>      Bandeja</a>
	          </li>
	          <li class=" estilo-color">
	              <a  href= <?php echo ("'./consultaEstado.php?usuario_rol=$usuarioSeguir'");?> ><img src="./img/ic-consulta.png" alt="x" height="17" width="17"/> Consulta</a>
	          </li>
	          <li class=" estilo-color">
	            <a href=  <?php echo ("'./generarReporte.php?usuario_rol=$usuarioSeguir'"); ?> ><img src="./img/icreport.png" alt="x" height="17" width="20"/>Generar Reporte</a>
	          </li>
	           <li class=" estilo-color">
	              <a href= <?php echo ("'./guardarVista.php?usuario_rol=$usuarioSeguir'");?>><img  src="./img/upload1.png" alt="x" height="17" width="20"/> Guardar Documentos</a>
	          </li>
	          <li class=" estilo-color">
	              <a  href= <?php echo ("'./correosUR.php?usuario_rol=$usuarioSeguir'");?> ><img src="./img/1_ic.png" alt="x" height="17" width="17"/> Correos</a>
	          </li>
			  <li class=" estilo-color">
	              <a href= <?php echo ("'./guardarVistaEventuales.php?usuario_rol=$usuarioSeguir'");?>><img  src="./img/upload1.png" alt="x" height="17" width="20"/> Guardar Documentos <center><b><i>(QR)</i></b></center></a>
	          </li>
			  <li class=" estilo-color">
	              <a href= <?php echo ("'./qrtxt.php?usuario_rol=$usuarioSeguir'");?>><img  src="./img/qr.png" alt="x" height="17" width="20"/> Guardar txt QR</a>
	          </li>
			  <li class=" estilo-color">
	              <a href= <?php echo ("'./gEstructuraNom.php?usuario_rol=$usuarioSeguir'");?>><img  src="./img/icreport2.png" alt="x" height="17" width="20"/> Descargar Registros QR</a>
	          </li>
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
    	<?php 
		}elseif( $nombreU[1] == 4){


 			?>
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
	            <a ><img src="./img/iclogin.png" alt="x" height="17" width="17"/><?php echo (" $nombreU[0]"); ?></span></a>
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


			<?php 

		}elseif($nombreU[1] == 0 || $nombreU[1] == 1 ){


 			?>
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
	            <a ><img src="./img/iclogin.png" alt="x" height="17" width="17"/><?php echo (" $nombreU[0]"); ?></span></a>
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
	          <li class=" estilo-color">
	              <a href= <?php echo ("'./guardarVista.php?usuario_rol=$usuarioSeguir'");?>><img  src="./img/upload1.png" alt="x" height="17" width="20"/> Guardar Documentos</a>
	          </li>
	           <li class=" estilo-color">
	              <a href= <?php echo ("'./qrtxt.php?usuario_rol=$usuarioSeguir'");?>><img  src="./img/qr.png" alt="x" height="17" width="20"/> Guardar txt QR</a>
	          </li>
	          <li class=" estilo-color">
	              <a href= <?php echo ("'./guardarVistaEventuales.php?usuario_rol=$usuarioSeguir'");?>><img  src="./img/upload1.png" alt="x" height="17" width="20"/> Guardar Documentos <center><b><i>(QR)</i></b></center></a>
	          </li>
	          <li class=" estilo-color">
	              <a href= <?php echo ("'./actualizarFecha.php?usuario_rol=$usuarioSeguir'");?>><img  src="./img/calendarioMP.png" alt="x"height="25" width="25"/> Actualizar Fechas</a>
	          </li>
			  <li class=" estilo-color">
	              <a href= <?php echo ("'./gEstructuraNomEv.php?usuario_rol=$usuarioSeguir'");?>><img  src="./img/icreport2.png" alt="x" height="17" width="20"/> Descargar Registros QR</a>
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

	     
	      </div>
    	</nav>


			<?php 

		}else if($nombreU[1] == 5){ 

			header('Location:./consultaEstado.php?usuario_rol='.$usuarioSeguir);
		}else if ($nombreU[1] == 6) {
		?>

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
	            <a ><img src="./img/iclogin.png" alt="x" height="17" width="17"/><?php echo (" $nombreU[0]"); ?></span></a>
	          </li>
	      </center>
	          <li class=" estilo-color">
	            <a href=  <?php echo ("'./Controller/consultaRoles.php?usuarioSeguir=$usuarioSeguir''"); ?> ><img src="./img/2_ic.png" alt="x" height="17" width="20"/>      Bandeja</a>
	          </li>
	          <li class=" estilo-color">
	              <a href= <?php echo ("'../m2_plantilla/vista/consultaEstadoPlazas.php?usuario_rol=$usuarioSeguir'");?>><img src="./img/ic-consulta.png" alt="x" height="17" width="17"/> Consulta</a>
	          </li>
	          <li class=" estilo-color">
	              <a href= <?php echo ("'../m2_plantilla/vista/leerExcel.php?usuario_rol=$usuarioSeguir'");?>><img  src="./img/upload1.png" alt="x" height="17" width="20"/> Extraer Excel</a>
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

	     
	      </div>
    	</nav>
		

		<?php 	
		}else if ($nombreU[1] == 7) {

	?>
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
	            <a ><img src="./img/iclogin.png" alt="x" height="17" width="17"/><?php echo (" $nombreU[0]"); ?></span></a>
	          </li>
	      </center>
	          <li class=" estilo-color">
	            <a href=  <?php echo ("'./bandejaBajas.php?usuario_rol=$usuarioSeguir''"); ?> ><img src="./img/2_ic.png" alt="x" height="17" width="20"/>Bandeja</a>
	          </li>
	           <li class=" estilo-color">
	              <a  href= <?php echo ("'./consultaEstado.php?usuario_rol=$usuarioSeguir'");?> ><img src="./img/ic-consulta.png" alt="x" height="17" width="17"/> Consulta</a>
	          </li>
	            <li class=" estilo-color">
	              <a href= <?php echo ("'./qrtxt.php?usuario_rol=$usuarioSeguir'");?>><img  src="./img/qr.png" alt="x" height="17" width="20"/> Guardar txt QR</a>
	          </li>
	          <li class=" estilo-color">
	              <a href= <?php echo ("'./guardarVistaBajas.php?usuario_rol=$usuarioSeguir'");?>><img  src="./img/upload1.png" alt="x" height="17" width="20"/> Guardar Documentos <center><b><i>(Bajas)</i></b></center></a>
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

	     
	      </div>
    	</nav>
	<?php 	
		}else if ($nombreU[1] == 8) {

	?>
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
	            <a ><img src="./img/iclogin.png" alt="x" height="17" width="17"/><?php echo (" $nombreU[0]"); ?></span></a>
	          </li>
	      </center>
	          <li class=" estilo-color">
	              <a  href= <?php echo ("'./consultaEstado.php?usuario_rol=$usuarioSeguir'");?> ><img src="./img/ic-consulta.png" alt="x" height="17" width="17"/> Consulta</a>
	          </li>
	           <li class=" estilo-color">
	              <a href= <?php echo ("'./guardarVista.php?usuario_rol=$usuarioSeguir'");?>><img  src="./img/upload1.png" alt="x" height="17" width="20"/> Guardar Documentos</a>
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

	     
	      </div>
    	</nav>


	<?php

		}else{ // ROL == 2 
		 ?>

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
	            <a  ><img src="./img/iclogin.png" alt="x" height="17" width="17"/><?php echo (" $nombreU[0]"); ?></a>
	          </li>
	        	</center>
	          <li class=" estilo-color">
	            <a href= <?php  echo ("'./Controller/consultaRoles.php?usuarioSeguir=$usuarioSeguir'");?> ><img src="./img/2_ic.png" alt="x" height="17" width="20"/>      Bandeja</a>
	          </li>
	          <li class=" estilo-color">
	              <a  href= <?php echo ("'./consultaEstado.php?usuario_rol=$usuarioSeguir'");?> ><img src="./img/ic-consulta.png" alt="x" height="17" width="17"/> Consulta</a>
	          </li>
	           <li class=" estilo-color">
	              <a href= <?php echo ("'./guardarVista.php?usuario_rol=$usuarioSeguir'");?>><img  src="./img/upload1.png" alt="x" height="17" width="20"/> Guardar Documentos</a>
	          </li>
	         <li class=" estilo-color">
	            <a href=  <?php echo ("'./generarReportePC.php?usuario_rol=$usuarioSeguir'"); ?> ><img src="./img/icreport.png" alt="x" height="17" width="20"/>Reporte Profesional</a>
	          </li>
			  <li class=" estilo-color">
	              <a href= <?php echo ("'./qrtxt.php?usuario_rol=$usuarioSeguir'");?>><img  src="./img/qr.png" alt="x" height="17" width="20"/> Guardar txt QR</a>
	          </li>
			  <li class=" estilo-color">
	              <a href= <?php echo ("'./guardarVistaEventuales.php?usuario_rol=$usuarioSeguir'");?>><img  src="./img/upload1.png" alt="x" height="17" width="20"/> Guardar Documentos <center><b><i>(QR)</i></b></center></a>
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
	          <li class=" estilo-color">
	              <a class="nav-link" href=  "../LoginMenu/vista/cerrarsesion.php" ><img src="./img/iclogout.png" alt="x" height="17" width="17"/> Cerrar Sesión</a>
	          </li>
	          </li>
	          <li class=" estilo-color">
             
	          </li>

	        </ul>

	      </div>
    	</nav>

		 <?php 
			
		}
		 ?>

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
      	<center>
      		<br>
      		<br>
      		<br>
      		<br>
      		<br>
      		
      			<h1 class="estilo-colorg" > Bienvenido </h1>

      	</center>		
		
		<div class="formulario_fomope">

		
			<br><br>
			
			
<script src="js/bootstrap.min.js"></script>
   	<script src="js/main.js"></script>
			

	</body>
</html>