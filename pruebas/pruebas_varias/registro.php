<?php
$db_host="127.0.0.1";
$db_user="tpweb";
$db_password="tpweb999";
$db_name="tpweb";
$db_table_name="usuarios";
   $db_connection = mysql_connect($db_host, $db_user, $db_password);

if (!$db_connection) {
	die('No se ha podido conectar a la base de datos');
}
$subs_name = utf8_decode($_POST['nombre']);
$subs_last = utf8_decode($_POST['apellido']);
$subs_email = utf8_decode($_POST['email']);
$subs_DNI = utf8_decode($_POST['DNI']);

//$resultado=mysql_query("SELECT * FROM ".$db_table_name." WHERE Email = '".$subs_email."'", $db_connection);
$resultado=mysql_query("SELECT * FROM usuarios", $db_connection);
$num=mysql_numrows($resultado);
echo $num;


/*if (mysql_num_rows($resultado)>0)
{

header('Location: Fail.html');

} else {
	
	$insert_value = 'INSERT INTO `' . $db_name . '`.`'.$db_table_name.'` (`Nombre` , `Apellido` , `Email` , `DNI`) VALUES ("' . $subs_name . '", "' . $subs_last . '", "' . $subs_email . '", "' . $subs_DNI . '")';

mysql_select_db($db_name, $db_connection);
$retry_value = mysql_query($insert_value, $db_connection);

if (!$retry_value) {
   die('Error: ' . mysql_error());
}
	
header('Location: Success.html');
}
*/


mysql_close($db_connection);
		
?>
