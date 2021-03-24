<?php 

		include "configuracion.php";
		$Array_IDFomope = $_GET['idMov'];
		$usuarioSeguir = $_GET['usuario_rol'];

		// $porAutorizar = explode(",", $Array_IDFomope);

		$hoy = "select CURDATE()";
		$tiempo ="select curTime()";
		

			for ($i = 0; $i < count($Array_IDFomope); $i++) {
				$sql = "SELECT * FROM fomope_qr WHERE id_movimiento_qr = '$porAutorizar[$i]'";
				$sqlUpdate = "UPDATE fomope_qr SET enNomina = 1, fechaAutorizacion = '$fechaH[0] - $usuarioSeguir' WHERE id_movimiento_qr = '$porAutorizar[$i]'";

				if($result = mysqli_query($conexion, $sql)){
					$row = mysqli_fetch_assoc($result);
					
						if ($resultHoy = mysqli_query($conexion,$hoy) AND $resultTime = mysqli_query($conexion,$tiempo)) {
							$row = mysqli_fetch_row($resultHoy);
							$row2 = mysqli_fetch_row($resultTime);

							$hora = str_replace ( ":", '',$row2[0] ); 
							$fecha = str_replace ( "-", '',$row[0] ); 
							$nameDoc = "registroQR_ ".$fecha.$hora."txt";	
						}
						$creaArchivo = fopen("txt/".$nameDoc, "a");
						$file = fopen($name, "w");
						fwrite($file, $row['tex_con']. PHP_EOL);
						//actulizamos la hora de autorizacion nomina 
							if(mysqli_query($conexion, $sqlUpdate)){
									$sqlH = "INSERT INTO historial_qr (id_movimiento_qr,usuario,fechaMovimiento,horaMovimiento) VALUES ('$porAutorizar[$i]','$usuarioSeguir','$fechaH[0]','$horaH[0]')";
									$resultH = mysqli_query($conexion,$sqlH);					
							}else{
									echo '<script type="text/javascript">alert("Error en la conexion");</script>';
									echo '<script type="text/javascript">alert("error '. mysqli_error($conexion).'");</script>';
							}
				}else{
						echo '<script type="text/javascript">alert("Error en la conexion");</script>';
						echo '<script type="text/javascript">alert("error '. mysqli_error($conexion).'");</script>';
				}
		}
		fclose($file);
		header("Content-type: application/txt");
        header("Content-Transfer-Encoding: binary");
		readfile("./txt/registrosQR.txt");

		echo "<script> alert('Autorizacion Correcta'); window.location.href = '../gEstructuraNomina.php?usuario_rol=$usuarioSeguir'</script>";
 ?>