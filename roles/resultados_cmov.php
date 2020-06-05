
<?php

    include "configuracion.php";
    $request = $_POST['request'];

    if($request == 1){
        $busqueda = $_POST['busqueda'];
        $consulta1 = "SELECT * FROM ct_movimientosrh WHERE descripcionCompleta like'%".$busqueda."%'";
        $resultado1 = mysqli_query($conexion,$consulta1);
        while($row = mysqli_fetch_array($resultado1)){
            $response[] = array("value"=>utf8_encode($row['id_mov']),"label"=>utf8_encode($row['descripcionCompleta']));
        }
 
        echo json_encode($response);
        exit;
    }
    
    if($request == 2){
        $buscarid = $_POST['buscarid'];
        $consulta2 = "SELECT * FROM ct_movimientosrh WHERE id_mov=".$buscarid."";
        $resultado2 = mysqli_query($conexion,$consulta2);
        $buscar_arr = array();
        while($row = mysqli_fetch_array($resultado2)){
            $idmov = utf8_encode($row['id_mov']);
            $cod2 = utf8_encode($row['descripcionCompleta']);
            $nomb_mov_validado = utf8_encode($row['area_mov']);
            $nomb_mov = mb_strtoupper($nomb_mov_validado);
            $buscar_arr[] = array("idmov" => $idmov, "cod2" => $cod2,"nomb_mov" => $nomb_mov);
        }
        
        echo json_encode($buscar_arr);
        exit;
    }

?>
