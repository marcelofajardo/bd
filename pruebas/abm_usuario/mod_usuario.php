<?php 
	
	require('conexion.php');
	
	$id=$_POST['id'];
	$usuario=$_POST['usuario'];
	$password=$_POST['password'];
	$email=$_POST['email'];
	
	$query="UPDATE usuarios SET usuario='$usuario', contrasenia='$password', email='$email' WHERE id='$id'";
	
	$resultado=$mysqli->query($query);
	
?>

<html>
	<head>
		<title>Modificar usuario</title>
	</head>
	
	<body>
		<center>
			
			<?php 
				if($resultado>0){
				?>
				
				<h1>Usuario Modificado</h1>
				
					<?php 	}else{ ?>
				
				<h1>Error al Modificar Usuario</h1>
				
			<?php	} ?>
			
			<p></p>	
			
			<input type="button" onclick=" location.href='mostrar.php' " value="Regresar" name="boton" />
			
		</center>
	</body>
</html>
				
				