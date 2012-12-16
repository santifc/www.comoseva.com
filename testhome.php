<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
	<meta http-equiv="description" content="Comparte fácilmente la ruta hacia el destino que tú elijas" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php include ('/web/htdocs/www.comoseva.com/home/includes/title.php'); ?></title>
		       <link href="estilos.css" rel="stylesheet" type="text/css" />

<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAAW6glqOfW7t0vZ22w6-vojxSCvwQ80fQiNOPY59cqy02nkCll5BT5xMuAkb1hRAOx0Bk4NeT5_izkGw&hl=es" type="text/javascript"></script> 

<script src="js/codigos.js" type="text/javascript"></script> 
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
			if (form.textoprincipal.value == "")
			{
				alerta(form.textoprincipal, "Por favor, pon un texto que indique tu direccion");
			}
			else if (form.email.value == "")
			{
				alerta(form.email, "Por favor, pon tu email");
			}	
			else
			{
			 	//comprobamos la sintaxis del email
				var ello = form.email.value;
				var pasado = false;
				var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				if (filter.test(ello)) 
				{ 
				pasado = true; 
				form.latitudform.value = latitud;
				form.longitudform.value = longitud;
				}
				else 
				{
				alerta(form.email, "Por favor, escribe un email válido");
				
				}
				
			}
		 return pasado;
		}
//-->
</script>

	
	</head>
<body onload="load()" onunload="GUnload()" >

<?php include ('/web/htdocs/www.comoseva.com/home/includes/top.php'); ?>
<table border="0" cellpadding="0" cellspacing="3" bgcolor="#FFFFCC">
<tr>
  <td><span class="subclaim"><strong>Instrucciones</strong>: Encuentra tu punto en el mapa. Abajo encontrarás la dirección de internet que puedes usar para compartir.</span></td>

</tr>
</table><form action="#" onsubmit="showAddress(this.address.value); return false"> 
        
      <img src="/images/1.gif" width="30" height="32" />Escribe aquí la dirección: 
      <input type="text" size="60" name="address" value="Paseo de la castellana 45, madrid" onFocus="this.value='';" /> 
      <input type="submit" value="Buscar" /> o arrastra el icono hasta el punto exacto:
    </form> 
 
 
  
  <div align="center" id="map" style="width: 980px; height: 350px"></div> 
  <table border="0" cellpadding="3" cellspacing="3">
    <tr><td><img src="/images/2.gif" width="30" height="32" /></td>
    <td>Esta es tu dirección (copiala y pégala donde quieras):<br />
<span class="url1">www.comoseva.com/aqui.php?lat=<span id="longspan"></span>&amp;long=<span id="latspan"></span></span></td></tr></table>
 

  <P>
O si lo prefieres, personaliza la dirección poniéndola un nombre: (por ejemplo: www.comoseva.com/<strong>restaurantefiestanavidad</strong>)
<form action="nombralo.php" name="nombra" id="nombra" method="post" onSubmit="return formCompletado(this)">
  <label>
  www.comoseva.com/
  <input name="textoprincipal" type="text" id="textoprincipal" size="50" onblur="this.value=removeSpaces(this.value);" /><span id="msgbox" style="display:none"></span>

  </label>
  <font color="#666666"> (no uses espacios, serán sustituidos por guiones)  </font><br />
<label>
  tu email*: 
  <input name="email" type="text" id="email" size="50" />
  </label>
<script language="javascript">
//document.write(latitud);
</script>

<br />

  <label>
  <input type="submit" name="Submit" value="Enviar" />
  </label>
  
<br />
  Si quieres, puedes insertar comentarios a la dirección: 
  <label>
  <input name="comentarios" type="text" id="comentarios" size="75" /> 
  </label>
  <input type="hidden" name="latitudform" value="" />
    <input type="hidden" name="longitudform" value="" />
</form>

<?php 
include ('/web/htdocs/www.comoseva.com/home/includes/footer.php');

include ('/web/htdocs/www.comoseva.com/home/includes/tagga.php'); ?>
</body>
</html>
