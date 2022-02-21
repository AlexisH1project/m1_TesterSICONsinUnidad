<?php 
		include "configuracion.php";

				// echo "<script> if (mensaje) {	</script>";

							$from = '\\\\PWIDGRHOSISFO01\\Archivos2\\';
							$from2 = '\\\\PWIDGRHOSISFO01\\pdfs2\\';
							$to = './Controller/DOCUMENTOS_MOV_QR/FMP/';

							$elCurp = $_POST['rfcL_1'];
							$asignadoA = $_POST['usuarioOption'];
							$elRfc = $_POST['rfc'];
							$laUnidad = $_POST['unexp_1'];

							$hoy = "select CURDATE()";
							$tiempo ="select curTime()";
							if ($resultHoy = mysqli_query($conexion,$hoy) AND $resultTime = mysqli_query($conexion,$tiempo)) {
								$row = mysqli_fetch_row($resultHoy);
								$fecha = str_replace ( "-", '',$row[0] ); 
								$row2 = mysqli_fetch_row($resultTime);
								$elanio = explode("-",$row[0]);
							}
							$sqlQna = "SELECT * FROM m1ct_fechasnomina WHERE estadoActual = 'abierta'";

							if($resQna = mysqli_query($conexion,$sqlQna)){
								$rowQna = mysqli_fetch_row($resQna);
								// $fehaI = date("d-m-Y", strtotime($rowQna[4])); 
								// $fehaF = date("d-m-Y", strtotime($rowQna[5])); 
								$newQna = $rowQna[0];
							}
							$sql = "INSERT INTO conteo_qr (curp, fecha, hora, usuarioAgrego, qna, anio, rfc, analistaAsignada, unidad) VALUES ('$elCurp', '$row[0]', '$row2[0]', '$usuarioSeguir', '$newQna', '$elanio[0]', '$elRfc', '$asignadoA', '$laUnidad') ";
							if(mysqli_query($conexion,$sql)){
								copy($from2.$elRfc.".pdf" , $to.$elCurp."_FMP_".$newQna."_".$fecha.".PDF");
								// touch($to.$extencionFile[0]."_X_".$generarID.".".$extencionFile[1], $bktimea); 
								showFiles($from,$elCurp,$fecha,$newQna); //enviamos la direccion y el curp
								echo("
								<br>
								<br>
								<div class='col-sm-12'>
								<div class='plantilla-inputv text-dark ''>
								<div class='card-body'><h2 align='center'>GUARDADO CORRECTAMENTE: </h2> <i>$elCurp</i></div>
								</div>
								</div>");
							}

 ?>