
<?php

    include "configuracion.php";
    $idBuscar = $_POST['val'];

    $sqlHistorial = "SELECT * FROM historial WHERE id_movimiento = '$idBuscar' ";
    $sqlRechazo = "SELECT * FROM rechazos WHERE id_movimiento = '$idBuscar' ";
    $bandera = 0 ;

    if($resHistorico = mysqli_query($conexion, $sqlHistorial)){
        
        while($rowHistorial = mysqli_fetch_assoc($resHistorico)){
            
            $sqlRol = "SELECT * FROM usuarios WHERE usuario = '$rowHistorial[usuario]' " ;
                       // $resRol = mysqli_query($conexion, $sqlRol);
            //$rowRol = mysqli_fetch_assoc($resRol);

            if($resRol = mysqli_query($conexion, $sqlRol)){
                 $rowRol = mysqli_fetch_assoc($resRol);

            }else{

            }
            $resRechazo = mysqli_query($conexion,$sqlRechazo);
            while($rowRechazos = mysqli_fetch_assoc($resRechazo)){
                    if($rowHistorial['usuario'] == $rowRechazos['usuario'] AND $rowHistorial['fechaMovimiento'] == $rowRechazos['fechaRechazo'] AND $rowHistorial['id_movimiento'] == $rowRechazos['id_movimiento']){
                        $bandera = 1;
                        if($rowRol['id_rol'] == 0 OR $rowRol['id_rol'] == 3){
                           transformarImprimir( $rowRol['id_rol'] , "Captura", $rowHistorial['fechaMovimiento'] );
                        }else{
                            transformarImprimir( $rowRol['id_rol'] , "Rechazado", $rowHistorial['fechaMovimiento'] );
                         } 

                    }
            }

            if($bandera == 0){
                 if($rowRol['id_rol'] == 0 OR $rowRol['id_rol'] == 3){
                         transformarImprimir( $rowRol['id_rol'] , "Captura", $rowHistorial['fechaMovimiento'] );
                    }else{
                         transformarImprimir( $rowRol['id_rol'] , "Autorización" , $rowHistorial['fechaMovimiento']);
                    }

            }

                                        

        }
    }else{
        echo "no existe";
    }

    function transformarImprimir($idRol,$estado,$fecha){

            switch ($idRol) {
                                            case '0':
                                                $estadoF = 'DDSCH '.$estado.' '.$fecha;
                                                break;
                                            case '1':
                                                $estadoF = 'DDSCH '.$estado.' '.$fecha;
                                                break;
                                            case '2':
                                                $estadoF = 'DSPO '.$estado.' '.$fecha;
                                                break;      
                                            case '3':
                                                $estadoF = 'DSPO '.$estado.' '.$fecha;
                                                break;
                                            case '4':
                                                $estadoF = 'DIPSP y DGRHyO '.$estado.' '.$fecha;
                                                break;  
                                            case '7':
                                                $estadoF = 'DGRHyO Baja '.$estado.' '.$fecha;
                                                break;  
                                            default:
                                                $estadoF = $idRol;

                                                break;
                                        }
                echo "<h5><i><n>".$estadoF."</h5></i></n> <br>";
    }

?>
