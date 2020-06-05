
<?php

    include "configuracion.php";
    $request = $_POST['request'];

    if($request == 1){
        $busqueda = $_POST['busqueda'];
        $consulta1 = "SELECT * FROM ct_estados WHERE nombre_estado like'%".$busqueda."%'";
        $resultado1 = mysqli_query($conexion,$consulta1);
        while($row = mysqli_fetch_array($resultado1)){
            $response[] = array("value"=>$row['id_r'],"label"=>$row['nombre_estado']);
        }
 
        echo json_encode($response);
        exit;
    }
    
    if($request == 2){
        $buscarid = $_POST['buscarid'];
        $consulta2 = "SELECT * FROM ct_estados WHERE id_r=".$buscarid."";
        $resultado2 = mysqli_query($conexion,$consulta2);
        $buscar_arr = array();
        while($row = mysqli_fetch_array($resultado2)){
            $idmov = $row['id_r'];
            $cod3 = $row['nombre_estado'];
            $nomb_edo_validado = $row['pais'];
            $nomb_edo = mb_strtoupper($nomb_edo_validado);
            $buscar_arr[] = array("idmov" => $idmov, "cod3" => $cod3,"nomb_edo" => $nomb_edo);
        }
        
        echo json_encode($buscar_arr);
        exit;
    }

?>
