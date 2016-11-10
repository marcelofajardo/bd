<?php 
	
	require('../conexion.php');
		session_start();

	$contenido=$_POST['contenido'];
	$dia=$_POST['fecha_ini'];
	$horaini=$_POST['hora_ini'];
	$horafin=$_POST['hora_fin'];
	$prioridad=$_POST['prioridad_cod_pr'];
	$publica=$_POST['publico'];
	$id_usuario=$_SESSION['id_usuario'];       
	$categoria=$_SESSION['categoria'];
	
	$query="INSERT INTO citas(contenido, fecha_ini, hora_ini, hora_fin, prioridad_cod_pr, publico, usuario_id_usuario, personas_dni) 
						 VALUES ('$contenido','$dia', '$horaini', '$horafin', '$prioridad', '$publica', '$id_usuario', 456456444)";
	
	$resultado=$mysqli->query($query);
	
	
?>

<html>
	<head>
		<title>Guardar Cita</title>
	</head>
	<body>
		<center>	
			
			<?php if($resultado>0 ){ ?>
				

				<h1>Cita Guardada</h1>
				<?php }else{ ?>
				<h1>Error al Guardar Cita</h1>		
			<?php	} ?>		
			
			<p></p>	
			
			<input type="button" onclick=" location.href='Citas.php' " value="Regresar" name="boton" />
			
		</center>
	</body>
	</html>	
