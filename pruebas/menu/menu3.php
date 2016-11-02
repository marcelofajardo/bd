<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="menu3.css" />
	<link rel="stylesheet" href="fonts/style.css">
	<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script> 
<script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

</head>
<body>
		<header>
		<nav>
			<ul>
				<li><a href="#"><span class="inicio"><i class="icon icon-home"></i></span>Inicio</a></li>
				<li id="users"><a href="../abm_usuario/mostrar.php" target="contenido"><span class="usuarios"><i class="icon icon-key"></i></span>ABM Usuarios</a>
				</li>
				<li><a href="../pruebas_menu_forms/tabla3.php" target="contenido"><span class="personas"><i class="icon icon-pacman"></i></span>ABM Personas</a></li>
				<li><a href="#"><span class="citas"><i class="icon icon-pencil"></i></span>ABM Citas y Eventos</a>
					<ul>
						<li><a href="#">Citas</a></li>
						<li><a href="#">Eventos</a></li>
					</ul>

				</li>
				<li onclick="mostrar()"><a id="Salir" href="#"><span class="salir"><i class="icon icon-rocket"></i></span>Salir</a></li>
			</ul>
		</nav>
	</header>

	<div id="global">
		<iframe name="contenido" id="external" style="width:100%;height:100%;border: 0"></iframe>
	</div>

<div id ="pie">
		
</div>
</body>

<script type="text/javascript">
//$("#users").hide("slow");
document.getElementById('users').style.display = 'none';
</script>
<!--<script type="text/javascript">

 $(document).ready(function(){ 
   $("#Salir").on("click",function(){
      $("#users").toggle("slow","linear");
   });
});
</script>-->

<script type="text/javascript">
function mostrar(){
document.getElementById('users').style.display = 'block';}
</script>
</html>