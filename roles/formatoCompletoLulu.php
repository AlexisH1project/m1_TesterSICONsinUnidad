<html>
	
	<head>
		<meta charset="utf-8">
		<title>SS-FOMOPE Iniciar Sesión</title>
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
	<body>
		<?php 
			include "Controller/configuracion.php";
			$usuarioSeguir =  $_GET['usuario_rol'];
			//echo $usuarioSeguir;
		?>
		<center>
			<br>
				<h3>Sistema de Control de Registro de Formato de Movimiento de Personal (SICON).</h3>
				<br>
				<h5> DEPARTAMENTO DE DICTAMINACIÓN SALARIAL Y CONTRATOS POR HONORARIOS - DDSCH</h5>
			<br>

				<div class="col-md-8 col-md-offset-8">
					 <form name="captura1" action="./Controller/agregarNewRegistro.php" method="POST"> 
				 		<div class="form-row">
							<input type="text" class="form-control" id="userName" name="userName" value="<?php echo $usuarioSeguir ?>" style="display:none">
						</div>
						<div class="form-row">
							<div class="form-group col-md-12" >
								<label class="plantilla-label" for="unexp_1">Unidad:</label>
								<input onkeypress="return pulsar(event)" type="text" class="form-control unexp" id="unexp_1" name="unexp_1" placeholder="Ej. 111" value="" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
							</div>
						</div>

						<div class="form-row">
							<div class="col">
						      <div class="md-form mt-0">
						       <label for="rfcL">RFC: </label>
						    	<input type="text" class="form-control" id="rfc" name="rfc" placeholder="Ingresa rfc" maxlength="13"  required pattern="^([A-ZÑ\x26]{3,4}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1]))([A-Z\d]{3})?$">
						      </div>
						    </div>

						    <div class="col">
						      <div class="md-form mt-0">
						        <label for="CURP">CURP: </label>
						   		 <input type="text" class="form-control" id="curp" name="curp" placeholder="Ingresa CURP" maxlength="18" required pattern="^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$">
						      </div>
						    </div>
						</div>
						<br>
				  		<div class="form-group col-md-12" >	
				  			<label for="nombreT">NOMBRE COMPLETO: </label>
						</div>

				  		<div class="form-row">

				  			<div class="col">
						      <div class="md-form mt-0">
						        <input type="text" class="form-control" id="apellido1" name="apellido1" placeholder="Apellido Paterno" maxlength="30"required>
						      </div>
						    </div>

						    <div class="col">
						      <div class="md-form mt-0">
						        <input type="text" class="form-control" id="apellido2" name="apellido2" placeholder="Apellido Materno" maxlength="30"required>
						      </div>
						    </div>

						    <div class="col">
						      <div class="md-form mt-0">
						        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" maxlength="40" required>
						      </div>
						    </div>
						</div>
				</div>
				<div class="col-md-4 col-md-offset-4">

				  		<div class="form-group col-md-12" >
					  		<label for="fechaIngreso"> FECHA DE INGRESO: </label>
						    <input type="date" class="form-control" id="fechaIngreso" name="fechaIngreso" placeholder="Ingresa Fecha del ingreso" required>
						    
				  		</div>

				  		<div class="form-group col-md-12" >	
					  		<label for="TipoEntregaArchivo">TIPO DE ENTREGA: </label>
						</div>

				  		<div class="form-group col-md-12" >
							<label class="radio-inline"><input id="TipoEntregaArchivo" type="radio" name="TipoEntregaArchivo" value="Fisico" required>Fisico</label>
							<label class="radio-inline"><input id="TipoEntregaArchivo" type="radio" name="TipoEntregaArchivo" value="Digital" required >Digital</label>
							<label class="radio-inline"><input id="TipoEntregaArchivo" type="radio" name="TipoEntregaArchivo" value="Ambos" required >Ambos</label>
				  		</div>

				  		<div class="form-group col-md-12" >
					  		<label for="oficio">OFICIO ENTREGA SEGUROS: </label>
						    <input type="text" class="form-control" id="ofEntrega" name="ofEntrega" placeholder="Ingresa el oficio de entrega" maxlength="15"required>
				  		</div>

						<div class="form-group col-md-12" >

							<label class="radio-inline"><input id="radioLulu" type="radio" name="radioLulu" value="Rechazar" required>Rechazar</label>
							<label class="radio-inline"><input id="radioLulu" type="radio" name="radioLulu" value="Agregar" required >Agregar</label>
				  		</div>

				  			<br>
						
							<p>Justificación o Motivos de Rechazo</p>
					
							<div class="form-group shadow-textarea">
							  <label for="exampleFormControlTextarea6">*Agregar la justificacion</label>
							  <textarea class="form-control z-depth-1" id="comentarioR" name="comentarioR" rows="3" placeholder="Escribe el motivo del rechazo..."></textarea>
							</div>


							<div class="form-group col-md-12" >	
				  				<label for="Ft">FECHAS ENTREGA DE EXPEDIENTE A: </label>
							</div>

							<div class="form-row">
				  			<div class="col">
						      <div class="md-form mt-0">
					  			<label for="FArch">ARCHIVO: </label>

						        <input type="date" class="form-control" id="fechaArchivo" name="fechaArchivo">
						      </div>
						    </div>

						    <div class="col">
						      <div class="md-form mt-0">
					  			<label for="fAlaborar">RELACIONES LABORALES: </label>
						        <input type="date" class="form-control" id="fechaRLaborales" name="fechaRLaborales">
						      </div>
						    </div>			
						    
						</div>
						<br>
						<div class="form-group col-md-12" >
					  		 <label for="ofEntregaL">OFICIO ENTREGA EXPEDIENTE RELACIONES LABORALES: </label> 
						    <input type="text" class="form-control" id="ofEntregaRL" name="ofEntregaRL" placeholder="OFICIO ENTREGA EXPEDIENTE RELACIONES LABORALES" maxlength="65">
				  		</div>

				  		  <div class="form-group">
						    <label for="ejemplo_archivo_1">Adjuntar un archivo</label>
						    <input type="file" id="ejemplo_archivo_1" name="ejemplo_archivo_1">
						   <!--  <p class="help-block">Ejemplo de texto de ayuda.</p> -->
						  </div>
						 
						  <div class="form-group col-md-12" >
					  		<label for="fechaUnidad">FECHA ENTREGA EXPEDIENTE UNIDAD: </label>
						    <input type="date" class="form-control" id="fechaEntregaUnidad" name="fechaEntregaUnidad" >
				  		</div>

				  		<div class="form-group col-md-12" >
					  		 <label for="ofUnidad">OFICIO ENTREGA EXPEDIENTE UNIDAD: </label> 
						    <input type="text" class="form-control" id="ofEntregaUnidad" name="ofEntregaUnidad" placeholder="OFICIO ENTREGA EXPEDIENTE UNIDAD" maxlength="49">	
				  		</div>		

				  		<div class="form-group col-md-12">
								<div class="col text-center">
								  	<button type="submit" class="btn btn-primary">Agregar Informacion</button>
								</div>
						</div>


					</form>  

				</div>
		
	</body>

		
</html>

