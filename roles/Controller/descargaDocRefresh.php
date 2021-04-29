<?php 
						include "configuracion.php";

							$from = '\\\\PWIDGRHOSISFO01\\Archivos2\\';
							$from2 = '\\\\PWIDGRHOSISFO01\\pdfs2\\';
							$to = './DOCUMENTOS_MOV_QR/FMP/';

							$elCurp = $_GET['curp'];
							$usuarioSeguir = $_GET['usuario'];

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
								copy($from2.$elRfc.".pdf" , $to.$elCurp."_FMP_".$newQna."_".$fecha.".PDF");
								$generarID = asignarIDfecha();
								showFiles($from,$elCurp,$generarID); //enviamos la direccion y el curp
								$sqlRol = "SELECT id_rol FROM usuarios WHERE usuario = '$usuarioSeguir'";
								if ($resR = mysqli_query($conexion,$sqlRol) ){
									$rowRol = mysqli_fetch_row($resR);
										if($rowRol[0] == 1){
												echo "<script> alert('Volver a consultar el movimiento para verificar si ya existen los documentos correspondientes'); window.location.href = '../LuluEventuales.php?usuario_rol=$usuarioSeguir'</script>";
											}elseif($rowRol[0] == 2){
												echo "<script> alert('Volver a consultar el movimiento para verificar si ya existen los documentos correspondientes'); window.location.href = '../analista.php?usuario_rol=$usuarioSeguir'</script>";
											}elseif($rowRol[0] == 3){
												echo "<script> alert('Volver a consultar el movimiento para verificar si ya existen los documentos correspondientes'); window.location.href = '../capturistaTostado.php?usuario_rol=$usuarioSeguir'</script>";
											}
									
								}

		//---> funcion para poder asiganar un id diferente y no se duplique el documento
		function asignarIDfecha(){
			//----------------Sacamos la Hora 
			include "configuracion.php";

			$hoy = "select CURDATE()";
			$tiempo ="select curTime()";

				if ($resultHoy = mysqli_query($conexion,$hoy) AND $resultTime = mysqli_query($conexion,$tiempo)) {
						$row = mysqli_fetch_row($resultHoy);
						$row2 = mysqli_fetch_row($resultTime);
				}
				$hora = str_replace ( ":", '',$row2[0] ); 
				$fecha = str_replace ( "-", '',$row[0] ); 
			//----------------Sacamos la Hora 
			return $fecha.$hora;
		}

		//---> Funcion recurciba la cual nos ayuda a extraer los documentos de varias carpetas contenidas de una direccion inicial. Esta funcion solo se activa una vez al final del codigo
		function showFiles($from, $curp, $generarID){
			set_time_limit(3600);
			include "configuracion.php";
			//$to = '../roles/Controller/DOCUMENTOS_RES/';
			//$to = './SICON/'.$nameCarpetaOTRO[1];
			//$to = './Controller/DOCUMENTOS_RES/'.$nameCarpetaOTRO[1];
			$nameCarpetaOTRO= explode("\\Archivos2\\", $from);
			$to = './DOCUMENTOS_MOV_QR/'.$nameCarpetaOTRO[1];
			$nameCarpetaSICON= explode("./DOCUMENTOS_MOV_QR/", $to);


			$dir = opendir($from);
			$files = array();
			while ($current = readdir($dir)){
				if( $current != "." && $current != "..") {
					if(is_dir($from.$current)) {
						showFiles($from.$current.'/', $curp, $generarID);
					}
					else {
						$files[] = $current;
						
					}
				}
			}
		
			$iterator = new DirectoryIterator($from);
			// $iterator2 = new DirectoryIterator($to);
			foreach ($iterator as $fileinfo) { //----------> iniciamos a recorrer los docuementos de la carpeta del servidor donde se van a extraer
				$docModificado = 0 ;
				$contadorExistenDoc = 0; 
				$existeRFC = 0;
				if ($fileinfo->isFile()) {
					// Arreglo con todos los nombres de los archivos
					$nombreDocServ = explode(".",$fileinfo);
					$curpInterator = explode("_",$nombreDocServ[0]);
					//echo("nombre:: ". $nombreDocServ[0]);
													//$files = array_diff(scandir($to), array('.', '..')); 
					$totalDoc = count(glob($to.'{*.pdf,*.PDF}',GLOB_BRACE));  //---> total de documentos en la carpeta a la cual se van a pasar 
					/*echo '<h2> COMÁRANDO: '.$nameCarpetaSICON[1].'</h2>';
					echo '<h2> COMÁRANDO: '.$nameCarpetaOTRO[1].'</h2>';*/
					if($nameCarpetaSICON[1] == $nameCarpetaOTRO[1]){												
													// foreach($iterator2 as $file){
												
								//--->  iniciamos a detectar como se encuentra la estrucutra del nombre del documento para poder saber si 
										// -----> Esta comparacion es para saber si existen los documentos con las mismas caracteristicas 
													if($curp == $curpInterator[0] AND (filectime($from.$fileinfo->getFilename()) != filemtime($to.$file->getFilename()) AND filectime($from.$fileinfo->getFilename()) != fileatime($to.$file->getFilename()) )) {
														// echo "creeeeeea el docccc". "\n";
														$bktimea = filectime($from.$fileinfo->getFilename()); // obtener tiempo unix
														$fromV =$from.$fileinfo->getCTime(); // ----> antes de copiar , se obtiene su id de creacion 
													// 	echo "c: ". filectime($from.$fileinfo->getFilename())."</br>".
													// 	"a: ". fileatime($from.$fileinfo->getFilename())."</br>".	
													// 	"m: ". filemtime($from.$fileinfo->getFilename())."</br>"
													// ;  
													$extencionFile = explode(".",$fileinfo);
														// echo "ANTES OBTENEMOS info". $bktimea ." ". $fromV . $to.$fileinfo->getFilename()."</br>";
													copy($from.$fileinfo->getFilename() , $to.$extencionFile[0]."_X_".$generarID.".".$extencionFile[1]);
													touch($to.$extencionFile[0]."_X_".$generarID.".".$extencionFile[1], $bktimea); 
														// $bktimea2 = filectime($to.$file->getFilename()); // obtener tiempo unix
														// echo "DESPUES info". $bktimea2 ."</br>";
													}
				}// --->> IF si se encuentra en la misma capeta
						}
					}
				}
?>
