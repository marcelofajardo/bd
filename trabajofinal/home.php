<?php
session_start();
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
	print "<script>alert(\"Acceso invalido!\");window.location='login.php';</script>";
}

?>
<html>
	<head>
		<title>Agenda Motius</title>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	</head>
	<body>
	<?php include "php/navbar.php"; ?>
<!--<div class="container">-->

		
<iframe src="./contenido/menu1.html" style="width: 90%; height: 100%" frameborder="0" name="formulario"></iframe>

<!--</div>-->
	</body>
</html>
