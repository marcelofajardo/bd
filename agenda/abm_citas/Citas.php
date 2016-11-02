<?php
	
	require('../conexion.php');
session_start();
	$categoria=$_SESSION['categoria'];


	if((isset($_POST['busqueda']) && $_POST['busqueda']<>'') or (isset($_POST['busquedaxpubl']) && $_POST['busquedaxpubl']<>'') or (isset($_POST['contenido']) && $_POST['contenido']<>'') or (isset($_POST['hora']) && $_POST['hora']<>'')or (isset($_POST['tipo']) && $_POST['tipo']<>'')){
		
		$nom=$_POST['busqueda'];
		$conte=$_POST['contenido'];
		$fecha=$_POST['busqueda'];
		$horaini=$_POST['hora'];
		$horafin=$_POST['hora'];
		$tipo=$_POST['tipo'];
		$public=$_POST['busquedaxpubl'];

	$query="SELECT  nombre, contenido,fecha_ini, publico, hora_ini, hora_fin,p.tipo  FROM citas c, usuario u , prioridad p where c.usuario_id_usuario=u.id_usuario and c.prioridad_id_pr=p.id_pr and ((nombre like '$nom%' or fecha_ini like '$fecha%') and contenido like '$conte%' and publico like '$public%' and (hora_ini like  '$horaini%' or hora_fin like '$horafin%')  and p.tipo like '$tipo%'  ) and c.usuario_category_codigo >= $categoria order by fecha_ini asc";//
	

	//echo $query;
	}
	else{

	$query="SELECT nombre, contenido,fecha_ini, hora_ini, hora_fin, p.tipo ,publico FROM citas c, usuario u , prioridad p where c.usuario_id_usuario=u.id_usuario and c.prioridad_id_pr=p.id_pr and c.usuario_category_codigo >= $categoria order by fecha_ini asc" ;
	} 
	
	$resultado=$mysqli->query($query);
	?>
	


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Citas</title>
	<link rel="stylesheet" type="text/css" href="../tablas.css" media="screen">
</head>

<body bgcolor="#FFCC99">
	
		<center><h1>Citas</h1></center>

<div style="float: left;">
			<input type="button" onclick=" location.href='nueva_cita.php'" value="Nueva Cita" name="boton" />
		</div>
<div id="filtros" style="float: right;">
			<form action="Citas.php" method="post">
			<p> Busqueda: 
			<input type="text" name="busqueda">
			<input type="text" placeholder="jaja" name="busquedaxpubl">
			<input type="text" name="contenido"> 
			<input type="text" name="hora">
			<input type="text" name="tipo">
			<button type="submit">Filtrar</button></p>
			</form>
		</div>	
		<p></p>


<div class="group">
		<table class="table1" border=1 width="100%" cellspacing=0>
			<thead>
				<tr>
					<th><b>Creado Por</b></th>
					<th><b>Contenido</b></th>
					<th><b>Dia</b></th>
					<th><b>Hora Inicio</b></th>
					<th><b>Hora Fin</b></th>
					<th><b>Prioridad</b></th>
					<th><b>Publica</b></th>
					<th><b>Modificar</b></th>
					<th><b>Eliminar</b></th>


				</tr>

				<tbody>
					<?php while($row=$resultado->fetch_assoc()){ ?>
						<tr>
							<td><?php echo $row['nombre'];?>
							</td>
							<td>
								<?php echo $row['contenido'];?>
							</td>
							<td>
								<?php echo $row['fecha_ini'];?>
							</td>
							<td>
								<?php echo $row['hora_ini'];?>
							</td>				
							<td>
								<?php echo $row['hora_fin'];?>
							</td>			
							<td>
								<?php echo $row['tipo'];?>
							</td>
							<td>
								<?php echo $row['publico'];?>
							</td>
							<td>

						
								<input type="button" onclick=" location.href='modificar_cita.php?id=<?php echo $row['usuario_id_usuario'];?>' " value="Modificar" name="botonM" />
								
							</td>
							<td>
								<input type="button" onclick=" location.href='pre_eliminar.php?id=<?php echo $row['usuario_id_usuario'];?>' " value="Eliminar" name="botonE" />
							</td>
						</tr>
					<?php } ?>
				</tbody>