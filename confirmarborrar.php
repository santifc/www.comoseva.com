<?



include($_SERVER['DOCUMENT_ROOT'].'/includes/connection.php');
include($_SERVER['DOCUMENT_ROOT'].'/includes/opendb.php'); 

$email=($_GET['email']);
$pass=($_GET['password']);
$texto=($_GET['texto']);
setcookie("comoseva", $pass); 
 ?>
<html>
<head>
	<?php include($_SERVER['DOCUMENT_ROOT'].'/includes/headcommon.php'); ?>

<title>Confirmar - <? include($_SERVER['DOCUMENT_ROOT'].'/includes/title.php');  ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php include($_SERVER['DOCUMENT_ROOT'].'/includes/top.php'); ?>
¿Seguro que quieres borrar la dirección?
<a href="borrar.php?texto=<? echo $texto; ?>">SI</a>&nbsp;&nbsp;&nbsp;<a href="/">NO</a>
<?php 
include($_SERVER['DOCUMENT_ROOT'].'/includes/footer.php');

include($_SERVER['DOCUMENT_ROOT'].'/includes/tagga.php'); ?>


</body>
</html>
