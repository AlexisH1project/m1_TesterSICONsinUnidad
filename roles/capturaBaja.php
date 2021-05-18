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
	  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

		<script language="javascript" type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.min.js"></script>
   		<script src= "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

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
									document.getElementById("curp").value = infEmpleado[0].curp ;
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
		

// ****************************************************** form_fomope
			$(document).ready(function(){
				$(document).on('keydown', '.cod2', function(){
					var id = this.id;
					var splitid = id.split('_');
					var indice = splitid[1];
					$('#'+id).autocomplete({
						source: function(request, response){
							$.ajax({
								url: "resultados_cmov.php",
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
								url: 'resultados_cmov.php',
								type: 'post',
								data: {
									buscarid:buscarid,request:2
								},
								dataType: 'json',
								success:function(response){
									var len = response.length;
									if(len > 0){
										var idmov = response[0]['idmov'];
										var cod2 = response[0]['cod2'];
										var nomb_mov = response[0]['nomb_mov'];
										document.getElementById('cod2_'+indice).value = cod2;
										document.getElementById('nomb_mov_'+indice).value = nomb_mov;
									}
								}
							});
							return false;
						}
					});
				});
			});


		$(document).ready(function(){
				$(document).on('keydown', '.cod4', function(){
					var id = this.id;
					var splitid = id.split('_');
					var indice = splitid[1];
					$('#'+id).autocomplete({
						source: function(request, response){
							$.ajax({
								url: "resultados_cmov.php",
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
								url: 'resultados_cmov.php',
								type: 'post',
								data: {
									buscarid:buscarid,request:2
								},
								dataType: 'json',
								success:function(response){
									var len = response.length;
									if(len > 0){
										var idmov = response[0]['idmov'];
										var cod2 = response[0]['cod4'];
										var nomb_mov = response[0]['nomb_mov'];
										document.getElementById('cod4_'+indice).value = cod2;
										document.getElementById('nomb_mov_'+indice).value = nomb_mov;
									}
								}
							});
							return false;
						}
					});
				});
			});


			$(document).ready(function(){
				$(document).on('keydown', '.cod3', function(){
					var id = this.id;
					var splitid = id.split('_');
					var indice = splitid[1];
					$('#'+id).autocomplete({
						source: function(request, response){
							$.ajax({
								url: "resultados_estado.php",
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
								url: 'resultados_estado.php',
								type: 'post',
								data: {
									buscarid:buscarid,request:2
								},
								dataType: 'json',
								success:function(response){
									var len = response.length;
									if(len > 0){
										var idmov = response[0]['idEstado'];
										var cod3 = response[0]['cod3'];
										var nomb_edo = response[0]['nomb_edo'];
										document.getElementById('cod3_'+indice).value = cod3;
										document.getElementById('nomb_edo_'+indice).value = nomb_edo;
									}
								}
							});
							return false;
						}
					});
				});
			});

			function irAbandeja() {
				var formulario = document.captura1;
				var id_mov = $("#usuarioSeguir").val();
				formulario.action = './bandejaBajas.php?usuario_rol='+id_mov;
				formulario.submit();
			}

			function eliminarRequier(){
					$("#MotivoRechazoCap").removeAttr("required");
			      	$('#rechazoInicial').hide();
			      	$('#enviarReg').hide();
			}

			function eliminarRequier2(){
					$("#MotivoRechazoCap").removeAttr("required");
					$("#nameArchivo").removeAttr("required");
					$('#rechazoInicial').hide();
			      	$('#guardarAdj').hide();
					var btn_2 = document.getElementById('bandejaEntrada');
			        btn_2.style.display = 'inline';
			}

			function listaDeDoc(text, listaEnviar){
				document.getElementById("listaDoc").value = text;
				document.getElementById("guardarDoc").value = listaEnviar;
			}

			function rechazarPorCapI(){
					var formulario = document.captura1;
				    // $("#fechareci").removeAttr("required");
				    $("#codigo").removeAttr("required");
				    //  $("#cod2_1").removeAttr("required");
				    //  $("#del2").removeAttr("required");
					 $('#nameArchivo').removeAttr("required");
					 $('#guardarAdj').hide();

					var btn_2 = document.getElementById('bandejaEntrada');
			        btn_2.style.display = 'inline';

				    var a = $("#fechareci").val();
				    var b = $("#unexp_1").val();
				    var c = $("nombre").val();
				    var d = $("#apellido1").val();
				    var e = $("#apellido2").val();
				    var f = $("#cod2_1").val();
					var g =	$("#MotivoRechazoCap").val();


					 if (a=="" || b=="" || c==""|| d==""|| e==""|| f=="" || g == "") {
						 alert("Falta completar algún campo como: *Nombre Completo, *Fecha de recibido, *Código de movimiento, *Motivo de rechazo.");		
						return false;
					} else{
						// $('#guardarAdj').hide();
						formulario.action = './Controller/generarRechazo.php';
				      	formulario.submit();
					}
			}

			function nobackbutton(){
			   window.location.hash="no-back-button";
			   window.location.hash="Again-No-back-button" //chrome
			   window.onhashchange=function(){window.location.hash="no-back-button";}
			}
	
		</script>
