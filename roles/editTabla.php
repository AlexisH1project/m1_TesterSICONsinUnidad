<?php
		//include_once("db_connect.php");
		include "configuracion.php";

		$input = filter_input_array(INPUT_POST);
		if ($input['action'] == 'edit') {
			$update_field='';
			if(isset($input['validacionPersonal'])) {
				//echo '<script type="text/javascript"> console.log("ssssssss77777");</script>';
				$update_field.= "fechaValidacionPersonal='".$input['validacionPersonal']."'";
			}else if(isset($input['entregaUnidad'])) {
			$update_field.= "fechaEntregaUnidad='".$input['entregaUnidad']."'";
			} else if(isset($input['relacionesL'])) {
			$update_field.= "fechaEntregaRLaborales='".$input['relacionesL']."'";
			} 
			
			if($update_field && $input['id']) {
				$sql_query = "UPDATE fomope SET $update_field WHERE id_movimiento='" . $input['id'] . "'";
				mysqli_query($conexion, $sql_query) or die("database error:". mysqli_error($conexion));
			}
		}
?>