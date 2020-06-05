<html>
	
	<head>
		<meta charset="utf-8">
		<title>Correos UR</title>
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

			<?php 
					include "Controller/configuracion.php";
					$usuarioSeguir =  $_GET['usuario_rol'];
					$idMovSeg = $_GET['id_mov'];

					
			?>

		<script type="text/javascript">

						$(document).ready(function(){
				$(document).on('keydown', '.unexp', function(){
					var id = this.id;
					var splitid = id.split('_');
					var indice = splitid[1];
					$('#'+id).autocomplete({
						source: function(request, response){
							$.ajax({
								url: "resultados_correos.php",
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
								url: "resultados_correos.php",
								type: 'post',
								data: {
									buscarid:buscarid,request:2

								},
								success: function(data){
									
									var infEmpleado = eval(data);
									//document.getElementById("rfc").value = infEmpleado[1] ;
									document.getElementById("ur").value = infEmpleado[0] ;
									document.getElementById("correoAd1").value = infEmpleado[1] ;
									document.getElementById("correoAd2").value = infEmpleado[2] ;
									document.getElementById("cc1").value = infEmpleado[3] ;
									document.getElementById("cc2").value = infEmpleado[4] ;
									document.getElementById("cc3").value = infEmpleado[5] ;
									document.getElementById("cc4").value = infEmpleado[6] ;
									document.getElementById("cc5").value = infEmpleado[7] ;


								}
							});
							return false;
						}
					});
				});
			});


		/*	
$(document).ready(function(){
				$(document).on('keydown', '.unexpc', function(){
					var id = this.id;
					var splitid = id.split('_');
					var indice = splitid[1];
					$('#'+id).autocomplete({
						source: function(request, response){
							$.ajax({
								url: "resulrados_correos.php",
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
								url: 'resulrados_correos.php',
								type: 'post',
								data: {
									buscarid:buscarid,request:2

								},
								success: function(data){
									console.log(data);
									var infEmpleado = eval(data);
									//document.getElementById("rfc").value = infEmpleado[1] ;
									document.getElementById("correoAd1").value = infEmpleado[1] ;
									document.getElementById("correoAd2").value = infEmpleado[2] ;
									document.getElementById("cc1").value = infEmpleado[3] ;
									document.getElementById("cc2").value = infEmpleado[4] ;
									document.getElementById("cc3").value = infEmpleado[5] ;
									document.getElementById("cc4").value = infEmpleado[6] ;
									document.getElementById("cc5").value = infEmpleado[7] ;

								}
							});
							return false;
						}
					});
				});
			});
*/

		</script>


	</head>
	<body>
		<?php 
			include "Controller/configuracion.php";
			$usuarioSeguir =  $_GET['usuario_rol'];
			

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
	            <a href= <?php if($id_rol1 == 3){echo ("'./CapturistaTostado.php?usuario_rol=$usuarioSeguir'"); } elseif ($id_rol1 == 2) {
	            	
	            echo ("'./analista.php?usuario_rol=$usuarioSeguir'"); }?> ><img src="./img/2_ic.png" alt="x" height="17" width="20"/>      Bandeja</a>
	          </li>
	          <li class=" estilo-color">
	              <a  href= <?php echo ("'./consultaEstado.php?usuario_rol=$usuarioSeguir'");?> ><img src="./img/ic-consulta.png" alt="x" height="17" width="17"/> Consulta</a>
	          </li>
	          <li class=" estilo-color">
	            <a href=  <?php echo ("'./generarReporte.php?usuario_rol=$usuarioSeguir'"); ?> ><img src="./img/icreport.png" alt="x" height="17" width="20"/>Generar Reporte</a>
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
	          <li class=" estilo-color">
             
	          </li>

	        </ul>
	         <br><br><br>
			        

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

      	<center>
      		
      			<div class="col-md-8 col-md-offset-8">
      				
					 <form enctype="multipart/form-data" id="formDatos" name="captura1" action="./Controller/actualizarCorreosUR.php" method="POST"> 

				 		<div class="form-row">
							<input type="text" class="form-control" id="usuarioSeguir" name="usuarioSeguir" value="<?php echo $usuarioSeguir ?>" style="display:none">
						</div>
						<div class="form-row">
							<input type="text" class="form-control" id="idFom" name="idFom" value="<?php echo $idMovSeg ?>" style="display:none">
							<input type="text" class="form-control" id="botonAccion" name="botonAccion" value="<?php if(isset($_POST["botonAccion"])){ echo $_POST["botonAccion"];} ?>" style="display:none">
							<input type="text" class="form-control" id="qnaActual" name="qnaActual" value="<?php  echo  $rowQna[0]?>" style="display:none">
							<input type="text" class="form-control" id="guardarDoc" name="guardarDoc" value="<?php if(isset($_POST["guardarDoc"])){ echo $_POST["guardarDoc"];} ?>" style="display:none">	
						</div>

						<div class="form-row">
							<div class="form-group col-md-12" >
								<label class="plantilla-label estilo-colorg" for="unexp_1">Unidad:</label>
								<input onkeypress="return pulsar(event)" type="text" class="form-control unexp border border-dark" id="unexp_1" name="unexp_1" placeholder="Ej. 111" value= "<?php if(isset($_POST["unexp_1"])){ echo $_POST["unexp_1"];} ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
							</div>
						</div>

						
							
							<div class="form-row">
							<div class="form-group col-md-12" >
						       <label class="plantilla-label estilo-colorg" for="correoAd1" >Correo 1 Administrativo:</label>
						    	<input type="Email" class="form-control rfcL border border-dark" id="correoAd1" name="correoAd1" onkeyup="javascript:this.value=this.value.toLowerCase();"  placeholder="Ingresa el correo" maxlength="40" value="<?php if(isset($_POST["correoAd1"])){ echo $_POST["correoAd1"];} ?>" required>
						      </div>
						    </div>
						    <div class="form-row">
							<div class="form-group col-md-12" >
						       
						    	<input type="text" class="form-control rfcL border border-dark" id="ur" name="ur" onkeyup="javascript:this.value=this.value.toLowerCase();"  placeholder="Ingresa el correo" maxlength="40" value="<?php if(isset($_POST["ur"])){ echo $_POST["ur"];} ?>" style="display:none" required>
						      </div>
						    </div>
						    <div class="form-row">
							<div class="form-group col-md-12" >
						       <label class="plantilla-label estilo-colorg" for="correoAd2" >Correo 2 Administrativo:</label>
						    	<input type="Email" class="form-control rfcL border border-dark" id="correoAd2" name="correoAd2" onkeyup="javascript:this.value=this.value.toLowerCase();" placeholder="Ingresa el correo" maxlength="40" value= "<?php if(isset($_POST["correoAd2"])){ echo $_POST["correoAd2"];} ?>" required>
						      </div>
						    </div>
						    <div class="form-row">
							<div class="form-group col-md-12" >
						       <label class="plantilla-label estilo-colorg" for="cc1" >cc1: </label>
						    	<input type="Email" class="form-control rfcL border border-dark" id="cc1" name="cc1" onkeyup="javascript:this.value=this.value.toLowerCase();"  placeholder="Ingresa el correo" maxlength="40" value= "<?php if(isset($_POST["cc1"])){ echo $_POST["cc1"];} ?>" >
						      </div>
						    </div>
						    <div class="form-row">
							<div class="form-group col-md-12" >
						       <label class="plantilla-label estilo-colorg" for="cc2" >cc2: </label>
						    	<input type="Email" class="form-control rfcL border border-dark" id="cc2" name="cc2" onkeyup="javascript:this.value=this.value.toLowerCase();"  placeholder="Ingresa el correo" maxlength="40" value= "<?php if(isset($_POST["cc2"])){ echo $_POST["cc2"];} ?>" >
						      </div>
						    </div>
						    <div class="form-row">
							<div class="form-group col-md-12" >
						       <label class="plantilla-label estilo-colorg" for="cc3" >cc3: </label>
						    	<input type="Email" class="form-control rfcL border border-dark" id="cc3" name="cc3" onkeyup="javascript:this.value=this.value.toLowerCase();"  placeholder="Ingresa el correo" maxlength="40" value= "<?php if(isset($_POST["cc3"])){ echo $_POST["cc3"];} ?>" >
						      </div>
						    </div>
						   <div class="form-row">
							<div class="form-group col-md-12" >
						       <label class="plantilla-label estilo-colorg" for="cc4" >cc4: </label>
						    	<input type="Email" class="form-control rfcL border border-dark" id="cc4" name="cc4" onkeyup="javascript:this.value=this.value.toLowerCase();"  placeholder="Ingresa el correo" maxlength="40" value= "<?php if(isset($_POST["cc4"])){ echo $_POST["cc4"];} ?>" >
						      </div>
						    </div>
						    <div class="form-row">
							<div class="form-group col-md-12" >
						       <label class="plantilla-label estilo-colorg" for="cc5" >cc5: </label>
						    	<input type="Email" class="form-control rfcL border border-dark" id="cc5" name="cc5" onkeyup="javascript:this.value=this.value.toLowerCase();"  placeholder="Ingresa el correo" maxlength="40" value= "<?php if(isset($_POST["cc5"])){ echo $_POST["cc5"];} ?>" >
						      </div>
						    </div>
							
						
						<br>
				  		
				</div>
				
					<div class="col-md-8 col-md-offset-8">
						 <div class="form-row">

						  	

						   <!-- <label  class="plantilla-label" for="arch">Nombre del archivo: </label> -->
						  	<div class="col">
						  		<div class="md-form md-0">
									


						  		<!-- <div class="md-form md-0">
									<input type="text" class="form-control unexp border border-dark" id="archA" name="archA" placeholder="Ingresa el nombre del archivo" maxlength="35" required >
								</div> -->
							</div>
						</div>	
						<div class="col">
						  	
						</div>	


					</div>	
								
			

  			<br>  			<br>  	
		

 						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
											 Actualizar información 
											</button>
							  			<br>

											
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
											        ¿Estas seguro de agregar esta información?
											      </div>
									<center>
						    
										</center>
											      <div class="modal-footer">

											        <button type="button" class="btn btn-secondary" data-dismiss="modal">Regresar</button>
							        				<input type="submit" class="btn btn-primary" value="Aceptar" onclick="" name="botonAccion">
											      </div>
											    </div>
											  </div>
											</div>

					</form>  
					<br>
					<br>
					  
      	</center>
	

					<script src="js/bootstrap.min.js"></script>
   	<script src="js/main.js"></script>

				</div>
		
	</body>

		
</html>

