<?php
	
    include "configuracion.php";

    $clavePrograma = $_GET['ap'];
    $id_ur = $_GET['unidad'];
    $id_partida = $_GET['partida'];


    $consulta2 = " SELECT codigo FROM plazas WHERE clavePrograma = '".$clavePrograma."' AND id_ur = '".$id_ur."' AND id_partida = '". $id_partida."' GROUP BY codigo";
    if($resultado2 = mysqli_query($conexion,$consulta2)){
        echo '<label for="unexp">*Codigo:</label>';

        echo '<select id="codigoSelect" name="codigoSelect" onchange ="pg()" class="form-control">';
        echo "<option value=''></option>";

        while($row = mysqli_fetch_assoc($resultado2)){
            // echo $row['id_partida']."    ";
            echo "<option value='".$row['codigo']."'>".$row['codigo']."</option>";

        }
        echo "</select>";
    }
?>