<?php 
						include "configuracion.php";

							$from = '\\\\PWIDGRHOSISFO01\\Archivos2\\';
							$from2 = '\\\\PWIDGRHOSISFO01\\pdfs2\\';
							$to = './DOCUMENTOS_MOV_QR/FMP/';

							$elCurp = $_GET['curp'];
							$elRfc = $_GET['rfc'];
							$usuarioSeguir = $_GET['usuario'];
							$checkDestino = 0;
							if(isset($_GET['destino'])){  // no siempre se envia este dato, es por eso que se pone isset 
							 	$checkDestino = $_GET['destino'];
							}
// **************** vamos a seleccionar la qna y la fecha para asignar los mismos datos los documentos que detectemos y si son iguales solo remplazarlos y si no guardar el doc
							
							$queryMax = "SELECT * FROM conteo_qr WHERE curp = '$elCurp' ORDER BY id_cont DESC";
							if($resqueryMax = mysqli_query($conexion,$queryMax)){
								if($rowqueryMax = mysqli_fetch_row($resqueryMax)){
									$fecha = str_replace ( "-", '',$rowqueryMax[2]);
									$laQna = $rowqueryMax[5];
								}
							}
// *****************************terminamos

							if(file_exists($from2.$elRfc.".pdf")){
									copy($from2.$elRfc.".pdf" , $to.$elCurp."_FMP_".$laQna."_".$fecha.".PDF");
									showFiles($from,$elCurp,$fecha, $laQna); //enviamos la direccion y el curp
							}
								$sqlRol = "SELECT id_rol FROM usuarios WHERE usuario = '$usuarioSeguir'";
								if ($resR = mysqli_query($conexion,$sqlRol) ){
									$rowRol = mysqli_fetch_row($resR);
											if($checkDestino == 1){ // si se envia de una pagina en especial la lista de documentos
												echo "<script> alert('Volver a consultar el movimiento para verificar si ya existen los documentos correspondientes'); window.location.href = '../consultaEstado.php?usuario_rol=$usuarioSeguir'</script>";
											}elseif($rowRol[0] == 1){
												echo "<script> alert('Volver a consultar el movimiento para verificar si ya existen los documentos correspondientes'); window.location.href = '../LuluEventuales.php?usuario_rol=$usuarioSeguir'</script>";
											}elseif($rowRol[0] == 2){
												echo "<script> alert('Volver a consultar el movimiento para verificar si ya existen los documentos correspondientes'); window.location.href = '../analista.php?usuario_rol=$usuarioSeguir'</script>";
											}elseif($rowRol[0] == 3){
												echo "<script> alert('Volver a consultar el movimiento para verificar si ya existen los documentos correspondientes'); window.location.href = '../capturistaTostado.php?usuario_rol=$usuarioSeguir'</script>";
											}
									
								}

		//---> Funcion recurciba la cual nos ayuda a extraer los documentos de varias carpetas contenidas de una direccion inicial. Esta funcion solo se activa una vez al final del codigo
		function showFiles($from, $curp, $generarID, $laQna){
			set_time_limit(3600);
			include "configuracion.php";
			//$to = '../roles/Controller/DOCUMENTOS_RES/';
			//$to = './SICON/'.$nameCarpetaOTRO[1];
			//$to = './Controller/DOCUMENTOS_RES/'.$nameCarpetaOTRO[1];
			$nameCarpetaOTRO= explode("\\Archivos2\\", $from);
			$to = './DOCUMENTOS_MOV_QR/';

			$sqlCarpDocs = "SELECT * FROM ct_documentos_qr";
			$conectar = mysqli_query($conexion, $sqlCarpDocs);
			while($rowCarpDocs=mysqli_fetch_row($conectar)){ 
				if(file_exists($from.$rowCarpDocs[2]."\\".$curp."_".$rowCarpDocs[2].".PDF")){
					if($rowCarpDocs[2] == "ACTA" OR	$rowCarpDocs[2] == "BAN" OR	$rowCarpDocs[2] == "CED" OR	$rowCarpDocs[2] == "CONS" OR $rowCarpDocs[2] == "CURP" OR $rowCarpDocs[2] == "IDE" OR $rowCarpDocs[2] == "RFC"){
						copy($from.$rowCarpDocs[2]."\\".$curp."_".$rowCarpDocs[2].".PDF", $to.$rowCarpDocs[2]."/".$curp."_".$rowCarpDocs[2]."_0_X.PDF");
					}else {
						copy($from.$rowCarpDocs[2]."\\".$curp."_".$rowCarpDocs[2].".PDF", $to.$rowCarpDocs[2]."/".$curp."_".$rowCarpDocs[2]."_".$laQna."_".$generarID.".PDF");
					}
					// echo "doccsssssssss::::  ".$rowCarpDocs[2];
				}
			}	
		}
?>
