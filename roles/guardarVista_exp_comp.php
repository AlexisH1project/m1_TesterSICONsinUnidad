
<html>
	<head>
		<meta charset="utf-8">
		<title>Guardar expediente</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/estilo_form.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

		<link href='css/jquery-ui.min.css' type='text/css' rel='stylesheet'>
		<link href='css/jquery-ui.css' type='text/css' rel='stylesheet'>

		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<script src="js/jquery-3.4.1.min.js" type="text/javascript"></script>
		<script src="js/jquery-ui.min.js" type="text/javascript"></script>
		<script src="js/jquery-ui.js" type="text/javascript"></script>
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
		  .estilo-colorg{
				font-family: Montserrat, Medium;
				font-size: 100px;
				color:  #6f7271 ;
				font-weight: bold;
			}

			.tbody {
		      display:block;
		      max-height:500px;
		      overflow-y:auto;
		  }
		  .thead, .tbody .tr {
		      display:table;
		      width:180%;
		      table-layout:fixed;
		  }
		  .thead2 {
		      width: calc( 100% - 1em )
		  } 
		  
/* ********estilos de ubicacion de los botones */
		  .button5 {border-radius: 50%;} 
		  .derecha   { float: right; }
		  .izquierda   { 
			position: static;
		   }

		   .btn_borrarName{ 
			position: absolute;
			top: 60px; left: 70px; 
		   }

		   .btn_guardar{
			position: static;
		   }
		  </style>
		<script type="text/javascript">

			// function datosSelect(opcionSelect, opcion2){
			// 		var datos = opcionSelect;
			// 		var miSelect2 = document.getElementById("movFecha");
			// 	    var aTag = document.createElement('option');
			// 	    aTag.setAttribute('value',datos);
			// 	    aTag.innerHTML = opcion2;
			// 	    miSelect2.appendChild(aTag);
			// }

// *******************************eliminar todos los datos que se reqquieran 
			function  anularReq(){
				$('#rfcL_1').removeAttr("required");
				$('#nameArchivo').removeAttr("required");
				$('#cuerpoTabla').children( 'tr' ).remove();
				
				$('#nombre').removeAttr("required");
				$('#apellido1').removeAttr("required");
				$('#apellido2').removeAttr("required");

			}

			function movTable(radioCheck,codigo, fecha, Qna, anio, unidad, doc){
				console.log(doc);
				if(doc != ""){
					const $cuerpoTabla = document.querySelector("#cuerpoTabla");
					const $tr = document.createElement("tr");
					let $tdNombre = document.createElement("td");
					$tdNombre.textContent = codigo; // el textContent del td es el nombre
					$tr.appendChild($tdNombre);
					let $tdPrecio = document.createElement("td");
					$tdPrecio.textContent = fecha;
					$tr.appendChild($tdPrecio);
					// El td del código
					let $tdCodigo = document.createElement("td");
					$tdCodigo.textContent = Qna;
					$tr.appendChild($tdCodigo);
					// El td del año
					let $tdAnio = document.createElement("td");
					$tdAnio.textContent = anio;
					$tr.appendChild($tdAnio);
					// El td de unidad
					let $tdUnidad = document.createElement("td");
					$tdUnidad.textContent = unidad;
					$tr.appendChild($tdUnidad);
					// El select
					let $tdSelect = document.createElement("td");
					var checkbox = document.createElement('input');
					checkbox.type = "checkbox";
					checkbox.name = "radioMov";
					checkbox.value = radioCheck;
					checkbox.id = "idRadioMov";
					$tr.appendChild(document.body.appendChild(checkbox));
					// Finalmente agregamos el <tr> al cuerpo de la tabla
					$cuerpoTabla.appendChild($tr);
					$("#idRadioMov").prop("checked", true);

				}
			}
// **********************************************funcion de boton para ver documentos de los movimientos encontrados
			$( document ).ready(function(){
				$(document).on('click', '.buttonDocs', function(){
					var usuario= $("#usuario_rol").val();
					window.open ('./verList.php?idMov='+this.name+'&usuario_rol='+usuario ,  '_blank'); //this.name es porque ahí guardamos el id_mov del resultado de los mov. en el botton que activa esta funcion
				});
			});
