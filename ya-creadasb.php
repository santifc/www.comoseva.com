<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
	<?php 
	include($_SERVER['DOCUMENT_ROOT'].'/includes/headcommon.php');
	include($_SERVER['DOCUMENT_ROOT'].'/includes/connection.php');
	include($_SERVER['DOCUMENT_ROOT'].'/includes/opendb.php'); 

	
	?>
	<meta http-equiv="description" content="Comparte fácilmente la ruta hacia el destino que tú elijas" />
        <title>Direcciones ya creadas - <?php include($_SERVER['DOCUMENT_ROOT'].'/includes/title.php'); ?></title>
		       <link href="estilos.css" rel="stylesheet" type="text/css" />



	
	</head>
<body>

<?php
include($_SERVER['DOCUMENT_ROOT'].'/includes/toputil.php');
//include($_SERVER['DOCUMENT_ROOT'].'/includes/top.php');

// consulta de las direcciones de los puertos de montaña
$consulta2="select * from coordenadas where usar = 'si' and en_lista = 'si' and tipo = 1 order by texto";
$sql2 = mysql_query ($consulta2);
if (!$sql2) {
	echo("<P>Error retrieving table from database!<BR>"."Errors: " . mysql_error());
}
$num_rows = mysql_num_rows($sql2);

$consultat="select * from coordenadas where usar = 'si' and en_lista = 'si' and tipo = 3 order by texto";
$sqlt = mysql_query ($consultat);
if (!$sqlt) {
	echo("<P>Error retrieving table from database!<BR>"."Errort: " . mysql_error());
}
$num_rowst = mysql_num_rows($sqlt);



$consultap="select * from coordenadas where usar = 'si' and en_lista = 'si' and tipo = 4";
$sqlp = mysql_query ($consultap);
if (!$sqlp) {
	echo("<P>Error retrieving table from database!<BR>"."Errorp: " . mysql_error());
}
$num_rowsp = mysql_num_rows($sqlp);
?>
<!-- COMIENZA LA LISTA DE DIRECCIONES YA CREADAS: -->
<table width="950" border="0" cellpadding="2" cellspacing="2">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Algunas direcciones ya creadas:</strong></td>
  </tr>
  <tr>
    <td><strong><a href="/direcciones/puertos-montana.php"><font size="3">Puertos de monta&ntilde;a (<? echo "$num_rows"; ?>) </font></a><br>
	<a href="/direcciones/talleres.php"><font size="3">Talleres (<? echo "$num_rowst"; ?>) </font></a><br> <a href="/direcciones/hostales.php"><font size="3">Hostales (<? echo "$num_rowsp"; ?>) </font></a>
	</strong></td>
  </tr>
   <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Ultimas creadas (ordenadas por orden de creaci&oacute;n): </strong></td>
  </tr>
  <tr><td>
  <ul>
<?
//Consulta de las direcciones sin clasificar

$consultan="select * from coordenadas where usar = 'si' and en_lista = 'si' and tipo = '' order by fechains desc";
$sql = mysql_query ($consultan);
if (!$sql) {
	echo("<P>Error retrieving table from database!<BR>"."Error: " . mysql_error());
}




while($row = mysql_fetch_array($sql))            
			    { //empieza while principal 
?>
<li><a href="/<?  echo $row[1];  ?>" <? if ($row[13]=='no') { ?> rel="nofollow" <? } ?> style="font-weight:bold">
<?

if ($row[12])
{ 
 echo $row[12]; 
 
} 
else
{
 $textosinguiones = str_replace("-"," ",$row[1]); 
 echo $textosinguiones; 
 
}
?></a>
 <?
if($row[7]) {
  
 echo ('<font color=#666666>('.$row[7].')</font>');
   }

?>  </li><?

}
  ?>
  </ul></td></tr></table>

<p><a href="crea-una-direccion.php">Crea una nueva direcci&oacute;n >></a></p>
<!-- TERMINA LA LISTA DE DIRECCIONES YA CREADAS -->
  <?
include($_SERVER['DOCUMENT_ROOT'].'/includes/footer.php');

include($_SERVER['DOCUMENT_ROOT'].'/includes/tagga.php'); ?>
</body>
</html>
