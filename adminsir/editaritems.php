<?

include ($_SERVER['DOCUMENT_ROOT'].'/includes/connect.php'); 
include ($_SERVER['DOCUMENT_ROOT'].'/includes/opendb.php');
//$actor=($_GET['actor']);
$consulta="select * from secciones order by mostrar desc, seccion";
$sql = mysql_query ($consulta);
if (!$sql) {
	echo("<P>Error retrieving table from database!dsd<BR>Error: " . mysql_error());
}

 ?>
<html>
<head>
<title>EDITAR ARTICULOS</title>


</head>
<body>

 <p align="center"><font size="4" face="Arial, Helvetica, sans-serif"> PANEL DE CONTROL</font></p>
 <p align="center">EDITAR ARTICULOS [ <a href="insertar.php">insertar articulo nuevo</a> ] [ <a href="index.php">Cancelar y volver al admin</a> ] 
 <p>&nbsp;</p>
 <table width="100%" border="1" align="center">
   <tr><td>ID</td><td>SECCION</td><td>TITULAR</td><td align="center">Mostrar o<br>
   Ocultar</td><td>FECHA <br>
     CREACION</td>
   <td>FECHA <br>
     MODIFICACION</td>
 
   <td align="center"><font color="#FF0000">&iquest;Eliminar<br>
   para<br> 
   siempre?</font></td>
 </tr><?
//$row = mysql_fetch_row($sql);
 while($row = mysql_fetch_array($sql))            
			    { //empieza while principal ?>


<tr><td><? echo $row[0];  ?></td><td><? echo stripslashes($row[1]);  ?></td><td><a href="editaritem.php?item=<? echo $row[0];  ?>"><? echo stripslashes($row[3]);  ?></a></td><td align="center"><? if ($row[12]=='n') { ?>
    <strong><font color="#FF0000">OCULTADO</font></strong> | <a href="mostrarocultar.php?item=<? echo $row[0]; ?>&mo=mostrar">MOSTRAR</a>  <? } else { ?>
  <a href="mostrarocultar.php?item=<? echo $row[0]; ?>&mo=ocultar">OCULTAR</a><? } ?></td>
<td><? echo $row[10];  ?></td><td><? echo $row[11];  ?></td>
<td align="center"><a href="delete.php?item=<? echo $row[0]; ?>"><img src="/images/delete.gif" alt="Eliminar a <? echo $row[3] ?>" width="16" height="16" border="0"></a></td>
</tr>
<?  

}?> </table>
</body>
</html>