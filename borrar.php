<?


if(isset($_COOKIE['comoseva']))
{
	$password = $_COOKIE['comoseva']; 
	}
else {
	die ("Borrado incorrecto. <a href=index.php>Volver</a>");
}

include($_SERVER['DOCUMENT_ROOT'].'/includes/connection.php');
include($_SERVER['DOCUMENT_ROOT'].'/includes/opendb.php'); 

$texto=($_GET['texto']);
if ($texto==""){
header( 'Location: /index.php' ) ;
}

$consultan="SELECT password FROM coordenadas WHERE texto ='$texto' and usar = 'si'";
$sql = mysql_query ($consultan);
if (!$sql) {
	
	die("<P>combinacion de email y contrase&ntilde;a no valida");
}
$row = mysql_fetch_row($sql);
if ($row[0]!=$password)
{
//echo ("bd ".$row[0]);
//echo ("cookie ".$password);
die("combinacion de email y contrase&ntilde;a no valida. <a href=index.php>Volver</a>");
}
else
{

mysql_query("DELETE FROM coordenadas WHERE texto ='$texto' and password = '$password'") 
or die(mysql_error());  

  $cabeceras = 'From: Comoseva.com <dime@comoseva.com>' . "\r\n" .
    'Reply-To: dime@comoseva.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
      $mailenviado = mail("santiagofcm@yahoo.es","Direccion borrada: ".$texto,"Direccion borrada: ".$texto,$cabeceras);

 ?>
<html>
<head>
	<?php include($_SERVER['DOCUMENT_ROOT'].'/includes/headcommon.php'); ?>

<title>URL borrada - <? include($_SERVER['DOCUMENT_ROOT'].'/includes/title.php');  ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php include($_SERVER['DOCUMENT_ROOT'].'/includes/top.php'); ?>

<p>URL ELIMINADA
</p>
<p><a href="index.php">Vuelve a la home</a></p>
<p>&nbsp; </p>
<?php 
include($_SERVER['DOCUMENT_ROOT'].'/includes/footer.php');

include($_SERVER['DOCUMENT_ROOT'].'/includes/tagga.php'); ?>


</body>
</html>
<?
}
?>