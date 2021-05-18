
<html>
	<head>
		<!-- ola kevss -->
		<meta charset="utf-8">
		<title>FOMOPE Autorizar</title>
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
							$(this).val(ui.item.value);
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
										var idx2 = response[0]['idx'];
										var unexp = response[0]['unexp'];
										document.getElementById('unexp_3').value = idx2;
									}
								}
							});
							return false;
						}
					});
				});
			});
		</script>
		

			<style type="text/css">
			.derecha   { float: right; }
			p.one {
			  border-style: solid;
			  border-color: hsl(0, 100%, 50%); /* red */
			}

			p.two {
			  border-style: solid;
			  border-color: hsl(240, 100%, 50%); /* blue */
			}

			p.three {
			  border-style: solid;
			  border-color: hsl(0, 0%, 73%); /* grey */
			}
			
			.formulario_fomope{
				padding-left: 10%;
				padding-right: 10%;
			}
			.bord {
			  border-style: solid;
			  border-color: #9f2241; /* grey */
			}
			.bordg {
			  border-style: solid;
			  border-color: #6f7271; /* grey */
			}
			input{
				text-transform: uppercase;
			}

			.estilo-color{
				font-family: Monserrat, Medium;
				font-size: 25px;
				color:  #9f2241 ;
				font-weight: bold;
			}
			.estilo-colorr{
				color:  #f2ebd7 ;
				font-weight: bold;
			}
			.estilo-colorn{
				color:  #000000 ;
				font-weight: bold;
			}
			.estilo-colorb{
				color:  #ffffff ;
				font-weight: bold;
			}

			.plantilla-titulos{
				background-color: #A9D0F5;
				font-family: Monserrat, Medium;
				font-size: 25px;
				font-weight: bold;
				padding: 12px 12px 0px 12px;
			}

			.plantilla-subtitulos{
				font-family: Monserrat, Medium;
				font-size: 18px;
				font-weight: bold;
			}
			.plantilla-subtitulosp{
				font-family: Monserrat, Medium;
				font-size: 22px;
				font-weight: bold;
			}
			.plantilla-subtitulospr{
				font-family: Monserrat, Medium;
				font-size: 25px;
				font-weight: bold;
			}

			.plantilla-inputb{
				text-color: #ffffff;
				font-family: Monserrat, Medium;
				padding: 12px;
			}
			.plantilla-input{
				background-color: #9f2241;
				font-family: Monserrat, Medium;
				padding: 12px;
			}
			.plantilla-inputg{
				background-color: #6f7271;
				font-family: Monserrat, Medium;
				padding: 25px;
			}
			.plantilla-inputv{
				background-color: #f2ebd7;
				font-family: Monserrat, Medium;
				padding: 12px;
			}

			.plantilla-label{
				font-weight: bold;
				border-color: hsl(0, 100%, 50%); /* red */
				font-family: Monserrat, Medium;
				font-size: 18px;
			}

			.plantilla-lugnac{
				background-color: #A9D0F5;
				font-family: Monserrat, Medium;
				font-size: 21px;
				font-weight: bold;
				padding: 12px 12px 2px 12px;
			}

			.plantilla-depend{
				background-color: #A9D0F5;
				font-family: Monserrat, Medium;
				font-size: 22px;
				font-weight: bold;
				padding: 12px 12px 8px 12px;
			}

			.plantilla-inputdepend{
				background-color: #CEE3F6;
				font-family: Monserrat, Medium;
				padding: 36px 12px 36px 12px;
			}

			.tamanio-button{
				font-weight: bold;
				font-size: 25px;
			}
			.tamanio-button2{
				font-weight: bold;
				font-size: 13px;
			}

		</style>

	</head>
	<body>
			<?php
				include "configuracion.php";
				$usuarioSeguir =  $_GET['usuario_rol'];
				
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
		  <a  href= <?php echo ("'./menuPrincipal.php?usuario_rol=$usuarioSeguir'");?>><img class="img-responsive" src="img/ss1.png" height="90" width="280"/></a>
		
		
		<center>			
						<h3 class="estilo-color plantilla-subtitulospr">Sistema de Control de Registro de Formato de Movimiento de Personal (SICON).</h3>
				<br>
				<h5  class=" plantilla-subtitulop" > DEPARTAMENTO DE DICTAMINACIÓN SALARIAL Y CONTRATOS POR HONORARIOS - DDSCH</h5>

				<script type="text/javascript">
					function obtenerRadioSeleccionado(formulario, nombre, userRol){
						console.log("siii");
						var count = 3;
					

						var contador = 0;
					     elementosSelectR = [];
					     elementos = document.getElementById(formulario).elements;
					     longitud = document.getElementById(formulario).length;
					     for (var i = 0; i < longitud; i++){
					         if(elementos[i].name == nombre && elementos[i].type == "checkbox" && elementos[i].checked == true){
										elementosSelectR[contador]=elementos[i].value;
										//alert(elementosSelectR[contador]);
										contador++;
					         }
					     }
					     if(contador > 0){
							setInterval(function(){
								count--;
								if (count == 0) {
									alert("Información actualizada");
									window.location.href = './gEstructuraNomEv.php?usuario_rol='+userRol;
								}
							},1000);
							window.location.href = './Controller/generaReporteNomina.php?idMov='+elementosSelectR+'&usuario_rol='+userRol;
						}
					     //return false;
					} 

				</script>
			<br>
			
			<form action="" method="POST"> 
				<div class="plantilla-inputv text-center">
					<div class="form-row">
						<div class="col">
						<div class="form-row">
							<div class="form-group col-md-12" >
								<label class="plantilla-label estilo-colorg" for="unexp_3">Unidad:</label>
								<input onkeypress="return pulsar(event)" type="text" class="form-control unexp border border-dark" id="unexp_3" name="unexp_3" placeholder="Ej. 513" value="<?php if(isset($_POST["unexp_3"])){ echo $_POST["unexp_3"];} ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" >
							</div>
						</div>


						</div>

						<div class="col">

							<div class="form-group col-md-12">
								<label  class="plantilla-label" for="laQna">*QNA: </label>
									 
									<select class="form-control custom-select border-dark" name="qnaOption">
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
								<label  class="plantilla-label" for="elAnio">AÑO: </label>
									 
									<select class="form-control custom-select border-dark" name="anio">
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
							<input type="submit" id = "b_greporte" name="buscar" onclick="'<?php $_GET['usuario_rol']; ?>'" class="btn btn btn-danger tamanio-button plantilla-input text-white bord" value="Buscar"><br>

							<!-- <button type="submit" name="buscar" class="btn btn-outline-info tamanio-button">Buscar</button> -->
						</div>
					</div>

					</div>
				</div>
				
			</form>

		</div>
	
	</div>
	<form name="radioALL" id="radioALL" action="" method="POST"> 

		<br>
		<br>
		<table class="table table-hover table-white">
						<thead>
						    <tr>
							<!-- <td>Observacion</td>
							<td>ID Fomope</td> -->
							<th scope="titulo">Autorizar</th>
						    <th scope="titulo">Estado Fomope</th>
							<th scope="titulo">Unidad</th>
							<th scope="titulo">RFC</th>
							<th scope="titulo">QNA</th>
							<th scope="titulo">Fecha de Ingreso</th>
							<th scope="titulo">Codigo Mov.</th>
						      
						   </tr>
					 	 </thead>

					<?php 
						include "configuracion.php";

						if(isset($_POST['buscar'])){
							$qnaBuscar = $_POST['qnaOption'];
							$rfcBuscar = $_POST['unexp_3'];
							$anioBuscar = $_POST['anio'];


							//echo "User Has submitted the form and entered this name : <b> $qnaBuscar </b>";
							if($rfcBuscar != "" && $qnaBuscar != "" && $anioBuscar != ""){
		
								$sql="SELECT id_movimiento_qr,color_estado,unidad,rfc,qna,fini,codigo_puesto, tex_con FROM fomope_qr WHERE (unidad='$rfcBuscar' AND qna='$qnaBuscar' AND anio='$anioBuscar' AND color_estado ='azul' AND enNomina = 0 ) ORDER BY id_movimiento_qr DESC";
		
							}elseif ($rfcBuscar != "" && $qnaBuscar == "" && $anioBuscar == "") {
								
								$sql="SELECT id_movimiento_qr,color_estado,unidad,rfc,qna,fini,codigo_puesto, tex_con FROM fomope_qr WHERE (unidad='$rfcBuscar' AND color_estado ='azul' AND enNomina = 0 ) ORDER BY id_movimiento_qr DESC";
								
							}elseif ($rfcBuscar == "" && $qnaBuscar != "" && $anioBuscar != "") {
								
								$sql="SELECT id_movimiento_qr,color_estado,unidad,rfc,qna,fini,codigo_puesto, tex_con FROM fomope_qr WHERE ( qna='$qnaBuscar' AND anio='$anioBuscar' AND color_estado ='azul' AND enNomina = 0 ) ORDER BY id_movimiento_qr DESC";
								
							}elseif ($rfcBuscar == "" && $qnaBuscar == "" && $anioBuscar == "") {
								
								$sql="SELECT id_movimiento_qr,color_estado,unidad,rfc,qna,fini,codigo_puesto, tex_con FROM fomope_qr WHERE (unidad='$rfcBuscar' AND qna='$qnaBuscar' AND anio='$anioBuscar' AND color_estado ='azul' AND enNomina = 0 ) ORDER BY id_movimiento_qr DESC";
								
							}elseif ($rfcBuscar != "" && $qnaBuscar != "" && $anioBuscar == "") {
								
								$sql="SELECT id_movimiento_qr,color_estado,unidad,rfc,qna,fini,codigo_puesto, tex_con FROM fomope_qr WHERE (unidad='$rfcBuscar' AND qna='$qnaBuscar' AND color_estado ='azul' AND enNomina = 0 ) ORDER BY id_movimiento_qr DESC";
								
							}elseif ($rfcBuscar != "" && $qnaBuscar == "" && $anioBuscar != "") {
								
								$sql="SELECT id_movimiento_qr,color_estado,unidad,rfc,qna,fini,codigo_puesto, tex_con FROM fomope_qr WHERE (unidad='$rfcBuscar' AND anio='$anioBuscar' AND color_estado ='azul' AND enNomina = 0 ) ORDER BY id_movimiento_qr DESC";
								
							}elseif ($rfcBuscar == "" && $qnaBuscar != "" && $anioBuscar == "") {
								
								$sql="SELECT id_movimiento_qr,color_estado,unidad,rfc,qna,fini,codigo_puesto, tex_con FROM fomope_qr WHERE (  qna='$qnaBuscar' AND color_estado ='azul' AND enNomina = 0 ) ORDER BY id_movimiento_qr DESC";
								
							}elseif ($rfcBuscar == "" && $qnaBuscar == "" && $anioBuscar != "") {
								
								$sql="SELECT id_movimiento_qr,color_estado,unidad,rfc,qna,fini,codigo_puesto, tex_con FROM fomope_qr WHERE (anio='$anioBuscar' AND color_estado ='azul' AND enNomina = 0 ) ORDER BY id_movimiento_qr DESC";
								
							}


			if ($result = mysqli_query($conexion,$sql)) {

				$totalFilas    =    mysqli_num_rows($result);  
				if($totalFilas == 0){
						
						echo('
							<br>
							<br>
							<div class="col-sm-12 ">
							<div class="plantilla-inputv text-dark ">
								<div class="card-body"><h2 align="center">No existe resultados de la busqueda, vuelve intentar.</h2></div>
						</div>
						</div>');
				}else{
					while($ver=mysqli_fetch_row($result)){ 
						switch ($ver[1]) {
											case 'negro1':
												$estadoF = 'DDSCH Rechazo';
												break;
											case 'negro':
												$estadoF = 'Unidad Edición';
												break;
											case 'amarillo':
												$estadoF = 'DSPO captura';
												break;		
											case 'amarillo0':
												$estadoF = 'DDSCH Autorización';
												break;
											case 'cafe':
												$estadoF = 'DSPO Autorización';
												break;	
											case 'naranja':
												$estadoF = 'DIPSP Autorización';
												break;
											case 'azul':
												$estadoF= 'DGRHO Autorización';
												break;
											case 'rosa':
												$estadoF = 'DSPO nomina';
												break;		
											case 'verde':
												$estadoF = 'DDSCH loteo';
												break;
											case 'verde2':
												$estadoF = 'DDSCH Autorización Loteo';
												break;	
											case 'gris':
												$estadoF = 'DDSCH Edición';
												break;
											case 'guinda':
												$estadoF = 'Finalizado';
												break;		
											default:
												
												break;
										}

						 ?>
						<tr>
							<td>
								<div class="custom-control custom-radio">
								  <label><input type="checkbox" value="<?php echo $ver[0] ?>" name="radios"></label>
								</div>
							</td>
							<td><?php echo $estadoF ?></td>
							<td><?php echo $ver[2] ?></td>
							<td><?php echo $ver[3] ?></td>
							<td><?php echo $ver[4] ?></td>
							<td><?php echo $ver[5] ?></td>
							<td><?php echo $ver[6] ?></td>

							<td>
								<button type="button" class="btn btn-outline-secondary" onclick="verDatosQr('<?php echo $ver[0] ?>' , '<?php echo $usuarioSeguir ?>' )" id="ver">Ver</button>
							</td>
						</tr>
						<?php 
						}
					}
							}else{
								echo '<script type="text/javascript">alert("Error en la conexion");</script>';
								echo '<script type="text/javascript">alert("error '. mysqli_error($conexion).'");</script>';
							}
						}
						 ?>
		</table>
		</form>
				<button type="submit"  class="derecha btn btn-outline-success" name="gReport" onclick="obtenerRadioSeleccionado('radioALL','radios',  '<?php echo $usuarioSeguir ?>' )" >Generar Reporte</button>	
		
	</center>
	</body>

</html>

