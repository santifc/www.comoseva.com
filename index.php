<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
		xmlns:fb="http://ogp.me/ns/fb#">
    <head>
	<meta property="og:title" content="COMOSEVA.com"/>
<meta property="og:type" content="website"/>
    <meta property="og:url" content="http://www.comoseva.com"/>
    <meta property="og:image" content="http://www.comoseva.com/images/opengraphimg.png"/>
   <meta property="og:site_name" content="COMOSEVA.com"/> 
   <meta property="fb:admins" content="santifc"/>

    <meta property="fb:page_id" content="39798077668" />
	<?php 
	include($_SERVER['DOCUMENT_ROOT'].'/includes/headcommon.php');
	include($_SERVER['DOCUMENT_ROOT'].'/includes/connection.php');
	include($_SERVER['DOCUMENT_ROOT'].'/includes/opendb.php'); 

	
	?>
	<meta http-equiv="description" content="Comparte fácilmente la ruta hacia el destino que tú elijas. Totalmente gratis. Crea un punto en un mapa y envíalo a tus amigos" />
         <title><?php include($_SERVER['DOCUMENT_ROOT'].'/includes/title.php'); ?></title>
		       <link href="estilos.css" rel="stylesheet" type="text/css" />


<link href="https://plus.google.com/116592790746366391971/" rel="publisher" />
</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) {return;}
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1&appId=121478641197975";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<table width="950" border="0" cellpadding="3" cellspacing="3">
<tr><td><a href="/"><img src="/images/como-se-va-logo.gif" width="365" height="34" border="0" /></a></td>
<td align="center"><span class="claim">La manera m&aacute;s <strong>sencilla</strong>
  de<br>
  <strong>compartir </strong>un punto en un mapa </span></td>
</tr>
<tr>
  <td colspan="2"></td>
  </tr>
</table>
<table width="950" border="0" cellpadding="2" cellspacing="2">

 
<tr>
  <td>&nbsp;</td>
</tr>
<tr><td height="40"><table width="600" align="center">
  <tr><td align="center" class="celdahome"> <?php
  
   
if( strstr($_SERVER['HTTP_USER_AGENT'],'Android') ||
 	strstr($_SERVER['HTTP_USER_AGENT'],'iPhone') ||
	strstr($_SERVER['HTTP_USER_AGENT'],'iPod')
	    ){
	    ?>
<a href="crea-punto-iphone.php" style="font-size:56px;">CREA UN PUNTO USANDO TU iPHONE o ANDROID</a>
		
		<?
	}   
   


/*  
$browser = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
if ($browser == true)  { ?>
<a href="crea-punto-iphone.php" style="font-size:56px;">CREA UN PUNTO USANDO TU IPHONE</a>
<? }
*/

?>

<p><a href="crea-una-direccion.php" class="linkhome">Crea un nuevo punto
    y comp&aacute;rtelo</a> <br>
    <font color="#999999">(ej. www.comoseva.com/aqui-es-la-fiesta-de-marta) <br>
   <!--  (<strong><font color="#FF0000">NUEVO!</font></strong> ahora puedes crear un punto privado)</font><br> -->
    <font color="#999999">(<strong><font color="#FF0000">NUEVO!</font></strong> clasifica el punto que has creado)</font>
  </p></td> </tr> <tr>
    <td align="center" class="celdahome"><p><a href="ruta.php" class="linkhome">Encuentra una ruta 
    entre dos puntos</a> <br>
    <font color="#999999">(Planea bien tu pr&oacute;ximo viaje) </font></p></td></tr></table></td></tr>

  <tr>
    <td align="center">&nbsp;</td>
  </tr>

<tr><td>

<p align="center">&Uacute;ltimos lugares creados: </p>
<p align="center">
<?php
//Consulta de las direcciones sin clasificar

$consultan="select * from coordenadas where usar = 'si' and en_lista = 'si' order by fechains desc limit 10";
$sql = mysql_query ($consultan);
if (!$sql) {
	echo("<P>Error retrieving table from database!<BR>"."Error: " . mysql_error());
}
while($row = mysql_fetch_array($sql))            
			    { //empieza while principal 
?>
<a href="/<?  echo $row[1];  ?>" <? if ($row[13]=='no') { ?> rel="nofollow" <? } ?> style="font-weight:bold">
<?

if ($row[12])
{ 
 echo $row[12]; 
 
} 
else
{
 $textosinguiones = str_replace("-"," ",$row[1]); 
 echo $textosinguiones; 
 
}
?></a><br>
<?

}
  ?>

</p>
<p align="center"><a href="ya-creadas.php">[ Ver todas ]</a></p>
<br><img src="/images/1pix.gif" heigth=30><br><p align="center">

<!-- Añade esta etiqueta en la cabecera o delante de la etiqueta body. -->
<script type="text/javascript" src="https://apis.google.com/js/plusone.js">
  {lang: 'es'}
</script>


<fb:like href="http://www.comoseva.com/" send="false" width="250" show_faces="true"></fb:like>
<br>
<!-- Añade esta etiqueta donde quieras colocar el botón +1 -->
<g:plusone size="medium"></g:plusone><br>
</td></tr>
<!-- <tr><td align="center">
<fb:like-box profile_id="39798077668" stream="false" header="false"></fb:like-box>
</td></tr> -->
  <tr><td align="center"><?
  include($_SERVER['DOCUMENT_ROOT'].'/includes/footer.php');
  ?></td>
  </tr>
  </table>

  <?


include($_SERVER['DOCUMENT_ROOT'].'/includes/tagga.php'); ?>
 
	
<!-- USERVOICE -->


<script type="text/javascript">
var uservoiceOptions = {
  /* required */
  key: 'comoseva',
  host: 'comoseva.uservoice.com', 
  forum: '90109',
  showTab: true,  
  /* optional */
  alignment: 'left',
  background_color:'#f00', 
  text_color: 'white',
  hover_color: '#06C',
  lang: 'es'
};

function _loadUserVoice() {
  var s = document.createElement('script');
  s.setAttribute('type', 'text/javascript');
  s.setAttribute('src', ("https:" == document.location.protocol ? "https://" : "http://") + "cdn.uservoice.com/javascripts/widgets/tab.js");
  document.getElementsByTagName('head')[0].appendChild(s);
}
_loadSuper = window.onload;
window.onload = (typeof window.onload != 'function') ? _loadUserVoice : function() { _loadSuper(); _loadUserVoice(); };
</script>

<!-- USERVOICE -->

	
</body>
</html>
