
<?php

    include "configuracion.php";
    $request = $_POST['request'];

    if($request == 1){
        $busqueda = $_POST['busqueda'];
        $consulta1 = "SELECT * FROM ct_empleados WHERE nombre like'%".$busqueda."%'";
        $resultado1 = mysqli_query($conexion,$consulta1);
        while($row = mysqli_fetch_array($resultado1)){
            $response[] = array("value"=>$row['nombre'],"label"=>$row['nombre']);
        }
 
        echo json_encode($response);
        exit;
    }
    
    if($request == 2){
        $buscarid = $_POST['buscarid'];
        $consulta2 = "SELECT * FROM ct_empleados WHERE nombre=".$buscarid."";
        $resultado2 = mysqli_query($conexion,$consulta2);
        $buscar_arr = array();
        while($row = mysqli_fetch_array($resultado2)){
            $apellido = $row['nombre'];
            $buscar_arr[] = array("name_p1" => $apellido);
        }
        
        echo json_encode($buscar_arr);
        exit;
    }

?>
