<?php
	require 'conexion.php';
	
	$sql = "SELECT * FROM productos";
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
					<th width="10%">Id</th>
					<th width="40%">Nombre</th>
					<th width="10%">Existencias</th>
					<th width="10%">Precio</th>
					<th width="10%">Total</th>
					<th width="20%">Fecha Alta</th>
				</tr>
				<?php while($row = $result->fetch_assoc()){ 
					$existencias = $row['existencias'];
					$precio = $row['precio'];
					$total = number_format($existencias * $precio, 2);
				?>
				<tr <?php if($existencias<5) { echo "class='tr_rojo'"; } else if($existencias>30) { echo "class='tr_verde'"; } ?>>
					<td><?php echo $row['id']; ?></td>
					<td><?php echo $row['nombre']; ?></td>
					<td><?php echo $row['existencias']; ?></td>
					<td><?php echo $row['precio']; ?></td>
					<td><?php echo $total; ?></td>
					<td><?php echo $row['fecha_alta']; ?></td>
				</tr>
				<?php } ?>
			</table>
		</div>
	</body>
</html>

