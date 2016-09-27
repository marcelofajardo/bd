<html> 
<head> 
<TITLE>Consulta de Usuarios - Barrio Adentro</TITLE> 
<link rel="shortcut icon" href="imagenes/favicon.ico" /> 
<link rel='stylesheet' type='text/css' href='css/styles.css' />
<style type="text/css">
.datagrid table { border-collapse: collapse; text-align: left; width: 100%; } .datagrid {font: normal 12px/150% Verdana, Arial, Helvetica, sans-serif; background: #fff; overflow: hidden; border: 2px solid #D6222E; width: 45%; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; }.datagrid table td, .datagrid table th { padding: 9px 10px; }.datagrid table thead th {background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #F72735), color-stop(1, #8F171F) );background:-moz-linear-gradient( center top, #F72735 5%, #8F171F 100% );filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#F72735', endColorstr='#8F171F');background-color:#F72735; color:#FFFFFF; font-size: 15px; font-weight: bold; border-left: 2px solid #D6222E; } .datagrid table thead th:first-child { border: none; }.datagrid table tbody td { color: #000000; border-left: 2px solid #D6222E;font-size: 12px;font-weight: bold; }.datagrid table tbody .alt td { background: #D9D9D9; color: #000000; }.datagrid table tbody td:first-child { border-left: none; }.datagrid table tbody tr:last-child td { border-bottom: none; }.datagrid table tfoot td div { border-top: 1px solid #D6222E;background: #FFFFFF;} .datagrid table tfoot td { padding: 0; font-size: 12px } .datagrid table tfoot td div{ padding: 3px; }
</style>
</head> 
<center>
<body> 
<center><IMG SRC="imagenes/Logo.png" WIDTH=1100 HEIGHT=150></center>
<br><br><br>
<div class="datagrid"><table align="center" border="0" cellpadding="2" cellspacing="2">
<thead><th colspan="1" rowspan="1" align="center">Cedula</th> <th colspan="1" rowspan="1" align="center">Nombre Real</th><th width='150' colspan="1" rowspan="1" align="center">Nombre de Usuario</th><th width='150' colspan="1" rowspan="1" align="center">Tipo de Usuario</th></thead>

<?php 
include('conexion.php'); 
    $query = "select * from usuarios";     // Esta linea hace la consulta
    $result = mysql_query($query); 

    while ($registro = mysql_fetch_array($result)){ 
echo " 
    <tr> 
      <td width='150'>".$registro['cedula']."</td> 
      <td width='150'>".$registro['nombrer']."</td> 
      <td width='150'>".$registro['nombreu']."</td> 
      <td width='150'>".$registro['tipo']."</td> 
</tr> 
"; 
} 
?>
<?php
$numero = mysql_num_rows($result);

echo"
<thead><th width='150' colspan='7' rowspan='7' align='center'>El Total de Registros es de: $numero</th></thead>
";
?>
</tbody>
   </table> 
</div> 
</body> 
</center>
</html> 