// *********************************************autocompletamos los valores del RFC 
			$(document).ready(function(){
				$(document).on('keydown', '.rfcL', function(){
					var id = this.id;
					var splitid = id.split('_');
					var indice = splitid[1];
					$('#'+id).autocomplete({
						source: function(request, response){
							$.ajax({
								url: "resultados_rfc.php",
								type: 'post',
								dataType: "json",
								data: {
									busqueda: request.term,request:1

								},
								success: function(data){
									response(data);
									
								}
							});
						},select: function (event, ui){
							$(this).val(ui.item.label);
							var buscarid = ui.item.value;
							console.log(buscarid);
							//alert(buscarid);
							$.ajax({
								url: 'resultados_rfc.php',
								type: 'post',
								data: {
									buscarid:buscarid,request:4,
									
								},
								success: function(data){
										// const select = document.querySelector("#movFecha");
										// for (let i = select.options.length; i >= 0; i--) {
										//     	select.remove(i);
										// 	}
									
									$('#cuerpoTabla').children( 'tr' ).remove();

									var infEmpleado = eval(data);
									console.log(data);
									console.log(infEmpleado[0].apellido1);
								      console.log(infEmpleado.length);

									//document.getElementById("rfc").value = infEmpleado[1] ;
									document.getElementById("apellido1").value = infEmpleado[0].apellido1 ;
									document.getElementById("apellido2").value = infEmpleado[0].apellido2 ;
									document.getElementById("nombre").value = infEmpleado[0].nombre ;
									document.getElementById("total_movs").value = infEmpleado.length;
								  for(var i=1; i < infEmpleado.length; i++){ 
								        console.log("Documento"+infEmpleado[i].doc);
									    if(infEmpleado[i].id != null){
												const $cuerpoTabla = document.querySelector("#cuerpoTabla");
												// Recorrer todos los productos
												// Crear un <tr>
												const $tr = document.createElement("tr");
												// Creamos el <td> de nombre y lo adjuntamos a tr
												let $tdNombre = document.createElement("td");
												$tdNombre.textContent = infEmpleado[i].codigo; // el textContent del td es el nombre
												$tr.appendChild($tdNombre);
												// El td de precio
												let $tdPrecio = document.createElement("td");
												$tdPrecio.textContent = infEmpleado[i].fecha;
												$tr.appendChild($tdPrecio);
												// El td del código
												let $tdCodigo = document.createElement("td");
												$tdCodigo.textContent = infEmpleado[i].qna;
												$tr.appendChild($tdCodigo);
												// El td del año
												let $tdAnio = document.createElement("td");
												$tdAnio.textContent = infEmpleado[i].anio;
												$tr.appendChild($tdAnio);
												// El td del año
												let $tdUnidad = document.createElement("td");
												$tdUnidad.textContent = infEmpleado[i].unidad;
												$tr.appendChild($tdUnidad);
												// El select
											if(infEmpleado[i].doc == null){
												
												let $tdSelect = document.createElement("td");
												var checkbox = document.createElement('input');
												checkbox.type = "checkbox";
												checkbox.name = "radioMov"+i;
												checkbox.value = infEmpleado[i].id;
												checkbox.id = "idRadioMov";
												
												$tr.appendChild(document.body.appendChild(checkbox));
												
												
												// $("#idRadioMov").prop("checked", false);
											}else{
												let $tdSelect = document.createElement("td");
												$tdSelect.textContent = "✓";
												$tr.appendChild($tdSelect);
											}
												//creamos el botton para ver los docs
												let $tdButton = document.createElement("td");
											//creamos el botton para ver los docs
												const button = document.createElement('input');
												button.type = 'button'; 
												button.innerText = 'Ver Doc.'; 
												button.name = infEmpleado[i].id;
												button.value = 'Ver Doc.';
												button.id = 'buttonDocs';
												button.className = 'buttonDocs'; 
												$tdButton.appendChild(button);
												$tr.appendChild(document.body.appendChild($tdButton));
												// Finalmente agregamos el <tr> al cuerpo de la tabla
												$cuerpoTabla.appendChild($tr);
										}else{
											// for (let i = select.options.length; i >= 0; i--) {
										    // 	select.remove(i);
											// }
											$('#cuerpoTabla').children( 'tr' ).remove();
											
										}
									}


								}
							});
							return false;
						}
					});
				});
			});
// ******************************************************Autocompletar el apellido1 
			$(document).ready(function(){
				$(document).on('keydown', '.apellido1', function(){
					var id = this.id;
					var indice = 1;
					$('#'+id).autocomplete({
						source: function(request, response){
							$.ajax({
								url: "resultados_apellido1.php",
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
								url: 'resultados_apellido1.php',
								type: 'post',
								data: {
									buscarid:buscarid,request:2
								},
								dataType: 'json',
								success:function(response){
									var len = response.length;
									if(len > 0){
										// var  = response[0]['name_p1'];
										// var unexp = response[0]['unexp'];
										// document.getElementById('unexp_'+indice).value = "ss";
									}
								}
							});
							return false;
						}
					});
				});
			});
