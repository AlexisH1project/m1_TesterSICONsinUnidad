

function esClabeInter(idInput) {
	document.getElementById(idInput).addEventListener('keydown', function(event) {
    // if (event.keyCode == 13) {
      //document.getElementById(inputS).focus();
      	var clabeB = document.forms["ffomope"]["clabe_inter"].value;
		console.log(clabeB);
    // }
 	 });
	
	//var clabeB = document.getElementById("clabe_inter").value;
	/*var clabeB = document.forms["ffomope"]["clabe_inter"].value;
	console.log(clabeB);*/
}


function accionesRolL(datos){
//0 , 1 , 2, 3 ...   son los numeros para identificar a que pagina ir 
	d=datos.split('||');
	//var parametros = { "val1" :  d[1]};

	if(d[2] == '0'){
		//document.body.innerHTML += '<form id="dynForm" action="./verdeLulu.php" method="post"><input type="hidden" name="noFomope" value="'+d[1]+'"></form>';
		window.location.href = 'verdeLulu.php?usuario_rol='+d[1]+'&id_mov='+d[0];
//		document.getElementById("dynForm").submit();

 	}else if(d[2] == '1'){
		window.location.href = 'negroEditar.php?usuario_rol='+d[1]+'&id_mov='+d[0];
 		//document.body.innerHTML += '<form id="dynForm" action="./form_FOMOPEAnalista.php" method="post"><input type="hidden" name="noFomope" value="'+d[1]+'"></form>';
		//document.getElementById("dynForm").submit();
 		// window.location.href = 'form_FOMOPEAnalista.php?noFomope='+d[1];
 	}else if(d[2] == '2'){
		window.location.href = 'grisEditar.php?usuario_rol='+d[1]+'&id_mov='+d[0];
 		//document.body.innerHTML += '<form id="dynForm" action="./form_FOMOPEAnalista.php" method="post"><input type="hidden" name="noFomope" value="'+d[1]+'"></form>';
		//document.getElementById("dynForm").submit();
 		// window.location.href = 'form_FOMOPEAnalista.php?noFomope='+d[1];
 	}else if(d[2] == '3'){
		window.location.href = 'verAmarillo0.php?usuario_rol='+d[1]+'&id_mov='+d[0];
 		//document.body.innerHTML += '<form id="dynForm" action="./form_FOMOPEAnalista.php" method="post"><input type="hidden" name="noFomope" value="'+d[1]+'"></form>';
		//document.getElementById("dynForm").submit();
 		// window.location.href = 'form_FOMOPEAnalista.php?noFomope='+d[1];
 	}else if(d[2] == '4'){
		window.location.href = 'verVerde2.php?usuario_rol='+d[1]+'&id_mov='+d[0];
 		//document.body.innerHTML += '<form id="dynForm" action="./form_FOMOPEAnalista.php" method="post"><input type="hidden" name="noFomope" value="'+d[1]+'"></form>';
		//document.getElementById("dynForm").submit();
 		// window.location.href = 'form_FOMOPEAnalista.php?noFomope='+d[1];
 	}else{
 		document.body.innerHTML += '<form id="dynForm" action="./form_FOMOPEAutorizador.php" method="post"><input type="hidden" name="noFomope" value="'+d[1]+'"></form>';
		document.getElementById("dynForm").submit();
 		// window.location.href = 'form_FOMOPEAutorizar.php?noFomope='+d[1];
 	}

}


