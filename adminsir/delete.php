<?
include ($_SERVER['DOCUMENT_ROOT'].'/includes/connect.php'); 
include ($_SERVER['DOCUMENT_ROOT'].'/includes/opendb.php');
$actor=($_GET['item']);
$consulta="select * from secciones where id = '$item'";
$sql = mysql_query ($consulta);
if (!$sql) {
	echo("<P>Error retrieving table from database!dsd<BR>Error: " . mysql_error());
}
$row = mysql_fetch_row($sql);

 ?>
<html>
<head>
<title>ELIMINAR ITEMS</title>
</head>

<body>
<p align="center">

  
  <font size="7">&iquest;Seguro que quieres eliminar el item<br>  <font color="#FF0000" size="7"><? echo ($row[3]); ?></font>?</font></p>
<div align="center">
  <table width="600" border="1" cellspacing="2" cellpadding="2">
    <tr align="center">
      <td><strong><font color="#FF0000" size="4"><a href="deletegood.php?item=<? echo $row[0]; ?>">SI, eliminar a <? echo ($row[3]); ?> de la base de datos.<br>
      </a></font></strong><font color="#FF0000" size="2">Los datos se eliminarn permanentemente. </font>       </td>
      <td><strong><font size="5"><a href="editaritems.php">CANCELAR</a></font></strong></td>
    </tr>
  </table>
  <p>Recuerda que, en vez de eliminar, tienes la opci&oacute;n de OCULTAR el artculo. Esto lo puedes cambiar <a href="editaritem.php?item=<? echo $row[0];  ?>">editando el artculo</a>. </p>
</div>

</body>
</html>
