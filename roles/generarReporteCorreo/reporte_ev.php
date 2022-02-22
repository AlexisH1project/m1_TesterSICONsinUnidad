
<?php

    include "../configuracion.php";
	include "../Controller/Correo.php";


//             // $nombreUser = $_POST['usuario_rol'];
           	$nombreUser = "name_usr";
            $total_estatus = $_POST['contador_estatus']-1;
			$array_aux_reg[0] = "";
			$array_aux_estatus[0] = "";
// ********************** recibir todos los estatus
			$array_estatus[0] = '';
			for($c_estatus=0; $c_estatus <= $total_estatus; $c_estatus++){
				$array_estatus[$c_estatus] = $_POST['estatus'.$c_estatus];
				// echo $array_estatus[$c_estatus] .'<br>';
			}
// ************************* FIN.. Terminamos de asignar los estatus al arreglo 
			$arr = unserialize(base64_decode($_POST['array_busqueda']));
// 		if($arr[1][0] != NULL ){   // ponemos esa posicion de arreglo ya que en el nos damos cuenta si no se agrego algun dato mas ya que por defaul en la posicion [0][0] se agrga un 0
				$tamanio = count($arr);
				$aux_ur = "";
				$j=0;
				for($i=0; $i < $tamanio; $i++){
					$sqlImp  = "SELECT * FROM fomope_qr WHERE id_movimiento_qr = $arr[$i]";
					if($resImp = mysqli_query($conexion, $sqlImp)){
						$imprimirRow = mysqli_fetch_row($resImp);
						if($i == 0){ // caso base
							$aux_ur = $imprimirRow[71];
							// echo "guardamos en un arreglo_anterior<br>";
							$array_aux_reg[$j] = $imprimirRow;
							$array_aux_estatus[$j] = $array_estatus[$i];
							$j++;
						}elseif($aux_ur == $imprimirRow[71]){
							$array_aux_reg[$j] = $imprimirRow;
							$array_aux_estatus[$j] = $array_estatus[$i];
							$j++;
							// echo "guardamos en un arreglo_anterior<br>";
						}else{
							// echo "enviamos correo".$aux_ur."<br>";
							$correo_crear = new Correo();
							$correo_crear->enviar_prueba($array_aux_reg, $array_aux_estatus ,$nombreUser );

							// $archivo_excel = new Generar_excel();
							// $correo_crear->enviar(); *****************************************************************>>>>>>>>>>>>>>>>>>>
							// $archivo_excel->llenar_info_excel_eventual($array_aux_reg, $array_aux_estatus);
							// echo "reset array, volvemos a guardar <br>";
							unset($array_aux_reg); // unset elimina los valores de un array 
							unset($array_aux_estatus);
							$array_aux_reg[0]=$imprimirRow;
							$array_aux_estatus[0] = $array_estatus[$i];
							$aux_ur = $imprimirRow[71];
							$j = 1;
						}
					
					}else{
						echo "hay fallas";
					}
				}    
				$correo_crear = new Correo();
				$correo_crear->enviar_prueba($array_aux_reg, $array_aux_estatus, $nombreUser);
				// $crear_archivo = new Generar_excel();
				// $crear_archivo->llenar_info_excel_eventual($array_aux_reg, $array_aux_estatus);
	
				// $correo_crear->enviar();
			
?>
