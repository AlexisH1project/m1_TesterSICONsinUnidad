

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

			.sticky{
				position: sticky;
				top: 0;


			}
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
}

		th, td{
			min-width: 150px;
			max-width: 151px;
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
				include "./librerias/configuracion.php";
				$usuarioSeguir =  $_GET['usuario_rol'];
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
		  <a  href= <?php echo ("'../../roles/menuPrincipal.php?usuario_rol=$usuarioSeguir'");?>><img class="img-responsive" src="../vista/img/ss1.png" height="90" width="280"/></a>
		
		
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
							window.location.href = './Controller/autorizarTodoLulu.php?id_fomope='+elementosSelectR+'&idSeguir='+userRol;

					     }
					     //return false;
					} 



					function ocultar() {
                    document.getElementById('tabla1').style.display="none";
}

				</script>
			
		<div class="row">
				<div class="col text-center">
				</div>
			</div>
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
							<input type="submit" name="buscar" onclick="'<?php $_GET['usuario_rol'] ; ?>'" class="btn btn btn-danger tamanio-button plantilla-input text-white bord" value="Buscar"><br>

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






						<div class="table-responsive" id="tabla1">
		<table id="tabla1" class="table table-striped table-bordered" style="margin-bottom: 0;  font-size:70%;" >
						<thead>
						    <tr>
							<!-- <td>Observacion</td>
							<td>ID Fomope</td> -->
						      <th scope="titulo" class="sticky">Ramo</th>
						      <th scope="titulo" class="sticky">Unidad</th>
						      <th scope="titulo" class="sticky">RFC</th>
						      <th scope="titulo" class="sticky">QNA</th>
						      <th scope="titulo" class="sticky">Fecha de Inicio</th>
						      <th scope="titulo" class="sticky">Codigo Puesto</th>
						      <th scope="titulo" class="sticky">Codigo Federal</th>
						      <th scope="titulo" class="sticky">Fecha de Captura</th>

						   </tr>
					 	 </thead>

					 	 <tbody>
				
                <?php
              

                $sqlReg="SELECT id_plaza,ramo,unidadResponsable,rfc,quincenaAplicada,fechaInicioVigencia,codigoPuesto, codigoFederalPuestos, fechaCaptura FROM plazas_ctrlp_m2 ORDER BY id_plaza DESC LIMIT 0, 50";
                if ($result2 = mysqli_query($conexion,$sqlReg)){ 
                	while($ver2=mysqli_fetch_row($result2)){ 
?>
                		<tr>
							
							<td><?php echo $ver2[1] ?></td>
							<td><?php echo $ver2[2] ?></td>
							<td><?php echo $ver2[3] ?></td>
							<td><?php echo $ver2[4] ?></td>
							<td><?php echo $ver2[5] ?></td>
							<td><?php echo $ver2[6] ?></td>
							<td><?php echo $ver2[7] ?></td>
							<td><?php echo $ver2[8] ?></td>

							<td>
								<button type="button" class="btn btn-outline-secondary" onclick="verDatosQr('<?php echo $ver2[0] ?>' , '<?php echo $usuarioSeguir ?>' )" id="ver">Ver</button>
							</td>
						</tr>

                  

<?php
                             }

                 
                  	}
                 
                 



                ?>
               		</tbody>
		</table>
	</div>

                 

					<?php 
						include "./librerias/configuracion.php";

						if(isset($_POST['buscar'])){
							$qnaBuscar = $_POST['qnaOption'];
							$rfcBuscar = $_POST['rfc'];
							$anioBuscar = $_POST['anio'];



						?>
                         
					     <script language="javascript">
                        ocultar();
                        </script>
		                <table id="<?php if($rowUser['id_rol'] == 1){echo "data_table";} ?>" class="table table-striped table-bordered" style="margin-bottom: 0;  font-size:70%;" >
						<thead>
						    <tr>
							<!-- <td>Observacion</td>
							<td>ID Fomope</td> -->
						      <th scope="titulo" class="sticky">Ramo</th>
						      <th scope="titulo" class="sticky">Unidad</th>
						      <th scope="titulo" class="sticky">RFC</th>
						      <th scope="titulo" class="sticky">QNA</th>
						      <th scope="titulo" class="sticky">Fecha de Inicio</th>
						      <th scope="titulo" class="sticky">Codigo Puesto</th>
						      <th scope="titulo" class="sticky">Codigo Federal</th>
						      <th scope="titulo" class="sticky">Fecha de Captura</th>

						   </tr>
					 	 </thead>

					 	 <tbody>







						<?php

						



							//echo "User Has submitted the form and entered this name : <b> $qnaBuscar </b>";
					if($rfcBuscar != "" && $qnaBuscar != "" && $anioBuscar != ""){

								$sql="SELECT id_plaza,ramo,unidadResponsable,rfc,quincenaAplicada,fechaInicioVigencia,codigoPuesto, codigoFederalPuestos, fechaCaptura FROM plazas_ctrlp_m2 WHERE (rfc='$rfcBuscar' AND quincenaAplicada='$qnaBuscar' AND anio='$anioBuscar')";

							}elseif ($rfcBuscar != "" && $qnaBuscar == "" && $anioBuscar == "") {
								
								$sql="SELECT id_plaza,ramo,unidadResponsable,rfc,quincenaAplicada,fechaInicioVigencia,codigoPuesto, codigoFederalPuestos, fechaCaptura FROM plazas_ctrlp_m2 WHERE (rfc='$rfcBuscar')";
								
							}elseif ($rfcBuscar == "" && $qnaBuscar != "" && $anioBuscar != "") {
								
								$sql="SELECT id_plaza,ramo,unidadResponsable,rfc,quincenaAplicada,fechaInicioVigencia,codigoPuesto, codigoFederalPuestos, fechaCaptura FROM plazas_ctrlp_m2 WHERE ( quincenaAplicada='$qnaBuscar' AND anio='$anioBuscar')";
								
							}elseif ($rfcBuscar == "" && $qnaBuscar == "" && $anioBuscar == "") {
								
								$sql="SELECT id_plaza,ramo,unidadResponsable,rfc,quincenaAplicada,fechaInicioVigencia,codigoPuesto, codigoFederalPuestos, fechaCaptura FROM plazas_ctrlp_m2 WHERE (rfc='$rfcBuscar' AND quincenaAplicada='$qnaBuscar' AND anio='$anioBuscar')";
								
							}elseif ($rfcBuscar != "" && $qnaBuscar != "" && $anioBuscar == "") {
								
								$sql="SELECT id_plaza,ramo,unidadResponsable,rfc,quincenaAplicada,fechaInicioVigencia,codigoPuesto, codigoFederalPuestos, fechaCaptura FROM plazas_ctrlp_m2 WHERE (rfc='$rfcBuscar' AND quincenaAplicada='$qnaBuscar')";
								
							}elseif ($rfcBuscar != "" && $qnaBuscar == "" && $anioBuscar != "") {
								
								$sql="SELECT id_plaza,ramo,unidadResponsable,rfc,quincenaAplicada,fechaInicioVigencia,codigoPuesto, codigoFederalPuestos, fechaCaptura FROM plazas_ctrlp_m2 WHERE (rfc='$rfcBuscar' AND anio='$anioBuscar')";
								
							}elseif ($rfcBuscar == "" && $qnaBuscar != "" && $anioBuscar == "") {
								
								$sql="SELECT id_plaza,ramo,unidadResponsable,rfc,quincenaAplicada,fechaInicioVigencia,codigoPuesto, codigoFederalPuestos, fechaCaptura FROM plazas_ctrlp_m2 WHERE (  quincenaAplicada='$qnaBuscar')";
								
							}elseif ($rfcBuscar == "" && $qnaBuscar == "" && $anioBuscar != "") {
								
								$sql="SELECT id_plaza,ramo,unidadResponsable,rfc,quincenaAplicada,fechaInicioVigencia,codigoPuesto, codigoFederalPuestos, fechaCaptura FROM plazas_ctrlp_m2 WHERE (anio='$anioBuscar')";
								
							}


							$sqlColor="SELECT colorAsignado FROM usuarios WHERE usuario='$usuarioSeguir'";


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
						
						 ?>
						<tr>
							
							<td><?php echo $ver[1] ?></td>
							<td><?php echo $ver[2] ?></td>
							<td><?php echo $ver[3] ?></td>
							<td><?php echo $ver[4] ?></td>
							<td><?php echo $ver[5] ?></td>
							<td><?php echo $ver[6] ?></td>
							<td><?php echo $ver[7] ?></td>
							<td><?php echo $ver[8] ?></td>

							<td>
								<button type="button" class="btn btn-outline-secondary" onclick="verDatosQr('<?php echo $ver[0] ?>' , '<?php echo $usuarioSeguir ?>' )" id="ver">Ver</button>
							</td>
						</tr>
						<?php 
                               $segIngreso="x";
										}
									}
							}else{
								echo '<script type="text/javascript">alert("Error en la conexion");</script>';
								echo '<script type="text/javascript">alert("error '. mysqli_error($conexion).'");</script>';
							}
					?>
                        <div class="form-row">
							<input type="text" class="form-control" id="segIngreso" name="segIngreso" value="<?php echo $segIngreso ?>" style="display:none">
						</div>


					<?php
						}
						 ?>
		</tbody>
		</table>
                        



	</div>
		

			  
	</center>
	</body>

</html>

