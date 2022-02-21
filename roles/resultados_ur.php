
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
// *********************************** opcion de sub_unidad
    if($request == 3){
        $busqueda = $_POST['buscarid'];
            // **************** sacamos sub_unidad
        $sql_sub_ur = "SELECT * FROM ct_agenda_ur WHERE ur='$busqueda'";
        $sql_count = "SELECT COUNT(*) FROM ct_agenda_ur WHERE ur='$busqueda'";
        $res_c = mysqli_query($conexion, $sql_count);
        $contenido = mysqli_fetch_row($res_c);
        if($contenido[0] >0){
            $resultado_sub_ur = mysqli_query($conexion,$sql_sub_ur);
            $i=0;
            while($ver=mysqli_fetch_row($resultado_sub_ur)){ 
                $value[$i] = array( 
                    "id_miembro"=>$ver[0],
                    "sub_ur"=>$ver[2],
                    "descripcion_ur"=>$ver[3]
                );
                $i++;
            }
        }else{
            $value[0] = array( 
                "id_miembro"=>'x',
                "sub_ur"=>'x',
                "descripcion_ur"=>'x'
            );
        }
            echo json_encode($value);
            exit;
            
        }
?>
