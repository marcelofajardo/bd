<?php 
	
	require('conexion.php');
	
	$usuario=$_POST['usuario'];
	$password=$_POST['password'];
	$email=$_POST['email'];
	
	$query="INSERT INTO usuarios (usuario, contrasenia, email) VALUES ('$usuario','$password','$email')";
	
	$resultado=$mysqli->query($query);
	
?>

<html>
	<head>
		<title>Guardar usuario</title>
	</head>
	<body>
		<center>	
			
			<?php if($resultado>0){ ?>
				<h1>Usuario Guardado</h1>
				<?php }else{ ?>
				<h1>Error al Guardar Usuario</h1>		
			<?php	} ?>		
			
			<p></p>	
			
			<input type="button" onclick=" location.href='mostrar.php' " value="Regresar" name="boton" />
			
		</center>
	</body>
	</html>	
