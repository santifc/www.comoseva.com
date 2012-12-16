<html>
<head>

<script LANGUAGE="JavaScript">
		<!--
		function alerta(element, message)
		{
			alert(message);
			element.focus();
		}
		
		function formCompletado(form)
		{
			var pasado = false;
			if (form.titular.value == "")
			{
				alerta(form.titular, "No has puesto titular");
			}	
			else if (form.seccion.value == "")
			{
				alerta(form.seccion, "No has indicado seccion");
			}	
			else if (form.adjunto1.value != "")
			{
			if (form.tituloadjunto1.value == "")
			{
				alerta(form.tituloadjunto1, "No has puesto titular al archivo adjunto 1");
			}	
			else
			{
			 	pasado = true;
			}
			}	
			else if (form.adjunto2.value != "")
			{
			if (form.tituloadjunto2.value == "")
			{
				alerta(form.tituloadjunto2, "No has puesto titular al archivo adjunto 2");
			}	
			else
			{
			 	pasado = true;
			}
			}	
			else if (form.adjunto3.value != "")
			{
			if (form.tituloadjunto3.value == "")
			{
				alerta(form.tituloadjunto3, "No has puesto titular al archivo adjunto 3");
			}	
			else
			{
			 	pasado = true;
			}
			}	
			else if (form.adjunto4.value != "")
			{
			if (form.tituloadjunto4.value == "")
			{
				alerta(form.tituloadjunto4, "No has puesto titular al archivo adjunto 4");
			}	
			else
			{
			 	pasado = true;
			}
			}	
			else
			{
			 	pasado = true;
			}
		 return pasado;
		}




function writeText (form) {
var currentTime = new Date()
var month = currentTime.getMonth() + 1
var day = currentTime.getDate()
var year = currentTime.getFullYear()
fechahoy=(year + "-" + month + "-" + day)
form.fechacrea.value = fechahoy
form.fechamod.value = fechahoy
}
</SCRIPT>

<title>inserci&oacute;n</title>
</head>
<body>

 <p align="center"><font size="4" face="Arial, Helvetica, sans-serif"> PANEL DE CONTROL</font></p>
 <div align="center">
   <p>Insertar Art&iacute;culos en la web </p>
  
   <?php
