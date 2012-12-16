<html><head>
	<?php 
//	include($_SERVER['DOCUMENT_ROOT'].'/includes/connection.php');
//include($_SERVER['DOCUMENT_ROOT'].'/includes/opendb.php'); 

	
	include($_SERVER['DOCUMENT_ROOT'].'/includes/headcommon.php'); ?>
        <title>EXITO!! <?php include($_SERVER['DOCUMENT_ROOT'].'/includes/title.php'); ?></title>
		       <link href="estilos.css" rel="stylesheet" type="text/css" />

</head>
<body>
<?php
include($_SERVER['DOCUMENT_ROOT'].'/includes/toputil.php');
include($_SERVER['DOCUMENT_ROOT'].'/includes/top.php'); ?>


<p><br>
<table width="950" border="0" cellpadding="5" cellspacing="5" class="cajaurl">
  <tr>
    <td align="center"><strong><font color="#FF9900" size="7">Enhorabuena!</font></strong><br> 
      <font color="#FF9900">Esta es tu direcci&oacute;n:</font></td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
  <tr><td align="center"> <font size=6><a href="/<? echo $textoprincipal ?>" style="text-decoration:none;color:#999999;">www.comoseva.com/<? echo $textoprincipal ?></a></font></td>
</tr>
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
  <td align="center"><font size="4">Publica esta dirección en tu muro de facebook, enviala a tus amigos, etc.<br>
  </font></td>
</tr><tr><td align="center">

  <font color="#666666">Esta es tu contrase&ntilde;a: <b><? echo $password ?></b></font>
</td>
</tr>
<tr><td align="center" style="font-size:11px;">Te hemos enviado un email a <? echo $email; ?> con esta informaci&oacute;n, gu&aacute;rdala en un lugar seguro, puedes necesitarla para hacer modificaciones en el futuro.<p>
  Esta direcci&oacute;n apunta al punto del mapa que seleccionaste en la p&aacute;gina anterior. C&oacute;piala y &uacute;sala como quieras.
    <p> Esta direcci&oacute;n se ha asociado al email <b><? echo $email; ?>, y solo se podr&aacute; modificar o eliminar por su autor.</b>    
    <p>
      <?
  if ($privado <> "si"){

  ?>
      Toda la informaci&oacute;n introducida ser&aacute; visible para todo el mundo. <br>  
        <?
  }
  else
  {

  ?>
      La dirección creada no saldrá en GOOGLE ni en los listados de COMOSEVA.com. Solo se podrá acceder conociendo la URL. Es tu responsabilidad repartir la URL y publicarla en sitios públicos.<br>
        <?
  }
  ?>
     <p> comoseva.com se reserva el derecho de cambiar o eliminar cualquier direcci&oacute;n sin previo aviso. </p>
      <p>comoseva.com no se hace responsable de los contenidos a&ntilde;adidos por sus usuarios.</p>
    <p>No te gusta? puedes <a href="/borrar.php?texto=<? echo $textoprincipal ?>">borrarla</a> y crear una nueva</td></tr>
</table>
<table width="950"><tr><td align="center">
<table width="200" border="0" cellpadding="5" cellspacing="5" style="border-style:solid; border-width:1px; border-color:#77BDFF; background-color:#FFFFCC;">
  <tr>
    <td align="center" ><font size="4"><a href="/crea-una-direccion.php">Crear un punto nuevo</a></font></td>
  </tr></table>
</td></tr></table>
  
  
<table width="950px"><tr><td align="center">
	<?
	include($_SERVER['DOCUMENT_ROOT'].'/includes/footer.php');
	
include($_SERVER['DOCUMENT_ROOT'].'/includes/tagga.php'); ?>

</td></tr></table>
  
</body>
</html>