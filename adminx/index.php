<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><head>
	<?php 
	include($_SERVER['DOCUMENT_ROOT'].'/includes/connection.php');
	include($_SERVER['DOCUMENT_ROOT'].'/includes/opendb.php'); 

	
	?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ADMIN Comoseva.com</title>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-455535-7']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>

<body>
<p><a href="javascript:void(function(w){try{_gaq._getAsyncTracker()._setVar(w)}catch(e){try{__utmSetVar(w)}catch(e){pageTracker._setVar(w)}}alert(w)}('comosevaexcluirsanti'));void(0);">Excluir Google Analytics BUENO</a></p>
<p><a href="testemail.php">Enviar email prueba</a> </p>
Mapa ruta de test: 
<a href="http://www.comoseva.com/r.php?la1=40.333&lo1=-3.222&la2=41.333&lo2=-4.3333">http://www.comoseva.com/r.php?la1=40.333&lo1=-3.222&la2=41.333&lo2=-4.3333 </a>
<table cellpadding="5" cellspacing="5">
  <tr><td valign="top"><?php
$query_columnas=mysql_query('SHOW COLUMNS FROM coordenadas');
$contador = 0;
echo '<b>TABLA COORDENADAS</b><br>Cantidad de campos: '.mysql_num_rows($query_columnas)."<br>\n";
echo '<table border="1">'."\n";
echo '<tr><td>c</td><td>Nombre del campo</td><td>Tipo de campo</tr>'."\n";
while($row_columnas=mysql_fetch_assoc($query_columnas)){

echo '<tr><td>'.$contador.'</td><td>'.$row_columnas['Field'].'</td><td>'.$row_columnas['Type']."</tr>\n";
$contador++;
}
echo '</table>';
?> </td>
<td valign="top"><?php
$query_columnasb=mysql_query('SHOW COLUMNS FROM tipo_direccion');
$contadorb = 0;
echo '<b>TABLA TIPO_DIRECCION</b><br>Cantidad de campos: '.mysql_num_rows($query_columnasb)."<br>\n";
echo '<table border="1">'."\n";
echo '<tr><td>c</td><td>Nombre del campo</td><td>Tipo de campo</tr>'."\n";
while($row_columnasb=mysql_fetch_assoc($query_columnasb)){

echo '<tr><td>'.$contadorb.'('.$contador.')</td><td>'.$row_columnasb['Field'].'</td><td>'.$row_columnasb['Type']."</tr>\n";
$contadorb++;
$contador++;
}
echo '</table>';
?> </td>
<td valign="top"><?php
$query_columnasc=mysql_query('SHOW COLUMNS FROM comentarios');
$contadorc = 0;
echo '<b>TABLA comentarios</b><br>Cantidad de campos: '.mysql_num_rows($query_columnasc)."<br>\n";
echo '<table border="1">'."\n";
echo '<tr><td>c</td><td>Nombre del campo</td><td>Tipo de campo</tr>'."\n";
while($row_columnasc=mysql_fetch_assoc($query_columnasc)){

echo '<tr><td>'.$contadorc.'</td><td>'.$row_columnasc['Field'].'</td><td>'.$row_columnasc['Type']."</tr>\n";
$contadorc++;

}
echo '</table>';
?> </td>


<td><?
$consultan="select distinct email from coordenadas order by email";
$sql = mysql_query ($consultan);
if (!$sql) {
	echo("<P>Error retrieving table from database!<BR>"."Error: " . mysql_error());
}

$num_rows = mysql_num_rows($sql);

?>
<!-- COMIENZA LA LISTA DE DIRECCIONES YA CREADAS: -->
(n emails: <? echo "$num_rows"; ?>)<p>
<?
while($row1 = mysql_fetch_array($sql))            
			    { //empieza while principal 
				?>
				<?  echo $row1[0];  ?><br />
				<?
				
				}
				?>
</td>
</tr></table>

</body>
</html>
