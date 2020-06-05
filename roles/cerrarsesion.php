<?php 
$usuario = $_POST['usuario_rol'];
session_start();
if($_SESSION["usuario"]){  
 	    session_destroy();
    
    header("location:inicio.html");
}
else{
    header("location:index.php");
}
?>