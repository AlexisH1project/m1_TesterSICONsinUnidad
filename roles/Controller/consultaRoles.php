
<?php

    include "configuracion.php";
   $user =  $_GET["usuarioSeguir"];
    // $ROL = $_POST['rol'];
    // /*
   
    $consultaRol = " SELECT * FROM usuarios WHERE usuario = '".$user."'";
        
            //echo $user;
    if($consultaRol = mysqli_query($conexion,$consultaRol)){
                $row = mysqli_fetch_assoc($consultaRol);
                $ROL = $row['id_rol'];
                $unidad =  $row['unidadCorrespondiente'];
                // $alc_mun = utf8_encode($row['alc_mun']);
                // $estado = utf8_encode($row['estado']);
                // $colonia = utf8_encode($row['colonia']);  
                  

             if($ROL == 0 && $unidad == ''){
             
                        // echo '<script language="javascript">alert("Datos correctos/ Puedes dar de Baja o Actualizar");</script>';
                    header('Location:../../roles/luluConsulta.php?usuario_rol='.urlencode($user));
                       // echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=./capturista.php>';

            }
            if($ROL == 0 &&  $unidad != ''){
             
                        // echo '<script language="javascript">alert("Datos correctos/ Puedes dar de Baja o Actualizar");</script>';
                    header('Location:../../roles/unidadCaptura.php?usuario_rol='.urlencode($user));
                       // echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=./capturista.php>';

            }
            
            if($ROL == 1){
                        
                      //  echo '<script language="javascript">alert("Datos correctos/ Puedes dar Alta");</script>';
                    header('Location:../../roles/lulu.php?usuario_rol='.urlencode($user));
                  
            }

           if($ROL == 2){
                        //echo '<script language="javascript">alert("Datos correctos/ Puedes dar Alta");</script>';
                     header('Location:../../roles/analista.php?usuario_rol='.urlencode($user));
            }  

            if($ROL == 3){
                        //echo '<script language="javascript">alert("Datos correctos/ Puedes dar Alta");</script>';
                    header('Location:../../roles/capturistaTostado.php?usuario_rol='.urlencode($user));//cambiar
            }
            if($ROL == 4){
                        //echo '<script language="javascript">alert("Datos correctos/ Puedes dar Alta");</script>';
                    header('Location:../../roles/dario.php?usuario_rol='.urlencode($user));//cambiar
            }if($ROL == 6){
                        //echo '<script language="javascript">alert("Datos correctos/ Puedes dar Alta");</script>';
                    header('Location:../../m2_plantilla/controller/plazas.php?usuario_rol='.urlencode($user));//cambiar
            }if($ROL == 7){
                //echo '<script language="javascript">alert("Datos correctos/ Puedes dar Alta");</script>';
                header('Location:../../roles/bandejaBajas.php?usuario_rol='.urlencode($user));//cambiar
            }

             
     }




?>
