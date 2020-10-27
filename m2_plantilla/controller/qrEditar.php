
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>FOMOPE</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/estilo_form.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<link href='jquery/jquery-ui.min.css' type='text/css' rel='stylesheet'>
		<link href='jquery/jquery-ui.css' type='text/css' rel='stylesheet'>

		<script type="text/javascript" src="./include/jquery-1.7.1.min.js"></script>
		<script type="text/javascript" src="./include/jquery.validate.js"></script>

		

		  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


		<script src="jquery/jquery-3.4.1.min.js" type="text/javascript"></script>
		<script src="jquery/jquery-ui.min.js" type="text/javascript"></script>
		<script src="jquery/jquery-ui.js" type="text/javascript"></script>
		<script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js" ></script>	

	<script src="js/jquery-3.4.1.min.js" type="text/javascript"></script>
		<script src="js/jquery-ui.min.js" type="text/javascript"></script>
		<script src="js/jquery-ui.js" type="text/javascript"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/estilossicon.css">

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
		  
		      #div1 {
		         overflow:scroll;
		         height:400px;
		         width:1000px;
		    }
		    #div1 table {
		        width:500px;
		        background-color:lightgray;
		    }
		  </style>

				
		<script type="text/javascript">
			
			function pulsar(e) {
  				tecla = (document.all) ? e.keyCode :e.which; 
  				return (tecla!=13); 
			} 

			

		</script>

		
		<script type="text/javascript">

			$(document).ready(function(){
				$(document).on('keydown', '.cod2', function(){
					var id = this.id;
					var splitid = id.split('_');
					var indice = splitid[1];
					$('#'+id).autocomplete({
						source: function(request, response){
							$.ajax({
								url: "resultados_cmov.php",
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
								url: 'resultados_cmov.php',
								type: 'post',
								data: {
									buscarid:buscarid,request:2
								},
								dataType: 'json',
								success:function(response){
									var len = response.length;
									if(len > 0){
										var idmov = response[0]['idmov'];
										var cod2 = response[0]['cod2'];
										var nomb_mov = response[0]['nomb_mov'];
										document.getElementById('cod2_'+indice).value = cod2;
										document.getElementById('nomb_mov_'+indice).value = nomb_mov;
									}
								}
							});
							return false;
						}
					});
				});
			});


		$(document).ready(function(){
				$(document).on('keydown', '.cod4', function(){
					var id = this.id;
					var splitid = id.split('_');
					var indice = splitid[1];
					$('#'+id).autocomplete({
						source: function(request, response){
							$.ajax({
								url: "resultados_cmov.php",
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
								url: 'resultados_cmov.php',
								type: 'post',
								data: {
									buscarid:buscarid,request:2
								},
								dataType: 'json',
								success:function(response){
									var len = response.length;
									if(len > 0){
										var idmov = response[0]['idmov'];
										var cod2 = response[0]['cod4'];
										var nomb_mov = response[0]['nomb_mov'];
										document.getElementById('cod4_'+indice).value = cod2;
										document.getElementById('nomb_mov_'+indice).value = nomb_mov;
									}
								}
							});
							return false;
						}
					});
				});
			});


			$(document).ready(function(){
				$(document).on('keydown', '.cod3', function(){
					var id = this.id;
					var splitid = id.split('_');
					var indice = splitid[1];
					$('#'+id).autocomplete({
						source: function(request, response){
							$.ajax({
								url: "resultados_estado.php",
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
								url: 'resultados_estado.php',
								type: 'post',
								data: {
									buscarid:buscarid,request:2
								},
								dataType: 'json',
								success:function(response){
									var len = response.length;
									if(len > 0){
										var idmov = response[0]['idEstado'];
										var cod3 = response[0]['cod3'];
										var nomb_edo = response[0]['nomb_edo'];
										document.getElementById('cod3_'+indice).value = cod3;
										document.getElementById('nomb_edo_'+indice).value = nomb_edo;
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

			function verBoton(userLogin, elID){
		      	var textRechazo = document.getElementById('MotivoRechazo').value;
		      	if (textRechazo == ""){
		      		alert ("Es necesario ingresar el motivo de rechazo") ;
		      	}else{
			      	var btn_2 = document.getElementById('bandejaEntrada');
				    btn_2.style.display = 'inline';
			      	$('#enviarQr').hide();
					window.location.href = 'Controller/rechazosQr.php?noFomope='+elID+'&usuario='+userLogin+'&comentarioR='+textRechazo;
				}
			}

			function nobackbutton(){
			   window.location.hash="no-back-button";
			   window.location.hash="Again-No-back-button" //chrome
			   window.onhashchange=function(){window.location.hash="no-back-button";}
			}

			function quitarRequier(){
				$('#MotivoRechazo').removeAttr("required");
			}
		
		</script>
		
		<script src="js/funciones.js"></script>
		
	</head>
	<body onload="nobackbutton();">

<?php 

			include "./librerias/configuracion.php";
			$noFomope = $_GET['noFomope'];
			$usuarioSeguir = $_GET['usuario'];
			
			$sql="SELECT * from fomope_qr WHERE id_movimiento_qr = '$noFomope' ";
            $result=mysqli_query($conexion,$sql);
            $rowQr = mysqli_fetch_row($result);

							$existenD =0;
			$sql="SELECT * from plazas_ctrlp_m2 WHERE id_plaza = '$noFomope' ";
			$documentosPC="";
			// echo $noFomope;
			$result=mysqli_query($conexion,$sql);
			$ver = mysqli_fetch_assoc($result);
	//header("Content-type: application/PDF");
			//readfile("\\\\PWIDGRHOSISFO01\\pdfs\\AADJ661227C70.PDF"); //C:/xampp2/htdocs/SICON_w/roles/Controller/
			
			//$from = '\\\\PWIDGRHOSISFO01\\pdfs\\';
		    if($rowQr[2]=="PERSONAL DE CONFIANZA (ALTA)" OR $rowQr[2]=="PERSONAL DE CONFIANZA (BAJA)"){
		    $to = './Controller/DOCUMENTOS_PDC/';	
		    }else{
			$to = './Controller/DOCUMENTOS_RES/';
		    }


			$sqlNombre = "SELECT nombrePersonal FROM usuarios WHERE usuario = '$usuarioSeguir'";
			$result = mysqli_query($conexion,$sqlNombre);
			$nombreU = mysqli_fetch_row($result);

			 $consultaR = " SELECT * FROM usuarios WHERE usuario = '$usuarioSeguir'";

		        if($resultado3 = mysqli_query($conexion,$consultaR)){
	        		$row = mysqli_fetch_assoc($resultado3);
					$id_rol1 = $row['id_rol'];


					
			}
			$valor = "";
			$hoy = "select CURDATE()";
			$tiempo ="select curTime()";
			$diaActual = "";

			 if ($resultHoy = mysqli_query($conexion,$hoy) AND $resultTime = mysqli_query($conexion,$tiempo)) {
			 		$rowF = mysqli_fetch_row($resultHoy);  // cambiamos formato de hora 
			 		$fechaSistema = date("d-m-Y", strtotime($rowF[0])); //"14-04-2020";
			 		$elDia = explode("-", $fechaSistema);
			 		$rowHora = mysqli_fetch_row($resultTime);

					$diaActual=date("w", strtotime($fechaSistema));
					
			 }

			 $sqlQna = "SELECT * FROM m1ct_fechasnomina WHERE estadoActual = 'abierta'";

			 if($resQna = mysqli_query($conexion,$sqlQna)){
			 	$rowQna = mysqli_fetch_row($resQna);
			 	//echo "OOOOOLLAA";
			 	$fehaI = date("d-m-Y", strtotime($rowQna[4])); 
			 	$fehaF = date("d-m-Y", strtotime($rowQna[5])); 
			 	$newQna = $rowQna[0];
			 }else{
			 
			 	echo "error sql";
			 }
		
		 ?>		

		 <br>
    	<br>
    	<br>

		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar" class=" bordv">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-outline-secondary">
	          <i class="fa fa-bars"></i>
	          <br>
	          <span class="sr-only">Menú</span>
	        </button>
        </div>
				<div class="p-4 ">

		  		<img class="img-responsive" src="img/ss1.png" height="50" width="190">
	        <ul class="list-unstyled components mb-5">
	        	<br>
	        	<center>
	        	<li class=" estilo-color">
	            <a ><img src="./img/iclogin.png" alt="x" height="17" width="17"/><?php echo (" $nombreU[0]"); ?></span></a>
	          </li>
	      </center>
	          <li class=" estilo-color">
	          	<!-- redireccionamos a la interfaz correcta  -->
	          	<?php
	          		if($id_rol1 == 1){
	          			$namePHP = "LuluEventuales.php";
	          		}else if($id_rol1 == 4){
	          			$namePHP = "bandejaEventuales_D.php";
	          		}else{
	          			$namePHP = "bandejaEventuales.php";
	          		}
	          	?>
	            <a href=  <?php echo ("'../vista/plazas.php?usuario_rol=$usuarioSeguir''"); ?> ><img src="./img/2_ic.png" alt="x" height="17" width="20"/>      Bandeja</a>
	          </li>
	          <li class=" estilo-color">
	              <a href= <?php echo ("'../vista/consultaEstadoPlazas.php?usuario_rol=$usuarioSeguir'");?>><img src="./img/ic-consulta.png" alt="x" height="17" width="17"/> Consulta</a>
	          </li>
	          <li class=" estilo-color">
	              <a href= <?php echo ("'../vista/leerExcel.php?usuario_rol=$usuarioSeguir'");?>><img  src="./img/upload1.png" alt="x" height="17" width="20"/> Extraer Excel</a>
	          </li>
	          <br>
	          <br>
	          <br>
	          <br>
	           <br>      
	          <br>
	          <br>
	          <br>
	          <li class=" estilo-color">
	              <a class="nav-link" href=  "../../LoginMenu/vista/cerrarsesion.php" ><img src="./img/iclogout.png" alt="x" height="17" width="17"/> Cerrar Sesión</a>
	          </li>
	          
	          </li>
	          <li class=" estilo-color">
             
	          </li>

	        </ul>

	      </div>
    	</nav>
    	<br>
    	<br>
    	<br>

    	<nav class="navbar fixed-top navbar-expand-lg navbar-dark bordv plantilla-inputv fixed-top">
		    <center>
		    	<div class="container plantilla-inputv " align="center">
		      <div class="collapse navbar-collapse" id="navbarResponsive">
		      	
		      		<div class="form-row " >
		      		 
		        <ul class="navbar-nav ml-auto">          
		       
		        	
		        	<h3  class="estilo-colorn">Sistema de Control de Registro de Formato de Movimiento de Personal
		          </h3>
		          <h3  class="estilo-colorv">............
		          </h3>
		        </ul>

		         <ul class="navbar-nav ml-auto">          
		      
		         <h5 class=" estilo-color">Departamento Dirección General de Recursos Humanos y Organización/Dirección integral de puestos y servicios personales</h5>
		        </ul>
		         
		      </div>
		      <br>
		     
		    </div> 
		</center>
		    <br>
		    <br>
		  </nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
		<div class="formulario_qr">



			<br>
			<form method="post" name="qrs" action="./Controller/autorizarQr.php"> 
				<div class="form-row">
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="tip registro">Ramo: </label>
									 <input type="text" class="form-control border border-dark" id="ramo" name="ramo" value="<?php echo $ver['ramo']?>" readonly > 
					</div>


					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="llave">Unidad Responsable: </label>
									 <input type="text" class="form-control border border-dark" id="unidadResponsable" name="unidadResponsable" value="<?php echo $ver['unidadResponsable']?>" readonly > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="tipo_movimiento">Grupo Personal: </label>
							<input type="text" class="form-control border border-dark" id="grupoPersonal" name="grupoPersonal" value="<?php echo $ver['grupoPersonal']?>" readonly > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="lote">Grupo Funcional Responsabilidad </label>
									 <input type="text" class="form-control border border-dark" id="gfuncionalResponsabilidad" name="gfuncionalResponsabilidad" value="<?php echo $ver['gfuncionalResposabilidad']?>" readonly > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="zonaEconomica">Zona Economica: </label>
									 <input type="text" class="form-control border border-dark" id="zonaEconomica" name="zonaEconomica" value="<?php echo $ver['zonaEconomica']?>" readonly > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="nivel">Nivel: </label>
									 <input type="text" class="form-control border border-dark" id="nivel" name="nivel" value="<?php echo $ver['nivel']?>" readonly > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="codigoPuesto">Codigo Puesto: </label>
									 <input type="text" class="form-control border border-dark" id="codigoPuesto" name="codigoPuesto" value="<?php echo $ver['codigoPuesto']?>" readonly > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="rangoSalarial">Rango Salarial: </label>
									 <input type="text" class="form-control border border-dark" id="rangoSalarial" name="rangoSalarial" value="<?php echo $ver['rangoSalarial']?>" readonly > 
					</div>

					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="codigoFederalPuestos">Codigo Federal Puestos: </label>
									 <input type="text" class="form-control border border-dark" id="codigoFederalPuestos" name="codigoFederalPuestos" value="<?php echo $ver['codigoFederalPuestos']?>" readonly > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="regimenDeSeguridadSocial">Regimen de Seguridad Social: </label>
									 <input type="text" class="form-control border border-dark" id="regimenDeSeguridadSocial" name="regimenDeSeguridadSocial" value="<?php echo $ver['regimenDeSeguridadSocial']?>" readonly > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="curvaSalarial">Curva Salarial: </label>
									 <input type="text" class="form-control border border-dark" id="curvaSalarial" name="curvaSalarial" value="<?php echo $ver['curvaSalarial']?>" readonly > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="tipoPlaza">Tipo de Plaza: </label>
									 <input type="text" class="form-control border border-dark" id="tipoPlaza" name="tipoPlaza" value="<?php echo $ver['tipoPlaza']?>" readonly > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="tipoPersonal">Tipo Personal: </label>
									 <input type="text" class="form-control border border-dark" id="tipoPersonal" name="tipoPersonal" value="<?php echo $ver['tipoPersonal']?>" readonly > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="tipoNombramiento">Tipo de Nombramiento: </label>
									 <input type="text" class="form-control border border-dark" id="tipoNombramiento" name="tipoNombramiento" value="<?php echo $ver['tipoNombramiento']?>" readonly > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="grupoJerarquicoDePersonal">Grupo Jerarquico De Personal: </label>
									 <input type="text" class="form-control border border-dark" id="grupoJerarquicoDePersonal" name="grupoJerarquicoDePersonal" value="<?php echo $ver['grupoJerarquicoDePersonal']?>" readonly > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="argumentoDePuestos">Argumento de Puestos: </label>
									 <input type="text" class="form-control border border-dark" id="argumentoDePuestos" name="argumentoDePuestos" value="<?php echo $ver['argumentoDePuestos']?>" readonly > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="fechaInicioVigencia">Fecha Inicio de Vigencia: </label>
									 <input type="text" class="form-control border border-dark" id="fechaInicioVigencia" name="fechaInicioVigencia" value="<?php echo $ver['fechaInicioVigencia']?>" readonly > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="fechaFinalVigencia">Fecha Final de Vigencia: </label>
									 <input type="text" class="form-control border border-dark" id="fechaFinalVigencia" name="fechaFinalVigencia" value="<?php echo $ver['fechaFinalVigencia']?>" readonly > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="numDePlazas">Numero de Plazas: </label>
									 <input type="text" class="form-control border border-dark" id="numDePlazas" name="numDePlazas" value="<?php echo $ver['numDePlazas']?>" readonly > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="numDeHoras">Numero de Horas: </label>
									 <input type="text" class="form-control border border-dark" id="numDeHoras" name="numDeHoras" value="<?php echo $ver['numDeHoras']?>" readonly > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="indiceTabulador">Indice Tabulador: </label>
									 <input type="text" class="form-control border border-dark" id="indiceTabulador" name="indiceTabulador" value="<?php echo $ver['indiceTabulador']?>" readonly > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="subIndiceTabulador">Subindice Tabulador: </label>
									 <input type="text" class="form-control border border-dark" id="subIndiceTabulador" name="subIndiceTabulador" value="<?php echo $ver['subIndiceTabulador']?>" readonly > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="rfc">RFC: </label>
									 <input type="text" class="form-control border border-dark" id="rfc" name="rfc" value="<?php echo $ver['rfc']?>" readonly > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="estatus">Estatus: </label>
									 <input type="text" class="form-control border border-dark" id="estatus" name="estatus" value="<?php echo $ver['estatus']?>" readonly > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="observacionesExtras">Observaciones Extra: </label>
									 <input type="text" class="form-control border border-dark" id="observacionesExtras" name="observacionesExtras" value="<?php echo $ver['observacionesExtras']?>" readonly > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="motivoDeMovimiento">Motivo De Movimiento: </label>
									 <input type="text" class="form-control border border-dark" id="motivoDeMovimiento" name="motivoDeMovimiento" value="<?php echo $ver['motivoDeMovimiento']?>" readonly > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="usuarioEdicion">Usuario Edición: </label>
									 <input type="text" class="form-control border border-dark" id="usuarioEdicion" name="usuarioEdicion" value="<?php echo $ver['usuarioEdicion']?>" readonly > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="fechaCaptura">Fecha de Captura: </label>
									 <input type="text" class="form-control border border-dark" id="fechaCaptura" name="fechaCaptura" value="<?php echo $ver['fechaCaptura']?>" readonly > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="quincenaAplicada">Quincena Aplicada: </label>
									 <input type="text" class="form-control border border-dark" id="quincenaAplicada" name="quincenaAplicada" value="<?php echo $ver['quincenaAplicada']?>" readonly > 
					</div>
					<div class="form-group col-md-2">
							<label  class="plantilla-label" for="anio">Año: </label>
									 <input type="text" class="form-control border border-dark" id="anio" name="anio" value="<?php echo $ver['anio']?>" readonly > 
					</div>
					
		
					<br>
					<br>
					<br>
				</div>
		
		</div>

		<br>
		<!-- Modal -->
					<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
									<div class="box" >

										<label  class="plantilla-label estilo-colorg" for="laQna">¿A quien será turnado?</label>
												
												<select class="form-control border border-dark custom-select" id="user" name="user">
													<?php
													
													if (!$conexion->set_charset("utf8")) {//asignamos la codificación comprobando que no falle
													       die("Error cargando el conjunto de caracteres utf8");
													}

													$consulta = "SELECT * FROM usuarios WHERE id_rol = 1 OR id_rol = 0 OR id_rol = 7";
													$resultado = mysqli_query($conexion , $consulta);
													$contador=0;

													while($misdatos = mysqli_fetch_assoc($resultado)){ $contador++;?>
													<option value="<?php echo $misdatos["usuario"]; ?>"><?php echo $misdatos["nombrePersonal"]; ?></option>
													<?php }?>   
													<option value="autorizado">AUTORIZAR</option>
													</select>
										</div>
										 <br>  

								</div>
										</center>
											      <div class="modal-footer">

											        <button type="button" class="btn btn-secondary" data-dismiss="modal">Regresar</button>
							        				<!-- <button type="submit" onclick="quitarRequier()" class="btn btn-primary" >
							        				Aceptar
							        				 </button> -->
							        				 <input type="submit" class="btn btn-primary" onclick="quitarRequier()" name="accionB"  value="aceptar">
											      </div>
											    
											    </div>
											  </div>
								</div>
							<br>

			</form>

		</div>
						
								<div class="modal fade" id="exampleModalRT" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title" id="exampleModalLabel">Volante de rechazo</h5>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <div class="modal-body">
							         <textarea class="form-control border border-dark" id="MotivoRechazo" rows = "4" name="comentarioR" placeholder="Redactar el volante de rechazo" required></textarea>
							       
							      <div class="modal-footer">
							        <button type="button" class="btn btn-secondary" data-dismiss="modal">REGRESAR</button>
									<input type="submit" class="btn btn-primary" id="descargar" onclick="verBoton('<?php echo $usuarioSeguir ?>', '<?php echo $noFomope ?>')" name="accionB"  value="descargar">
							      </div>
							     
							    </div>
							  </div>
							</div>

				</div>


		<form method="post" name="bde" action="">
		    <div id="content" class="p-4 p-md-5 pt-5">
				<div class="formulario_qr">
						<input type="button" onclick="enviarBandejaPrincipal('<?php echo $usuarioSeguir ?>', '<?php echo $rowUser['id_rol'] ?>')" class="btn btn-primary" id="bandejaEntrada" name="accionB" style="display: none;"  value="bandeja principal">
				</div>
			</div>
		</form>
		<script src="js/bootstrap.min.js"></script>
   	<script src="js/main.js"></script>

		
		<br>
	</body>
</html>

