<?php
require('../conexion.php');
	
 
$sql="SELECT * from tipo_dni";
$resultado = $mysqli->query($sql); //usamos la conexion para dar un resultado a la variable
 
if ($resultado->num_rows > 0) //si la variable tiene al menos 1 fila entonces seguimos con el codigo
{
    $combobit="";
    while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) 
    {
        $combobit .=" <option value='".$row['codigo']."'>".$row['descripcion']."</option>"; //concatenamos el los options para luego ser insertado en el HTML
    }
}
else
{
    echo "No hubo resultados";
}
$mysqli->close(); //cerramos la conexión
?>

<html>
	<head>
		<title>Usuarios</title>
	</head>
	<body>
		
		<center><h1>Nuevo Usuario</h1></center>
		
		<form name="nuevo_usuario" method="POST" action="guarda_Personas.php">
			<table width="50%">
				<tr>
					<td width="20"><b>DNI</b></td>
					<td width="30"><input type="text" name="dni" size="25" /></td>
				</tr>
				<tr>
					<td><b>Nombre</b></td>
					<td><input type="text" name="nombre" size="25" /></td>
				</tr>
				<tr>
					<td><b>Apellido</b></td>
					<td><input type="text" name="apellido" size="25" /></td>
				</tr>
				<td><b>Tipo dni</b></td>
					<td><select name="codigo" >
       					<?php echo $combobit; ?>
   					</select> 

   						<?php echo $id_usuario.$categoria; ?>
   						<?php echo "Hola" ;?>

   					</td>
				
				<tr>
					<td colspan="2"><center><input type="submit" name="enviar" value="Registrar" /></center></td>
				</tr>
				<tr>
				<td colspan="2"><center><input type="button" onclick=" location.href='personas.php' " value="Regresar" name="boton" /></center></td>
				</tr>


			</table>
		</form>
	</body>
</html>						
