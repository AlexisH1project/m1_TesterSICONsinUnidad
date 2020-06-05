
<?php
  $mysqli = new mysqli('localhost', 'root', '', 'p_fomopes');
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>SS-FOMOPE</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/estilo_form.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

		<link href='jquery/jquery-ui.min.css' type='text/css' rel='stylesheet'>
		<link href='jquery/jquery-ui.css' type='text/css' rel='stylesheet'>

		<script src="js/funciones.js"></script>
		<script src="jquery/jquery-3.4.1.min.js" type="text/javascript"></script>
		<script src="jquery/jquery-ui.min.js" type="text/javascript"></script>
		<script src="jquery/jquery-ui.js" type="text/javascript"></script>
		<script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js" ></script>	
		<script src="./js/qr.js"></script>

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

		<script type="text/javascript">

			$(document).ready(function(){
				$(document).on('keydown', '.codpos', function(){
					var id = this.id;
					var splitid = id.split('_');
					var indice = splitid[1];
					$('#'+id).autocomplete({
						source: function(request, response){
							$.ajax({
								url: "resultados_cp.php",
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
								url: 'resultados_cp.php',
								type: 'post',
								data: {
									buscarid:buscarid,request:2
								},
								dataType: 'json',
								success:function(response){
									var len = response.length;
									if(len > 0){
										var idx = response[0]['idx'];
										var codpos = response[0]['codpos'];
										var colon = response[0]['colon'];
										var am = response[0]['am'];
										var est = response[0]['est'];
										document.getElementById('codpos_'+indice).value = codpos;
										document.getElementById('colon_'+indice).value = colon;
										document.getElementById('am_'+indice).value = am;
										document.getElementById('est_'+indice).value = est;
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
			
			.formulario_fomope{
				padding-left: 10%;
				padding-right: 10%;
			}
			
			input{
				text-transform: uppercase;
			}

			.estilo-color{
				color: red;
				font-weight: bold;
			}

			.plantilla-titulos{
				background-color: #A9D0F5;
				font-family: Verdana, Geneva, sans-serif;
				font-size: 22px;
				font-weight: bold;
				padding: 12px 12px 0px 12px;
			}

			.plantilla-subtitulos{
				font-family: Verdana, Geneva, sans-serif;
				font-size: 18px;
				font-weight: bold;
			}

			.plantilla-input{
				background-color: #CEE3F6;
				font-family: Verdana, Geneva, sans-serif;
				padding: 12px;
			}

			.plantilla-label{
				font-weight: bold;
			}

			.plantilla-lugnac{
				background-color: #A9D0F5;
				font-family: Verdana, Geneva, sans-serif;
				font-size: 21px;
				font-weight: bold;
				padding: 12px 12px 2px 12px;
			}

			.plantilla-depend{
				background-color: #A9D0F5;
				font-family: Verdana, Geneva, sans-serif;
				font-size: 22px;
				font-weight: bold;
				padding: 12px 12px 8px 12px;
			}

			.plantilla-inputdepend{
				background-color: #CEE3F6;
				font-family: Verdana, Geneva, sans-serif;
				padding: 36px 12px 36px 12px;
			}

			.tamanio-button{
				font-weight: bold;
				font-size: 25px;
			}

		</style>

	</head>
	<body>
		<?php 

			include "configuracion.php";


			if (isset($_POST['ap'])) {
			   	$ap = $_POST['ap'];
				$unidad = $_POST['unidad'];
				$partida = $_POST['partida'];
				$codigo = $_POST['codigo'];
				$pg = $_POST['pg'];
				$ai = $_POST['ai'];
				$gf = $_POST['gf'];
				$f = $_POST['f'];
				$sf = $_POST['sf'];
				$puesto =$_POST['puesto'];

				$partida2 = "15901";

				$consulta2 = " SELECT * FROM ct_tabulador WHERE codigo = '".$codigo."'";

		        if($resultado2 = mysqli_query($conexion,$consulta2)){
	        		$row = mysqli_fetch_assoc($resultado2);
	        		$sueldobase = $row['sueldobase'];
	        		$sueldo2 = $row['sueldo2'];
	        		$sueldo3= $row['sueldo3'];
	        		$descripcionPuesto = $row['nombre'];

	        	}
			}else{
				echo $_POST['noFomope'];
				$ap = "";
				$unidad =  "";
				$partida =  "";
				$codigo =  "";
				$pg =  "";
				$ai =  "";
				$gf =  "";
				$f =  "";
				$sf =  "";
				$puesto = "";

				$partida2 = "";


	        	$sueldobase = "";
	        	$sueldo2 = "";
	        	$sueldo3= "";
	        	$descripcionPuesto = "";

			}

			
				

	        	
			
			


		 ?>
		<center>
			<br>
				<img class="img-responsive" src="img/icon-ss.png" height="100" width="380">
			<br><br>
				<h3>Sistema de Control de Registro de Formato de Movimiento de Personal (SICON).</h3>
			<br>
		</center>
		
		<div class="formulario_fomope">

			<h7 class="estilo-color">Nota: *Estos campos son obligatorios.</h7>
			<br><br>

			<form method="post" name="ffomope" action="agregar_FOMOPE.php">

				<div class="rounded border border-dark plantilla-titulos text-center">
					<p>Datos Personales</p>
				</div>
				<br>

			

				<div class="rounded border border-dark plantilla-input text-center">
				<div class="form-row">
					<div class="form-group col-md-6">
						<label class="plantilla-label" for="fili">*Filiación:</label>
						<input type="text" class="form-control border border-dark" id="fili" name="fili" placeholder="Filiación" maxlength="13" value="" onkeyup="javascript:this.value=this.value.toUpperCase();" required >
						  <div class="invalid-feedback">
					          Please choose a username.
					      </div>
					</div>
					<div class="form-group col-md-6">
						<label class="plantilla-label" for="curp">*CURP:</label>
						<input type="text" class="form-control border border-dark" id="curp" name="curp" placeholder="CURP" maxlength="18" value="" onkeyup="javascript:this.value=this.value.toUpperCase();" required >
					</div>
				</div>
				<br>

			

				<div class="form-row">

					<div class="form-group col-md-12">
						<div class="col text-center">
							<button type="button" name="registrar_fomope" class="btn btn-outline-info tamanio-button" onclick= "validarDatos()" >Validar datos</button>
						</div>
					</div>

					<div class="form-group col-md-12">
						<div class="col text-center">
							<button type="submit" name="registrar_fomope" class="btn btn-primary tamanio-button">Registrar FOMOPE</button>
						</div>
					</div>
					
					<!--<div class="form-group col-md-6">
						<div class="col text-center">
							<button type="submit" name="enviar" class="btn btn-primary">Importar Información FOMOPE</button>
						</div>
					</div>-->
				</div>

			</form>

		</div>
		<br><br>

	</body>
</html>
