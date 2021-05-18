
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
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
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
			.derecha   { float: right; }
			.izquierda   { float: left; }
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

.container-4 input#search{
  width: 130px;
  height: 30px;
  background: #fff;
  border: none;
   font-size: 10pt;
 font-family: 'Arial', sans-serif;
 font-weight: 400;
  float: left;
  color: #00000;
  padding-left: 15px;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border-radius: 5px;
}

.container-4 button.icon{
  -webkit-border-top-right-radius: 5px;
  -webkit-border-bottom-right-radius: 5px;
  -moz-border-radius-topright: 5px;
  -moz-border-radius-bottomright: 5px;
  border-top-right-radius: 5px;
  border-bottom-right-radius: 5px;
 
  border: none;
  background: #fff;
  height: 30px;
  width: 50px;
  color: #4f5b66;
  opacity: 0;
  font-size: 10pt;
 
  -webkit-transition: all .55s ease;
  -moz-transition: all .55s ease;
  -ms-transition: all .55s ease;
  -o-transition: all .55s ease;
  transition: all .55s ease;
}

.container-4:hover button.icon, .container-4:active button.icon, .container-4:focus button.icon{
    outline: none;
    opacity: 1;
    margin-left: -50px;
  }
 
  .container-4:hover button.icon:hover{
    background: white;
  }

  .select-css {
 display: block;
 font-size: 10pt;
 font-family: 'Arial', sans-serif;
 height: 30px;
 font-weight: 400;
 color: #4f5b66;
 line-height: 1.3;
 padding: .4em 1.4em .3em .8em;
 width: 110px;
 max-width: 100%; 
 box-sizing: border-box;
 margin: 0;
 border: 1px solid #aaa;
 box-shadow: 0 1px 0 1px rgba(0,0,0,.03);
 border-radius: .3em;
 -moz-appearance: none;
 -webkit-appearance: none;
 appearance: none;
 background-color: #fff;
 background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%23007CB2%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.5-12.8z%22%2F%3E%3C%2Fsvg%3E'),
   linear-gradient(to bottom, #ffffff 0%,#f7f7f7 100%);
 background-repeat: no-repeat, repeat;
 background-position: right .7em top 50%, 0 0;
 background-size: .65em auto, 100%;
}
.select-css::-ms-expand {
 display: none;
}
.select-css:hover {
 border-color: #888;
}

.select-css option {
 font-weight:normal;
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
		<br>
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
		        	<section class="search-sec">
    <div class="container">
        <form enctype="multipart/form-data" action="buscarRegistro.php" method="get">
            <div class="row">
            	<input type='text'  style='display: none;' name='usuario_rol' value= '<?php echo $usuarioSeguir ;?>' >
                <div class="col-lg-12">
                    <div class="row">
                    	<div class="container-4">
                         
                            <select class="select-css" id="elanio" name="elanio">
                                <option value="">AÑO</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                            </select>
              
                    </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <select class="select-css" id="laqnia" name="laqnia">
                                <option>QUINCENA</option>
                              	
													<?php
													if (!$conexion->set_charset("utf8")) {//asignamos la codificación comprobando que no falle
													       die("Error cargando el conjunto de caracteres utf8");
													}

													$consulta = "SELECT * FROM m1ct_fechasnomina";
													$resultado = mysqli_query($conexion , $consulta);
													$contador=0;

													while($misdatos = mysqli_fetch_assoc($resultado)){ $contador++;?>
													<option value="<?php echo $misdatos["id_qna"]; ?>"><?php echo $misdatos["id_qna"]; ?></option>
													<?php 
													$analista = $misdatos["nombrePersonal"];

												}?>          
                            </select>
                        </div>
                       
                        <div class="box">
  <div class="container-4">
    <input type="search" id="search" name="search" placeholder="Busqueda" />
    <button class="icon"><i class="fa fa-search"></i></button>
  </div>
</div>

                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
</li>  
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
									<select class="form-control border-dark" name="anioBus">							 <?php
										
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
		

				
				<?php 
					include "configuracion.php";
		function queryEventual($sql2,$mensaje){
						include "configuracion.php";
						$usuarioSeguir =  $_GET['usuario_rol'];
						?>
						<br>
						<br>
											<div class="card bg-secondary text-white">
						    <div class="card-body"><h2>Consulta QR</h2></div>
					</div>
						<div class="table-responsive">
		<table id="<?php if($rowUser['id_rol'] == 1){echo "data_table";} ?>" class="table table-striped table-bordered" style="margin-bottom: 0;  font-size:70%;" >
			
						<thead>
						    <tr>
							<!-- <td>Observacion</td>
							<td>ID Fomope</td> -->
							
							<th scope="titulo" style="display: none;" class="sticky"></th>
							 <th scope="titulo" style="text-align: center" style="width: 400px" class="sticky">RFC</th>
						      <th scope="titulo" style="text-align: center"   style="text-align: center" class="sticky">Estado FOMOPE</th>
						      <th scope="titulo" style="text-align: center"   style="text-align: center" class="sticky">Tipo</th>
						      <th scope="titulo"  style="text-align: center" class="sticky">Unidad</th>
						      <th scope="titulo"  style="text-align: center" class="sticky">Última modificación</th>
						       <th scope="titulo" style="text-align: center" class="sticky">Movimiento</th>
						       <th scope="titulo" style="text-align: center" class="sticky">Fecha recepción</th>
						       <th scope="titulo" style="text-align: center" class="sticky">Fecha Entregado Firma</th>
						       <th scope="titulo" style="text-align: center" class="sticky">Fecha Firmado</th>
						       <th scope="titulo" style="text-align: center" class="sticky">Fecha entrega UR</th>
						       <th scope="titulo" style="text-align: center" class="sticky">Envío personal</th>
						       <th scope="titulo" style="text-align: center" class="sticky">Archivo</th>
						       <th scope="titulo" style="text-align: center" class="sticky">Fomope Operado</th>

						       
						   </tr>
						</thead>
				 <tbody>

				 <?php

						if ($result2 = mysqli_query($conexion,$sql2)) {
							$idMatriz = 0;
												$totalFilas    =    mysqli_num_rows($result2);
												if($totalFilas == 0){
													$matrizEventual = 0;
													//$mensaje++;
													if($mensaje > 0 ){
														$matrizEventuales[0][0]=0;
														echo('
															<br>
															<br>
															<div class="col-sm-12 ">
															<div class="plantilla-inputv text-dark">
															    <div class="card-body"><h2 align="center">No existe resultados de la busqueda, vuelve intentar.</h2></div>
														</div>
														</div>');

													}

												}else{
														while($ver2=mysqli_fetch_row($result2)){ 

															$movQuery = "SELECT * FROM ct_movimientosrh WHERE cod_mov = '$ver2[7]'";
				                                                if($resMovimientos = mysqli_query($conexion, $movQuery)){
					                                              $rowMovimientos = mysqli_fetch_row($resMovimientos);
				                                                  }

				                                            $unidadQuery = "SELECT * FROM ct_unidades WHERE UR = '$ver2[2]'";
				                                                if($resUnidad = mysqli_query($conexion, $unidadQuery)){
					                                          	  $rowUnidad = mysqli_fetch_row($resUnidad);
																}			
												if($ver2[18] == 'Rechazado duplicado'){

													$ver2[17] = 'Duplicado';
												}elseif($ver2[17] == 'negro1'){

													$ver2[17] = 'DSPO Rechazo';
												}elseif($ver2[17] == 'negro' || $ver2[17] == 'negro_1'){

													$ver2[17] = 'Unidad Edición';
												}elseif($ver2[17] == 'negro_2'){

													$ver2[17] = 'DSPO Rechazo';
												}elseif($ver2[17] == 'amarillo'){

													$ver2[17] = 'DSPO captura';
												}elseif($ver2[17] == 'amarillo0'){

													$ver2[17] = 'DDSCH Autorizacion';
												}elseif($ver2[17] == 'cafe'){

													$ver2[17] = 'DSPO Autorizacion';
												}elseif($ver2[17] == 'naranja'){

													$ver2[17] = 'DIPSP Autorizacion';
												}elseif($ver2[17] == 'azul'){

													$ver2[17] = 'DGRHO Autorizacion';
												}elseif($ver2[17] == 'rosa'){

													$ver2[17] = 'DSPO nomina';
												}elseif($ver2[17] == 'verde'){

													$ver2[17] = 'DDSCH loteo';
												}elseif($ver2[17] == 'verde2'){

													$ver2[17] = 'DDSCH Autorizacion';
												}elseif($ver2[17] == 'gris'){

													$ver2[17] = 'DDSCH Edición';
												}elseif($ver2[17] == 'guinda'){

													$ver2[17] = 'Finalizado';
												}
												?>

																<tr id="<?php echo $ver2[0] ?>">
																<td style="display: none;"><?php echo $ver2[0] ?></td>
																<td><?php echo $ver2[3] ?></td>
																<td><?php echo $ver2[17] ?></td>
																<td><?php echo $ver2[1] ?></td>
																<td><?php echo $rowUnidad[1] ?></td>
																<td><?php echo $ver2[8] ?></td>
																<td><?php echo $rowMovimientos[4] ?></td>
																<td><?php echo $ver2[10] ?></td>
																<td><?php echo $ver2[11] ?></td>
																<td><?php echo $ver2[12] ?></td>
																<td><?php echo $ver2[13] ?></td>
																<td><?php echo $ver2[14] ?></td>
																<td><?php echo $ver2[15] ?></td>
																<td>
																	<?php
																		if($ver2[16] == "si"){
																	?>
																			<button class="btn btn-success" > ✔ </button>
																	<?php
																		}else{
																	?>

																			<button class="btn btn-danger" > X </button>
																	<?php
																		}
																	?>
																</td>

																<td><?php echo "

										
																<form method='get' action='./verListEventual.php'>
																	<input type='text' style='display: none;' name='usuario_rol' value='$usuarioSeguir'>
																	<input type='text' style='display: none;' name='idMov' value='$ver2[0]'>
																	<input type='submit' name='verList' class='btn-secondary' value='Ver lista de Doc.'>
																</form> "

																?>
																	

																</td>
															</tr>
															<?php 
																//$matriz = array($idMatriz => $ver[0] );
																$matrizEventual[$idMatriz]= $ver2[0];							
																$idMatriz++;
																}
															}
															?>
															<td>
																<h2>TOTAL:</h2>
															</td>
															<td>
																<h3>	<?php echo $idMatriz; ?>	</h3>
															</td>
															
															<?php
															}else{

															?><input type="hidden" name="_charset_"><?php
															}
																					?>
		 </tbody>
		</table>
	</div>
	</div>	
	<br>

	<?php
							return $matrizEventual;

			}

			if(isset($_POST['buscar'])){// $_SERVER['REQUEST_METHOD'] == 'POST' if(){
							
							$rfcBuscar = $_POST['rfc'];
							$nombreBuscar = $_POST['nombreBus'];
							$apellidoBuscar = $_POST['apellidoBus'];
							$apellidomBuscar = $_POST['apellidoMb'];
							$unidadBuscar = $_POST['unidadBus'];
							$qnaBuscar = $_POST['qnaOption'];
							$anioBuscar = $_POST['anioBus'];
							$banderaFomope = 0;
                           if($rfcBuscar == "" && $nombreBuscar == "" && $apellidoBuscar == "" && $apellidomBuscar == "" && $unidadBuscar == ""  &&  $qnaBuscar == "" && $anioBuscar != ""){

								$sql = "SELECT * FROM fomope WHERE anio = '$anioBuscar'";
								$sql2="SELECT id_movimiento_qr,tipoRegistro,unidad,rfc,usuario_modifico,qna,fini,tipo_movimiento, fechaAutorizacion,llave,Frecepcion, Fen_firma, Ffirmado, Fentrega_ur,envio_personal,archivo,FO ,color_estado, estatus FROM fomope_qr WHERE anio = '$anioBuscar'";
								$sql3="SELECT * FROM conteo_qr  WHERE (anio = '$anioBuscar')";
								$banderaFomope =  1;
 							}elseif($rfcBuscar == "" && $nombreBuscar == "" && $apellidoBuscar == "" && $apellidomBuscar == "" && $unidadBuscar == ""  &&  $qnaBuscar != "" && $anioBuscar != ""){

								$sql = "SELECT * FROM fomope WHERE (anio = '$anioBuscar' AND quincenaAplicada='$qnaBuscar')";
								$sql2="SELECT id_movimiento_qr,tipoRegistro,unidad,rfc,usuario_modifico,qna,fini,tipo_movimiento, fechaAutorizacion,llave,Frecepcion, Fen_firma, Ffirmado, Fentrega_ur,envio_personal,archivo,FO ,color_estado, estatus FROM fomope_qr WHERE (anio = '$anioBuscar' AND qna='$qnaBuscar')";
								$sql3="SELECT * FROM conteo_qr  WHERE (anio = '$anioBuscar' AND qna='$qnaBuscar')";
								$banderaFomope = 1;
 							}elseif($rfcBuscar == "" && $nombreBuscar == "" && $apellidoBuscar == "" && $apellidomBuscar == "" && $unidadBuscar != ""  &&  $qnaBuscar != "" && $anioBuscar != ""){

								$sql = "SELECT * FROM fomope WHERE (anio = '$anioBuscar' AND quincenaAplicada='$qnaBuscar' AND unidad='$unidadBuscar' )";
								$sql2="SELECT id_movimiento_qr,tipoRegistro,unidad,rfc,usuario_modifico,qna,fini,tipo_movimiento, fechaAutorizacion,llave,Frecepcion, Fen_firma, Ffirmado, Fentrega_ur,envio_personal,archivo,FO ,color_estado, estatus FROM fomope_qr WHERE (anio = '$anioBuscar' AND qna='$qnaBuscar' AND unidad='$unidadBuscar')";
 							
 							}elseif($rfcBuscar == "" && $nombreBuscar == "" && $apellidoBuscar == "" && $apellidomBuscar == "" && $unidadBuscar != ""  &&  $qnaBuscar == "" && $anioBuscar != ""){

								$sql = "SELECT * FROM fomope WHERE (anio = '$anioBuscar' AND unidad='$unidadBuscar' )";
								$sql2="SELECT id_movimiento_qr,tipoRegistro,unidad,rfc,usuario_modifico,qna,fini,tipo_movimiento, fechaAutorizacion,llave,Frecepcion, Fen_firma, Ffirmado, Fentrega_ur,envio_personal,archivo,FO ,color_estado, estatus FROM fomope_qr WHERE (anio = '$anioBuscar' AND unidad='$unidadBuscar')";
 							}elseif($rfcBuscar != "" && $nombreBuscar != "" && $apellidoBuscar != "" && $apellidomBuscar != "" && $unidadBuscar != "" &&  $qnaBuscar != ""){

								$sql = "SELECT * FROM fomope WHERE (rfc='$rfcBuscar' AND nombre='$nombreBuscar' AND apellido_1='$apellidoBuscar' AND apellido_2='$apellidomBuscar' AND unidad='$unidadBuscar' AND quincenaAplicada='$qnaBuscar')";
								$sql2 = "SELECT * FROM fomope_qr WHERE rfc = '--'";

 							}elseif($rfcBuscar == "" && $nombreBuscar != "" && $apellidoBuscar != "" && $apellidomBuscar != "" && $unidadBuscar != "" &&  $qnaBuscar != ""){

								$sql = "SELECT * FROM fomope WHERE (nombre='$nombreBuscar' AND apellido_1='$apellidoBuscar' AND apellido_2='$apellidomBuscar' AND unidad='$unidadBuscar' AND quincenaAplicada='$qnaBuscar')";
								$sql2 = "SELECT * FROM fomope_qr WHERE rfc = '--'";
 							}elseif ($rfcBuscar != "" && $nombreBuscar == "" && $apellidoBuscar == "" && $apellidomBuscar == "" && $unidadBuscar == ""  &&  $qnaBuscar == "") {
								
								$sql = "SELECT * FROM fomope WHERE (rfc LIKE '%$rfcBuscar%')";
								$sql2="SELECT id_movimiento_qr,tipoRegistro,unidad,rfc,usuario_modifico,qna,fini,tipo_movimiento, fechaAutorizacion,llave,Frecepcion, Fen_firma, Ffirmado, Fentrega_ur,envio_personal,archivo,FO ,color_estado, estatus FROM fomope_qr WHERE (rfc LIKE '%$rfcBuscar%')";
								$sql3="SELECT * FROM conteo_qr  WHERE(rfc LIKE '%$rfcBuscar%') ORDER BY id_cont DESC";
								$banderaFomope = 1;
							}elseif ($rfcBuscar != "" && $nombreBuscar == "" && $apellidoBuscar != "" && $apellidomBuscar == "" && $unidadBuscar == ""  &&  $qnaBuscar == "") {
								
								$sql = "SELECT * FROM fomope WHERE (rfc='$rfcBuscar' AND apellido_1='$apellidoBuscar')";
								$sql2="SELECT id_movimiento_qr,tipoRegistro,unidad,rfc,usuario_modifico,qna,fini,tipo_movimiento, fechaAutorizacion,llave,Frecepcion, Fen_firma, Ffirmado, Fentrega_ur,envio_personal,archivo,FO ,color_estado, estatus  FROM fomope_qr WHERE  (rfc='$rfcBuscar' AND apellido_p='$apellidoBuscar')";
								
							}elseif ($rfcBuscar != "" && $nombreBuscar == "" && $apellidoBuscar != "" && $apellidomBuscar != "" && $unidadBuscar == ""  &&  $qnaBuscar == "") {
								
								$sql = "SELECT * FROM fomope WHERE (rfc='$rfcBuscar' AND apellido_1='$apellidoBuscar' AND apellido_2='$apellidomBuscar')";
								$sql2="SELECT id_movimiento_qr,tipoRegistro,unidad,rfc,usuario_modifico,qna,fini,tipo_movimiento, fechaAutorizacion,llave,Frecepcion, Fen_firma, Ffirmado, Fentrega_ur,envio_personal,archivo,FO ,color_estado, estatus  FROM fomope_qr WHERE  (rfc='$rfcBuscar' AND apellido_p='$apellidoBuscar' AND apellido_m='$apellidomBuscar')";
								
							}elseif ($rfcBuscar != "" && $nombreBuscar == "" && $apellidoBuscar != "" && $apellidomBuscar != "" && $unidadBuscar != ""  &&  $qnaBuscar == "") {
								
								$sql = "SELECT * FROM fomope WHERE (rfc='$rfcBuscar' AND apellido_1='$apellidoBuscar' AND apellido_2='$apellidomBuscar' AND unidad='$unidadBuscar')";
								$sql2 = "SELECT * FROM fomope_qr WHERE rfc = '--'";
							}elseif ($rfcBuscar != "" && $nombreBuscar == "" && $apellidoBuscar == "" && $apellidomBuscar == "" && $unidadBuscar == ""  &&  $qnaBuscar != "") {
								
								$sql = "SELECT * FROM fomope WHERE (rfc='$rfcBuscar' AND quincenaAplicada='$qnaBuscar')";
								$sql2 = "SELECT * FROM fomope_qr WHERE rfc = '--'";
							}elseif ($rfcBuscar != "" && $nombreBuscar == "" && $apellidoBuscar != "" && $apellidomBuscar != "" && $unidadBuscar != ""  &&  $qnaBuscar != "") {
								
								$sql = "SELECT * FROM fomope WHERE (rfc='$rfcBuscar' AND apellido_1='$apellidoBuscar' AND apellido_2='$apellidomBuscar' AND unidad='$unidadBuscar'  AND quincenaAplicada='$qnaBuscar')";
								$sql2 = "SELECT * FROM fomope_qr WHERE rfc = '--'";
							}elseif ($rfcBuscar != "" && $nombreBuscar == "" && $apellidoBuscar != "" && $apellidomBuscar == "" && $unidadBuscar != ""  &&  $qnaBuscar != "") {
								
								$sql = "SELECT * FROM fomope WHERE (rfc='$rfcBuscar' AND apellido_1='$apellidoBuscar' AND unidad='$unidadBuscar' AND quincenaAplicada='$qnaBuscar')";
								$sql2 = "SELECT * FROM fomope_qr WHERE rfc = '--'";
							}elseif ($rfcBuscar != "" && $nombreBuscar == "" && $apellidoBuscar != "" && $apellidomBuscar == "" && $unidadBuscar == ""  &&  $qnaBuscar != "") {
								
								$sql = "SELECT * FROM fomope WHERE (rfc='$rfcBuscar' AND apellido_1='$apellidoBuscar' AND quincenaAplicada='$qnaBuscar')";
								$sql2 = "SELECT * FROM fomope_qr WHERE rfc = '--'";
							}elseif ($rfcBuscar != "" && $nombreBuscar == "" && $apellidoBuscar != "" && $apellidomBuscar != "" && $unidadBuscar == ""  &&  $qnaBuscar != "") {
								
								$sql = "SELECT * FROM fomope WHERE (rfc='$rfcBuscar' AND apellido_1='$apellidoBuscar' AND apellido_2='$apellidomBuscar' AND quincenaAplicada='$qnaBuscar')";
								$sql2="SELECT id_movimiento_qr,tipoRegistro,unidad,rfc,usuario_modifico,qna,fini,tipo_movimiento, fechaAutorizacion,llave,Frecepcion, Fen_firma, Ffirmado, Fentrega_ur,envio_personal,archivo,FO ,color_estado, estatus  FROM fomope_qr WHERE  (rfc='$rfcBuscar' AND apellido_p='$apellidoBuscar' AND apellido_m='$apellidomBuscar' AND qna='$qnaBuscar')";
							}elseif ($rfcBuscar != "" && $nombreBuscar == "" && $apellidoBuscar != "" && $apellidomBuscar == "" && $unidadBuscar != ""  &&  $qnaBuscar == "") {
								
								$sql = "SELECT * FROM fomope WHERE (rfc='$rfcBuscar' AND apellido_1='$apellidoBuscar' AND unidad='$unidadBuscar')";
								$sql2 = "SELECT * FROM fomope_qr WHERE rfc = '--'";
							}elseif ($rfcBuscar != "" && $nombreBuscar == "" && $apellidoBuscar == "" && $apellidomBuscar != "" && $unidadBuscar == ""  &&  $qnaBuscar == "") {
								
								$sql = "SELECT * FROM fomope WHERE (rfc='$rfcBuscar' AND apellido_2='$apellidomBuscar')";
								$sql2 = "SELECT * FROM fomope_qr WHERE rfc = '--'";
							}elseif ($rfcBuscar != "" && $nombreBuscar == "" && $apellidoBuscar == "" && $apellidomBuscar != "" && $unidadBuscar != ""  &&  $qnaBuscar == "") {
								
								$sql = "SELECT * FROM fomope WHERE (rfc='$rfcBuscar' AND apellido_2='$apellidomBuscar' AND unidad='$unidadBuscar')";
								$sql2 = "SELECT * FROM fomope_qr WHERE rfc = '--'";
							}elseif ($rfcBuscar != "" && $nombreBuscar == "" && $apellidoBuscar == "" && $apellidomBuscar != "" && $unidadBuscar == ""  &&  $qnaBuscar != "") {
								
								$sql = "SELECT * FROM fomope WHERE (rfc='$rfcBuscar' AND apellido_2='$apellidomBuscar' AND quincenaAplicada='$qnaBuscar')";
								$sql2 = "SELECT * FROM fomope_qr WHERE rfc = '--'";
								
							}elseif ($rfcBuscar != "" && $nombreBuscar == "" && $apellidoBuscar == "" && $apellidomBuscar == "" && $unidadBuscar != ""  &&  $qnaBuscar == "") {
								
								$sql = "SELECT * FROM fomope WHERE (rfc='$rfcBuscar' AND unidad='$unidadBuscar')";
								$sql2="SELECT id_movimiento_qr,tipoRegistro,unidad,rfc,usuario_modifico,qna,fini,tipo_movimiento, fechaAutorizacion,llave,Frecepcion, Fen_firma, Ffirmado, Fentrega_ur,envio_personal,archivo,FO ,color_estado, estatus FROM fomope_qr WHERE  (rfc='$rfcBuscar' AND unidad='$unidadBuscar')";
	 							
							}
							elseif ($rfcBuscar != "" && $nombreBuscar == "" && $apellidoBuscar == "" && $apellidomBuscar == "" && $unidadBuscar != ""  &&  $qnaBuscar != "") {
								
								$sql = "SELECT * FROM fomope WHERE (rfc='$rfcBuscar' AND unidad='$unidadBuscar' AND quincenaAplicada='$qnaBuscar')";
								$sql2="SELECT id_movimiento_qr,tipoRegistro,unidad,rfc,usuario_modifico,qna,fini,tipo_movimiento, fechaAutorizacion,llave,Frecepcion, Fen_firma, Ffirmado, Fentrega_ur,envio_personal,archivo,FO ,color_estado, estatus  FROM fomope_qr WHERE (rfc='$rfcBuscar' AND unidad='$unidadBuscar' AND quincenaAplicada='$qnaBuscar')";
	 							
							}elseif ($rfcBuscar == "" && $nombreBuscar == "" && $apellidoBuscar != "" && $apellidomBuscar == "" && $unidadBuscar == ""  &&  $qnaBuscar != "") {
								
								$sql = "SELECT * FROM fomope WHERE ( apellido_1='$apellidoBuscar' AND quincenaAplicada='$qnaBuscar')";
								$sql2 = "SELECT * FROM fomope_qr WHERE rfc = '--'";
							}elseif ($rfcBuscar == "" && $nombreBuscar == "" && $apellidoBuscar == "" && $apellidomBuscar != "" && $unidadBuscar == ""  &&  $qnaBuscar != "") {
								
								$sql = "SELECT * FROM fomope WHERE ( apellido_2='$apellidomBuscar' AND quincenaAplicada='$qnaBuscar')";
								$sql2 = "SELECT * FROM fomope_qr WHERE rfc = '--'";
							}elseif ($rfcBuscar == "" && $nombreBuscar == "" && $apellidoBuscar == "" && $apellidomBuscar == "" && $unidadBuscar != ""  &&  $qnaBuscar != "") {
								
								$sql = "SELECT * FROM fomope WHERE ( unidad='$unidadBuscar' AND quincenaAplicada='$qnaBuscar')";
								$sql2="SELECT id_movimiento_qr,tipoRegistro,unidad,rfc,usuario_modifico,qna,fini,tipo_movimiento, fechaAutorizacion,llave,Frecepcion, Fen_firma, Ffirmado, Fentrega_ur,envio_personal,archivo,FO ,color_estado, estatus FROM fomope_qr WHERE ( unidad='$unidadBuscar' AND qna='$qnaBuscar')";
							}elseif ($rfcBuscar == "" && $nombreBuscar == "" && $apellidoBuscar == "" && $apellidomBuscar == "" && $unidadBuscar != ""  &&  $qnaBuscar != "") {
								
								$sql = "SELECT * FROM fomope WHERE ( unidad='$unidadBuscar' AND quincenaAplicada='$qnaBuscar')";
								$sql2="SELECT id_movimiento_qr,tipoRegistro,unidad,rfc,usuario_modifico,qna,fini,tipo_movimiento, fechaAutorizacion,llave,Frecepcion, Fen_firma, Ffirmado, Fentrega_ur,envio_personal,archivo,FO ,color_estado, estatus FROM fomope_qr WHERE ( unidad='$unidadBuscar' AND qna='$qnaBuscar')";
	 							
							}elseif ($rfcBuscar != "" && $nombreBuscar != "" && $apellidoBuscar == "" && $apellidomBuscar == "" && $unidadBuscar == ""  &&  $qnaBuscar == "") {
							 	
								$sql = "SELECT * FROM fomope WHERE (rfc='$rfcBuscar' AND nombre = '$nombreBuscar')";
								$sql2 = "SELECT * FROM fomope_qr WHERE rfc = '--'";
								
							}elseif ($rfcBuscar != "" && $nombreBuscar != "" && $apellidoBuscar != "" && $apellidomBuscar == "" && $unidadBuscar == ""  &&  $qnaBuscar == "") {
								
								$sql = "SELECT * FROM fomope WHERE (rfc='$rfcBuscar' AND nombre = '$nombreBuscar' AND apellido_1='$apellidoBuscar' )";
								$sql2 = "SELECT * FROM fomope_qr WHERE rfc = '--'";
								
							}elseif ($rfcBuscar != "" && $nombreBuscar != "" && $apellidoBuscar == "" && $apellidomBuscar != "" && $unidadBuscar == ""  &&  $qnaBuscar == "") {
								
								$sql = "SELECT * FROM fomope WHERE (rfc='$rfcBuscar' AND nombre = '$nombreBuscar' AND apellido_2='$apellidomBuscar')";
								$sql2 = "SELECT * FROM fomope_qr WHERE rfc = '--'";
								
							}elseif ($rfcBuscar != "" && $nombreBuscar != "" && $apellidoBuscar == "" && $apellidomBuscar == "" && $unidadBuscar != ""  &&  $qnaBuscar == "") {
								
								$sql = "SELECT * FROM fomope WHERE (rfc='$rfcBuscar' AND nombre = '$nombreBuscar' AND unidad='$unidadBuscar' )";
								$sql2 = "SELECT * FROM fomope_qr WHERE rfc = '--'";
								
							}elseif ($rfcBuscar != "" && $nombreBuscar != "" && $apellidoBuscar == "" && $apellidomBuscar == "" && $unidadBuscar == ""  &&  $qnaBuscar != "") {
								
								$sql = "SELECT * FROM fomope WHERE (rfc='$rfcBuscar' AND nombre = '$nombreBuscar' AND  quincenaAplicada='$qnaBuscar')";
								$sql2 = "SELECT * FROM fomope_qr WHERE rfc = '--'";
								
							}elseif ($rfcBuscar != "" && $nombreBuscar != "" && $apellidoBuscar != "" && $apellidomBuscar != "" && $unidadBuscar == ""  &&  $qnaBuscar != "") {
								
								$sql = "SELECT * FROM fomope WHERE (rfc='$rfcBuscar' AND nombre = '$nombreBuscar' AND apellido_1='$apellidoBuscar' AND apellido_2='$apellidomBuscar' AND  quincenaAplicada='$qnaBuscar')";
								$sql2 = "SELECT * FROM fomope_qr WHERE rfc = '--'";
								
							}elseif ($rfcBuscar != "" && $nombreBuscar != "" && $apellidoBuscar != "" && $apellidomBuscar == "" && $unidadBuscar == ""  &&  $qnaBuscar != "") {
								
								$sql = "SELECT * FROM fomope WHERE (rfc='$rfcBuscar' AND nombre = '$nombreBuscar' AND apellido_1='$apellidoBuscar' AND  quincenaAplicada='$qnaBuscar')";
								$sql2 = "SELECT * FROM fomope_qr WHERE rfc = '--'";
								
							}elseif ($rfcBuscar != "" && $nombreBuscar != "" && $apellidoBuscar == "" && $apellidomBuscar != "" && $unidadBuscar != ""  &&  $qnaBuscar == "") {
								
								$sql = "SELECT * FROM fomope WHERE (rfc='$rfcBuscar' AND nombre = '$nombreBuscar' AND apellido_2='$apellidomBuscar' AND unidad='$unidadBuscar')";
								$sql2 = "SELECT * FROM fomope_qr WHERE rfc = '--'";
	 							
							}elseif ($rfcBuscar != "" && $nombreBuscar != "" && $apellidoBuscar != "" && $apellidomBuscar == "" && $unidadBuscar != ""  &&  $qnaBuscar == "") {
								
								$sql = "SELECT * FROM fomope WHERE (rfc='$rfcBuscar' AND nombre = '$nombreBuscar' AND apellido_1='$apellidoBuscar' AND unidad='$unidadBuscar')";
								$sql2 = "SELECT * FROM fomope_qr WHERE rfc = '--'";
	 							
	 							
							}elseif ($rfcBuscar != "" && $nombreBuscar != "" && $apellidoBuscar == "" && $apellidomBuscar != "" && $unidadBuscar != ""  &&  $qnaBuscar != "") {
								
								$sql = "SELECT * FROM fomope WHERE (rfc='$rfcBuscar' AND nombre = '$nombreBuscar' AND apellido_2='$apellidomBuscar' AND unidad='$unidadBuscar' AND quincenaAplicada='$qnaBuscar')";
								$sql2 = "SELECT * FROM fomope_qr WHERE rfc = '--'";
	 							
							}elseif ($rfcBuscar != "" && $nombreBuscar != "" && $apellidoBuscar == "" && $apellidomBuscar != "" && $unidadBuscar == ""  &&  $qnaBuscar != "") {
								
								$sql = "SELECT * FROM fomope WHERE (rfc='$rfcBuscar' AND nombre = '$nombreBuscar' AND apellido_2='$apellidomBuscar' AND quincenaAplicada='$qnaBuscar')";
								$sql2 = "SELECT * FROM fomope_qr WHERE rfc = '--'";
	 							
							}elseif ($rfcBuscar != "" && $nombreBuscar != "" && $apellidoBuscar != "" && $apellidomBuscar == "" && $unidadBuscar != ""  &&  $qnaBuscar != "") {
								
								$sql = "SELECT * FROM fomope WHERE (rfc='$rfcBuscar' AND nombre = '$nombreBuscar' AND apellido_1='$apellidoBuscar' AND unidad='$unidadBuscar' AND quincenaAplicada='$qnaBuscar')";
								$sql2 = "SELECT * FROM fomope_qr WHERE rfc = '--'";
	 							
							}elseif($rfcBuscar != "" && $nombreBuscar != "" && $apellidoBuscar == "" && $apellidomBuscar == "" && $unidadBuscar != ""  &&  $qnaBuscar != "") {
								
								$sql = "SELECT * FROM fomope WHERE (rfc='$rfcBuscar' AND nombre = '$nombreBuscar' AND apellido_1='$apellidoBuscar')";
								$sql2 = "SELECT * FROM fomope_qr WHERE rfc = '--'";
								
							}elseif ($rfcBuscar != "" && $nombreBuscar == "" && $apellidoBuscar != "" && $apellidomBuscar == "" && $unidadBuscar == ""  &&  $qnaBuscar == "") {
								
								$sql = "SELECT * FROM fomope WHERE (rfc='$rfcBuscar'  AND apellido_1='$apellidoBuscar')";
								$sql2 = "SELECT * FROM fomope_qr WHERE rfc = '--'";
								
							}elseif ($rfcBuscar != "" && $nombreBuscar != "" && $apellidoBuscar != "" && $apellidomBuscar != "" && $unidadBuscar == ""  &&  $qnaBuscar == "") {
								
								$sql = "SELECT * FROM fomope WHERE (rfc='$rfcBuscar' AND nombre = '$nombreBuscar' AND apellido_1='$apellidoBuscar' AND apellido_2='$apellidomBuscar')";
								$sql2 = "SELECT * FROM fomope_qr WHERE rfc = '--'";
								
							}elseif ($rfcBuscar == "" && $nombreBuscar != "" && $apellidoBuscar == "" && $apellidomBuscar == "" && $unidadBuscar == ""  &&  $qnaBuscar == "") {
								
								$sql = "SELECT * FROM fomope WHERE (nombre LIKE '%$nombreBuscar%')";
								$sql2="SELECT id_movimiento_qr,tipoRegistro,unidad,rfc,usuario_modifico,qna,fini,tipo_movimiento, fechaAutorizacion,llave,Frecepcion, Fen_firma, Ffirmado, Fentrega_ur,envio_personal,archivo,FO ,color_estado, estatus FROM fomope_qr WHERE (nombre LIKE '%$nombreBuscar%')";
								
							}elseif ($rfcBuscar == "" && $nombreBuscar != "" && $apellidoBuscar != "" && $apellidomBuscar == "" && $unidadBuscar == ""  &&  $qnaBuscar == "") {
								
								$sql = "SELECT * FROM fomope WHERE (nombre = '$nombreBuscar' AND apellido_1='$apellidoBuscar')";
								$sql2 = "SELECT * FROM fomope_qr WHERE rfc = '--'";
							}elseif ($rfcBuscar == "" && $nombreBuscar != "" && $apellidoBuscar != "" && $apellidomBuscar != "" && $unidadBuscar == ""  &&  $qnaBuscar == "") {
								
								$sql = "SELECT * FROM fomope WHERE ( nombre = '$nombreBuscar' AND apellido_1='$apellidoBuscar' AND apellido_2='$apellidomBuscar')";
								$sql2="SELECT id_movimiento_qr,tipoRegistro,unidad,rfc,usuario_modifico,qna,fini,tipo_movimiento, fechaAutorizacion,llave,Frecepcion, Fen_firma, Ffirmado, Fentrega_ur,envio_personal,archivo,FO ,color_estado, estatus FROM fomope_qr WHERE (nombre = '$nombreBuscar' AND apellido_p='$apellidoBuscar' AND apellido_m='$apellidomBuscar')";
								
							}elseif($rfcBuscar == "" && $nombreBuscar != "" && $apellidoBuscar != "" && $apellidomBuscar != "" && $unidadBuscar != ""  &&  $qnaBuscar == ""){

								$sql = "SELECT * FROM fomope WHERE (nombre='$nombreBuscar' AND apellido_1='$apellidoBuscar' AND apellido_2='$apellidomBuscar' AND unidad='$unidadBuscar')";
								$sql2="SELECT id_movimiento_qr,tipoRegistro,unidad,rfc,usuario_modifico,qna,fini,tipo_movimiento, fechaAutorizacion,llave,Frecepcion, Fen_firma, Ffirmado, Fentrega_ur,envio_personal,archivo,FO ,color_estado, estatus FROM fomope_qr WHERE (nombre='$nombreBuscar' AND apellido_p='$apellidoBuscar' AND apellido_m='$apellidomBuscar' AND unidad='$unidadBuscar')";
 							}elseif ($rfcBuscar == "" && $nombreBuscar == "" && $apellidoBuscar != "" && $apellidomBuscar == "" && $unidadBuscar == ""  &&  $qnaBuscar == "") {
								
								$sql = "SELECT * FROM fomope WHERE (apellido_1 LIKE '%$apellidoBuscar%')";
								$sql2="SELECT id_movimiento_qr,tipoRegistro,unidad,rfc,usuario_modifico,qna,fini,tipo_movimiento, fechaAutorizacion,llave,Frecepcion, Fen_firma, Ffirmado, Fentrega_ur,envio_personal,archivo,FO ,color_estado, estatus FROM fomope_qr WHERE (apellido_p LIKE '%$apellidoBuscar%')";
								
							}elseif ($rfcBuscar == "" && $nombreBuscar == "" && $apellidoBuscar != "" && $apellidomBuscar != "" && $unidadBuscar == ""  &&  $qnaBuscar == "") {
								
								$sql = "SELECT * FROM fomope WHERE (apellido_1='$apellidoBuscar' AND apellido_2='$apellidomBuscar')";
								$sql2 = "SELECT * FROM fomope_qr WHERE rfc = '--'";
								
							}elseif($rfcBuscar == "" && $nombreBuscar == "" && $apellidoBuscar != "" && $apellidomBuscar != "" && $unidadBuscar != ""  &&  $qnaBuscar == ""){

								$sql = "SELECT * FROM fomope WHERE (apellido_1='$apellidoBuscar' AND apellido_2='$apellidomBuscar' AND unidad='$unidadBuscar')";
								$sql2="SELECT id_movimiento_qr,tipoRegistro,unidad,rfc,usuario_modifico,qna,fini,tipo_movimiento, fechaAutorizacion,llave,Frecepcion, Fen_firma, Ffirmado, Fentrega_ur,envio_personal,archivo,FO ,color_estado, estatus FROM fomope_qr WHERE (apellido_p='$apellidoBuscar' AND apellido_m='$apellidomBuscar' AND unidad='$unidadBuscar')";

 							}elseif($rfcBuscar == "" && $nombreBuscar == "" && $apellidoBuscar != "" && $apellidomBuscar != "" && $unidadBuscar != ""  &&  $qnaBuscar != ""){

								$sql = "SELECT * FROM fomope WHERE (apellido_1='$apellidoBuscar' AND apellido_2='$apellidomBuscar' AND unidad='$unidadBuscar' AND quincenaAplicada='$qnaBuscar')";
								$sql2="SELECT id_movimiento_qr,tipoRegistro,unidad,rfc,usuario_modifico,qna,fini,tipo_movimiento, fechaAutorizacion,llave,Frecepcion, Fen_firma, Ffirmado, Fentrega_ur,envio_personal,archivo,FO ,color_estado, estatus FROM fomope_qr WHERE (apellido_p='$apellidoBuscar' AND apellido_m='$apellidomBuscar' AND unidad='$unidadBuscar' AND qna='$qnaBuscar')";

 							}elseif($rfcBuscar == "" && $nombreBuscar == "" && $apellidoBuscar == "" && $apellidomBuscar != "" && $unidadBuscar != ""  &&  $qnaBuscar != ""){

								$sql = "SELECT * FROM fomope WHERE ( apellido_2='$apellidomBuscar' AND unidad='$unidadBuscar' AND quincenaAplicada='$qnaBuscar')";
								$sql2 = "SELECT * FROM fomope_qr WHERE rfc = '--'";

 							}elseif($rfcBuscar == "" && $nombreBuscar == "" && $apellidoBuscar != "" && $apellidomBuscar != "" && $unidadBuscar == ""  &&  $qnaBuscar != ""){

								$sql = "SELECT * FROM fomope WHERE (apellido_1='$apellidoBuscar' AND apellido_2='$apellidomBuscar' AND quincenaAplicada='$qnaBuscar')";
								$sql2="SELECT id_movimiento_qr,tipoRegistro,unidad,rfc,usuario_modifico,qna,fini,tipo_movimiento, fechaAutorizacion,llave,Frecepcion, Fen_firma, Ffirmado, Fentrega_ur,envio_personal,archivo,FO ,color_estado, estatus FROM fomope_qr WHERE (apellido_p='$apellidoBuscar' AND apellido_m='$apellidomBuscar' AND qna='$qnaBuscar')";

 							}elseif ($rfcBuscar == "" && $nombreBuscar == "" && $apellidoBuscar == "" && $apellidomBuscar != "" && $unidadBuscar == ""  &&  $qnaBuscar == "") {
								
								$sql = "SELECT * FROM fomope WHERE (apellido_2 LIKE '%$apellidomBuscar%')";
								$sql2 = "SELECT * FROM fomope_qr WHERE rfc = '--'";
								
							}elseif($rfcBuscar == "" && $nombreBuscar == "" && $apellidoBuscar == "" && $apellidomBuscar != "" && $unidadBuscar != ""  &&  $qnaBuscar == ""){

								$sql = "SELECT * FROM fomope WHERE (apellido_2='$apellidomBuscar' AND unidad='$unidadBuscar')";
								$sql2 = "SELECT * FROM fomope_qr WHERE rfc = '--'";

 							}elseif($rfcBuscar == "" && $nombreBuscar == "" && $apellidoBuscar == "" && $apellidomBuscar == "" && $unidadBuscar != ""  &&  $qnaBuscar == ""){

								$sql = "SELECT * FROM fomope WHERE (unidad LIKE '%$unidadBuscar%')";
								$sql2="SELECT id_movimiento_qr,tipoRegistro,unidad,rfc,usuario_modifico,qna,fini,tipo_movimiento, fechaAutorizacion,llave,Frecepcion, Fen_firma, Ffirmado, Fentrega_ur,envio_personal,archivo,FO ,color_estado, estatus FROM fomope_qr WHERE (unidad LIKE '%$unidadBuscar%')";

 							}elseif ($rfcBuscar == "" && $nombreBuscar != "" && $apellidoBuscar == "" && $apellidomBuscar != "" && $unidadBuscar == ""  &&  $qnaBuscar == "") {
								
								$sql = "SELECT * FROM fomope WHERE ( nombre = '$nombreBuscar' AND apellido_2='$apellidomBuscar')";
								$sql2="SELECT id_movimiento_qr,tipoRegistro,unidad,rfc,usuario_modifico,qna,fini,tipo_movimiento, fechaAutorizacion,llave,Frecepcion, Fen_firma, Ffirmado, Fentrega_ur,envio_personal,archivo,FO ,color_estado, estatus FROM fomope_qr WHERE ( nombre = '$nombreBuscar' AND apellido_m='$apellidomBuscar')";
								
							}elseif ($rfcBuscar == "" && $nombreBuscar != "" && $apellidoBuscar == "" && $apellidomBuscar != "" && $unidadBuscar == ""  &&  $qnaBuscar != "") {
								
								$sql = "SELECT * FROM fomope WHERE ( nombre = '$nombreBuscar' AND apellido_2='$apellidomBuscar' AND quincenaAplicada='$qnaBuscar')";
								$sql2 = "SELECT * FROM fomope_qr WHERE rfc = '--'";
								
							}elseif ($rfcBuscar == "" && $nombreBuscar != "" && $apellidoBuscar == "" && $apellidomBuscar != "" && $unidadBuscar != ""  &&  $qnaBuscar == "") {
								
								$sql = "SELECT * FROM fomope WHERE ( nombre = '$nombreBuscar' AND apellido_2='$apellidomBuscar' AND unidad='$unidadBuscar')";
								$sql2 = "SELECT * FROM fomope_qr WHERE rfc = '--'";
								
							}elseif ($rfcBuscar == "" && $nombreBuscar != "" && $apellidoBuscar == "" && $apellidomBuscar != "" && $unidadBuscar != ""  &&  $qnaBuscar != "") {
								
								$sql = "SELECT * FROM fomope WHERE ( nombre = '$nombreBuscar' AND apellido_2='$apellidomBuscar' AND unidad='$unidadBuscar' AND quincenaAplicada='$qnaBuscar')";
								$sql2 = "SELECT * FROM fomope_qr WHERE rfc = '--'";
								
							}elseif ($rfcBuscar == "" && $nombreBuscar != "" && $apellidoBuscar == "" && $apellidomBuscar == "" && $unidadBuscar != ""  &&  $qnaBuscar != "") {
								
								$sql = "SELECT * FROM fomope WHERE ( nombre = '$nombreBuscar' AND unidad='$unidadBuscar' AND quincenaAplicada='$qnaBuscar')";
								$sql2 = "SELECT * FROM fomope_qr WHERE rfc = '--'";
								
							}elseif ($rfcBuscar == "" && $nombreBuscar != "" && $apellidoBuscar != "" && $apellidomBuscar == "" && $unidadBuscar == ""  &&  $qnaBuscar == "") {
								
								$sql = "SELECT * FROM fomope WHERE ( nombre = '$nombreBuscar' AND apellido_1='$apellidoBuscar')";
								$sql2="SELECT id_movimiento_qr,tipoRegistro,unidad,rfc,usuario_modifico,qna,fini,tipo_movimiento, fechaAutorizacion,llave,Frecepcion, Fen_firma, Ffirmado, Fentrega_ur,envio_personal,archivo,FO ,color_estado, estatus FROM fomope_qr WHERE (nombre = '$nombreBuscar' AND apellido_p='$apellidoBuscar')";
								
							}elseif ($rfcBuscar == "" && $nombreBuscar != "" && $apellidoBuscar != "" && $apellidomBuscar != "" && $unidadBuscar == ""  &&  $qnaBuscar == "") {
								
								$sql = "SELECT * FROM fomope WHERE ( nombre = '$nombreBuscar' AND apellido_1='$apellidoBuscar' AND apellido_2='$apellidomBuscar')";
								$sql2="SELECT id_movimiento_qr,tipoRegistro,unidad,rfc,usuario_modifico,qna,fini,tipo_movimiento, fechaAutorizacion,llave,Frecepcion, Fen_firma, Ffirmado, Fentrega_ur,envio_personal,archivo,FO ,color_estado, estatus FROM fomope_qr WHERE (nombre = '$nombreBuscar' AND apellido_p='$apellidoBuscar' AND apellido_m='$apellidomBuscar')";
								
							}elseif ($rfcBuscar == "" && $nombreBuscar != "" && $apellidoBuscar != "" && $apellidomBuscar == "" && $unidadBuscar != ""  &&  $qnaBuscar == "") {
								
								$sql = "SELECT * FROM fomope WHERE ( nombre = '$nombreBuscar' AND apellido_1='$apellidoBuscar' AND unidad='$unidadBuscar')";
								$sql2 = "SELECT * FROM fomope_qr WHERE rfc = '--'";
	 							
							}elseif ($rfcBuscar == "" && $nombreBuscar != "" && $apellidoBuscar != "" && $apellidomBuscar != "" && $unidadBuscar == ""  &&  $qnaBuscar != "") {
								
								$sql = "SELECT * FROM fomope WHERE ( nombre = '$nombreBuscar' AND apellido_1='$apellidoBuscar' AND apellido_2='$apellidomBuscar' AND quincenaAplicada='$qnaBuscar')";
								$sql2="SELECT id_movimiento_qr,tipoRegistro,unidad,rfc,usuario_modifico,qna,fini,tipo_movimiento, fechaAutorizacion,llave,Frecepcion, Fen_firma, Ffirmado, Fentrega_ur,envio_personal,archivo,FO ,color_estado, estatus FROM fomope_qr WHERE (nombre = '$nombreBuscar' AND apellido_p='$apellidoBuscar' AND apellido_m='$apellidomBuscar' AND qna='$qnaBuscar')";
								
							}elseif ($rfcBuscar == "" && $nombreBuscar != "" && $apellidoBuscar != "" && $apellidomBuscar == "" && $unidadBuscar != ""  &&  $qnaBuscar != "") {
								
								$sql = "SELECT * FROM fomope WHERE ( nombre = '$nombreBuscar' AND apellido_1='$apellidoBuscar' AND unidad='$unidadBuscar' AND quincenaAplicada='$qnaBuscar')";
								$sql2 = "SELECT * FROM fomope_qr WHERE rfc = '--'";
	 							
							}elseif ($rfcBuscar == "" && $nombreBuscar != "" && $apellidoBuscar != "" && $apellidomBuscar == "" && $unidadBuscar == ""  &&  $qnaBuscar != "") {
								
								$sql = "SELECT * FROM fomope WHERE ( nombre = '$nombreBuscar' AND apellido_1='$apellidoBuscar' AND quincenaAplicada='$qnaBuscar')";
								$sql2="SELECT id_movimiento_qr,tipoRegistro,unidad,rfc,usuario_modifico,qna,fini,tipo_movimiento, fechaAutorizacion,llave,Frecepcion, Fen_firma, Ffirmado, Fentrega_ur,envio_personal,archivo,FO ,color_estado, estatus FROM fomope_qr WHERE (nombre = '$nombreBuscar' AND apellido_p='$apellidoBuscar' AND qna='$qnaBuscar')";
	 							
							}elseif ($rfcBuscar == "" && $nombreBuscar == "" && $apellidoBuscar != "" && $apellidomBuscar == "" && $unidadBuscar != ""  &&  $qnaBuscar != "") {
								
								$sql = "SELECT * FROM fomope WHERE ( apellido_1='$apellidoBuscar' AND unidad='$unidadBuscar' AND quincenaAplicada='$qnaBuscar')";
								$sql2 = "SELECT * FROM fomope_qr WHERE rfc = '--'";
	 							
							}elseif ($rfcBuscar == "" && $nombreBuscar != "" && $apellidoBuscar == "" && $apellidomBuscar == "" && $unidadBuscar != ""  &&  $qnaBuscar == "") {
								
								$sql = "SELECT * FROM fomope WHERE ( nombre = '$nombreBuscar' AND unidad='$unidadBuscar')";
								$sql2 = "SELECT * FROM fomope_qr WHERE rfc = '--'";
	 							
							}elseif ($rfcBuscar == "" && $nombreBuscar == "" && $apellidoBuscar != "" && $apellidomBuscar == "" && $unidadBuscar != ""  &&  $qnaBuscar == "") {
								
								$sql = "SELECT * FROM fomope WHERE ( apellido_1='$apellidoBuscar' AND unidad='$unidadBuscar')";
								$sql2 = "SELECT * FROM fomope_qr WHERE rfc = '--'";

	 						}elseif ($rfcBuscar == "" && $nombreBuscar != "" && $apellidoBuscar != "" && $apellidomBuscar != "" && $unidadBuscar == ""  &&  $qnaBuscar == "") {
								
								$sql = "SELECT * FROM fomope WHERE ( 
								apellido_1='$apellidoBuscar' AND apellido_2='$apellidomBuscar')";
								$sql2="SELECT id_movimiento_qr,tipoRegistro,unidad,rfc,usuario_modifico,qna,fini,tipo_movimiento, fechaAutorizacion,llave,Frecepcion, Fen_firma, Ffirmado, Fentrega_ur,envio_personal,archivo,FO ,color_estado, estatus FROM fomope_qr WHERE (apellido_p='$apellidoBuscar' AND apellido_m='$apellidomBuscar')";
								
							}elseif($rfcBuscar == "" && $nombreBuscar == "" && $apellidoBuscar == "" && $apellidomBuscar == "" && $unidadBuscar == ""  &&  $qnaBuscar != ""){

								$sql = "SELECT * FROM fomope WHERE ( quincenaAplicada='$qnaBuscar')";
								$sql2="SELECT id_movimiento_qr,tipoRegistro,unidad,rfc,usuario_modifico,qna,fini,tipo_movimiento, fechaAutorizacion,llave,Frecepcion, Fen_firma, Ffirmado, Fentrega_ur,envio_personal,archivo,FO ,color_estado, estatus FROM fomope_qr WHERE ( qna='$qnaBuscar')";
								$sql3="SELECT * FROM conteo_qr  WHERE (anio = '$anioBuscar' AND qna='$qnaBuscar')";
								$banderaFomope = 1;
 							}elseif($rfcBuscar == "" && $nombreBuscar != "" && $apellidoBuscar == "" && $apellidomBuscar == "" && $unidadBuscar == ""  &&  $qnaBuscar != ""){

								$sql = "SELECT * FROM fomope WHERE (nombre = '$nombreBuscar' AND quincenaAplicada='$qnaBuscar')";
								$sql2="SELECT id_movimiento_qr,tipoRegistro,unidad,rfc,usuario_modifico,qna,fini,tipo_movimiento, fechaAutorizacion,llave,Frecepcion, Fen_firma, Ffirmado, Fentrega_ur,envio_personal,archivo,FO ,color_estado, estatus FROM fomope_qr WHERE ( nombre = '$nombreBuscar' AND qna='$qnaBuscar')";

 							}elseif($rfcBuscar == "" && $nombreBuscar == "" && $apellidoBuscar == "" && $apellidomBuscar == "" && $unidadBuscar == ""  &&  $qnaBuscar == "" && $anioBuscar == ""){

								$sql = "SELECT * FROM fomope WHERE (rfc='$rfcBuscar' AND nombre='$nombreBuscar' AND apellido_1='$apellidoBuscar' AND apellido_2='$apellidomBuscar' AND unidad='$unidadBuscar'  AND quincenaAplicada='$qnaBuscar')";
								$sql2="SELECT id_movimiento_qr,tipoRegistro,unidad,rfc,usuario_modifico,qna,fini,tipo_movimiento, fechaAutorizacion,llave,Frecepcion, Fen_firma, Ffirmado, Fentrega_ur,envio_personal,archivo,FO ,color_estado, estatus FROM fomope_qr WHERE (rfc='$rfcBuscar' AND nombre='$nombreBuscar' AND apellido_p='$apellidoBuscar' AND apellido_m='$apellidomBuscar' AND unidad='$unidadBuscar'  AND qna='$qnaBuscar')";

 							}elseif($rfcBuscar != "" && $nombreBuscar != "" && $apellidoBuscar != "" && $apellidomBuscar != "" && $unidadBuscar != ""  &&  $qnaBuscar == ""){

								$sql = "SELECT * FROM fomope WHERE (rfc='$rfcBuscar' AND nombre='$nombreBuscar' AND apellido_1='$apellidoBuscar' AND apellido_2='$apellidomBuscar' AND unidad='$unidadBuscar')";
								$sql2="SELECT id_movimiento_qr,tipoRegistro,unidad,rfc,usuario_modifico,qna,fini,tipo_movimiento, fechaAutorizacion,llave,Frecepcion, Fen_firma, Ffirmado, Fentrega_ur,envio_personal,archivo,FO ,color_estado, estatus FROM fomope_qr WHERE (rfc='$rfcBuscar' AND nombre='$nombreBuscar' AND apellido_p='$apellidoBuscar' AND apellido_m='$apellidomBuscar' AND unidad='$unidadBuscar')";
 							
 							}
							
							if($banderaFomope == 0){
								$sql3="SELECT * FROM conteo_qr  WHERE rfc = '--'";
							}



							/*
							elseif($rfcBuscar == "" && $nombreBuscar != "" && $apellidoBuscar != "" && $apellidomBuscar != "" && $unidadBuscar == ""  &&  $qnaBuscar == ""  &&  $anioBuscar != ""){

								$sql = "SELECT * FROM fomope WHERE (nombre='$nombreBuscar' AND apellido_1='$apellidoBuscar' AND apellido_2='$apellidomBuscar' AND anio='$anioBuscar')";

 							}elseif($rfcBuscar == "" && $nombreBuscar != "" && $apellidoBuscar != "" && $apellidomBuscar != "" && $unidadBuscar == ""  &&  $qnaBuscar != ""  &&  $anioBuscar != ""){

								$sql = "SELECT * FROM fomope WHERE (nombre='$nombreBuscar' AND apellido_1='$apellidoBuscar' AND apellido_2='$apellidomBuscar' AND quincenaAplicada='$qnaBuscar' AND anio='$anioBuscar')";

 							}
 							*/
?>
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
							
							<th scope="titulo" style="display: none;" class="sticky"></th>
							 <th scope="titulo" style="text-align: center" style="width: 400px" class="sticky">RFC</th>
						      <th scope="titulo" style="text-align: center"   style="text-align: center" class="sticky">Estado FOMOPE</th>
						      <th scope="titulo"  style="text-align: center" class="sticky">Unidad</th>
						      <th scope="titulo"  style="text-align: center" class="sticky">Última modificación</th>
						       <th scope="titulo" style="text-align: center" class="sticky">Movimiento</th>
						       <th scope="titulo" style="text-align: center" class="sticky">Entrega operados a la unidad</th>
						       <th scope="titulo" style="text-align: center" class="sticky">Entrega expediente relaciones laborales</th>
						       <th scope="titulo" style="text-align: center" class="sticky">Envío a validación</th>
						       <th scope="titulo" style="text-align: center" class="sticky">Fomope Loteado y Firmado</th>
						       
						   </tr>
						</thead>
				 <tbody>
				          <?php


							$sqlColor="SELECT colorAsignado FROM usuarios WHERE usuario='$usuarioSeguir'";

							$idMatriz = 0;
							$imprimirNoExiste = 0;
							if ($result = mysqli_query($conexion,$sql)) {

								$totalFilas    =    mysqli_num_rows($result);  
								if($totalFilas == 0){
										$imprimirNoExiste ++;
										$matriz[0][0] = 0;
										echo('
															<br>
															<br>
															<div class="col-sm-12 ">
															<div class="plantilla-inputv text-dark">
															    <div class="card-body"><h2 align="center">No existe resultados de la busqueda, vuelve intentar.</h2></div>
														</div>
														</div>');
									//	$matrizEventuales = queryEventual($sql2,$imprimirNoExiste);
								}else{


									while($ver=mysqli_fetch_row($result)){ 

										if($ver[1] == 'negro1'){

											$ver[1] = 'DSPO Rechazo';
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
							<td><?php echo $ver[4] ?></td>
							<td>
				<!-- activamos funcion de .ajax para poder mostrar el histirial del proceso del fomope  -->
							<button type="button"  onclick="guardarId(<?php echo $ver[0]; ?>)"  id="verHistorial" name="verHistorial" class='btn-secondary' data-toggle="modal" data-target="#exampleModal1" data-whatever="@getbootstrap"><?php echo $ver[1] ?></button>
							</td>
							<td><?php echo $ver[3] ?></td>
							<td><?php echo $ver[44] ?></td>
							<td><?php echo $ver[23] ?></td>
							<td><?php echo $ver[42] ?></td>
							<td><?php echo $ver[39] ?></td>
							<td><?php echo $ver[125] ?></td>
							<td>
								<?php
									if($ver[126] == "doc76"){
								?>
										<button class="btn btn-success" > ✔ </button>
								<?php
									}else{
								?>

										<button class="btn btn-danger" > X </button>
								<?php
									}
								?>
							</td>
							
							<td><?php
						if($ver[45] == "BAJAS"){
							echo "
							<form method='get' action='./verListBaja.php'>
								<input type='text' style='display: none;' name='usuario_rol' value='$usuarioSeguir'>
								<input type='text' style='display: none;' name='idMov' value='$ver[0]'>
								<input type='submit' name='verList' class='btn-secondary' value='Ver lista de Doc.'>
							</form> ";
						}else{
							echo "
							<form method='get' action='./verList.php'>
								<input type='text' style='display: none;' name='usuario_rol' value='$usuarioSeguir'>
								<input type='text' style='display: none;' name='idMov' value='$ver[0]'>
								<input type='submit' name='verList' class='btn-secondary' value='Ver lista de Doc.'>
							</form> "
							;
						}


							?>
							</td>
						</tr>
						<?php 
							//$matriz = array($idMatriz => $ver[0] );
							$matriz[$idMatriz]= $ver[0];							
							$idMatriz++;
							}
						}
						?>
						<td>
							<h2>TOTAL:</h2>
						</td>
						<td>
							<h2>TOTAL:</h2>
						</td>
						<td>
							<h3>	<?php echo $idMatriz; ?>	</h3>
						</td>
						<?php
						}else{
							echo '<script type="text/javascript">alert("Error en la conexion");</script>';
							echo '<script type="text/javascript">alert("error '. mysqli_error($conexion).'");</script>';
						}
		

?>
		 </tbody>
		</table>
	</div>
	</div>	
	<?php

		$matrizEventuales = queryEventual($sql2,$imprimirNoExiste);
	?>
	<!-- ******************************************************tabla de resultado sobre el QR pre cargado -->
<div class="table-responsive">
		<table id="tabQr" class="table table-striped table-bordered" style="margin-bottom: 0;  font-size:70%;" >
			
						<thead>
						    <tr>
							<!-- <td>Observacion</td>
							<td>ID Fomope</td> -->
							
							<th scope="titulo" style="display: none;" class="sticky"></th>
							 <th scope="titulo" style="text-align: center" style="width: 400px" class="sticky">RFC</th>
						      <th scope="titulo" style="text-align: center"   style="text-align: center" class="sticky">CURP</th>
						      <th scope="titulo"  style="text-align: center" class="sticky">QNA</th>
						   </tr>
						</thead>
				 <tbody>
				          <?php
							$imprimirNoExisteQr = 0;
							if ($result3 = mysqli_query($conexion,$sql3)) {

								$totalFilas    =    mysqli_num_rows($result3);  
								if($totalFilas == 0){
										$imprimirNoExisteQr ++;
										$matrizConteo[0][0] = 0;
										echo('
															<br>
															<br>
															<div class="col-sm-12 ">
															<div class="plantilla-inputv text-dark">
															    <div class="card-body"><h2 align="center">No existe resultados de la busqueda, vuelve intentar.</h2></div>
														</div>
														</div>');
									//	$matrizEventuales = queryEventual($sql2,$imprimirNoExiste);
								}else{


									while($ver3=mysqli_fetch_row($result3)){ 

						 ?>
						<tr id="<?php echo $ver3[0] ?>">
							<td style="display: none;"><?php echo $ver3[0] ?></td>
							<td><?php echo $ver3[7] ?></td>
							<td><?php echo $ver3[1] ?></td>
							<td><?php echo $ver3[5] ?></td>
							
							<td><?php
							$fecha = str_replace ( "-", '',$ver3[2] ); 
							$nombreCompleto = "./DOCUMENTOS_MOV_QR/FMP/". $ver3[1]."_FMP_".$ver3[5]."_".$fecha.".pdf";

							echo "

	
							<form method='get' action='Controller/controllerDescargaPagina2.php'>
								<input type='text' style='display: none;' name='extencion' value='pdf'>
								<input type='text' style='display: none;' name='nombreDecarga' value='$nombreCompleto'>
								<input type='submit' name='verList' class='btn-secondary' value='Ver lista de Doc.'>
							</form> ";

							?>
							</td>
				
						</tr>
						<?php 
							$matrizConteo[$imprimirNoExisteQr]= $ver3[0];							
							$imprimirNoExisteQr++;
							}
						?>
							<td>
							<h2>TOTAL:</h2>
							</td>
							<td>
							<h3>	<?php echo $imprimirNoExisteQr; ?>	</h3>
							</td>
							<form method="post" action="./generarFiltroExcel/reporteConteoQr.php">
								<input type='hidden' name='array' class='btn btn btn-success text-white bord' value='<?php  echo serialize($matrizConteo); ?>'>
								<input type='hidden' name='usuario_rol' class='btn btn btn-success text-white bord' value='<?php  echo $usuarioSeguir; ?>'>
								<input type='submit' name='accionBoton' class='izquierda btn btn-secondary bord' value="Reporte Conteo QR">
								<br>
								<br>
								<br>
							</form>
					<?php 
							
						}
						//$imprimirNoExiste++;
						}else{
							echo '<script type="text/javascript">alert("Error en la conexion");</script>';
							echo '<script type="text/javascript">alert("error '. mysqli_error($conexion).'");</script>';
						}
		

?>
		 </tbody>
		</table>
	</div>
	</div>	


<?php
		}
						?>

					<form method="post" action="./generarFiltroExcel/reporteBusqueda.php">
							<input type='hidden' name='array' class='btn btn btn-success text-white bord' value='<?php  echo serialize($matriz); ?>'>
							<input type='hidden' name='array2' class='btn btn btn-success text-white bord' value='<?php  echo serialize($matrizEventuales); ?>'>
							<input type='hidden' name='usuario_rol' class='btn btn btn-success text-white bord' value='<?php  echo $usuarioSeguir; ?>'>
							<input type='submit' name='accionBoton' class='izquierda btn btn btn-success text-white bord' value="Reporte Completo">
							<input type='submit' name='accionBoton' class='derecha btn btn btn-success text-white bord' value="Reporte Fomopes Operados">
							<br>
							<br>
							<br>

					</form>

				<!-- 	<div id="result" style="display: none;"> -->
	</center>

					<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title" id="exampleModalLabel">Historial del FOMOPE</h5>
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

