

function agregaform(datos){

	d=datos.split('||');
	var parametros = { "val1" :  d[1]};
	//val1 = $('#claveFomopes').val(d[1]);
	//$('#nombreu').val
 	window.location.href = 'form_FOMOPE'.$d[2].'.php?noFomope='+d[1];


}

function imprimirF(datos2){

	d=datos2.split('||');
	//var parametros = { "val1" :  d[1]};
	//val1 = $('#claveFomopes').val(d[1]);
	//$('#nombreu').val
 	window.location.href = 'autorizador.php';


}
