
<?php
  $mysqli = new mysqli('localhost', 'root', '', 'p_fomopes');
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Autorizar FOMOPE</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
				<link rel="stylesheet" type="text/css" href="css/estilo_form.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<link href='jquery/jquery-ui.min.css' type='text/css' rel='stylesheet'>
		<link href='jquery/jquery-ui.css' type='text/css' rel='stylesheet'>

		  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

		<script src="js/funciones.js"></script>
		<script src="jquery/jquery-3.4.1.min.js" type="text/javascript"></script>
		<script src="jquery/jquery-ui.min.js" type="text/javascript"></script>
		<script src="jquery/jquery-ui.js" type="text/javascript"></script>
		<script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js" ></script>	
		

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
				background-color: #f2dfa5;
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
				background-color: #f2dfa5;
				font-family: Verdana, Geneva, sans-serif;
				padding: 12px;
			}

			.plantilla-label{
				font-weight: bold;
			}

			.plantilla-lugnac{
				background-color: #f2dfa5;
				font-family: Verdana, Geneva, sans-serif;
				font-size: 21px;
				font-weight: bold;
				padding: 12px 12px 2px 12px;
			}

			.plantilla-depend{
				background-color: #f2dfa5;
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
				$noFomope = $_GET['noFomope'];
				//echo $noFomope;
				$id_rol = $_GET['id_rol'];
				//echo $id_rol;
				$usuario = $_GET['usuario'];
			//echo $usuario;
			$consulta2 = " SELECT * FROM fomope WHERE id_movimiento =" .$noFomope;

		        if($resultado2 = mysqli_query($conexion,$consulta2)){
	        		$row = mysqli_fetch_assoc($resultado2);
					$id_fomope = $row['id_movimiento'];
					$rfc_fom = $row['rfc'];
					$color_est = $row['color_estado'];
					$curp_fom = $row['curp'];
					$apellido_1 = $row['apellido_1'];
					$apellido_2 =  $row['apellido_2'];
					$nombre_s = $row['nombre'];
					$fecha_ingreso =  $row['fechaIngreso'];
					$oficio_entrega = $row['oficioEntrega'];
					$tipo_entrega =  $row['tipoEntrega'];
					$tipo_de_accion = $row['tipoDeAccion'];
					$justificacio_fom = $row['justificacionRechazo'];
					$unidad = $row['unidad'];
					$quincena_apli = $row['quincenaAplicada'];
					$anio_fo = $row['anio'];
	        		$of_unidad = $row['oficioUnidad'];
					$fecha_oficio = $row['fechaOficio'];
					$fecha_recibido = $row['fechaRecibido'];
					$codigo = $row['codigo'];
					$no_puesto = $row['n_puesto'];
					$clave_presupuestaria = $row['clavePresupuestaria'];
					$codigo_movimiento = $row['codigoMovimiento'];
					$concepto = $row['descripcionMovimiento'];
					$del_1 = $row['vigenciaDel'];
					$al_1 = $row['vigenciaAl'];
					$estado_en = $row['entidad'];
					$consecutivo_maestro_impuestos = $row['consecutivoMaestroPuestos'];
					$plaza = $row['puestos'];
					$observaciones = $row['observaciones'];
				
					$fecha_envio_dipsp = $row['fechaEnviadaRubricaDipsp'];
					$fecha_envio_dgrh = $row['fechaEnviadaRubricaDgrho'];
					$fecha_recibido_spc = $row['fechaRecepcionSpc'];
					$fecha_envio_spc = $row['fechaEnvioSpc'];
					$fecha_recibo_dspo = $row['fechaReciboDspo'];
					$folio_spc = $row['folioSpc'];
					$fecha_capt_nomin = $row['fechaCapturaNomina'];
					$fecha_entrega_archivo_gral = $row['fechaEntregaArchivo'];
					$clave_concepto = "$codigo_movimiento"."_"."$concepto";
					$fecha_relaciones_lab = $row['fechaEntregaRLaborales'];
					$oficio_entrega_rel_lab = $row['OfEntregaRLaborales'];
	        		$fomope_digital	= $row['fomopeDigital'];
	        		$fecha_entrega_unidad = $row['fechaEntregaUnidad'];
	        		$oficio_entrega_uni = $row['OfEntregaUnidad'];
	        		$fecha_final = $row['fechaAutorizacion'];
			}
	
			$v = "-";
	        	
			
			


		 ?>
		<img class="img-responsive" src="img/img-salud.jpg" height="150" width="354">
		<center>
			<h3>Sistema de Captura Para Formato de Movimientos de Personal</h3>
			<br>
				<h5> (FOMOPE)-DGRHyO</h5>
			<br>
		</center>
		
		<div class="formulario_fomope">

		
			<br><br>

			 <form name="captura1" action="aceptar.php" method="POST"> 
						
						<div class="col text-center">
						
			</div>

			<div class="form-row">
					<div class="form-group col-md-6">
						<label class="plantilla-label" for="unidad1">Unidad:</label>
						<input onkeypress="return pulsar(event)" type="text" class="form-control unexp border border-dark" id="unidad1" name="unidad1" placeholder="Ej. OAG-CA-3735-2020" value="<?php echo $unidad; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly>
					</div>
				</div>
				<div class="form-row">
							<input type="text" class="form-control" id="noFomope" name="noFomope" value="<?php echo $noFomope?>" style="display:none">
						</div>
						<div class="form-row">
							<input type="text" class="form-control" id="id_rol" name="id_rol" value="<?php echo $id_rol?>" style="display:none">
						</div>
						<div class="form-row">
							<input type="text" class="form-control" id="usuario" name="usuario" value="<?php echo $usuario?>" style="display:none">
						</div>
						<div class="form-row">
							<input type="text" class="form-control" id="color_esta" name="color_esta" value="<?php echo $color_est?>" style="display:none">
						</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label class="plantilla-label" for="rfc_fomo">RFC:</label>
						<input onkeypress="return pulsar(event)" type="text" class="form-control unexp border border-dark" id="rfc_fomo" name="rfc_fomo" placeholder="Ej. OAG-CA-3735-2020" value="<?php echo $rfc_fom; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly>
					</div>

					<div class="form-group col-md-6">
						<label class="plantilla-label" for="curp1">Curp:</label>
						<input onkeypress="return pulsar(event)" type="text" class="form-control unexp border border-dark" id="curp1" name="curp1" placeholder="Ej. OAG-CA-3735-2020" value="<?php echo $curp_fom; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly>
					</div>
				</div>
					<div class="form-row">
					<div class="form-group col-md-5">
						<label class="plantilla-label" for="apPater">Apellido Paterno:</label>
						<input onkeypress="return pulsar(event)" type="text" class="form-control unexp border border-dark" id="apPater" name="apPater" placeholder="Ej. OAG-CA-3735-2020" value="<?php echo $apellido_1; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly>
					</div>
				<div class="form-row">
					<div class="form-group col-md-5">
						<label class="plantilla-label" for="apmater">*Apellido Materno:</label>
						<input onkeypress="return pulsar(event)" type="text" class="form-control unexp border border-dark" id="apmater" name="apmater" placeholder="Ej. OAG-CA-3735-2020" value="<?php echo $apellido_2; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly>
					</div>

					<div class="form-group col-md-5">
						<label class="plantilla-label" for="nombres">Nombre(s):</label>
						<input onkeypress="return pulsar(event)" type="text" class="form-control unexp border border-dark" id="nombres" name="nombres" placeholder="Ej. OAG-CA-3735-2020" value="<?php echo $nombre_s; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly>
					</div>
				</div>

				<div class="form-row">
					<div class="form-group col-md-6">
						<label class="plantilla-label" for="fechIngr">Fecha ingreso:</label>
						<input onkeypress="return pulsar(event)" type="text" class="form-control unexp border border-dark" id="fechIngr" name="fechIngr" placeholder="Ej. OAG-CA-3735-2020" value="<?php echo $fecha_ingreso; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly>
					</div>

					<div class="form-group col-md-6">
						<label class="plantilla-label" for="ofentre">Oficio entrega:</label>
						<input onkeypress="return pulsar(event)" type="text" class="form-control unexp border border-dark" id="ofentre" name="ofentre" placeholder="Ej. OAG-CA-3735-2020" value="<?php echo $oficio_entrega; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly>
					</div>

					<div class="form-group col-md-6">
						<label class="plantilla-label" for="tipoentre">Tipo de entrega:</label>
						<input onkeypress="return pulsar(event)" type="text" class="form-control unexp border border-dark" id="tipoentre" name="tipoentre" placeholder="Ej. OAG-CA-3735-2020" value="<?php echo $tipo_entrega; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly>
					</div>

					<div class="form-group col-md-6">
						<label class="plantilla-label" for="tipoacc">Tipo de acción:</label>
						<input onkeypress="return pulsar(event)" type="text" class="form-control unexp border border-dark" id="tipoacc" name="tipoacc" placeholder="Ej. OAG-CA-3735-2020" value="<?php echo $tipo_de_accion; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly>
					</div>
				</div>

					<div class="form-group col-md-10">
						<label class="plantilla-label" for="justirech">Justificación rechazo:</label>
						<input onkeypress="return pulsar(event)" type="text" class="form-control unexp border border-dark" id="justirech" name="justirech" placeholder="Ej. OAG-CA-3735-2020" value="<?php echo $justificacio_fom; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly>

				</div>
				<div class="form-row">
					<div class="form-group col-md-4">
						<label class="plantilla-label" for="quinapli">Quincena aplicada:</label>
						<input onkeypress="return pulsar(event)" type="text" class="form-control unexp border border-dark" id="quinapli" name="quinapli" placeholder="Ej. OAG-CA-3735-2020" value="<?php echo $quincena_apli; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly>
					</div>


					<div class="form-group col-md-4">
						<label class="plantilla-label" for="aniofo">Año:</label>
						<input onkeypress="return pulsar(event)" type="text" class="form-control unexp border border-dark" id="aniofo" name="aniofo" placeholder="Ej. OAG-CA-3735-2020" value="<?php echo $anio_fo; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly>
				
				</div>
					<div class="form-group col-md-4">
						<label class="plantilla-label" for="ofunid">Oficio Unidad:</label>
						<input onkeypress="return pulsar(event)" type="text" class="form-control unexp border border-dark" id="ofunid" name="ofunid" placeholder="Ej. OAG-CA-3735-2020" value="<?php echo $of_unidad; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly>

				</div>
			</div>
				<div class="form-row">
					<div class="form-group col-md-8">
						<label class="plantilla-label" for="fechaofi">Fecha de oficio:</label>
						<input onkeypress="return pulsar(event)" type="date" class="form-control border border-dark" id="fechaofi" name="fechaofi" placeholder="Fecha Oficio" value="<?php echo $fecha_oficio; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly>
						<small name= "alertFechaIngreso" id= "alertFechaIngreso" class="text-danger">
				        </small>  
					</div>
				
				<div class="form-row">
					<div class="form-group col-md-13">
						<label class="plantilla-label" for="fechareci">Fecha de recibido:</label>
						<input onkeypress="return pulsar(event)" type="date" class="form-control border border-dark" id="fechareci" name="fechareci" placeholder="Fecha de recibido" value="<?php echo $fecha_recibido; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly>
						<small name= "alertFechaIngreso" id= "alertFechaIngreso" class="text-danger">
				        </small>  
					</div>
				</div>
					<div class="form-row">
					<div class="form-group col-md-114">
						<label class="plantilla-label" for="codigo">Código:</label>
						<input onkeypress="return pulsar(event)" type="text" class="form-control border border-dark" id="codigo" name="codigo" placeholder="Ej. 165" value="<?php echo $codigo; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly>
					</div>
				</div>
			</div>
					<div class="form-row">
					<div class="form-group col-md-10">
						<label class="plantilla-label" for="NO">No. de puesto:</label>
						<input onkeypress="return pulsar(event)" type="text" class="form-control border border-dark" id="num_pues" name="num_pues" placeholder="Ej. 0001" value="<?php echo $no_puesto; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly>

				</div>
					<div class="form-group col-md-7">
						<label class="plantilla-label" for="NO">Clave presupuestaria:</label>
						<input onkeypress="return pulsar(event)" type="text" class="form-control border border-dark" id="clavepres" name="clavepres" placeholder="Ej. 0001" value="<?php echo $clave_presupuestaria; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly>
					</div>
				
					
					<div class="form-group col-md-12">
						<label class="plantilla-label" for="codmov">Código de movimiento:</label>
						<input onkeypress="return pulsar(event)" type="text" class="form-control cod2 border border-dark" id="cod2_1" name="cod2_1" placeholder="Ej. 4550" value="<?php echo $clave_concepto; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly>
					</div>
				</div>

				<div class="form-row">
					<div class="form-group col-md-6">
							<div class="text-center">
								<label class="plantilla-label" for="del2">Del:</label>
							</div>
							<input onkeypress="return pulsar(event)" type="date" class="form-control border border-dark" id="del2" name="del2" placeholder="Del" value="<?php echo $del_1; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly>
							<small name= "alertVigencia" id= "alertVigencia" class="text-danger">
				        	</small> 
						</div>
						<div class="form-group col-md-6">
							<div class="text-center">
								<label class="plantilla-label" for="al3">al:</label>
							</div>
							<input onkeypress="return pulsar(event)" type="date" class="form-control border border-dark" id="al3" name="al3" placeholder="al" value="<?php echo $al_1; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly> <!---->
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
						<label class="plantilla-label" for="estad">Estado:</label>
						<input onkeypress="return pulsar(event)" type="text" class="form-control border border-dark" id="estad" name="estad" placeholder="Ej. Ciudad de México" maxlength="13" value="<?php echo $estado_en; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly>
					</div>
					<div class="form-group col-md-5">
						<label class="plantilla-label" for="consema">Consecutivo maestro de puestos:</label>
						<input onkeypress="return pulsar(event)" type="text" class="form-control colon border border-dark" id="consema" name="consema" placeholder="Ej. 170" value="<?php echo $consecutivo_maestro_impuestos; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-5">
						<label class="plantilla-label" for="plaza1">Plaza:</label>
						<input onkeypress="return pulsar(event)" type="text" class="form-control colon border border-dark" id="plaza1" name="plaza1" placeholder="Ej. 1" value="<?php echo $plaza; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly>
					</div>
				</div>
					<div class="form-group col-md-5">
						<label class="plantilla-label" for="observ">Observaciones:</label>
						<input onkeypress="return pulsar(event)" type="text" class="form-control colon border border-dark" id="observ" name="observ" placeholder="Ej. 11-01-19 LA DIRECTORA GENERAL INDICA QUE SE REQUIERE OFICIO DE AUTORIZACION CON JUSTIFICACION PARA OCUPACION." value="<?php echo $observaciones; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly>
					</div>
					
					<div class="form-group col-md-6">
						<label class="plantilla-label" for="fechaendipsp">Fecha de envio DIPSP:</label>
						<input onkeypress="return pulsar(event)" type="date" class="form-control border border-dark" id="fechaendipsp" name="fechaendipsp" placeholder="Fecha de envio a firma DGRH" value="<?php echo $fecha_envio_dipsp; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly>
						<small name= "alertFechaIngreso" id= "alertFechaIngreso" class="text-danger">
				        </small>  
					</div>


					 <div class="form-group col-md-6">
						<label class="plantilla-label" for="fechaendgrh">Fecha de envio a firma DGRH:</label>
						<input onkeypress="return pulsar(event)" type="date" class="form-control border border-dark" id="fechaendgrh" name="fechaendgrh" placeholder="Fecha de envio a firma DGRH" value="<?php echo $fecha_envio_dgrh; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly>
						<small name= "alertFechaIngreso" id= "alertFechaIngreso" class="text-danger">
				        </small>  
					</div>

					<div class="form-group col-md-6">
						<label class="plantilla-label" for="fecharecspc">Fecha de recibido en SPC:</label>
						<input onkeypress="return pulsar(event)" type="date" class="form-control border border-dark" id="fecharecspc" name="fecharecspc" placeholder="Fecha de recibido en SPC" value="<?php echo $fecha_recibido_spc; ?>"  onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly>
						<small name= "alertFechaIngreso" id= "alertFechaIngreso" class="text-danger">
				        </small>  
					</div>
					<div class="form-group col-md-6">
						<label class="plantilla-label" for="fechenvvb">Fecha de envio a VoBo SPC:</label>
						<input onkeypress="return pulsar(event)" type="date" class="form-control border border-dark" id="fechenvvb" name="fechenvvb" placeholder="Fecha de envio a VoBo SPC" value="<?php echo $fecha_envio_spc; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly>
						<small name= "alertFechaIngreso" id= "alertFechaIngreso" class="text-danger">
				        </small>  
					</div>

					
					<div class="form-group col-md-5">
						<label class="plantilla-label" for="foliospc">Folio SPC:</label>
						<input onkeypress="return pulsar(event)"  type="text" class="form-control colon border border-dark" id="foliospc" name="foliospc" placeholder="Ej. 2020" value="<?php echo $folio_spc; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly>
					</div>
					<div class="form-group col-md-6">
							<div class="text-center">
								<label class="plantilla-label" for="fechanom">Fecha captura nomina:</label>
							</div>
							<input onkeypress="return pulsar(event)" type="date" class="form-control border border-dark" id="fechanom" name="fechanom" placeholder="Ej" value="<?php echo $fecha_capt_nomin; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly> <!--required-->
						</div>
					 <div class="form-group col-md-6">
							<div class="text-center">
								<label class="plantilla-label" for="al3">Fecha entregada del trabajador para archivo gral.- Lourdes Arredondo Cortes:</label>
							</div>
							<input onkeypress="return pulsar(event)" type="date" class="form-control border border-dark" id="fechaenlo" name="fechaenlo" placeholder="fechaenlo" value="<?php echo $fecha_entrega_archivo_gral; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly> <!--required-->
						</div>
						<div class="form-group col-md-6">
							<div class="text-center">
								<label class="plantilla-label" for="al3">Fecha de entrega a relaciones laborales</label>
							</div>
							<input onkeypress="return pulsar(event)" type="date" class="form-control border border-dark" id="fecharelab" name="fecharelab" placeholder="fechaenlo" value="<?php echo $fecha_relaciones_lab; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly> <!--required-->
						</div>
						<div class="form-group col-md-5">
						<label class="plantilla-label" for="foliospc">Oficio de entrega relaciones laborales:</label>
						<input onkeypress="return pulsar(event)"  type="text" class="form-control colon border border-dark" id="ofrelab" name="ofrelab" placeholder="Ej. 2020" value="<?php echo $oficio_entrega_rel_lab; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly>
					</div>
					<div class="form-group col-md-5">
						<label class="plantilla-label" for="foliospc">Fomope Digital:</label>
						<input onkeypress="return pulsar(event)"  type="text" class="form-control colon border border-dark" id="fomdig" name="fomdig" placeholder="Ej. 2020" value="<?php echo $fomope_digital; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly>
					</div>
					<div class="form-group col-md-6">
							<div class="text-center">
								<label class="plantilla-label" for="al3">Fecha de entrega en unidad</label>
							</div>
							<input onkeypress="return pulsar(event)" type="date" class="form-control border border-dark" id="fechaentunid" name="fechaentunid" placeholder="fechaenlo" value="<?php echo $fecha_entrega_unidad; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly> <!--required-->
						</div>
						<div class="form-group col-md-5">
						<label class="plantilla-label" for="foliospc">Oficio de entrega unidad:</label>
						<input onkeypress="return pulsar(event)"  type="text" class="form-control colon border border-dark" id="ofentuni" name="ofentuni" placeholder="Ej. 2020" value="<?php echo $oficio_entrega_rel_lab; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly>
					</div>
					<div class="form-group col-md-6">
							<div class="text-center">
								<label class="plantilla-label" for="al3">Fecha de ultima modificación</label>
							</div>
							<input onkeypress="return pulsar(event)" type="date" class="form-control border border-dark" id="fechaulmod" name="fechaulmod" placeholder="fechaenlo" value="<?php echo $fecha_final; ?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required readonly> <!--required-->
						</div>
			<!--</form>-->

		</div>
		<br><br>
	</body>
</html>
