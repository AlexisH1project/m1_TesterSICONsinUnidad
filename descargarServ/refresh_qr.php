<?php
			include "configuracion.php";

			$from = '\\\\PWIDGRHOSISFO01\\Archivos2\\';
			$from2 = '\\\\PWIDGRHOSISFO01\\pdfs2\\';
			$to = '../roles/Controller/DOCUMENTOS_MOV_QR/';

			// $elCurp = $_GET['curp'];
			// $elRfc = $_GET['rfc'];
			$conteo = 0 ;
// **************** vamos a seleccionar la qna y la fecha para asignar los mismos datos los documentos que detectemos y si son iguales solo remplazarlos y si no guardar el doc
			
			$queryMax = "SELECT * FROM conteo_qr ORDER BY id_cont DESC";
			if($resqueryMax = mysqli_query($conexion,$queryMax)){
				while($rowqueryMax = mysqli_fetch_row($resqueryMax)){
					$fecha = str_replace ( "-", '',$rowqueryMax[2]);
					$laQna = $rowqueryMax[5];
					if($conteo == 40){
						break;
					}else{
						showFiles($from,$rowqueryMax[1],$fecha, $laQna); //enviamos la direccion y el curp
						$conteo++;
					}
				}
			}
		echo "*******************************************/ YAAAA    TERMINEEEEEEEE /**************************************";

		//---> Funcion recurciba la cual nos ayuda a extraer los documentos de varias carpetas contenidas de una direccion inicial. Esta funcion solo se activa una vez al final del codigo
		function showFiles($from, $curp, $generarID, $laQna){
			set_time_limit(3600);
			include "configuracion.php";
			$to = '../roles/Controller/DOCUMENTOS_MOV_QR/';
			// echo "entro: ". $curp . "\n";
			$sqlCarpDocs = "SELECT * FROM ct_documentos_qr";
			$conectar = mysqli_query($conexion, $sqlCarpDocs);
			while($rowCarpDocs=mysqli_fetch_row($conectar)){ 
				if(file_exists($from.$rowCarpDocs[2]."\\".$curp."_".$rowCarpDocs[2].".PDF")){
					copy($from.$rowCarpDocs[2]."\\".$curp."_".$rowCarpDocs[2].".PDF", $to.$rowCarpDocs[2]."/".$curp."_".$rowCarpDocs[2]."_".$laQna."_".$generarID.".PDF");
					// echo "doccsssssssss::::  ".$rowCarpDocs[2];
				}
			}	
		}

?>