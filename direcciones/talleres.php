<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
	<?php 
	include($_SERVER['DOCUMENT_ROOT'].'/includes/headcommon.php');
	include($_SERVER['DOCUMENT_ROOT'].'/includes/connection.php');
	include($_SERVER['DOCUMENT_ROOT'].'/includes/opendb.php'); 

//$orden = $_GET['orden'].'%';
$orden = $_GET['orden']{0};

$ordengood = mysql_real_escape_string($orden).'%';
//$letratitle = $ordengood{0};
//$ordengood = $orden2{0};
//echo $orden;
//$sql = 'SELECT * FROM games WHERE name LIKE \''.$orden.'\'';  
$consultan="select * from coordenadas where usar = 'si' and en_lista = 'si' and tipo = 3 and texto LIKE '".$ordengood."' order by texto";
$sql = mysql_query ($consultan);
if (!$sql) {
	echo("<P>Error retrieving table from database!<BR>"."Error: " . mysql_error());
}

$num_rows = mysql_num_rows($sql);

	?>
    
	<meta http-equiv="description" content="Comparte fácilmente la ruta hacia el destino que tú elijas" />
        <title>Talleres empezando por la letra <? echo $orden; ?> - <?php include($_SERVER['DOCUMENT_ROOT'].'/includes/title.php'); ?></title>
		       <link href="/estilos.css" rel="stylesheet" type="text/css" />



	
	</head>
<body>

<?php
include($_SERVER['DOCUMENT_ROOT'].'/includes/toputil.php');
include($_SERVER['DOCUMENT_ROOT'].'/includes/top.php');

?>
<!-- COMIENZA LA LISTA DE DIRECCIONES YA CREADAS: -->
<table width="950" border="0" cellpadding="2" cellspacing="2">
<tr><td><table width="100%" cellpadding="4" cellspacing="4">
  <tr align="center">
    <td bgcolor="#CCCCCC"><b><a href="/direcciones/talleres.php?orden=a">A</a></b></td>
    <td bgcolor="#CCCCCC"><b><a href="/direcciones/talleres.php?orden=b">B</a></b></td>
    <td bgcolor="#CCCCCC"><b><a href="/direcciones/talleres.php?orden=c">C</a></b></td>
    <td bgcolor="#CCCCCC"><b><a href="/direcciones/talleres.php?orden=d">D</a></b></td>
    <td bgcolor="#CCCCCC"><b><a href="/direcciones/talleres.php?orden=e">E</a></b></td>
    <td bgcolor="#CCCCCC"><b><a href="/direcciones/talleres.php?orden=f">F</a></b></td>
    <td bgcolor="#CCCCCC"><b><a href="/direcciones/talleres.php?orden=g">G</a></b></td>
    <td bgcolor="#CCCCCC"><b><a href="/direcciones/talleres.php?orden=h">H</a></b></td>
    <td bgcolor="#CCCCCC"><b><a href="/direcciones/talleres.php?orden=i">I</a></b></td>
    <td bgcolor="#CCCCCC"><b><a href="/direcciones/talleres.php?orden=j">J</a></b></td>
    <td bgcolor="#CCCCCC"><b><a href="/direcciones/talleres.php?orden=k">K</a></b></td>
    <td bgcolor="#CCCCCC"><b><a href="/direcciones/talleres.php?orden=l">L</a></b></td>
    <td bgcolor="#CCCCCC"><b><a href="/direcciones/talleres.php?orden=m">M</a></b></td>
    <td bgcolor="#CCCCCC"><b><a href="/direcciones/talleres.php?orden=n">N</a></b></td>
    <td bgcolor="#CCCCCC"><b><a href="/direcciones/talleres.php?orden=o">O</a></b></td>
    <td bgcolor="#CCCCCC"><b><a href="/direcciones/talleres.php?orden=p">P</a></b></td>
    <td bgcolor="#CCCCCC"><b><a href="/direcciones/talleres.php?orden=q">Q</a></b></td>
    <td bgcolor="#CCCCCC"><b><a href="/direcciones/talleres.php?orden=r">R</a></b></td>
    <td bgcolor="#CCCCCC"><b><a href="/direcciones/talleres.php?orden=s">S</a></b></td>
    <td bgcolor="#CCCCCC"><b><a href="/direcciones/talleres.php?orden=t">T</a></b></td>
    <td bgcolor="#CCCCCC"><b><a href="/direcciones/talleres.php?orden=u">U</a></b></td>
    <td bgcolor="#CCCCCC"><b><a href="/direcciones/talleres.php?orden=v">V</a></b></td>
    <td bgcolor="#CCCCCC"><b><a href="/direcciones/talleres.php?orden=w">W</a></b></td>
    <td bgcolor="#CCCCCC"><b><a href="/direcciones/talleres.php?orden=x">X</a></b></td>
    <td bgcolor="#CCCCCC"><b><a href="/direcciones/talleres.php?orden=y">Y</a></b></td>
    <td bgcolor="#CCCCCC"><b><a href="/direcciones/talleres.php?orden=z">Z</a></b></td>
    </tr></table></td></tr>
  <tr>
    <td><strong><a href="/ya-creadas.php">Directorio</a> : Talleres por la <? echo $orden; ?> (<? echo "$num_rows"; ?>):</strong></td>
  </tr>
  
  
  <tr><td>
<ul><?
while($row = mysql_fetch_array($sql))            
			    { //empieza while principal 
?>
<li><a href="/<?  echo $row[1];  ?>" <? if ($row[13]=='no') { ?> rel="nofollow" <? } ?>>
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
?></a> <?
if($row[7]) {
  
 echo (' <font color=#666666>('.$row[7].')</font>');
   }
?></li><?

}
  ?></ul></td></tr></table>


  
  <!-- TERMINA LA LISTA DE DIRECCIONES YA CREADAS -->
  <?
include($_SERVER['DOCUMENT_ROOT'].'/includes/footer.php');

include($_SERVER['DOCUMENT_ROOT'].'/includes/tagga.php'); ?>
</body>
</html>
