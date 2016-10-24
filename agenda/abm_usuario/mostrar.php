<?php
	require('../conexion.php');
	
	$query="SELECT id_usuario, nombre, email, category_codigo FROM usuario";
	
	$resultado=$mysqli->query($query);
	
?>

<html>
	<head>
		<title>Usuarios</title>
	<link rel="stylesheet" type="text/css" href="../tablas.css" media="screen">
	</head>
	<body>
		
		<center><h1>Usuarios</h1></center>
		
		<input type="button" onclick=" location.href='nuevo.php' " value="Nuevo usuario" name="boton" />
		<p></p>
		<div class="group">
		<table class="table1" border=1 width="100%" cellspacing=0>
			<thead>
				<tr>
					<th><b>Nombre</b></th>
					<th><b>Email</b></th>
					<th><b>Categoria</b></th>
					<th><b>Modificar</b></th>
					<th><b>Eliminar</b></th>
				</tr>
				<tbody>
					<?php while($row=$resultado->fetch_assoc()){ ?>
						<tr>
							<td><?php echo $row['nombre'];?>
							</td>
							<td>
								<?php echo $row['email'];?>
							</td>
							<td>
								<?php echo $row['category_codigo'];?>
							</td>							
							<td>
								<input type="button" onclick=" location.href='modificar.php?id=<?php echo $row['id_usuario'];?>' " value="Modificar" name="botonM" />
							</td>
							<td>
								<input type="button" onclick=" location.href='pre_eliminar.php?id=<?php echo $row['id_usuario'];?>' " value="Eliminar" name="botonE" />
							</td>
						</tr>
					<?php } ?>
				</tbody>
		</table>
		</div>
	</body>
</html>	
	
