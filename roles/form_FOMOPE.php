
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>FOMOPE</title>
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
			
			function pulsar(e) {
  				tecla = (document.all) ? e.keyCode :e.which; 
  				return (tecla!=13); 
			} 

			

		</script>

		
		<script type="text/javascript">

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
			
			
			function verDoc(nombre,laExtencion){
				window.location.href = 'Controller/controllerDescargaPagina2.php?nombreDecarga='+nombre+'&extencion='+laExtencion;

			}

			function eliminarReq(){
					 $('#MotivoRechazo').removeAttr("required");
					  $('#idProfesional').removeAttr("required");
			  		$("#MotivoRechazoCap").removeAttr("required");


			}
			function eliminarReq2(){
					 $('#MotivoRechazo').removeAttr("required");
			  		$("#MotivoRechazoCap").removeAttr("required");


			}

			function rechazarPorCapI(){
					$("#ofunid").removeAttr("required");
				    $("#fechaofi").removeAttr("required");
				    $("#fechareci").removeAttr("required");
				    $("#codigo").removeAttr("required");
				     $("#cod2_1").removeAttr("required");
				     $("#del2").removeAttr("required");
				    //var g = $("#MotivoRechazo").val();
			  		$("#MotivoRechazo").removeAttr("required");
				    //var h = $("#TipoEntregaArchivo").val();
					 $('#idProfesional').removeAttr("required");

					$('#capturaF').hide();
			      		$('#rechazo').hide();
			      		$('#genera').hide();
			      		$('#rechazoInicial').hide();
				      	var btn_2 = document.getElementById('bandejaEntrada');
			            	btn_2.style.display = 'inline';
			}


			function verBoton(){
					var a = $("#ofunid").val();
				    var b = $("#fechaofi").val();
				    var c = $("#fechareci").val();
				    var d = $("#codigo").val();
				    var e = $("#cod2_1").val();
				    var f = $("#del2").val();
				    //$("#MotivoRechazo").val();
			  
				    //var h = $("#TipoEntregaArchivo").val();
					 $('#idProfesional').removeAttr("required");
				    
				    if (a=="" || b=="" || c==""|| d==""|| e==""|| f=="") {
				      		return false;
				      }else{
			  			$("#MotivoRechazoCap").removeAttr("required");
				      	$('#capturaF').hide();
			      		$('#rechazo').hide();
			      		$('#genera').hide();
				      	var btn_2 = document.getElementById('bandejaEntrada');
			            	btn_2.style.display = 'inline';
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

			include "configuracion.php";
			$noFomope = $_GET['noFomope'];
			echo $noFomope;
			$id_rol = $_GET['id_rol'];
			//echo $id_rol;
			$usuarioSeguir = $_GET['usuario'];
			//echo $usuario;

			

			$sqlNombre = "SELECT nombrePersonal FROM usuarios WHERE usuario = '$usuarioSeguir'";
			$result = mysqli_query($conexion,$sqlNombre);
			$nombreU = mysqli_fetch_row($result);

			 $consultaR = " SELECT * FROM usuarios WHERE usuario = '$usuarioSeguir'";

		        if($resultado3 = mysqli_query($conexion,$consultaR)){
	        		$row = mysqli_fetch_assoc($resultado3);
					$id_rol1 = $row['id_rol'];

					
			}
			$sql = "SELECT id_mov, cod_mov, tipo_mov, area_mov FROM ct_movimientosrh";
			$sql2 = "SELECT rfc, apellido_1,apellido_2, nombre, unidad, justificacionRechazo FROM fomope WHERE id_movimiento = '$noFomope'";
			if($result = mysqli_query($conexion,$sql2)){
				$row = mysqli_fetch_row($result);

			}

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
			 	//echo "OOOOOLLAA";
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
	            <a href= <?php if($id_rol1 == 3){echo ("'./CapturistaTostado.php?usuario_rol=$usuarioSeguir'"); } elseif ($id_rol1 == 2) {
	            	
	            echo ("'./analista.php?usuario_rol=$usuarioSeguir'"); }?> ><img src="./img/2_ic.png" alt="x" height="17" width="20"/>      Bandeja</a>
	          </li>
	          <li class=" estilo-color">
	              <a href= <?php echo ("'./consultaEstado.php?usuario_rol=$usuarioSeguir'");?> ><img src="./img/ic-consulta.png" alt="x" height="17" width="17"/> Consulta</a>
	          </li>
	          
	          <br>
	          </li>
	        
	            <br><br><br>
			        <center>
			          <li class=" estilo-color">
		             		<H3> <FONT COLOR=#9f2241 class= 'estilo-colorn'> <?php  echo $rowQna[1];?> </FONT> </H3>	
			          </li>

			           
			           <li class=" estilo-color">
		             	<FONT SIZE=4 COLOR=9f2241 class= 'estilo-colorg'> <I><?php  echo $rowQna[4];?></I> -- <I><?php  echo $rowQna[5];?></I>  </FONT>

			          </li>
				</center>

	          <br>
	          <br>
	          <br>
	          <br>
	          <br>

	          <li class=" estilo-color">
	              <a class="nav-link" href=  "../LoginMenu/vista/cerrarsesion.php" ><img src="./img/iclogout.png" alt="x" height="17" width="17"/> Cerrar Sesión</a>
	          
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
      	<?php

 		if($diaActual != 0 ){

				 		// echo $fehaF;
				 		// echo $fechaSistema . " ";
				 		// echo $diaActual . " ";
				 		//$qnaEnviar = $rowQna[0];
			 

		 ?>	
		
		<div class="formulario_fomope">


		 	<div class="form-group col-md-4">
						<label class="plantilla-label" for="NombrC">Empleado:</label>
						<input type="text" class="form-control border border-dark" id="rfcC" name="rfcC" value="<?php echo $row[0] ?>" readonly >
						<input type="text" class="form-control border border-dark" id="nameComp" name="nameComp" value="<?php echo $row[1]."   ".$row[2]."   ".$row[3] ?>" readonly >

			</div>
			<div class="form-group col-md-6">
						<label class="plantilla-label" for="NombrU">Unidad:</label>
						<input type="text" class="form-control border border-dark" id="nameComp" name="nameComp" value="<?php echo $row[4] ?>" readonly >
			</div>
			
			<div class="form-group col-md-60">
							<button type="button" name="rechazoInicial" id="rechazoInicial" class="btn btn-danger" data-toggle="modal" data-target="#RechInicial" >Rechazar por captura inicial</button>

			</div>

			<div class="form-group col-md-6">
						<label class="plantilla-label" for="listD">Documentos :</label>
			</div>
				<table class="table table-hover table-white">
					<?php 
							include "configuracion.php";
							$existenD =0;
							$sql="SELECT * from fomope WHERE id_movimiento = '$noFomope' ";
							$documentosPC="";
							// echo $noFomope;
							$result=mysqli_query($conexion,$sql);
							$ver = mysqli_fetch_row($result);

							// 	for($i=47; $i<=117; $i++){
							// 		if($ver[$i] == ""){
										
							// 		}else{
							// 			$existenD ++;
							// 			$sqlNombreDoc = "SELECT nombre_documento FROM m1ct_documentos WHERE documentos = '$ver[$i]'";
							// 			$resNombreDoc = mysqli_query($conexion,$sqlNombreDoc);
							// 			$rowNombreDoc = mysqli_fetch_row($resNombreDoc);
							// 			$nombreAdescargar = $ver[4]."_".$ver[$i]."_".$ver[6]."_".$ver[7]."_".$ver[8]."_.PDF";

////////////// inicia la busqueda del archivo en carpeta 
					$banderaMov = 0;  // si entramos y encontramos doc en la carpeta documentosMov

					////////////// inicia la busqueda del archivo en carpeta 
					$dir_subida = './Controller/DOCUMENTOS/';
					$dir_subidaMov = './Controller/DOCUMENTOS_MOV/';
					$rutaEnviar = './DOCUMENTOS_MOV/';

					// Arreglo con todos los nombres de los archivos
					$files = array_diff(scandir($dir_subida), array('.', '..')); 
					$files2 = array_diff(scandir($dir_subidaMov), array('.', '..')); 
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
							foreach($datosPDF as $file){	
											$data = explode("_",$file);
											$conId = count($data);
										    $data2 = explode(".",$file);
											$indice = count($data2);	

											$extencion = $data2[$indice-1];
										    // Nombre del archivo
										    $extractRfc = $data[0];
										    $extractDoc = $data[1];
									 		if($ver[4] == $extractRfc && $data[6] == $noFomope){
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
										if($conId == 7){
									 				$nombreAdescargar = $data[0]."_".$data[1]."_".$data[2]."_".$data[3]."_".$data[4]."_".$data[5]."_."."$extencion";
									 			}else{
									 				$nombreAdescargar = $data[0]."_".$data[1]."_".$data[2]."_".$data[3]."_".$data[4]."_."."$extencion";
									 			}
										$documentosPC = $documentosPC."_".$data[1];
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

		
			<form method="post" name="ffomope" action="agregar_FOMOPE.php"> 
				<div class="form-row">
						<div class="modal fade" id="exampleModalR" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title" id="exampleModalLabel">Motivo de rechazo</h5>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <div class="modal-body">
							         <textarea class="form-control z-depth-1" id="comentarioR" name="comentarioR" rows="3" placeholder="Escribe el motivo del rechazo..."></textarea>
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-secondary" data-dismiss="modal">Regresar</button>
							        <input type="submit" class="btn btn-primary" value="Rechazar" name="botonAccion">
							      </div>
							    </div>
							  </div>
							</div>
							
							<div class="form-group col-md-2">
								<label  class="plantilla-label" for="laQna">*QNA: </label>
									<select class="form-control border border-dark custom-select" id="qnaOption" name="qnaOption" required>
											<option  value="<?php echo $newQna ?>" ><?php echo $newQna ?> </option>
											<option  value="<?php echo $newQna+1 ?>" ><?php echo $newQna+1 ?> </option>
											<option  value="<?php echo $newQna-1 ?>" ><?php echo $newQna-1 ?> </option>
										         
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
							<input type="text" class="form-control" id="usuarioSeguir" name="usuarioSeguir" value="<?php echo $usuarioSeguir?>" style="display:none">
						</div>
						<br>

							
				</div>


							
				</div>
							
					<div class="form-row">
						<div class="form-group col-md-5">
								<label class="plantilla-label" for="ofunid">*Oficio unidad:</label>
								<input onkeypress="return pulsar(event)" type="text" class="form-control unexp border border-dark" id="ofunid" name="ofunid" placeholder="Ej. OAG-CA-3735-2020" value="" maxlength="80" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
							</div>
					<div class="form-group col-md-6">
						<label class="plantilla-label" for="fechaofi">*Fecha de oficio:</label>
						<input type="date" class="form-control border border-dark" id="fechaofi" name="fechaofi" placeholder="Fecha Oficio" required>
						<small name= "alertFechaIngreso" id= "alertFechaIngreso" class="text-danger">
				        </small>  
					</div>
				</div>
					<div class="form-row">
					<div class="form-group col-md-5">
						<label class="plantilla-label" for="fechareci">*Fecha de recibido:</label>
						<input type="date" class="form-control border border-dark" id="fechareci" name="fechareci" placeholder="Fecha de recibido" required>
						<small name= "alertFechaIngreso" id= "alertFechaIngreso" class="text-danger">
				        </small>  

					</div>
					<div class="form-group col-md-4">
						<label class="plantilla-label" for="codigo">*Código:</label><div class="container">
							 <input onkeypress="return pulsar(event)" type="text" class="form-control border border-dark" id="codigo" name="codigo" placeholder="Ej. 123" value="" maxlength="9" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
						<small name= "alertFechaIngreso" id= "alertFechaIngreso" class="text-danger">
				        </small>  
							</div>
					</div>
					<div class="form-group col-md-2">
						<label class="plantilla-label" for="NO">No. de puesto:</label>
						<input onkeypress="return pulsar(event)" type="text" class="form-control border border-dark" id="num_pues" name="num_pues" placeholder="Ej. 0001" value="" maxlength="5" onkeyup="javascript:this.value=this.value.toUpperCase();">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-4">
						<label class="plantilla-label" for="NO">Clave presupuestaria:</label>
						<input onkeypress="return pulsar(event)" type="text" class="form-control border border-dark" id="clavepres" name="clavepres" placeholder="Ej. 0001" value="" maxlength="35" onkeyup="javascript:this.value=this.value.toUpperCase();">
					</div>
					<div class="form-group col-md-8">
						<label class="plantilla-label" for="codmov">*Código de movimiento:</label>
						<input onkeypress="return pulsar(event)" type="text" class="form-control cod2 border border-dark" id="cod2_1" name="cod2_1" placeholder="Ej. 4550" value="" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-5">
							<div class="text-center">
								<label class="plantilla-label" for="del2">*Del:</label>
							</div>
							<input type="date" class="form-control border border-dark" id="del2" name="del2" placeholder="Del"required>
							<small name= "alertVigencia" id= "alertVigencia" class="text-danger">
				        	</small> 
						</div>
						<div class="form-group col-md-5">
							<div class="text-center">
								<label class="plantilla-label" for="al3">al:</label>
							</div>
						<input  type="date" class="form-control border border-dark" id="al3" name="al3" placeholder="al"> <!--required-->
						</div>
					</div>
					<div class="form-row">
					
					<div class="form-row">
						<div class="form-group col-mt-8">
						<label class="plantilla-label" for="estad">*Estado:</label>
						<input onkeypress="return pulsar(event)" type="text" class="form-control cod3 border border-dark" id="cod3_1" name="cod3_1" placeholder="Ej. Ciudad de México" value="Ciudad de México" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
					</div>

					<div class="form-group col-mt-8">
						<label class="plantilla-label" for="consema">*Consecutivo maestro de puestos:</label>
						<input onkeypress="return pulsar(event)" type="text" class="form-control colon border border-dark" id="consema" name="consema" placeholder="Ej. 170" value="" maxlength="5" onkeyup="javascript:this.value=this.value.toUpperCase();" >
					</div>
					<div class="col-md-4">
					</div>
				</div>
					<div class="form-group col-md-6">
						<label class="plantilla-label" for="observ">*Observaciones:</label>
						<input onkeypress="return pulsar(event)" type="text" class="form-control colon border border-dark" id="observ" name="observ" placeholder="Ej. 11-01-19 LA DIRECTORA GENERAL INDICA QUE SE REQUIERE OFICIO DE AUTORIZACION CON JUSTIFICACION PARA OCUPACION." value="" maxlength="150" onkeyup="javascript:this.value=this.value.toUpperCase();" >
					</div>
					<div class="form-row">
					

					<div class="form-group col-md-6">
						<label class="plantilla-label" for="fecharecspc">*Fecha de recibido en SPC:</label>
						<input  type="date" class="form-control border border-dark" id="fecharecspc" name="fecharecspc" placeholder="Fecha de recibido en SPC"  >
						<small name= "alertFechaIngreso" id= "alertFechaIngreso" class="text-danger">
				        </small>  
					
					</div>

					<div class="form-group col-md-6">
						<label class="plantilla-label" for="fechenvvb">*Fecha de envio a VoBo SPC:</label>
						<input type="date" class="form-control border border-dark" id="fechenvvb" name="fechenvvb" placeholder="Fecha de envio a VoBo SPC"  >
						<small name= "alertFechaIngreso" id= "alertFechaIngreso" class="text-danger">
				        </small>  
					</div>
					<div class="form-group col-md-6">
						<label class="plantilla-label" for="fecharecdspo">*Fecha de recibo DSPO:</label>
						<input  type="date" class="form-control border border-dark" id="fecharecdspo" name="fecharecdspo" placeholder="Fecha de envio a VoBo SPC" >
						<small name= "alertFechaIngreso" id= "alertFechaIngreso" class="text-danger">
				        </small>  
					</div>
					
					<div class="form-group col-md-6">
						<label class="plantilla-label" for="foliospc">*Folio SPC:</label>
						<input  type="text" class="form-control colon border border-dark" id="foliospc" name="foliospc" placeholder="Ej. 2020" value="" maxlength="5"  >
					</div>
						<div class="form-group col-md-12">
								<button type="button" class="btn btn-primary" name="capturaF" id="capturaF" data-toggle="modal" data-target="#exampleModal1">Capturar Fomope </button>
							
							<input type="submit" class="btn btn-primary" id="bandejaEntrada" name="accionB" style="display: none;"  value="bandeja principal">
							 
								 

						</div>

						<div class="form-group col-md-60">
							<button type="button" name="rechazo" id="rechazo" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalRT" >Rechazo por validacion </button>


						</div>
						<div class="form-group col-md-10">
							<button type="button" name="genera" id="genera" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalPC" >Reporte profesional de Carrera</button>


						</div>
					</div>
												<br>
							
								<!-- Modal -->
								<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  <div class="modal-dialog" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								        <h5 class="modal-title" id="exampleModalLabel1">Captura Fomope</h5>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
								      </div>
								      <div class="modal-body">
								        ¿Está seguro que quiere capturar la información del FOMOPE? 
								      	NOTA: Las fechas no deben ser mayores a la actual 
								      </div>
								      <div class="modal-footer">
								        <button type="button" class="btn btn-secondary" data-dismiss="modal">Regresar</button>
										<input type="submit" class="btn btn-primary" onclick="eliminarReq()" name="accionB" value="Capturar">

								       	<!-- <button type="submit" class="btn btn-primary">Capturar</button> -->
								       	
								      </div>
								    </div>
								  </div>
								</div>
							
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
							         <textarea class="form-control border border-dark" id="MotivoRechazoCap" rows = "4" name="comentarioR2" placeholder="Redactar el volante de rechazo" required></textarea>
							       
							      <div class="modal-footer">
							        <button type="button" class="btn btn-secondary" data-dismiss="modal">REGRESAR</button>
									<input type="submit" class="btn btn-primary" id="rechI" onclick="rechazarPorCapI()" name="accionB"  value="Aceptar rechazo por captura">
							      </div>
							     
							    </div>
							  </div>
							</div>

				</div>


		

						<div class="modal fade" id="exampleModalRT" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title" id="exampleModalLabel">Volante de rechazo</h5>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <div class="modal-body">
							         <textarea class="form-control border border-dark" id="MotivoRechazo" rows = "4" name="comentarioR" placeholder="Redactar el volante de rechazo" required></textarea>
							       
							      <div class="modal-footer">
							        <button type="button" class="btn btn-secondary" data-dismiss="modal">REGRESAR</button>
									<input type="submit" class="btn btn-primary" id="descargar" onclick="verBoton()" name="accionB"  value="descargar">
							      </div>
							     
							    </div>
							  </div>
							</div>

				</div>


						<div class="modal fade" id="exampleModalPC" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title" id="exampleModalLabel2">Reporte Profesional de carrera</h5>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <div class="modal-body">
							         <textarea class="form-control border border-dark" id="idProfesional" rows = "4" name="idProfesional" placeholder="id Profesional de carrera" required></textarea>
							       
							      <div class="modal-footer">
							        <button type="button" class="btn btn-secondary" data-dismiss="modal">REGRESAR</button>
									<input type="submit" class="btn btn-primary" id="generar" onclick="eliminarReq2()" name="accionB"  value="generar">
							      </div>
							     
							    </div>
							  </div>
							</div>

				</div>

			</form>


		</div>

			

		</div>
<?php
	 	}else{	
	 

			 			echo("
    	
												<br>
											<div class='col-sm-12'>
											<div class='plantilla-inputv text-dark ''>
											    <div class='card-body'><h2 align='center'>Por el momento no esta disponible la captura.</h2></div>
										</div>
										</div>
										</div>");
				 }
	}

		?>
	
		<script src="js/bootstrap.min.js"></script>
   	<script src="js/main.js"></script>

		
		<br>
	</body>
</html>

