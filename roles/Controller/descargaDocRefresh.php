<?php 
						include "configuracion.php";

							$from = '\\\\PWIDGRHOSISFO01\\Archivos2\\';
							$from2 = '\\\\PWIDGRHOSISFO01\\pdfs2\\';
							$to = './DOCUMENTOS_MOV_QR/FMP/';

							$elCurp = $_GET['curp'];
							$elRfc = $_GET['rfc'];
							$usuarioSeguir = $_GET['usuario'];

// **************** vamos a seleccionar la qna y la fecha para asignar los mismos datos los documentos que detectemos y si son iguales solo remplazarlos y si no guardar el doc
							
							$queryMax = "SELECT * FROM conteo_qr WHERE curp = '$elCurp' ORDER BY id_cont DESC";
							if($resqueryMax = mysqli_query($conexion,$queryMax)){
								if($rowqueryMax = mysqli_fetch_row($resqueryMax)){
									$fecha = str_replace ( "-", '',$rowqueryMax[2]);
									$laQna = $rowqueryMax[5];
								}
							}
// *****************************terminamos
								copy($from2.$elRfc.".pdf" , $to.$elCurp."_FMP_".$laQna."_".$fecha.".PDF");
								showFiles($from,$elCurp,$fecha, $laQna); //enviamos la direccion y el curp

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

		//---> Funcion recurciba la cual nos ayuda a extraer los documentos de varias carpetas contenidas de una direccion inicial. Esta funcion solo se activa una vez al final del codigo
		function showFiles($from, $curp, $generarID, $laQna){
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
						showFiles($from.$current.'/', $curp, $generarID, $laQna);
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
												if($curp == $curpInterator[0]) {
														// echo "creeeeeea el docccc". "\n";
														$bktimea = filectime($from.$fileinfo->getFilename()); // obtener tiempo unix
														$fromV =$from.$fileinfo->getCTime(); // ----> antes de copiar , se obtiene su id de creacion 
													// 	echo "c: ". filectime($from.$fileinfo->getFilename())."</br>".
													// 	"a: ". fileatime($from.$fileinfo->getFilename())."</br>".	
													// 	"m: ". filemtime($from.$fileinfo->getFilename())."</br>"
													// ;  
													$extencionFile = explode(".",$fileinfo);
														// echo "ANTES OBTENEMOS info". $bktimea ." ". $fromV . $to.$fileinfo->getFilename()."</br>";
													copy($from.$fileinfo->getFilename() , $to.$extencionFile[0]."_".$laQna."_".$generarID.".".$extencionFile[1]);
													touch($to.$extencionFile[0]."_".$laQna."_".$generarID.".".$extencionFile[1], $bktimea); 
														// $bktimea2 = filectime($to.$file->getFilename()); // obtener tiempo unix
														// echo "DESPUES info". $bktimea2 ."</br>";
													}
				}// --->> IF si se encuentra en la misma capeta
						}
					}
				}
?>
