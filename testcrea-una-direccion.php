<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
	<?php 
	include($_SERVER['DOCUMENT_ROOT'].'/includes/headcommon.php');
	include($_SERVER['DOCUMENT_ROOT'].'/includes/connection.php');
	include($_SERVER['DOCUMENT_ROOT'].'/includes/opendb.php'); 

	
	?>
	<meta http-equiv="description" content="Comparte fácilmente la ruta hacia el destino que tú elijas" />
        <title>Crea tu direccion - <?php include($_SERVER['DOCUMENT_ROOT'].'/includes/title.php'); ?></title>
		       <link href="estilos.css" rel="stylesheet" type="text/css" />


<script src="js/codigosnew.js" type="text/javascript"></script> 
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
				//comprueba caracteres especiales:
					var iChars = "!@#$%^&*()+=[]\\\';,./{}|\":<>?\u00f1\u00d1\u00e1\u00e9\u00ed\u00f3\u00fa\u00c1\u00c9\u00cd\u00d3\u00daýàèìòù`";
  					for (var i = 0; i < form.textoprincipal.value.length; i++) {
  						if (iChars.indexOf(form.textoprincipal.value.charAt(i)) != -1) {
  						alerta(form.textoprincipal, "Por favor, no uses acentos ni caracteres especiales");
						//alert ("Your username has special characters. \nThese are not allowed.\n Please remove them and try again.");
  						return false;
  						} //end if						
 					 } // end for
					pasado = true; 
					form.latitudform.value = latitud;
					form.longitudform.value = longitud;
				
				
				}
				else 
				{
				alerta(form.email, "Por favor, escribe un email valido");
				
				}
				
			}
		 return pasado;
		}
//-->
</script>

	
	</head>
<body onload="load()" onunload="GUnload()" >
<?php 
include($_SERVER['DOCUMENT_ROOT'].'/includes/toputil.php'); 
include($_SERVER['DOCUMENT_ROOT'].'/includes/top.php'); ?>


<!-- <table border="0" cellpadding="3" cellspacing="0" bgcolor="#FFFFCC">
<tr>
  <td><span class="subclaim"><strong>Instrucciones</strong>: Encuentra tu punto en el mapa. Copia la direcci&oacute;n de internet que aparecer&aacute; abajo y comp&aacute;rtela.</span></td>

</tr>
</table>-->
<form action="#" onsubmit="showAddress(this.address.value); return false"> 
        
      <img src="/images/1.gif" width="30" height="32" />Busca tu direcci&oacute;n en el mapa: 
      <input type="text" size="40" name="address" value="" /> 
      <input type="submit" value="Buscar" /> o arrastra el icono hasta el punto exacto:
    </form> 
 
 
  
  <div align="center" id="map" style="width: 980px; height: 350px"></div> 
 
  
  <form action="nombralo.php" name="nombra" id="nombra" method="post" onSubmit="return formCompletado(this)">
  <table width="980">
   
    <tr>
      <td align="right" valign="top"><font size="4"><img src="/images/2.gif" width="30" height="32" /></font></td>
    <td align="right" valign="middle"><strong>Crea tu URL: </strong>www.comoseva.com/</td>
    <td valign="middle">
  <input name="textoprincipal" type="text" id="textoprincipal" size="50" onblur="this.value=removeSpaces(this.value);" /><span id="msgbox" style="display:none"></span></td>
    </tr>
    <tr>
      <td colspan="3" align="center" valign="top"><font color="#999999" size="1">(si usas espacios, ser&aacute;n sustituidos por guiones. ATENCION: todo contenido ser&aacute; visible para TODO EL MUNDO en la parte inferior de esta p&aacute;gina. La IP quedar&aacute; registrada) </font></td>
    </tr>

 <tr>
   <td align="right">&nbsp;</td>
   <td align="right">
  
  Escribe aqu&iacute; brevemente el nombre del lugar: </td>
   <td>
  <input name="textoconespacios" type="text" id="textoconespacios" size="50" />  </td></tr><tr>
    <td align="right">&nbsp;</td>
    <td align="right">Si quieres, puedes insertar comentarios a la direcci&oacute;n (por ejemplo, tu calle, o indicaciones extra para llegar):</td>
    <td><input name="comentarios" type="text" id="comentarios" size="80" />  </td></tr>
   <tr>
     <td align="right">&nbsp;</td>
    <td align="right">

  tu email: </td><td>
  <input name="email" type="text" id="email" size="50" />
  </td></tr>
    <tr>
      <td align="right">&nbsp;</td>
    <td align="right">Y por &uacute;ltimo demuestra que eres un ser humano:</td>
    <td><script language="javascript">
//document.write(latitud);

var RecaptchaOptions = {
   theme : 'white',
   tabindex : 2,
   lang: 'es'
   
};

</script><?
  require_once('recaptchalib.php');
include($_SERVER['DOCUMENT_ROOT'].'/includes/recaptcha.php');

echo recaptcha_get_html($publickey);


  ?><font color="#999999" size="1">(Este sistema es necesario para evitar cargas automatizadas)    </font>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="Submit" value="Crea mi direccion!!!" class="botonenviarhome" />  </td></tr>
	 <tr>
	   <td>&nbsp;</td>
	   <td colspan="2" align="center">&nbsp;</td>
    </tr>
	 <tr>
    <td>&nbsp;</td>
    <td colspan="2" align="center"> <font color="#999999">Si no quieres ponerle nombre, tambi&eacute;n puedes usar esta URL: (copiala y p&eacute;gala donde quieras):<br />
      <span class="url3">www.comoseva.com/aqui.php?lat=<span id="longspan"></span>&amp;long=<span id="latspan"></span></span></font></td>
    </tr>
  </table>
 <input type="hidden" name="latitudform" value="" />
    <input type="hidden" name="longitudform" value="" />
</form>



  <?
include($_SERVER['DOCUMENT_ROOT'].'/includes/footer.php');

include($_SERVER['DOCUMENT_ROOT'].'/includes/tagga.php'); ?>
</body>
</html>
