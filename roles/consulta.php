<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    
    <?php
    function enviarFom($ap,$unidad,$partida,$codigo,$pg,$ai,$gf,$f,$sf,$puesto){
        echo '<form id= "myForm" action="form_FOMOPE.php" method="POST">
        <input type="text" value= "'.$ap.'" name="ap" hidden>
        <input type="text" value= "'.$unidad.'" name="unidad" hidden>
        <input type="text" value= "'.$partida.'" name="partida" hidden>
        <input type="text" value= "'.$codigo.'" name="codigo" hidden>
        <input type="text" value= "'.$pg.'" name="pg" hidden>
        <input type="text" value= "'.$ai.'" name="ai" hidden>
        <input type="text" value= "'.$gf.'" name="gf" hidden>
        <input type="text" value= "'.$f.'" name="f" hidden>
        <input type="text" value= "'.$sf.'" name="sf" hidden>
        <input type="text" value= "'.$puesto.'" name="puesto" hidden>


        </form>';

        echo '<script>document.getElementById("myForm").submit();</script>';
    }
    include "configuracion.php";
    $MOV = $_POST['mov'];

    $ap = $_POST['apSelect'];
    $unidad = $_POST['unidadSelect'];          
    $partida= $_POST['partidaSelect'];            
    $codigo  = $_POST['codigoSelect'];          
    $pg     = $_POST['pgSelect'];       
    $ai  = $_POST['aiSelect'];           
    $gf   = $_POST['gfSelect'];         
    $f    = $_POST['fSelect'];          
    $sf   = $_POST['sfSelect'];         
    $puesto  = $_POST['puestoSelect'];

     /*
    1= BAJA
    2= ALTA
    3= ACTUALIZACION DE DATOS
    */


    if($MOV == 1 OR $MOV == 3){
        $curp = $_POST['curp'];
        $consulta2 = " SELECT * FROM plazas WHERE CURP ='$curp' AND clavePrograma = '$ap' AND id_ur = '$unidad' AND id_partida = '$partida' AND codigo = '$codigo' AND claveEntidad = '$pg' AND AI = '$ai' AND GF = '$gf'  AND F = '$f' AND SF = '$sf' AND puesto = '$puesto' ";
    
        if($resultado2 = mysqli_query($conexion,$consulta2)){
            $row = mysqli_fetch_array($resultado2);
            if(empty($row)){
                echo '<script language="javascript">alert("No existe la plaza con codigo: '.$codigo.' asociada al curp: '.$curp.'");</script>';
                echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=./capturista.php">';
            }else{
                echo '<script language="javascript">alert("Datos correctos/ Puedes dar de Baja o Actualizar");</script>';
                enviarFom($ap,$unidad,$partida,$codigo,$pg,$ai,$gf,$f,$sf,$puesto);
            }   
        }else{
            echo '<script language="javascript">alert("Existe un error");</script>';
            echo '<META HTTP-EQUIV="REFRESH" CONTENT="5;URL=./capturista.php">';
        }
    }
    
    if($MOV == 2){
        $consulta2 = " SELECT * FROM plazas WHERE CURP ='' AND clavePrograma = '$ap' AND id_ur = '$unidad' AND id_partida = '$partida' AND codigo = '$codigo' AND claveEntidad = '$pg' AND AI = '$ai' AND GF = '$gf'  AND F = '$f' AND SF = '$sf' AND puesto = '$puesto' ";

        if($resultado2 = mysqli_query($conexion,$consulta2)){
            $row = mysqli_fetch_array($resultado2);
            if(empty($row)){
                echo '<script language="javascript">alert("No hay plazas disponibles con el codigo '.$codigo.'");</script>';
                echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=./capturista.php">';
            }else{
                echo '<script language="javascript">alert("Datos correctos/ Puedes dar Alta");</script>';
                enviarFom($ap,$unidad,$partida,$codigo,$pg,$ai,$gf,$f,$sf,$puesto);

                

            }
        }else{
            echo '<script language="javascript">alert("Existe un error");</script>';
            echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=./capturista.php">';

      
        }
        
        
    }

?>

</body>
</html>

