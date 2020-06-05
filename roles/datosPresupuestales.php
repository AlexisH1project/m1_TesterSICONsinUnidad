<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>

<link href='jquery/jquery-ui.min.css' type='text/css' rel='stylesheet'>
<link href='jquery/jquery-ui.css' type='text/css' rel='stylesheet'>

<script src="jquery/jquery-3.4.1.min.js" type="text/javascript"></script>
<script src="jquery/jquery-ui.min.js" type="text/javascript"></script>
<script src="jquery/jquery-ui.js" type="text/javascript"></script>

<body>
	<select id=Select name="Select" class="Select"></select>
	<script type="text/javascript">
		// function p(){
		// 	alert('a');
		// }

		function ap(){
			var ap = document.getElementById('ap').value;
			alert(ap);
		  $.ajax({
		    type: "GET",
		    url: 'unidades.php',
		    data : { ap : ap},
		    success: function(response)
            {
                $('#Select').html(response).fadeIn();
            }
		  });
		}
	</script>

	<?php


	function AP(){
		include "configuracion.php";
		echo '<select id = "ap" onchange ="ap()">';
		$consulta2 = " SELECT clavePrograma FROM plazas GROUP BY clavePrograma";
		if($resultado2 = mysqli_query($conexion,$consulta2)){
        	while($row = mysqli_fetch_assoc($resultado2)){
        		// echo $row['clavePrograma']."<br>";
        		echo "<option value='".$row['clavePrograma']."'>".$row['clavePrograma']."</option>";
        	}
        }
		echo "</select>";

	}


	function unidad($clavePrograma){
		include "configuracion.php";
		echo '<select>';

		$consulta2 = " SELECT id_ur FROM plazas WHERE clavePrograma = '".$clavePrograma."' GROUP BY id_ur";
		if($resultado2 = mysqli_query($conexion,$consulta2)){
        	while($row = mysqli_fetch_assoc($resultado2)){
        		// echo $row['id_ur']."    ";
        		echo "<option value='".$row['id_ur']."'>".$row['id_ur']."</option>";

        	}
        }
		echo '<select>';

	}

	function partida($clavePrograma,$id_ur){
		include "configuracion.php";
		echo '<select>';

		$consulta2 = " SELECT id_partida FROM plazas WHERE clavePrograma = '".$clavePrograma."' AND id_ur = '".$id_ur."' GROUP BY id_partida";
		if($resultado2 = mysqli_query($conexion,$consulta2)){
        	while($row = mysqli_fetch_assoc($resultado2)){
        		// echo $row['id_partida']."    ";
        		echo "<option value='".$row['id_partida']."'>".$row['id_partida']."</option>";

        	}
        }
		echo "</select>";

	}

	function codigo($clavePrograma,$id_ur, $id_partida){
		include "configuracion.php";
		echo '<select>';

		$consulta2 = " SELECT codigo FROM plazas WHERE clavePrograma = '".$clavePrograma."' AND id_ur = '".$id_ur."' AND id_partida = '". $id_partida."' GROUP BY codigo";
		if($resultado2 = mysqli_query($conexion,$consulta2)){
        	while($row = mysqli_fetch_assoc($resultado2)){
        		// echo $row['codigo']."    ";
        		echo "<option value='".$row['codigo']."'>".$row['codigo']."</option>";

        	}
        }
		echo "</select>";

	}

	function pg($clavePrograma,$id_ur, $id_partida, $codigo){
		include "configuracion.php";
		echo '<select>';

		$consulta2 = " SELECT claveEntidad FROM plazas WHERE clavePrograma = '".$clavePrograma."' AND id_ur = '".$id_ur."' AND id_partida = '". $id_partida."' AND codigo = '".$codigo."' GROUP BY claveEntidad";
		if($resultado2 = mysqli_query($conexion,$consulta2)){
        	while($row = mysqli_fetch_assoc($resultado2)){
        		// echo $row['claveEntidad']."    ";
        		echo "<option value='".$row['claveEntidad']."'>".$row['claveEntidad']."</option>";

        	}
        }
		echo "</select>";

	}

	function ai($clavePrograma,$id_ur, $id_partida, $codigo , $pg){
		include "configuracion.php";
		echo '<select>';

		$consulta2 = " SELECT AI FROM plazas WHERE clavePrograma = '".$clavePrograma."' AND id_ur = '".$id_ur."' AND id_partida = '". $id_partida."' AND codigo = '".$codigo."' AND claveEntidad = ".$pg."  GROUP BY AI";
		if($resultado2 = mysqli_query($conexion,$consulta2)){
        	while($row = mysqli_fetch_assoc($resultado2)){
        		// echo $row['AI']."    ";
        		echo "<option value='".$row['AI']."'>".$row['AI']."</option>";

        	}
        }
		echo "</select>";

	}

	function gf($clavePrograma,$id_ur, $id_partida, $codigo , $pg,$ai){
		include "configuracion.php";
		echo '<select>';

		$consulta2 = " SELECT GF FROM plazas WHERE clavePrograma = '".$clavePrograma."' AND id_ur = '".$id_ur."' AND id_partida = '". $id_partida."' AND codigo = '".$codigo."' AND claveEntidad = ".$pg." AND AI = '".$ai."'  GROUP BY AI";
		if($resultado2 = mysqli_query($conexion,$consulta2)){
        	while($row = mysqli_fetch_assoc($resultado2)){
        		// echo $row['GF']."    ";
        		echo "<option value='".$row['GF']."'>".$row['GF']."</option>";

        	}
        }
		echo "</select>";

	}

	function F($clavePrograma,$id_ur, $id_partida, $codigo , $pg,$ai,$gf){
		include "configuracion.php";
		echo '<select>';

		$consulta2 = " SELECT F FROM plazas WHERE clavePrograma = '".$clavePrograma."' AND id_ur = '".$id_ur."' AND id_partida = '". $id_partida."' AND codigo = '".$codigo."' AND claveEntidad = ".$pg." AND AI = '".$ai."' AND GF = '".$gf."'GROUP BY AI";
		if($resultado2 = mysqli_query($conexion,$consulta2)){
        	while($row = mysqli_fetch_assoc($resultado2)){
        		// echo $row['F']."    ";
        		echo "<option value='".$row['F']."'>".$row['F']."</option>";

        	}
        }
		echo "</select>";

	}


	function SF($clavePrograma,$id_ur, $id_partida, $codigo , $pg,$ai,$gf,$f){
		include "configuracion.php";
		echo '<select>';

		$consulta2 = " SELECT SF FROM plazas WHERE clavePrograma = '".$clavePrograma."' AND id_ur = '".$id_ur."' AND id_partida = '". $id_partida."' AND codigo = '".$codigo."' AND claveEntidad = ".$pg." AND AI = '".$ai."' AND GF = '".$gf."' AND F = '".$f."'GROUP BY AI";
		if($resultado2 = mysqli_query($conexion,$consulta2)){
        	while($row = mysqli_fetch_assoc($resultado2)){
        		// echo $row['SF']."    ";
        		echo "<option value='".$row['SF']."'>".$row['SF']."</option>";

        	}
        }
		echo "</select>";

	}

	function puesto($clavePrograma,$id_ur, $id_partida, $codigo , $pg,$ai,$gf,$f,$sf){
		include "configuracion.php";
		echo '<select>';

		$consulta2 = " SELECT puesto FROM plazas WHERE clavePrograma = '".$clavePrograma."' AND id_ur = '".$id_ur."' AND id_partida = '". $id_partida."' AND codigo = '".$codigo."' AND claveEntidad = ".$pg." AND AI = '".$ai."' AND GF = '".$gf."' AND F = '".$f."' AND SF = '".$sf."' GROUP BY AI";
		if($resultado2 = mysqli_query($conexion,$consulta2)){
        	while($row = mysqli_fetch_assoc($resultado2)){
        		// echo $row['puesto']."    ";
        		echo "<option value='".$row['puesto']."'>".$row['puesto']."</option>";

        	}
        }
		echo "</select>";

	}

	AP();
	// unidad("M002");
	// partida("M002","513");
	// codigo("M002","513","11401");
	// pg("M002","513","11401","CFJ1100001");
	// ai("M002","513","11401","CFJ1100001",9);
	// gf("M002","513","11401","CFJ1100001",9,"002");
	// F("M002","513","11401","CFJ1100001",9,"002",1);
	// SF("M002","513","11401","CFJ1100001",9,"002",1,2);
	// puesto("M002","513","11401","CFJ1100001",9,"002",1,2,3);

?>

</body>
</html>
