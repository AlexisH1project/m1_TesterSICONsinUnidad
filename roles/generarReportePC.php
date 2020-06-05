
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

			$(document).ready(function(){
				$(document).on('keydown', '.rfcL', function(){
					var id = this.id;
					var splitid = id.split('_');
					var indice = splitid[1];
					$('#'+id).autocomplete({
						source: function(request, response){
							$.ajax({
								url: "resultados_rfc.php",
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
							console.log(buscarid);
							//alert(buscarid);
							$.ajax({
								url: 'resultados_rfc.php',
								type: 'post',
								data: {
									buscarid:buscarid,request:2

								},
								success: function(data){
									console.log(data);
									var infEmpleado = eval(data);
									//document.getElementById("rfc").value = infEmpleado[1] ;
									document.getElementById("curp").value = infEmpleado[2] ;
									document.getElementById("apellido1").value = infEmpleado[3] ;
									document.getElementById("apellido2").value = infEmpleado[4] ;
									document.getElementById("nombre").value = infEmpleado[5] ;


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
	            <a href= <?php if($id_rol1 == 0){echo ("'./luluConsulta.php?usuario_rol=$usuarioSeguir'"); }elseif ($id_rol1 == 3) {
	            	
	            echo ("'./capturistaTostado.php?usuario_rol=$usuarioSeguir'"); }elseif ($id_rol1 == 4) {
	            	
	            echo ("'./dario.php?usuario_rol=$usuarioSeguir'"); }elseif ($id_rol1 == 2) {
	            	
	            echo ("'./analista.php?usuario_rol=$usuarioSeguir'"); } elseif ($id_rol1 == 1) {
	            	
	            echo ("'./lulu.php?usuario_rol=$usuarioSeguir'"); }?> ><img src="./img/2_ic.png" alt="x" height="17" width="20"/>      Bandeja</a>
	          </li>
	        	<?php if($id_rol1 == 3) {


	            	
	           ?>
	       <?php }else{

	        		
	            	
	           ?>
	            <li class=" estilo-color">
	            <a href=  <?php echo ("'./FiltroDescargar.php?usuario_rol=$usuarioSeguir'"); ?> ><img src="./img/icreport2.png" alt="x" height="17" width="20"/>      Descarga de Documentos</a>
	          </li>
	          
	            <li class=" estilo-color">
	            <a href=  <?php echo ("'./generarReporte.php?usuario_rol=$usuarioSeguir'"); ?> ><img src="./img/icreport.png" alt="x" height="17" width="20"/>Generar Reporte</a>
	          </li>
	          
	           <?php 
	        }
	           ?>

	          <li class=" estilo-color">
	              <a  href= <?php echo ("'./consultaEstado.php?usuario_rol=$usuarioSeguir'");?> ><img src="./img/ic-consulta.png" alt="x" height="17" width="17"/> Consulta</a>
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
					<br>
		    <br>
		    <br>

				<div class="plantilla-inputv text-center">

					<div class="form-row">
						<div class="col">
							<div class="form-group col-md-12">
								<div class="md-form mt-0">
						       <label class="plantilla-label estilo-colorg" for="rfcL_1" >RFC: </label>
						    	<input type="text"  type="text" class="form-control rfcL border border-dark" id="rfcL_1" name="rfcL_1" placeholder="RFC" value="<?php if(isset($_POST["rfcL_1"])){ echo $_POST["rfcL_1"];} ?>"  onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Ingresa rfc" maxlength="13"  required>
						      </div>
									
							</div>
						</div>

						<div class="col">

							
							<div class="form-group col-md-12" >
								<label class="plantilla-label estilo-colorg" for="unexp_1">Unidad:</label>
								<input onkeypress="return pulsar(event)" type="text" class="form-control unexp border border-dark" id="unexp_1" name="unexp_1" placeholder="Ej. 513" value="<?php if(isset($_POST["unexp_1"])){ echo $_POST["unexp_1"];} ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
							</div>
						
						</div>

								<input type="input" class="form-control border-dark" id="nombreUsuario" name="nombreUsuario" value="<?php echo "$usuarioSeguir" ?>" style="display:none">
			
						<div class="col">
							<div class="form-group col-md-12">
								<label class="plantilla-label estilo-colorg" for="idProf">ID Profesional Carrera:</label>
								<input type="text" class="form-control border border-dark" id="idProf" name="idProf" placeholder="id Profesional de Carrera">
							</div>
						</div>		
					</div>
			
				<div class="col-sm-12">
					<div class="form-row">

					<div class="form-group col-md-12">
						<div class="col text-center">
							<input type="submit" name="impReporte" class="btn btn btn-danger tamanio-button plantilla-input text-white bord" value="Buscar"><br>

						</div>
					</div>

					</div>
				</div>
		</div>
	
			</form>
</center>	

			<br>
		<br>
		<br>
		
<div class="col-sm-12">
				
					<div class="card bg-secondary text-white">
						    <div class="card-body"><h2>Consulta</h2></div>
					</div>
	<table class="table table-hover table-white">
						<thead>
						    <tr>
							<!-- <td>Observacion</td>
							<td>ID Fomope</td> -->
						     <th scope="titulo">RFC</th>
						      <th scope="titulo">Unidad</th>
						      <th scope="titulo">QNA</th>
						      <th scope="titulo">Fecha de Ingreso</th>
						      <th scope="titulo">Codigo Mov.</th>

						   </tr>
					 	 </thead>
		<?php 
						include "configuracion.php";

						if(isset($_POST['impReporte'])){// $_SERVER['REQUEST_METHOD'] == 'POST' if(){
							$unexp_1 = $_POST['unexp_1'];
							$rfcL_1 = $_POST['rfcL_1'];
							$idProf = $_POST['idProf'];
							
						if($rfcL_1 != "" && $unexp_1 != "" && $idProf != ""){

								$sql="SELECT id_movimiento,color_estado,unidad,rfc,unidad,quincenaAplicada,fechaIngreso,codigoMovimiento, idProfesionalCarrera FROM fomope WHERE rfc = '$rfcL_1' AND unidad = '$unexp_1' AND idProfesionalCarrera = '$idProf' ";

							}elseif($rfcL_1 != "" && $unexp_1 != "" && $idProf == ""){

								$sql="SELECT id_movimiento,color_estado,unidad,rfc,unidad,quincenaAplicada,fechaIngreso,codigoMovimiento, idProfesionalCarrera FROM fomope WHERE rfc = '$rfcL_1' AND unidad = '$unexp_1' ";

							}

							if ($result = mysqli_query($conexion,$sql)) {

								$totalFilas    =    mysqli_num_rows($result);  
								if($totalFilas == 0){
										
										echo('
											<br>
											<br>
											<div class="col-sm-12 ">
											<div class="plantilla-inputv text-dark ">
											    <div class="card-body"><h2 align="center">No existe resultados de la busqueda, vuelve intentar.</h2></div>
										</div>
										</div>');
								}else{


									while($ver=mysqli_fetch_row($result)){ 

						 ?>
						<tr>
							<td><?php echo $ver[2] ?></td>
							<td><?php echo $ver[1] ?></td>
							<td><?php echo $ver[2] ?></td>
							<td><?php echo $ver[3] ?></td>
							<td><?php echo $ver[4] ?></td>



							<td>
								
								<?php

											if($ver[8] != "" ){
												
										
								?>	
								<form method="post" action="generarWordProfesionalCarrera/template.php"> 
												<input type="input" class="form-control border-dark" id="unexp_1" name="unexp_1" value="<?php echo "$unexp_1" ?>" style="display:none">
												<input type="input" class="form-control border-dark" id="rfcL_1" name="rfcL_1" value="<?php echo "$rfcL_1" ?>" style="display:none">
												<input type="input" class="form-control border-dark" id="idProf" name="idProf" value="<?php echo "$idProf" ?>" style="display:none">

												<button type="submit" class="btn btn-outline-secondary" id="" >Generar</button>
											</form>

								<?php	
											}else if($ver[8] == ""){
												
								?>
								
							<button type="button" name="genera" id="genera" class="btn btn-primary" data-toggle="modal" data-target="#idProfeCarr" >Ingresar ID </button>


												<form method="post" action="generarWordProfesionalCarrera/template.php"> 
												
												<div class="modal fade" id="idProfeCarr" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
												  <div class="modal-dialog" role="document">
												    <div class="modal-content">
												      <div class="modal-header">
												        <h5 class="modal-title" id="exampleModalLabel">Reporte Profesional de carrera</h5>
												        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
												          <span aria-hidden="true">&times;</span>
												        </button>
												      </div>
												      <div class="modal-body">
												      	<input type="input" class="form-control border-dark" id="unexp_1" name="unexp_1" value="<?php echo "$unexp_1" ?>" style="display:none">
														<input type="input" class="form-control border-dark" id="rfcL_1" name="rfcL_1" value="<?php echo "$rfcL_1" ?>" style="display:none">
														
												         <textarea class="form-control border border-dark" id="idProf" rows = "4" name="idProf" placeholder="id Profesional de carrera" required></textarea>
												      <div class="modal-footer">
												        <button type="button" class="btn btn-secondary" data-dismiss="modal">REGRESAR</button>
														<input type="submit" class="btn btn-primary" id="generar" name="generar" value="Autorizar ID y Descargar Reporte">
												      </div>
												    </div>
												  </div>
												</div>
												</div>
												
											</form>
								<?php	

											}
									}
								
								?>	
															
							</td>
						</tr>
						<?php 
										}
									
								
							}else{
								echo '<script type="text/javascript">alert("Error en la conexion");</script>';
								echo '<script type="text/javascript">alert("error '. mysqli_error($conexion).'");</script>';
							}
						}
						 ?>
		</table>
			<script src="js/bootstrap.min.js"></script>
   	<script src="js/main.js"></script>
			  
	</center>
	</body>

</html>

