<?
include ($_SERVER['DOCUMENT_ROOT'].'/includes/connect.php'); 
include ($_SERVER['DOCUMENT_ROOT'].'/includes/opendb.php');
$item=($_GET['item']);
$accion=($_GET['mo']);

if ($accion=="mostrar") {
$query = "UPDATE secciones SET mostrar='y' WHERE id = $item";
mysql_query($query) or die('Error, UPDATE query failed1. ERROR: '.mysql_error());
}
elseif ($accion=="ocultar") {
$query = "UPDATE secciones SET mostrar='n' WHERE id = $item";
mysql_query($query) or die('Error, UPDATE query failed1. ERROR: '.mysql_error());
}


//$query = "FLUSH PRIVILEGES";
//mysql_query($query) or die('Error, UPDATE query failed2. ERROR: '.mysql_error());


 ?>
<html>
<head>
<title>Documento sin t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta http-equiv="refresh" content="0;URL=editaritems.php">
</head>

<body>
Loading...
</body>
</html>
