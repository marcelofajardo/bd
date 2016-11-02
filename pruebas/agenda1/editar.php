<?php
#######################
# www.marcofbb.com.ar #
#######################
// Incluimos la configuracion y conexion a la MySQL.
include('config.php');
// Definimos la variable $msg por seguridad.
$msg = "";
// Definimos el ID de la persona a editar.
$id = htmlentities($_GET['id']);
// Si se apreta el boton Agendar, da la condicion como true.
if($_POST['agendar'])
{
	// Verificamos que no alla ningun dato sin rellenar.
	if(!empty($_POST['nombre']) || !empty($_POST['telefono']) || !empty($_POST['direccion']))
	{
		// Pasamos los datos de los POST a Variables, y le ponemos seguridad.
		$nombre = htmlentities($_POST['nombre']);
		$telefono = htmlentities($_POST['telefono']);
		$direccion = htmlentities($_POST['direccion']);
		$foto = htmlentities($_POST['foto']);
		// Insertamos los datos en la base de datos, si da algun error lo muestra. 
		$sql = "UPDATE personas SET nombre='".$nombre."', telefono='".$telefono."', direccion='".$direccion."', foto='".$foto."' WHERE id='".$id."'";
		mysql_query($sql,$link) or die(mysql_error());
		// Mostramos un mensaje diciendo que todo salio como lo esperado
		$msg = "Persona editada correctamente";
	} else { 
		// Si hay un dato sin rellenar mostramos el siguiente texto.
		$msg = "Falta rellenar algun dato"; 
	}
}
// Mostramos los datos
$sql = "SELECT * FROM personas WHERE id='".$id."' LIMIT 1";
$query = mysql_query($sql,$link);
$row = mysql_fetch_assoc($query);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Agenda - Editar personas</title>
</head>
<style type="text/css"> 
.agenda {
	margin:100px auto 0 auto; 
	width:701px;
	height:468px;
	background-image:url(imagenes/agenda.jpg);
}
.agenda #contenidor {
	padding:25px;
	width:276px;
	height:428px;
}
</style>
<body>
<div class="agenda">
	<div id="contenidor">
	  <table width="100%" height="404" border="0">
	    <tr>
	      <td height="38" colspan="3" align="center" valign="middle"><h1>Editar Persona</h1></td>
        </tr>
	    <tr>
	      <td colspan="3" valign="top"><center><em><span style="color:red;"><?=$msg;?></span></em></center>
          <form action="editar.php?id=<?=$id?>" method="post" >
	        <strong>Nombre</strong><br />
          <input type="text" name="nombre" value="<?=$row['nombre']?>" />
          <br />
		  <br />
          <strong>Teléfono</strong>
          <br />
          <input type="text" name="telefono" id="telefono" value="<?=$row['telefono']?>" />
          <br />
          <br />
          <strong>Dirección</strong><br />
          <input type="text" name="direccion" id="direccion" value="<?=$row['direccion']?>" />
          <br />
          <br />
          <strong>Foto</strong><br />
          <input type="text" name="foto" id="foto" value="<?=$row['foto']?>" />
          <br />
          <br />
		  <input type="submit" name="agendar" value="Editar" />
        </form>
          </td>
        </tr>
      </table>		
  </div>
</div>
</body>
</html>
