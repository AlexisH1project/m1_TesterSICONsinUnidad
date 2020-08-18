<?php



		//echo shell_exec("whoami"); 
		//fopen('X:\\text.txt',"r"); 
		//fopen('X:\\text.txt',"r"); 
		
		//header("Content-type: application/PDF");
		//readfile("\\\\PWIDGRHOSISFO01\\pdfs\\AADJ661227C70.PDF"); //C:/xampp2/htdocs/SICON_w/roles/Controller/
	
		//$from = '\\\\PWIDGRHOSISFO01\\pdfs\\';
		$from = './docs/';
		$to = './docs2/';
		//Abro el directorio que voy a leer
		/*$dir = opendir($from);
		$archivos= glob($from.'*.*');*/
/*
		foreach ($archivos as $archivo){
			$archivo_copiar= str_replace($from, $to, $archivo);
			copy($archivo, $archivo_copiar);
		}
*/

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


function showFiles($from){
	$to = './docs2/';
	
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
    /*for($i=0; $i<count( $files ); $i++){
        echo '<li>'.$files[$i]."</li>";
        //$archivo_copiar= str_replace($from, $to, $files[$i]);
        echo "La última modificación de $nombre_archivo fue: '" . date("F d Y H:i:s.", filemtime($files[$i]))."'";
		copy($from.$files[$i], $to.$files[$i]);
    }*/
    $iterator = new DirectoryIterator($from);
    $iterator2 = new DirectoryIterator($to);
	foreach ($iterator as $fileinfo) {
		$docModificado = 0 ;
		$contadorExistenDoc = 0; 
		$existeRFC = 0;
	    if ($fileinfo->isFile()) {
	        echo $fileinfo->getFilename() . " cambiado en " . $fileinfo->getMTime();
	        // Arreglo con todos los nombres de los archivos
			$nombreDocServ = explode(".",$fileinfo);
			//echo($nombreDocServ[1]);
											//$files = array_diff(scandir($to), array('.', '..')); 
   			$totalDoc = count(glob($to.'{*.pdf,*.PDF}',GLOB_BRACE));
												
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
											    // Extensión del archivo 
											    if($fileinfo->getCTime() != $file->getCTime() AND $extractRfc == $nombreDocServ[0]){
														copy($from.$fileinfo->getFilename(), $to.$extractRfc."_".asignarIDfecha()."_.".$data2[1]);
											    		echo "SERVIDOR: ". $fileinfo->getCTime(). " Mi carpeta: ".  $file->getCTime();

											    		$docModificado = 1 ; 
											    		echo "documento con Modificacion  ";
													//echo "<script> alert('$idDoc[1]'); </script>";
	/*
															$fichero_subido2 = $dir_subida2 . $file->getFilename();
															$extencion2 = explode(".",$fichero_subido2);
															$tamnio = count($extencion2);

															$extencion3 = $extencion2[$tamnio-1]; //el ".pdf"
															$concatenarNombreC = $dir_subida2.strtoupper($elRfc."_".$idDoc[1]."_".$elApellido1."_".$elApellido2."_".$nombre."_".$numEliminado."_.".$extencion3);
															copy($dir_subida.$file, $concatenarNombreC);
														unlink($dir_subida.$elRfc."_".$nameAdj."_".$elApellido1."_".$elApellido2."_".$nombre."_.".$extencion);
											        	break;*/
											   	}else if($extractRfc == $nombreDocServ[0]){
											   		$existeRFC = 1;
											   	}
											}
											echo "entro? : ". $docModificado."  contador: ". $contadorExistenDoc. " total En carpeta: ". $totalDoc;
											
											if($docModificado == 0 AND $contadorExistenDoc-2 == $totalDoc AND $existeRFC == 0) {
			 									echo "creeeeeea el docccc". "\n";
			 									$bktimea = filectime($from.$fileinfo); // obtener tiempo unix
												copy($from.$fileinfo->getFilename(), $to.$fileinfo->getFilename());
												touch($to.$fileinfo, $bktimea); // establecemos la fecha/hora original...
												//copy($from.$fileinfo->getFilename(), $to.$nombreDocServ[0]."_".asignarIDfecha()."_.".$nombreDocServ[1]);

											 }
											

	    }
	    echo '<br/>';

	}
    echo '</ul>';
}

	showFiles($from);


		
?>