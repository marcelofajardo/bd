<?php
#######################
# www.marcofbb.com.ar #
#######################
// Incluimos la configuracion y conexion a la MySQL.
include('config.php');
// Definimos la variable $msg por seguridad.
$msg = "";
// Si se apreta el boton Agendar, da la condicion como true.
if($_GET['agendar'])
{
	// Verificamos que no alla ningun dato sin rellenar.
	if(!empty($_GET['q']))
	{
		$nombre = htmlentities($_GET['q']);
		$sql = "SELECT * FROM personas WHERE nombre LIKE '%".$nombre."%'";
		$query = mysql_query($sql,$link);
		// Mostramos un mensaje diciendo que todo salio como lo esperado
		$msg = "Resultados para el nombre ".$nombre;
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
<title>Agenda - Buscar personas</title>
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
	      <td height="38" colspan="3" align="center" valign="middle"><h1>Buscar Personas</h1></td>
        </tr>
	    <tr>
	      <td colspan="3" valign="top"><center><em><span style="color:red;"><?=$msg;?></span></em></center><br />
         <center><form action="buscar.php" method="get">
          <input type="text" name="q" id="q" />
		  <input type="submit" name="agendar" value="Buscar" />
        </form></center><br />
        <?php if($_GET['agendar'] && !empty($_GET['q'])){ ?>
        <table width="100%" border="0">
        <?php while($row = mysql_fetch_assoc($query)){ ?>
        <tr>
        <td>
        <a href="ver.php?id=<?=$row['id']?>"><?=$row['nombre']?></a>
        </td>
        </tr>
        <?php } ?>
        </table>
        <?php } ?>
          </td>
        </tr>
      </table>		
  </div>
</div>
</body>
</html>
