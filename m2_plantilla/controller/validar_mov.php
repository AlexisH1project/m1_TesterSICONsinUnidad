<?php
	include "./librerias/configuracion.php";

    $value[] = array();
    $existeError = 0;

    $folio_shcp = $_POST['folio_shcp'];
    $estatus1 = utf8_encode($_POST['status']);
    $estatus = utf8_encode(strtoupper($_POST['status']));
    // $motivo_mov1 = utf8_encode($_POST['mot_m']);
    $motivo_mov = ucfirst($_POST['mot_m']);
    $cfp = $_POST['cod_f'];
    $ramo = $_POST['ramo1'];
    $ur = $_POST['unexp_1'];
    $zona = $_POST['zona1'];
    $nivel = $_POST['nivel1'];
    $codigo = $_POST['codigo1'];
    $plazas = $_POST['plazas'];
    $ramo2 = $_POST['ramo2'];
    $ur2 = $_POST['unexp2_1'];
    $zona2 = $_POST['zona2'];
    $nivel2 = $_POST['nivel2'];
    $codigo2 = $_POST['codigo2'];
    $plazas2 = $_POST['plazas2'];
    $cfp2 = $_POST['cod_f2'];
    $rfcT= $_POST['rfcL_1'];
    $apelli_1 = $_POST['apellido1'];
    $apelli_2 = $_POST['apellido2'];
    $nombreS = $_POST['nombre'];
    $autorizo = $_POST['nombreA'];
    $oficioSolicitud = $_POST['oficio_s'];
    $oficioRespuesta = $_POST['oficio_r'];
    $fechaVigencia = $_POST['fechaV'];
    $observaciones = $_POST['obs'];
    $usuarioSeguir = $_POST['userName'];

    // -------------------------- ahora detectamos en que qna nos encontramos
    $queryQna = "SELECT * FROM m1ct_fechasnomina";

    if($SiQueryQna = mysqli_query($conexion, $queryQna)){
        while($rowFechas = mysqli_fetch_row($SiQueryQna)){
                $qnaAplicada = $rowFechas[0];
                //echo "qna".$qnaAplicada."</br>";
        }
    }

    echo $estatus ." MASSS ". $motivo_mov;
    $hoy = "select CURDATE()";
    $tiempo ="select curTime()";
    if ($resultHoy = mysqli_query($conexion,$hoy) AND $resultTime = mysqli_query($conexion,$tiempo)) {
        $rowfecha = mysqli_fetch_row($resultHoy);
        $rowhora = mysqli_fetch_row($resultTime);
    }
    $hora = str_replace ( ":", '',$rowhora[0] ); 
    $fecha = str_replace ( "-", '',$rowfecha[0] ); 
    $fechaSistema = date("Y-m-d", strtotime($rowfecha[0]));
    $anio= date("Y", strtotime($rowfecha[0]));

    $ingresado=0;//Variable que almacenara los insert exitosos
	$error=0;//Variable que almacenara los errores en almacenamiento
	$duplicado=0;//Variable que almacenara los registros duplicados
    $arrayErr = array('idMov' => $folio_shcp , 'status' => $estatus1, 'motivoM' =>  $estatus,'cfp' => $cfp );
    // no se me hizo necesario poner esta validacion ---> $sql=mysqli_query($conexion,"SELECT * FROM movimientos_m2 WHERE codFederalPuestos = '$cfp'");//Consulta a la tabla productos
    // no se me hizo necesario poner esta validacion ---> $num=mysqli_num_rows($sql);//Cuenta el numero de registros devueltos por la consulta
                            //-----Tomamos el nombre que se extrae completo y lo partimos en apellidos y nombres
    //----Si el RFC no existe en la tabla ct_empleados creamos un registro nuevo
                                $sqlDup = "SELECT rfc FROM ct_empleados WHERE rfc = '$rfcT'";
                                $empDup = mysqli_query($conexion, $sqlDup);
                                $numEmp = mysqli_num_rows($empDup);
                                if($numEmp == 0 AND $empDup = mysqli_query($conexion, $sqlDup)){
                                    $valDup = mysqli_fetch_row($empDup);
                                    $empleadoReg = $valDup[0];
                                    $sqlEmpleado = "INSERT INTO ct_empleados (rfc, apellido_1, apellido_2, nombre) VALUE ('$rfcT','$apelli_1','$apelli_2','$nombreS')";
                                    $sqlInsertarEmpleado = mysqli_query($conexion, $sqlEmpleado);
                                }
                                $numExiteCfpP = 0;
        // ****************EXISTE CFP2 DE CRACION **************Proceso (1) ,query candados: Autorizado/Conversion; Autorizado/Reubicación 
                            if($sqlExiteCfpP =mysqli_query($conexion,"SELECT * FROM plazas_ctrlp_m2 WHERE codigoFederalPuestos = '$cfp2'")){
                                // $numExiteCfpP = mysqli_num_rows($sqlExiteCfpP);
                                $numExiteCfpP = 1;
                                $rowEjemplo = mysqli_fetch_row($sqlExiteCfpP);
                            }//Consulta a plazas 
        // ******************************Autorizado/Conversion 
                            if($cfp2 != "" && $estatus == "AUTORIZADO" && $motivo_mov == "Conversión" && $numExiteCfpP != 0){ //|| $cfp2 == "00-000-000000") $num==0 
                    //****************/ ahora corroboramos que el cfp2 no exista aun en la bd
                                    $sqlCfp2= mysqli_query($conexion,"SELECT * FROM plazas_ctrlp_m2 WHERE codigoFederalPuestos = '$cfp'");//Consulta a la tabla productos
                                    $num2=mysqli_num_rows($sqlCfp2);//Cuenta el numero de registros devueltos por la consulta
                                    $rowColor = mysqli_fetch_row($sqlCfp2);
                                    if ($num2 != 0 && $rowColor[34] != "rojo_ac") // se necesita saber si hay registro en la plantilla para poder CANCELARLO 
                                    {
                                        // if(){
                                            $queryInsertMov = "INSERT INTO movimientos_m2 (folio_shcp, estatus, motivo_mov, codFederalPuestos, ramo, ur, zona, nivel, codigo, plazas, ramo2, ur2, zona2,	nivel2, codigo2, plazas2, codFederalPuestos2, fechaVigencia, rfc, autorizo, observacionesExtras,oficioDeSolicitud, oficioRespuesta, usuarioEdicion,	fechaCaptura, quincenaAplicada, anio ) VALUES ('$folio_shcp', '$estatus1','$motivo_mov','$cfp','$ramo','$ur','$zona','$nivel','$codigo','$plazas','$ramo2','$ur2','$zona2','$nivel2','$codigo2','$plazas2','$cfp2','$fechaVigencia','$rfcT','$autorizo','$observaciones','$oficioSolicitud','$oficioRespuesta' ,'$usuarioSeguir', '$fechaSistema', '$qnaAplicada', '$anio')";
                    /*CANCELAMOS LA PLAZA*/ $queryUpdatePlaza = "UPDATE plazas_ctrlp_m2 SET cfpAsignado = '$cfp2', 	comprobanteExistencia_cfp = '1', estatus = 'Autorizado', tipoMovimiento = 'Conversión' , color_accion = 'rojo_ac' WHERE codigoFederalPuestos = '$cfp'";
                                            // $queryInsertPlaza = "INSERT INTO plazas_ctrlp_m2 (ramo , unidadResponsable , grupoPersonal , gfuncionalResposabilidad , zonaEconomica , nivel , codigoPuesto , rangoSalarial , codigoFederalPuestos , regimenDeSeguridadSocial , curvaSalarial , tipoPlaza , tipoPersonal , tipoNombramiento , grupoJerarquicoDePersonal , argumentoDePuestos , fechaInicioVigencia , fechaFinalVigencia , numDePlazas , numDeHoras , indiceTabulador , subIndiceTabulador , rfc , clavePresupuestal , observacionesExtras , cfpAsignado , comprobanteExistencia_cfp , estatus , tipoMovimiento , usuarioEdicion , fechaCaptura , quincenaAplicada , anio ) VALUE ";
                                            if ($insert=mysqli_query($conexion,$queryInsertMov) && $updateP=mysqli_query($conexion,$queryUpdatePlaza))
                                            {
                                                echo $msj='<font color=green>Producto <b>'.$cfp.'</b> Guardado</font><br/>';
                                                $ingresado+=1;
                                            }//fin del if que comprueba que se guarden los datos
                                            else//sino ingresa el producto
                                            {
                                                $existeError = 1;
                                                array_push($value, "Existe error en Actualizar la plaza o al Guardar MOV ".$cfp);
                                                
                                                // echo $msj='<font color=red>Producto <b>'.$cfp.' </b> NO Guardado </font><br/>';
                                                $error+=1;
                                            }
                                        // }
                                    }else
                                    {
                                        $duplicado+=1;
                                        $existeError = 1;
                                        array_push($value, "No existe plaza o la plaza ya fue cancelada");
                                        
                                    // 	echo $duplicate='<font color=red>El Producto codigo <b>'.$cfp.'</b> Esta duplicado<br></font>';
                                    }
                            }else//fin de if que comprueba que no haya en registro duplicado
    // ******************************Autorizado/Reubicacion 
                            if($cfp2 != "" && $estatus == "AUTORIZADO" && $motivo_mov == "Reubicación"  && $numExiteCfpP != 0){ //|| $cfp2 == "00-000-000000") $num==0 && 
                                //****************/ ahora corroboramos que el cfp2 no exista aun en la bd
                                                // $sqlCfp2= mysqli_query($conexion,"SELECT * FROM movimientos_m2 WHERE codFederalPuestos = '$cfp' AND codFederalPuesto2 = '$cfp2' ");//Consulta a la tabla productos
                                                // $num2=mysqli_num_rows($sqlCfp2);//Cuenta el numero de registros devueltos por la consulta
                                                $sqlCfp2= mysqli_query($conexion,"SELECT * FROM plazas_ctrlp_m2 WHERE codigoFederalPuestos = '$cfp'");//Consulta a la tabla productos
                                                $num2=mysqli_num_rows($sqlCfp2);//Cuenta el numero de registros devueltos por la consulta
                                                $rowColor = mysqli_fetch_row($sqlCfp2);
                                                if ($num2 != 0 && $rowColor[34] != "rojo_ar") // se necesita saber si hay registro en la plantilla para poder CANCELARLO 
                                                {
                                                    $queryInsertMov = "INSERT INTO movimientos_m2 (folio_shcp, estatus, motivo_mov, codFederalPuestos, ramo, ur, zona, nivel, codigo, plazas, ramo2, ur2, zona2,	nivel2, codigo2, plazas2, codFederalPuestos2, fechaVigencia, rfc, autorizo, observacionesExtras,oficioDeSolicitud, oficioRespuesta, usuarioEdicion,	fechaCaptura, quincenaAplicada, anio ) VALUES ('$folio_shcp', '$estatus1','$motivo_mov','$cfp','$ramo','$ur','$zona','$nivel','$codigo','$plazas','$ramo2','$ur2','$zona2','$nivel2','$codigo2','$plazas2','$cfp2','$fechaVigencia','$rfcT','$autorizo','$observaciones','$oficioSolicitud','$oficioRespuesta' ,'$usuarioSeguir', '$fechaSistema', '$qnaAplicada', '$anio')";
                /*CANCELAMOS LA PLAZA*/             $queryUpdatePlaza = "UPDATE plazas_ctrlp_m2 SET cfpAsignado = '$cfp2', 	comprobanteExistencia_cfp = '1', estatus = 'Autorizado', tipoMovimiento = 'Reubicación', color_accion = 'rojo_ar' WHERE codigoFederalPuestos = '$cfp'";
                                                    if ($insert=mysqli_query($conexion,$queryInsertMov) && $updateP=mysqli_query($conexion,$queryUpdatePlaza))
                                                    {
                                                        echo $msj='<font color=green>Producto <b>'.$cfp.'</b> Guardado</font><br/>';
                                                        $ingresado+=1;
                                                    }//fin del if que comprueba que se guarden los datos
                                                    else//sino ingresa el producto
                                                    {
                                                        // echo $msj='<font color=red>Producto <b>'.$cfp.' </b> NO Guardado </font><br/>';
                                                        $existeError = 1;
                                                        array_push($value, "Existe error en Actualizar la plaza o al Guardar MOV ".$cfp);
                                                        
                                                        $error+=1;
                                                    }
                                                }else
                                                {
                                                    $duplicado+=1;
                                                    $existeError = 1;
                                                    array_push($value, "No existe plaza o la plaza ya fue cancelada");
                                                    
                                                // 	echo $duplicate='<font color=red>El Producto codigo <b>'.$cfp.'</b> Esta duplicado<br></font>';
                                                }
                                        }								
            // ******************************Autorizado/Cambio de Adscripción 
                                        else 
                                        if($cfp2 != "" && $estatus == "AUTORIZADO" && $motivo_mov == "Cambio de Adscripción"  && $numExiteCfpP != 0){ //|| $cfp2 == "00-000-000000")
            //****************/ ahora corroboramos que el cfp2 no exista aun en la bd
                                            // $sqlCfp2= mysqli_query($conexion,"SELECT * FROM movimientos_m2 WHERE codFederalPuestos = '$cfp2'");//Consulta a la tabla productos
                                            // $num3=mysqli_num_rows($sqlCfp2);//Cuenta el numero de registros devueltos por la consulta
                                            $sqlCfp2= mysqli_query($conexion,"SELECT * FROM plazas_ctrlp_m2 WHERE codigoFederalPuestos = '$cfp'");//Consulta a la tabla productos
                                            $num2=mysqli_num_rows($sqlCfp2);//Cuenta el numero de registros devueltos por la consulta
                                            $rowColor = mysqli_fetch_row($sqlCfp2);
                                                if ($num2 != 0 && $rowColor[34] != "rojo_aa") // se necesita saber si hay registro en la plantilla para poder CANCELARLO 
                                                {
                                                    $queryInsertMov = "INSERT INTO movimientos_m2 (folio_shcp, estatus, motivo_mov, codFederalPuestos, ramo, ur, zona, nivel, codigo, plazas, ramo2, ur2, zona2,	nivel2, codigo2, plazas2, codFederalPuestos2, fechaVigencia, rfc, autorizo, observacionesExtras,oficioDeSolicitud, oficioRespuesta, usuarioEdicion,	fechaCaptura, quincenaAplicada, anio ) VALUES ('$folio_shcp', '$estatus1','$motivo_mov','$cfp','$ramo','$ur','$zona','$nivel','$codigo','$plazas','$ramo2','$ur2','$zona2','$nivel2','$codigo2','$plazas2','$cfp2','$fechaVigencia','$rfcT','$autorizo','$observaciones','$oficioSolicitud','$oficioRespuesta' ,'$usuarioSeguir', '$fechaSistema', '$qnaAplicada', '$anio')";
                                                    $queryUpdatePlaza = "UPDATE plazas_ctrlp_m2 SET cfpAsignado = '$cfp2', 	comprobanteExistencia_cfp = '1', estatus = 'Autorizado', tipoMovimiento = 'Cambio de Adscripción', color_accion = 'rojo_aa' WHERE codigoFederalPuestos = '$cfp'";
                                                    if ($insert=mysqli_query($conexion,$queryInsertMov) && $updateP=mysqli_query($conexion,$queryUpdatePlaza))
                                                    {
                                                        echo $msj='<font color=green>Producto <b>'.$cfp.'</b> Guardado</font><br/>';
                                                        $ingresado+=1;
                                                    }//fin del if que comprueba que se guarden los datos
                                                    else//sino ingresa el producto
                                                    {
                                                        $existeError = 1;
                                                        // echo $msj='<font color=red>Producto <b>'.$cfp.' </b> NO Guardado </font><br/>';
                                                        array_push($value, "Existe error en Actualizar la plaza o al Guardar MOV ".$cfp);
                                                        
                                                        $error+=1;
                                                    }
                                                }else
                                                {
                                                    $duplicado+=1;
                                                    $existeError = 1;
                                                    array_push($value, "No existe plaza o la plaza ya fue cancelada ".$cfp);
                                                }
                                        }else
                                            // ******************************Autorizado/Nueva Creación 
                                            if($cfp2 != "" && $estatus == "AUTORIZADO" && $motivo_mov == "Nueva Creación"  && $numExiteCfpP != 0){ //|| $cfp2 == "00-000-000000")
                                            //****************/ ahora corroboramos que el cfp2 no exista aun en la bd
                                                // $sqlCfp2= mysqli_query($conexion, "SELECT * FROM movimientos_m2 WHERE codFederalPuestos = '$cfp2'");//Consulta a la tabla productos
                                                // $num3=mysqli_num_rows($sqlCfp2);//Cuenta el numero de registros devueltos por la consulta
                                                    $sqlExistP = mysqli_query($conexion, "SELECT * FROM plazas_ctrlp_m2 WHERE codigoFederalPuestos = '$cfp2' AND color_accion != 'blanco' OR codigoFederalPuestos = '$cfp2' AND color_accion != 'verde_an'");//Consulta a la tabla productos
                                                    $numeXt = mysqli_num_rows($sqlExistP);//Cuenta el numero de registros devueltos por la consulta
                                                    if ($numeXt != 0) // existe al menos 1 plaza libre
                                                    {
                                                        $queryUpdatePlaza = "UPDATE plazas_ctrlp_m2 SET cfpAsignado = '$cfp2', 	comprobanteExistencia_cfp = '1', estatus = 'Autorizado', tipoMovimiento = 'Nueva Creación', color_accion = 'verde_an' WHERE codigoFederalPuestos = '$cfp'";
                                                        $queryInsertMov = "INSERT INTO movimientos_m2 (folio_shcp, estatus, motivo_mov, codFederalPuestos, ramo, ur, zona, nivel, codigo, plazas, ramo2, ur2, zona2,	nivel2, codigo2, plazas2, codFederalPuestos2, fechaVigencia, rfc, autorizo, observacionesExtras,oficioDeSolicitud, oficioRespuesta, usuarioEdicion,	fechaCaptura, quincenaAplicada, anio ) VALUES ('$folio_shcp', '$estatus1','$motivo_mov','$cfp','$ramo','$ur','$zona','$nivel','$codigo','$plazas','$ramo2','$ur2','$zona2','$nivel2','$codigo2','$plazas2','$cfp2','$fechaVigencia','$rfcT','$autorizo','$observaciones','$oficioSolicitud','$oficioRespuesta' ,'$usuarioSeguir', '$fechaSistema', '$qnaAplicada', '$anio')";
                                                    // }
                                                    // if ($num3 == 0)
                                                    // {
    
                                                        if ($insert=mysqli_query($conexion,$queryInsertMov))
                                                        {
                                                            echo $msj='<font color=green>Producto <b>'.$cfp.'</b> Guardado</font><br/>';
                                                            $ingresado+=1;
                                                        }//fin del if que comprueba que se guarden los datos
                                                        else//sino ingresa el producto
                                                        {
                                                            // echo $msj='<font color=red>Producto <b>'.$cfp.' </b> NO Guardado </font><br/>';
                                                            $existeError = 1;
                                                            array_push($value, "Existe error al crear la plaza");
                                                            
                                                            $error+=1;
                                                        }
                                                    // }
                                                    }else
                                                    {
                                                        $duplicado+=1;
                                                        $existeError = 1;
                                                        array_push($value, "No existe plaza o la plaza ya fue cancelada ".$cfp);
                                                    }
                                            }else 
    // ****************************** ****************** Transito/Conversión :: $numExiteCfpP ; se refiere a si es 1 existe CFP2, si es 0 no hay registro
                                            if(($cfp2 == "" && $estatus == "TRANSITO" && $motivo_mov == "Conversión") || ($cfp2 == "" && $estatus == "TRANSITO" && $motivo_mov == "Cambio de Adscripción")){ //|| $cfp2 == "00-000-000000")
                                            //****************/ ahora corroboramos que el cfp2 no exista aun en la bd
                                                if($motivo_mov == "Conversión"){
                                                    $color_mov = "amarillo_tc";
                                                }elseif($motivo_mov == "Cambio de Adscripción") {
                                                    $color_mov = "amarillo_ta";
                                                }
                                                $sqlCfp2= mysqli_query($conexion,"SELECT * FROM plazas_ctrlp_m2 WHERE codigoFederalPuestos = '$cfp' AND (color_accion = 'blanco' OR color_accion = 'verde_an')");//Consulta a la tabla productos
                                                $num2=mysqli_num_rows($sqlCfp2);//Cuenta el numero de registros devueltos por la consulta
                                                                            // $sqlCfp2= mysqli_query($conexion, "SELECT * FROM movimientos_m2 WHERE codFederalPuestos = '$cfp2'");//Consulta a la tabla productos
                                                                            // $num3=mysqli_num_rows($sqlCfp2);//Cuenta el numero de registros devueltos por la consulta
                
                                                if ($num2 != 0) 
                                                {
                                                    $queryInsertMov = "INSERT INTO movimientos_m2 (folio_shcp, estatus, motivo_mov, codFederalPuestos, ramo, ur, zona, nivel, codigo, plazas, ramo2, ur2, zona2,	nivel2, codigo2, plazas2, codFederalPuestos2, fechaVigencia, rfc, autorizo, observacionesExtras,oficioDeSolicitud, oficioRespuesta, usuarioEdicion,	fechaCaptura, quincenaAplicada, anio ) VALUES ('$folio_shcp', '$estatus1','$motivo_mov','$cfp','$ramo','$ur','$zona','$nivel','$codigo','$plazas','$ramo2','$ur2','$zona2','$nivel2','$codigo2','$plazas2','$cfp2','$fechaVigencia','$rfcT','$autorizo','$observaciones','$oficioSolicitud','$oficioRespuesta' ,'$usuarioSeguir', '$fechaSistema', '$qnaAplicada', '$anio')";
                                                    $queryUpdatePlaza = "UPDATE plazas_ctrlp_m2 SET comprobanteExistencia_cfp = '', estatus = 'Transito', tipoMovimiento = '$motivo_mov', color_accion = '$color_mov' WHERE codigoFederalPuestos = '$cfp'";
                                                    if ($insert=mysqli_query($conexion,$queryInsertMov) && $updateP=mysqli_query($conexion,$queryUpdatePlaza))
                                                    {
                                                        echo $msj='<font color=green>Producto <b>'.$cfp.'</b> Guardado</font><br/>';
                                                        $ingresado+=1;
                                                    }//fin del if que comprueba que se guarden los datos
                                                    else//sino ingresa el producto
                                                    {
                                                        $existeError = 1;
                                                        // echo $msj='<font color=red>Producto <b>'.$cfp.' </b> NO Guardado </font><br/>';
                                                        array_push($value, "Existe error en Actualizar la plaza o al Guardar MOV ".$cfp);
                                                        $error+=1;
                                                    }
                                                                                // }else
                                                                                // {
                                                                                // 	$duplicado+=1;
                                                                                // 	
                                                                                // 	echo $duplicate='<font color=red>El Producto codigo <b>'.$cfp.'</b> Esta duplicado<br></font>';
                                                                                // }
                                                }else{
                                                    $duplicado+=1;
                                                    $existeError = 1;
                                                    array_push($value, "No existe plaza o la plaza ya fue cancelada ".$cfp);
                                                    
                                                    // echo $duplicate='<font color=red>El Producto codigo <b>'.$cfp.'</b> Esta duplicado<br></font>';
                                                }
                                            }else                                       
                                                 // ****************************** ****************** cancelado/Reubicación :: $numExiteCfpP ; se refiere a si es 1 existe CFP2, si es 0 no hay registro
                                                if(($cfp2 == "" && $estatus == "CANCELADO" && $motivo_mov == "Reubicación ") || ($cfp2 == "" && $estatus == "CANCELADO" && $motivo_mov == "Conversión")){ //|| $cfp2 == "00-000-000000")
                                                    //****************/ ahora corroboramos que el cfp2 no exista aun en la bd
                                                        if($motivo_mov == "Reubicación"){
                                                            $color_mov = "rojo_cr";
                                                        }elseif($motivo_mov == "Conversión") {
                                                            $color_mov = "rojo_cc";
                                                        }
                                                        $sqlCfp2= mysqli_query($conexion,"SELECT * FROM plazas_ctrlp_m2 WHERE codigoFederalPuestos = '$cfp' AND (color_accion = 'blanco' OR color_accion = 'verde_an')");//Consulta a la tabla productos
                                                        $num2=mysqli_num_rows($sqlCfp2);//Cuenta el numero de registros devueltos por la consulta
                                                                                    // $sqlCfp2= mysqli_query($conexion, "SELECT * FROM movimientos_m2 WHERE codFederalPuestos = '$cfp2'");//Consulta a la tabla productos
                                                                                    // $num3=mysqli_num_rows($sqlCfp2);//Cuenta el numero de registros devueltos por la consulta
                        
                                                        if ($num2 != 0) 
                                                        {
                                                            $queryInsertMov = "INSERT INTO movimientos_m2 (folio_shcp, estatus, motivo_mov, codFederalPuestos, ramo, ur, zona, nivel, codigo, plazas, ramo2, ur2, zona2,	nivel2, codigo2, plazas2, codFederalPuestos2, fechaVigencia, rfc, autorizo, observacionesExtras,oficioDeSolicitud, oficioRespuesta, usuarioEdicion,	fechaCaptura, quincenaAplicada, anio ) VALUES ('$folio_shcp', '$estatus1','$motivo_mov','$cfp','$ramo','$ur','$zona','$nivel','$codigo','$plazas','$ramo2','$ur2','$zona2','$nivel2','$codigo2','$plazas2','$cfp2','$fechaVigencia','$rfcT','$autorizo','$observaciones','$oficioSolicitud','$oficioRespuesta' ,'$usuarioSeguir', '$fechaSistema', '$qnaAplicada', '$anio')";
                                                            $queryUpdatePlaza = "UPDATE plazas_ctrlp_m2 SET comprobanteExistencia_cfp = '', estatus = 'Reubicación', tipoMovimiento = '$motivo_mov', color_accion = '$color_mov' WHERE codigoFederalPuestos = '$cfp'";
                                                            if ($insert=mysqli_query($conexion,$queryInsertMov) && $updateP=mysqli_query($conexion,$queryUpdatePlaza))
                                                            {
                                                                echo $msj='<font color=green>Producto <b>'.$cfp.'</b> Guardado</font><br/>';
                                                                $ingresado+=1;
                                                            }//fin del if que comprueba que se guarden los datos
                                                            else//sino ingresa el producto
                                                            {
                                                                $existeError = 1;
                                                                // echo $msj='<font color=red>Producto <b>'.$cfp.' </b> NO Guardado </font><br/>';
                                                                array_push($value, "Existe error en Actualizar la plaza o al Guardar MOV ".$cfp);
                                                                $error+=1;
                                                            }
                                                                                        // }else
                                                                                        // {
                                                                                        // 	$duplicado+=1;
                                                                                        // 	
                                                                                        // 	echo $duplicate='<font color=red>El Producto codigo <b>'.$cfp.'</b> Esta duplicado<br></font>';
                                                                                        // }
                                                        }else{
                                                            $duplicado+=1;
                                                            $existeError = 1;
                                                            array_push($value, "No existe plaza o la plaza ya fue cancelada ".$cfp);
                                                            
                                                            // echo $duplicate='<font color=red>El Producto codigo <b>'.$cfp.'</b> Esta duplicado<br></font>';
                                                        }
                                                }else
                                            // ****************************** ****************** cancelado/Reubicación :: $numExiteCfpP ; se refiere a si es 1 existe CFP2, si es 0 no hay registro
                                                if($cfp2 == "" && $estatus == "DICTAMINADOR SFP" && $motivo_mov == "Conversión"){ //|| $cfp2 == "00-000-000000")
                                                    //****************/ ahora corroboramos que el cfp2 no exista aun en la bd
                                                        $sqlCfp2= mysqli_query($conexion,"SELECT * FROM plazas_ctrlp_m2 WHERE codigoFederalPuestos = '$cfp' AND (color_accion = 'blanco' OR color_accion = 'verde_an')");//Consulta a la tabla productos
                                                        $num2=mysqli_num_rows($sqlCfp2);//Cuenta el numero de registros devueltos por la consulta
                                                                                    // $sqlCfp2= mysqli_query($conexion, "SELECT * FROM movimientos_m2 WHERE codFederalPuestos = '$cfp2'");//Consulta a la tabla productos
                                                                                    // $num3=mysqli_num_rows($sqlCfp2);//Cuenta el numero de registros devueltos por la consulta
                        
                                                        if ($num2 != 0) 
                                                        {
                                                            $queryInsertMov = "INSERT INTO movimientos_m2 (folio_shcp, estatus, motivo_mov, codFederalPuestos, ramo, ur, zona, nivel, codigo, plazas, ramo2, ur2, zona2,	nivel2, codigo2, plazas2, codFederalPuestos2, fechaVigencia, rfc, autorizo, observacionesExtras,oficioDeSolicitud, oficioRespuesta, usuarioEdicion,	fechaCaptura, quincenaAplicada, anio ) VALUES ('$folio_shcp', '$estatus1','$motivo_mov','$cfp','$ramo','$ur','$zona','$nivel','$codigo','$plazas','$ramo2','$ur2','$zona2','$nivel2','$codigo2','$plazas2','$cfp2','$fechaVigencia','$rfcT','$autorizo','$observaciones','$oficioSolicitud','$oficioRespuesta' ,'$usuarioSeguir', '$fechaSistema', '$qnaAplicada', '$anio')";
                                                            $queryUpdatePlaza = "UPDATE plazas_ctrlp_m2 SET comprobanteExistencia_cfp = '', estatus = 'Reubicación', tipoMovimiento = '$motivo_mov', color_accion = 'rojo_dc' WHERE codigoFederalPuestos = '$cfp'";
                                                            if ($insert=mysqli_query($conexion,$queryInsertMov) && $updateP=mysqli_query($conexion,$queryUpdatePlaza))
                                                            {
                                                                echo $msj='<font color=green>Producto <b>'.$cfp.'</b> Guardado</font><br/>';
                                                                $ingresado+=1;
                                                            }//fin del if que comprueba que se guarden los datos
                                                            else//sino ingresa el producto
                                                            {
                                                                $existeError = 1;
                                                                // echo $msj='<font color=red>Producto <b>'.$cfp.' </b> NO Guardado </font><br/>';
                                                                array_push($value, "Existe error en Actualizar la plaza o al Guardar MOV ".$cfp);
                                                                $error+=1;
                                                            }
                                                                                        // }else
                                                                                        // {
                                                                                        // 	$duplicado+=1;
                                                                                        // 	
                                                                                        // 	echo $duplicate='<font color=red>El Producto codigo <b>'.$cfp.'</b> Esta duplicado<br></font>';
                                                                                        // }
                                                        }else{
                                                            $duplicado+=1;
                                                            $existeError = 1;
                                                            array_push($value, "No existe plaza o la plaza ya fue cancelada ".$cfp);
                                                            
                                                            // echo $duplicate='<font color=red>El Producto codigo <b>'.$cfp.'</b> Esta duplicado<br></font>';
                                                        }
    
                                            }else{
                                                $duplicado+=1;
                                                $existeError = 1;
                                                array_push($value, "No cumple con las especificaciones que se necesitan ".$cfp);
                                                
                                                // echo $duplicate='<font color=red>El Producto codigo <b>'.$cfp.'</b> Esta duplicado<br></font>';
                                            }
                                            print_r($value);
                                            
            if($duplicado > 0 && $existeError == 1){
                echo "<a href=\"javascript:history.go(-1)\">GO BACK</a>";
            }
?>