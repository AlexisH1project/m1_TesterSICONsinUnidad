
<?php
	
	$mysqli=new mysqli("localhost","root","s!(0n_25","fomope2");
	
	if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}
	
?>
