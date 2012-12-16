<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
	<?php 
	include($_SERVER['DOCUMENT_ROOT'].'/includes/headcommon.php');
	include($_SERVER['DOCUMENT_ROOT'].'/includes/connection.php');
	include($_SERVER['DOCUMENT_ROOT'].'/includes/opendb.php'); 
$id=($_GET['id']);
if ($id==""){
header( 'Location: /index.php' ) ;
}
$consultab="SELECT * FROM coordenadas LEFT JOIN tipo_direccion ON tipo_direccion.id = coordenadas.tipo WHERE coordenadas.id = '$id' and coordenadas.usar = 'si' ";
$sql = mysql_query ($consultab);
if (!$sql) {
	echo("<P>Error retrieving table from database!<BR>"."Error: " . mysql_error());
}

$row = mysql_fetch_row($sql);

if (!$row[0]){
header( 'Location: /index.php' ) ;

}

	?>
	<meta name="robots" content="noindex">


        <title>Borra tu direccion - <?php include($_SERVER['DOCUMENT_ROOT'].'/includes/title.php'); ?></title>
		       <link href="estilos.css" rel="stylesheet" type="text/css" />


<script language="javascript">
function alerta(element, message)
		{
			alert(message);
			element.focus();
		}
		
function formCompletado(form)
		{
			var pasado = false;
			if (form.email.value == "")
			{
				alerta(form.email, "Por favor, pon tu email");
			}
			else if (form.password.value == "")
			{
				alerta(form.password, "Por favor, pon tu la password");
			}	
			else
			{
			pasado = true
			}
			 return pasado;
		}
			
			</script>
	</head>
<body>

<?php
include($_SERVER['DOCUMENT_ROOT'].'/includes/toputil.php');
include($_SERVER['DOCUMENT_ROOT'].'/includes/top.php');


?>

<table width="950" border="0" cellpadding="2" cellspacing="2">
  <tr>
    <td><strong>BORRAR <? echo $row[12];  ?></strong></td>
  </tr>
  <tr>
    <td><form action="confirmarborrar.php" name="borrar" id="borrar" onSubmit="return formCompletado(this)">
	email: 
	    <input type="text" name="email"><br>
	password: <input type="password" name="password"><br>
	<input name="Enviar" type="submit" value="Borrar">
	<input type="hidden" name="texto" value="<? echo $row[1]; ?>">
	</form></td>
  </tr>
  <tr>
    <td><font size="1" face="Arial, Helvetica, sans-serif"><a href="mailto:dime@comoseva.com"><br>
    &iquest;No tienes la contrase&ntilde;a?</a></font></td>
  </tr>
</table>


<?
include($_SERVER['DOCUMENT_ROOT'].'/includes/footer.php');

include($_SERVER['DOCUMENT_ROOT'].'/includes/tagga.php'); ?>
</body>
</html>