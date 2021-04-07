<?php
		
		$from = '\\\\PWIDGRHOSISFO01\\Archivos2\\';
		// $to = '../roles/Controller/DOCUMENTOS_RES/';
		// $from = './OTRO/';
		// $curps = array("AIBJ870930HCLVTS08","CAWN811012HNEMLS04","CIGN630525MVZSNL08");
		$curp = "CIGN630525MVZSNL08";
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
function showFiles($from, $curp){
	set_time_limit(3600);
	include "configuracion.php";
	//$to = '../roles/Controller/DOCUMENTOS_RES/';
	//$to = './SICON/'.$nameCarpetaOTRO[1];
	//$to = './Controller/DOCUMENTOS_RES/'.$nameCarpetaOTRO[1];
	$nameCarpetaOTRO= explode("\\Archivos2\\", $from);
	$to = './SICON/'.$nameCarpetaOTRO[1];
    $nameCarpetaSICON= explode("./SICON/", $to);


    $dir = opendir($from);
    $files = array();
    while ($current = readdir($dir)){
        if( $current != "." && $current != "..") {
            if(is_dir($from.$current)) {
                showFiles($from.$current.'/', $curp);
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
			 									echo "creeeeeea el docccc". "\n";
			 									$bktimea = filectime($from.$fileinfo->getFilename()); // obtener tiempo unix
			 									$fromV =$from.$fileinfo->getCTime(); // ----> antes de copiar , se obtiene su id de creacion 
			 									echo "c: ". filectime($from.$fileinfo->getFilename())."</br>".
													"a: ". fileatime($from.$fileinfo->getFilename())."</br>".	
													"m: ". filemtime($from.$fileinfo->getFilename())."</br>"
												;  
												$extencionFile = explode(".",$from.$fileinfo->getFilename());
												$generarID = asignarIDfecha();

			 									echo "ANTES OBTENEMOS info". $bktimea ." ". $fromV . $to.$fileinfo->getFilename()."</br>";
												copy($from.$fileinfo->getFilename() , $to.$extencionFile[0]."_X_".$generarID.".".$extencionFile[1]);
												touch($to.$extencionFile[0]."_X_".$generarID.".".$extencionFile[1], $bktimea); 
		 									// $bktimea2 = filectime($to.$file->getFilename()); // obtener tiempo unix
			 									// echo "DESPUES info". $bktimea2 ."</br>";
											 }
		}// --->> IF si se encuentra en la misma capeta
			    }
			}
		}
		// --> todo empieza al iniciar esta funcion 
			showFiles($from, $curp);
?>