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
					$noFomope =  $_GET['idMov'];
					$usuarioSeguir =  $_GET['usuario_rol'];
					
				/*if(isset($_GET["idMov"])){
					$noFomope =  $_GET['idMov'];
				}else{
					$noFomope =  $_POST['idMov'];

				}
				if(isset($_GET["usuario_rol"])){ 
					$usuarioSeguir =  $_GET['usuario_rol'];
				}else{
					$usuarioSeguir =  $_POST['usuario_rol'];

				}*/
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
				
					<table class="table table-striped table-bordered">

						<?php 
							include "configuracion.php";
							$existenD =0;
							$sql="SELECT * from fomope_qr WHERE id_movimiento_qr = '$noFomope' ";
							$documentosPC="";
							
							// echo $noFomope;
							$result=mysqli_query($conexion,$sql);
							$ver = mysqli_fetch_row($result);

							$queyRols = "SELECT * from usuarios WHERE usuario = '$usuarioSeguir'";
							$resultRols = mysqli_query($conexion, $queyRols);
							$columnasUsuario = mysqli_fetch_assoc($resultRols);

							// 	for($i=47; $i<=117; $i++){
							// 		if($ver[$i] == ""){
										
							// 		}else{
							// 			$existenD ++;
							// 			$sqlNombreDoc = "SELECT nombre_documento FROM ct_documentos_qr WHERE documentos = '$ver[$i]'";
							// 			$resNombreDoc = mysqli_query($conexion,$sqlNombreDoc);
							// 			$rowNombreDoc = mysqli_fetch_row($resNombreDoc);
							// 			$nombreAdescargar = $ver[5]."_".$ver[$i]."_".$ver[6]."_".$ver[7]."_".$ver[8]."_.PDF";

////////////// inicia la busqueda del archivo en carpeta 
					$dir_subidaMov = './Controller/DOCUMENTOS_RES/';

					// Arreglo con todos los nombres de los archivos
					$files2 = array_diff(scandir($dir_subidaMov), array('.', '..')); 

					$contDoc=0;


					// Arreglo con todos los nombres de los archivos
					
					$sqlReg =  "SELECT COUNT(*) id_docqr FROM ct_documentos_qr";
										$resTotalReg = mysqli_query($conexion,$sqlReg);
										$rowTotal = mysqli_fetch_row($resTotalReg);
// ----- promer ciclo en la carpeta documentos_res
					for ($i = 1; $i <= $rowTotal[0] ; $i++){
						$banderaMov = 0;  // si entramos y encontramos doc en la carpeta documentosMov
						$banderaSI = 0;
						$duplicado = 0;
						$sqlNombreDoc2 = "SELECT * FROM ct_documentos_qr WHERE id_docqr = '$i'";
										$resNombreDoc2 = mysqli_query($conexion,$sqlNombreDoc2);
										$rowNombreDoc2 = mysqli_fetch_row($resNombreDoc2);
							$imprime = 0;
						
						if($imprime == 0){
								echo "
												<tr>
												<td>$rowNombreDoc2[1]</td>
												";
					    		//$contDoc++;

						?>

						<?php	
							
										foreach($files2 as $file){	
											$data = explode("_",$file);
											$conId = count($data);
										    $data2 = explode(".",$file);
											$indice = count($data2);										
											$extencion = $data2[$indice-1];


                                            if($conId==2){
                                            	$extractCurp = $data[0];
                                            	$extractDocExt = explode(".", $data[1]);
                                            	$extractDoc = $extractDocExt[0];

                                            }else if($conId==3){
                                            	$extractCurp = $data[0];
                                            	$extractDocExt = explode(".", $data[1]."_".$data[2]);
                                            	$extractDoc = $extractDocExt[0];

                                            }else if($conId==4){
                                            	$extractCurp = $data[0];
                                            	$extractDoc = $data[1];
                                            	$extractQna = $data[2];
                                            	$QuitarExtencion = explode(".", $data[3]);
                                            	$extractDate = $QuitarExtencion[0];
                                              
                                            }else if($conId==5){
                                            	$extractCurp = $data[0];
                                            	$extractDoc = $data[1]."_".$data[2];
                                            	$extractQna = $data[3];
                                            	$QuitarExtencion = explode(".", $data[4]);
                                            	$extractDate = $QuitarExtencion[0];
                                              
                                            }

									 		if($ver[13] == $extractCurp && $rowNombreDoc2[2] == $extractDoc){
									 			$banderaMov = 1;
									 			$duplicado++;
									 			if($duplicado > 1){
						
										 					echo "
													<tr>
													<td>$rowNombreDoc2[1]</td>
													";
									 			}
									 			if($conId==2 || $conId==3){
									 			$nombreAdescargar = $extractCurp."_".$extractDoc."."."$extencion";
									 		    }else if ($conId==4 || $conId==5){
									 		    $nombreAdescargar = $extractCurp."_".$extractDoc."_".$extractQna."_".$extractDate."."."$extencion";
									 		    }


											$banderaSI = 1;

						?>	
												<td>
												<button onclick="verDoc('<?php echo $nombreAdescargar ?>','<?php echo $extencion ?>')" type="button" class="btn btn-outline-secondary" > Ver</button>
												</td>
													
												<?php
											
												if($columnasUsuario['id_rol'] == 1 OR $columnasUsuario['id_rol'] == 2){
													$laRuta = "DOCUMENTOS_RES";
												
												}
												}



										  }//cierra foreach
										   if($banderaSI == 0){
										   	?>
														<td>
														<button class="btn btn-danger" > X </button>
														</td>
								<?php
													}

								}
							}
								?>
						
								
						
</table>
	</body>

</html>