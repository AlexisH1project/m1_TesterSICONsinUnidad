
<?php

    include "configuracion.php";
    $request = $_POST['request'];

    if($request == 1){
        $busqueda = $_POST['busqueda'];
        $consulta1 = "SELECT * FROM ct_unidades WHERE UR like'%".$busqueda."%'";
        $resultado1 = mysqli_query($conexion,$consulta1);
        while($row = mysqli_fetch_array($resultado1)){
            $response[] = array("value"=>($row['UR']),"label"=>($row['descripcion']));
        }
 
        echo json_encode($response);
        exit;
    }
    
    if($request == 2){
        $buscarid = $_POST['buscarid'];
        $consulta2 = "SELECT * FROM correos_ur WHERE UR = '$buscarid'";
        $resultado2 = mysqli_query($conexion,$consulta2);
        $row = mysqli_fetch_row($resultado2); 

        echo json_encode($row);
        exit;
    }

?>
