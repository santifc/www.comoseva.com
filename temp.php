<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
	<?php 
	include($_SERVER['DOCUMENT_ROOT'].'/includes/headcommon.php');
	include($_SERVER['DOCUMENT_ROOT'].'/includes/connection.php');
	include($_SERVER['DOCUMENT_ROOT'].'/includes/opendb.php'); 

	
	?>
	<meta http-equiv="description" content="Comparte fácilmente la ruta hacia el destino que t&uacute; elijas" />
         <title><?php include($_SERVER['DOCUMENT_ROOT'].'/includes/title.php'); ?></title>
		       <link href="estilos.css" rel="stylesheet" type="text/css" />



	
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>
<body>

<?php
include($_SERVER['DOCUMENT_ROOT'].'/includes/toputil.php');
include($_SERVER['DOCUMENT_ROOT'].'/includes/top.php');

// consulta de las direcciones de los puertos de montaña
$consulta2="select * from coordenadas where usar = 'si' and en_lista = 'si' and tipo = 1";
$sql2 = mysql_query ($consulta2);
if (!$sql2) {
	echo("<P>Error retrieving table from database!<BR>"."Errors: " . mysql_error());
}
$num_rows = mysql_num_rows($sql2);

$consultat="select * from coordenadas where usar = 'si' and en_lista = 'si' and tipo = 3";
$sqlt = mysql_query ($consultat);
if (!$sqlt) {
	echo("<P>Error retrieving table from database!<BR>"."Errort: " . mysql_error());
}
$num_rowst = mysql_num_rows($sqlt);


$consultas="select * from coordenadas where usar = 'si' and en_lista = 'si' and tipo = ''";
$sqls = mysql_query ($consultas);
if (!$sqls) {
	echo("<P>Error retrieving table from database!<BR>"."Errors: " . mysql_error());
}
$num_rowss = mysql_num_rows($sqls);


?>
<table width="950" border="0" cellpadding="2" cellspacing="2">

 <tr>
    <td align="center" class="celdahome"><p><a href="crea-una-direccion.php" class="linkhome">Crea una nueva direcci&oacute;n
    y comp&aacute;rtela</a> <br><font color="#999999">(www.comoseva.com/mi-direccion) </font></p></td> </tr> <tr>
    <td align="center" class="celdahome"><p><a href="ruta.php" class="linkhome">Encuentra una ruta 
    entre dos puntos</a> <br>
    <font color="#999999">(Planea bien tu pr&oacute;ximo viaje) </font></p></td>
  </tr>
<tr><td height="40"></td></tr>

  <tr>
    <td>Direcciones ya creadas:</td>
  </tr>
  <tr>
    <td><strong><a href="/direcciones/puertos-montana.php"><font size="3">Puertos de monta&ntilde;a (<? echo "$num_rows"; ?>) </font></a><br>
	<a href="/direcciones/talleres.php"><font size="3">Talleres (<? echo "$num_rowst"; ?>) </font></a>
	<br><a href="ya-creadas.php"><font size="3">Sin clasificar (<? echo "$num_rowss"; ?>)</font></a></strong></td>
  </tr>
   <tr>
    <td>&nbsp;</td>
  </tr>
  
  </table>

  <?
include($_SERVER['DOCUMENT_ROOT'].'/includes/footer.php');

include($_SERVER['DOCUMENT_ROOT'].'/includes/tagga.php'); ?>
</body>
</html>
