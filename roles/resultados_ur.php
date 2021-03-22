
<?php

    include "configuracion.php";
    $request = $_POST['request'];

    if($request == 1){
        $busqueda = $_POST['busqueda'];
        $consulta1 = "SELECT * FROM ct_unidades WHERE UR like'%".$busqueda."%'";
        $resultado1 = mysqli_query($conexion,$consulta1);
        while($row = mysqli_fetch_array($resultado1)){
            $response[] = array("value"=>$row['UR'],"label"=>$row['descripcion']);
        }
 
        echo json_encode($response);
        exit;
    }
    
    if($request == 2){
        $buscarid = $_POST['buscarid'];
        $consulta2 = "SELECT * FROM ct_unidades WHERE UR=".$buscarid."";
        $resultado2 = mysqli_query($conexion,$consulta2);
        $buscar_arr = array();
        while($row = mysqli_fetch_array($resultado2)){
            $idx = $row['UR'];
            $unexp_validado = $row['descripcion'];
            $unexp = mb_strtoupper($unexp_validado);
            $buscar_arr[] = array("idx" => $idx, "unexp" => $unexp);
        }
        
        echo json_encode($buscar_arr);
        exit;
    }

    if($request == 3){
        $buscarid = $_POST['buscarid'];
        $consulta2 = "SELECT * FROM ct_unidades WHERE UR=".$buscarid."";
        $resultado2 = mysqli_query($conexion,$consulta2);
        $buscar_arr = array();
        while($row = mysqli_fetch_array($resultado2)){
            $idx = $row['UR'];
            $unexp_validado = $row['UR'];
            $unexp = mb_strtoupper($unexp_validado);
            $buscar_arr[] = array("idx" => $idx, "unexp" => $unexp);
        }
        
        echo json_encode($buscar_arr);
        exit;
    }
?>
