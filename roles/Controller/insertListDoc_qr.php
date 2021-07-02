<?php
    include "configuracion.php";
	$data = json_decode($_POST['array']);

	// var_dump($data);
	// *********************************** cambiamos el nombre completo del documento****
	$rfc = $data[0][0];
	$id_fomope = $data[0][1];
	$nombreDoc = $data[0][2];
	$usuarioSeguir = $data[0][3];
	$id_fechaHora = $data[0][4];
	$contador = 0 ; 
	$contador2 = 0 ; 
	$varRes;
	$contador = 0;

	// *****************************************consultamos en que carpeta se debe guardar 
	$sqlTipo = "SELECT * FROM fomope_qr WHERE id_movimiento_qr = '$id_fomope'";
	if($resqlTipo = mysqli_query($conexion,$sqlTipo)){
		$rowFomope = mysqli_fetch_assoc($resqlTipo);
		if($rowFomope['tipoRegistro'] =="PERSONAL DE CONFIANZA (ALTA)" OR $rowFomope['tipoRegistro'] =="PERSONAL DE CONFIANZA (BAJA)" OR $rowFomope['tipoRegistro'] =="ESTRUCTURA"){
			$carpetaRuta = './DOCUMENTOS_MOV_QR/';
		}else{
			$carpetaRuta = './DOCUMENTOS_RES/';
		}	
	}else{
		echo "ERROR AL BUSCAR EL MOVIMIENTO";
	}
	
	$sqlRolDoc = "SELECT id_docqr, documentos FROM ct_documentos_qr WHERE nombre_documento = '$nombreDoc'";
	$resRol=mysqli_query($conexion, $sqlRolDoc);
	$idDoc = mysqli_fetch_row($resRol);
	// ********************************* */ guardamos documento con el id fecha hora asignado
	$dir_subida = $carpetaRuta.$idDoc[1].'/';
	$fichero_subido = $dir_subida . basename($_FILES['nameArchivo']['name']);
	$extencion2 = explode(".",$fichero_subido);
	$tamnio = count($extencion2);
	$extencion3 = $extencion2[$tamnio-1]; //el ".pdf"
	
	if (move_uploaded_file( $_FILES['nameArchivo']['tmp_name'], $fichero_subido)) {
			$concatenarNombreC = $dir_subida.strtoupper($data[0][4]."_".$idDoc[1]."_X_X_X_X_".$data[0][4]."_.".$extencion3);
			rename ($fichero_subido,$concatenarNombreC);
	}else {
		echo "ERROR AL CARGAR DOC";
	}

	//*********************************** recorremos el arreglo y guardamos en DB tabla DOCconjunto con todos los mov. agregamos */
	foreach ($data as $value) {
		$idName = $value[4]; // el id name
		$idFomope = $value[1]; 
	
		// ********************************************** isertamos en la tabla en donde controlamos los ids
		$queryInserDoc = "INSERT INTO doc_conjunto_qr (id_fechaHora, id_movimiento_qr, rfc,curp,documento, usuarioAgrego) VALUES ('$idName', '$value[1]', '', '$value[0]','$idDoc[1]', '$usuarioSeguir') ";
		if($resQueryInserDoc = mysqli_query($conexion,$queryInserDoc)){
			//se pudo insertar registro
			$contador ++;
		}else{
			echo "No se guardo registro en doc_conjunto";
		}
		//*********************************** recorremos el arreglo y guardamos en DB en tabla FOMOPE */
		$queryUpdateFomope = "UPDATE fomope_qr SET $idDoc[1] = '$idDoc[1]' WHERE id_movimiento_qr = '$idFomope'";
		if($resQueryUpFomope = mysqli_query($conexion,$queryUpdateFomope)){
		 	//se actualiza registro fomope
			$contador2 ++;

		 }else{
		 	echo "No se ACTUALIZO movimiento";
		 }
		 $contador ++;
	}
	if ($contador > 0 && $contador2 > 0){
		// echo json_encode($resultado);
		echo $varRes = 1;
	}else{
		echo $varRes = 0;
		// echo json_encode($resultado);
	}
	// echo "<script> alert('Se guardo el documento correctamente'); window.location.href = '../guardarVista.php?usuario_rol=$usuarioSeguir'</script>";
	exit;
?>