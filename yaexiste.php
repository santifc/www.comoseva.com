<?
$texto = @$_GET['texto'];
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
		<?php include($_SERVER['DOCUMENT_ROOT'].'/includes/headcommon.php'); ?>
	<meta http-equiv="description" content="Comparte fácilmente la ruta hacia el destino que tú elijas" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php include($_SERVER['DOCUMENT_ROOT'].'/includes/title.php'); ?></title>
		       <link href="estilos.css" rel="stylesheet" type="text/css" />

<script src="js/codigos.js" type="text/javascript"></script> 


	</head>
<body>

<p>
  <?php include($_SERVER['DOCUMENT_ROOT'].'/includes/top.php'); ?>


<font size=7 color="#FF0000">La direcci&oacute;n <br /><b>www.comoseva.com/<? echo $texto ?> </b><br /> ya existe! :(</font></p>
<p><a href="/">Elige otro texto</a> para tu direcci&oacute;n.
  <?php 
include($_SERVER['DOCUMENT_ROOT'].'/includes/footer.php');

include($_SERVER['DOCUMENT_ROOT'].'/includes/tagga.php'); ?>
</p>
</body>
</html>
