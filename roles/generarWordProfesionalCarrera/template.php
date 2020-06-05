<?php
include("configuracion.php");
require_once dirname(__FILE__).'../../librerias/Classes/PHPWord-master/src/PhpWord/Autoloader.php';
\PhpOffice\PhpWord\Autoloader::register();

use PhpOffice\PhpWord\TemplateProcessor;

$templateWord = new TemplateProcessor('DGRHO_DIPSP_2020_MEMORANDUM_126.docx');
$rfcO = $_POST['rfcL_1'];
$unidadO = $_POST['unexp_1'];
$idProfO = $_POST['idProf'];
		$fechaA = date("d-m-Y");
		$sql="SELECT * FROM `fomope` WHERE rfc = '$rfcO' AND unidad = '$unidadO'";
		$res=mysqli_query($conexion,$sql)or die("problema con la consulta");
		if($data=mysqli_fetch_array($res)){  
			$idPC = $data['idProfesionalCarrera'];
			$idFomope =  $data['id_movimiento'];
			if ($idPC != '') {
			$nombre = $data['nombre'];
		    $apellido_P = $data['apellido_1'];
		    $apellido_M = $data['apellido_2'];
		    $unidadO = $data['unidad'];
		    $idProfesionalC = $data['idProfesionalCarrera'];
		    $templateWord->setValue('nombres',$nombre);
			$templateWord->setValue('fecha', $fechaA);
			$templateWord->setValue('apellido1',$apellido_P);
			$templateWord->setValue('apellido2',$apellido_M);
			$templateWord->setValue('unidad',$unidadO);
			$templateWord->setValue('idProfCar',$idProfesionalC);
			// // --- Guardamos el documento
			$templateWord->saveAs('documentos/DGRHO_DIPSP_2020_MEMORANDUM_'.$idPC.'.docx');
			header("Content-Disposition: attachment; filename=DGRHO_DIPSP_2020_MEMORANDUM_".$idPC.".docx; charset=iso-8859-1");
			echo file_get_contents('documentos/DGRHO_DIPSP_2020_MEMORANDUM_'.$idPC.'.docx');
			}else{
				$idProfO = $_POST['idProf'];
				$sqlA = "UPDATE fomope SET idProfesionalCarrera = '$idProfO' WHERE id_movimiento = '$idFomope'";
				if ($result = mysqli_query($conexion,$sqlA)) {

					$rfcO = $_POST['rfcL_1'];
					$unidadO = $_POST['unexp_1'];
					$idProfO = $_POST['idProf'];
					$sql2="SELECT * FROM `fomope` WHERE rfc = '$rfcO' AND unidad = '$unidadO'";
						
						$res1=mysqli_query($conexion,$sql2)or die("problema con la consulta");
						if ($result2 = mysqli_fetch_array($res1)) {

						$nombre = $result2['nombre'];
					    $apellido_P = $result2['apellido_1'];
					    $apellido_M = $result2['apellido_2'];
					    $unidadO = $result2['unidad'];
					    $idProfesionalC = $result2['idProfesionalCarrera'];
					    $templateWord->setValue('nombres',$nombre);
						$templateWord->setValue('fecha', $fechaA);
						$templateWord->setValue('apellido1',$apellido_P);
						$templateWord->setValue('apellido2',$apellido_M);
						$templateWord->setValue('unidad',$unidadO);
						$templateWord->setValue('idProfCar',$idProfesionalC);
						// // --- Guardamos el documento
						$templateWord->saveAs('documentos/DGRHO_DIPSP_2020_MEMORANDUM_'.$idPC.'.docx');
				header("Content-Disposition: attachment; filename=DGRHO_DIPSP_2020_MEMORANDUM_".$idPC.".docx; charset=iso-8859-1");
				echo file_get_contents('documentos/DGRHO_DIPSP_2020_MEMORANDUM_'.$idPC.'.docx');

				}else{
				}
				}else{

				}
			}

			}else {
					echo '<script type="text/javascript">alert("Error en la conexion");</script>';
					echo '<script type="text/javascript">alert("error '. mysqli_error($conexion).'");</script>';
				}

	
		
        
?>