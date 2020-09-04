
<?php

    include "configuracion.php";
    $request = $_POST['request'];

    if($request == 1){
        $busqueda = $_POST['busqueda'];
        $consulta1 = "SELECT * FROM ct_empleados WHERE rfc like'%".$busqueda."%'";
        $resultado1 = mysqli_query($conexion,$consulta1);

        while($row = mysqli_fetch_array($resultado1)){
            $response[] = array("value"=>utf8_encode($row['id_empleado']),"label"=>utf8_encode($row['rfc']));
        }
       
        echo json_encode($response);
        exit;
    }
    
    if($request == 2){
        $buscarid = $_POST['buscarid'];
        $consulta2 = "SELECT * FROM ct_empleados WHERE id_empleado=".$buscarid."";
        $resultado2 = mysqli_query($conexion,$consulta2);
        $row = mysqli_fetch_row($resultado2); 

        $consulta3 = "SELECT id_movimiento, codigoMovimiento, vigenciaDel, anio, qnaDeAfectacion FROM fomope WHERE rfc='$row[1]'";
        $resultado3 = mysqli_query($conexion,$consulta3);
       // $row2 = mysqli_fetch_row($resultado3); 
       // $rowCombinado = array_merge($row,$row2);
        //array("data1" => $row, "data2" => $row2)
   /*   $value = array( 
                "id"=>"",
                "codigo"=>"",
                "fecha"=>"" 

            );*/
        $value[0] = array( 
                "apellido1"=>$row[3],
                "apellido2"=>$row[4],
                "nombre"=>$row[5],
                "curp"=>$row[2]
            );
        $value[1]= 0;
        $i = 1;
        while($ver=mysqli_fetch_row($resultado3)){ 
            $value[$i] = array( 
                "id"=>$ver[0],
                "codigo"=>$ver[1],
                "fecha"=>$ver[2],
                "anio"=>$ver[3],
                "qna"=>$ver[4]
            );
            $i++;
        }

        echo json_encode($value);

      /*  $json = json_encode($row2, JSON_FORCE_OBJECT);
        var_dump($json);*/


       /* $out = array_values($row2);
        json_encode($out);*/
        exit;
    }

?>
