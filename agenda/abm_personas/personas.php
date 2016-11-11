<?php
	
	require('../conexion.php');
    session_start();
	if(isset($_POST['busqueda']) && $_POST['busqueda']<>''){
		$nom=$_POST['busqueda'];
	$query="SELECT  * FROM personas where nombre like '$nom%' order by nombre desc";
	//echo $query;
	}
	else{
	$query="SELECT * FROM personas where nombre like '$nom%' order by nombre desc";
	}
	
	$resultado=$mysqli->query($query);

  
	?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Personas</title>
	<link rel="stylesheet" type="text/css" href="../tablas.css" media="screen">
</head>

<body>
	
		<center><h1>Personas</h1></center>

<div style="float: left;">
			<input type="button" onclick=" location.href='nuevo_per.php'" value="Nueva Persona" name="boton" />
			<input type="button" onclick=" location.href='p_dp.php'" value="Persona Datos" name="boton" />
		</div>
<div id="filtros" style="float: right;">
			<form action="personas.php" method="post">
			<p> Busqueda por Nombre: 
			<input type="text" name="busqueda">
			<button type="submit">Filtrar</button></p>
			</form>
		</div>	
		<p></p>


<div class="group">
		<table class="table1" border=1 width="100%" cellspacing=0>
			<thead>
				<tr>
					<th><b>NOMBRE</b></th>
					<th><b>APELLIDO</b></th>
					<th><b>DNI</b></th>
					<th><b>TIPO DE DNI</b></th>					
					<th><b>Modificar</b></th>
					<th><b>Eliminar</b></th>


				</tr>

				<tbody>
					<?php while($row=$resultado->fetch_assoc()){ ?>

						<tr>
							<td><a href="../abm_citas/nueva_cita.php?id=<?php echo $row['dni'];?>"><?php echo $row['nombre'];$_SESSION['dedonde']='personas'; ?>
							</td>
							<td>
								<?php echo $row['apellido'];?>
							</td>
							<td>
								<?php echo $row['dni'];?>
							</td>
							<td>
								<?php echo $row['tipo_dni_id_tp'];?>
							</td>	
							
							<td>

								<input type="button" onclick=" location.href='modificar.php?id=<?php echo $row['personas'];?>' " value="Modificar" name="botonM" />
							</td>
							<td>
								<input type="button" onclick=" location.href='pre_eliminar.php?id=<?php echo $row['personas'];?>' " value="Eliminar" name="botonE" />
							</td>
						</tr>
					<?php } ?>
				</tbody>