<?php
		//echo shell_exec("whoami"); 
		//fopen('X:\\text.txt',"r"); 
		//fopen('X:\\text.txt',"r"); 
		
		//header("Content-type: application/PDF");
		//readfile("\\\\PWIDGRHOSISFO01\\pdfs\\AADJ661227C70.PDF"); //C:/xampp2/htdocs/SICON_w/roles/Controller/
		
		//$from = '\\\\PWIDGRHOSISFO01\\pdfs\\';
		//$to = '../roles/Controller/DOCUMENTOS_RES/';
		$to = './SICON/';
	
		//$numParametros = count($data);
//--->  iniciamos a detectar como se encuentra la estrucutra del nombre del documento para poder saber si es el que ya se tiene o si es nuevo con el mismo nombr
		/*if($numParametros == 1){
			$nameFileSICON = "0";
		}else if($numParametros == 2){
			$separarExtencion = explode(".", $data[1]);
			$nameC_SICON = $separarExtencion[0];
		}else if($numParametros == 3){
			$separarExtencion = explode(".", $data[2]);
			$nameC_SICON = $data[1]."_".$separarExtencion[0];
		}else if($numParametros == 4){
			$nameC_SICON = $data[1];
		}else if($numParametros == 5){
			$nameC_SICON = $data[1]."_".$data[2];
		}
*/
		$from = './OTRO/';

		//Abro el directorio que voy a leer
		/*$dir = opendir($from);
		$archivos= glob($from.'*.*');*/