// ******************************************************Autocompletar el apellido2
$(document).ready(function(){
				$(document).on('keydown', '.apellido2', function(){
					var id = this.id;
					var indice = 1;
					$('#'+id).autocomplete({
						source: function(request, response){
							$.ajax({
								url: "resultados_apellido2.php",
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
								url: 'resultados_apellido2.php',
								type: 'post',
								data: {
									buscarid:buscarid,request:2
								},
								dataType: 'json',
								success:function(response){
									var len = response.length;
									if(len > 0){
										// var  = response[0]['name_p1'];
										// var unexp = response[0]['unexp'];
										// document.getElementById('unexp_'+indice).value = "ss";
									}
								}
							});
							return false;
						}
					});
				});
			});

	// ******************************************************Autocompletar el NOMBRE 
	$(document).ready(function(){
				$(document).on('keydown', '.nombre', function(){
					var id = this.id;
					var indice = 1;
					$('#'+id).autocomplete({
						source: function(request, response){
							$.ajax({
								url: "resultados_nombre.php",
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
							console.log(buscarid);
							$.ajax({
								url: 'resultados_nombre.php',
								type: 'post',
								data: {
									buscarid:buscarid,request:2
								},
								dataType: 'json',
								success:function(response){
									var len = response.length;
									if(len > 0){
										// var  = response[0]['name_p1'];
										// var unexp = response[0]['unexp'];
										// document.getElementById('unexp_'+indice).value = "ss";
									}
								}
							});
							return false;
						}
					});
				});
			});


			function listaDeDoc(text, listaEnviar){
				document.getElementById("listaDoc").value = text;
				document.getElementById("guardarDoc").value = listaEnviar;
			}

			function elimRequeridos() {
				$('#rfcL_1').removeAttr("required");
				$('#nameArchivo').removeAttr("required");

				$('#cuerpoTabla').children( 'tr' ).remove();
				
				var elNombre = $('#nombre').val();
				var elApellido1 = $('#apellido1').val();
				var elApellido2 = $('#apellido2').val();

				var nombreComp = {
					"nombre" : elNombre,
					"apellido1" : elApellido1,
					"apellido2" : elApellido2,
					"query" : 1
				};

				$.ajax({
					data:  nombreComp, //datos que se envian a traves de ajax
					url:   'resultado_mov_sinExp.php', //archivo que recibe la peticion
					type:  'post', //método de envio
					success:  function (data) { //una vez que el archivo recibe el request lo procesa y lo devuelve
							var infEmpleado = eval(data);
							console.log(data);
							console.log(infEmpleado[0].apellido1);
							console.log(infEmpleado.length);

								for(var i=1; i < infEmpleado.length; i++){ 
										console.log(infEmpleado[i]);
										console.log("DOCUMENTO"+infEmpleado[i].doc);
										if(infEmpleado[i].id != null){

										// var miSelect2 = document.getElementById("movFecha");
										// var aTag = document.createElement('option');
										// aTag.setAttribute('value',infEmpleado[i].id);
										// aTag.innerHTML = "( Codigo: "+infEmpleado[i].codigo+" ) ( Fecha: "+infEmpleado[i].fecha+" ) (Qna: "+infEmpleado[i].qna+") (Año: "+infEmpleado[i].anio+" )";
										// miSelect2.appendChild(aTag);
										
										const $cuerpoTabla = document.querySelector("#cuerpoTabla");
										// Recorrer todos los productos
											// Crear un <tr>
											const $tr = document.createElement("tr");
											// Creamos el <td> de nombre y lo adjuntamos a tr
											let $tdNombre = document.createElement("td");
											$tdNombre.textContent = infEmpleado[i].codigo; // el textContent del td es el nombre
											$tr.appendChild($tdNombre);
											// El td de precio
											let $tdPrecio = document.createElement("td");
											$tdPrecio.textContent = infEmpleado[i].fecha;
											$tr.appendChild($tdPrecio);
											// El td del código
											let $tdCodigo = document.createElement("td");
											$tdCodigo.textContent = infEmpleado[i].qna;
											$tr.appendChild($tdCodigo);
											// El td del año
											let $tdAnio = document.createElement("td");
											$tdAnio.textContent = infEmpleado[i].anio;
											$tr.appendChild($tdAnio);
											// El td del unidad
											let $tdUr = document.createElement("td");
											$tdUr.textContent = infEmpleado[i].ur;
											$tr.appendChild($tdUr);
											if(infEmpleado[i].doc == null){
												// El select
												let $tdSelect = document.createElement("td");
												var checkbox = document.createElement('input');
												checkbox.type = "checkbox";
												checkbox.name = "radioMov"+i;
												checkbox.value = infEmpleado[i].id;
												checkbox.id = "idRadioMov";
												
												$tr.appendChild(document.body.appendChild(checkbox));
												
												
												// $("#idRadioMov").prop("checked", false);
											}else{
												let $tdSelect = document.createElement("td");
												$tdSelect.textContent = "✓";
												$tr.appendChild($tdSelect);
											}
											let $tdButton = document.createElement("td");
											//creamos el botton para ver los docs
											const button = document.createElement('input');
											button.type = 'button'; 
											button.innerText = 'Ver Doc.'; 
											button.name = infEmpleado[i].id;
											button.value = 'Ver Doc.';
											button.id = 'buttonDocs';
											button.className = 'buttonDocs'; 
											$tdButton.appendChild(button);
											$tr.appendChild(document.body.appendChild($tdButton));
											// Finalmente agregamos el <tr> al cuerpo de la tabla
											$cuerpoTabla.appendChild($tr);


										}else{
											// for (let i = select.options.length; i >= 0; i--) {
											// 	select.remove(i);
											// }
											$('#cuerpoTabla').children( 'tr' ).remove();
											
										}
									}
							document.getElementById("rfcL_1").value = infEmpleado[0].rfc;
					}
      			});

				// var infEmpleado = eval(data);
				// console.log(data);
				// console.log(infEmpleado[0].apellido1);
				// console.log(infEmpleado.length);
			}
		// }		
			var newList = [];
				
			function insertDoc() {
				$('#rfcL_1').removeAttr("required");
				var inputDoc=document.getElementById ("nameArchivo");
			
				var elRfc = $('#rfcL_1').val();
				var nombreArchivo = $('#nameArchivo').val();
				let radio = $('input[name="radioMov"]:checked').val();
				var usuarioCap = $('#usuario_rol').val();
				var id_fechaHora = $('#id_fechaHora').val();
		        let docSelect = $('select[name=documentoSelct]').val();
				var conteo = $('#id_conteo').val();

				console.log(docSelect);	

				if(elRfc == ""){
					console.log( radio );
					alert("RFC sin capturar");
				}else if(inputDoc.value == ""){
					alert("No se pude efectuar función ya que no existe documento adjuntado, 'BORRAR' y volver a intentar");
				}else if(radio){
					if(conteo == ""){
						conteo = 1;
						// var formData = new FormData(document.getElementById("formDoc"));
						newList = [[elRfc, radio, docSelect, usuarioCap, id_fechaHora]] ;
						// ********* ocultamos boton guardar
						$('#guardarAdj').hide();
						// ******** agregamos boton agregar
						var btn_2 = document.getElementById('aceptar');
			            btn_2.style.display = 'inline';
						

						var foo = newList.map(function(bar){
						return '<li>'+bar[0]+' </li>'
						});
						document.getElementById("resultList").innerHTML = foo;
						
					}else{
						conteo = parseInt (conteo) + 1 ;
						newList.push([elRfc, radio, docSelect, usuarioCap, id_fechaHora]);
						var foo = newList.map(function(bar){
						return '<li>'+bar[0]+' </li>'
						});
						document.getElementById("resultList").innerHTML = foo;
					}

					document.getElementById("id_conteo").value = conteo;
					console.log(conteo);
					console.log(newList);
				}else{
					alert("Movimiento no seleccionado");
				}

			}

			function  enviarList() {
					var formData = new FormData(document.getElementById("formDoc"));
					formData.append('array',  JSON.stringify(newList));
					$.ajax({
							// data:  {'array': JSON.stringify(newList)}, //datos que se envian a traves de ajax
							url:   'Controller/insertListDoc.php', //archivo que recibe la peticion
							type:  'post', //método de envio
							data: formData,
							cache: false,
							contentType: false,
							processData: false,
							success:  function (data) { //una vez que el archivo recibe el request lo procesa y lo devuelve
									// var infEmpleado = eval(data);
									console.log(data);
									if(data == 1){
										alert("Se ha guardado correctamente.");
										window.location.href = './guardarVista.php?usuario_rol='+newList[0][3];
									}else{
										alert("Salir de esta página, surgió un error");
									}
									
							}
						});

			}

			function borrarNombre() {
				document.getElementById("rfcL_1").value = "";
				document.getElementById("apellido1").value = "";
				document.getElementById("apellido2").value = "";
				document.getElementById("nombre").value = "" ;
			}
		</script>
	</head>
	<body>

	<?php 
		include "configuracion.php";
				$usuarioSeguir = $_GET['usuario_rol'];

			$sqlNombre = "SELECT nombrePersonal, id_rol FROM usuarios WHERE usuario = '$usuarioSeguir'";
			$result = mysqli_query($conexion,$sqlNombre);
			$nombreU = mysqli_fetch_row($result);

			//----------------Sacamos la Hora / esto para que lo mandemos por ajax en un input para la carga de documentos con lista 
			$hoy = "select CURDATE()"; 
			$tiempo ="select curTime()";

				 if ($resultHoy = mysqli_query($conexion,$hoy) AND $resultTime = mysqli_query($conexion,$tiempo)) {
						 $row = mysqli_fetch_row($resultHoy);
						 $row2 = mysqli_fetch_row($resultTime);
				 }
				 $hora = str_replace ( ":", '',$row2[0] ); 
				 $fecha = str_replace ( "-", '',$row[0] ); 
				 $id_fechaHora = $fecha.$hora;
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
	            <a href= <?php echo ("'./menuPrincipal.php?usuario_rol=$usuarioSeguir'");?>><img src="./img/iclogin.png" alt="x" height="17" width="17"/><?php echo (" $nombreU[0]"); ?></span></a>
	          </li>
	      </center>
		  <br>
	          <br>
	          <li class=" estilo-color">
	              <a href= <?php echo ("'./consultaEstado.php?usuario_rol=$usuarioSeguir'");?>><img src="./img/ic-consulta.png" alt="x" height="17" width="17"/> Consulta</a>
	          </li>
	          
	          <br>
	          <br>
	          <br>
	          <br>
	          <br>
	          <br>
	          <br>
	          <br>
	          <br>
	          <br>
	          <li class=" estilo-color">
	              <a class="nav-link" href=  "../LoginMenu/vista/cerrarsesion.php" ><img src="./img/iclogout.png" alt="x" height="17" width="17"/> Cerrar Sesión</a>
	          </li>
	          
	          </li>
	          <li class=" estilo-color">
             
	          </li>

			
	        </ul>

	       <!-- <div class="mb-5">
						<h3 class="h6 mb-3">Subscribe for newsletter</h3>
						<form action="#" class="subscribe-form">
	            <div class="form-group d-flex">
	            	<div class="icon"><span class="icon-paper-plane"></span></div>
	              <input type="text" class="form-control" placeholder="Enter Email Address">
	            </div>
	          </form>
					</div>-->

	        <!--<div class="footer">
	        	<p>Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0.
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
						  Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0.</p>
	        </div>-->

	      </div>
    	</nav>



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
		
		<center>			
				<h3>Sistema para guardar archivos digitales .PDF</h3>
				<br>
				<h5>DIPSP</h5>

				<?php
					if(isset($_POST["listaDoc"])){ 
						$listaMostrar = $_POST["listaDoc"];
					}else{
						$listaMostrar = "";
					}

				?>
			
			<form enctype="multipart/form-data" method="post" id="formDoc" action=""> 
				
				<div class="rounded border border-dark plantilla-inputv text-center">
					<div class="form-row">
						<div class="col">
								<label  class="plantilla-label" for="arch">NOMBRE DOC: </label>
								<input type="text"  type="text" class="form-control border border-dark" name="documentoSelct"  value="<?php if(isset($_POST["documentoSelct"])){ echo "Expediente Completo";}else{ echo "Expediente Completo";} ?>" readonly>
								
								<br>
								<br>
								<br>
						<label  class="plantilla-label" for="archivo_1">Adjuntar un archivo</label>
						    <!--  <input type="hidden" name="MAX_FILE_SIZE" value="30000" /> -->
						<input type="file" id="nameArchivo" name="nameArchivo" required>
						<br><br><br>
						<div class="md-form md-0">
								<label  class="plantilla-label" for="arch">Movimientos: </label>
								
								<!-- <select class="form-control border border-dark" id="movFecha" name="movFecha">
									
								</select> -->

								<table class="table table-striped">
									<thead>
										<tr>
											<th>Cod. Mov </th>
											<th>Fecha</th>
											<th>Qna</th>
											<th>Año</th>
											<th>Unidad</th>
											<th>*</th>
											<th>
											
											</th>
										</tr>
									</thead>
									<tbody id="cuerpoTabla">
									
									</tbody>
								</table>
							</div>
							<br><br><br>
							<div class="col text-center">
							
							<div class="columnaBoton">	
								 <input type="submit" id= "guardarAdj" name="guardarAdj" class="btn_guardar btn btn btn-danger tamanio-button plantilla-input text-white bord" value="Guardar"><br> 
								 <br>
								 <input type="submit" class="izquierda btn btn-secondary" onclick= "anularReq();" name="borrar" value="Borrar">
								 <input type="button" id= "aceptar" name="aceptar" style="display:none" onclick="enviarList();" class="btn btn btn-danger tamanio-button plantilla-input text-white bord" value="Aceptar">
							</div>
							
							</div>
						</div>
						
						<div class="col">
							<div class="form-group col-md-12">
								<label class="plantilla-label" for="elRfc">*RFC:</label>
								
								<input type="text"  type="text" class="form-control rfcL border border-dark" id="rfcL_1" name="rfcL_1" placeholder="RFC" value="<?php if(isset($_POST["rfcL_1"])){ echo $_POST["rfcL_1"];} ?>"  onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Ingresa rfc" maxlength="13"  required>
							</div>
		
							<input type="text" style="display:none;" class="form-control border border-dark" id="listaDoc" name="listaDoc" placeholder="Apellido Paterno" value="<?php if(isset($_POST["listaDoc"])){ echo $_POST["listaDoc"];} ?>" >
							<input type="text" class="form-control" id="guardarDoc" name="guardarDoc" value="<?php if(isset($_POST["guardarDoc"])){ echo $_POST["guardarDoc"];} ?>" style="display:none">
							<div class="form-group col-md-12">
							<br><br><br><br><br><br>
						
					</div>
						</div>
						
						<div class="col">
							<input type="text" class="form-control border border-dark" id="usuario_rol" name="usuario_rol" style="display:none" value="<?php  echo $usuarioSeguir; ?>" >
							<input type="text" class="form-control border border-dark" id="id_fechaHora" name="id_fechaHora" style="display:none" value="<?php  echo $id_fechaHora; ?>" >
							<input type="text" class="form-control border border-dark" id="id_conteo" name="id_conteo" style="display:none" value="" >

				  			<div class="col">
				  			<label  class="plantilla-label" for="nombreT">NOMBRE COMPLETO: </label>

						   <div class="form-group col-md-12">
						        <input type="text" class="form-control apellido1 border border-dark" id="apellido1" name="apellido1" placeholder="Apellido Paterno" value="<?php if(isset($_POST["apellido1"])){ echo $_POST["apellido1"];} ?>" maxlength="30"required>
						      </div>
						    </div>

						    <div class="col">
						     <div class="form-group col-md-12">
						        <input type="text" class="form-control apellido2 border border-dark" id="apellido2" name="apellido2" placeholder="Apellido Materno" value="<?php if(isset($_POST["apellido2"])){ echo $_POST["apellido2"];} ?>" maxlength="30"required>
						      </div>
						    </div>

						    <div class="col">
						     <div class="form-group col-md-12">
						        <input type="text" class="form-control nombre border border-dark" id="nombre" name="nombre" placeholder="Nombre" maxlength="40" value="<?php if(isset($_POST["nombre"])){ echo $_POST["nombre"];} ?>" required>
						      </div>
						    </div>
							<input type="button" name="buscar_sinRfc" onclick= "elimRequeridos();" class="btn btn-outline-light button5" value="buscar por nombre"><br> 
							<input type="hidden" name="total_movs" id="total_movs">
						    <div class="form-group">
						    

							<div class="col">
							<div class="md-form md-0">
							
							<br><br><br>
							<div id="resultList"class="modal-body">
							       
							</div>
							 <br><br><br><br>
							<!--<input type="button" name="agregarMovList" onclick= "insertDoc();" class="btn btn btn-secondary button5" value="+"><br>  -->
							<br><br><br><br>	
							<input type="button" name="borrarName" onclick= "borrarNombre();" class="btn btn btn-secondary btn_borrarName" value="Borrar Nombre"><br> 
							
						</div>


						  </div>
						</div>
					</div>		
				</div>
			
				<!-- <div class="col-sm-12">
					<div class="form-row">

					<div class="form-group col-md-12">
						<div class="col text-center">
							 <input type="submit" name="guardarAdj" class="btn btn-outline-info tamanio-button" value="Guardar"><br> 
						</div>
					</div>

					</div>
				</div> -->


			</form>

								
			</form>
		</div>
		<?php
							$arrayView = explode("_", $listaMostrar);
												 $tamanio = count($arrayView);
												if($tamanio > 1 ){
												echo '
													<div class="form-group col-md-12 estilo-colorn" >	
					  									<label for="existe">Existen Documentos adjuntos. </label>
													</div>

												';	
												}
							$banderaBoton = 0;

if(isset($_POST['guardarAdj'])){
					
									$nombre = strtoupper($_POST['nombre'] );
									$elRfc =  strtoupper($_POST['rfcL_1']);
									$elApellido1 = strtoupper ($_POST['apellido1']);
									$elApellido2 = strtoupper ($_POST['apellido2']);
									$eltotalMovs = $_POST['total_movs'];
									$nombreArch = "doc67";
									$listaCompleta = $_POST['listaDoc'];
									$concatenarNombDoc = $_POST['guardarDoc'];
									$optionSelec[0] = 0;
									$bandera = 0;
									$file_name_ruta = $_FILES['nameArchivo']['tmp_name'];
									$file_archivo_name = $_FILES['nameArchivo']['name'];
									// echo $nombreArch;
									for ($i=1; $i < $eltotalMovs ; $i++) { 
										if(isset($_POST['radioMov'.$i])){
											$optionSelec[$i] = $_POST['radioMov'.$i];
											$bandera = 1; 	
										}else{
											$optionSelec[$i] = "x";
										}
									}
									//echo "select:  ".$optionSelec;
									$banderaBoton = 1;
	if($bandera == 0){
		$banderaBoton = 0;
		echo "<script> alert('No se guardo documento, por no seleccionar automaticamente el movimiento del personal ya previamente registrado '); </script>";
	}else if($optionSelec == "undefined"){
		$banderaBoton = 0;
		echo "<script> alert('No se guardo documento, por no seleccionar automaticamente el movimiento del personal ya previamente registrado '); </script>";
	}else{	
	         //------Buscamos los datos para mostrar en el select y mandar a la funcion en JS para poder cargar solo ese dato
        							// $consulta = "SELECT id_movimiento, codigoMovimiento, vigenciaDel, anio, qnaDeAfectacion, unidad, doc67 FROM fomope WHERE id_movimiento='$optionSelec'";
        							// if($resultSelect = mysqli_query($conexion, $consulta)){
        							// 	$rowSelect = mysqli_fetch_row($resultSelect);
        							// 	$opcionCompleta  = "( Codigo: ".$rowSelect[1]." ) ( Fecha: ".$rowSelect[2]." ) (Qna: ".$rowSelect[4].") (Año: ".$rowSelect[3]." )";
        							// 	//echo $opcionCompleta;
        							// }else{ echo "errror";}
					for ($z=1; $z < $eltotalMovs; $z++) { 

									 $hoy = "select CURDATE()";

									 if ($resultHoy = mysqli_query($conexion,$hoy)) {
									 		$row2 = mysqli_fetch_row($resultHoy);
									 }
									 $numEliminado = explode("-", $row2[0]);
									 $numEliminado = $numEliminado[0].$numEliminado[1].$numEliminado[2];

									$nombreCompletoArch = $nombreArch."_".$listaCompleta;
									// consultamos para saber el id y el nombre corto del nombre 
									$sqlRolDoc = "SELECT id_doc, documentos FROM m1ct_documentos WHERE documentos = '$nombreArch'";
										$resRol=mysqli_query($conexion, $sqlRolDoc);
										$idDoc = mysqli_fetch_row($resRol);
									$enviarDoc = $idDoc[1].'_'.$concatenarNombDoc;

									$dir_subida = './Controller/DOCUMENTOS_MOV/'.$idDoc[1].'/';
									
									//guardamos el archivo que se selecciono en la carpeta 
										$fichero_subido = $dir_subida . basename($file_archivo_name);
											$extencion2 = explode(".",$fichero_subido);
											$tamnio = count($extencion2);

											$extencion3 = $extencion2[$tamnio-1]; //el ".pdf"
			//----------------Sacamos la Hora 
											$hoy = "select CURDATE()";
											$tiempo ="select curTime()";

												 if ($resultHoy = mysqli_query($conexion,$hoy) AND $resultTime = mysqli_query($conexion,$tiempo)) {
												 		$row = mysqli_fetch_row($resultHoy);
												 		$row2 = mysqli_fetch_row($resultTime);
												 }
												 $hora = str_replace ( ":", '',$row2[0] ); 
												 $fecha = str_replace ( "-", '',$row[0] ); 
			// -------------- Guardamos archivo en carpeta		
										if($optionSelec[$z] == "x") {
											continue; 
										}else{
											$valor_array_select = $optionSelec[$z];
											// sleep(3);
											if (copy($file_name_ruta, $fichero_subido)) {
												// echo "El two valor seria el siguiente: " . $optionSelec[$z];
												// echo "num::: " . $eltotalMovs;

													$concatenarNombreC = $dir_subida.strtoupper($elRfc."_".$idDoc[1]."_".$elApellido1."_".$elApellido2."_".$nombre."_".$fecha.$hora."_".$valor_array_select."_.".$extencion3);
													rename ($fichero_subido,$concatenarNombreC);

													$arrayDoc = explode("_", $nombreCompletoArch);
												 	$tamanioList = count($arrayDoc);

													$queryHistorial = "INSERT INTO historial (id_movimiento, usuario, fechaMovimiento, horaMovimiento, accion, documento) VALUES ('$valor_array_select', '$usuarioSeguir', '$row[0]', '$row2[0]', 'up doc', '$idDoc[1]')";
													$resultH = mysqli_query($conexion,$queryHistorial);	
											
													$arrayNumDoc = explode("_", $enviarDoc);		
													$numeroDeDocs = count($arrayNumDoc);	
										?>
										<!-- ***************************************************************************************** -->	

							
							<!-- ***************************************************************************************** -->	

										<?php													
											} else{
											    echo "<script> alert('Existe un error al guardar el archivo'); </script> ";
											}
										}
								} // termina for array 
								
							} // fin del else  para guardar docs
								// $arrayDoc = explode("_", $enviarDoc) ;
								//actualizamos la base para poder tener el registro de los documentos
								include "./configuracion.php";
								$usuarioSeguir = $_GET['usuario_rol'];

								 $hoy = "select CURDATE()";

								 if ($resultHoy = mysqli_query($conexion,$hoy)) {
								 		$rowHoy = mysqli_fetch_row($resultHoy);
								 }
								 for ($i=1; $i < $eltotalMovs ; $i++) { 
									 $id_selec = $optionSelec[$i];
									if(	$id_selec != "x"){
										$sqlAgregar = "UPDATE fomope SET doc67 = 'doc67', usuarioAdjuntarDoc = '$usuarioSeguir $rowHoy[0]'  WHERE id_movimiento = '$id_selec'";
										if ($resUpdate = mysqli_query($conexion, $sqlAgregar)){
	
										}else{
											echo "<script> alert ('error');</script>";
										}
									}
								}

					?>
						<table class="table table-striped table-bordered tbody thead2 tr" style="margin-bottom: 0">

								<?php 
									include "configuracion.php";
									$existenD =0;
								////////////// inicia la busqueda del archivo en carpeta 
								$dir_subida = './Controller/DOCUMENTOS_MOV/';
								// Arreglo con todos los nombres de los archivos

								$sqlReg =  "SELECT COUNT(*) id_doc FROM m1ct_documentos";
												$resTotalReg = mysqli_query($conexion,$sqlReg);
												$rowTotal = mysqli_fetch_row($resTotalReg);
								for ($i = 0; $i < $rowTotal[0] ; $i++){
								$sqlNombreDoc2 = "SELECT * FROM m1ct_documentos WHERE id_doc = '$i'";
												$resNombreDoc2 = mysqli_query($conexion,$sqlNombreDoc2);
												$rowNombreDoc2 = mysqli_fetch_row($resNombreDoc2);
									$imprime = 0;

								if($imprime == 0 AND $rowNombreDoc2[2] == "doc67" ){ //OR $rowNombreDoc2[2] == "doc68"
										echo "
														<tr>
														<td>$rowNombreDoc2[1]</td>
														<td>";
										//$contDoc++;

								?>

								<?php	

										if($banderaBoton == 1){
												for ($j=0; $j < $numeroDeDocs ; $j++) { 	
													
													if($rowNombreDoc2[2] == $arrayNumDoc[$j] ){  //strtolower($documentoPC[$j])::: strtolower hacemos muscualas porque recibe de la pc mayusculas y en la base es "doc"
															
											
								?>
														<button class="btn btn-success" > ✔ </button>
														</td>
																
								<?php
														break;
													}else if($j == $numeroDeDocs-1){
								?>
														<button class="btn btn-danger" > X </button>
														</td>
								<?php						
													}
												}
											}else{

								?>
														<button class="btn btn-danger" > X </button>
														</td>

								<?php
											}
									}
								}
								?>



								</table>

				<?php

	} // fin del ISSET
		

					if(isset($_POST['borrar'])){
						$usuarioSeguir = $_GET['usuario_rol'];
							//session_destroy();
		   	  				echo "<script type='text/javascript'>javascript:window.location='./guardarVista_exp_comp.php?usuario_rol=$usuarioSeguir'</script>";  //=$usuarioE
					}

						?>	

	</div>
		<br>
			
	</center>

			
<script src="js/bootstrap.min.js"></script>
   	<script src="js/main.js"></script>
			
	</body>

</html>

