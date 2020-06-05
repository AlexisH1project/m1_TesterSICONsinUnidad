<?php
	include "configuracion.php";


	$clavePrograma = $_GET['ap'];

	$consulta2 = " SELECT id_ur FROM plazas WHERE clavePrograma = '".$clavePrograma."' GROUP BY id_ur";
	if($resultado2 = mysqli_query($conexion,$consulta2)){
        echo '<label for="unexp">*Unidad:</label>';

		echo '<select id="unidadSelect" name="unidadSelect" onchange ="partidas()" class="form-control">';
    	echo "<option value=''></option>";

    	while($row = mysqli_fetch_assoc($resultado2)){
    		// echo $row['id_ur']."    ";
    		echo "<option value='".$row['id_ur']."'>".$row['id_ur']."</option>";

    	}
    	echo "</select>";
    }


?>