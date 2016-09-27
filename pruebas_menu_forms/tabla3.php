<?php
	require 'conexion.php';
	
	$sql = "SELECT dni, nombre, apellido, tipo_dni_id_tp, descripcion  FROM personas inner join  tipo_dni on tipo_dni_id_tp=codigo";
	$result=$mysqli->query($sql);
	
?>
<html>
	<head>
		<title>Productos</title>
		
		<style>
		    .tr_rojo {
			background-color: #f00; <!--Color de fondo Rojo-->
			}
			
			.tr_verde {
			background-color: #0f0; <!--Color de fondo Verde-->
			}
		</style>
		
	</head>
	
	<body>
		<div align="center">
			<table border="1" width="80%">
				<tr>
					<th width="10%">DNI</th>
					<th width="30%">Nombre</th>
					<th width="30%">Apellido</th>
					<th width="10%">Tipo DNI</th>

				</tr>
				<?php while($row = $result->fetch_assoc()){ 

				?>

					<td><?php echo $row['dni']; ?></td>
					<td><?php echo $row['nombre']; ?></td>
					<td><?php echo $row['apellido']; ?></td>
					<td><?php echo $row['descripcion']; ?></td>
					
				</tr>
				<?php } ?>
			</table>
		</div>
	</body>
</html>

