
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
				window.location.href = 'Controller/controllerDescarga.php?nombreDecarga='+nombre+'&extencion='+laExtencion;

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
			//echo $noFomope;
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
		<div class="formulario_qr">

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
					$dir_subida = './Controller/documentos/';
					// Arreglo con todos los nombres de los archivos
					$files = array_diff(scandir($dir_subida), array('.', '..')); 
					$contDoc=0;
					foreach($files as $file){
					    // Divides en dos el nombre de tu archivo utilizando el . 
					    $data = explode("_",$file);
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
										$nombreAdescargar = $data[0]."_".$data[1]."_".$data[2]."_".$data[3]."_".$data[4]."_."."$extencion";
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
					?>

					

					</table>
			<br>

		
			<form method="post" name="qrs" action="agregar_FOMOPE.php"> 
				<div class="form-row">
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="tip registro">Tipo de registro: </label>
									 <input type="text" class="form-control border border-dark" id="tipoRegistro" name="tipoRegistro" value="<?php echo $elDia[2]?>" > 
					</div>


					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="tip registro">Tipo de registro: </label>
									 <input type="text" class="form-control border border-dark" id="tipoRegistro" name="tipoRegistro" value="<?php echo $elDia[2]?>" > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="tip registro">Tipo de registro: </label>
									 <input type="text" class="form-control border border-dark" id="tipoRegistro" name="tipoRegistro" value="<?php echo $elDia[2]?>" > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="tip registro">Tipo de registro: </label>
									 <input type="text" class="form-control border border-dark" id="tipoRegistro" name="tipoRegistro" value="<?php echo $elDia[2]?>" > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="tip registro">Tipo de registro: </label>
									 <input type="text" class="form-control border border-dark" id="tipoRegistro" name="tipoRegistro" value="<?php echo $elDia[2]?>" > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="tip registro">Tipo de registro: </label>
									 <input type="text" class="form-control border border-dark" id="tipoRegistro" name="tipoRegistro" value="<?php echo $elDia[2]?>" > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="tip registro">Tipo de registro: </label>
									 <input type="text" class="form-control border border-dark" id="tipoRegistro" name="tipoRegistro" value="<?php echo $elDia[2]?>" > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="tip registro">Tipo de registro: </label>
									 <input type="text" class="form-control border border-dark" id="tipoRegistro" name="tipoRegistro" value="<?php echo $elDia[2]?>" > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="tip registro">Tipo de registro: </label>
									 <input type="text" class="form-control border border-dark" id="tipoRegistro" name="tipoRegistro" value="<?php echo $elDia[2]?>" > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="tip registro">Tipo de registro: </label>
									 <input type="text" class="form-control border border-dark" id="tipoRegistro" name="tipoRegistro" value="<?php echo $elDia[2]?>" > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="tip registro">Tipo de registro: </label>
									 <input type="text" class="form-control border border-dark" id="tipoRegistro" name="tipoRegistro" value="<?php echo $elDia[2]?>" > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="tip registro">Tipo de registro: </label>
									 <input type="text" class="form-control border border-dark" id="tipoRegistro" name="tipoRegistro" value="<?php echo $elDia[2]?>" > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="tip registro">Tipo de registro: </label>
									 <input type="text" class="form-control border border-dark" id="tipoRegistro" name="tipoRegistro" value="<?php echo $elDia[2]?>" > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="tip registro">Tipo de registro: </label>
									 <input type="text" class="form-control border border-dark" id="tipoRegistro" name="tipoRegistro" value="<?php echo $elDia[2]?>" > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="tip registro">Tipo de registro: </label>
									 <input type="text" class="form-control border border-dark" id="tipoRegistro" name="tipoRegistro" value="<?php echo $elDia[2]?>" > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="tip registro">Tipo de registro: </label>
									 <input type="text" class="form-control border border-dark" id="tipoRegistro" name="tipoRegistro" value="<?php echo $elDia[2]?>" > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="tip registro">Tipo de registro: </label>
									 <input type="text" class="form-control border border-dark" id="tipoRegistro" name="tipoRegistro" value="<?php echo $elDia[2]?>" > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="tip registro">Tipo de registro: </label>
									 <input type="text" class="form-control border border-dark" id="tipoRegistro" name="tipoRegistro" value="<?php echo $elDia[2]?>" > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="tip registro">Tipo de registro: </label>
									 <input type="text" class="form-control border border-dark" id="tipoRegistro" name="tipoRegistro" value="<?php echo $elDia[2]?>" > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="tip registro">Tipo de registro: </label>
									 <input type="text" class="form-control border border-dark" id="tipoRegistro" name="tipoRegistro" value="<?php echo $elDia[2]?>" > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="tip registro">Tipo de registro: </label>
									 <input type="text" class="form-control border border-dark" id="tipoRegistro" name="tipoRegistro" value="<?php echo $elDia[2]?>" > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="tip registro">Tipo de registro: </label>
									 <input type="text" class="form-control border border-dark" id="tipoRegistro" name="tipoRegistro" value="<?php echo $elDia[2]?>" > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="tip registro">Tipo de registro: </label>
									 <input type="text" class="form-control border border-dark" id="tipoRegistro" name="tipoRegistro" value="<?php echo $elDia[2]?>" > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="tip registro">Tipo de registro: </label>
									 <input type="text" class="form-control border border-dark" id="tipoRegistro" name="tipoRegistro" value="<?php echo $elDia[2]?>" > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="tip registro">Tipo de registro: </label>
									 <input type="text" class="form-control border border-dark" id="tipoRegistro" name="tipoRegistro" value="<?php echo $elDia[2]?>" > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="tip registro">Tipo de registro: </label>
									 <input type="text" class="form-control border border-dark" id="tipoRegistro" name="tipoRegistro" value="<?php echo $elDia[2]?>" > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="tip registro">Tipo de registro: </label>
									 <input type="text" class="form-control border border-dark" id="tipoRegistro" name="tipoRegistro" value="<?php echo $elDia[2]?>" > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="tip registro">Tipo de registro: </label>
									 <input type="text" class="form-control border border-dark" id="tipoRegistro" name="tipoRegistro" value="<?php echo $elDia[2]?>" > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="tip registro">Tipo de registro: </label>
									 <input type="text" class="form-control border border-dark" id="tipoRegistro" name="tipoRegistro" value="<?php echo $elDia[2]?>" > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="tip registro">Tipo de registro: </label>
									 <input type="text" class="form-control border border-dark" id="tipoRegistro" name="tipoRegistro" value="<?php echo $elDia[2]?>" > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="tip registro">Tipo de registro: </label>
									 <input type="text" class="form-control border border-dark" id="tipoRegistro" name="tipoRegistro" value="<?php echo $elDia[2]?>" > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="tip registro">Tipo de registro: </label>
									 <input type="text" class="form-control border border-dark" id="tipoRegistro" name="tipoRegistro" value="<?php echo $elDia[2]?>" > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="tip registro">Tipo de registro: </label>
									 <input type="text" class="form-control border border-dark" id="tipoRegistro" name="tipoRegistro" value="<?php echo $elDia[2]?>" > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="tip registro">Tipo de registro: </label>
									 <input type="text" class="form-control border border-dark" id="tipoRegistro" name="tipoRegistro" value="<?php echo $elDia[2]?>" > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="tip registro">Tipo de registro: </label>
									 <input type="text" class="form-control border border-dark" id="tipoRegistro" name="tipoRegistro" value="<?php echo $elDia[2]?>" > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="tip registro">Tipo de registro: </label>
									 <input type="text" class="form-control border border-dark" id="tipoRegistro" name="tipoRegistro" value="<?php echo $elDia[2]?>" > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="tip registro">Tipo de registro: </label>
									 <input type="text" class="form-control border border-dark" id="tipoRegistro" name="tipoRegistro" value="<?php echo $elDia[2]?>" > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="tip registro">Tipo de registro: </label>
									 <input type="text" class="form-control border border-dark" id="tipoRegistro" name="tipoRegistro" value="<?php echo $elDia[2]?>" > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="tip registro">Tipo de registro: </label>
									 <input type="text" class="form-control border border-dark" id="tipoRegistro" name="tipoRegistro" value="<?php echo $elDia[2]?>" > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="tip registro">Tipo de registro: </label>
									 <input type="text" class="form-control border border-dark" id="tipoRegistro" name="tipoRegistro" value="<?php echo $elDia[2]?>" > 
					</div>
				</div>
				<!-- datos que se reciben para dar seguimiento  -->
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
				</div>

			</form>

		</div>

		</div>
	
		<script src="js/bootstrap.min.js"></script>
   	<script src="js/main.js"></script>

		
		<br>
	</body>
</html>