function accionesRolD(datos){
//0 , 1 , 2, 3 ...   son los numeros para identificar a que pagina ir 
	d=datos.split('||');
	//var parametros = { "val1" :  d[1]};

	
	if((d[3] == "4" && d[1] == "cafe")){
		window.location.href = 'form_FOMOPEAnalista.php?noFomope='+d[0]+'&usuario='+d[2]+'&id_rol='+d[3];
 		//document.body.innerHTML += '<form id="dynForm" action="./form_FOMOPEAnalista.php" method="post"><input type="hidden" name="noFomope" value="'+d[1]+'"></form>';
		//document.getElementById("dynForm").submit();
 		// window.location.href = 'form_FOMOPEAnalista.php?noFomope='+d[1];
 	}else if(d[3] == "4" && d[1] == "amarillo0"){
		window.location.href = 'verAmarillo0.php?usuario_rol='+d[2]+'&id_mov='+d[0];
 		//document.body.innerHTML += '<form id="dynForm" action="./form_FOMOPEAnalista.php" method="post"><input type="hidden" name="noFomope" value="'+d[1]+'"></form>';
		//document.getElementById("dynForm").submit();
 		// window.location.href = 'form_FOMOPEAnalista.php?noFomope='+d[1];
 	}else if(d[3] == "4" && d[1] == "verde2"){
		window.location.href = 'verVerde2.php?usuario_rol='+d[2]+'&id_mov='+d[0];
 		//document.body.innerHTML += '<form id="dynForm" action="./form_FOMOPEAnalista.php" method="post"><input type="hidden" name="noFomope" value="'+d[1]+'"></form>';
		//document.getElementById("dynForm").submit();
 		// window.location.href = 'form_FOMOPEAnalista.php?noFomope='+d[1];
 	}else if(d[3] == "4" && d[1] == "azul"){
		window.location.href = 'autorizaDario.php?usuario='+d[2]+'&noFomope='+d[0]+'&id_rol='+d[3];
 		//document.body.innerHTML += '<form id="dynForm" action="./form_FOMOPEAnalista.php" method="post"><input type="hidden" name="noFomope" value="'+d[1]+'"></form>';
		//document.getElementById("dynForm").submit();
 		// window.location.href = 'form_FOMOPEAnalista.php?noFomope='+d[1];
 	}else if(d[3] == "4" && d[1] == "naranja"){
		window.location.href = 'autorizaDario.php?usuario='+d[2]+'&noFomope='+d[0]+'&id_rol='+d[3];
 		//document.body.innerHTML += '<form id="dynForm" action="./form_FOMOPEAnalista.php" method="post"><input type="hidden" name="noFomope" value="'+d[1]+'"></form>';
		//document.getElementById("dynForm").submit();
 		// window.location.href = 'form_FOMOPEAnalista.php?noFomope='+d[1];
 	}else if(d[3] == "4" && d[1] == "guinda"){
		window.location.href = 'fomopeFinal.php?usuario='+d[2]+'&noFomope='+d[0]+'&id_rol='+d[3];
 		//document.body.innerHTML += '<form id="dynForm" action="./form_FOMOPEAnalista.php" method="post"><input type="hidden" name="noFomope" value="'+d[1]+'"></form>';
		//document.getElementById("dynForm").submit();
 		// window.location.href = 'form_FOMOPEAnalista.php?noFomope='+d[1];
 	}else{
 		document.body.innerHTML += '<form id="dynForm" action="./form_FOMOPEAutorizador.php" method="post"><input type="hidden" name="noFomope" value="'+d[1]+'"></form>';
		document.getElementById("dynForm").submit();
 		// window.location.href = 'form_FOMOPEAutorizar.php?noFomope='+d[1];
 	}

}


