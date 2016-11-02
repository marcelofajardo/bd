<? 

$_PHP_LINK = $PHP_SELF; 

$meses = array(1=>"Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", 
"Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"); 

$WeekDays = array ( 0=> "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"); 

$fontb = "<font color=#FFFFFF>" ; 
$fonte = "</font>"; 

if (!isset($Day)) 
{ 
$month = date ("n"); 
$year = date ("Y"); 
$Day = time(); 
} 
else 
{ 
$month = date ("n", $Day); 
$year = date ("Y", $Day); 
} 

$output = `cal $month $year`; 

$starter = date ("w", mktime (0, 0, 0, $month,1, $year)); 

$strings = split ("n", $output); 
?> 

<html> 
<style type="text/css"> 
<!-- 
a:hover { color: #FF0000; text-decoration: none} 
a:link { text-decoration: none} 
a:visited { text-decoration: none} 
.small_letter { font-size: xx-small; color: #FFFFFF} 
--> 
</style> 
<title>Pequeño Calendario</title> 
<body> 
<table border="0" cellspacing="0" cellpadding="0"> 
<tr bgcolor="#3366CC"> 
<td bgcolor="#3366CC">&nbsp;&nbsp;</td> 
<td align=center class="small_letter" valign="top"> 
<? 
$NextMonth = mktime (0,0,0, date("n", $Day) + 1, date("j",$Day), date ("Y", $Day)); 
$PreviousMonth = mktime(0,0,0 , date("n",$Day)-1, date("j",$Day), date ("Y", $Day));
print("<a href="$_PHP_LINK?Day=$PreviousMonth">$fontb << $fonte</a>&nbsp;".$meses[date ("n", $Day)]. 
"&nbsp; <a href="$_PHP_LINK?Day=$NextMonth"> $fontb >>$fonte</a>"); 
?> 
<? 
print("<table bgcolor="#FFFFFF" class="small_letter" >n 
<tr bgcolor="#3366CC" class="small_letter">"); 

$splited = split(" ", $strings[1]); 
$i=0; 

while (list ($k, $v) = each ($splited) ) 
{	
if ($v!='') 
print ("	<td>&nbsp;".$WeekDays[$i]."&nbsp;</td>n"); 
$i++; 
} 
print ("</tr>n");	//	Aqui termino de imprimir la primera fila con los dias de la semana 
print ("<tr>n"); 

for ($i=0; $i < $starter; $i++) 
{ 
print ("	<td bgcolor="#FFF6C0" align="center">&nbsp;</td>n"); 
}	

$splited = split(" ",trim ($strings[2])); 

while (list ($k, $v) = each ( $splited)) 
{	
$color =($v==date('j', $Day))?"#E0E0E0":"#FFF6C0"; 
$DayForLink = mktime ( 0, 0, 0, $month, $v, $year ); 
$link = "$_PHP_LINK?Day=$DayForLink"; 
if ($v!='') 
print ("<td bgcolor="$color" align="center"><a href="$link">".$v."</a></td>n"); 
} 
print ("</tr>n"); /*Aqui termino de imprimir la primera fila con los Numeros*/ 

$i=0; 
while (list ($k, $v ) = each ($strings)) 
{ 

if ( $i++ > 2) 
{ 
//print ("<tr>"); 
$lisbet = split (" ", $v); 
while (list ($k1, $v1) = each ($lisbet)) 
{ 
$DayForLink = mktime ( 0, 0, 0, $month, $v1, $year ); 
$link = "$_PHP_LINK?Day=$DayForLink"; 
$color =($v1==date('j', $Day))?"#E0E0E0":"#FFF6C0"; 
if ($v1!='') 
print ("	<td bgcolor="$color" align="center"><a href="$link">".$v1."</a></td>n"); 
} 

print ("</tr>n"); 
}	
} /* Fin de la impresion de los dias del mes */ 

print ("</table>"); 

?> 
<? 
print ("<table class="small_letter" width="100%"> "); 
print ("<tr><td align="center" class="small_letter">"); // bgcolor=e0e0e0 
$next= mktime ( 0, 0, 0, date("n",$Day), date ('j', $Day), $year+1 ); 
$back=mktime ( 0, 0, 0, date("n",$Day), date ('j', $Day), $year -1 ); 
print ("<a href="$_PHP_LINK?Day=$back"> $fontb << $fonte</a>&nbsp;$year&nbsp;<a href="$_PHP_LINK?Day=$next">$fontb >> $fonte</a>"); 
print ("</td></tr></table>"); 
?> 
</td> 
<td bgcolor="#3366CC">&nbsp;&nbsp; 
</td> 
</tr> 
</table> 
</body> 
</html>
