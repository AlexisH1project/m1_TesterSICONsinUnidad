
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
			});

			function obtenerRadioSeleccionado(formulario, nombre, userRol, tabla){
					var contador = 0;
						elementosSelectR = [];
						elementos = document.getElementById(formulario).elements;
						longitud = document.getElementById(formulario).length;
						var fechaValidacion = document.getElementById("fechaValidacionPersonal").value;
						var fechaLab = document.getElementById("fechaEntregaRlabores").value;
						var fechaUr = document.getElementById("fechaEntregaUnidad").value;
						console.log(fechaValidacion);
						for (var i = 0; i < longitud; i++){
							if(elementos[i].name == nombre && elementos[i].type == "checkbox" && elementos[i].checked == true){
									elementosSelectR[contador]=elementos[i].value;
									//alert(elementosSelectR[contador]);
									contador++;
							}
						}
						if(contador > 0){
							window.location.href = './Controller/actualizarTodoFechas.php?id_fomope='+elementosSelectR+'&idSeguir='+userRol+'&Fvalidacion='+fechaValidacion+'&Flab='+fechaLab+'&Fur='+fechaUr+'&tabBD='+tabla;
						}
						//return false;
			}
			
			function obtenerRadioSeleccionado2(formulario, nombre, userRol, tabla){
					var contador = 0;
						elementosSelectR = [];
						elementos = document.getElementById(formulario).elements;
						longitud = document.getElementById(formulario).length;
						var fechaEnFirma = document.getElementById("enFirma").value;
						var fechaPersonla = document.getElementById("envioPersonal").value;
						var fechaUr = document.getElementById("entregaUR").value;
						var fechaFirmado = document.getElementById("firmado").value;
						var fechaRecepcion = document.getElementById("recepcion").value;
						
						for (var i = 0; i < longitud; i++){
							if(elementos[i].name == nombre && elementos[i].type == "checkbox" && elementos[i].checked == true){
									elementosSelectR[contador]=elementos[i].value;
									//alert(elementosSelectR[contador]);
									contador++;
							}
						}
						if(contador > 0){
							window.location.href = './Controller/actualizarTodoFechas.php?id_fomope='+elementosSelectR+'&idSeguir='+userRol+'&FenFirma='+fechaEnFirma+'&Fpersonla='+fechaPersonla+'&Fur='+fechaUr+'&Ffirmado='+fechaFirmado+'&Frecepcion='+fechaRecepcion+'&tabBD='+tabla;

						}
						//return false;
			}

		</script>



	</head>
	<body onload="nobackbutton();">
			<?php
				include "configuracion.php";
				$usuarioSeguir =  $_GET['usuario_rol'];
				$consulta = "SELECT * FROM usuarios WHERE usuario = '$usuarioSeguir'";
				if($resultadoSelect = mysqli_query($conexion, $consulta)){
					$rowUser = mysqli_fetch_assoc($resultadoSelect);
					
					if($rowUser['id_rol'] == 6){

			?>
			<br>
		  				<a  href= <?php echo ("'./menuPrincipal.php?usuario_rol=$usuarioSeguir'");?>><img class="img-responsive" src="img/ss1.png" height="90" width="280"/></a>

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
								<label class="plantilla-label estilo-colorg" for="nombreB">Analista:</label>

								<select class="form-control border border-dark custom-select" name="analistaBus">
													<option value=""></option>
													
													<?php
													if (!$conexion->set_charset("utf8")) {//asignamos la codificación comprobando que no falle
													       die("Error cargando el conjunto de caracteres utf8");
													}

													$consulta = "SELECT * FROM usuarios WHERE  id_rol = 0 OR id_rol = 1 OR id_rol=2 OR id_rol=3 ORDER BY id_rol ";
													$resultado = mysqli_query($conexion , $consulta);
													$contador2=0;

													while($misdatos2 = mysqli_fetch_assoc($resultado)){ $contador2++;?>
													<option value="<?php echo $misdatos2["usuario"]; ?>"><?php echo $misdatos2["nombrePersonal"]; ?></option>
													<?php 
												}?> 
													</select>
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
									  <?php
										
										$ConsultaAnio = "SELECT * FROM ct_anios";
										$resultadoA = mysqli_query($conexion , $ConsultaAnio);
										$contadorA=0;

										while($misdatosAnio = mysqli_fetch_assoc($resultadoA)){ $contadorA++;?>
										<option  data-subtext="<?php echo $misdatosAnio["id_anio"]; ?>"><?php echo $misdatosAnio["num_anio"]; ?></option>
										<?php }?>
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
				



<?php 
			if(isset($_POST['buscar'])){// $_SERVER['REQUEST_METHOD'] == 'POST' if(){
							$analistaBuscar = $_POST['analistaBus'];
							$unidadBuscar = $_POST['unidadBus'];
							$qnaBuscar = $_POST['qnaOption'];
							$anioBuscar = $_POST['anioBus'];
?>
								<div class="card bg-secondary text-white">
						    <div class="card-body"><h2>Consulta</h2></div>
					</div>
	<!-- <div style="overflow-x:auto;"> 
		En el id de table se consulta que rol es para que solo esa persona pueda editar los apartados
	-->
	<div class="table-responsive">
		<form name="radioALL1" id="radioALL1" action="" method="POST"> 
		<table class="table table-striped table-bordered" style="margin-bottom: 0;  font-size:70%;" >
			
						<thead>
						    <tr>
							<!-- <td>Observacion</td>
							<td>ID Fomope</td> -->
							
							<th scope="titulo" style="display: none;" class="sticky"></th>
							<th scope="titulo"  style="text-align: center" class="sticky">Seleccionar</th>
							 <th scope="titulo" style="text-align: center" style="width: 400px" class="sticky">RFC</th>
						      <th scope="titulo" style="text-align: center"   style="text-align: center" class="sticky">Estado FOMOPE</th>
						      <th scope="titulo"  style="text-align: center" class="sticky">Unidad</th>
						      <th scope="titulo"  style="text-align: center" class="sticky">Última modificación</th>
						       <th scope="titulo" style="text-align: center" class="sticky">Movimiento</th>
						       <th scope="titulo" style="text-align: center" class="sticky">Entrega operados a la unidad</th>
						       <th scope="titulo" style="text-align: center" class="sticky">Entrega expediente relaciones laborales</th>
						       <th scope="titulo" style="text-align: center" class="sticky">Envío a validación</th>
						       
						   </tr>
						</thead>
				 <tbody>
				
				<?php 							
///////////////////////////////////////////////
	 if($anioBuscar != "" && $analistaBuscar != ""   && $unidadBuscar != "" &&  $qnaBuscar != ""){

								$sql = "SELECT * FROM fomope WHERE (anio='$anioBuscar' AND analistaCap='$analistaBuscar' AND unidad='$unidadBuscar' AND quincenaAplicada='$qnaBuscar')";

 							}elseif($anioBuscar == "" && $analistaBuscar != ""   && $unidadBuscar != "" &&  $qnaBuscar != ""){
 								$sql = "SELECT * FROM fomope WHERE (analistaCap='$analistaBuscar' AND unidad='$unidadBuscar' AND (quincenaAplicada='$qnaBuscar' OR qnaDeAfectacion ='$qnaBuscar'))";

 							}elseif ($anioBuscar != "" && $analistaBuscar == ""   && $unidadBuscar != ""  &&  $qnaBuscar != "") {
 								$sql = "SELECT * FROM fomope WHERE (anio='$anioBuscar' AND unidad='$unidadBuscar' AND (quincenaAplicada='$qnaBuscar' OR qnaDeAfectacion ='$qnaBuscar'))";
								
							}elseif ($anioBuscar != "" && $analistaBuscar != ""   && $unidadBuscar == ""  &&  $qnaBuscar != "") {
								$sql = "SELECT * FROM fomope WHERE (anio='$anioBuscar' AND analistaCap='$analistaBuscar' AND (quincenaAplicada='$qnaBuscar' OR qnaDeAfectacion ='$qnaBuscar'))";
								
							}elseif ($anioBuscar != "" && $analistaBuscar != ""   && $unidadBuscar != ""  &&  $qnaBuscar == "") {
								$sql = "SELECT * FROM fomope WHERE (anio='$anioBuscar' AND analistaCap='$analistaBuscar' AND unidad='$unidadBuscar')";
								
							}elseif ($anioBuscar == "" && $analistaBuscar == ""   && $unidadBuscar != ""  &&  $qnaBuscar != "") {
								$sql = "SELECT * FROM fomope WHERE (unidad='$unidadBuscar' AND (quincenaAplicada='$qnaBuscar' OR qnaDeAfectacion ='$qnaBuscar'))";
								
							}elseif ($anioBuscar == "" && $analistaBuscar != ""   && $unidadBuscar == ""  &&  $qnaBuscar != "") {
								$sql = "SELECT * FROM fomope WHERE (analistaCap='$analistaBuscar' AND (quincenaAplicada='$qnaBuscar' OR qnaDeAfectacion ='$qnaBuscar'))";
								
							}elseif ($anioBuscar == "" && $analistaBuscar != ""   && $unidadBuscar != ""  &&  $qnaBuscar == "") {
								$sql = "SELECT * FROM fomope WHERE (analistaCap='$analistaBuscar' AND unidad='$unidadBuscar')";
								
							}elseif ($anioBuscar != "" && $analistaBuscar == ""   && $unidadBuscar == ""  &&  $qnaBuscar != "") {
								$sql = "SELECT * FROM fomope WHERE (anio='$anioBuscar' AND (quincenaAplicada='$qnaBuscar' OR qnaDeAfectacion ='$qnaBuscar'))";
								
							}elseif ($anioBuscar != "" && $analistaBuscar == ""   && $unidadBuscar != ""  &&  $qnaBuscar == "") {
								$sql = "SELECT * FROM fomope WHERE (anio='$anioBuscar' AND unidad='$unidadBuscar')";
								
							}elseif ($anioBuscar != "" && $analistaBuscar != ""   && $unidadBuscar == ""  &&  $qnaBuscar == "") {
								$sql = "SELECT * FROM fomope WHERE (anio='$anioBuscar' AND analistaCap='$analistaBuscar')";
								
							}elseif ($anioBuscar == "" && $analistaBuscar == ""   && $unidadBuscar == ""  &&  $qnaBuscar != "") {
								$sql = "SELECT * FROM fomope WHERE (quincenaAplicada='$qnaBuscar' OR qnaDeAfectacion ='$qnaBuscar')";
								
							}elseif ($anioBuscar == "" && $analistaBuscar == ""   && $unidadBuscar != ""  &&  $qnaBuscar == "") {
								$sql = "SELECT * FROM fomope WHERE (unidad='$unidadBuscar')";
								
							}elseif ($anioBuscar == "" && $analistaBuscar != ""   && $unidadBuscar == ""  &&  $qnaBuscar == "") {
								$sql = "SELECT * FROM fomope WHERE (analistaCap='$analistaBuscar')";
								
							}elseif ($anioBuscar != "" && $analistaBuscar == ""   && $unidadBuscar == ""  &&  $qnaBuscar == "") {
								$sql = "SELECT * FROM fomope WHERE (anio='$anioBuscar')";
								
							}elseif ($anioBuscar == "" && $analistaBuscar == ""   && $unidadBuscar == ""  &&  $qnaBuscar == "") {
								$sql = "SELECT * FROM fomope WHERE (anio='x')";
								echo('
															<br>
															<br>
															<div class="col-sm-12 ">
															<div class="plantilla-inputv text-dark">
															    <div class="card-body"><h2 align="center">No existe resultados de la busqueda, vuelve intentar.</h2></div>
														</div>
														</div>');
							}

							$sqlColor="SELECT colorAsignado FROM usuarios WHERE usuario='$usuarioSeguir'";

							$idMatriz = 0;
							$imprimirNoExiste = 0;
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
										$imprimirNoExiste ++;
									//	$matrizEventuales = queryEventual($sql2,$imprimirNoExiste);
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
						<tr id="<?php echo $ver[0] ?>">
							<td style="display: none;"><?php echo $ver[0] ?></td>
							<td>
								<div class="custom-control custom-radio" style="text-align: center">
								  <label><input type="checkbox" value="<?php echo $ver[0] ?>" name="radios1"></label>
								</div>
							</td>
							<td><?php echo $ver[4] ?></td>
							<td>
								<?php echo $ver[1]; ?>
							</td>
							<td><?php echo $ver[3] ?></td>
							<td><?php echo $ver[44] ?></td>
							<td><?php echo $ver[23] ?></td>
							<td><?php echo $ver[42] ?></td>
							<td><?php echo $ver[39] ?></td>
							<td><?php echo $ver[125] ?></td>
							
						<!--	<td><?php echo "

	
							<form method='get' action='./verList.php'>
								<input type='text' style='display: none;' name='usuario_rol' value='$usuarioSeguir'>
								<input type='text' style='display: none;' name='idMov' value='$ver[0]'>
								<input type='submit' name='verList' class='btn-secondary' value='Ver lista de Doc.'>
							</form> "

							?>
							</td>  -->
				
						</tr>
						<?php 
							//$matriz = array($idMatriz => $ver[0] );
							$matriz[$idMatriz]= $ver[0];							
							$idMatriz++;
							}
						}
						//$imprimirNoExiste++;
						
						}else{
							echo '<script type="text/javascript">alert("Error en la conexion");</script>';
							echo '<script type="text/javascript">alert("error '. mysqli_error($conexion).'");</script>';
						}
							?>
		 </tbody>
		</table>
	</form>
	</div>
	<br>
	<button type="button" class="btn btn btn-danger tamanio-button plantilla-input text-white bord" data-toggle="modal" data-target="#exampleModal1">
											 Autorizar
				</button>
					<br><br>
				<!--------modal--------------------------------------------------------------------------------------------------------->
				<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
							<label  class="plantilla-label" for="fechaValidacionPersonal">Fecha Validacion Personal: </label>
									 <input type="date" class="form-control border border-dark" id="fechaValidacionPersonal" name="fechaValidacionPersonal"> 
					</div>
					<div class="form-group col-md-8">
							<label  class="plantilla-label" for="fechaEntregaRlabores">Fecha Entrega R Labores: </label>
									 <input type="date" class="form-control border border-dark" id="fechaEntregaRlabores"  name="fechaEntregaRlabores"> 
					</div>
					<div class="form-group col-md-8">
							<label  class="plantilla-label" for="fechaEntregaUnidad">Fecha Entrega Unidad: </label>
									 <input type="date" class="form-control border border-dark" id="fechaEntregaUnidad"  name="fechaEntregaUnidad"> 
				</div>

				</center>
					      <div class="modal-footer">
						  	<?php $tabla = "fomope"; ?>
					        <button type="button" class="btn btn-secondary" data-dismiss="modal">Regresar</button>
	        				<button type="submit" id="autorizarTodo" onclick="obtenerRadioSeleccionado('radioALL1','radios1', '<?php echo $usuarioSeguir ?>', '<?php echo $tabla ?>')" class="btn btn-primary">Aceptar</button>
					      </div>
					    </div>
					  </div>
					</div>
<!-------------------------------------------------------FIN: MODAL  -->


					<div class="card bg-secondary text-white">
		    <div class="card-body"><h2>Consulta Eventuales</h2></div>
					</div>
	<!-- <div style="overflow-x:auto;"> 
		En el id de table se consulta que rol es para que solo esa persona pueda editar los apartados
	-->
	<div class="table-responsive">
		<form name="radioALL2" id="radioALL2" action="" method="POST"> 
		<table class="table table-striped table-bordered" style="margin-bottom: 0;  font-size:70%;" >
			
						<thead>
						    <tr>
							<!-- <td>Observacion</td>
							<td>ID Fomope</td> -->
							
							<th scope="titulo" style="display: none;" class="sticky"></th>
							<th scope="titulo" style="text-align: center" style="width: 400px" class="sticky">Seleccionar</th>
							 <th scope="titulo" style="text-align: center" style="width: 400px" class="sticky">RFC</th>
						      <th scope="titulo" style="text-align: center"   style="text-align: center" class="sticky">Estado FOMOPE</th>
						      <th scope="titulo"  style="text-align: center" class="sticky">Unidad</th>
						      <th scope="titulo"  style="text-align: center" class="sticky">Última modificación</th>
						       <th scope="titulo" style="text-align: center" class="sticky">Movimiento</th>
						       <th scope="titulo" style="text-align: center" class="sticky">Fecha de recepción</th>
						       <th scope="titulo" style="text-align: center" class="sticky">Fecha de entregado firma</th>
						       <th scope="titulo" style="text-align: center" class="sticky">Fecha de firmado</th>
                               <th scope="titulo" style="text-align: center" class="sticky">Entrega operados a la unidad</th>
						       <th scope="titulo" style="text-align: center" class="sticky">Entrega expediente envio personal</th>
						       <th scope="titulo" style="text-align: center" class="sticky">Archivo</th>
						       
						   </tr>
						</thead>
				 <tbody>
				
				<?php 							
	 if($anioBuscar != "" && $analistaBuscar != ""   && $unidadBuscar != "" &&  $qnaBuscar != ""){

								$sql2 = "SELECT * FROM fomope_qr WHERE (anio='$anioBuscar' AND personaAsignada='$analistaBuscar' AND unidad='$unidadBuscar' AND qna='$qnaBuscar')";

 							}elseif($anioBuscar == "" && $analistaBuscar != ""   && $unidadBuscar != "" &&  $qnaBuscar != ""){
 								$sql2 = "SELECT * FROM fomope_qr WHERE (personaAsignada='$analistaBuscar' AND unidad='$unidadBuscar' AND qna='$qnaBuscar')";

 							}elseif ($anioBuscar != "" && $analistaBuscar == ""   && $unidadBuscar != ""  &&  $qnaBuscar != "") {
 								$sql2 = "SELECT * FROM fomope_qr WHERE (anio='$anioBuscar' AND unidad='$unidadBuscar' AND qna='$qnaBuscar')";
								
							}elseif ($anioBuscar != "" && $analistaBuscar != ""   && $unidadBuscar == ""  &&  $qnaBuscar != "") {
								$sql2 = "SELECT * FROM fomope_qr WHERE (anio='$anioBuscar' AND personaAsignada='$analistaBuscar' AND qna='$qnaBuscar')";
								
							}elseif ($anioBuscar != "" && $analistaBuscar != ""   && $unidadBuscar != ""  &&  $qnaBuscar == "") {
								$sql2 = "SELECT * FROM fomope_qr WHERE (anio='$anioBuscar' AND personaAsignada='$analistaBuscar' AND unidad='$unidadBuscar')";
								
							}elseif ($anioBuscar == "" && $analistaBuscar == ""   && $unidadBuscar != ""  &&  $qnaBuscar != "") {
								$sql2 = "SELECT * FROM fomope_qr WHERE (unidad='$unidadBuscar' AND qna='$qnaBuscar')";
								
							}elseif ($anioBuscar == "" && $analistaBuscar != ""   && $unidadBuscar == ""  &&  $qnaBuscar != "") {
								$sql2 = "SELECT * FROM fomope_qr WHERE (personaAsignada='$analistaBuscar' AND qna='$qnaBuscar')";
								
							}elseif ($anioBuscar == "" && $analistaBuscar != ""   && $unidadBuscar != ""  &&  $qnaBuscar == "") {
								$sql2 = "SELECT * FROM fomope_qr WHERE (personaAsignada='$analistaBuscar' AND unidad='$unidadBuscar')";
								
							}elseif ($anioBuscar != "" && $analistaBuscar == ""   && $unidadBuscar == ""  &&  $qnaBuscar != "") {
								$sql2 = "SELECT * FROM fomope_qr WHERE (anio='$anioBuscar' AND qna='$qnaBuscar')";
								
							}elseif ($anioBuscar != "" && $analistaBuscar == ""   && $unidadBuscar != ""  &&  $qnaBuscar == "") {
								$sql2 = "SELECT * FROM fomope_qr WHERE (anio='$anioBuscar' AND unidad='$unidadBuscar')";
								
							}elseif ($anioBuscar != "" && $analistaBuscar != ""   && $unidadBuscar == ""  &&  $qnaBuscar == "") {
								$sql2 = "SELECT * FROM fomope_qr WHERE (anio='$anioBuscar' AND personaAsignada='$analistaBuscar')";
								
							}elseif ($anioBuscar == "" && $analistaBuscar == ""   && $unidadBuscar == ""  &&  $qnaBuscar != "") {
								$sql2 = "SELECT * FROM fomope_qr WHERE (qna='$qnaBuscar')";
								
							}elseif ($anioBuscar == "" && $analistaBuscar == ""   && $unidadBuscar != ""  &&  $qnaBuscar == "") {
								$sql2 = "SELECT * FROM fomope_qr WHERE (unidad='$unidadBuscar')";
								
							}elseif ($anioBuscar == "" && $analistaBuscar != ""   && $unidadBuscar == ""  &&  $qnaBuscar == "") {
								$sql2 = "SELECT * FROM fomope_qr WHERE (personaAsignada='$analistaBuscar')";
								
							}elseif ($anioBuscar != "" && $analistaBuscar == ""   && $unidadBuscar == ""  &&  $qnaBuscar == "") {
								$sql2 = "SELECT * FROM fomope_qr WHERE (anio='$anioBuscar')";
								
							}elseif ($anioBuscar == "" && $analistaBuscar == ""   && $unidadBuscar == ""  &&  $qnaBuscar == "") {
								$sql2 = "SELECT * FROM fomope_qr WHERE (anio='x')";
							}
							////////////////////////////////////////////
							$sqlColor="SELECT colorAsignado FROM usuarios WHERE usuario='$usuarioSeguir'";
							$idMatriz_qr=0;
							$imprimirNoExiste = 0;
//////////////////////////////   SQL 2
						if ($result_qr = mysqli_query($conexion,$sql2)) {

								$totalFilas    =    mysqli_num_rows($result_qr);  
								if($totalFilas == 0){
										echo('
															<br>
															<br>
															<div class="col-sm-12 ">
															<div class="plantilla-inputv text-dark">
															    <div class="card-body"><h2 align="center">No existe resultados de la busqueda, vuelve intentar.</h2></div>
														</div>
														</div>');
										$imprimirNoExiste ++;
								}else{


									while($ver_qr=mysqli_fetch_row($result_qr)){ 

										$movQuery = "SELECT * FROM ct_movimientosrh WHERE cod_mov =".$ver_qr[5];
                                            if($resMovimientos = mysqli_query($conexion, $movQuery)){
                                           $rowMovimientos = mysqli_fetch_row($resMovimientos);
                                              }

                                        $unidadQuery = "SELECT * FROM ct_unidades WHERE UR =".$ver_qr[26];
                                            if($resUnidad = mysqli_query($conexion, $unidadQuery)){
                                         $rowUnidad = mysqli_fetch_row($resUnidad);
                                     }
			
						 ?>

						<tr id="<?php echo $ver_qr[0] ?>">
							<td style="display: none;"><?php echo $ver_qr[0] ?></td>
							<td>
								<div class="custom-control custom-radio" style="text-align: center">
								  <label><input type="checkbox" value="<?php echo $ver_qr[0] ?>" name="radios2"></label>
								</div>
							</td>
							<td><?php echo $ver_qr[7] ?></td>
							<td><?php echo $ver_qr[1] ?></td>
							<td><?php echo $rowUnidad[1] ?></td>
							<td><?php echo $ver_qr[48]." ".$ver_qr[47] ?></td>
							<td><?php echo $rowMovimientos[4] ?></td>
							<td><?php echo $ver_qr[53] ?></td>
							<td><?php echo $ver_qr[54] ?></td>
							<td><?php echo $ver_qr[55] ?></td>
							<td><?php echo $ver_qr[56] ?></td>
							<td><?php echo $ver_qr[57] ?></td>
							<td><?php echo $ver_qr[58] ?></td>
						<!--	<td><?php echo "

	
							<form method='get' action='./verList.php'>
								<input type='text' style='display: none;' name='usuario_rol' value='$usuarioSeguir'>
								<input type='text' style='display: none;' name='idMov' value='$ver_qr[0]'>
								<input type='submit' name='verList' class='btn-secondary' value='Ver lista de Doc.'>
							</form> "

							?>
							</td> -->
				
						</tr>
						<?php 
							//$matriz_qr = array($idMatriz_qr => $ver[0] );
							$matriz_qr[$idMatriz_qr]= $ver_qr[0];							
							$idMatriz_qr++;
							}
						}
						//$imprimirNoExiste++;
						
						}else{
							echo '<script type="text/javascript">alert("Error en la conexion");</script>';
							echo '<script type="text/javascript">alert("error '. mysqli_error($conexion).'");</script>';
						}
							?>
		 </tbody>
		</table>
		</form>
	</div>			

		<br>
				<button type="button" class="btn btn btn-danger tamanio-button plantilla-input text-white bord" data-toggle="modal" data-target="#exampleModal2">
											 Autorizar
				</button>
				<br><br>
							  		

<!--------modal--------------------------------------------------------------------------------------------------------->
				<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">Confirmar</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					        Indica las fechas:
					      </div>
									<center>
					
												 
					<div class="form-group col-md-8">
							<label  class="plantilla-label" for="recep">Recepcion: </label>
									 <input type="date" class="form-control border border-dark" id="recepcion"  name="recepcion"> 
					</div>
					<div class="form-group col-md-8">
							<label  class="plantilla-label" for="enFirma">En firma: </label>
									 <input type="date" class="form-control border border-dark" id="enFirma"  name="enFirma"> 
					</div>
					<div class="form-group col-md-8">
							<label  class="plantilla-label" for="firmado">Firmado: </label>
									 <input type="date" class="form-control border border-dark" id="firmado"  name="firmado"> 
					</div>
					<div class="form-group col-md-8">
							<label  class="plantilla-label" for="entregaUR">Entrega a la UR: </label>
									 <input type="date" class="form-control border border-dark" id="entregaUR"  name="entregaUR"> 
					</div>
					<div class="form-group col-md-8">
							<label  class="plantilla-label" for="envioPersonal">Envio a personal: </label>
									 <input type="date" class="form-control border border-dark" id="envioPersonal"  name="envioPersonal"> 
					</div>
					<div class="form-group col-md-8">
							<label  class="plantilla-label" for="archivo">Archivo: </label>
									 <input type="date" class="form-control border border-dark" id="archivo"  name="archivo"> 
					</div>
				</center>
					      <div class="modal-footer">
						  	<?php $tabla = "fomope_qr"; ?>
					        <button type="button" class="btn btn-secondary" data-dismiss="modal">Regresar</button>
	        				<button type="submit" id="autorizarTodo" onclick="obtenerRadioSeleccionado2('radioALL2','radios2', '<?php echo $usuarioSeguir ?>', '<?php echo $tabla ?>')" class="btn btn-primary">Aceptar</button>
					      </div>
					    </div>
				</div>
				</div>
<!-------------------------------------------------------FIN: MODAL  -->
<?php
			}
						?>
					
	</center>
	</body>


</html>

