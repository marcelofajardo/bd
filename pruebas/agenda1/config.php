<?php
#######################
# www.marcofbb.com.ar #
#######################

// Configuracion de la base de datos.
$dbhost = "localhost"; // Servidor
$dbuser = "agenda1"; // Usuario
$dbpass = "agenda1"; // Contraseña
$dbname = "agenda1"; // Tabla

// Creando conexion.
$link = mysql_connect($dbhost,$dbuser,$dbpass); // Conectamos a la base de datos
		mysql_select_db($dbname,$link); // Seleccionamos la base de datos
?>
