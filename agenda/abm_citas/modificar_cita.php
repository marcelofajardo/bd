<?php
	
	require('../conexion.php');
	session_start();
	
	$categoria=$_SESSION['categoria'];

	$id=$_GET['id'];

	
	$query="SELECT  contenido,fecha_ini, hora_ini, hora_fin, p.tipo ,publico FROM citas c, usuario u , prioridad p where c.usuario_id_usuario=u.id_usuario and c.prioridad_id_pr=p.id_pr order by fecha_ini asc" ;
	
	$resultado=$mysqli->query($query);
	
	$row=$resultado->fetch_assoc();
	
?>
