<html>
    <head>
	<?php 
	include($_SERVER['DOCUMENT_ROOT'].'/includes/headcommon.php');
	include($_SERVER['DOCUMENT_ROOT'].'/includes/connection.php');
	include($_SERVER['DOCUMENT_ROOT'].'/includes/opendb.php'); 

	
	?>
	<meta http-equiv="description" content="Comparte fácilmente la ruta hacia el destino que tú elijas" />
        <title>Crea tu punto usando tu iPhone - <?php include($_SERVER['DOCUMENT_ROOT'].'/includes/title.php'); ?></title>
		       <link href="estilos.css" rel="stylesheet" type="text/css" />

<script LANGUAGE="JavaScript">





//funcion original para quitar espacios
function removeSpaces(string) {
 stringfixed = string.split(' ').join('-');
 stringfixed = stringfixed.toLowerCase();
 return stringfixed; 
 }

//NUEVA FUNCION MUCHO MAS AVANZADA	
function removeSpacesb(string) {
stringfixed = string.split(' ').join('-');
stringfixed = stringfixed.toLowerCase();
var r = stringfixed;
r = r.replace(new RegExp("[àáâãäå]", 'g'),"a");
r = r.replace(new RegExp("æ", 'g'),"ae");
r = r.replace(new RegExp("ç", 'g'),"c");
r = r.replace(new RegExp("[èéêë]", 'g'),"e");
r = r.replace(new RegExp("[ìíîï]", 'g'),"i");
r = r.replace(new RegExp("ñ", 'g'),"n");                            
r = r.replace(new RegExp("[òóôõö]", 'g'),"o");
r = r.replace(new RegExp("œ", 'g'),"oe");
r = r.replace(new RegExp("[ùúûü]", 'g'),"u");
r = r.replace(new RegExp("[ýÿ]", 'g'),"y");
r = r.replace(new RegExp("[!¡¿?]", 'g'),"");
return r;

 }

					


function quitaguiones(string) {
 return string.split('-').join(' ');
}


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
			else if (form.textoconespacios.value == "")
			{
				alerta(form.textoconespacios, "Por favor, pon tu titulo al lugar");
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
					
				//alert(location.coords.latitude);
				
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


	<meta content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" name="viewport"/>

</head>
<body>

  <form action="nombralo.php" name="nombra" id="nombra" method="post" onSubmit="return formCompletado(this)">
  <table>
   
    <tr>
      <td align="right" valign="top"></td>
      <td align="center"><a href="/"><font size="2"><< Volver a la home</font></a><br></td>
      <td></td>
    </tr>
    <tr>
      <td align="right" valign="top"></td>
      <td align="center">&nbsp;</td>
      <td></td>
    </tr>
    <tr>
      <td align="right" valign="top"></td>
      <td align="center"><strong><font color="#0066FF">SE GUARDAR&Aacute; TU POSICI&Oacute;N ACTUAL RECOGIDA POR TU DISPOSITIVO</font> </strong></td>
      <td></td>
    </tr>
    <tr>
      <td align="right" valign="top"></td>
      <td align="center"> Ponle un t&iacute;tulo al lugar: <br>
      <input name="textoconespacios" type="text" id="textoconespacios" onBlur="textoprincipal.value=removeSpacesb(this.value);" size="40" /> </td>
      <td>     </td>
    </tr>
    <tr>
      <td align="right" valign="top">&nbsp;</td>
    <td align="center" valign="top"><strong> URL: </strong>www.comoseva.com/<br>
      <input name="textoprincipal" type="text" id="textoprincipal" size="40" onBlur="this.value=removeSpacesb(this.value);" />
  <span id="msgbox" style="display:none"></span><font color="#999999" size="1"> <br>
  (MODIFICA LA URL A TU GUSTO. Tu IP quedar&aacute; registrada) </font></td>
    <td valign="middle">  </td>
    </tr>
    

 <tr>
    <td align="right">&nbsp;</td>
    <td align="center" valign="top">Comentarios:<br>
      <textarea name="comentarios" id="comentarios" cols="42" rows="3"></textarea>
      <font color="#999999" size="1"><br>
      (Te recomendamos que no dejes datos demasiado<br>
      personales ni indicativos de donde vives. )</font></td>
    <td></td>
 </tr>
   <tr>
     <td align="right">&nbsp;</td>
    <td align="center" valign="top">

  Tu email:<br>
  <input name="email" type="text" id="email" size="40" />   <br>
  <font color="#999999" size="1">(no saldr&aacute; en la p&aacute;gina) </font> </td>
    <td>  </td>
   </tr>
    <tr>
      <td align="right">&nbsp;</td>
      <td align="center" valign="top"> URL privada 
        <input name="privado" type="checkbox" value="si"><font color="#999999" size="1"><br>
      (No saldrá en el directorio ni será indexada por Google.<br>
      Solo accesible si conoces la URL)</font></td>
      <td></td>
    <tr>
      <td align="right">&nbsp;</td>
    <td align="center" valign="top">Y por &uacute;ltimo demuestra
      que eres un ser humano:<br>
      <script language="javascript">
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


  ?><font color="#999999" size="1">(Este sistema es necesario para evitar cargas automatizadas)    </font></td>
    <td></td>
  <tr>
    <td>&nbsp;</td>
    <td align="center"><input type="submit" name="Submit" value="Crea mi punto!!!" class="botonenviarhome" /></td>
    <td>  </td></tr>
	 <tr>
	   <td>&nbsp;</td>
	   <td colspan="2" align="center">&nbsp;</td>
    </tr>
  </table>
 <input type="hidden" name="latitudform" value="" />
    <input type="hidden" name="longitudform" value="" />
</form>

<script>
if (navigator.geolocation) 
{
	navigator.geolocation.getCurrentPosition( 
 
		function (position) {  
 
		// Did we get the position correctly?
		//alert (position.coords.latitude);
 
		// To see everything available in the position.coords array:
		// for (key in position.coords) {alert(key)}
 
		mapServiceProvider(position.coords.latitude,position.coords.longitude);
 
		}, 
		// next function is the error callback
		function (error)
		{
			switch(error.code) 
			{
				case error.TIMEOUT:
					alert ('Timeout');
					break;
				case error.POSITION_UNAVAILABLE:
					alert ('Position unavailable');
					break;
				case error.PERMISSION_DENIED:
					alert ('Permission denied');
					break;
				case error.UNKNOWN_ERROR:
					alert ('Unknown error');
					break;
			}
		}
		);
	
}
else // finish the error checking if the client is not compliant with the spec
{
alert("No es posible usar la geolocalizacion");
}

function mapServiceProvider(latitude,longitude)
{
	// querystring function from prettycode.org: 
	// http://prettycode.org/2009/04/21/javascript-query-string/
document.nombra.latitudform.value = latitude;
document.nombra.longitudform.value = longitude;
}

			

</script>
<?php 

include($_SERVER['DOCUMENT_ROOT'].'/includes/tagga.php'); ?>

</body>
</html>
