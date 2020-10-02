
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
			$usuarioSeguir = $_GET['usuario'];
		
			$sqlNombre = "SELECT nombrePersonal FROM usuarios WHERE usuario = '$usuarioSeguir'";
			$result = mysqli_query($conexion,$sqlNombre);
			$nombreU = mysqli_fetch_row($result);

			 $consultaR = " SELECT * FROM usuarios WHERE usuario = '$usuarioSeguir'";

		        if($resultado3 = mysqli_query($conexion,$consultaR)){
	        		$row = mysqli_fetch_assoc($resultado3);
					$id_rol1 = $row['id_rol'];

					
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
	            <a ><img src="./img/iclogin.png" alt="x" height="17" width="17"/><?php echo (" $nombreU[0]"); ?></span></a>
	          </li>
	      </center>
	          <li class=" estilo-color">
	            <a href=  <?php echo ("'./LuluEventuales.php?usuario_rol=$usuarioSeguir''"); ?> ><img src="./img/2_ic.png" alt="x" height="17" width="20"/>      Bandeja</a>
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
							$sql="SELECT * from fomope_qr WHERE id_movimiento_qr = '$noFomope' ";
							$documentosPC="";
							// echo $noFomope;
							$result=mysqli_query($conexion,$sql);
							$ver = mysqli_fetch_assoc($result);

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

					    if($ver['rfc'] == $extractRfc){
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
									 <input type="text" class="form-control border border-dark" id="tipoRegistro" name="tipoRegistro" value="<?php echo $ver['tipoRegistro']?>" readonly > 
					</div>


					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="llave">Llave: </label>
									 <input type="text" class="form-control border border-dark" id="llave" name="llave" value="<?php echo $ver['llave']?>" readonly > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="tipo_movimiento">Tipo de movimiento: </label>
							<input type="text" class="form-control border border-dark" id="tipo_movimiento" name="tipo_movimiento" value="<?php echo $ver['tipo_movimiento']?>" readonly > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="lote">Lote: </label>
									 <input type="text" class="form-control border border-dark" id="lote" name="lote" value="<?php echo $ver['lote']?>" readonly > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="rfc">RFC: </label>
									 <input type="text" class="form-control border border-dark" id="rfc" name="rfc" value="<?php echo $ver['rfc']?>" readonly > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="nombre">Nombre: </label>
									 <input type="text" class="form-control border border-dark" id="nombre" name="nombre" value="<?php echo $ver['nombre']?>" readonly > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="apellido_p">Apellido Paterno: </label>
									 <input type="text" class="form-control border border-dark" id="apellido_p" name="apellido_p" value="<?php echo $ver['apellido_p']?>" readonly > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="apellido_m">Apellido Materno: </label>
									 <input type="text" class="form-control border border-dark" id="apellido_m" name="apellido_m" value="<?php echo $ver['apellido_m']?>" readonly > 
					</div>

					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="estado_civil">Estado Civil: </label>
									 <input type="text" class="form-control border border-dark" id="estado_civil" name="estado_civil" value="<?php echo $ver['estado_civil']?>" readonly > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="sar">Sar: </label>
									 <input type="text" class="form-control border border-dark" id="sar" name="sar" value="<?php echo $ver['sar']?>" readonly > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="curp">CURP: </label>
									 <input type="text" class="form-control border border-dark" id="curp" name="curp" value="<?php echo $ver['curp']?>" readonly > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="num_acta_banco">Num. Acta Banco: </label>
									 <input type="text" class="form-control border border-dark" id="num_acta_banco" name="num_acta_banco" value="<?php echo $ver['num_acta_banco']?>" readonly > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="clabe">Clabe: </label>
									 <input type="text" class="form-control border border-dark" id="clabe" name="clabe" value="<?php echo $ver['clabe']?>" readonly > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="tipo">Tipo: </label>
									 <input type="text" class="form-control border border-dark" id="tipo" name="tipo" value="<?php echo $ver['tipo']?>" readonly > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="banco">Banco: </label>
									 <input type="text" class="form-control border border-dark" id="banco" name="banco" value="<?php echo $ver['banco']?>" readonly > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="calle">Calle: </label>
									 <input type="text" class="form-control border border-dark" id="calle" name="calle" value="<?php echo $ver['calle']?>" readonly > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="num_exterior">Num. Exterior: </label>
									 <input type="text" class="form-control border border-dark" id="num_exterior" name="num_exterior" value="<?php echo $ver['num_exterior']?>" readonly > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="num_interior">Num. Int: </label>
									 <input type="text" class="form-control border border-dark" id="num_interior" name="num_interior" value="<?php echo $ver['num_interior']?>" readonly > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="colonia">Colonia: </label>
									 <input type="text" class="form-control border border-dark" id="colonia" name="colonia" value="<?php echo $ver['colonia']?>" readonly > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="codigo_post">C.P.: </label>
									 <input type="text" class="form-control border border-dark" id="codigo_post" name="codigo_post" value="<?php echo $ver['codigo_post']?>" readonly > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="estado_municipio">Municipio: </label>
									 <input type="text" class="form-control border border-dark" id="estado_municipio" name="estado_municipio" value="<?php echo $ver['estado_municipio']?>" readonly > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="cr">CR: </label>
									 <input type="text" class="form-control border border-dark" id="cr" name="cr" value="<?php echo $ver['cr']?>" readonly > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="ap">AP: </label>
									 <input type="text" class="form-control border border-dark" id="ap" name="ap" value="<?php echo $ver['ap']?>" readonly > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="unidad">Unidad: </label>
									 <input type="text" class="form-control border border-dark" id="unidad" name="unidad" value="<?php echo $ver['unidad']?>" readonly > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="partida">Partida: </label>
									 <input type="text" class="form-control border border-dark" id="partida" name="partida" value="<?php echo $ver['partida']?>" readonly > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="codigo_puesto">Cod. Puesto: </label>
									 <input type="text" class="form-control border border-dark" id="codigo_puesto" name="codigo_puesto" value="<?php echo $ver['codigo_puesto']?>" readonly > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="edo_ai">Estado AI: </label>
									 <input type="text" class="form-control border border-dark" id="edo_ai" name="edo_ai" value="<?php echo $ver['edo_ai']?>" readonly > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="gf">GF: </label>
									 <input type="text" class="form-control border border-dark" id="gf" name="gf" value="<?php echo $ver['gf']?>" readonly > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="funcion">Función: </label>
									 <input type="text" class="form-control border border-dark" id="funcion" name="funcion" value="<?php echo $ver['funcion']?>" readonly > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="subfunción">Subfunción: </label>
									 <input type="text" class="form-control border border-dark" id="subfunción" name="subfunción" value="<?php echo $ver['subfuncion']?>" readonly > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="num_puesto">Num. Puesto: </label>
									 <input type="text" class="form-control border border-dark" id="num_puesto" name="num_puesto" value="<?php echo $ver['num_puesto']?>" readonly > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="Tipo_trabajo">Tipo de trabajo: </label>
									 <input type="text" class="form-control border border-dark" id="Tipo_trabajo" name="Tipo_trabajo" value="<?php echo $ver['Tipo_trabajo']?>" readonly > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="fing_gf">Fecha de Ingreso GF: </label>
									 <input type="text" class="form-control border border-dark" id="fing_gf" name="fing_gf" value="<?php echo $ver['fing_gf']?>" readonly > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="fing_ssa">Fecha de Ingreso SSA: </label>
									 <input type="text" class="form-control border border-dark" id="fing_ssa" name="fing_ssa" value="<?php echo $ver['fing_ssa']?>" readonly > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="num_horas">Num. de horas: </label>
									 <input type="text" class="form-control border border-dark" id="num_horas" name="num_horas" value="<?php echo $ver['num_horas']?>" readonly > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="tip registro">Rango: </label>
									 <input type="text" class="form-control border border-dark" id="rango" name="rango" value="<?php echo $ver['rango']?>" readonly > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="quin">Quin: </label>
									 <input type="text" class="form-control border border-dark" id="quin" name="quin" value="<?php echo $ver['quin']?>" readonly > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="fini">Fecha de Inicio: </label>
									 <input type="text" class="form-control border border-dark" id="fini" name="fini" value="<?php echo $ver['fini']?>" readonly > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="fter">Fecha de Termino: </label>
									 <input type="text" class="form-control border border-dark" id="fter" name="fter" value="<?php echo $ver['fter']?>" readonly > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="con_36">Con 36: </label>
									 <input type="text" class="form-control border border-dark" id="con_36" name="con_36" value="<?php echo $ver['con_36']?>" readonly > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="genero">Genero: </label>
									 <input type="text" class="form-control border border-dark" id="genero" name="genero" value="<?php echo $ver['genero']?>" readonly > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="entidad_nac">Entidad Nac.: </label>
									 <input type="text" class="form-control border border-dark" id="entidad_nac" name="entidad_nac" value="<?php echo $ver['entidad_nac']?>" readonly > 
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
		<?php
				if($ver['estatus'] == "Rechazado duplicado"){

		?>
		<div class="form-row">
		<form name="elimin" enctype="multipart/form-data" action="./Controller/eliminarEventual.php" method="POST"> 
					<div class="form-group col-md-2">
						
					<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal1">
											Eliminar Fomope 
											</button>
				</div>
							  			<br>

						<div class="form-row">
							<input type="text" class="form-control" id="noFomope" name="noFomope" value="<?php echo $ver['id_movimiento_qr']?>" style="display:none">
						</div>
						
						<div class="form-row">
							<input type="text" class="form-control" id="usuario" name="usuario" value="<?php echo $usuarioSeguir?>" style="display:none">
						</div>
											<!-- Modal -->
											<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
											  <div class="modal-dialog" role="document">
											    <div class="modal-content">
											      <div class="modal-header">
											        <h5 class="modal-title" id="exampleModalLabel">Eliminar Información</h5>
											        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
											          <span aria-hidden="true">&times;</span>
											        </button>
											      </div>
											      <div class="modal-body">
											        ¿Estás seguro de eliminar la información del fomope?
											      </div>
									<center>
						     
										</center>
											      <div class="modal-footer">

											        <button type="button" class="btn btn-secondary" data-dismiss="modal">Regresar</button>
							        				<input type="submit" class="btn btn-danger" value="Eliminar" name="accionB">
											      </div>
											    </div>
											  </div>
											</div>

												</form>  
			</div>

		</div>
	<?php
	 	}
	}

		?>


					<br>
							<button id="enviarT" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
											 Enviar
											</button>
							  			<br>

											<!-- Modal -->
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
											        ¿Estas seguro de enviar esta información?
											      </div>
									<center>
						      <div class="form-group col-md-8">
									<div class="box" >

										<label  class="plantilla-label estilo-colorg" for="laQna">¿A quien será turnado?</label>
												
												<select class="form-control border border-dark custom-select" id="user" name="user">
													
													<?php
													
													if (!$conexion->set_charset("utf8")) {//asignamos la codificación comprobando que no falle
													       die("Error cargando el conjunto de caracteres utf8");
													}

													$consulta = "SELECT * FROM usuarios WHERE id_rol = 3 OR id_rol = 2 OR id_rol = 7";
													$resultado = mysqli_query($conexion , $consulta);
													$contador=0;

													while($misdatos = mysqli_fetch_assoc($resultado)){ $contador++;?>
													<option value="<?php echo $misdatos["usuario"]; ?>"><?php echo $misdatos["nombrePersonal"]; ?></option>
													<?php }?>          
													</select>
										</div>
										 <br>  

								</div>
										</center>
											      <div class="modal-footer">

											        <button type="button" class="btn btn-secondary" data-dismiss="modal">Regresar</button>
							        				<button type="button" onclick="reenviarDatos('<?php echo $noFomope ?>' , '<?php echo $usuarioSeguir ?>' )" class="btn btn-primary" >
							        				Enviar
							        				 </button>
											      </div>
											    </div>
											  </div>
								</div>
							<br>

		<script src="js/bootstrap.min.js"></script>
   	<script src="js/main.js"></script>

		
		<br>
	</body>
</html>

