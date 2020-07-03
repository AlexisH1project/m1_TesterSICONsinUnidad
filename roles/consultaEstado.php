
<html>
	<head>
		<meta charset="utf-8">
		<title>Consulta</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/estilo_form.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

		<link href='css/jquery-ui.min.css' type='text/css' rel='stylesheet'>
		<link href='css/jquery-ui.css' type='text/css' rel='stylesheet'>

		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

		<script src="js/funciones.js"></script>
		<script src="js/jquery-3.4.1.min.js" type="text/javascript"></script>
		<script src="js/jquery-ui.min.js" type="text/javascript"></script>
		<script src="js/jquery-ui.js" type="text/javascript"></script>
		<link rel="stylesheet" href="css/estilossicon.css">
			<style type="text/css">

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

		  .columnaBoton {
			  width:50%;
			  float:left;
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



		</script>



	</head>
	<body onload="nobackbutton();">
		<?php
				include "configuracion.php";
				$usuarioSeguir =  $_GET['usuario_rol'];

			?>

				<?php
				include "configuracion.php";
				$usuarioSeguir =  $_GET['usuario_rol'];

			?>
			<br>
		  <a  href= <?php echo ("'./menuPrincipal.php?usuario_rol=$usuarioSeguir'");?>><img class="img-responsive" src="img/ss1.png" height="90" width="280"/></a>
	

		<nav class="navbar fixed-top navbar-expand-lg navbar-dark plantilla-input fixed-top">
		    <div class="container">
		      <div class="collapse navbar-collapse" id="navbarResponsive">
		        <ul class="navbar-nav ml-auto">          
		        
		          <li class="nav-item">
		            <a class="nav-link" href='../LoginMenu/vista/cerrarsesion.php'>CERRAR SESIÓN</a>
		          </li>
		        </ul>
		      </div>
		    </div>
		  </nav>		
		  <br>

		

		
		<center>			

		<center>	

				
			<h3 class="estilo-color plantilla-subtitulospr">Sistema de Control de Registro de Formato de Movimiento de Personal (SICON).</h3>
				<br>
				<h5 class=" plantilla-subtitulop"> DIRECCIÓN DE INTEGRACIÓN DE PUESTOS Y SERVICIOS PERSONALES - DIPSP</h5>
				<br>
				<h3>Consulta de Estado FOMOPE</h3>
				<br>
				

			<form method="post" action=""> 
				<div class="plantilla-inputv text-center">
					<div class="form-row">
						<div class="col">
							<div class="form-group col-md-12">
								<label class="plantilla-labe estilo-colorg" for="elRfc">RFC:</label>
								<input type="text" class="form-control border-dark" id="rfc" name="rfc" value="<?php if(isset($_POST['rfc'])){ echo $_POST['rfc']; } ?>"  maxlength="13">
							</div>
					
						</div>
						<div class="col">
							<div class="form-group col-md-12">
								<label class="plantilla-label estilo-colorg" for="nombreB">Nombre:</label>
								<input type="text" class="form-control border-dark" id="nombreBus" name="nombreBus" value="<?php if(isset($_POST['nombreBus'])){ echo $_POST['nombreBus']; } ?>" maxlength="40">
							</div>

						</div>
						<div class="col">
							<div class="form-group col-md-12">
								<label class="plantilla-label estilo-colorg" for="apellidoB">Apellido Paterno:</label>
								<input type="text" class="form-control border-dark" id="apellidoBus" name="apellidoBus" value="<?php if(isset($_POST['apellidoBus'])){ echo $_POST['apellidoBus']; }  ?>" maxlength="30">
							</div>

						</div>
						<div class="col">
							<div class="form-group col-md-12">
								<label class="plantilla-label estilo-colorg" for="apellidoM">Apellido Materno:</label>
								<input type="text" class="form-control border-dark" value="<?php if(isset($_POST['apellidoMb'])){ echo $_POST['apellidoMb']; } ?>" id="apellidoMb" name="apellidoMb" maxlength="30">
							</div>

						</div>
						<div class="col">
							<div class="form-group col-md-12">
								<label class="plantilla-label estilo-colorg" for="unidadB">Unidad:</label>
								<input type="text" class="form-control unexp border border-dark" id="unidadBus" value="<?php if(isset($_POST['unidadBus'])) { echo $_POST['unidadBus']; } ?>" name="unidadBus" maxlength="60">
							</div>

						</div>
						<div class="col">

							<div class="form-group col-md-12">
								<label  class="plantilla-label estilo-colorg" for="laQna">QNA: </label>
									 
									<select class="form-control border-dark" name="qnaOption">
										<?php
										if (!$conexion->set_charset("utf8")) {//asignamos la codificación comprobando que no falle
										       die("Error cargando el conjunto de caracteres utf8");
										}

										$consulta = "SELECT * FROM ct_quincena";
										$resultado = mysqli_query($conexion , $consulta);
										$contador=0;

										while($misdatos = mysqli_fetch_assoc($resultado)){ $contador++;?>
										<option  data-subtext="<?php echo $misdatos["id_qna"]; ?>"><?php echo $misdatos["qna"]; ?></option>
										<?php }?>          
										</select>
							</div>
						</div>
						<div class="col">

							<div class="form-group col-md-12">
								<label  class="plantilla-label estilo-colorg" for="laQna">Año: </label>
									<select class="form-control border-dark" name="anioBus">									
									  <option value=""></option>
								      <option value="2019">2019</option>
								      <option value="2020">2020</option>
								    </select>	
							</div>
						</div>
					</div>
			
				<div class="col-sm-12">
					<div class="form-row">

					<div class="form-group col-md-12">
						<div class="col text-center">
								<input type="submit" name="buscar" onclick="'<?php $_GET['usuario_rol']; ?>'" class="btn btn btn-danger tamanio-button plantilla-input text-white bord" value="Buscar">
							<br>
						</div>
					</div>

					</div>
				</div>
			</form>
			<form enctype="multipart/form-data" method="post" action="">
				<div class="form-group col-md-12">
						<div class="col text-center">
								<input type="submit" class="btn btn-secondary" name="borrar" value="Borrar">
						</div>
					</div>
			</form>
		</div>
	
	</div>
					
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
						      <th scope="titulo">Estado FOMOPE</th>
						      <th scope="titulo">Unidad</th>
						      <th scope="titulo">Última modificación</th>
						       <th scope="titulo">Movimiento</th>
						   </tr>
					 	 </thead>

				<?php 
						include "configuracion.php";

						if(isset($_POST['buscar'])){// $_SERVER['REQUEST_METHOD'] == 'POST' if(){
							
							$rfcBuscar = $_POST['rfc'];
							$nombreBuscar = $_POST['nombreBus'];
							$apellidoBuscar = $_POST['apellidoBus'];
							$apellidomBuscar = $_POST['apellidoMb'];
							$unidadBuscar = $_POST['unidadBus'];
							$qnaBuscar = $_POST['qnaOption'];
							$anioBuscar = $_POST['anioBus'];
							

				   
 if($rfcBuscar != "" && $nombreBuscar != "" && $apellidoBuscar != "" && $apellidomBuscar != "" && $unidadBuscar != "" &&  $qnaBuscar != "" &&  $anioBuscar != ""){

								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE (rfc='$rfcBuscar' AND nombre='$nombreBuscar' AND apellido_1='$apellidoBuscar' AND apellido_2='$apellidomBuscar' AND unidad='$unidadBuscar' AND quincenaAplicada='$qnaBuscar' AND anio='$anioBuscar')";

 							}elseif($rfcBuscar == "" && $nombreBuscar != "" && $apellidoBuscar != "" && $apellidomBuscar != "" && $unidadBuscar != "" &&  $qnaBuscar != "" &&  $anioBuscar != "" ){

								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE (nombre='$nombreBuscar' AND apellido_1='$apellidoBuscar' AND apellido_2='$apellidomBuscar' AND unidad='$unidadBuscar' AND quincenaAplicada='$qnaBuscar' AND anio='$anioBuscar')";

 							}elseif ($rfcBuscar != "" && $nombreBuscar == "" && $apellidoBuscar == "" && $apellidomBuscar == "" && $unidadBuscar == ""  &&  $qnaBuscar == ""  &&  $anioBuscar == "") {
								
								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE (rfc='$rfcBuscar')";
								
							}elseif ($rfcBuscar != "" && $nombreBuscar == "" && $apellidoBuscar != "" && $apellidomBuscar == "" && $unidadBuscar == ""  &&  $qnaBuscar == ""  &&  $anioBuscar == "") {
								
								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE (rfc='$rfcBuscar' AND apellido_1='$apellidoBuscar')";
								
							}elseif ($rfcBuscar != "" && $nombreBuscar == "" && $apellidoBuscar != "" && $apellidomBuscar != "" && $unidadBuscar == ""  &&  $qnaBuscar == ""  &&  $anioBuscar == "") {
								
								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE (rfc='$rfcBuscar' AND apellido_1='$apellidoBuscar' AND apellido_2='$apellidomBuscar')";
								
							}elseif ($rfcBuscar != "" && $nombreBuscar == "" && $apellidoBuscar != "" && $apellidomBuscar != "" && $unidadBuscar != ""  &&  $qnaBuscar == ""  &&  $anioBuscar == "") {
								
								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE (rfc='$rfcBuscar' AND apellido_1='$apellidoBuscar' AND apellido_2='$apellidomBuscar' AND unidad='$unidadBuscar')";
	 							
							}elseif ($rfcBuscar != "" && $nombreBuscar == "" && $apellidoBuscar == "" && $apellidomBuscar == "" && $unidadBuscar == ""  &&  $qnaBuscar != "" &&  $anioBuscar == "") {
								
								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE (rfc='$rfcBuscar' AND quincenaAplicada='$qnaBuscar')";
								
							}elseif ($rfcBuscar != "" && $nombreBuscar == "" && $apellidoBuscar != "" && $apellidomBuscar != "" && $unidadBuscar != ""  &&  $qnaBuscar != "" &&  $anioBuscar != "") { //AQUI
								
								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE (rfc='$rfcBuscar' AND apellido_1='$apellidoBuscar' AND apellido_2='$apellidomBuscar' AND unidad='$unidadBuscar'  AND quincenaAplicada='$qnaBuscar' AND anio='$anioBuscar')";
	 							
							}elseif ($rfcBuscar != "" && $nombreBuscar == "" && $apellidoBuscar != "" && $apellidomBuscar == "" && $unidadBuscar != ""  &&  $qnaBuscar != "" &&  $anioBuscar == "") {
								
								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE (rfc='$rfcBuscar' AND apellido_1='$apellidoBuscar' AND unidad='$unidadBuscar' AND quincenaAplicada='$qnaBuscar')";
	 							
							}elseif ($rfcBuscar != "" && $nombreBuscar == "" && $apellidoBuscar != "" && $apellidomBuscar == "" && $unidadBuscar == ""  &&  $qnaBuscar != "" &&  $anioBuscar == "") {
								
								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE (rfc='$rfcBuscar' AND apellido_1='$apellidoBuscar' AND quincenaAplicada='$qnaBuscar')";
	 							
							}elseif ($rfcBuscar != "" && $nombreBuscar == "" && $apellidoBuscar != "" && $apellidomBuscar != "" && $unidadBuscar == ""  &&  $qnaBuscar != "" &&  $anioBuscar == "") {
								
								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE (rfc='$rfcBuscar' AND apellido_1='$apellidoBuscar' AND apellido_2='$apellidomBuscar' AND quincenaAplicada='$qnaBuscar')";
	 							
							}elseif ($rfcBuscar != "" && $nombreBuscar == "" && $apellidoBuscar != "" && $apellidomBuscar == "" && $unidadBuscar != ""  &&  $qnaBuscar == ""  &&  $anioBuscar == "" ) {
								
								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE (rfc='$rfcBuscar' AND apellido_1='$apellidoBuscar' AND unidad='$unidadBuscar')";
	 							
							}elseif ($rfcBuscar != "" && $nombreBuscar == "" && $apellidoBuscar == "" && $apellidomBuscar != "" && $unidadBuscar == ""  &&  $qnaBuscar == ""  &&  $anioBuscar == "") {
								
								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE (rfc='$rfcBuscar' AND apellido_2='$apellidomBuscar')";
								
							}elseif ($rfcBuscar != "" && $nombreBuscar == "" && $apellidoBuscar == "" && $apellidomBuscar != "" && $unidadBuscar != ""  &&  $qnaBuscar == ""  &&  $anioBuscar == "") {
								
								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE (rfc='$rfcBuscar' AND apellido_2='$apellidomBuscar' AND unidad='$unidadBuscar')";
								
							}elseif ($rfcBuscar != "" && $nombreBuscar == "" && $apellidoBuscar == "" && $apellidomBuscar != "" && $unidadBuscar == ""  &&  $qnaBuscar != "" &&  $anioBuscar == "") {
								
								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE (rfc='$rfcBuscar' AND apellido_2='$apellidomBuscar' AND quincenaAplicada='$qnaBuscar')";
								
							}elseif ($rfcBuscar != "" && $nombreBuscar == "" && $apellidoBuscar == "" && $apellidomBuscar == "" && $unidadBuscar != ""  &&  $qnaBuscar == ""  &&  $anioBuscar == "") {
								
								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE (rfc='$rfcBuscar' AND unidad='$unidadBuscar')";
	 							
							}
							elseif ($rfcBuscar != "" && $nombreBuscar == "" && $apellidoBuscar == "" && $apellidomBuscar == "" && $unidadBuscar != ""  &&  $qnaBuscar != "" &&  $anioBuscar == "") {
								
								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE (rfc='$rfcBuscar' AND unidad='$unidadBuscar' AND quincenaAplicada='$qnaBuscar')";
	 							
							}elseif ($rfcBuscar == "" && $nombreBuscar == "" && $apellidoBuscar != "" && $apellidomBuscar == "" && $unidadBuscar == ""  &&  $qnaBuscar != "" &&  $anioBuscar == "") {
								
								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE ( apellido_1='$apellidoBuscar' AND quincenaAplicada='$qnaBuscar')";
	 							
							}elseif ($rfcBuscar == "" && $nombreBuscar == "" && $apellidoBuscar == "" && $apellidomBuscar != "" && $unidadBuscar == ""  &&  $qnaBuscar != "" &&  $anioBuscar == "") {
								
								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE ( apellido_2='$apellidomBuscar' AND quincenaAplicada='$qnaBuscar')";
	 							
							}elseif ($rfcBuscar == "" && $nombreBuscar == "" && $apellidoBuscar == "" && $apellidomBuscar == "" && $unidadBuscar != ""  &&  $qnaBuscar != "" &&  $anioBuscar == "") {
								
								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE ( unidad='$unidadBuscar' AND quincenaAplicada='$qnaBuscar')";
	 							
							}elseif ($rfcBuscar == "" && $nombreBuscar == "" && $apellidoBuscar == "" && $apellidomBuscar == "" && $unidadBuscar != ""  &&  $qnaBuscar != "" &&  $anioBuscar == "" ) {
								
								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE ( unidad='$unidadBuscar' AND quincenaAplicada='$qnaBuscar')";
	 							
							}elseif ($rfcBuscar != "" && $nombreBuscar != "" && $apellidoBuscar == "" && $apellidomBuscar == "" && $unidadBuscar == ""  &&  $qnaBuscar == ""  &&  $anioBuscar == "") {
								
								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE (rfc='$rfcBuscar' AND nombre = '$nombreBuscar')";
								
							}elseif ($rfcBuscar != "" && $nombreBuscar != "" && $apellidoBuscar != "" && $apellidomBuscar == "" && $unidadBuscar == ""  &&  $qnaBuscar == ""  &&  $anioBuscar == "") {
								
								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE (rfc='$rfcBuscar' AND nombre = '$nombreBuscar' AND apellido_1='$apellidoBuscar' )";
								
							}elseif ($rfcBuscar != "" && $nombreBuscar != "" && $apellidoBuscar == "" && $apellidomBuscar != "" && $unidadBuscar == ""  &&  $qnaBuscar == ""  &&  $anioBuscar == "") {
								
								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE (rfc='$rfcBuscar' AND nombre = '$nombreBuscar' AND apellido_2='$apellidomBuscar')";
								
							}elseif ($rfcBuscar != "" && $nombreBuscar != "" && $apellidoBuscar == "" && $apellidomBuscar == "" && $unidadBuscar != ""  &&  $qnaBuscar == ""  &&  $anioBuscar == "") {
								
								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE (rfc='$rfcBuscar' AND nombre = '$nombreBuscar' AND unidad='$unidadBuscar' )";
								
							}elseif ($rfcBuscar != "" && $nombreBuscar != "" && $apellidoBuscar == "" && $apellidomBuscar == "" && $unidadBuscar == ""  &&  $qnaBuscar != "" &&  $anioBuscar == "" ) {
								
								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE (rfc='$rfcBuscar' AND nombre = '$nombreBuscar' AND  quincenaAplicada='$qnaBuscar')";
								
							}elseif ($rfcBuscar != "" && $nombreBuscar != "" && $apellidoBuscar != "" && $apellidomBuscar != "" && $unidadBuscar == ""  &&  $qnaBuscar != "" &&  $anioBuscar != "" ) {
								
								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE (rfc='$rfcBuscar' AND nombre = '$nombreBuscar' AND apellido_1='$apellidoBuscar' AND apellido_2='$apellidomBuscar' AND  quincenaAplicada='$qnaBuscar' AND anio='$anioBuscar')";
								
							}elseif ($rfcBuscar != "" && $nombreBuscar != "" && $apellidoBuscar != "" && $apellidomBuscar == "" && $unidadBuscar == ""  &&  $qnaBuscar != "" &&  $anioBuscar == "" ) {
								
								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE (rfc='$rfcBuscar' AND nombre = '$nombreBuscar' AND apellido_1='$apellidoBuscar' AND  quincenaAplicada='$qnaBuscar')";
								
							}elseif ($rfcBuscar != "" && $nombreBuscar != "" && $apellidoBuscar == "" && $apellidomBuscar != "" && $unidadBuscar != ""  &&  $qnaBuscar == ""  &&  $anioBuscar == "") {
								
								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE (rfc='$rfcBuscar' AND nombre = '$nombreBuscar' AND apellido_2='$apellidomBuscar' AND unidad='$unidadBuscar')";
	 							
							}elseif ($rfcBuscar != "" && $nombreBuscar != "" && $apellidoBuscar != "" && $apellidomBuscar == "" && $unidadBuscar != ""  &&  $qnaBuscar == ""  &&  $anioBuscar == "") {
								
								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE (rfc='$rfcBuscar' AND nombre = '$nombreBuscar' AND apellido_1='$apellidoBuscar' AND unidad='$unidadBuscar')";
	 							
							}elseif ($rfcBuscar != "" && $nombreBuscar != "" && $apellidoBuscar == "" && $apellidomBuscar != "" && $unidadBuscar != ""  &&  $qnaBuscar != "" &&  $anioBuscar != "" ) {
								
								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE (rfc='$rfcBuscar' AND nombre = '$nombreBuscar' AND apellido_2='$apellidomBuscar' AND unidad='$unidadBuscar' AND quincenaAplicada='$qnaBuscar' AND anio='$anioBuscar')";
	 							
							}elseif ($rfcBuscar != "" && $nombreBuscar != "" && $apellidoBuscar == "" && $apellidomBuscar != "" && $unidadBuscar == ""  &&  $qnaBuscar != "" &&  $anioBuscar == "" ) {
								
								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE (rfc='$rfcBuscar' AND nombre = '$nombreBuscar' AND apellido_2='$apellidomBuscar' AND quincenaAplicada='$qnaBuscar')";
	 							
							}elseif ($rfcBuscar != "" && $nombreBuscar != "" && $apellidoBuscar != "" && $apellidomBuscar == "" && $unidadBuscar != ""  &&  $qnaBuscar != "" &&  $anioBuscar != "" ) {//Aqui
								
								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE (rfc='$rfcBuscar' AND nombre = '$nombreBuscar' AND apellido_1='$apellidoBuscar' AND unidad='$unidadBuscar' AND quincenaAplicada='$qnaBuscar' AND anio='$anioBuscar')";
	 							
							}elseif($rfcBuscar != "" && $nombreBuscar != "" && $apellidoBuscar == "" && $apellidomBuscar == "" && $unidadBuscar != ""  &&  $qnaBuscar != "" &&  $anioBuscar == "" ) {
								
								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE (rfc='$rfcBuscar' AND nombre = '$nombreBuscar' AND apellido_1='$apellidoBuscar')";
								
							}elseif ($rfcBuscar != "" && $nombreBuscar == "" && $apellidoBuscar != "" && $apellidomBuscar == "" && $unidadBuscar == ""  &&  $qnaBuscar == ""  &&  $anioBuscar == "") {
								
								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE (rfc='$rfcBuscar'  AND apellido_1='$apellidoBuscar')";
								
							}elseif ($rfcBuscar != "" && $nombreBuscar != "" && $apellidoBuscar != "" && $apellidomBuscar != "" && $unidadBuscar == ""  &&  $qnaBuscar == ""  &&  $anioBuscar == "") {
								
								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE (rfc='$rfcBuscar' AND nombre = '$nombreBuscar' AND apellido_1='$apellidoBuscar' AND apellido_2='$apellidomBuscar')";
								
							}elseif ($rfcBuscar == "" && $nombreBuscar != "" && $apellidoBuscar == "" && $apellidomBuscar == "" && $unidadBuscar == ""  &&  $qnaBuscar == ""  &&  $anioBuscar == "") {
								
								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE (nombre = '$nombreBuscar')";
								
							}elseif ($rfcBuscar == "" && $nombreBuscar != "" && $apellidoBuscar != "" && $apellidomBuscar == "" && $unidadBuscar == ""  &&  $qnaBuscar == ""  &&  $anioBuscar == "") {
								
								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE (nombre = '$nombreBuscar' AND apellido_1='$apellidoBuscar')";
								
							}elseif ($rfcBuscar == "" && $nombreBuscar != "" && $apellidoBuscar != "" && $apellidomBuscar != "" && $unidadBuscar == ""  &&  $qnaBuscar == ""  &&  $anioBuscar == "") {
								
								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE ( nombre = '$nombreBuscar' AND apellido_1='$apellidoBuscar' AND apellido_2='$apellidomBuscar')";
								
							}elseif($rfcBuscar == "" && $nombreBuscar != "" && $apellidoBuscar != "" && $apellidomBuscar != "" && $unidadBuscar != ""  &&  $qnaBuscar == ""  &&  $anioBuscar == ""){

								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE (nombre='$nombreBuscar' AND apellido_1='$apellidoBuscar' AND apellido_2='$apellidomBuscar' AND unidad='$unidadBuscar')";

 							}elseif ($rfcBuscar == "" && $nombreBuscar == "" && $apellidoBuscar != "" && $apellidomBuscar == "" && $unidadBuscar == ""  &&  $qnaBuscar == ""  &&  $anioBuscar == "") {
								
								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE (apellido_1='$apellidoBuscar')";
								
							}elseif ($rfcBuscar == "" && $nombreBuscar == "" && $apellidoBuscar != "" && $apellidomBuscar != "" && $unidadBuscar == ""  &&  $qnaBuscar == ""  &&  $anioBuscar == "") {
								
								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE (apellido_1='$apellidoBuscar' AND apellido_2='$apellidomBuscar')";
								
							}elseif($rfcBuscar == "" && $nombreBuscar == "" && $apellidoBuscar != "" && $apellidomBuscar != "" && $unidadBuscar != ""  &&  $qnaBuscar == ""  &&  $anioBuscar == ""){

								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE (apellido_1='$apellidoBuscar' AND apellido_2='$apellidomBuscar' AND unidad='$unidadBuscar')";

 							}elseif($rfcBuscar == "" && $nombreBuscar == "" && $apellidoBuscar != "" && $apellidomBuscar != "" && $unidadBuscar != ""  &&  $qnaBuscar != "" &&  $anioBuscar == "" ){

								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE (apellido_1='$apellidoBuscar' AND apellido_2='$apellidomBuscar' AND unidad='$unidadBuscar' AND quincenaAplicada='$qnaBuscar')";

 							}elseif($rfcBuscar == "" && $nombreBuscar == "" && $apellidoBuscar == "" && $apellidomBuscar != "" && $unidadBuscar != ""  &&  $qnaBuscar != "" &&  $anioBuscar == "" ){

								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE ( apellido_2='$apellidomBuscar' AND unidad='$unidadBuscar' AND quincenaAplicada='$qnaBuscar')";

 							}elseif($rfcBuscar == "" && $nombreBuscar == "" && $apellidoBuscar != "" && $apellidomBuscar != "" && $unidadBuscar == ""  &&  $qnaBuscar != "" &&  $anioBuscar == "" ){

								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE (apellido_1='$apellidoBuscar' AND apellido_2='$apellidomBuscar' AND quincenaAplicada='$qnaBuscar')";

 							}elseif ($rfcBuscar == "" && $nombreBuscar == "" && $apellidoBuscar == "" && $apellidomBuscar != "" && $unidadBuscar == ""  &&  $qnaBuscar == ""  &&  $anioBuscar == "") {
								
								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE (apellido_2='$apellidomBuscar')";
								
							}elseif($rfcBuscar == "" && $nombreBuscar == "" && $apellidoBuscar == "" && $apellidomBuscar != "" && $unidadBuscar != ""  &&  $qnaBuscar == ""  &&  $anioBuscar == ""){

								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE (apellido_2='$apellidomBuscar' AND unidad='$unidadBuscar')";

 							}elseif($rfcBuscar == "" && $nombreBuscar == "" && $apellidoBuscar == "" && $apellidomBuscar == "" && $unidadBuscar != ""  &&  $qnaBuscar == ""  &&  $anioBuscar == ""){

								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE (unidad='$unidadBuscar')";

 							}elseif ($rfcBuscar == "" && $nombreBuscar != "" && $apellidoBuscar == "" && $apellidomBuscar != "" && $unidadBuscar == ""  &&  $qnaBuscar == ""  &&  $anioBuscar == "") {
								
								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE ( nombre = '$nombreBuscar' AND apellido_2='$apellidomBuscar')";
								
							}elseif ($rfcBuscar == "" && $nombreBuscar != "" && $apellidoBuscar == "" && $apellidomBuscar != "" && $unidadBuscar == ""  &&  $qnaBuscar != "" &&  $anioBuscar == "" ) {
								
								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE ( nombre = '$nombreBuscar' AND apellido_2='$apellidomBuscar' AND quincenaAplicada='$qnaBuscar')";
								
							}elseif ($rfcBuscar == "" && $nombreBuscar != "" && $apellidoBuscar == "" && $apellidomBuscar != "" && $unidadBuscar != ""  &&  $qnaBuscar == ""  &&  $anioBuscar == "") {
								
								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE ( nombre = '$nombreBuscar' AND apellido_2='$apellidomBuscar' AND unidad='$unidadBuscar')";
								
							}elseif ($rfcBuscar == "" && $nombreBuscar != "" && $apellidoBuscar == "" && $apellidomBuscar != "" && $unidadBuscar != ""  &&  $qnaBuscar != "" &&  $anioBuscar == "" ) {
								
								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE ( nombre = '$nombreBuscar' AND apellido_2='$apellidomBuscar' AND unidad='$unidadBuscar' AND quincenaAplicada='$qnaBuscar')";
								
							}elseif ($rfcBuscar == "" && $nombreBuscar != "" && $apellidoBuscar == "" && $apellidomBuscar == "" && $unidadBuscar != ""  &&  $qnaBuscar != "" &&  $anioBuscar == "" ) {
								
								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE ( nombre = '$nombreBuscar' AND unidad='$unidadBuscar' AND quincenaAplicada='$qnaBuscar')";
								
							}elseif ($rfcBuscar == "" && $nombreBuscar != "" && $apellidoBuscar != "" && $apellidomBuscar == "" && $unidadBuscar == ""  &&  $qnaBuscar == ""  &&  $anioBuscar == "") {
								
								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE ( nombre = '$nombreBuscar' AND apellido_1='$apellidoBuscar')";
								
							}elseif ($rfcBuscar == "" && $nombreBuscar != "" && $apellidoBuscar != "" && $apellidomBuscar != "" && $unidadBuscar == ""  &&  $qnaBuscar == ""  &&  $anioBuscar == "") {
								
								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE ( nombre = '$nombreBuscar' AND apellido_1='$apellidoBuscar' AND apellido_2='$apellidomBuscar')";
								
							}elseif ($rfcBuscar == "" && $nombreBuscar != "" && $apellidoBuscar != "" && $apellidomBuscar == "" && $unidadBuscar != ""  &&  $qnaBuscar == ""  &&  $anioBuscar == "") {
								
								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE ( nombre = '$nombreBuscar' AND apellido_1='$apellidoBuscar' AND unidad='$unidadBuscar')";
	 							
							}elseif ($rfcBuscar == "" && $nombreBuscar != "" && $apellidoBuscar != "" && $apellidomBuscar != "" && $unidadBuscar == ""  &&  $qnaBuscar != "" &&  $anioBuscar == "" ) {
								
								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE ( nombre = '$nombreBuscar' AND apellido_1='$apellidoBuscar' AND apellido_2='$apellidomBuscar' AND quincenaAplicada='$qnaBuscar')";
								
							}elseif ($rfcBuscar == "" && $nombreBuscar != "" && $apellidoBuscar != "" && $apellidomBuscar == "" && $unidadBuscar != ""  &&  $qnaBuscar != "" &&  $anioBuscar == "" ) {
								
								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE ( nombre = '$nombreBuscar' AND apellido_1='$apellidoBuscar' AND unidad='$unidadBuscar' AND quincenaAplicada='$qnaBuscar')";
	 							
							}elseif ($rfcBuscar == "" && $nombreBuscar != "" && $apellidoBuscar != "" && $apellidomBuscar == "" && $unidadBuscar == ""  &&  $qnaBuscar != "" &&  $anioBuscar == "" ) {
								
								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE ( nombre = '$nombreBuscar' AND apellido_1='$apellidoBuscar' AND quincenaAplicada='$qnaBuscar')";
	 							
							}elseif ($rfcBuscar == "" && $nombreBuscar == "" && $apellidoBuscar != "" && $apellidomBuscar == "" && $unidadBuscar != ""  &&  $qnaBuscar != "" &&  $anioBuscar == "" ) {
								
								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE ( apellido_1='$apellidoBuscar' AND unidad='$unidadBuscar' AND quincenaAplicada='$qnaBuscar')";
	 							
							}elseif ($rfcBuscar == "" && $nombreBuscar != "" && $apellidoBuscar == "" && $apellidomBuscar == "" && $unidadBuscar != ""  &&  $qnaBuscar == ""  &&  $anioBuscar == "") {
								
								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE ( nombre = '$nombreBuscar' AND unidad='$unidadBuscar')";
	 							
							}elseif ($rfcBuscar == "" && $nombreBuscar == "" && $apellidoBuscar != "" && $apellidomBuscar == "" && $unidadBuscar != ""  &&  $qnaBuscar == ""  &&  $anioBuscar == "") {
								
								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE ( apellido_1='$apellidoBuscar' AND unidad='$unidadBuscar')";
	 						}elseif ($rfcBuscar == "" && $nombreBuscar != "" && $apellidoBuscar != "" && $apellidomBuscar != "" && $unidadBuscar == ""  &&  $qnaBuscar == ""  &&  $anioBuscar == "") {
								
								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE ( 
								apellido_1='$apellidoBuscar' AND apellido_2='$apellidomBuscar')";
								
							}elseif($rfcBuscar == "" && $nombreBuscar == "" && $apellidoBuscar == "" && $apellidomBuscar == "" && $unidadBuscar == ""  &&  $qnaBuscar != "" &&  $anioBuscar == "" ){

								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE ( quincenaAplicada='$qnaBuscar')";

 							}elseif($rfcBuscar == "" && $nombreBuscar != "" && $apellidoBuscar == "" && $apellidomBuscar == "" && $unidadBuscar == ""  &&  $qnaBuscar != "" &&  $anioBuscar == "" ){

								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE (nombre = '$nombreBuscar' AND quincenaAplicada='$qnaBuscar')";

 							}elseif($rfcBuscar == "" && $nombreBuscar == "" && $apellidoBuscar == "" && $apellidomBuscar == "" && $unidadBuscar == ""  &&  $qnaBuscar == ""  &&  $anioBuscar == ""){

								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE (rfc='$rfcBuscar' AND nombre='$nombreBuscar' AND apellido_1='$apellidoBuscar' AND apellido_2='$apellidomBuscar' AND unidad='$unidadBuscar'  AND quincenaAplicada='$qnaBuscar')";

 							}elseif($rfcBuscar == "" && $nombreBuscar == "" && $apellidoBuscar == "" && $apellidomBuscar == "" && $unidadBuscar == ""  &&  $qnaBuscar == ""  &&  $anioBuscar != ""){

								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE (anio='$anioBuscar')";

 							}elseif($rfcBuscar != "" && $nombreBuscar == "" && $apellidoBuscar == "" && $apellidomBuscar == "" && $unidadBuscar == ""  &&  $qnaBuscar == ""  &&  $anioBuscar != ""){

								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE (rfc='$rfcBuscar' AND anio='$anioBuscar')";

 							}elseif($rfcBuscar != "" && $nombreBuscar != "" && $apellidoBuscar == "" && $apellidomBuscar == "" && $unidadBuscar == ""  &&  $qnaBuscar == ""  &&  $anioBuscar != ""){

								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE (rfc='$rfcBuscar' AND nombre='$nombreBuscar' AND anio='$anioBuscar')";

 							}elseif($rfcBuscar != "" && $nombreBuscar != "" && $apellidoBuscar != "" && $apellidomBuscar == "" && $unidadBuscar == ""  &&  $qnaBuscar == ""  &&  $anioBuscar != ""){

								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE (rfc='$rfcBuscar' AND nombre='$nombreBuscar' AND apellido_1='$apellidoBuscar' AND anio='$anioBuscar')";

 							}elseif($rfcBuscar != "" && $nombreBuscar != "" && $apellidoBuscar != "" && $apellidomBuscar != "" && $unidadBuscar == ""  &&  $qnaBuscar == ""  &&  $anioBuscar != ""){

								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE (rfc='$rfcBuscar' AND nombre='$nombreBuscar' AND apellido_1='$apellidoBuscar' AND apellido_2='$apellidomBuscar' AND anio='$anioBuscar')";

 							}elseif($rfcBuscar != "" && $nombreBuscar != "" && $apellidoBuscar != "" && $apellidomBuscar != "" && $unidadBuscar != ""  &&  $qnaBuscar == ""  &&  $anioBuscar != ""){

								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE (rfc='$rfcBuscar' AND nombre='$nombreBuscar' AND apellido_1='$apellidoBuscar' AND apellido_2='$apellidomBuscar' AND unidad='$unidadBuscar' AND anio='$anioBuscar')";

 							}elseif($rfcBuscar == "" && $nombreBuscar == "" && $apellidoBuscar == "" && $apellidomBuscar == "" && $unidadBuscar == ""  &&  $qnaBuscar != ""  &&  $anioBuscar != ""){

								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE ( quincenaAplicada='$qnaBuscar' AND anio='$anioBuscar')";

 							}elseif($rfcBuscar == "" && $nombreBuscar == "" && $apellidoBuscar == "" && $apellidomBuscar == "" && $unidadBuscar != ""  &&  $qnaBuscar != ""  &&  $anioBuscar != ""){

								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE (unidad='$unidadBuscar' AND quincenaAplicada='$qnaBuscar' AND anio='$anioBuscar')";

 							}elseif($rfcBuscar == "" && $nombreBuscar == "" && $apellidoBuscar == "" && $apellidomBuscar != "" && $unidadBuscar != ""  &&  $qnaBuscar != ""  &&  $anioBuscar != ""){

								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE (apellido_2='$apellidomBuscar' AND unidad='$unidadBuscar' AND quincenaAplicada='$qnaBuscar' AND anio='$anioBuscar')";

 							}elseif($rfcBuscar == "" && $nombreBuscar == "" && $apellidoBuscar != "" && $apellidomBuscar != "" && $unidadBuscar != ""  &&  $qnaBuscar != ""  &&  $anioBuscar != ""){

								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE (apellido_2='$apellidomBuscar' AND unidad='$unidadBuscar' AND quincenaAplicada='$qnaBuscar' AND anio='$anioBuscar')";

 							}elseif($rfcBuscar == "" && $nombreBuscar == "" && $apellidoBuscar != "" && $apellidomBuscar != "" && $unidadBuscar == ""  &&  $qnaBuscar == ""  &&  $anioBuscar != ""){

								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE (apellido_1='$apellidoBuscar' AND apellido_2='$apellidomBuscar' AND anio='$anioBuscar')";

 							}elseif($rfcBuscar == "" && $nombreBuscar != "" && $apellidoBuscar != "" && $apellidomBuscar != "" && $unidadBuscar != ""  &&  $qnaBuscar != ""  &&  $anioBuscar != ""){

								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE ( nombre='$nombreBuscar' AND apellido_1='$apellidoBuscar' AND apellido_2='$apellidomBuscar' AND unidad='$unidadBuscar' AND quincenaAplicada='$qnaBuscar' AND anio='$anioBuscar')";

 							}elseif($rfcBuscar == "" && $nombreBuscar != "" && $apellidoBuscar == "" && $apellidomBuscar != "" && $unidadBuscar != ""  &&  $qnaBuscar != ""  &&  $anioBuscar != ""){

								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE ( nombre='$nombreBuscar' AND apellido_2='$apellidomBuscar' AND unidad='$unidadBuscar' AND anio='$anioBuscar')";

 							}elseif($rfcBuscar != "" && $nombreBuscar == "" && $apellidoBuscar != "" && $apellidomBuscar == "" && $unidadBuscar != ""  &&  $qnaBuscar == ""  &&  $anioBuscar != ""){

								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE (rfc='$rfcBuscar' AND apellido_1='$apellidoBuscar' AND unidad='$unidadBuscar' AND anio='$anioBuscar')";

 							}elseif($rfcBuscar != "" && $nombreBuscar == "" && $apellidoBuscar != "" && $apellidomBuscar == "" && $unidadBuscar == ""  &&  $qnaBuscar == ""  &&  $anioBuscar != ""){

								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE (rfc='$rfcBuscar' AND apellido_1='$apellidoBuscar' AND anio='$anioBuscar')";

 							}elseif($rfcBuscar == "" && $nombreBuscar != "" && $apellidoBuscar == "" && $apellidomBuscar != "" && $unidadBuscar == ""  &&  $qnaBuscar == ""  &&  $anioBuscar != ""){

								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE (nombre='$nombreBuscar' AND apellido_2='$apellidomBuscar' AND anio='$anioBuscar')";

 							}elseif($rfcBuscar == "" && $nombreBuscar != "" && $apellidoBuscar == "" && $apellidomBuscar == "" && $unidadBuscar == ""  &&  $qnaBuscar == ""  &&  $anioBuscar != ""){

								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE (nombre='$nombreBuscar' AND anio='$anioBuscar')";

 							}elseif($rfcBuscar == "" && $nombreBuscar == "" && $apellidoBuscar != "" && $apellidomBuscar == "" && $unidadBuscar == ""  &&  $qnaBuscar == ""  &&  $anioBuscar != ""){

								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE (apellido_1='$apellidoBuscar'  AND anio='$anioBuscar')";

 							}elseif($rfcBuscar == "" && $nombreBuscar == "" && $apellidoBuscar == "" && $apellidomBuscar != "" && $unidadBuscar == ""  &&  $qnaBuscar == ""  &&  $anioBuscar != ""){

								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE (apellido_2='$apellidomBuscar'  AND anio='$anioBuscar')";

 							}elseif($rfcBuscar == "" && $nombreBuscar == "" && $apellidoBuscar == "" && $apellidomBuscar == "" && $unidadBuscar != ""  &&  $qnaBuscar == ""  &&  $anioBuscar != ""){

								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE (unidad='$unidadBuscar' AND anio='$anioBuscar')";

 							}elseif($rfcBuscar == "" && $nombreBuscar != "" && $apellidoBuscar != "" && $apellidomBuscar != "" && $unidadBuscar != ""  &&  $qnaBuscar != ""  &&  $anioBuscar == ""){

								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE (nombre='$nombreBuscar' AND apellido_1='$apellidoBuscar' AND apellido_2='$apellidomBuscar' AND quincenaAplicada='$qnaBuscar' AND unidad='$unidadBuscar')";

 							}elseif($rfcBuscar != "" && $nombreBuscar == "" && $apellidoBuscar != "" && $apellidomBuscar != "" && $unidadBuscar != ""  &&  $qnaBuscar != ""  &&  $anioBuscar == ""){

								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE (rfc='$rfcBuscar' AND apellido_1='$apellidoBuscar' AND apellido_2='$apellidomBuscar' AND unidad='$unidadBuscar' AND quincenaAplicada='$qnaBuscar')";

 							}elseif($rfcBuscar != "" && $nombreBuscar != "" && $apellidoBuscar == "" && $apellidomBuscar != "" && $unidadBuscar != ""  &&  $qnaBuscar != ""  &&  $anioBuscar == ""){

								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE (rfc='$rfcBuscar' AND nombre='$nombreBuscar' AND apellido_2='$apellidomBuscar' AND unidad='$unidadBuscar' AND quincenaAplicada='$qnaBuscar')";

 							}elseif($rfcBuscar != "" && $nombreBuscar != "" && $apellidoBuscar != "" && $apellidomBuscar == "" && $unidadBuscar != ""  &&  $qnaBuscar != ""  &&  $anioBuscar == ""){

								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE (rfc='$rfcBuscar' AND nombre='$nombreBuscar' AND apellido_1='$apellidoBuscar' AND unidad='$unidadBuscar' AND quincenaAplicada='$qnaBuscar')";

 							}elseif($rfcBuscar != "" && $nombreBuscar != "" && $apellidoBuscar != "" && $apellidomBuscar != "" && $unidadBuscar == ""  &&  $qnaBuscar != ""  &&  $anioBuscar == ""){

								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE (rfc='$rfcBuscar' AND nombre='$nombreBuscar' AND apellido_1='$apellidoBuscar' AND apellido_2='$apellidomBuscar' AND quincenaAplicada='$qnaBuscar')";

 							}elseif($rfcBuscar != "" && $nombreBuscar != "" && $apellidoBuscar != "" && $apellidomBuscar != "" && $unidadBuscar != ""  &&  $qnaBuscar == ""  &&  $anioBuscar == ""){

								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE (rfc='$rfcBuscar' AND nombre='$nombreBuscar' AND apellido_1='$apellidoBuscar' AND apellido_2='$apellidomBuscar' AND unidad='$unidadBuscar')";

 							}elseif ($rfcBuscar != "" && $nombreBuscar != "" && $apellidoBuscar != "" && $apellidomBuscar == "" && $unidadBuscar != ""  &&  $qnaBuscar == ""  &&  $anioBuscar != "") {
								
								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE (rfc='$rfcBuscar' AND nombre = '$nombreBuscar' AND apellido_1='$apellidoBuscar' AND unidad='$unidadBuscar' AND anio='$anioBuscar')";
	 							
							}



							/*
							elseif($rfcBuscar == "" && $nombreBuscar != "" && $apellidoBuscar != "" && $apellidomBuscar != "" && $unidadBuscar == ""  &&  $qnaBuscar == ""  &&  $anioBuscar != ""){

								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE (nombre='$nombreBuscar' AND apellido_1='$apellidoBuscar' AND apellido_2='$apellidomBuscar' AND anio='$anioBuscar')";

 							}elseif($rfcBuscar == "" && $nombreBuscar != "" && $apellidoBuscar != "" && $apellidomBuscar != "" && $unidadBuscar == ""  &&  $qnaBuscar != ""  &&  $anioBuscar != ""){

								$sql="SELECT id_movimiento,color_estado,unidad,rfc,usuario_name,quincenaAplicada,fechaIngreso,codigoMovimiento, fechaAutorizacion,descripcionMovimiento FROM fomope WHERE (nombre='$nombreBuscar' AND apellido_1='$apellidoBuscar' AND apellido_2='$apellidomBuscar' AND quincenaAplicada='$qnaBuscar' AND anio='$anioBuscar')";

 							}
 							*/


							$sqlColor="SELECT colorAsignado FROM usuarios WHERE usuario='$usuarioSeguir'";

							$idMatriz = 0;
							if ($result = mysqli_query($conexion,$sql)) {

								$totalFilas    =    mysqli_num_rows($result);  
								if($totalFilas == 0){
										
										echo('
											<br>
											<br>
											<div class="col-sm-12 ">
											<div class="plantilla-inputv text-dark">
											    <div class="card-body"><h2 align="center">No existe resultados de la busqueda, vuelve intentar.</h2></div>
										</div>
										</div>');
								}else{


									while($ver=mysqli_fetch_row($result)){ 

										if($ver[1] == 'negro1'){

											$ver[1] = 'DDSCH Rechazo';
										}elseif($ver[1] == 'negro'){

											$ver[1] = 'Unidad Edición';
										}elseif($ver[1] == 'amarillo'){

											$ver[1] = 'DSPO captura';
										}elseif($ver[1] == 'amarillo0'){

											$ver[1] = 'DDSCH Autorizacion';
										}elseif($ver[1] == 'cafe'){

											$ver[1] = 'DSPO Autorizacion';
										}elseif($ver[1] == 'naranja'){

											$ver[1] = 'DIPSP Autorizacion';
										}elseif($ver[1] == 'azul'){

											$ver[1] = 'DGRHO Autorizacion';
										}elseif($ver[1] == 'rosa'){

											$ver[1] = 'DSPO nomina';
										}elseif($ver[1] == 'verde'){

											$ver[1] = 'DDSCH loteo';
										}elseif($ver[1] == 'verde2'){

											$ver[1] = 'DDSCH Autorizacion';
										}elseif($ver[1] == 'gris'){

											$ver[1] = 'DDSCH Edición';
										}elseif($ver[1] == 'guinda'){

											$ver[1] = 'Finalizado';
										}
						 ?>
						<tr>
							<td><?php echo $ver[3] ?></td>
							<td><?php echo $ver[1] ?></td>
							<td><?php echo $ver[2] ?></td>
							<td><?php echo $ver[8] ?></td>
							<td><?php echo $ver[9] ?></td>
							<td><?php echo "

	
							<form method='post' action='./verList.php'>
								<input type='text' style='display: none;' name='usuario_rol' value='$usuarioSeguir'>
								<input type='text' style='display: none;' name='idMov' value='$ver[0]'>
								<input type='submit' name='verList' class='btn-secondary' value='Ver lista de Doc.'>

						
							</form> "

							?>
								

							</td>
							<td>
							</td>
						</tr>
						<?php 
							//$matriz = array($idMatriz => $ver[0] );
							$matriz[$idMatriz]= $ver[0];							
							$idMatriz++;
										}
									}
							}else{
								echo '<script type="text/javascript">alert("Error en la conexion");</script>';
								echo '<script type="text/javascript">alert("error '. mysqli_error($conexion).'");</script>';
							}
						}
						 ?>
		</table>
	
					<form method="post" action="./generarFiltroExcel/reporteBusqueda.php">
				

							<input type='submit' name='lista' class='btn btn btn-success text-white bord' value="Generar Excel">
							<input type='hidden' name='array' class='btn btn btn-success text-white bord' value='<?php  echo serialize($matriz); ?>'>
					</form>



	</center>

	
	</body>

</html>

