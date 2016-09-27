<?php
	require 'conexion.php';
	
	$sql = "SELECT p.dni, p.nombre, p.apellido, p.tipo_dni_id_tp as td, t.descripcion as d  FROM personas p left join  tipo_dni t on tipo_dni_id_tp=codigo";
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
		<link rel="stylesheet" type="text/css" href="tabla2.css" media="screen">
	</head>
	
	<body>
		<div align="center">
			<table class="table1" border="1" width="100%" cellspacing=0>
				<thead>
                                <tr>
					<th width="20%">DNI</th>
					<th width="40%">Apellido</th>
					<th width="30%">Nombre</th>
					<th width="10%">Tipo DNI</th>

				</tr>
                                </thead>
				<?php while($row = $result->fetch_assoc()){ 

				?>

					<td><?php echo $row['dni']; ?></td>
					<td><?php echo $row['apellido']; ?></td>
					<td><?php echo $row['nombre']; ?></td>
					<td><?php echo $row['d']; ?></td>
					
				</tr>
				<?php } ?>
			</table>
		</div>
	</body>
</html>


