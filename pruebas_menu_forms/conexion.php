<?php
$server="localhost";	
$user="u569784351_agen";
$bd="u569784351_agen";
$clave="sistemas999";
	
$mysqli=new mysqli($server,$user,$clave,$bd);
//$mysqli=new mysqli("localhost","root","sistemas","tienda"); //servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos
	
	if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}
?>
