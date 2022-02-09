<html>
	
	<head>
		<meta charset="utf-8">
		<title>SS-FOMOPE Iniciar Sesión</title>
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


		<script language="javascript" type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.min.js"></script>
   		<script src= "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

		<script src="js/funciones.js"></script>
		<script src="js/validar_RFC_CURP.js"></script>


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
			input{
				width:100%;
				padding:10px;
				box-sizing:border-box;
				background:none;
				outline:none;
				resize:none;
				border:0;
				font-family:'Montserrat',sans-serif;
				transition:all .3s;
				border-bottom:2px solid #bebed2
			}

			input:focus{border-bottom:2px solid #78788c}

			.div_porPartes{
				width:740px;
				height:540px;
				background:#e6e6e6;
				border-radius:8px;
				box-shadow:0 0 40px -10px #000;
				margin:calc(50vh - 220px) auto;
				padding:20px 30px;
				max-width:calc(100vw - 40px);
				box-sizing:border-box;
				font-family:'Montserrat',sans-serif;
				position:relative
			}

			.div_porPartes2{
				width:740px;
				height:220px;
				background:#FFFFFF;
				border-radius:8px;
				box-shadow:0 0 40px -10px #000;
				margin:calc(50vh - 220px) auto;
				padding:20px 30px;
				max-width:calc(100vw - 40px);
				box-sizing:border-box;
				font-family:'Montserrat',sans-serif;
				position:relative
			}

			h1 {
			color:  #cfae5d ;
			font-size: 32px;
			font-weight: 700;
			letter-spacing: 7px;
			text-align: center;
			text-transform: uppercase;
			}

		  .modal-header, h4, .close {
		    background-color: #5cb85c;
		    color:white !important;
		    text-align: center;
		    font-size: 30px;
		  }
		  .modal-footer {
		    background-color: #f9f9f9;
		  }

		   tbody {
		      display:block;
		      max-height:500px;
		      overflow-y:auto;
		  }
		  thead, tbody tr {
		      display:table;
		      width:180%;
		      table-layout:fixed;
		  }
		  thead {
		      width: calc( 100% - 1em )
		  } 
		  </style>



		<script type="text/javascript">
			

			$(document).ready(function(){
				$(document).on('keydown', '.unexp', function(){
					aparecer_btn(); // verificamos que el motivo y el status existan ; si = mostramos boton 
					var id = this.id;
					var splitid = id.split('_');
					var indice = splitid[1];
					$('#'+id).autocomplete({
						source: function(request, response){
							$.ajax({
								url: "../../roles/resultados_ur.php",
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
								url: '../../roles/resultados_ur.php',
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
				$(document).on('keydown', '.unexp2', function(){
					aparecer_btn(); // verificamos que el motivo y el status existan ; si = mostramos boton 
					var id = this.id;
					var splitid = id.split('_');
					var indice = splitid[1];
					$('#'+id).autocomplete({
						source: function(request, response){
							$.ajax({
								url: "../../roles/resultados_ur.php",
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
								url: '../../roles/resultados_ur.php',
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
					aparecer_btn(); // verificamos que el motivo y el status existan ; si = mostramos boton 
					var id = this.id;
					var splitid = id.split('_');
					var indice = splitid[1];
					$('#'+id).autocomplete({
						source: function(request, response){
							$.ajax({
								url: "../../roles/resultados_rfc.php",
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
								url: '../../roles/resultados_rfc.php',
								type: 'post',
								data: {
									buscarid:buscarid,request:2

								},
								success: function(data){
									console.log(data);
									var infEmpleado = eval(data);
									//document.getElementById("rfc").value = infEmpleado[1] ;
									// document.getElementById("curp").value = infEmpleado[0].curp ;
									document.getElementById("apellido1").value = infEmpleado[0].apellido1 ;
									document.getElementById("apellido2").value = infEmpleado[0].apellido2 ;
									document.getElementById("nombre").value = infEmpleado[0].nombre ;
								}
							});
							return false;
						}
					});
				});
			});

//***************************aparecer el boton si el llenado del formulario es completo
			$(document).ready(function(){
				$(document).on('keydown', '.rfcL', function(){
					var btn_env = document.getElementById('enviardatos');
					var movimiento = $("#mot_m").val();
					var status = $("#status").val();

					if(movimiento != "" && status != "" ){
						btn_env.style.display = 'inline';
					}
				});
			});

			function aparecer_btn() {
				var btn_env = document.getElementById('enviardatos');
				var movimiento = $("#mot_m").val();
				var status = $("#status").val();

				if(movimiento != "" && status != "" ){
				    btn_env.style.display = 'inline';
				}
			}
//************************************************ */

			function enviarDatos(){
				var formulario = document.captura1;
				formulario.action= './Controller/agregarNewRegistro.php';
				document.getElementById("botonAccion").value = "Aceptar";

				    var a = $("#unexp_1").val();
				    var b = $("#rfcL_1").val();
				    var c = $("#curp").val();
				    var d = $("#apellido1").val();
				    var e = $("#apellido2").val();
				    var f = $("#nombre").val();
				    var g = $("#fechaIngreso").val();
				    //var h = $("#TipoEntregaArchivo").val();
				    var i = $("#del2").val();

				     if (b !== '') {
					      var tamRFC = b.length;
					 	if (tamRFC<13){
					    	alert("RFC no valido");
					    }
					 }
					 if (c !== '') {
					      var tamCURP = c.length;
					 	if (tamCURP<18){
					    	alert("CURP no valido");
					    }

					 }
				     var tamCURP = c.length;

				      if (a=="" || tamRFC<13 || tamCURP<18 || d==""|| e==""|| f==""|| g==""|| $('input:radio[name=TipoEntregaArchivo]:checked').val() =="Ninguno" || i=="" ) {
				        alert("Falta completar campo");		
				        return false;
				      } else 
				      	formulario.submit();
		 }
		
			function eliminarRequier(){
					 $('#comentarioR').removeAttr("required");

			}

			function rechazarDoc(){
				var formulario = document.captura1;
				
				document.getElementById("botonAccion").value = "Rechazar";

				    var a = $("#unexp_1").val();
				    var b = $("#rfcL_1").val();
				    var c = $("#curp").val();
				    var d = $("#apellido1").val();
				    var e = $("#apellido2").val();
				    var f = $("#nombre").val();
				    var g = $("#fechaIngreso").val();
				    var h = $("#comentarioR").val();
				    $('#nameArchivo').removeAttr("required");

				    //var h = $("#TipoEntregaArchivo").val();
				    

				      if (a=="" || b=="" || c==""|| d==""|| e==""|| f==""|| g=="" || h=="") {
					        alert("Falta completar campo");		
					        return false;
				      } else{
				      	$('#rechazarT').hide();
			      		$('#enviarT').hide();
			      		var btn_2 = document.getElementById('bandejaEntrada');
			            	btn_2.style.display = 'inline';
			      		formulario.action= './Controller/agregarNewRegistro.php';
				      	formulario.submit();}
			}

			function listaDeDoc(text, listaEnviar){
				document.getElementById("listaDoc").value = text;
				document.getElementById("guardarDoc").value = listaEnviar;
			}

				
		</script>
<script src="js/funciones.js"></script>
		
	</head>
	<body onload="nobackbutton();">
    	
		<?php 
			include "librerias/configuracion.php";
			$usuarioSeguir =  $_GET['usuario_rol'];
			$banderaid = "x"; //bandera que si cambia de x es porque existe un id_movimiento y el registro ya esta en la BD

			$sqlNombre = "SELECT nombrePersonal FROM usuarios WHERE usuario = '$usuarioSeguir'";
			$result = mysqli_query($conexion,$sqlNombre);
			$nombreU = mysqli_fetch_row($result);

			$consultaR = " SELECT * FROM usuarios WHERE usuario = '$usuarioSeguir'";

		        if($resultado3 = mysqli_query($conexion,$consultaR)){
	        		$row = mysqli_fetch_assoc($resultado3);
					$id_rol1 = $row['id_rol'];
			}
?>
		

    	<br><br><br><br>

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
	            <a href= <?php echo ("'./menuPrincipal.php?usuario_rol=$usuarioSeguir'");?> ><img src="./img/iclogin.png" alt="x" height="17" width="17"/><?php echo (" $nombreU[0]"); ?></span></a>
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
	           </li>
	          <li class=" estilo-color">
	              <a href= <?php echo ("'./guardarVista.php?usuario_rol=$usuarioSeguir'");?>><img  src="./img/upload1.png" alt="x" height="17" width="20"/> Guardar Documentos</a>
	          </li>
	          <br>
	           
			        <center>
			          <li class=" estilo-color">
		             		<H3> <FONT COLOR=#9f2241 class= 'estilo-colorn'> <?php  echo $rowQna[1];?> </FONT> </H3>	
			          </li>

			           
			           <li class=" estilo-color">
		             	<FONT SIZE=4 COLOR=9f2241 class= 'estilo-colorg'> <I><?php  echo $rowQna[2];?></I> -- <I><?php  echo $rowQna[3];?></I>  </FONT>

			          </li>
				</center>
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

		<center>
			
		<div class="col-md-8 col-md-offset-8">
				<!-- <form name="captura2" action="./Controller/agregarNewRegistro.php" method="POST">  -->
		<form enctype="multipart/form-data" id="formDatos" name="captura1" action="../controller/validar_mov.php" method="POST">
			<div class ="div_porPartes">
				<h1>&bull; Unidad a CANCELAR &bull;</h1>
				 		<div class="form-row">
							<input type="text" class="form-control" id="userName" name="userName" value="<?php echo $usuarioSeguir ?>" style="display:none">
							<input type="text" class="form-control" id="botonAccion" name="botonAccion" value="<?php if(isset($_POST["botonAccion"])){ echo $_POST["botonAccion"];} ?>" style="display:none">
							<input type="text" class="form-control" id="qnaActual" name="qnaActual" value="<?php  echo  $newQna?>" style="display:none">
							<input type="text" class="form-control" id="guardarDoc" name="guardarDoc" value="<?php if(isset($_POST["guardarDoc"])){ echo $_POST["guardarDoc"];} ?>" style="display:none">
						</div> 
						<div class="form-row">
							<div class="col">
								<div class="md-form mt-0" >
									<label class="plantilla-label estilo-colorg" for="fol">*FOLIO SHCP (SCPSP):</label>
									<input onkeypress="return pulsar(event)" type="text" class="" id="folio_shcp" name="folio_shcp" placeholder="MOV-20**-**-***-*" value="<?php if(isset($_POST["folio_shcp"])){ echo $_POST["folio_shcp"];} ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" maxlength="17" required>
								</div>
							</div>

							<div class="col">
						      <div class="md-form mt-0">
						       <label class="plantilla-label estilo-colorg" for="status" >*STATUS: </label>
									<select class="form-select border border-dark custom-select" name="status" id="status">
														<?php
														if (!$conexion->set_charset("utf8")) {//asignamos la codificación comprobando que no falle
															die("Error cargando el conjunto de caracteres utf8");
														}

														$consulta = "SELECT * FROM ct_status_m2";
														$resultado = mysqli_query($conexion , $consulta);
														$contador=0;

														while($status_all = mysqli_fetch_assoc($resultado)){ 
															$contador++;
														?>
															<option value="<?php echo $status_all["descripcion_status"]; ?>"><?php echo $status_all["descripcion_status"]; ?></option>
														<?php 
															// $analista = $misdatos["nombrePersonal"];
															$status = $status_all["descripcion_status"];
														}?>          
									</select>
						      </div>
						    </div>

						    <div class="col">
						      <div class="md-form mt-0">
						        <label class="plantilla-label estilo-colorg" for="mm">MOTIVO DEL MOVIMIENTO: </label>
								<select class="form-select border border-dark custom-select" name="mot_m" id="mot_m">
														<?php
														if (!$conexion->set_charset("utf8")) {//asignamos la codificación comprobando que no falle
															die("Error cargando el conjunto de caracteres utf8");
														}

														$consulta = "SELECT * FROM ct_motivo_mov_m2";
														$resultado = mysqli_query($conexion , $consulta);
														$contador=0;

														while($status_all = mysqli_fetch_assoc($resultado)){ 
															$contador++;
														?>
															<option value="<?php echo $status_all["descripcion _mm"]; ?>"><?php echo $status_all["descripcion _mm"]; ?></option>
														<?php 
															// $analista = $misdatos["nombrePersonal"];
															$status = $status_all["descripcion _mm"];
														}?>          
									</select>
						      </div>
						    </div>
						</div>
						<br>
				  		<div class="form-row">
				  			<div class="col">
						      <div class="md-form mt-0">
					  			<label class="plantilla-label estilo-colorg" for="cod_F">*COD. FEDERAL DEL PUESTO: </label>
						        <input type="text" class="" id="cod_f" name="cod_f" placeholder="**-***-******" value="<?php if(isset($_POST["cod_f"])){ echo $_POST["cod_f"];} ?>" maxlength="13" required>
						      </div>
						    </div>
												
						    <div class="col">
						      <div class="md-form mt-0">
								  <label class="plantilla-label estilo-colorg" for="ramo">*RAMO: </label>
						        <input type="text" class="" id="ramo1" name="ramo1" placeholder="RAMO" value="<?php if(isset($_POST["ramo1"])){ echo $_POST["ramo1"];} ?>" maxlength="2" required>
						      </div>
						    </div>

						    <div class="col">
						      <div class="md-form mt-0">
								  <label class="plantilla-label estilo-colorg" for="ramo">*UR: </label>
									<input onkeypress="return pulsar(event)" type="text" class="unexp" id="unexp_1" name="unexp_1" placeholder="Ej. 513" maxlength="3" required>
						      </div>
						    </div>
						</div>
						<br>
				  		<div class="form-row">
				  			<div class="col">
						      <div class="md-form mt-0">
					  			<label class="plantilla-label estilo-colorg" for="zona">ZONA: </label>
						        <input type="text" class="" id="zona1" name="zona1" placeholder="zona" value="<?php if(isset($_POST["zona1"])){ echo $_POST["zona1"];} ?>" maxlength="1" required>
						      </div>
						    </div>
												
						    <div class="col">
						      <div class="md-form mt-0">
								  <label class="plantilla-label estilo-colorg" for="ramo">*NIVEL </label>
						        <input type="text" class="" id="nivel1" name="nivel1" placeholder="NIVEL" value="<?php if(isset($_POST["nivel1"])){ echo $_POST["nivel1"];} ?>" maxlength="3" required>
						      </div>
						    </div>

						    <div class="col">
						      <div class="md-form mt-0">
								  <label class="plantilla-label estilo-colorg" for="ramo">*CODIGO: </label>
									<input onkeypress="return pulsar(event)" type="text" class="" id="codigo1" name="codigo1" placeholder="******" maxlength="6" required>
						      </div>
						    </div>

							<div class="col">
						      <div class="md-form mt-0">
								  <label class="plantilla-label estilo-colorg" for="ramo">PLAZAS: </label>
									<input onkeypress="return pulsar(event)" type="text" class="" id="plazas" name="plazas" placeholder="" maxlength="1" required>
						      </div>
						    </div>
						</div>	
				</div>
			</div>
<div class="col-md-8 col-md-offset-8">
	<div class ="div_porPartes">
			<h1>&bull; Unidad a AGREGAR &bull;</h1>
						<div class="form-row">
						    <div class="col">
						      <div class="md-form mt-0">
								  <label class="plantilla-label estilo-colorg" for="ramo">*RAMO: </label>
						        <input type="text" class="" id="ramo2" name="ramo2" placeholder="RAMO" value="<?php if(isset($_POST["ramo2"])){ echo $_POST["ramo2"];} ?>" maxlength="2" required>
						      </div>
						    </div>

						    <div class="col">
						      <div class="md-form mt-0">
								  <label class="plantilla-label estilo-colorg" for="UR">*UR: </label>
									<input onkeypress="return pulsar(event)" type="text" class="unexp2" id="unexp2_1" name="unexp2_1" placeholder="Ej. 513" maxlength="3" required>
						      </div>
						    </div>
							<div class="col">
						      <div class="md-form mt-0">
					  			<label class="plantilla-label estilo-colorg" for="zona">ZONA: </label>
						        <input type="text" class="" id="zona2" name="zona2" placeholder="zona" value="<?php if(isset($_POST["zona2"])){ echo $_POST["zona2"];} ?>" maxlength="1" required>
						      </div>
						    </div>

							<div class="col">
						      <div class="md-form mt-0">
								  <label class="plantilla-label estilo-colorg" for="nivel2">*NIVEL </label>
						        <input type="text" class="" id="nivel2" name="nivel2" placeholder="NIVEL" value="<?php if(isset($_POST["nivel2"])){ echo $_POST["nivel2"];} ?>" maxlength="3" required>
						      </div>
						    </div>
						</div>
						<br>
				  		<div class="form-row">
						    <div class="col">
						      <div class="md-form mt-0">
								  <label class="plantilla-label estilo-colorg" for="cod">*CODIGO: </label>
									<input onkeypress="return pulsar(event)" type="text" class="" id="codigo2" name="codigo2" placeholder="******" maxlength="6" required>
						      </div>
						    </div>

							<div class="col">
						      <div class="md-form mt-0">
								  <label class="plantilla-label estilo-colorg" for="ramo">PLAZAS: </label>
									<input onkeypress="return pulsar(event)" type="text" class="" id="plazas2" name="plazas2" placeholder="" maxlength="1" required>
						      </div>
						    </div>

							<div class="col">
						      <div class="md-form mt-0">
					  			<label class="plantilla-label estilo-colorg" for="cod_F">*COD. FEDERAL DEL PUESTO: </label>
						        <input type="text" class="" id="cod_f2" name="cod_f2" placeholder="**-***-******" value="<?php if(isset($_POST["cod_f2"])){ echo $_POST["cod_f2"];} ?>" maxlength="13" required>
						      </div>
						    </div>
						</div>	
						<br>
						<div class="form-row">
							<div class="col">
						      <div class="md-form mt-0">
						       <label class="plantilla-label estilo-colorg" for="rfcL_1">RFC: </label>
						    	<input type="text" class="rfcL" id="rfcL_1" name="rfcL_1" placeholder="RFC" value="<?php if(isset($_POST["rfcL_1"])){ echo $_POST["rfcL_1"];} ?>"  onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Ingresa rfc" maxlength="13"  required>
						      </div>
						    </div>

							<div class="col">
						      <div class="md-form mt-0">
								  <label class="plantilla-label estilo-colorg" for="apll1">APELLIDO P. : </label>
						        <input type="text" class="" id="apellido1" name="apellido1" placeholder="Ap. Paterno" value="<?php if(isset($_POST["apellido1"])){ echo $_POST["apellido1"];} ?>" maxlength="30"required>
						      </div>
						    </div>

						    <div class="col">
						      <div class="md-form mt-0">
								  <label class="plantilla-label estilo-colorg" for="apll2">APELLIDO M. : </label>
						        <input type="text" class="" id="apellido2" name="apellido2" placeholder="Ap. Materno" value="<?php if(isset($_POST["apellido2"])){ echo $_POST["apellido2"];} ?>" maxlength="30"required>
						      </div>
						    </div>

						    <div class="col">
						      <div class="md-form mt-0">
								<label class="plantilla-label estilo-colorg" for="name">NOMBRE: </label>
						        <input type="text" class="" id="nombre" name="nombre" placeholder="Nombre" maxlength="40" value="<?php if(isset($_POST["nombre"])){ echo $_POST["nombre"].$valor;} ?>" required>
						      </div>
						    </div>
						</div>
						<div class="form-row">
							<div class="col">
							</div>
							
							<div class="col">
								<div class="md-form mt-2">
									<label class="plantilla-label estilo-colorg" for="fechaV">*FECHA VIGENCIA: </label>
									<input type="date" class="" id="fechaV" name="fechaV" value="<?php if(isset($_POST["fechaV"])){ echo $_POST["fechaV"];} ?>" required>
								</div>
							</div>
							<div class="col">
							</div>
					    </div>
						<br>
						
					
				</div>

			<div class="">
				<div class ="div_porPartes2">
					<div class="form-row">
						<div class="col">
							<div class="md-form mt-0">
								<label class="plantilla-label estilo-colorg" for="autoriza">NOMBRE AUTORIZA: </label>
								<input type="text" class="" id="nombreA" name="nombreA" placeholder="Nombre Completo" maxlength="100" value="<?php if(isset($_POST["nombreA"])){ echo $_POST["nombreA"].$valor;} ?>" >
							</div>
						</div>

						<div class="col">
							<div class="md-form mt-0">
								<label class="plantilla-label estilo-colorg" for="obs">OBSERVACION: </label>
								<textarea class="form-control border border-dark" name="obs" value="<?php if(isset($_POST["obs"])){ echo $_POST["obs"].$valor;} ?>" rows="3"></textarea>
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="col">
							<div class="md-form mt-0">
								<label class="plantilla-label estilo-colorg" for="oficio_s">OFICIO DE SOLICITUD: </label>
								<input type="text" class="" id="oficio_s" name="oficio_s" placeholder="oficio solicitud" maxlength="100" value="<?php if(isset($_POST["oficio_s"])){ echo $_POST["oficio_s"].$valor;} ?>" >
							</div>
						</div>
						<div class="col">
							<div class="md-form mt-0">
								<label class="plantilla-label estilo-colorg" for="oficio_r">OFICIO DE RESPUESTA: </label>
								<input type="text" class="" id="oficio_r" name="oficio_r" placeholder="ofico de respuesta" maxlength="100" value="<?php if(isset($_POST["oficio_r"])){ echo $_POST["oficio_r"].$valor;} ?>" >
							</div>
						</div>
					</div>

				</div>
			</div>
					
	</div>
</div>
				<div class="col-md-8 col-md-offset-8">
						<div class="form-row">
							<input type="text" class="form-control" id="userName" name="userName" value="<?php echo $usuarioSeguir ?>" style="display:none">
							<input class="btn btn-success" type="submit" name="enviardatos" id="enviardatos" style="display:none;" value = "Enviar datos">
						</div>
				</div>

			</form>

		</center>
        <!-- Page Content  -->
	<script src="js/bootstrap.min.js"></script>
   	<script src="js/main.js"></script>

</body>
</html>