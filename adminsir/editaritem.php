<?
include ($_SERVER['DOCUMENT_ROOT'].'/includes/connect.php'); 
include ($_SERVER['DOCUMENT_ROOT'].'/includes/opendb.php'); 
$item=($_GET['item']);
$consulta="select * from secciones where id = '$item'";
$sql = mysql_query ($consulta);
if (!$sql) {
	echo("<P>Error retrieving table from database!dsd<BR>Error: " . mysql_error());
}
$row = mysql_fetch_row($sql);

 ?>
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
form.fechamod.value = fechahoy
}
</SCRIPT>
<link href="includes/estilos.css" rel="stylesheet" type="text/css">
<title>Editar articulos</title>
</head>
<body>
 <p align="center"><font size="4" face="Arial, Helvetica, sans-serif">CALLEJA PANEL DE CONTROL</font></p>
 <div align="center">
  
  
   <?php
if(isset($_POST['mod']))
{

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
//$query = "INSERT INTO secciones (titular,texto,seccion,fecha,fechamod,fechacrea,mostrar,adjunto1,adjunto2,adjunto3,adjunto4,comentarios,link) VALUES ('$titular','$texto','$seccion','$fecha','$fechamod','$fechacrea','$mostrar','$adjunto1','$adjunto2','$adjunto3','$adjunto4','$comentarios','$link')";
$query = "UPDATE secciones SET titular='$titular', texto='$texto', seccion='$seccion', fecha='$fecha', fechamod='$fechamod', fechacrea='$fechacrea', mostrar='$mostrar', adjunto1='$adjunto1', adjunto2='$adjunto2', adjunto3='$adjunto3', adjunto4='$adjunto4', comentarios='$comentarios', link='$link', tituloadjunto1='$tituloadjunto1', tituloadjunto2='$tituloadjunto2', tituloadjunto3='$tituloadjunto3', tituloadjunto4='$tituloadjunto4' WHERE id = $item";
//ery="UPDATE news SET title='$title', date='$date', body='$body' WHERE newsID=$ID
mysql_query($query) or die('Error, UPDATE query failed1. ERROR: '.mysql_error());

echo ("El articulo <b>".$titular."</b> en la seccion <b>".$seccion."</b>, ha sido modificado");
?><p>
<a href="editaritems.php">Editar otro Articulo</a><br><a href="index.php">Volver al panel de control</a>
</p>
<?


//$query = "FLUSH PRIVILEGES";
//mysql_query($query) or die('Error, insert query failed2. ERROR: '.mysql_error());


}
else
{
?>
 <p>Editar Art&iacute;culos en la web </p>
<a href="editaritems.php">Cancelar y volver</a>
<form method="post" onSubmit="return formCompletado(this)">
<table width="700" border="0" cellspacing="5" cellpadding="5">
<tr bgcolor="#FFFFCC">
  <td>Secci&oacute;n</td>
  <td><select name="seccion" id="seccion">
    <option value="libros" <? if ($row[1]=='libros') echo('selected'); ?>>Libros</option>
    <option value="prensa" <? if ($row[1]=='prensa') echo('selected'); ?>>Art&iacute;culos de prensa</option>
    <option value="homenajes" <? if ($row[1]=='homenajes') echo('selected'); ?>>Homenajes</option>
    <option value="images" <? if ($row[1]=='images') echo('selected'); ?>>Im&aacute;genes</option>
    <option value="cuentos" <? if ($row[1]=='cuentos') echo('selected'); ?>>Cuentos</option>
    <option value="colaboraciones" <? if ($row[1]=='colaboraciones') echo('selected'); ?>>Colaboraciones</option>
    <option value="varios" <? if ($row[1]=='varios') echo('selected'); ?>>Varios</option>
  </select></td>
</tr>
<tr bgcolor="#FFFFCC"> 
<td width="100">Titular</td>
<td bgcolor="#FFFFCC"><input name="titular" type="text" id="titular" value="<? echo stripslashes($row[3]); ?>" size="60"> 
  <strong>NO</strong> PONER COMILLAS</td>
</tr>
<tr bgcolor="#FFFFCC">
  <td>Texto</td>
  <td><textarea name="texto" cols="60" rows="5" id="texto"><? echo stripslashes($row[4]); ?></textarea></td>
</tr>
<tr bgcolor="#FFFFCC">
  <td><strong>Titulo</strong> del archivo 1 </td>
  <td><input name="tituloadjunto1" type="text" id="tituloadjunto1" value="<? echo $row[14]; ?>" size="60">
    <strong>NO</strong> PONER COMILLAS</td>
</tr>
<tr bgcolor="#FFFFCC">
  <td>Archivo 1 </td>
  <td><input name="adjunto1" type="text" id="adjunto1" value="<? echo $row[6]; ?>" size="60">    <font size="2">EL ARCHIVO  HA DE HABER SIDO SUBIDO PRIMERO A TRAVES DEL <a href="subirfoto.php">SISTEMA DE SUBIDA DE ARCHIVOS </a> ( poner s&oacute;lo el nombre de la imagen, p.ej. <strong>pepe.jpg</strong> o <strong>galicia.doc</strong>) </font></td>
</tr>
<tr bgcolor="#FFFFCC">
  <td><strong>Titulo</strong> del archivo 2 </td>
  <td><input name="tituloadjunto2" type="text" id="tituloadjunto2" value="<? echo $row[15]; ?>" size="60">
    <strong>NO</strong> PONER COMILLAS</td>
</tr>
<tr bgcolor="#FFFFCC">
  <td>Archivo 2</td>
  <td><input name="adjunto2" type="text" id="adjunto2" value="<? echo $row[7]; ?>" size="60">
    <font size="2">EL ARCHIVO HA DE HABER SIDO SUBIDO PRIMERO A TRAVES DEL <a href="subirfoto.php">SISTEMA DE SUBIDA DE ARCHIVOS </a> ( poner s&oacute;lo el nombre de la imagen, p.ej. <strong>pepe.jpg</strong> o <strong>galicia.doc</strong>) </font></td>
</tr>
<tr bgcolor="#FFFFCC">
  <td><strong>Titulo</strong> del archivo 3 </td>
  <td><input name="tituloadjunto3" type="text" id="tituloadjunto3" value="<? echo $row[16]; ?>" size="60">
    <strong>NO</strong> PONER COMILLAS</td>
</tr>
<tr bgcolor="#FFFFCC">
  <td>Archivo 3 </td>
  <td><input name="adjunto3" type="text" id="adjunto3" value="<? echo $row[8]; ?>" size="60">
    <font size="2">EL ARCHIVO HA DE HABER SIDO SUBIDO PRIMERO A TRAVES DEL <a href="subirfoto.php">SISTEMA DE SUBIDA DE ARCHIVOS </a> ( poner s&oacute;lo el nombre de la imagen, p.ej. <strong>pepe.jpg</strong> o <strong>galicia.doc</strong>) </font></td>
</tr>
<tr bgcolor="#FFFFCC">
  <td><strong>Titulo</strong> del archivo 4 </td>
  <td><input name="tituloadjunto4" type="text" id="tituloadjunto4" value="<? echo $row[17]; ?>" size="60">
    <strong>NO</strong> PONER COMILLAS</td>
</tr>
<tr bgcolor="#FFFFCC">
  <td bgcolor="#FFFFCC">Archivo  4 </td>
  <td><input name="adjunto4" type="text" id="adjunto4" value="<? echo $row[9]; ?>" size="60">
    <font size="2">EL ARCHIVO HA DE HABER SIDO SUBIDO PRIMERO A TRAVES DEL <a href="subirfoto.php">SISTEMA DE SUBIDA DE ARCHIVOS </a> ( poner s&oacute;lo el nombre de la imagen, p.ej. <strong>pepe.jpg</strong> o <strong>galicia.doc</strong>) </font></td>
</tr>
<tr bgcolor="#FFFFCC">
  <td>Link externo</td>
  <td><input name="link" type="text" id="link" value="<? echo $row[5]; ?>" size="60">
    <strong>NO</strong> PONER COMILLAS</td>
</tr>
<tr bgcolor="#FFFFCC">
  <td>Fecha del art&iacute;culo</td>
  <td><input name="fecha" type="text" value="<? echo $row[2]; ?>" id="fecha"> 
        
    (IMPORTANTE: yyyy-mm-dd) Normalmente la fecha de hoy </td>
</tr>
<tr bgcolor="#CCCCCC">
  <td>Comentarios <font size="1">(no salen en la web, es para uso tuyo) </font></td>
  <td><input name="comentarios" type="text" id="comentarios" value="<? echo $row[13]; ?>" size="60">
    <strong>NO</strong> PONER COMILLAS</td>
</tr>
<tr bgcolor="#CCCCCC">
  <td>Fecha Inserci&oacute;n </td>
  <td><input name="fechacrea" type="text" value="<? echo $row[10]; ?>" id="fechacrea" size="50"> 
    (no modificar) </td>
</tr>
<tr bgcolor="#CCCCCC">
  <td>Fecha Modificaci&oacute;n </td>
  <td><input name="fechamod" type="text" value="<? echo $row[11]; ?>" id="fechamod" size="50">
    (no modificar)</td>
</tr>
<tr bgcolor="#CCCCCC">
  <td>MOSTRAR?</td>
  
   <td><input name="mostrar" type="radio" value="y" <? if ($row[12] == 'y') { ?>checked<? } ?>> 
      YES
        <input name="mostrar" type="radio" value="n" <? if ($row[12] == 'n') { ?>checked<? } ?>> 
    NO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(&nbsp;<a href="delete.php?item=<? echo $row[0]; ?>">Eliminar completamente <img src="/images/delete.gif" width="16" height="16" border="0" align="absmiddle"></a>  <font color="#FF0000"><strong>!!</strong></font>) </td>
</tr>
<tr> 
<td width="100">&nbsp;</td>
<td><input name="mod" type="submit" id="mod" value="MODIFICAR" onClick="writeText(this.form)">  <a href="index.php">Cancelar y volver</a></td>
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