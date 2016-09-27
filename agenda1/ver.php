<?php
#######################
# www.marcofbb.com.ar #
#######################
// Incluimos la configuracion y conexion a la MySQL.
include('config.php');
// Definimos el ID de la persona a editar.
$id = htmlentities($_GET['id']);
// Mostramos los datos
$sql = "SELECT * FROM personas WHERE id='".$id."' LIMIT 1";
$query = mysql_query($sql,$link);
$row = mysql_fetch_assoc($query);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Agenda - Ver personas</title>
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
	      <td height="38" colspan="3" align="center" valign="middle"><h1><?=$row['nombre']?></h1></td>
        </tr>
	    <tr>
	      <td colspan="3" valign="top"><strong>Nombre:</strong> 
	        <?=$row['nombre']?><br />
	        <br />
	        <strong>Telefono:</strong>
<?=$row['telefono']?><br />
	        <br />
	        <strong>Direccion: </strong><?=$row['direccion']?>
            <br />
            <br /><br />
            <center><img src="<?php if(!empty($row['foto'])){ echo $row['foto']; } else { echo "imagenes/noavatar.png"; } ?>" width="128" height="128" /></center><br />
<center>[ <a href="editar.php?id=<?=$id?>">Editar Datos</a> ]
</center>
          </td>
        </tr>
      </table>		
  </div>
</div>
</body>
</html>
