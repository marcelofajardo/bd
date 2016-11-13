<?php 

$sql="select nombre, count(*) as cantidad from citas, usuario where citas.usuario_id_usuario=usuario.id_usuario group by nombre";

require('../conexion.php');
$resultado = $mysqli->query($sql);

echo $sql."<br><br><br>";

echo "nombre       ------       cantidad <br>";
 while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) 
    {
       echo $row['nombre'] . "    ----    " . $row['cantidad'] . "<br>";
    }

?> 
<html>
	<head>
		<title>Eliminar Personas</title>
	</head>
	<body>
		<center>	

			<br><br>
			
			<input type="button" onclick="location.href='inicio.php'" value="Regresar a inicio" name="botonREGr" />
			
		</center>
	</body>
	</html>	
