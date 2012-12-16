<html>
    <head>
	<?php 
	include($_SERVER['DOCUMENT_ROOT'].'/includes/headcommon.php');
	include($_SERVER['DOCUMENT_ROOT'].'/includes/connection.php');
	include($_SERVER['DOCUMENT_ROOT'].'/includes/opendb.php'); 
	$txtb=($_GET['txt']);
	
	?>
	<meta http-equiv="description" content="Comparte fácilmente la ruta hacia el destino que tú elijas" />
        <title>Crea tu punto - <?php include($_SERVER['DOCUMENT_ROOT'].'/includes/title.php'); ?></title>
		       <link href="estilos.css" rel="stylesheet" type="text/css" />


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
			if (form.textoconespacios.value == "")
			{
				alerta(form.textoconespacios, "Por favor, pon un titulo al lugar");
			}
			else if (form.email.value == "")
			{
				alerta(form.email, "Por favor, pon tu email");
			}	
			else if (latitud == 38.71980)
			{
				alert("No has elegido tu punto en el mapa");
				return false;
			}
			else if (form.textoprincipal.value == "")
			{
				alerta(form.textoprincipal, "Por favor, pon una URL");
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
<body onLoad="load()" onUnload="GUnload()" >
<?php 
include($_SERVER['DOCUMENT_ROOT'].'/includes/toputil.php'); 
include($_SERVER['DOCUMENT_ROOT'].'/includes/top.php'); ?>

   <?php
   
   
   
if( strstr($_SERVER['HTTP_USER_AGENT'],'Android') ||
 	strstr($_SERVER['HTTP_USER_AGENT'],'iPhone') ||
	strstr($_SERVER['HTTP_USER_AGENT'],'iPod')
	    ){
	    ?>
<a href="crea-punto-iphone.php" style="font-size:56px;">USAR VERSION PARA iPHONE o ANDROID</a>
		
		<?
	}   
   
   
/*
$browser = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
if ($browser == true)  { ?>
<a href="crea-punto-iphone.php" style="font-size:56px;">USAR VERSION PARA IPHONE</a>
<? }

*/
?>
<? if($txtb) { ?> 
<h1>Crea la dirección: comoseva.com/<? echo $txt; ?></h1>
<? } else { ?>
<h1>Crea una dirección:</h1>
<? } ?>
<!-- <table border="0" cellpadding="3" cellspacing="0" bgcolor="#FFFFCC">
<tr>
  <td><span class="subclaim"><strong>Instrucciones</strong>: Encuentra tu punto en el mapa. Copia la direcci&oacute;n de internet que aparecer&aacute; abajo y comp&aacute;rtela.</span></td>

</tr>
</table>-->
<form action="#" onSubmit="showAddress(this.address.value); return false" > 
        
      <img src="/images/1.gif" width="30" height="32" />Busca la localizaci&oacute;n en el mapa: 
      <input type="text" size="40" name="address" value="" /> 
      <input type="submit" value="Buscar" /> 
      <br>
  o si lo prefieres, <strong>busca y haz zoom </strong> a la localizaci&oacute;n directamente aqu&iacute;:
</form> 
 
 
  
  <div align="center" id="map" style="width: 980px; height: 350px"></div> 
 
  
  <form action="nombralo.php" name="nombra" id="nombra" method="post" onSubmit="return formCompletado(this)">
  <table width="980">
   
    
    
	<? if(!$txtb) { ?> 
	<tr>
      <td align="right" valign="top"><font size="4"><img src="/images/2.gif" width="30" height="32" /></font></td>
      <td align="right"> Ponle un t&iacute;tulo al lugar: </td>
      <td><input name="textoconespacios" type="text" id="textoconespacios" onBlur="textoprincipal.value=removeSpacesb(this.value);" size="50" />      </td>
    </tr>
	<tr>
      <td align="right" valign="top">&nbsp;</td>
    <td align="right" valign="top"><strong>Crea tu URL: </strong>www.comoseva.com/</td>
    <td valign="middle">
  <input name="textoprincipal" type="text" id="textoprincipal" size="50" onBlur="this.value=removeSpacesb(this.value);" />
  <span id="msgbox" style="display:none"></span><font color="#999999" size="1"> <br>
  (MODIFICA LA URL A TU GUSTO) </font></td>
    </tr>
	<? }  else { ?>
	<tr>
      <td align="right" valign="top"><font size="4"><img src="/images/2.gif" width="30" height="32" /></font></td>
      <td align="right"> Ponle un t&iacute;tulo al lugar: </td>
      <td><input name="textoconespacios" type="text" id="textoconespacios" size="50" />      </td>
    </tr>
	<tr>
      <td align="right" valign="top">&nbsp;</td>
    <td align="right" valign="top"><strong>URL: </strong></td>
    <td valign="middle">www.comoseva.com/<? echo $txtb; ?> <a href="crea-una-direccion.php" style="font-size:10px">(cambiar URL)</a>
  <input name="textoprincipal" type="hidden" id="textoprincipal" value="<? echo $txtb; ?>" />
  <span id="msgbox" style="display:none"></span>
  </td>
    </tr>
	<? } ?>
	
    

 <tr>
    <td align="right">&nbsp;</td>
    <td align="right" valign="top">Si quieres, puedes insertar comentarios a la direcci&oacute;n:</td>
    <td><textarea name="comentarios" id="comentarios" cols="42" rows="3"></textarea>
      <font color="#999999" size="1"><br>
      (Te recomendamos que no dejes datos demasiado personales ni indicativos de donde vives. )</font></td>
 </tr>
   <tr>
     <td align="right">&nbsp;</td>
    <td align="right" valign="top">

  Tu email: </td>
    <td>
  <input name="email" type="text" id="email" size="50" />   <br>
  <font color="#999999" size="1">(no saldr&aacute; en la p&aacute;gina) </font></td>
   </tr>
    <tr>
      <td align="right">&nbsp;</td>
      <td align="right" valign="top"><strong><font color="#FF0000" size="2">NUEVO!</font></strong> URL privada </td>
      <td><input name="privado" type="checkbox" value="si"><font color="#999999" size="1">(No saldrá en el directorio ni será indexada por Google. Solo accesible si conoces la URL)</font></td>
    <tr>
      <td align="right">&nbsp;</td>
      <td align="right" valign="top"><strong><font color="#FF0000" size="2">NUEVO!</font></strong> Categor&iacute;a: </td>
      <td><select name="categoria">
	  <option>(sin categoria)</option>
        <option value="1">Puerto de monta&ntilde;a</option>
        <option value="2">Comercio</option>
        <option value="3">Taller</option>
        <option value="4">Hostal/Hotel</option>
		
      </select> 
        <font color="#999999" size="1"><br>
        Opcional. Solo por si quieres que tu direcci&oacute;n aparezca en nuestro directorio de talleres, hostales, etc...</font></td>    
    <tr>
      <td align="right">&nbsp;</td>
    <td align="right" valign="top">Y por &uacute;ltimo demuestra que eres un ser humano:</td>
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
    <td><input type="submit" name="Submit" value="Crea mi punto!!!" class="botonenviarhome" />  </td></tr>
	 <tr>
	   <td>&nbsp;</td>
	   <td colspan="2" align="center">&nbsp;</td>
    </tr>
	 <tr>
    <td>&nbsp;</td>
    <td colspan="2" align="center"><font color="#999999">URL R&Aacute;PIDA:<br> 
      <span class="url3">comoseva.com/aqui.php?lat=<span id="longspan"></span>&amp;long=<span id="latspan"></span></span></font></td>
    </tr>
  </table>
 <input type="hidden" name="latitudform" value="" />
    <input type="hidden" name="longitudform" value="" />
</form>

<div align="center" style="width:950px; ">
<?php 
include($_SERVER['DOCUMENT_ROOT'].'/includes/footer.php');

include($_SERVER['DOCUMENT_ROOT'].'/includes/tagga.php'); ?>
</div>
</body>
</html>
