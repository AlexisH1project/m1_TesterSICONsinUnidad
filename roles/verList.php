
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

			function verDoc(nombre,laExtencion){
				window.location.href = 'Controller/controllerDescarga.php?nombreDecarga='+nombre+'&extencion='+laExtencion;

			}



		</script>



	</head>
	<body>
		<?php
				include "configuracion.php";
				$usuarioSeguir =  $_POST['usuario_rol'];
				$noFomope =  $_POST['idMov'];

				

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
				
					<table class="table table-hover table-white">
						<?php 
							include "configuracion.php";
							$existenD =0;
							$sql="SELECT * from fomope WHERE id_movimiento = '$noFomope' ";
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
					
					$sql2="SELECT * from fomope WHERE id_movimiento = '$noFomope' ";
							$result2=mysqli_query($conexion,$sql2);
							$ver2 = mysqli_fetch_row($result2);
							$contdocs = 1;
							$docnum = "";
					for ($i = 47; $i < 118; ++$i){
						if($ver2[$i] == NULL){
							$docnum = "doc".$contdocs;
							// echo $docnum;
							echo $ver2[$i];
							$sqlNombreDoc2 = "SELECT nombre_documento FROM m1ct_documentos WHERE documentos = '$docnum'";
										$resNombreDoc2 = mysqli_query($conexion,$sqlNombreDoc2);
										$rowNombreDoc2 = mysqli_fetch_row($resNombreDoc2);
										echo "
												<tr>
												<td>$rowNombreDoc2[0]</td>
												<td>";
					    		//$contDoc++;
						?>
							<button class="btn btn-danger" > X </button>
							<?php	echo "

												</td>
										";
						}
						$contdocs++;
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
			
	
	</body>

</html>

