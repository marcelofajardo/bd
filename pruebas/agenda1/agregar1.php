<?php
#######################
# www.marcofbb.com.ar #
#######################
// Incluimos la configuracion y conexion a la MySQL.
include('config.php');
// Definimos la variable $msg por seguridad.
$msg = "";
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
		$sql = "INSERT INTO personas (nombre, telefono, direccion, foto) VALUES ('".$nombre."','".$telefono."','".$direccion."', '".$foto."')";
		mysql_query($sql,$link) or die(mysql_error());
		// Mostramos un mensaje diciendo que todo salio como lo esperado
		$msg = "Persona agendada correctamente";
	} else { 
		// Si hay un dato sin rellenar mostramos el siguiente texto.
		$msg = "Falta rellenar algun dato"; 
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Agenda - Agregar personas</title>
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
	      <td height="38" colspan="3" align="center" valign="middle"><h1>Agregar Persona</h1></td>
        </tr>
	    <tr>
	      <td colspan="3" valign="top"><center><em><span style="color:red;"><?=$msg;?></span></em></center>
          <form action="agregar.php" method="post">
	        <strong>Nombre</strong><br />
          <input type="text" name="nombre" id="nombre" />
          <br />
		  <br />
          <strong>Teléfono</strong>
          <br />
          <input type="text" name="telefono" id="telefono" />
          <br />
          <br />
          <strong>Dirección</strong><br />
          <input type="text" name="direccion" id="direccion" />
          <br />
          <br />
          <strong>Link de la Foto</strong><br />
          <input type="text" name="foto" id="foto" />
          <br />
          <br />
		  <input type="submit" name="agendar" value="Agendar" />
        </form>
          </td>
        </tr>
      </table>		
  </div>
</div>
</body>
</html>
