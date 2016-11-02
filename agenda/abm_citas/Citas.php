<?php
	
	require('../conexion.php');
session_start();
	$categoria=$_SESSION['categoria'];
	$username=$_SESSION['username'];


		$nom=$_POST['busqueda'];
		$conte=$_POST['contenido'];
		$fecha=$_POST['busqueda'];
		$horaini=$_POST['hora'];
		$horafin=$_POST['hora'];
		$tipo=$_POST['tipo'];
		$public=$_POST['busquedaxpubl'];
		$personas=$_POST['personas'];


$query="select * from (SELECT u.nombre as nusuario, c.contenido, c.fecha_ini, c.publico, c.hora_ini, c.hora_fin, p.tipo as ptipo, per.nombre as npersona FROM citas c, usuario u, prioridad p, personas per 

WHERE c.usuario_id_usuario = u.id_usuario AND c.prioridad_cod_pr = p.cod_pr AND c.personas_dni = per.dni
and ( u.category_codigo >= 9 and publico = 1)and (u.nombre like '$nom%' or fecha_ini like '$fecha%')) t


WHERE (contenido like '$conte%' and (hora_ini like '$horaini%' or hora_fin like '$horafin%') and t.ptipo like '$tipo%' and t.npersona like '$personas%' )  

UNION

SELECT u.nombre as nusuario, c.contenido, c.fecha_ini, c.publico, c.hora_ini, c.hora_fin, p.tipo as ptipo, per.nombre as npersona FROM citas c, usuario u, prioridad p, personas per 

WHERE c.usuario_id_usuario = u.id_usuario AND c.prioridad_cod_pr = p.cod_pr AND c.personas_dni = per.dni

and ( u.nombre = '$username'  and publico like '$public%') 


order by fecha_ini asc ";





	$primera_parte="SELECT u.nombre as nusuario, c.contenido, c.fecha_ini, c.publico, c.hora_ini, c.hora_fin, p.tipo, per.nombre as npersona
					FROM citas c, usuario u, prioridad p, personas per
					WHERE c.usuario_id_usuario = u.id_usuario
					AND c.prioridad_cod_pr = p.cod_pr
					AND c.personas_dni = per.dni ";

/*
	if((isset($_POST['busqueda']) && $_POST['busqueda']<>'') or (isset($_POST['busquedaxpubl']) && $_POST['busquedaxpubl']<>'') or (isset($_POST['contenido']) && $_POST['contenido']<>'') or (isset($_POST['hora']) && $_POST['hora']<>'')or (isset($_POST['tipo']) && $_POST['tipo']<>'')or (isset($_POST['personas']) && $_POST['personas']<>'')){
		
		$nom=$_POST['busqueda'];
		$conte=$_POST['contenido'];
		$fecha=$_POST['busqueda'];
		$horaini=$_POST['hora'];
		$horafin=$_POST['hora'];
		$tipo=$_POST['tipo'];
		$public=$_POST['busquedaxpubl'];
		$personas=$_POST['personas'];
		

		$vfiltro=" ((u.nombre like '$nom%' or fecha_ini like '$fecha%') and contenido like '$conte%' and publico like '$public%' and (hora_ini like  '$horaini%' or hora_fin like '$horafin%')  and p.tipo like '$tipo%' and per.nombre like '$personas%' ) and  ";


	$query="$primera_parte  and $vfiltro u.category_codigo >= $categoria order by fecha_ini asc";
	
	//$query="SELECT nombre, contenido,fecha_ini, publico, hora_ini, hora_fin,p.tipo  FROM citas c, usuario u , prioridad p, personas per where c.usuario_id_usuario=u.id_usuario and c.prioridad_id_pr=p.id_pr and  ((nombre like '$nom%' or fecha_ini like '$fecha%') and contenido like '$conte%' and publico like '$public%' and (hora_ini like  '$horaini%' or hora_fin like '$horafin%')  and p.tipo like '$tipo%'  ) and  u.category_codigo >= $categoria order by fecha_ini asc";
	
	}
	
	else{

	$query="$primera_parte and u.category_codigo >= $categoria order by fecha_ini asc" ;
	//$query="SELECT nombre, contenido,fecha_ini, hora_ini, hora_fin, p.tipo ,publico FROM citas c, usuario u , prioridad p, personas per where c.usuario_id_usuario=u.id_usuario and c.prioridad_id_pr=p.id_pr and u.category_codigo >= $categoria order by fecha_ini asc" ;
	}*/ 
	echo $query ;//. "    ,    " . $username;
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
			<input type="text" size="15" placeholder="nombre, fecha" name="busqueda">
			<input type="text" size="20" placeholder="publico = 1, privada = 0" name="busquedaxpubl">
			<input type="text" size="15" placeholder="contenido" name="contenido"> 
			<input type="text" size="8" placeholder="hora" name="hora">
			<input type="text" size="8" placeholder="urgencia" name="tipo">
			<input type="text" size="15" placeholder="personas" name="personas">
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
					<th><b>Cita Con</b></th>
					<th><b>Modificar</b></th>
					<th><b>Eliminar</b></th>


				</tr>

				<tbody>
					<?php while($row=$resultado->fetch_assoc()){ ?>
						<tr>
							<td><?php echo $row['nusuario'];?>
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
								<?php echo $row['ptipo'];?>
							</td>
							<td>
								<?php echo $row['publico'];?>
							</td>
							<td>
								<?php echo $row['npersona'];?>
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