function agregaform(datos){

	d=datos.split('||');
	var parametros = { "val1" :  d[1]};

	if(d[2] == '0'){
		document.body.innerHTML += '<form id="dynForm" action="./luluCaptura.php" method="post"><input type="hidden" name="usuario" value="'+d[1]+'"></form>';
		document.getElementById("dynForm").submit();

 	}else if(d[2] == '1'){
 		//document.body.innerHTML += '<form id="dynForm" action="./form_FOMOPEAnalista.php" method="post"><input type="hidden" name="noFomope" value="'+d[1]+'"></form>';
		//document.getElementById("dynForm").submit();
 		window.location.href = 'form_FOMOPE.php?noFomope='+d[0]+'&usuario='+d[1]+'&id_rol=3';
 	}else if(d[2] == '2'){
 		//document.body.innerHTML += '<form id="dynForm" action="./form_FOMOPE.php" method="post"><input type="hidden" name="noFomope" value="'+d[0]+'"></form>';
		//document.getElementById("dynForm").submit();
 		window.location.href = 'form_FOMOPE.php?noFomope='+d[0]+'&usuario='+d[1]+'&id_rol='+d[2];
 	}else if(d[2] == '3'){
 		//document.body.innerHTML += '<form id="dynForm" action="./form_FOMOPEAnalista.php" method="post"><input type="hidden" name="noFomope" value="'+d[0]+'" & name="id_rol" value="'+d[1]'"></form>';
		//document.getElementById("dynForm").submit();
 		window.location.href = 'form_FOMOPEAnalista.php?noFomope='+d[0]+'&usuario='+d[1]+'&id_rol='+d[2];
 	}else if(d[2] == '4'){
 		//document.body.innerHTML += '<form id="dynForm" action="./editarAnalista.php" method="post"><input type="hidden" name="noFomope" value="'+d[0]+'"></form>';
		//document.getElementById("dynForm").submit();
		window.location.href = 'editarAnalista.php?noFomope='+d[0]+'&usuario='+d[1]+'&id_rol='+d[2]; 
	}else if(d[2] == '5'){
 		//document.body.innerHTML += '<form id="dynForm" action="./editarAnalista.php" method="post"><input type="hidden" name="noFomope" value="'+d[0]+'"></form>';
		//document.getElementById("dynForm").submit();
		window.location.href = 'editarAnalista.php?noFomope='+d[0]+'&usuario='+d[1]+'&id_rol='+d[2]; 
	}else if(d[2] == '6'){
 		//document.body.innerHTML += '<form id="dynForm" action="./editarAnalista.php" method="post"><input type="hidden" name="noFomope" value="'+d[0]+'"></form>';
		//document.getElementById("dynForm").submit();
		window.location.href = './Controller/autorizarNomina.php?noFomope='+d[0]+'&usuario='+d[1]; 
	}else{

 		document.body.innerHTML += '<form id="dynForm" action="./verdeLulu.php" method="post"><input type="hidden" name="noFomope" value="'+d[1]+'"></form>';
		document.getElementById("dynForm").submit();

 	}


}

function bajaf(datos){

	var d=datos;
	

	  window.location.href = 'capturaBaja.php?usuario_rol='+d;
}

function agregaf(datos){

	var d=datos;
	

	  window.location.href = 'blancoLulu.php?usuario_rol='+d;
}

function conteoQr(datos){
	var d=datos;
	

	  window.location.href = 'conteoQr.php?usuario_rol='+d;
}

function agregafo(datos){

	var d=datos;
	

	  window.location.href = 'form_FOMOPE.php?usuario_rol='+d;
}
function agregarfo(datos){
	var d=datos;
	window.location.href = 'agregar_FOMOPE.php?noFomope='+d;
}

function nobackbutton(){
			   window.location.hash="no-back-button";
			   window.location.hash="Again-No-back-button" //chrome
			   window.onhashchange=function(){window.location.hash="no-back-button";}
			}

function verDatosQr(movimiento, elUsuario){
	var m = movimiento;
	window.location.href = 'qrEditar.php?noFomope='+m+'&usuario='+elUsuario;
}

// -----> mando a llamar de qrEditar.php en roles
function reenviarDatos(movimiento, elUsuario){
	var m = movimiento;
	var cod = document.getElementById("user").value;
	window.location.href = './Controller/guardarAsignacion.php?noFomope='+m+'&usuario='+elUsuario+'&usuarioAsignado='+cod;	
}
function aceptarQr(movimiento, elUsuario){
	var m = movimiento;
	var cod = document.getElementById("user").value;
	window.location.href = './Controller/autorizarQr.php?noFomope='+m+'&usuario='+elUsuario+'&usuarioAsignado='+cod;	
}
// -----> mando a llamar de qrEditar.php en roles
function enviarBandejaPrincipal(userLogin){
	window.location.href = './LuluEventuales.php?usuario_rol='+userLogin;
}

// mandamos a llamarlo desde la pagina consultaEstado.php
function guardarId(id){
	//document.getElementById("idMovHistorial").value = id;
    console.log(id);
   $.ajax({ 
         url: 'Controller/envioID.php', 
         type: 'POST', 
         data: { val: id }
        }).done( function(info){
        	$("#exampleModal1 .modal-body").html(info);
        	//$("#exampleModal1 .modal-body").modal("show");
        }); 
}