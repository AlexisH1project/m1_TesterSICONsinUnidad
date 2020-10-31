
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

	<!-- 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script type="text/javascript" src="./jquery/jquery.tabledit.js"></script>
		<script type="text/javascript" src="./jquery/jquery.tabledit.min.js"></script> -->

		<link href='css/jquery-ui.min.css' type='text/css' rel='stylesheet'>
		<link href='css/jquery-ui.css' type='text/css' rel='stylesheet'>

		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

		<script src="js/funciones.js?n=1"></script>
		<script src="js/jquery-3.4.1.min.js" type="text/javascript"></script>
		<script src="js/jquery-ui.min.js" type="text/javascript"></script>
		<script src="js/jquery-ui.js" type="text/javascript"></script>

		<script src="jquery/jquery.tabledit.js" type="text/javascript"></script>
		<script src="jquery/jquery.tabledit.min.js" type="text/javascript"></script>


		<link rel="stylesheet" href="css/estilossicon.css">
			<style type="text/css">

		  <style>
				table {
    width: 100%;
    display:block;
}
thead {
    display: inline-block;
    width: 100%;
    height: 60px;
    background: white;
}
tbody {
    max-height: 400px;
    display: inline-block;
    width: 100%;
    overflow: scroll;
}

		th, td{
			min-width: 150px;
			max-width: 151px;
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
				

				$('#data_table').Tabledit({
						deleteButton: false,
						editButton: false,
						columns: {
						identifier: [0, 'id'],
						editable: [[6,'entregaUnidad'],[7,'relacionesL'],[8,'validacionPersonal']]
						},
						hideIdentifier: true,
						url: 'editTabla.php'
				});

			
			});
		</script>



	</head>
	<body onload="nobackbutton();">
			<?php
				include "../controller/librerias/configuracion.php";
				$usuarioSeguir =  $_GET['usuario_rol'];
				$consulta = "SELECT * FROM usuarios WHERE usuario = '$usuarioSeguir'";
				if($resultadoSelect = mysqli_query($conexion, $consulta)){
					$rowUser = mysqli_fetch_assoc($resultadoSelect);
					
					if($rowUser['id_rol'] == 6){

			?>
			<br>
		  				<a  href= <?php echo ("'../../roles/menuPrincipal.php?usuario_rol=$usuarioSeguir'");?>><img class="img-responsive" src="img/ss1.png" height="90" width="280"/></a>

			<?php
					}else{
			?>
		  			<a  href= <?php echo ("'./menuPrincipal.php?usuario_rol=$usuarioSeguir'");?>><img class="img-responsive" src="img/ss1.png" height="90" width="280"/></a>
			<?php

					}
				}
			?>

		<nav class="navbar fixed-top navbar-expand-lg navbar-dark plantilla-input fixed-top">
		    <div class="container">
		      <div class="collapse navbar-collapse" id="navbarResponsive">
		        <ul class="navbar-nav ml-auto">          
		        
		          <li class="nav-item">
		            <a class="nav-link" href='../../LoginMenu/vista/cerrarsesion.php'>CERRAR SESIÓN</a>
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
				<h3>Consulta de Estado Fomope</h3>
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
								<label class="plantilla-label estilo-colorg" for="estatusB">Estatus:</label>
								<input type="text" class="form-control border-dark" id="estatus" name="estatus" value="<?php if(isset($_POST['estatus'])){ echo $_POST['estatus']; } ?>" maxlength="40">
							</div>

						</div>
						<div class="col">
							<div class="form-group col-md-12">
								<label class="plantilla-label estilo-colorg" for="Nivel">Nivel:</label>
								<input type="text" class="form-control border-dark" id="nivel" name="nivel" value="<?php if(isset($_POST['nivel'])){ echo $_POST['nivel']; }  ?>" maxlength="30">
							</div>

						</div>
						<div class="col">
							<div class="form-group col-md-12">
								<label class="plantilla-label estilo-colorg" for="CodigoP">Codigo de Puesto:</label>
								<input type="text" class="form-control border-dark" value="<?php if(isset($_POST['codigoPuesto'])){ echo $_POST['codigoPuesto']; } ?>" id="codigoPuesto" name="codigoPuesto" maxlength="30">
							</div>

						</div>
						<div class="col">
							<div class="form-group col-md-12">
								<label class="plantilla-label estilo-colorg" for="CodigoPF">Codigo de Puesto Federal:</label>
								<input type="text" class="form-control unexp border border-dark" id="codigoFederalPuestos" value="<?php if(isset($_POST['codigoFederalPuestos'])) { echo $_POST['codigoFederalPuestos']; } ?>" name="codigoFederalPuestos" maxlength="60">
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
	<!-- <div style="overflow-x:auto;"> 
		En el id de table se consulta que rol es para que solo esa persona pueda editar los apartados
	-->
	<div class="table-responsive">
		<table id="<?php if($rowUser['id_rol'] == 1){echo "data_table";} ?>" class="table table-striped table-bordered" style="margin-bottom: 0;  font-size:70%;" >
			
						<thead>
						    <tr>
							<!-- <td>Observacion</td>
							<td>ID Fomope</td> -->
							
							<th scope="titulo" style="display: none;"></th>
							 <th scope="titulo" style="text-align: center">RFC</th>
						      <th scope="titulo" style="text-align: center"   style="text-align: center">Estatus Fomope</th>
						      <th scope="titulo"  style="text-align: center">Unidad</th>
						      <th scope="titulo"  style="text-align: center">Nivel</th>
						       <th scope="titulo" style="text-align: center">Codigo de Puesto</th>
						       <th scope="titulo" style="text-align: center">Codigo Federal de Puesto</th>
						       <th scope="titulo" style="text-align: center">Tipo de Nombramiento</th>
						       <th scope="titulo" style="text-align: center">Argumento de Puesto</th>
						      
						   </tr>
						</thead>
				 <tbody>
				

				<?php 
					include "../controller/librerias/configuracion.php";

			if(isset($_POST['buscar'])){// $_SERVER['REQUEST_METHOD'] == 'POST' if(){
							
							$rfcBuscar = $_POST['rfc'];
							$estatusBuscar = $_POST['estatus'];
							$nivelBuscar = $_POST['nivel'];
							$codigoPuestoBuscar = $_POST['codigoPuesto'];
							$codigoFederalPuestosBuscar = $_POST['codigoFederalPuestos'];
							$anioBuscar = $_POST['anioBus'];
							$qnaBuscar = $_POST['qnaOption'];
							
							if($rfcBuscar == "" && $estatusBuscar == "" && $nivelBuscar == "" && $codigoPuestoBuscar == "" && $qnaBuscar == ""  &&  $codigoFederalPuestosBuscar == "" && $anioBuscar != ""){

								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE (anio='$anioBuscar')";
 							
 							}elseif($rfcBuscar == "" && $estatusBuscar == "" && $nivelBuscar == "" && $codigoPuestoBuscar == "" && $qnaBuscar != ""  &&  $codigoFederalPuestosBuscar == "" && $anioBuscar != ""){

								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE (anio='$anioBuscar' AND quincenaAplicada ='$qnaBuscar')";
 							
 							}elseif($rfcBuscar != "" && $estatusBuscar == "" && $nivelBuscar == "" && $codigoPuestoBuscar == "" && $qnaBuscar == ""  &&  $codigoFederalPuestosBuscar == "" && $anioBuscar != ""){

								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE (anio='$anioBuscar' AND rfc='$rfcBuscar')";

 							}elseif($rfcBuscar == "" && $estatusBuscar != "" && $nivelBuscar == "" && $codigoPuestoBuscar == "" && $qnaBuscar == ""  &&  $codigoFederalPuestosBuscar == "" && $anioBuscar != ""){

								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE (anio='$anioBuscar' AND estatus='$estatusBuscar)";
 							
 							}elseif($rfcBuscar == "" && $estatusBuscar == "" && $nivelBuscar != "" && $codigoPuestoBuscar == "" && $qnaBuscar == ""  &&  $codigoFederalPuestosBuscar == "" && $anioBuscar != ""){

								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE (anio='$anioBuscar' AND nivel='$nivelBuscar')";
 							
 							}elseif($rfcBuscar == "" && $estatusBuscar == "" && $nivelBuscar == "" && $codigoPuestoBuscar != "" && $qnaBuscar == ""  &&  $codigoFederalPuestosBuscar == "" && $anioBuscar != ""){

								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE (anio='$anioBuscar' AND codigoPuesto='$codigoPuestoBuscar')";
 							
 							}elseif($rfcBuscar == "" && $estatusBuscar == "" && $nivelBuscar == "" && $codigoPuestoBuscar == "" && $qnaBuscar == ""  &&  $codigoFederalPuestosBuscar != "" && $anioBuscar != ""){

								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE (anio='$anioBuscar' AND codigoFederalPuestos='$codigoFederalPuestosBuscar')";
 							}elseif($rfcBuscar != "" && $estatusBuscar != "" && $nivelBuscar != "" && $codigoPuestoBuscar != "" && $qnaBuscar != "" &&  $codigoFederalPuestosBuscar != ""){

								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE (rfc='$rfcBuscar' AND estatus='$estatusBuscar' AND nivel='$nivelBuscar' AND codigoPuesto='$codigoPuestoBuscar' AND quincenaAplicada='$qnaBuscar' AND codigoFederalPuestos='$codigoFederalPuestosBuscar')";

 							}elseif($rfcBuscar == "" && $estatusBuscar != "" && $nivelBuscar != "" && $codigoPuestoBuscar != "" && $qnaBuscar != "" &&  $codigoFederalPuestosBuscar != ""){

								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE (estatus='$estatusBuscar' AND nivel='$nivelBuscar' AND codigoPuesto='$codigoPuestoBuscar' AND quincenaAplicada='$qnaBuscar' AND codigoFederalPuestos='$codigoFederalPuestosBuscar')";
 							}elseif ($rfcBuscar != "" && $estatusBuscar == "" && $nivelBuscar == "" && $codigoPuestoBuscar == "" && $qnaBuscar == ""  &&  $codigoFederalPuestosBuscar == "") {
								
								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE (rfc LIKE '%$rfcBuscar%')";
							}elseif ($rfcBuscar != "" && $estatusBuscar == "" && $nivelBuscar != "" && $codigoPuestoBuscar == "" && $qnaBuscar == ""  &&  $codigoFederalPuestosBuscar == "") {
								
								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE (rfc='$rfcBuscar' AND nivel='$nivelBuscar')";
								
							}elseif ($rfcBuscar != "" && $estatusBuscar == "" && $nivelBuscar != "" && $codigoPuestoBuscar != "" && $qnaBuscar == ""  &&  $codigoFederalPuestosBuscar == "") {
								
								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE (rfc='$rfcBuscar' AND nivel='$nivelBuscar' AND codigoPuesto='$codigoPuestoBuscar')";
								
							}elseif ($rfcBuscar != "" && $estatusBuscar == "" && $nivelBuscar != "" && $codigoPuestoBuscar != "" && $qnaBuscar != ""  &&  $codigoFederalPuestosBuscar == "") {
								
								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE (rfc='$rfcBuscar' AND nivel='$nivelBuscar' AND codigoPuesto='$codigoPuestoBuscar' AND quincenaAplicada='$qnaBuscar')";

							}elseif ($rfcBuscar != "" && $estatusBuscar == "" && $nivelBuscar == "" && $codigoPuestoBuscar == "" && $qnaBuscar == ""  &&  $codigoFederalPuestosBuscar != "") {
								
								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE (rfc='$rfcBuscar' AND codigoFederalPuestos='$codigoFederalPuestosBuscar')";

							}elseif ($rfcBuscar != "" && $estatusBuscar == "" && $nivelBuscar != "" && $codigoPuestoBuscar != "" && $qnaBuscar != ""  &&  $codigoFederalPuestosBuscar != "") {
								
								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE (rfc='$rfcBuscar' AND nivel='$nivelBuscar' AND codigoPuesto='$codigoPuestoBuscar' AND quincenaAplicada='$qnaBuscar'  AND codigoFederalPuestos='$codigoFederalPuestosBuscar')";
								
							}elseif ($rfcBuscar != "" && $estatusBuscar == "" && $nivelBuscar != "" && $codigoPuestoBuscar == "" && $qnaBuscar != ""  &&  $codigoFederalPuestosBuscar != "") {
								
								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE (rfc='$rfcBuscar' AND nivel='$nivelBuscar' AND quincenaAplicada='$qnaBuscar' AND codigoFederalPuestos='$codigoFederalPuestosBuscar')";
								
							}elseif ($rfcBuscar != "" && $estatusBuscar == "" && $nivelBuscar != "" && $codigoPuestoBuscar == "" && $qnaBuscar == ""  &&  $codigoFederalPuestosBuscar != "") {
								
								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE (rfc='$rfcBuscar' AND nivel='$nivelBuscar' AND codigoFederalPuestos='$codigoFederalPuestosBuscar')";
								
							}elseif ($rfcBuscar != "" && $estatusBuscar == "" && $nivelBuscar != "" && $codigoPuestoBuscar != "" && $qnaBuscar == ""  &&  $codigoFederalPuestosBuscar != "") {
								
								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE (rfc='$rfcBuscar' AND nivel='$nivelBuscar' AND codigoPuesto='$codigoPuestoBuscar' AND codigoFederalPuestos='$codigoFederalPuestosBuscar')";
								
							}elseif ($rfcBuscar != "" && $estatusBuscar == "" && $nivelBuscar != "" && $codigoPuestoBuscar == "" && $qnaBuscar != ""  &&  $codigoFederalPuestosBuscar == "") {
								
								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE (rfc='$rfcBuscar' AND nivel='$nivelBuscar' AND quincenaAplicada='$qnaBuscar')";
								
							}elseif ($rfcBuscar != "" && $estatusBuscar == "" && $nivelBuscar == "" && $codigoPuestoBuscar != "" && $qnaBuscar == ""  &&  $codigoFederalPuestosBuscar == "") {
								
								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE (rfc='$rfcBuscar' AND codigoPuesto='$codigoPuestoBuscar')";
								
							}elseif ($rfcBuscar != "" && $estatusBuscar == "" && $nivelBuscar == "" && $codigoPuestoBuscar != "" && $qnaBuscar != ""  &&  $codigoFederalPuestosBuscar == "") {
								
								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE (rfc='$rfcBuscar' AND codigoPuesto='$codigoPuestoBuscar' AND quincenaAplicada='$qnaBuscar')";
								
							}elseif ($rfcBuscar != "" && $estatusBuscar == "" && $nivelBuscar == "" && $codigoPuestoBuscar != "" && $qnaBuscar == ""  &&  $codigoFederalPuestosBuscar != "") {
								
								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE (rfc='$rfcBuscar' AND codigoPuesto='$codigoPuestoBuscar' AND codigoFederalPuestos='$codigoFederalPuestosBuscar')";
								
								
							}elseif ($rfcBuscar != "" && $estatusBuscar == "" && $nivelBuscar == "" && $codigoPuestoBuscar == "" && $qnaBuscar != ""  &&  $codigoFederalPuestosBuscar == "") {
								
								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE (rfc='$rfcBuscar' AND quincenaAplicada='$qnaBuscar')";
								
							}
							elseif ($rfcBuscar != "" && $estatusBuscar == "" && $nivelBuscar == "" && $codigoPuestoBuscar == "" && $qnaBuscar != ""  &&  $codigoFederalPuestosBuscar != "") {
								
								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE (rfc='$rfcBuscar' AND quincenaAplicada='$qnaBuscar' AND codigoFederalPuestos='$codigoFederalPuestosBuscar')";
								
	 							
							}elseif ($rfcBuscar == "" && $estatusBuscar == "" && $nivelBuscar != "" && $codigoPuestoBuscar == "" && $qnaBuscar == ""  &&  $codigoFederalPuestosBuscar != "") {
								
								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE ( nivel='$nivelBuscar' AND codigoFederalPuestos='$codigoFederalPuestosBuscar')";
							
							}elseif ($rfcBuscar == "" && $estatusBuscar == "" && $nivelBuscar == "" && $codigoPuestoBuscar != "" && $qnaBuscar == ""  &&  $codigoFederalPuestosBuscar != "") {
								
								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE ( codigoPuesto='$codigoPuestoBuscar' AND codigoFederalPuestos='$codigoFederalPuestosBuscar')";
							
							}elseif ($rfcBuscar == "" && $estatusBuscar == "" && $nivelBuscar == "" && $codigoPuestoBuscar == "" && $qnaBuscar != ""  &&  $codigoFederalPuestosBuscar != "") {
								
								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE ( quincenaAplicada='$qnaBuscar' AND codigoFederalPuestos='$codigoFederalPuestosBuscar')";
							
							}elseif ($rfcBuscar == "" && $estatusBuscar == "" && $nivelBuscar == "" && $codigoPuestoBuscar == "" && $qnaBuscar != ""  &&  $codigoFederalPuestosBuscar != "") {
								
								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE ( quincenaAplicada='$qnaBuscar' AND codigoFederalPuestos='$codigoFederalPuestosBuscar')";
								
	 							
							}elseif ($rfcBuscar != "" && $estatusBuscar != "" && $nivelBuscar == "" && $codigoPuestoBuscar == "" && $qnaBuscar == ""  &&  $codigoFederalPuestosBuscar == "") {
							 	
								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE (rfc='$rfcBuscar' AND estatus = '$estatusBuscar')";
	
								
							}elseif ($rfcBuscar != "" && $estatusBuscar != "" && $nivelBuscar != "" && $codigoPuestoBuscar == "" && $qnaBuscar == ""  &&  $codigoFederalPuestosBuscar == "") {
								
								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE (rfc='$rfcBuscar' AND estatus = '$estatusBuscar' AND nivel='$nivelBuscar' )";
								
							}elseif ($rfcBuscar != "" && $estatusBuscar != "" && $nivelBuscar == "" && $codigoPuestoBuscar != "" && $qnaBuscar == ""  &&  $codigoFederalPuestosBuscar == "") {
								
								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE (rfc='$rfcBuscar' AND estatus = '$estatusBuscar' AND codigoPuesto='$codigoPuestoBuscar')";
								
							}elseif ($rfcBuscar != "" && $estatusBuscar != "" && $nivelBuscar == "" && $codigoPuestoBuscar == "" && $qnaBuscar != ""  &&  $codigoFederalPuestosBuscar == "") {
								
								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE (rfc='$rfcBuscar' AND estatus = '$estatusBuscar' AND quincenaAplicada='$qnaBuscar' )";
								
							}elseif ($rfcBuscar != "" && $estatusBuscar != "" && $nivelBuscar == "" && $codigoPuestoBuscar == "" && $qnaBuscar == ""  &&  $codigoFederalPuestosBuscar != "") {
								
								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE (rfc='$rfcBuscar' AND estatus = '$estatusBuscar' AND  codigoFederalPuestos='$codigoFederalPuestosBuscar')";
								
							}elseif ($rfcBuscar != "" && $estatusBuscar != "" && $nivelBuscar != "" && $codigoPuestoBuscar != "" && $qnaBuscar == ""  &&  $codigoFederalPuestosBuscar != "") {
								
								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE (rfc='$rfcBuscar' AND estatus = '$estatusBuscar' AND nivel='$nivelBuscar' AND codigoPuesto='$codigoPuestoBuscar' AND  codigoFederalPuestos='$codigoFederalPuestosBuscar')";
								
							}elseif ($rfcBuscar != "" && $estatusBuscar != "" && $nivelBuscar != "" && $codigoPuestoBuscar == "" && $qnaBuscar == ""  &&  $codigoFederalPuestosBuscar != "") {
								
								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE (rfc='$rfcBuscar' AND estatus = '$estatusBuscar' AND nivel='$nivelBuscar' AND  codigoFederalPuestos='$codigoFederalPuestosBuscar')";
								
							}elseif ($rfcBuscar != "" && $estatusBuscar != "" && $nivelBuscar == "" && $codigoPuestoBuscar != "" && $qnaBuscar != ""  &&  $codigoFederalPuestosBuscar == "") {
								
								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE (rfc='$rfcBuscar' AND estatus = '$estatusBuscar' AND codigoPuesto='$codigoPuestoBuscar' AND quincenaAplicada='$qnaBuscar')";
	 							
							}elseif ($rfcBuscar != "" && $estatusBuscar != "" && $nivelBuscar != "" && $codigoPuestoBuscar == "" && $qnaBuscar != ""  &&  $codigoFederalPuestosBuscar == "") {
								
								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE (rfc='$rfcBuscar' AND estatus = '$estatusBuscar' AND nivel='$nivelBuscar' AND quincenaAplicada='$qnaBuscar')";
	 							
	 							
							}elseif ($rfcBuscar != "" && $estatusBuscar != "" && $nivelBuscar == "" && $codigoPuestoBuscar != "" && $qnaBuscar != ""  &&  $codigoFederalPuestosBuscar != "") {
								
								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE (rfc='$rfcBuscar' AND estatus = '$estatusBuscar' AND codigoPuesto='$codigoPuestoBuscar' AND quincenaAplicada='$qnaBuscar' AND codigoFederalPuestos='$codigoFederalPuestosBuscar')";
	 							
							}elseif ($rfcBuscar != "" && $estatusBuscar != "" && $nivelBuscar == "" && $codigoPuestoBuscar != "" && $qnaBuscar == ""  &&  $codigoFederalPuestosBuscar != "") {
								
								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE (rfc='$rfcBuscar' AND estatus = '$estatusBuscar' AND codigoPuesto='$codigoPuestoBuscar' AND codigoFederalPuestos='$codigoFederalPuestosBuscar')";
	 							
							}elseif ($rfcBuscar != "" && $estatusBuscar != "" && $nivelBuscar != "" && $codigoPuestoBuscar == "" && $qnaBuscar != ""  &&  $codigoFederalPuestosBuscar != "") {
								
								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE (rfc='$rfcBuscar' AND estatus = '$estatusBuscar' AND nivel='$nivelBuscar' AND quincenaAplicada='$qnaBuscar' AND codigoFederalPuestos='$codigoFederalPuestosBuscar')";
	 							
							}elseif($rfcBuscar != "" && $estatusBuscar != "" && $nivelBuscar == "" && $codigoPuestoBuscar == "" && $qnaBuscar != ""  &&  $codigoFederalPuestosBuscar != "") {
								
								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE (rfc='$rfcBuscar' AND estatus = '$estatusBuscar' AND nivel='$nivelBuscar')";
								
							}elseif ($rfcBuscar != "" && $estatusBuscar == "" && $nivelBuscar != "" && $codigoPuestoBuscar == "" && $qnaBuscar == ""  &&  $codigoFederalPuestosBuscar == "") {
								
								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE (rfc='$rfcBuscar'  AND nivel='$nivelBuscar')";
								
							}elseif ($rfcBuscar != "" && $estatusBuscar != "" && $nivelBuscar != "" && $codigoPuestoBuscar != "" && $qnaBuscar == ""  &&  $codigoFederalPuestosBuscar == "") {
								
								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE (rfc='$rfcBuscar' AND estatus = '$estatusBuscar' AND nivel='$nivelBuscar' AND codigoPuesto='$codigoPuestoBuscar')";
								
							}elseif ($rfcBuscar == "" && $estatusBuscar != "" && $nivelBuscar == "" && $codigoPuestoBuscar == "" && $qnaBuscar == ""  &&  $codigoFederalPuestosBuscar == "") {
								
								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE (estatus LIKE '%$estatusBuscar%')";

								
							}elseif ($rfcBuscar == "" && $estatusBuscar != "" && $nivelBuscar != "" && $codigoPuestoBuscar == "" && $qnaBuscar == ""  &&  $codigoFederalPuestosBuscar == "") {
								
								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE (estatus = '$estatusBuscar' AND nivel='$nivelBuscar')";

							}elseif ($rfcBuscar == "" && $estatusBuscar != "" && $nivelBuscar != "" && $codigoPuestoBuscar != "" && $qnaBuscar == ""  &&  $codigoFederalPuestosBuscar == "") {
								
								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE ( estatus = '$estatusBuscar' AND nivel='$nivelBuscar' AND codigoPuesto='$codigoPuestoBuscar')";
								
							}elseif($rfcBuscar == "" && $estatusBuscar != "" && $nivelBuscar != "" && $codigoPuestoBuscar != "" && $qnaBuscar != ""  &&  $codigoFederalPuestosBuscar == ""){

								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE (estatus='$estatusBuscar' AND nivel='$nivelBuscar' AND codigoPuesto='$codigoPuestoBuscar' AND quincenaAplicada='$qnaBuscar')";

 							}elseif ($rfcBuscar == "" && $estatusBuscar == "" && $nivelBuscar != "" && $codigoPuestoBuscar == "" && $qnaBuscar == ""  &&  $codigoFederalPuestosBuscar == "") {
								
								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE (nivel LIKE '%$nivelBuscar%')";

							}elseif ($rfcBuscar == "" && $estatusBuscar == "" && $nivelBuscar != "" && $codigoPuestoBuscar != "" && $qnaBuscar == ""  &&  $codigoFederalPuestosBuscar == "") {
								
								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE (nivel='$nivelBuscar' AND codigoPuesto='$codigoPuestoBuscar')";

								
							}elseif($rfcBuscar == "" && $estatusBuscar == "" && $nivelBuscar != "" && $codigoPuestoBuscar != "" && $qnaBuscar != ""  &&  $codigoFederalPuestosBuscar == ""){

								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE (nivel='$nivelBuscar' AND codigoPuesto='$codigoPuestoBuscar' AND quincenaAplicada='$qnaBuscar')";


 							}elseif($rfcBuscar == "" && $estatusBuscar == "" && $nivelBuscar != "" && $codigoPuestoBuscar != "" && $qnaBuscar != ""  &&  $codigoFederalPuestosBuscar != ""){

								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE (nivel='$nivelBuscar' AND codigoPuesto='$codigoPuestoBuscar' AND quincenaAplicada='$qnaBuscar' AND codigoFederalPuestos='$codigoFederalPuestosBuscar')";


 							}elseif($rfcBuscar == "" && $estatusBuscar == "" && $nivelBuscar == "" && $codigoPuestoBuscar != "" && $qnaBuscar != ""  &&  $codigoFederalPuestosBuscar != ""){

								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE ( codigoPuesto='$codigoPuestoBuscar' AND quincenaAplicada='$qnaBuscar' AND codigoFederalPuestos='$codigoFederalPuestosBuscar')";

 							}elseif($rfcBuscar == "" && $estatusBuscar == "" && $nivelBuscar != "" && $codigoPuestoBuscar != "" && $qnaBuscar == ""  &&  $codigoFederalPuestosBuscar != ""){

								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE (nivel='$nivelBuscar' AND codigoPuesto='$codigoPuestoBuscar' AND codigoFederalPuestos='$codigoFederalPuestosBuscar')";

 							}elseif ($rfcBuscar == "" && $estatusBuscar == "" && $nivelBuscar == "" && $codigoPuestoBuscar != "" && $qnaBuscar == ""  &&  $codigoFederalPuestosBuscar == "") {
								
								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE (codigoPuesto LIKE '%$codigoPuestoBuscar%')";
								
							}elseif($rfcBuscar == "" && $estatusBuscar == "" && $nivelBuscar == "" && $codigoPuestoBuscar != "" && $qnaBuscar != ""  &&  $codigoFederalPuestosBuscar == ""){

								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE (codigoPuesto='$codigoPuestoBuscar' AND quincenaAplicada='$qnaBuscar')";

 							}elseif($rfcBuscar == "" && $estatusBuscar == "" && $nivelBuscar == "" && $codigoPuestoBuscar == "" && $qnaBuscar != ""  &&  $codigoFederalPuestosBuscar == ""){

								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE (quincenaAplicada LIKE '%$qnaBuscar%')";

 							}elseif ($rfcBuscar == "" && $estatusBuscar != "" && $nivelBuscar == "" && $codigoPuestoBuscar != "" && $qnaBuscar == ""  &&  $codigoFederalPuestosBuscar == "") {
								
								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE ( estatus = '$estatusBuscar' AND codigoPuesto='$codigoPuestoBuscar')";
								
							}elseif ($rfcBuscar == "" && $estatusBuscar != "" && $nivelBuscar == "" && $codigoPuestoBuscar != "" && $qnaBuscar == ""  &&  $codigoFederalPuestosBuscar != "") {
								
								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE ( estatus = '$estatusBuscar' AND codigoPuesto='$codigoPuestoBuscar' AND codigoFederalPuestos='$codigoFederalPuestosBuscar')";
								
							}elseif ($rfcBuscar == "" && $estatusBuscar != "" && $nivelBuscar == "" && $codigoPuestoBuscar != "" && $qnaBuscar != ""  &&  $codigoFederalPuestosBuscar == "") {
								
								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE ( estatus = '$estatusBuscar' AND codigoPuesto='$codigoPuestoBuscar' AND quincenaAplicada='$qnaBuscar')";
								
							}elseif ($rfcBuscar == "" && $estatusBuscar != "" && $nivelBuscar == "" && $codigoPuestoBuscar != "" && $qnaBuscar != ""  &&  $codigoFederalPuestosBuscar != "") {
								
								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE ( estatus = '$estatusBuscar' AND codigoPuesto='$codigoPuestoBuscar' AND quincenaAplicada='$qnaBuscar' AND codigoFederalPuestos='$codigoFederalPuestosBuscar')";
								
							}elseif ($rfcBuscar == "" && $estatusBuscar != "" && $nivelBuscar == "" && $codigoPuestoBuscar == "" && $qnaBuscar != ""  &&  $codigoFederalPuestosBuscar != "") {
								
								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE ( estatus = '$estatusBuscar' AND quincenaAplicada='$qnaBuscar' AND codigoFederalPuestos='$codigoFederalPuestosBuscar')";
								
							}elseif ($rfcBuscar == "" && $estatusBuscar != "" && $nivelBuscar != "" && $codigoPuestoBuscar == "" && $qnaBuscar == ""  &&  $codigoFederalPuestosBuscar == "") {
								
								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE ( estatus = '$estatusBuscar' AND nivel='$nivelBuscar')";
								
							}elseif ($rfcBuscar == "" && $estatusBuscar != "" && $nivelBuscar != "" && $codigoPuestoBuscar != "" && $qnaBuscar == ""  &&  $codigoFederalPuestosBuscar == "") {
								
								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE ( estatus = '$estatusBuscar' AND nivel='$nivelBuscar' AND codigoPuesto='$codigoPuestoBuscar')";
								
							}elseif ($rfcBuscar == "" && $estatusBuscar != "" && $nivelBuscar != "" && $codigoPuestoBuscar == "" && $qnaBuscar != ""  &&  $codigoFederalPuestosBuscar == "") {
								
								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE ( estatus = '$estatusBuscar' AND nivel='$nivelBuscar' AND quincenaAplicada='$qnaBuscar')";
	 							
							}elseif ($rfcBuscar == "" && $estatusBuscar != "" && $nivelBuscar != "" && $codigoPuestoBuscar != "" && $qnaBuscar == ""  &&  $codigoFederalPuestosBuscar != "") {
								
								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE ( estatus = '$estatusBuscar' AND nivel='$nivelBuscar' AND codigoPuesto='$codigoPuestoBuscar' AND codigoFederalPuestos='$codigoFederalPuestosBuscar')";
								
							}elseif ($rfcBuscar == "" && $estatusBuscar != "" && $nivelBuscar != "" && $codigoPuestoBuscar == "" && $qnaBuscar != ""  &&  $codigoFederalPuestosBuscar != "") {
								
								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE ( estatus = '$estatusBuscar' AND nivel='$nivelBuscar' AND quincenaAplicada='$qnaBuscar' AND codigoFederalPuestos='$codigoFederalPuestosBuscar')";
	 							
							}elseif ($rfcBuscar == "" && $estatusBuscar != "" && $nivelBuscar != "" && $codigoPuestoBuscar == "" && $qnaBuscar == ""  &&  $codigoFederalPuestosBuscar != "") {
								
								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE ( estatus = '$estatusBuscar' AND nivel='$nivelBuscar' AND codigoFederalPuestos='$codigoFederalPuestosBuscar')";
	 							
							}elseif ($rfcBuscar == "" && $estatusBuscar == "" && $nivelBuscar != "" && $codigoPuestoBuscar == "" && $qnaBuscar != ""  &&  $codigoFederalPuestosBuscar != "") {
								
								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE ( nivel='$nivelBuscar' AND quincenaAplicada='$qnaBuscar' AND codigoFederalPuestos='$codigoFederalPuestosBuscar')";
	 							
							}elseif ($rfcBuscar == "" && $estatusBuscar != "" && $nivelBuscar == "" && $codigoPuestoBuscar == "" && $qnaBuscar != ""  &&  $codigoFederalPuestosBuscar == "") {
								
								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE ( estatus = '$estatusBuscar' AND quincenaAplicada='$qnaBuscar')";
	 							
							}elseif ($rfcBuscar == "" && $estatusBuscar == "" && $nivelBuscar != "" && $codigoPuestoBuscar == "" && $qnaBuscar != ""  &&  $codigoFederalPuestosBuscar == "") {
								
								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE ( nivel='$nivelBuscar' AND quincenaAplicada='$qnaBuscar')";

	 						}elseif ($rfcBuscar == "" && $estatusBuscar != "" && $nivelBuscar != "" && $codigoPuestoBuscar != "" && $qnaBuscar == ""  &&  $codigoFederalPuestosBuscar == "") {
								
								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE ( 
								nivel='$nivelBuscar' AND codigoPuesto='$codigoPuestoBuscar')";
								
							}elseif($rfcBuscar == "" && $estatusBuscar == "" && $nivelBuscar == "" && $codigoPuestoBuscar == "" && $qnaBuscar == ""  &&  $codigoFederalPuestosBuscar != ""){

								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE ( codigoFederalPuestos='$codigoFederalPuestosBuscar')";

 							}elseif($rfcBuscar == "" && $estatusBuscar != "" && $nivelBuscar == "" && $codigoPuestoBuscar == "" && $qnaBuscar == ""  &&  $codigoFederalPuestosBuscar != ""){

								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE (estatus = '$estatusBuscar' AND codigoFederalPuestos='$codigoFederalPuestosBuscar')";

 							}elseif($rfcBuscar == "" && $estatusBuscar == "" && $nivelBuscar == "" && $codigoPuestoBuscar == "" && $qnaBuscar == ""  &&  $codigoFederalPuestosBuscar == ""){

								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE (rfc='$rfcBuscar' AND estatus='$estatusBuscar' AND nivel='$nivelBuscar' AND codigoPuesto='$codigoPuestoBuscar' AND quincenaAplicada='$qnaBuscar'  AND codigoFederalPuestos='$codigoFederalPuestosBuscar')";

 							}elseif($rfcBuscar != "" && $estatusBuscar != "" && $nivelBuscar != "" && $codigoPuestoBuscar != "" && $qnaBuscar != ""  &&  $codigoFederalPuestosBuscar == ""){

								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE (rfc='$rfcBuscar' AND estatus='$estatusBuscar' AND nivel='$nivelBuscar' AND codigoPuesto='$codigoPuestoBuscar' AND quincenaAplicada='$qnaBuscar')";

 							}



							/*
							elseif($rfcBuscar == "" && $estatusBuscar != "" && $nivelBuscar != "" && $codigoPuestoBuscar != "" && $qnaBuscar == ""  &&  $anioBuscar == ""  &&  $anioBuscar != ""){

								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE (estatus='$estatusBuscar' AND nivel='$nivelBuscar' AND codigoPuesto='$codigoPuestoBuscar' AND anio='$anioBuscar')";

 							}elseif($rfcBuscar == "" && $estatusBuscar != "" && $nivelBuscar != "" && $codigoPuestoBuscar != "" && $qnaBuscar == ""  &&  $anioBuscar != ""  &&  $anioBuscar != ""){

								$sql = "SELECT * FROM plazas_ctrlp_m2 WHERE (estatus='$estatusBuscar' AND nivel='$nivelBuscar' AND codigoPuesto='$codigoPuestoBuscar' AND anio='$anioBuscar' AND anio='$anioBuscar')";

 							}
 							*/


							$sqlColor="SELECT colorAsignado FROM usuarios WHERE usuario='$usuarioSeguir'";

							$idMatriz = 0;
							$imprimirNoExiste = 0;
							if ($result = mysqli_query($conexion,$sql)) {

								$totalFilas    =    mysqli_num_rows($result);  
								if($totalFilas == 0){
										$imprimirNoExiste ++;
									//	$matrizPlazases = queryEventual($sql2,$imprimirNoExiste);
								}else{


								while($ver=mysqli_fetch_row($result)){ 
						 ?>
						<tr id="<?php echo $ver[0] ?>">
							<td style="display: none;"><?php echo $ver[0] ?></td>
							<td><?php echo $ver[23] ?></td>
							<td>
				<!-- activamos funcion de .ajax para poder mostrar el histirial del proceso del Fomope  
							<button type="button"  onclick="guardarId(<?php echo $ver[0]; ?>)"  id="verHistorial" name="verHistorial" class='btn-secondary' data-toggle="modal" data-target="#exampleModal1" data-whatever="@getbootstrap"><?php echo $ver[1] ?></button> -->
							<?php echo $ver[24] ?>
							</td>
							<td><?php echo $ver[2] ?></td>
							<td><?php echo $ver[6] ?></td>
							<td><?php echo $ver[7] ?></td>
							<td><?php echo $ver[9] ?></td>
							<td><?php echo $ver[14] ?></td>
							<td><?php echo $ver[16] ?></td>
							<td>
								<button type="button" class="btn btn-outline-secondary" onclick="verDatosQr('<?php echo $ver[0] ?>' , '<?php echo $usuarioSeguir ?>' )" id="ver">Ver</button>
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
		 </tbody>
		</table>
	</div>	
					<form method="post" action="./generarFiltroExcel/reporteBusqueda.php">
							<input type='hidden' name='array' class='btn btn btn-success text-white bord' value='<?php  echo serialize($matriz); ?>'>

							<input type='submit' name='lista' class='btn btn btn-success text-white bord' value="Generar Excel">
							

					</form>

				<!-- 	<div id="result" style="display: none;"> -->
	</center>

					<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title" id="exampleModalLabel">Historial del Fomope</h5>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <div class="modal-body">	          
							      </div>
							       
							    </div>
							  </div>
							</div>
	
	</body>


</html>

