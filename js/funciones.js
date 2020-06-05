

function agregaform(datos){

	d=datos.split('||');
	var parametros = { "val1" :  d[1]};
	//val1 = $('#claveFomopes').val(d[1]);
	//$('#nombreu').val
 	window.location.href = 'form_FOMOPE'.$d[2].'.php?noFomope='+d[1];


}
