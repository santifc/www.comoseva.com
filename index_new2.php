<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
	<?php include ('/web/htdocs/www.comoseva.com/home/includes/headcommon.php'); 
	include ('/web/htdocs/www.comoseva.com/home/includes/connection.php');
include ('/web/htdocs/www.comoseva.com/home/includes/opendb.php'); 

	
	?>
	<meta http-equiv="description" content="Comparte fácilmente la ruta hacia el destino que tú elijas" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>La manera m&aacute;s sencilla de compartir una direcci&oacute;n - <?php include ('/web/htdocs/www.comoseva.com/home/includes/title.php'); ?></title>
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
				//comprueba caracteres especiales:
					var iChars = "!@#$%^&*()+=[]\\\';,./{}|\":<>?ñáéíóúýàèìòù`";
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
  <font color="#999999" size="1"> <br />
  (si usas espacios, serán sustituidos por guiones. ATENCION: todo contenido será visible para TODO EL MUNDO en la parte inferior de esta página)  </font><br />
<label>
  tu email*: 
  <input name="email" type="text" id="email" size="50" />
  </label>
<script language="javascript">
//document.write(latitud);

var RecaptchaOptions = {
   theme : 'white',
   tabindex : 2,
   lang: 'es'
   
};



</script>

  
<br />
  Si quieres, puedes insertar comentarios a la dirección (por ejemplo, tu calle, o indicaciones extra para llegar):<br /> 
  <label>
  <input name="comentarios" type="text" id="comentarios" size="75" /> 
  </label>
<br />Y por último demuestra que eres un ser humano*:<br /><?
  require_once('recaptchalib.php');
$publickey = "6LdxSQQAAAAAANXVc-nxnbRXOye3JM_g-TwVvHaI"; // you got this from the signup page
echo recaptcha_get_html($publickey);


  ?><font color="#999999" size="1">(Este sistema es necesario para evitar cargas automatizadas)    </font>
  <input type="hidden" name="latitudform" value="" />
    <input type="hidden" name="longitudform" value="" />
	<br /><img src="/images/1pix.gif" height="10" /><br />
  <label>
  <input type="submit" name="Submit" value="Crea mi direccion!!!" class="botonenviarhome" />
  </label>

</form>
<p>
<!-- COMIENZA LA LISTA DE DIRECCIONES YA CREADAS: -->
<p><br />
  <strong>Algunas direcciones ya creadas:</strong><br />
<?
//$consultan="select * from coordenadas where usar = 'si' order by texto";
$consultan="select * from coordenadas where usar = 'si' and en_lista = 'si' order by texto";
$sql = mysql_query ($consultan);
if (!$sql) {
	echo("<P>Error retrieving table from database!<BR>"."Error: " . mysql_error());
}

  $num_columns = 3;
  $current_column = 0;
 
  $num_rows = mysql_num_rows ($sql);
  $rows_remaining = $num_rows;
  $rows = array ();
 
  for ($i = 0; $i < $num_columns; $i++) {
    $rows[$i] = ceil ($rows_remaining / ($num_columns - $i));
    $rows_remaining -= $rows[$i];
  }
 
  $table = array ();
  $count = 0;
  while ($row = mysql_fetch_array ($sql)) {
  	//$textosinguiones = str_replace("-"," ",$row[1]); 
  	$table[$current_column][$count] = $row[1];
  	$count++;
  		if ($count == $rows[$current_column]) 
		{
     	$current_column++;
     	$count = 0;
    	}
  }
 
  echo "<table border='0' width='980'>";
  for ($i = 0; $i < $rows[0]; $i++) {
    echo "<tr>";
    for ($j = 0; $j < $num_columns; $j++) {
      if (isset ($table[$j][$i])) {
        $textosinguiones = str_replace("-"," ",$table[$j][$i]); 
		echo "<td width='33%'><a href=/{$table[$j][$i]}>".$textosinguiones."</a></td>";
      }
      else {
        echo "<td>&nbsp;</td>";
      }
    }
    echo "</tr>";
  }
  echo "</table>";
  ?>
  
  <!-- TERMINA LA LISTA DE DIRECCIONES YA CREADAS -->
  <?
include ('/web/htdocs/www.comoseva.com/home/includes/footer.php');

include ('/web/htdocs/www.comoseva.com/home/includes/tagga.php'); ?>
</body>
</html>