if(isset($_POST['add']))
{
include ($_SERVER['DOCUMENT_ROOT'].'/includes/connect.php'); 
include ($_SERVER['DOCUMENT_ROOT'].'/includes/opendb.php'); 
$seccion = mysql_real_escape_string($_POST['seccion']);
$titular = mysql_real_escape_string($_POST['titular']);
$texto = mysql_real_escape_string($_POST['texto']);
$adjunto1 = mysql_real_escape_string($_POST['adjunto1']);
$fecha = mysql_real_escape_string($_POST['fecha']);
$link = mysql_real_escape_string($_POST['link']);
$adjunto2 = mysql_real_escape_string($_POST['adjunto2']);
$adjunto3 = mysql_real_escape_string($_POST['adjunto3']);
$adjunto4 = mysql_real_escape_string($_POST['adjunto4']);
$tituloadjunto1 = mysql_real_escape_string($_POST['tituloadjunto1']);
$tituloadjunto2 = mysql_real_escape_string($_POST['tituloadjunto2']);
$tituloadjunto3 = mysql_real_escape_string($_POST['tituloadjunto3']);
$tituloadjunto4 = mysql_real_escape_string($_POST['tituloadjunto4']);
$fechacrea = mysql_real_escape_string($_POST['fechacrea']);
$fechamod = mysql_real_escape_string($_POST['fechamod']);
$mostrar = mysql_real_escape_string($_POST['mostrar']);
$comentarios = mysql_real_escape_string($_POST['comentarios']);
$query = "INSERT INTO secciones (titular,texto,seccion,fecha,fechamod,fechacrea,mostrar,adjunto1,adjunto2,adjunto3,adjunto4,comentarios,link,tituloadjunto1,tituloadjunto2,tituloadjunto3,tituloadjunto4) VALUES ('$titular','$texto','$seccion','$fecha','$fechamod','$fechacrea','$mostrar','$adjunto1','$adjunto2','$adjunto3','$adjunto4','$comentarios','$link','$tituloadjunto1','$tituloadjunto2','$tituloadjunto3','$tituloadjunto4')";
mysql_query($query) or die('Error, insert query failed1. ERROR: '.mysql_error());

//$query = "FLUSH PRIVILEGES";
//mysql_query($query) or die('Error, insert query failed2. ERROR: '.mysql_error());

?>
Nuevo artculo aadido<br>
<a href="insertar.php">Aadir otro articulo</a><br>
<a href="index.php">volver</a>

<?

}
else
{
?>
<a href="index.php">Cancelar y volver</a>
<form method="post" onSubmit="return formCompletado(this)">
<table width="800" border="0" cellspacing="5" cellpadding="5">

<tr bgcolor="#FFFFCC"> 
<td width="100">Titular</td>
<td><input name="titular" type="text" id="titular" size="60">
  <strong>NO</strong> PONER COMILLAS</td>
</tr>
<tr bgcolor="#FFFFCC">
  <td>Subtitular</td>
  <td><input name="subtitular" type="text" id="subtitular" size="60"> <strong>NO</strong> PONER COMILLAS</td>
</tr>
<tr bgcolor="#FFFFCC">
  <td>Texto</td>
  <td><textarea name="texto" cols="100" rows="10" id="texto"></textarea> 
    Texto todo lo plano posible </td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr bgcolor="#99FFFF">
  <td><strong>Titulo</strong> del archivo 1 </td>
  <td><input name="tituloadjunto1" type="text" id="tituloadjunto1" size="60">
    <strong>NO</strong> PONER COMILLAS</td>
</tr>
<tr bgcolor="#99FFFF">
  <td>Archivo 1 <br>
    <font size="2"> (p.ej. <strong>pepe.jpg</strong> o <strong>galicia.doc</strong>)</font></td>
  <td><input name="adjunto1" type="text" id="adjunto1" size="60">    <font size="2">EL ARCHIVO  HA DE HABER SIDO SUBIDO PRIMERO A TRAVES DEL <a href="subirfoto.php">SISTEMA DE SUBIDA DE ARCHIVOS </a> ( poner s&oacute;lo el nombre de la imagen, p.ej. <strong>pepe.jpg</strong> o <strong>galicia.doc</strong>) </font></td>
</tr>
<tr bgcolor="#99CCFF">
  <td><strong>Titulo</strong> del archivo 2 </td>
  <td><input name="tituloadjunto2" type="text" id="tituloadjunto2" size="60">
    <strong>NO</strong> PONER COMILLAS</td>
</tr>
<tr bgcolor="#99CCFF">
  <td>Archivo 2<br>
    <font size="2"> (p.ej. <strong>pepe.jpg</strong> o <strong>galicia.doc</strong>)</font></td>
  <td><input name="adjunto2" type="text" id="adjunto2" size="60">
    <font size="2">EL ARCHIVO HA DE HABER SIDO SUBIDO PRIMERO A TRAVES DEL <a href="subirfoto.php">SISTEMA DE SUBIDA DE ARCHIVOS </a> ( poner s&oacute;lo el nombre de la imagen, p.ej. <strong>pepe.jpg</strong> o <strong>galicia.doc</strong>) </font></td>
</tr>
<tr bgcolor="#99FFFF">
  <td><strong>Titulo</strong> del archivo 3 </td>
  <td><input name="tituloadjunto3" type="text" id="tituloadjunto3" size="60">
    <strong>NO</strong> PONER COMILLAS</td>
</tr>
<tr bgcolor="#99FFFF">
  <td>Archivo 3 <br>
    <font size="2"> (p.ej. <strong>pepe.jpg</strong> o <strong>galicia.doc</strong>)</font></td>
  <td><input name="adjunto3" type="text" id="adjunto3" size="60">
    <font size="2">EL ARCHIVO HA DE HABER SIDO SUBIDO PRIMERO A TRAVES DEL <a href="subirfoto.php">SISTEMA DE SUBIDA DE ARCHIVOS </a> ( poner s&oacute;lo el nombre de la imagen, p.ej. <strong>pepe.jpg</strong> o <strong>galicia.doc</strong>) </font></td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr bgcolor="#FFFFCC">
  <td>Link externo</td>
  <td bgcolor="#FFFFCC"><input name="link" type="text" id="link" size="60"> 
    <font size="1">Escribir el link entero, p.ej: http://www.elmundo.es/casa.html </font></td>
</tr>
<tr bgcolor="#FFFFCC">
  <td>Fecha del art&iacute;culo</td>
  <td><input name="fecha" type="text" id="fecha"> 
        
    (IMPORTANTE: yyyy-mm-dd) Normalmente la fecha de hoy </td>
</tr>

<tr bgcolor="#CCCCCC">
  <td>Fecha Inserci&oacute;n </td>
  <td><input name="fechacrea" type="text" id="fechacrea" size="50"> 
    (no modificar) </td>
</tr>
<tr bgcolor="#CCCCCC">
  <td>Fecha Modificaci&oacute;n </td>
  <td><input name="fechamod" type="text" id="fechamod" size="50">
    (no modificar)</td>
</tr>
<tr bgcolor="#CCCCCC">
  <td>MOSTRAR?</td>
  <td><input name="mostrar" type="radio" value="y" checked> 
    YES
      <input name="mostrar" type="radio" value="n"> 
  NO (el art&iacute;culo queda grabado, pero puedes hacer que se vea en la p&aacute;gina o no. Luego se puede cambiar) </td>
</tr>
<tr> 
<td width="100">&nbsp;</td>
<td><input name="add" type="submit" id="add" value="A&ntilde;adir Noticia" onClick="writeText(this.form)"> <a href="index.php">Cancelar y volver</a></td>
</tr>
</table>
</form>
<?php
}
?>
</div>
 <p>&nbsp;
</p>
</body>
</html>