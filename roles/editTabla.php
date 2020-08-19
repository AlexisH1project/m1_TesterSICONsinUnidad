<?php
		//include_once("db_connect.php");

		$input = filter_input_array(INPUT_POST);
		if ($input['action'] == 'edit') {
			$update_field='';
			if(isset($input[3])) {
				echo $input[3];
			$update_field.= "name='".$input[3]."'";
			} /*else if(isset($input['gender'])) {
			$update_field.= "gender='".$input['gender']."'";
			} else if(isset($input['address'])) {
			$update_field.= "address='".$input['address']."'";
			} else if(isset($input['age'])) {
			$update_field.= "age='".$input['age']."'";
			} else if(isset($input['designation'])) {
			$update_field.= "designation='".$input['designation']."'";
			}
			if($update_field && $input['id']) {
				$sql_query = "UPDATE developers SET $update_field WHERE id='" . $input['id'] . "'";
				mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
			}*/
		}
?>