<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
	<?php 
	include($_SERVER['DOCUMENT_ROOT'].'/includes/headcommon.php');
	include($_SERVER['DOCUMENT_ROOT'].'/includes/connection.php');
	include($_SERVER['DOCUMENT_ROOT'].'/includes/opendb.php'); 

	
	?>
	<meta http-equiv="description" content="Comparte fácilmente la ruta hacia el destino que tú elijas" />
        <title>Hostales - <?php include($_SERVER['DOCUMENT_ROOT'].'/includes/title.php'); ?></title>
		       <link href="/estilos.css" rel="stylesheet" type="text/css" />



	
	</head>
<body>

<?php
include($_SERVER['DOCUMENT_ROOT'].'/includes/toputil.php');
include($_SERVER['DOCUMENT_ROOT'].'/includes/top.php');

$consultan="select * from coordenadas where usar = 'si' and en_lista = 'si' and tipo = 4 order by texto";
$sql = mysql_query ($consultan);
if (!$sql) {
	echo("<P>Error retrieving table from database!<BR>"."Error: " . mysql_error());
}

$num_rows = mysql_num_rows($sql);

?>
<!-- COMIENZA LA LISTA DE DIRECCIONES YA CREADAS: -->
<table width="950" border="0" cellpadding="2" cellspacing="2">
  <tr>
    <td><strong><a href="../ya-creadas.php">Directorio</a> : Hostales (<? echo "$num_rows"; ?>):</strong></td>
  </tr>
  
  
  <tr><td>
<ul><?
while($row = mysql_fetch_array($sql))            
			    { //empieza while principal 
?>
<li><a href="/<?  echo $row[1];  ?>" <? if ($row[13]=='no') { ?> rel="nofollow" <?
 } 

?>>
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
  
 echo (' <font color=#666666>('.$row[7].')</font>');
   }
?>
</li><?

}
  ?></ul></td></tr></table>


  
  <!-- TERMINA LA LISTA DE DIRECCIONES YA CREADAS -->
  <?
include($_SERVER['DOCUMENT_ROOT'].'/includes/footer.php');

include($_SERVER['DOCUMENT_ROOT'].'/includes/tagga.php'); ?>
</body>
</html>
