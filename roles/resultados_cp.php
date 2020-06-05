
<?php

    include "configuracion.php";
    $request = $_POST['request'];

    if($request == 1){
        $busqueda = $_POST['busqueda'];
        $consulta1 = "SELECT * FROM ct_codigopostal WHERE busca_cp like'%".$busqueda."%'";
        $resultado1 = mysqli_query($conexion,$consulta1);
        while($row = mysqli_fetch_array($resultado1)){
            $response[] = array("value"=>utf8_encode($row['id_cp']),"label"=>utf8_encode($row['busca_cp']));
        }
 
        echo json_encode($response);
        exit;
    }
    
    if($request == 2){
        $buscarid = $_POST['buscarid'];
        $consulta2 = "SELECT * FROM ct_codigopostal WHERE id_cp=".$buscarid."";
        $resultado2 = mysqli_query($conexion,$consulta2);
        $buscar_arr = array();
        while($row = mysqli_fetch_array($resultado2)){
            $idx = utf8_encode($row['id_cp']);
            $codpos = utf8_encode($row['codigo_postal']);
            $colon_validado = utf8_encode($row['colonia']);
            $colon = mb_strtoupper($colon_validado);
            $am_validado = utf8_encode($row['alc_mun']);
            $am = mb_strtoupper($am_validado);
            $est_validado = utf8_encode($row['estado']);
            $est = mb_strtoupper($est_validado);
            $buscar_arr[] = array("idx" => $idx, "codpos" => $codpos,"colon" => $colon, "am" =>$am, "est" =>$est);
        }
        
        echo json_encode($buscar_arr);
        exit;
    }

?>
