
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
			<style type="text/css">
			
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
				$queryUser = "SELECT * FROM usuarios WHERE usuario = '$usuarioSeguir'";

				if($resutUser = mysqli_query($conexion, $queryUser)){
					$rowUser = mysqli_fetch_assoc($resutUser);
					if($rowUser['id_rol'] == 2 || $rowUser['id_rol'] == 3 || $rowUser['id_rol'] == 7){
						$colorSee = "amarillo";
					}else{
						$colorSee = "amarillo0";

					}
					$colorRechazo = "negro_".strval($rowUser['id_rol']);
				}
			?>

		<nav class="navbar fixed-top navbar-expand-lg navbar-dark plantilla-input fixed-top">
		    <div class="container">
		      <div class="collapse navbar-collapse" id="navbarResponsive">
		        <ul class="navbar-nav ml-auto">   
		        <?php
		        if($rowUser['id_rol'] == 0 ){
		        ?>
		        	<li class="nav-item">
		            	<a class="nav-link" href='./luluConsulta.php?usuario_rol=<?php echo $usuarioSeguir ?>'>Bandeja</a>
		          	</li>         
		         	<li class="nav-item dropdown">
		            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		              Acciones
		            </a>
		            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
		              <a class="dropdown-item" href="./FiltroDescargar.php?usuario_rol=<?php echo $usuarioSeguir ?>">Descarga de documentos</a>
		              <a class="dropdown-item" href="./generarReporte.php?usuario_rol=<?php echo $usuarioSeguir ?>">Generar reportes</a>
		            </div>
		          </li>
		        <?php
		        }
		        ?> 
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
							window.location.href = './Controller/autorizarTodoQr.php?id_fomope='+elementosSelectR+'&idSeguir='+userRol;

					     }
					     //return false;
					} 

				</script>
		
			<br>

			<form method="post" action=""> 
				<div class="plantilla-inputv text-center">
					<div class="form-row">
						<div class="col">
							<div class="form-group col-md-12">
								<label class="plantilla-label" for="elRfc">*RFC:</label>
								<input type="text" class="form-control border-dark" id="rfc" name="rfc" placeholder="Ingresa rfc" maxlength="13"  >
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
										if (!$conexion->set_charset("utf8")) {//asignamos la codificación comprobando que no falle
										       die("Error cargando el conjunto de caracteres utf8");
										}

										$consulta = "SELECT * FROM ct_anios";
										$resultado = mysqli_query($conexion , $consulta);
										$contador=0;

										while($misdatos = mysqli_fetch_assoc($resultado)){ $contador++;?>
										<option  data-subtext="<?php echo $misdatos["id_anio"]; ?>"><?php echo $misdatos["num_anio"]; ?></option>
										<?php }?>       
									</select>
							</div>
						</div>		
					</div>
			
				<div class="col-sm-12">
					<div class="form-row">

					<div class="form-group col-md-12">
						<div class="col text-center">
							<input type="submit" name="buscar" onclick="'<?php $_GET['usuario_rol']; ?>'" class="btn btn btn-danger tamanio-button plantilla-input text-white bord" value="Buscar"><br>

							<!-- <button type="submit" name="buscar" class="btn btn-outline-info tamanio-button">Buscar</button> -->
						</div>
					</div>

					</div>
				</div>
			</form>

		</div>
	
	</div>

		<br>
		<br>

		<?php 
						include "configuracion.php";

						if(isset($_POST['buscar'])){
							$qnaBuscar = $_POST['qnaOption'];
							$rfcBuscar = $_POST['rfc'];
							$anioBuscar = $_POST['anio'];
		?>					

		<table class="table table-hover table-white">
			        <div class="card bg-secondary text-white">
					<div class="card-body plantilla-inputg"><h2>Caravanas</h2></div>
					</div>
						<thead>
						    <tr>
							<!-- <td>Observacion</td>
							<td>ID Fomope</td> -->
						      <th scope="titulo">Unidad</th>
						      <th scope="titulo">RFC</th>
						      <th scope="titulo">QNA</th>
						      <th scope="titulo">Fecha de Ingreso</th>
						      <th scope="titulo">Codigo Mov.</th>
						      <th scope="titulo">Tipo de ingreso</th>


						   </tr>
					 	 </thead>

					<?php 

							//echo "User Has submitted the form and entered this name : <b> $qnaBuscar </b>";
					if($rfcBuscar != "" && $qnaBuscar != "" && $anioBuscar != ""){

								$sql="SELECT id_movimiento_qr,estatus,unidad,rfc,qna,fini,tipo_movimiento, fechaAutorizacion, tipoRegistro FROM fomope_qr WHERE (rfc='$rfcBuscar' AND qna='$qnaBuscar' AND anio='$anioBuscar')";

							}elseif ($rfcBuscar != "" && $qnaBuscar == "" && $anioBuscar == "") {
								
								$sql="SELECT id_movimiento_qr,estatus,unidad,rfc,qna,fini,tipo_movimiento, fechaAutorizacion, tipoRegistro FROM fomope_qr WHERE (rfc='$rfcBuscar')";
								
							}elseif ($rfcBuscar == "" && $qnaBuscar != "" && $anioBuscar != "") {
								
								$sql="SELECT id_movimiento_qr,estatus,unidad,rfc,qna,fini,tipo_movimiento, fechaAutorizacion, tipoRegistro FROM fomope_qr WHERE ( qna='$qnaBuscar' AND anio='$anioBuscar')";
								
							}elseif ($rfcBuscar == "" && $qnaBuscar == "" && $anioBuscar == "") {
								
								$sql="SELECT id_movimiento_qr,estatus,unidad,rfc,qna,fini,tipo_movimiento, fechaAutorizacion, tipoRegistro FROM fomope_qr WHERE (rfc='$rfcBuscar' AND qna='$qnaBuscar' AND anio='$anioBuscar')";
								
							}elseif ($rfcBuscar != "" && $qnaBuscar != "" && $anioBuscar == "") {
								
								$sql="SELECT id_movimiento_qr,estatus,unidad,rfc,qna,fini,tipo_movimiento, fechaAutorizacion, tipoRegistro FROM fomope_qr WHERE (rfc='$rfcBuscar' AND qna='$qnaBuscar')";
								
							}elseif ($rfcBuscar != "" && $qnaBuscar == "" && $anioBuscar != "") {
								
								$sql="SELECT id_movimiento_qr,estatus,unidad,rfc,qna,fini,tipo_movimiento, fechaAutorizacion, tipoRegistro FROM fomope_qr WHERE (rfc='$rfcBuscar' AND anio='$anioBuscar')";
								
							}elseif ($rfcBuscar == "" && $qnaBuscar != "" && $anioBuscar == "") {
								
								$sql="SELECT id_movimiento_qr,estatus,unidad,rfc,qna,fini,tipo_movimiento, fechaAutorizacion, tipoRegistro FROM fomope_qr WHERE (  qna='$qnaBuscar')";
								
							}elseif ($rfcBuscar == "" && $qnaBuscar == "" && $anioBuscar != "") {
								
								$sql="SELECT id_movimiento_qr,estatus,unidad,rfc,qna,fini,tipo_movimiento, fechaAutorizacion, tipoRegistro FROM fomope_qr WHERE (anio='$anioBuscar')";
								
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
						       if($ver[8]=="CARAVANAS"){	
						 ?>

						<tr>
							
							<td><?php echo $ver[2] ?></td>
							<td><?php echo $ver[3] ?></td>
							<td><?php echo $ver[4] ?></td>
							<td><?php echo $ver[5] ?></td>
							<td><?php echo $ver[6] ?></td>
							<td><?php echo $ver[8] ?></td>
							<td>
								<button type="button" class="btn btn-outline-secondary" onclick="verDatosQr('<?php echo $ver[0] ?>' , '<?php echo $usuarioSeguir ?>' )" id="ver">Ver</button>
							</td>
						</tr>
						<?php 

						 }
										}                                 
						 										
									} // cierra if total filas == 0 
							}else{
								echo '<script type="text/javascript">alert("Error en la conexion");</script>';
								echo '<script type="text/javascript">alert("error '. mysqli_error($conexion).'");</script>';
							}		


							

												 ?>
		</table>

	