/*
		foreach ($archivos as $archivo){
			$archivo_copiar= str_replace($from, $to, $archivo);
			copy($archivo, $archivo_copiar);
		}
*/

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
function showFiles($from){
	include "configuracion.php";
	//$to = '../roles/Controller/DOCUMENTOS_RES/';
	$nombreFilVer = "AADV880113HDFLZC06";
	$nameCarpetaOTRO= explode("/OTRO/", $from);
	$to = './SICON/'.$nameCarpetaOTRO[1];
    $nameCarpetaSICON= explode("/SICON/", $to);
	
    $dir = opendir($from);
    $files = array();
    while ($current = readdir($dir)){
        if( $current != "." && $current != "..") {
            if(is_dir($from.$current)) {
                showFiles($from.$current.'/');
            }
            else {
                $files[] = $current;
				
            }
        }
    }
    echo '<h2>'.$from.'</h2>';
    echo '<ul>';
    
    $iterator = new DirectoryIterator($from);
    $iterator2 = new DirectoryIterator($to);
	foreach ($iterator as $fileinfo) { //----------> iniciamos a recorrer los docuementos de la carpeta del servidor donde se van a extraer
		$docModificado = 0 ;
		$contadorExistenDoc = 0; 
		$existeRFC = 0;
	    if ($fileinfo->isFile()) {
	        echo $fileinfo->getFilename() . " cambiado en " . $fileinfo->getMTime();  
	        // Arreglo con todos los nombres de los archivos
			$nombreDocServ = explode(".",$fileinfo);
			$curpInterator = explode("_",$nombreDocServ[0]);
			//echo("nombre:: ". $nombreDocServ[0]);
											//$files = array_diff(scandir($to), array('.', '..')); 
   			$totalDoc = count(glob($to.'{*.pdf,*.PDF}',GLOB_BRACE));  //---> total de documentos en la carpeta a la cual se van a pasar 
    		echo '<h2> COMÁRANDO: '.$nameCarpetaSICON[1].'</h2>';
    		echo '<h2> COMÁRANDO: '.$nameCarpetaOTRO[1].'</h2>';

			if($nombreFilVer == $curpInterator[0]){												
											foreach($iterator2 as $file){
												$contadorExistenDoc ++;
											    // Divides en dos el nombre de tu archivo utilizando el . 
											    $data = explode("_",$file);
											    $data2 = explode(".",$file);
												$indice = count($data2);	
												//echo strtoupper($file->getFilename())."\n";
												$extencion = $data2[$indice-1];
											    // Nombre del archivo
											    //$nameAdj = $data[1];
												$extractRfc = $data[0];
												$numParametros = count($data);
						//--->  iniciamos a detectar como se encuentra la estrucutra del nombre del documento para poder saber si es el que ya se tiene o si es nuevo con el mismo nombr
												if($numParametros == 1){
													$nameFileSICON = "0";
												}else if($numParametros == 2){
													$separarExtencion = explode(".", $data[1]);
													$nameFileSICON = $extractRfc."_".$separarExtencion[0];
												}else if($numParametros == 3){
													$separarExtencion = explode(".", $data[2]);
													$nameFileSICON = $data[0]."_".$data[1]."_".$separarExtencion[0];
												}else if($numParametros == 4){
													$nameFileSICON = $data[0]."_".$data[1];
												}else if($numParametros == 5){
													$nameFileSICON = $data[0]."_".$data[1]."_".$data[2];
												}
											 //	echo $nameFileSICON ."### </br>";
											    // Extensión del archivo 
											    $propiedadesSICONf = stat($to.$file->getFilename());
											    $propiedadesServf = stat($from.$fileinfo->getFilename());
/*
											    echo "c: ". filectime($from.$fileinfo->getFilename())."</br>".
													"a: ". fileatime($from.$fileinfo->getFilename())."</br>".	
													"m: ". filemtime($from.$fileinfo->getFilename())."</br>"
												;  
			 									echo "SICON::: " . $to.$fileinfo->getFilename()."</br>";
											
												echo "c: ". filectime($to.$fileinfo->getFilename())."</br>".
													"a: ". fileatime($to.$fileinfo->getFilename())."</br>".	
													"m: ". filemtime($to.$fileinfo->getFilename())."</br>"
												;  */
								// -----> Esta comparacion es para saber si existen los documentos con las mismas caracteristicas 
											    if((filectime($from.$fileinfo->getFilename()) != filemtime($to.$file->getFilename()) AND filectime($from.$fileinfo->getFilename()) != fileatime($to.$file->getFilename()) AND $nameFileSICON == $nombreDocServ[0]) OR $nameFileSICON == $nombreDocServ[0]){
			
											    		$arrayArchivosRepetidos[$docModificado] = $to.$file->getFilename(); // -- > guardamos en un arreglo los nombre de documentos con el mismo monbre 
														$docModificado ++ ; 
														$nameFileServ = $from.$fileinfo->getFilename();
														$nombreCompSICON = $fileinfo; // ---> ocupamos al hacer la comparacion con los que se guardaron en el arreglo
											 				//echo "Se podria duplicar entro  </br>";
											 				echo $nameFileServ."</br>";
																
											   	}else if($nameFileSICON == $nombreDocServ[0]){
											   		$existeRFC = 1;
											   	}
											} // ---->> termina el for anidado
											echo "entro? : ". $docModificado."  contador: ". $contadorExistenDoc. " total En carpeta: ". $totalDoc;
											if($docModificado == 0 AND $contadorExistenDoc-2 == $totalDoc AND $existeRFC == 0) {
			 									echo "creeeeeea el docccc". "\n";
			 									$bktimea = filectime($from.$fileinfo->getFilename()); // obtener tiempo unix
			 									$fromV =$from.$fileinfo->getCTime(); // ----> antes de copiar , se obtiene su id de creacion 
			 									echo "c: ". filectime($from.$fileinfo->getFilename())."</br>".
													"a: ". fileatime($from.$fileinfo->getFilename())."</br>".	
													"m: ". filemtime($from.$fileinfo->getFilename())."</br>"
												;  
			 									echo "ANTES OBTENEMOS info". $bktimea ." ". $fromV . $to.$fileinfo->getFilename()."</br>";
												copy($from.$fileinfo->getFilename(), $to.$fileinfo->getFilename());
												touch($to.$fileinfo->getFilename(), $bktimea); // establecemos la fecha/hora original...
												echo "c: ". filectime($to.$fileinfo->getFilename())."</br>".
													"a: ". fileatime($to.$fileinfo->getFilename())."</br>".	
													"m: ". filemtime($to.$fileinfo->getFilename())."</br>"
												;  
			 									$bktimea2 = filectime($to.$file->getFilename()); // obtener tiempo unix
			 									echo "DESPUES info". $bktimea2 ."</br>";
											 }else if($docModificado > 0){
											 	echo "tamaño de arreglo: ". count($arrayArchivosRepetidos)."</br>";
											 	$siExisteFile=0;
											 	$soloNombre = explode(".", $nombreCompSICON);
											 		for ($i=0; $i < count($arrayArchivosRepetidos); $i++) { // ----> recorremos el arreglo con los documentos repetidos con el mismo nombre
														 	$propiedadesSICONf2 = stat($arrayArchivosRepetidos[$i]);
														    $propiedadesServf2 = stat($nameFileServ);
											 				echo "SERVIDOR: ". $nameFileServ." </br> ". $nombreDocServ[0] . "</br>";
											 				echo "SICON: ". $arrayArchivosRepetidos[$i]  . " </br> " .$nombreCompSICON. "</br>";

											 				if( filectime($nameFileServ) == filemtime($arrayArchivosRepetidos[$i]) AND $propiedadesServf2['size'] == $propiedadesSICONf2['size'] AND $soloNombre[0] == $nombreDocServ[0]){ // ----> comparamos sus caracteristicas si son iguales
											 					$siExisteFile = 1; // ----> indica que si existe un doc igual entonces ya no es necesario guardar
											 					 
											 				}else{
											 					echo "c: ". filectime($arrayArchivosRepetidos[$i])."</br>".
																		"a: ". fileatime($arrayArchivosRepetidos[$i])."</br>".	
																		"m: ". filemtime($arrayArchivosRepetidos[$i])."</br>"
																	;  
								 									echo "SICON::: " . $to.$fileinfo->getFilename()."</br>";
																
																	echo "c: ". filectime($nameFileServ)."</br>".
																		"a: ". fileatime($nameFileServ)."</br>".	
																		"m: ". filemtime($nameFileServ)."</br>"
																	;  	
											 				}
											 		}
											 		if($siExisteFile == 0){ // ---->> como no se detecto doc con las mismas caractristicas se va a copiar el archivo pero con id y numero de qna
										 				echo "GUARDAMOS ". $nombreCompSICON. " </br>";
										 				$generarID = asignarIDfecha();
										 			//-- > sacamos la hora 
										 				$hoy = "select CURDATE()";
														if ($resultHoy = mysqli_query($conexion,$hoy)) {
														 		$rowF = mysqli_fetch_row($resultHoy);  // cambiamos formato de hora 
														 		$fechaSistema = date("Y-m-d", strtotime($rowF[0])); //"14-04-2020" "d-m-Y"
															 		echo "FECHA DE HOY".$fechaSistema."</br>";
														 }
													// ---> ahora detectamos en que qna nos encontramos
														 $queryQna = "SELECT * FROM m1ct_fechasnomina";
														 if($SiQueryQna = mysqli_query($conexion, $queryQna)){
															 while($rowFechas = mysqli_fetch_row($SiQueryQna)){
															 	if($fechaSistema >= $rowFechas[2] AND $fechaSistema <= $rowFechas[5]){
															 		$qnaAplicada = $rowFechas[0];
															 		echo "qna".$qnaAplicada."</br>";
															 	}
															 }
														}
										 				$extencionFile = explode(".",$nombreCompSICON);
										 				$timeFsevidor = filectime($from.$nombreCompSICON);
										 				echo "c: ". filectime($from.$nombreCompSICON)."</br>".
																		"a: ". fileatime($from.$nombreCompSICON)."</br>".	
																		"m: ". filemtime($from.$nombreCompSICON)."</br>"
																	;  	
					 									copy($from.$nombreCompSICON , $to.$extencionFile[0]."_".$qnaAplicada."_".$generarID.".".$extencionFile[1]);
														touch($to.$extencionFile[0]."_".$qnaAplicada."_".$generarID.".".$extencionFile[1], $timeFsevidor); 
																	/*echo "c: ". filectime($to.$extencionFile[0]."_".$generarID."_.".$extencionFile[1])."</br>".
																		"a: ". fileatime($to.$extencionFile[0]."_".$generarID."_.".$extencionFile[1])."</br>".	
																		"m: ". filemtime($to.$extencionFile[0]."_".$generarID."_.".$extencionFile[1])."</br>"
																	;  	*/
											 		}
											 			
											 }
		}// --->> IF si se encuentra en la misma capeta

	    }
	    echo '<br/>';

	}
    echo '</ul>';
}
// --> todo empieza al iniciar esta funcion 
	showFiles($from);
?>