
<?php

    include "configuracion.php";
    $nombre = $_POST['nombre'];
    $apellido1 = $_POST['apellido1'];
    $apellido2 = $_POST['apellido2'];
    
        $consulta2 = "SELECT * FROM ct_empleados WHERE nombre= '$nombre' AND apellido_1 = '$apellido1' AND apellido_2 = '$apellido2'";
        $resultado2 = mysqli_query($conexion,$consulta2);
        $row = mysqli_fetch_row($resultado2); 

        $consulta3 = "SELECT id_movimiento_qr, tipo_movimiento, fini, anio, qna, unidad FROM fomope_qr WHERE curp='$row[2]' AND estatus = 'Revisión' ";
        $resultado3 = mysqli_query($conexion,$consulta3);
      
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
                "qna"=>$ver[4],
                "ur"=>$ver[5]
            );
            $i++;
        }

        echo json_encode($value);

      /*  $json = json_encode($row2, JSON_FORCE_OBJECT);
        var_dump($json);*/


       /* $out = array_values($row2);
        json_encode($out);*/
        exit;

?>