<?php 

           }

		?>
		

					<div class="col-sm-12">
				
					<div class="card bg-secondary text-white">
						    <div class="card-body plantilla-inputg"><h2>Autorizar Caravana</h2></div>
					</div>
			<form name="radioALL" id="radioALL" action="" method="POST"> 
					<table class="table table-hover table-white">
						<thead>
						    <tr>
						      <th scope="titulo">Unidad</th>
						      <th scope="titulo">RFC</th>
						      <th scope="titulo">QNA</th>
						      <th scope="titulo">Fecha Ingreso</th>
						      <th scope="titulo">Codigo Mov.</th>
						      <th scope="titulo">Tipo de ingreso</th>

						   </tr>
					 	 </thead>

						<?php 
							include "configuracion.php";
							$sql="SELECT id_movimiento_qr, unidad, rfc , curp , fini, tipo_movimiento FROM fomope_qr WHERE estatus = 'Revisión' AND color_estado = '$colorSee' AND personaAsignada = '$usuarioSeguir'";

							if($result=mysqli_query($conexion,$sql)){

							}else{
								echo "fallo";
							}

							while($ver=mysqli_fetch_row($result)){ 

							
								$consulta2 = " SELECT * FROM fomope_qr WHERE id_movimiento_qr = ".$ver[0];

						        if($resultado2 = mysqli_query($conexion,$consulta2)){
					        		$row = mysqli_fetch_assoc($resultado2);
					        		$id_mov = $row['id_movimiento_qr'];
					        	}
					     /*   	switch ($ver[1]) {
											
											case 'amarillo0':
												$estadoF = 'DDSCH Autorización';
												break;
											
											case 'verde2':
												$estadoF = 'DDSCH Autorización Loteo';
												break;	
												
											default:
												
												break;
										}*/

                           if($row['tipoRegistro']=="CARAVANAS"){
						 ?>

						<tr>
							<td><?php echo $row['unidad'] ?></td>
							<td><?php echo $row['rfc'] ?></td>
							<td><?php echo $row['qna'] ?></td>
							<td><?php echo $row['fini'] ?></td>
							<td><?php echo $row['tipo_movimiento'] ?></td>
							<td><?php echo $row['tipoRegistro'] ?></td>

							<td>
								<button type="button" class="btn btn-outline-secondary" onclick="verDatosQr('<?php echo $row['id_movimiento_qr'] ?>' , '<?php echo $usuarioSeguir ?>' )" id="ver">Ver</button>
							</td>
						</tr>
						<?php 
						
						 }
					}
						 ?>

					</table>
						
				</form>
		
							  			<br>
							  			<br>
							  			<br>

			</div>

				<div class="col-sm-12">
				
					<div class="card bg-secondary text-white">
						    <div class="card-body plantilla-inputg"><h2>Autorizar Eventuales</h2></div>
					</div>
			<form name="radioALL" id="radioALL" action="" method="POST"> 
					<table class="table table-hover table-white">
						<thead>
						    <tr>
						      <th scope="titulo">Unidad</th>
						      <th scope="titulo">RFC</th>
						      <th scope="titulo">QNA</th>
						      <th scope="titulo">Fecha Ingreso</th>
						      <th scope="titulo">Codigo Mov.</th>
						      <th scope="titulo">Tipo de ingreso</th>

						   </tr>
					 	 </thead>

						<?php 
							include "configuracion.php";
							$sql="SELECT id_movimiento_qr, unidad, rfc , curp , fini, tipo_movimiento FROM fomope_qr WHERE estatus = 'Revisión' AND color_estado = '$colorSee' AND personaAsignada = '$usuarioSeguir'";

							if($result=mysqli_query($conexion,$sql)){

							}else{
								echo "fallo";
							}

							while($ver=mysqli_fetch_row($result)){ 

							
								$consulta2 = " SELECT * FROM fomope_qr WHERE id_movimiento_qr = ".$ver[0];

						        if($resultado2 = mysqli_query($conexion,$consulta2)){
					        		$row = mysqli_fetch_assoc($resultado2);
					        		$id_mov = $row['id_movimiento_qr'];
					        	}
					     /*   	switch ($ver[1]) {
											
											case 'amarillo0':
												$estadoF = 'DDSCH Autorización';
												break;
											
											case 'verde2':
												$estadoF = 'DDSCH Autorización Loteo';
												break;	
												
											default:
												
												break;
										}*/

                           if($row['tipoRegistro']=="EVENTUALES"){
						 ?>

						<tr>
							<td><?php echo $row['unidad'] ?></td>
							<td><?php echo $row['rfc'] ?></td>
							<td><?php echo $row['qna'] ?></td>
							<td><?php echo $row['fini'] ?></td>
							<td><?php echo $row['tipo_movimiento'] ?></td>
							<td><?php echo $row['tipoRegistro'] ?></td>

							<td>
								<button type="button" class="btn btn-outline-secondary" onclick="verDatosQr('<?php echo $row['id_movimiento_qr'] ?>' , '<?php echo $usuarioSeguir ?>' )" id="ver">Ver</button>
							</td>
						</tr>
						<?php 
						
						 }
					}
						 ?>

					</table>
						
				</form>
		
							  			<br>
							  			<br>
							  			<br>

			</div>
			
					<div class="col-sm-12">
				
					<div class="card bg-secondary text-white">
						    <div class="card-body plantilla-inputg"><h2>Autorizar Personal de Confianza</h2></div>
					</div>
			<form name="radioALL" id="radioALL" action="" method="POST"> 
					<table class="table table-hover table-white">
						<thead>
						    <tr>
						      <th scope="titulo">Unidad</th>
						      <th scope="titulo">RFC</th>
						      <th scope="titulo">QNA</th>
						      <th scope="titulo">Fecha Ingreso</th>
						      <th scope="titulo">Codigo Mov.</th>
						      <th scope="titulo">Tipo de ingreso</th>

						   </tr>
					 	 </thead>

						<?php 
							include "configuracion.php";
							$sql="SELECT id_movimiento_qr, unidad, rfc , curp , fini, tipo_movimiento FROM fomope_qr WHERE estatus = 'Revisión' AND color_estado = '$colorSee' AND personaAsignada = '$usuarioSeguir'";
							$result=mysqli_query($conexion,$sql);

							while($ver=mysqli_fetch_row($result)){ 

							
								$consulta2 = " SELECT * FROM fomope_qr WHERE id_movimiento_qr = ".$ver[0];

						        if($resultado2 = mysqli_query($conexion,$consulta2)){
					        		$row = mysqli_fetch_assoc($resultado2);
					        		$id_mov = $row['id_movimiento_qr'];
					        	}
					     /*   	switch ($ver[1]) {
											
											case 'amarillo0':
												$estadoF = 'DDSCH Autorización';
												break;
											
											case 'verde2':
												$estadoF = 'DDSCH Autorización Loteo';
												break;	
												
											default:
												
												break;
										}*/
                       		if($row['tipoRegistro']=="PERSONAL DE CONFIANZA (ALTA)" || $row['tipoRegistro']=="PERSONAL DE CONFIANZA (REINGRESO)"){
						 ?>

						<tr>
							<td><?php echo $row['unidad'] ?></td>
							<td><?php echo $row['rfc'] ?></td>
							<td><?php echo $row['qna'] ?></td>
							<td><?php echo $row['fini'] ?></td>
							<td><?php echo $row['tipo_movimiento'] ?></td>
							<td><?php echo $row['tipoRegistro'] ?></td>

							<td>
								<button type="button" class="btn btn-outline-secondary" onclick="verDatosQr('<?php echo $row['id_movimiento_qr'] ?>' , '<?php echo $usuarioSeguir ?>' )" id="ver">Ver</button>
							</td>
						</tr>
						<?php 
						
						 }
					}
						 ?>

					</table>
						
				</form>
		
							  			<br>
							  			<br>
							  			<br>

			</div>
			<div class="col-sm-12">
				
					<div class="card bg-secondary text-white">
						    <div class="card-body plantilla-inputg"><h2>Rechazados</h2></div>
					</div>
					<table class="table table-hover table-white">
						<thead>
						    <tr>
							<!-- <td>Observacion</td>
							<td>ID Fomope</td> -->
						      <th scope="titulo">Unidad</th>
						      <th scope="titulo">RFC</th>
						      <th scope="titulo">QNA</th>
						      <th scope="titulo">Fecha Ingreso</th>
						      <th scope="titulo">Codigo Mov.</th>
						      <th scope="titulo">Tipo de ingreso</th>

						   </tr>
					 	 </thead>

						<?php 
							include "configuracion.php";

							$sql="SELECT id_movimiento_qr, unidad, rfc , curp , fini, tipo_movimiento
									from fomope_qr WHERE estatus = 'Rechazado duplicado' AND personaAsignada = '$usuarioSeguir' OR color_estado= '$colorRechazo'" ;
							$result=mysqli_query($conexion,$sql);

							while($ver=mysqli_fetch_row($result)){ 

							
								$consulta2 = " SELECT * FROM fomope_qr WHERE id_movimiento_qr = ".$ver[0];

						        if($resultado2 = mysqli_query($conexion,$consulta2)){
					        		$row = mysqli_fetch_assoc($resultado2);
					        		$id_mov = $row['id_movimiento_qr'];
					        	}
								$estadoF = 'DDSCH Autorización';
					     /*   	switch ($ver[1]) {
											
											case 'amarillo0':
												$estadoF = 'DDSCH Autorización';
												break;
											
											case 'verde2':
												$estadoF = 'DDSCH Autorización Loteo';
												break;	
												
											default:
												
												break;
										}*/

                     
						 ?>

						<tr>
							<td><?php echo $row['unidad'] ?></td>
							<td><?php echo $row['rfc'] ?></td>
							<td><?php echo $row['qna'] ?></td>
							<td><?php echo $row['fini'] ?></td>
							<td><?php echo $row['tipo_movimiento'] ?></td>
							<td><?php echo $row['tipoRegistro'] ?></td>

							<td>
								<button type="button" class="btn btn-outline-secondary" onclick="verDatosQr('<?php echo $row['id_movimiento_qr'] ?>' , '<?php echo $usuarioSeguir ?>' )" id="ver">Ver</button>
							</td>
						</tr>
						<?php 
					
						 
					}
						 ?>

					</table>
			</div>
	</center>
	</body>

</html>

