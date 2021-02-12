<?php 
		include "../../roles/configuracion.php";
		 $carpeta = $_POST['carpeta'];
		if($carpeta=="DOCUMENTOS_MOV"){
		$doc = strtolower( $_POST['doc']);
		}else{
	    $doc = strtoupper($_POST['doc']);
		}


		$from = '../../roles/Controller/'.$carpeta.'/'.$doc."/";
		$to = '../../roles/Controller/DOCUMENTOS_DUP/'.$carpeta.'/'.$doc."/";
		if (!file_exists($to)) {
        mkdir($to, 0777, true);
        }
		$files = array_diff(scandir($from), array('.', '..'));

		foreach($files as $file){
		    $data = explode("_",$file);
			$conData= count($data);
		    $data2 = explode(".",$file);
			$indice = count($data2);	
            $extencion = $data2[$indice-1];	

         


            if($carpeta=="DOCUMENTOS_MOV"){

            $extractDoc = $data[1];
            $extractRfc = $data[0];
            $fecha = $data[5];

            $sql = "SELECT curp FROM fomope WHERE rfc = '$extractRfc' ";
            if($res = mysqli_query($conexion, $sql)){
					$row = mysqli_fetch_row($res);
				}
			$newName=$row[0]."_".$doc.".".$extencion;

			foreach($files as $fil){
				 $dataD = explode("_",$fil);

                 If($dataD[5]>=$fecha AND $dataD[0]==$extractRfc){
                 	copy($from.$data[0]."_".$data[1]."_".$data[2]."_".$data[3]."_".$data[4]."_".$dataD[5]."_".$data[6]."_.".$extencion, $to.$newName);	
                 }

             }

         }




		}