<script src="js/funciones.js"></script>
		
	</head>
	<body onload="nobackbutton();">
    	
		<?php 
			include "Controller/configuracion.php";
			$usuarioSeguir =  $_GET['usuario_rol'];
			$banderaid = "x"; //bandera que si cambia de x es porque existe un id_movimiento y el registro ya esta en la BD

					if(isset($_POST["listaDoc"])){ 
						$listaMostrar = $_POST["listaDoc"];
					}else{
						$listaMostrar = "";
					}

			$sqlNombre = "SELECT nombrePersonal FROM usuarios WHERE usuario = '$usuarioSeguir'";
			$result = mysqli_query($conexion,$sqlNombre);
			$nombreU = mysqli_fetch_row($result);
			
			$consultaR = " SELECT * FROM usuarios WHERE usuario = '$usuarioSeguir'";
		        if($resultado3 = mysqli_query($conexion,$consultaR)){
	        		$row = mysqli_fetch_assoc($resultado3);
					$id_rol1 = $row['id_rol'];
				}
			$sql = "SELECT id_mov, cod_mov, tipo_mov, area_mov FROM ct_movimientosrh";

			$valor = "";
			$hoy = "select CURDATE()";
			$tiempo ="select curTime()";
			$diaActual = "";

			 if ($resultHoy = mysqli_query($conexion,$hoy) AND $resultTime = mysqli_query($conexion,$tiempo)) {
			 		$rowF = mysqli_fetch_row($resultHoy);  // cambiamos formato de hora 
			 		$fechaSistema = date("d-m-Y", strtotime($rowF[0])); //"14-04-2020";
			 		$elDia = explode("-", $fechaSistema);
			 		$rowHora = mysqli_fetch_row($resultTime);

					$diaActual=date("w", strtotime($fechaSistema));
					
			 }

			 $sqlQna = "SELECT * FROM m1ct_fechasnomina WHERE estadoActual = 'abierta'";

			 if($resQna = mysqli_query($conexion,$sqlQna)){
			 	$rowQna = mysqli_fetch_row($resQna);
			 	$fehaI = date("d-m-Y", strtotime($rowQna[4])); 
			 	$fehaF = date("d-m-Y", strtotime($rowQna[5])); 
			 	$newQna = $rowQna[0];
			 }else{
			 
			 	echo "error sql";
			 }

			 if( strtotime($fehaF) < strtotime($fechaSistema)){
			 		if($rowQna[0] != 24){
			 			$newQna = $rowQna[0] + 1;
			 		}else {
			 			$newQna = 1;
			 		}
			 		$sqlCerrar = "UPDATE m1ct_fechasnomina SET estadoActual = 'cerrada' WHERE id_qna = '$rowQna[0]'";
			 		$sqlAbrir = "UPDATE m1ct_fechasnomina SET estadoActual = 'abierta' WHERE id_qna = '$newQna'";
			 		
			 		if($resC = mysqli_query($conexion,$sqlCerrar) && $resA = mysqli_query($conexion, $sqlAbrir) ){

			 		}else{
			 			echo "error con la conexion a la BD";
			 		}

			 }else{


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
	            <a href=  <?php echo ("'./bandejaBajas.php?usuario_rol=$usuarioSeguir'"); ?> ><img src="./img/2_ic.png" alt="x" height="17" width="20"/>Bandeja</a>
	          </li>
	          <li class=" estilo-color">
	              <a href= <?php echo ("'./consultaEstado.php?usuario_rol=$usuarioSeguir'");?>><img src="./img/ic-consulta.png" alt="x" height="17" width="17"/>Consulta</a>
	          </li>
	           </li>
	           <li class=" estilo-color">
	              <a href= <?php echo ("'./guardarVistaBajas.php?usuario_rol=$usuarioSeguir'");?>><img  src="./img/upload1.png" alt="x" height="17" width="20"/> Guardar Documentos <center><b><i>(Bajas)</i></b></center></a>
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



		 <div id="content" class="p-4 p-md-5 pt-5">

		 	<?php

 		if($diaActual != 0 && $diaActual != 6 ){    //&& (strtotime($fechaSistema) >=  strtotime($fehaI) &&  strtotime($fechaSistema) <=  strtotime($fehaF))

				 		// echo $fehaF;
				 		// echo $fechaSistema . " ";
				 		// echo $diaActual . " ";
				 		//$qnaEnviar = $rowQna[0];
			 

		 ?>	
		<center>
			
<div class="col-md-8 col-md-offset-8">
				<!-- <form name="captura2" action="./Controller/agregarNewRegistro.php" method="POST">  -->
<!-- <form method="post" name="ffomope" action="">  -->
<form  enctype="multipart/form-data" id="formDatos" name="captura1" action="" method="POST"> 
				 		<div class="form-row">
							<input type="text" class="form-control" id="userName" name="userName" value="<?php echo $usuarioSeguir ?>" style="display:none">
							<input type="text" class="form-control" id="qnaActual" name="qnaActual" value="<?php  echo  $newQna?>" style="display:none">
							<input type="text" class="form-control" id="guardarDoc" name="guardarDoc" value="<?php if(isset($_POST["guardarDoc"])){ echo $_POST["guardarDoc"];} ?>" style="display:none">
						</div> 
						<div class="form-row">
							<div class="form-group col-md-12" >
								<label class="plantilla-label estilo-colorg" for="unexp_1">Unidad:</label>
								<input onkeypress="return pulsar(event)" type="text" class="form-control unexp border border-dark" id="unexp_1" name="unexp_1" placeholder="Ej. 513" value="<?php if(isset($_POST["unexp_1"])){ echo $_POST["unexp_1"];} ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
							</div>
						</div>

						<div class="form-row">
							<div class="col">
						      <div class="md-form mt-0">
						       <label class="plantilla-label estilo-colorg" for="rfcL_1" >RFC: </label>
						    	<input type="text"  type="text" class="form-control rfcL border border-dark" id="rfcL_1" name="rfcL_1" placeholder="RFC" value="<?php if(isset($_POST["rfcL_1"])){ echo $_POST["rfcL_1"];} ?>"  onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Ingresa rfc" maxlength="13"  required>
						      </div>
						    </div>

						    <div class="col">
						      <div class="md-form mt-0">
						        <label class="plantilla-label estilo-colorg" for="CURP">CURP: </label>
						   		 <input type="text" class="form-control border border-dark" id="curp" name="curp" placeholder="Ingresa CURP" value="<?php if(isset($_POST["curp"])){ echo $_POST["curp"];} ?>" maxlength="18"  required>
						      </div>
						    </div>
						</div>
						<br>
				  		<div class="form-group col-md-12" >	
				  			<label class="plantilla-label estilo-colorg" for="nombreT">NOMBRE COMPLETO: </label>
						</div>

				  		<div class="form-row">
				  			
						      <input type="text" style="display:none;" class="form-control border border-dark" id="listaDoc" name="listaDoc" placeholder="Apellido Paterno" value="<?php if(isset($_POST["listaDoc"])){ echo $_POST["listaDoc"];} ?>" >

				  			<div class="col">
						      <div class="md-form mt-0">
						        <input type="text" class="form-control border border-dark" id="apellido1" name="apellido1" placeholder="Apellido Paterno" value="<?php if(isset($_POST["apellido1"])){ echo $_POST["apellido1"];} ?>" maxlength="30"required>
						      </div>
						    </div>

						    <div class="col">
						      <div class="md-form mt-0">
						        <input type="text" class="form-control border border-dark" id="apellido2" name="apellido2" placeholder="Apellido Materno" value="<?php if(isset($_POST["apellido2"])){ echo $_POST["apellido2"];} ?>" maxlength="30"required>
						      </div>
						    </div>

						    <div class="col">
						      <div class="md-form mt-0">
						        <input type="text" class="form-control border border-dark" id="nombre" name="nombre" placeholder="Nombre" maxlength="40" value="<?php if(isset($_POST["nombre"])){ echo $_POST["nombre"].$valor;} ?>" required>
						      </div>
						    </div>
						</div>
				</div>
				<div class="col-md-4 col-md-offset-4">

				  		<div class="form-group col-md-8" >
					  		<label class="plantilla-label estilo-colorg" for="fechaIngreso"> FECHA DE RECIBIDO: </label>
						    <input type="date" class="form-control border border-dark" id="fechaIngreso" name="fechaIngreso" placeholder="Ingresa Fecha del ingreso" value="<?php if(isset($_POST["fechaIngreso"])){ echo $_POST["fechaIngreso"];} ?>" required>
						    
				  		</div>
				  	<div class="form-row">
					<div class="form-group col-md-6">
							<div class="text-center">
								<label class="plantilla-label estilo-colorg" for="del2">*Del:</label>
							</div>
							    <input type="date" class="form-control border border-dark" id="del2" name="del2" placeholder="Del" value="<?php if(isset($_POST["del2"])){ echo $_POST["del2"];} ?>" required>

				        	</small> 
						</div>
						<div class="form-group col-md-6">
							<div class="text-center">
								<label class="plantilla-label estilo-colorg" for="al3">al:</label>
							</div>
						<input  type="date" class="form-control border border-dark" id="al3" name="al3" value="<?php if(isset($_POST["al3"])){ echo $_POST["al3"];} ?>" placeholder="al" requiered> <!--required-->
						</div>
					</div>
				</div>
					<div class="col-md-9">
						<div class="form-row">
					
							
							<div class="form-group col-md-2">
								<label  class="plantilla-label" for="laQna">*QNA: </label>
									<select class="form-control border border-dark custom-select" id="qnaOption" name="qnaOption" required>
											<?php 
												if(isset($_POST["qnaOption"])){
											?>
												<option  value="<?php echo $_POST["qnaOption"]; ?>" selected><?php echo $_POST["qnaOption"]; ?> </option>
											<?php
												}else{
											?>
											<option  value="<?php echo $newQna ?>" ><?php echo $newQna ?> </option>
											<option  value="<?php echo $newQna+1 ?>" ><?php echo $newQna+1 ?> </option>
											<option  value="<?php echo $newQna-1 ?>" ><?php echo $newQna-1 ?> </option>
											<?php
												}
											?>   
									</select>
							</div>

							<div class="form-group col-md-2">
								<label  class="plantilla-label" for="elAnio">AÑO: </label>
									 <input type="text" class="form-control" id="anio" name="anio" value="<?php echo $elDia[2]?>" readonly >
							<div class="form-row">
							<input type="text" class="form-control" id="noFomope" name="noFomope" value="<?php echo $noFomope?>" style="display:none">
						</div>
						<div class="form-row">
							<input type="text" class="form-control" id="id_rol" name="id_rol" value="<?php echo $id_rol?>" style="display:none">
						</div>
						<div class="form-row">
							<input type="text" class="form-control" id="usuarioSeguir" name="usuario_rol" value="<?php echo $usuarioSeguir?>" style="display:none">
						</div>
						<br>
					</div>
				</div>

				<div class="form-row">
						<div class="form-group col-md-5">
								<label class="plantilla-label" for="ofunid">*Oficio unidad:</label>
								<input onkeypress="return pulsar(event)" type="text" class="form-control border border-dark" id="ofunid" name="ofunid" placeholder="Ej. OAG-CA-3735-2020" value="<?php if(isset($_POST["ofunid"])){ echo $_POST["ofunid"]; } ?>" maxlength="80" onkeyup="javascript:this.value=this.value.toUpperCase();" >
							</div>
					<div class="form-group col-md-6">
						<label class="plantilla-label" for="fechaofi">*Fecha de oficio:</label>
						<input type="date" class="form-control border border-dark" id="fechaofi" name="fechaofi" placeholder="Fecha Oficio" value="<?php if(isset($_POST["fechaofi"])){ echo $_POST["fechaofi"]; } ?>">
						<small name= "alertFechaIngreso" id= "alertFechaIngreso" class="text-danger">
				        </small>  
					</div>
				</div>

						<div class="form-row">
					<div class="form-group col-md-4">
						<label class="plantilla-label" for="codigo">*Código:</label><div class="container">
							 <input onkeypress="return pulsar(event)" type="text" class="form-control border border-dark" id="codigo" name="codigo" placeholder="Ej. 123" value="<?php if(isset($_POST["codigo"])){echo $_POST["codigo"];} ?>" maxlength="9" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
						<small name= "alertFechaIngreso" id= "alertFechaIngreso" class="text-danger">
				        </small>  
							</div>
					</div>
					<div class="form-group col-md-2">
						<label class="plantilla-label" for="NO">No. de puesto:</label>
						<input onkeypress="return pulsar(event)" type="text" class="form-control border border-dark" id="num_pues" name="num_pues" placeholder="Ej. 0001" value="<?php if(isset($_POST["num_pues"])){ echo $_POST["num_pues"];} ?>" maxlength="5" onkeyup="javascript:this.value=this.value.toUpperCase();">
					</div>
				</div>

				<div class="form-row">
					<div class="form-group col-md-4">
						<label class="plantilla-label" for="NO">Clave presupuestaria:</label>
						<input onkeypress="return pulsar(event)" type="text" class="form-control border border-dark" id="clavepres" name="clavepres" placeholder="Ej. 0001" value=" <?php if(isset($_POST["clavepres"])){echo $_POST["clavepres"];} ?>" maxlength="35" onkeyup="javascript:this.value=this.value.toUpperCase();">
					</div>
					<div class="form-group col-md-8">
						<label class="plantilla-label" for="codmov">*Código de movimiento:</label>
						<input onkeypress="return pulsar(event)" type="text" class="form-control cod2 border border-dark" id="cod2_1" name="cod2_1" placeholder="Ej. 4550" value="<?php if(isset($_POST["cod2_1"])){ echo $_POST["cod2_1"]; } ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
					</div>
				</div>
					<div class="form-row">
						<div class="form-group col-mt-8">
						<label class="plantilla-label" for="estad">*Estado:</label>
						<input onkeypress="return pulsar(event)" type="text" class="form-control cod3 border border-dark" id="cod3_1" name="cod3_1" placeholder="Ej. Ciudad de México" value="Ciudad de México" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
					</div>

					<div class="form-group col-mt-8">
						<label class="plantilla-label" for="consema">*Consecutivo maestro de puestos:</label>
						<input onkeypress="return pulsar(event)" type="text" class="form-control colon border border-dark" id="consema" name="consema" placeholder="Ej. 170" value="<?php if(isset($_POST["consema"])){echo $_POST["consema"];} ?>" maxlength="5" onkeyup="javascript:this.value=this.value.toUpperCase();" >
					</div>
					<div class="col-md-4">
					</div>
				</div>

					<div class="form-group col-md-6">
						<label class="plantilla-label" for="observ">*Observaciones:</label>
						<input onkeypress="return pulsar(event)" type="text" class="form-control colon border border-dark" id="observ" name="observ" placeholder="Ej. 11-01-19 LA DIRECTORA GENERAL INDICA QUE SE REQUIERE OFICIO DE AUTORIZACION CON JUSTIFICACION PARA OCUPACION." value="<?php if(isset($_POST["observ"])){ echo $_POST["observ"]; } ?>" maxlength="150" onkeyup="javascript:this.value=this.value.toUpperCase();" >
					</div>
				 <div class="form-row">
							 	<div class="col">

												<select class="form-control border border-dark mdb-select md-form" name="documentoSelct">
											
													<?php
													if (!$conexion->set_charset("utf8")) {//asignamos la codificación comprobando que no falle
													       die("Error cargando el conjunto de caracteres utf8");
													}

													$consulta = "SELECT * FROM m1ct_documentos";
													$resultado = mysqli_query($conexion , $consulta);
													$contador=0;

													while($listDoc = mysqli_fetch_assoc($resultado)){ $contador++;?>
													<option value="<?php echo $listDoc["nombre_documento"]; ?>"><?php echo $listDoc["nombre_documento"]; ?></option>
													<?php }?>          
													</select>
									

						  		<!-- <div class="md-form md-0">
									<input type="text" class="form-control unexp border border-dark" id="archA" name="archA" placeholder="Ingresa el nombre del archivo" maxlength="35" required >
								</div> -->
				
						</div>		
					</div>		
				</div>
						<br>

				<div class="col-md-8 col-md-offset-8">
						 <div class="form-row">

						  	<div class="col">
						  		<div class="md-form md-0">
								    <!-- <label  class="plantilla-label" for="archivo_1">Adjuntar un archivos</label> -->
								    <!--  <input type="hidden" name="MAX_FILE_SIZE" value="30000" /> -->
								    <input type="file" id="nameArchivo" name="nameArchivo">
								   <!--  <p class="help-block">Ejemplo de texto de ayuda.</p> -->
								</div>
							</div>
							<br>			<br>						<br>
						   <!-- <label  class="plantilla-label" for="arch">Nombre del archivo: </label> -->
						 
						
					</div>	
					</div>
				<div class="col-md-8 col-md-offset-8">

					<div class="col">
						  	<div class="md-form md-0">
								<input type="submit" id="guardarAdj" name="guardarAdj" onclick="eliminarRequier()" class="btn btn-outline-info tamanio-button" value="Guardar Documento"><br>
							</div>	
							<div class="md-form md-0">
								<input type="submit" class="btn btn-primary" id="bandejaEntrada" name="accionB" onclick="irAbandeja()" style="display: none;" value="bandeja principal">
								<br>
							<br>
							</div>	
						<?php 
						if(isset($_POST["unexp_1"])){
						?>
						<!-- no imprimimos el boton de Rechazo	 -->
						<div class="md-form md-0">
							<input type="submit" class="btn btn-primary" id="bandejaEntrada" name="accionB" onclick="irAbandeja()" value="bandeja principal">
							<br><br>
						</div>	
						<?php 
						}else{
						?>
						<div class="form-group col-md-60">
								<button type="button" name="rechazoInicial" id="rechazoInicial" class="btn btn-danger" data-toggle="modal" data-target="#RechInicial">Rechazar</button>
						</div>
						<?php 
						}
						?>
					</div>	
				</div>	
				<div class="col-md-8 col-md-offset-8">

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
						$banderaBoton=0; //admin2

							if(isset($_POST['guardarAdj'])){

									$usuarioEdito = $_POST['userName'];
									$unidadAdd = $_POST['unexp_1'];
									$rfcAdd = strtoupper($_POST['rfcL_1']);
									$curpAdd = strtoupper($_POST['curp']);	
									$apellido1Add = strtoupper($_POST['apellido1']);	
									$apellido2Add = strtoupper($_POST['apellido2']);	
									$nombreAdd = strtoupper($_POST['nombre']);
									$fechaIngresoAdd = $_POST['fechaIngreso'];
									$motivoR = $_POST['comentarioR'];
									$fechaDel = $_POST['del2'];
									$fechaAl = $_POST['al3'];
									$leerMov = $_POST['id_env'];
									$nombreArch = $_POST['documentoSelct'];
									$listaCompleta = $_POST['listaDoc'];
									$concatenarNombDoc = $_POST['guardarDoc'];
									// $usuarioSegimiento = $_POST['usuarioSeguir'];
									// $noFomope = $_POST['noFomope'];
									// $usuario_rol = $_POST['id_rol'];
									// $usuario = $_POST['usuarioSeguir'];
									$idFomope = $_POST['noFomope'];
									$elRol = $_POST['id_rol'];
									
									$qna_Add =$_POST['qnaOption'];
									$anio_Add =$_POST['anio'];
									$of_unidad =$_POST['ofunid'];
									$fecha_oficio =$_POST['fechaofi'];
									$codigo =$_POST['codigo'];
									$no_puesto =$_POST['num_pues'];
									$clave_presupuestaria =$_POST['clavepres'];
									
									//$codigo_movimiento =$_POST['cod2_1'];
									//$concepto =$_POST['concept'];//descripción del movimiento		 
									$movimientoYcodigo = $_POST['cod2_1'];
									$nombreCompletoMov = explode("_", $_POST['cod2_1']);
									$codigo_movimiento = $nombreCompletoMov[0];
									$concepto = $nombreCompletoMov[1];
								
									$estado_en =$_POST['cod3_1'];
									$consecutivo_maestro_impuestos =$_POST['consema'];
									$observaciones =$_POST['observ'];
									// $fecha_recibido_spc =$_POST['fecharecspc'];
									// $fecha_envio_spc =$_POST['fechenvvb'];
									// $fecha_recibo_dspo =$_POST['fechenvvb'];
									// $folio_spc = $_POST['foliospc'];
										//----------------Sacamos la Hora 
									$hoy = "select CURDATE()";
									$tiempo ="select curTime()";

										 if ($resultHoy = mysqli_query($conexion,$hoy) AND $resultTime = mysqli_query($conexion,$tiempo)) {
										 		$row = mysqli_fetch_row($resultHoy);
										 		$row2 = mysqli_fetch_row($resultTime);
										 }
										 $hora = str_replace ( ":", '',$row2[0] ); 
										 $fecha = str_replace ( "-", '',$row[0] ); 

									$datosDobles = "SELECT id_movimiento FROM fomope WHERE unidad = '$unidadAdd' AND rfc = '$rfcAdd' AND apellido_1 = '$apellido1Add' AND apellido_2 = '$apellido2Add' AND nombre = '$nombreAdd' AND curp ='$curpAdd' AND fechaIngreso = '$fechaIngresoAdd' AND vigenciaDel = '$fechaDel' AND vigenciaAl = '$fechaAl' ORDER BY id_movimiento DESC";


									if($datasub2 = mysqli_query($conexion,$datosDobles)){
                                   		$extid =mysqli_fetch_row($datasub2);
								    	$res1Check = mysqli_num_rows($datasub2);
								    	if ($res1Check == NULL){
								    		$res1Check = 0;
								    	}else{
								    		$res1Check = 1;
								    		$banderaid = $extid[0];
								    	}                                 		
                                   		//	echo $banderaid;
                                   	}	

                                   	if ($leerMov == "x") { //$res1Check<1
                                   	
                                   		$newsql = "INSERT INTO fomope (color_estado,usuario_name,unidad,rfc,curp,apellido_1,apellido_2,nombre,fechaIngreso,tipoEntrega,tipoDeAccion,justificacionRechazo,quincenaAplicada,anio,oficioUnidad,fechaOficio,fechaRecibido,codigo,n_puesto,clavePresupuestaria,codigoMovimiento,descripcionMovimiento,vigenciaDel,vigenciaAl,entidad,consecutivoMaestroPuestos,puestos,observaciones,fechaEnviadaRubricaDspo,fechaEnviadaRubricaDipsp,fechaEnviadaRubricaDgrho,fechaRecepcionSpc,fechaEnvioSpc,fechaReciboDspo,folioSpc,fechaCapturaNomina,fechaEntregaArchivo,fechaEntregaRLaborales,OfEntregaRLaborales,fomopeDigital,fechaEntregaUnidad,OfEntregaUnidad,analistaCap,fechaCaptura ) VALUES ('guinda','$usuarioEdito','$unidadAdd','$rfcAdd','$curpAdd','$apellido1Add','$apellido2Add','$nombreAdd','$fechaIngresoAdd','', 'AMBOS','$motivoR','$qna_Add','$anio_Add','$of_unidad','','$fechaIngresoAdd','$codigo','$no_puesto','$clave_presupuestaria','$codigo_movimiento','$concepto','$fechaDel','$fechaAl','$estado_en','$consecutivo_maestro_impuestos','','$observaciones','','','','','','','','','','','','','','','BAJAS','$row[0] - $usuarioEdito')";

                                   		if($datasub = mysqli_query($conexion,$newsql)){
                                   			if($datasub2 = mysqli_query($conexion,$datosDobles)){
		                                   		$extid =mysqli_fetch_row($datasub2);
										    	$res1Check = mysqli_num_rows($datasub2);
		                                   		$banderaid = $extid[0];
		                                   		//	echo $banderaid;
		                                   	}	
                                   		}		
                                   	}else{
                                   		$sql1 = "UPDATE fomope SET unidad = '$unidadAdd' , rfc = '$rfcAdd',curp = '$curpAdd',apellido_1 = '$apellido1Add',apellido_2 = '$apellido2Add',nombre = '$nombreAdd', oficioUnidad='$of_unidad',codigo='$codigo',n_puesto='$no_puesto',clavePresupuestaria='$clave_presupuestaria',codigoMovimiento='$codigo_movimiento',descripcionMovimiento='$concepto',vigenciaDel='$fechaDel',vigenciaAl='$fechaAl',entidad='$estado_en',consecutivoMaestroPuestos='$consecutivo_maestro_impuestos',observaciones='$observaciones', fechaCaptura = '$row[0] - $usuario' WHERE id_movimiento = '$idFomope' " ;
                                   	}
						
		//******************************************* */    agregamos los datos personales del empleado si no existe registro de el 
										$sql3 = "SELECT rfc FROM ct_empleados WHERE rfc = '$rfcAdd'";
										if ($resulta = mysqli_query($conexion,$sql3)) {

											if($ves=mysqli_fetch_row($resulta)){
										
											}else {
												$sql4 = "INSERT INTO ct_empleados (rfc, curp, apellido_1, apellido_2, nombre) VALUES ('$rfcAdd', '$curpAdd', '$apellido1Add', '$apellido2Add', '$nombreAdd')";
												if (mysqli_query($conexion,$sql4)) {

												}
											}

										}


									$nombreCompletoArch = $nombreArch."_".$listaCompleta;
									// consultamos para saber el id y el nombre corto del nombre 
									$sqlRolDoc = "SELECT id_doc, documentos FROM m1ct_documentos WHERE nombre_documento = '$nombreArch'";
									$resRol=mysqli_query($conexion, $sqlRolDoc);
									$idDoc = mysqli_fetch_row($resRol);
									$banderaBoton=1;

									$enviarDoc = $idDoc[1].'_'.$concatenarNombDoc;

									$dir_subida = './Controller/DOCUMENTOS_BAJAS/'.$idDoc[1].'/';
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
											     $nameAdj=strtoupper($idDoc[1]);
											    
											    
											}

											$fichero_subido = $dir_subida . basename($_FILES['nameArchivo']['name']);
											$extencion2 = explode(".",$fichero_subido);
											$tamnio = count($extencion2);

											$extencion3 = $extencion2[$tamnio-1];

											if (move_uploaded_file($_FILES['nameArchivo']['tmp_name'], $fichero_subido)) {
												sleep(3);
												$concatenarNombreC = $dir_subida.strtoupper($curpAdd."_".$idDoc[1]."_".$apellido1Add."_".$apellido2Add."_".$nombreAdd."_X_".$banderaid."_.".$extencion3);
												rename ($fichero_subido,$concatenarNombreC);
												
													$arrayDoc = explode("_", $nombreCompletoArch);
												 	$tamanioList = count($arrayDoc);
													
												 
											echo "
													<script>
															listaDeDoc( '$nombreCompletoArch', '$enviarDoc');
													</script >";
											$arrayNumDoc = explode("_", $enviarDoc);		
											$numeroDeDocs = count($arrayNumDoc);

											$queryHistorial = "INSERT INTO historial (id_movimiento, usuario, fechaMovimiento, horaMovimiento, accion, documento) VALUES ('$banderaid', '$usuarioSeguir', '$row[0]', '$row2[0]', 'up docBI', '$idDoc[1]')";
											$resultH = mysqli_query($conexion,$queryHistorial);
												/*	echo '
													<br>	<br>		<br>
													<center>
													<div class="col-md-8 col-md-offset-8">
														<ul class="list-group">';
															for($i=0; $i<=$tamanioList-1; $i++){
																if($arrayDoc[$i] == ""){
																	
																}else{
																	echo "
																	<li class='list-group-item'>$arrayDoc[$i]</li>
																	";	
																}
															}
												echo '
														</ul>
													</div>	
													</center>
												';*/
																									   	
											} else{
											    echo "<script> alert('Existe un error al guardar el archivo'); ";
											}
							}
						?>	
<input type="text" style="display: none;" name="id_env" id="id_enviar" value="<?php echo $banderaid?>">
<!-- ***************************************************************************************** -->	
	<table class="table table-striped table-bordered" style="margin-bottom: 0">
					<?php 
							include "configuracion.php";
							$existenD =0;
////////////// inicia la busqueda del archivo en carpeta 
					$dir_subida = './Controller/documentos/';
					// Arreglo con todos los nombres de los archivos
					
					$sqlReg =  "SELECT COUNT(*) id_doc FROM m1ct_documentos";
										$resTotalReg = mysqli_query($conexion,$sqlReg);
										$rowTotal = mysqli_fetch_row($resTotalReg);
					for ($i = 0; $i < $rowTotal[0] ; $i++){
						$sqlNombreDoc2 = "SELECT * FROM m1ct_documentos WHERE id_doc = '$i'";
										$resNombreDoc2 = mysqli_query($conexion,$sqlNombreDoc2);
										$rowNombreDoc2 = mysqli_fetch_row($resNombreDoc2);
							$imprime = 0;
						
						if($imprime == 0){
								echo "
												<tr>
												<td>$rowNombreDoc2[1]</td>
												<td>";
					    		//$contDoc++;

						?>

						<?php	

								if($banderaBoton == 1){
										for ($j=0; $j < $numeroDeDocs ; $j++) { 	
											
									 		if($rowNombreDoc2[2] == $arrayNumDoc[$j] ){  //strtolower($documentoPC[$j])::: strtolower hacemos muscualas porque recibe de la pc mayusculas y en la base es "doc"
									 				
									
						?>
												<button class="btn btn-success" > ✔ </button>
												</td>
														
						<?php
												break;
											}else if($j == $numeroDeDocs-1){
						?>
												<button class="btn btn-danger" > X </button>
												</td>
						<?php						
											}
										}
									}else{

						?>
												<button class="btn btn-danger" > X </button>
												</td>

						<?php
									}
							}
						}
						 ?>

					

					</table>

<!-- ***************************************************************************************** -->	
 				</div>	
				<br>
				<div class="modal fade" id="RechInicial" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title" id="exampleModalLabel">Rechazo por captura</h5>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <div class="modal-body">
							         <textarea class="form-control border border-dark" id="MotivoRechazoCap" rows = "4" name="comentarioR" placeholder="Redactar el volante de rechazo" required></textarea>
							       
							      <div class="modal-footer">
							        <button type="button" class="btn btn-secondary" data-dismiss="modal">REGRESAR</button>
									<input type="submit" class="btn btn-primary" id="rechI" onclick="rechazarPorCapI()" name="guardarAdj" value="Aceptar rechazo por captura">
							      </div>
							     
							    </div>
							  </div>
							</div>
			</form>

		</center>
        <!-- Page Content  -->
 <?php
	 }else{	
			 			echo("
    	
												<br>
												<br>
											<div class='col-sm-12'>
											<div class='plantilla-inputv text-dark ''>
											    <div class='card-body'><h2 align='center'>Por el momento no esta disponible la captura.</h2></div>
										</div>
										</div>");
				 }
			}

		?>
							
	<script src="js/bootstrap.min.js"></script>
   	<script src="js/main.js"></script>

</body>
</html>