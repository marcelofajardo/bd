<?php 
	
	require('../conexion.php');
	
	$dni=$_POST['dni'];
	$nombre=$_POST['nombre'];
	$apellido=$_POST['apellido'];
	$tips=$_POST['codigo'];


	$query="INSERT INTO `personas`(`dni`, `nombre`, `apellido`, `tipo_dni_id_tp`) VALUES ('$dni','$nombre','$apellido','$tips')";
	
	$resultado=$mysqli->query($query);
	
?>

<html>
	<head>
		<title>Guardar Persona</title>
	</head>
	<body>
		<center>	
			
			<?php if($resultado>0){ ?>
				<h1>Persona Guardada</h1>
				<?php }else{ ?>
				<h1>Error al Guardar Persona</h1>		
			<?php	} ?>		
			
			<p></p>	
			
			<input type="button" onclick=" location.href='Personas.php' " value="Regresar" name="boton" />
			
		</center>
	</body>
	</html>	
