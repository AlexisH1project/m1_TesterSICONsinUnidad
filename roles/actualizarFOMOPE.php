<?php 
    include "configuracion.php";

	$noFomope = $_POST['noFomope'];
	$sql1 = "UPDATE fomope SET color_estado ='naranja' WHERE id_movimiento = '$noFomope' " ;
	
	if (mysqli_query($conexion,$sql)) {
    	echo "<script>alert('Fomope enviado a autorización');</script>";
        echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=./analista.php">';

	} else {
	    echo "Error updating record: " . mysqli_error($conexion);
	}
?>