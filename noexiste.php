<? 
$txt=($_GET['txt']);  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>No existe :(</title>

  <?php
  
include($_SERVER['DOCUMENT_ROOT'].'/includes/headcommon.php'); 

?>
</head>

<body>
<p>Oh!!!!</p>
<p>Este sitio no existe!! </p>
<p>Quieres crear <a href="http://www.comoseva.com/crea-una-direccion.php?txt=<? echo $txt; ?>">comoseva.com/<? echo $txt; ?></a>?</p>
  <?


include($_SERVER['DOCUMENT_ROOT'].'/includes/tagga.php'); ?>
</body>
</html>
