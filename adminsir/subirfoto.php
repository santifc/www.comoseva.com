<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Documento sin t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<font size="5" face="Arial, Helvetica, sans-serif"><strong>SUBIR ELEMENTOS </strong><font size="2">[ <a href="index.php">Cancelar y volver al admin</a> ] </font></font>
<p>Las im&aacute;genes a subir han de ser de <strong>calidad</strong>. <strong>M&aacute;ximo 500KB, s&oacute;lo im&aacute;genes JPG o GIF. </strong></p>
<p><strong>El nombre del archivo ha de estar <font color="#FF0000">EN MIN&Uacute;SCULAS</font> y <font color="#FF0000">SIN ESPACIOS</font></strong> </p>
<form enctype="multipart/form-data" action="enviar.php" method="POST">
  <p>
    <input type="hidden" name="MAX_FILE_SIZE" value="500000" />
  Elige archivo para subir: 
  <input name="uploadedfile" type="file" />
  </p>
  <p>y luego     
    <input type="submit" value="Subir archivo" />
  </p>
</form>

</body>
</html>
