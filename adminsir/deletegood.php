<?
include ($_SERVER['DOCUMENT_ROOT'].'/includes/connect.php'); 
include ($_SERVER['DOCUMENT_ROOT'].'/includes/opendb.php');
$actor=($_GET['item']);
mysql_query("DELETE FROM secciones WHERE id='$item'") 
or die(mysql_error());  


 ?>
<html>
<head>
<title>Documento sin t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<p>ARTICULO ELIMINADO
</p>
<p><a href="editaritems.php">Volver a editar Artículos</a></p>

</body>
</html>
