<?
include($_SERVER['DOCUMENT_ROOT'].'/includes/connection.php');
include($_SERVER['DOCUMENT_ROOT'].'/includes/opendb.php'); 

$texto=($_GET['texto']);
if ($texto==""){
header( 'Location: /index.php' ) ;

}
$consultan="SELECT * FROM coordenadas LEFT JOIN tipo_direccion ON tipo_direccion.id = coordenadas.tipo WHERE texto = '$texto' and usar = 'si' ";
$sql = mysql_query ($consultan);
if (!$sql) {
	echo("<P>Error retrieving table from database!<BR>"."Error: " . mysql_error());
}

$row = mysql_fetch_row($sql);

if (!$row[0]){
header( 'Location: /noexiste.php?txt='.$texto ) ;

}

$textosinguiones = str_replace("-"," ",$texto); 
//$str     = "Line 1\nLine 2\rLine 3\r\nLine 4\n";
$order   = array("\r\n", "\n", "\r");
$replace = '';
// Processes \r\n's first so they aren't converted twice.
$comentariossinsaltos = str_replace($order, $replace, $row[7]);
//$comentariossinsaltos = str_replace("\n", "", $row[7]);
$inicial = strtoupper($texto{0});

?><html xmlns="http://www.w3.org/1999/xhtml"
		xmlns:og="http://opengraphprotocol.org/schema/"
      	xmlns:fb="http://www.facebook.com/2008/fbml"> 

<head> 
<meta property="og:title" content="<? if ($row[12])
		 {
		echo $row[12]; 
		}
		else
		 {
		 echo $textosinguiones; 
		 } ?>"/>
    <meta property="og:type" content="landmark"/>
    <meta property="og:url" content="http://www.comoseva.com/<? echo utf8_encode($texto); ?>"/>
   <meta property="og:image" content="http://maps.google.com/maps/api/staticmap?markers=color:blue|label:<? echo $inicial; ?>|<?  echo $row[2]; ?>,<?  echo $row[3]; ?>&zoom=13&size=130x130&sensor=false"/>
   
   <meta property="og:site_name" content="COMOSEVA.com"/> 
   <meta property="fb:admins" content="670871961,665545775"/>
   <meta name="fb:app_id" content="121478641197975" /> 
   <meta property="og:latitude" content="<?  echo $row[2]; ?>"/>
    <meta property="og:longitude" content="<?  echo $row[3]; ?>"/>

    <meta property="og:description"
          content="Encuentra el camino a <? 

if($row[12]) {  
	echo $row[12];  
} else
{
	echo $textosinguiones;  
}
if($row[7]) {  
 echo ('. '.$comentariossinsaltos);
   }
?>. Como llegar en coche desde un punto inicial elegido. Con info GPS"/>


  <?php
  
include($_SERVER['DOCUMENT_ROOT'].'/includes/headcommon.php'); 

?>

        <title>Como se va a <? 
		
		if ($row[12])
		 {
		echo $row[12]; 
		}
		else
		 {
		 echo $textosinguiones; 
		 }
		
		if($row[22]) { ?> (<? echo $row[22]; ?>) <? } ?></title>
		
	<?	if($row[13]=="no") {  
	?>
	  <meta name="robots" content="noindex">
	<?
} ?>
   
   
<meta http-equiv="description" content="Encuentra el camino a <? 

if($row[12]) {  
	echo $row[12];  
} else
{
	echo $textosinguiones;  
}
if($row[7]) {  
 echo ('. '.$comentariossinsaltos);
   }
?>. Como llegar en coche desde un punto inicial elegido. Con info GPS" />
       <link href="/estilos.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript">
    
    
    		<!--
		function alerta(element, message)
		{
			alert(message);
			element.focus();
		}
		
		function formCompletado(form)
		{
			var pasado = false;
			if (form.comentario.value == "")
			{
				alerta(form.comentario, "Escribe tu comentario");
			}
		    else if (form.email.value == "")
			{
				alerta(form.email, "Escribe tu email, no aparecerá en el comentario");
			}
			else if (form.nombre.value == "")
			{
				alerta(form.nombre, "Escribe tu nombre o alias");
			}
			else
			{
			 	
					pasado = true; 
				
			}
		 return pasado;
		}
//-->
    
//funcion para capas
function showlayer(layer){
var mas = document.getElementById(layer).style.display;
if(mas=="none"){
document.getElementById(layer).style.display="block";

} else {
document.getElementById(layer).style.display="none";

}
}
//termina funcion capas

    var map;
    var gdir;
    var geocoder = null;
    var addressMarker;


 
var longext = <?  echo $row[2]; ?>	;
var latext = <?  echo $row[3]; ?>	;  
var geocoder = null; //reverse geocoding

 
    function initialize() {
      if (GBrowserIsCompatible()) {   
	  function createMarker(point,html) {
        var marker = new GMarker(point);
        <?  // if ($row[7]){ ?>
		GEvent.addListener(marker, "click", function() {
          marker.openInfoWindowHtml(html);
        });
		
        return marker;
      }

 		
		var point = new GLatLng(longext,latext);
    	var marker = createMarker(point,'<div><b><? 
		
		if ($row[12])
		 {
		echo $row[12]; 
		}
		else
		 {
		 echo $textosinguiones; 
		 }
		
		?></b> <? if($row[22]) { ?>  (<? echo $row[22]; ?>) <? } ?> <? if($row[7]) { ?> <br><? echo $comentariossinsaltos; ?> <? } ?> <\/div>')
		map = new GMap2(document.getElementById("map_canvas"));
		map.addControl(new GLargeMapControl());
	    map.addControl(new GMapTypeControl());
		map.addControl(new GOverviewMapControl());
		//map.enableScrollWheelZoom();
    	map.setCenter(new google.maps.LatLng(longext,latext), 15);
	 	map.addOverlay(marker);
		gdir = new GDirections(map, document.getElementById("directions"));
        //GEvent.addListener(gdir, "load", onGDirectionsLoad);
        GEvent.addListener(gdir, "error", handleErrors);
		
		/******************/
		/*REVERSE GEOCODING***/
		geocoder = new GClientGeocoder(); //reverse geocoding
		geocoder.getLocations(point, function(addresses) {

			if(addresses.Status.code == 200) {
    		var result = addresses.Placemark[0];
    		document.getElementById('direccionb').innerHTML = "Direcci&oacute;n din&aacute;mica: "+result.address+"<br>";
  			}
			
		});

		/********************/
		
		
		
      }
    }
    
    
    function setDirections(fromAddress, locale) {
		//pageTracker._trackEvent('ruta', 'apretar_boton_ruta', '<? echo $texto; ?>'); //Evento Google Analytics
      	if(fromAddress!=""){
		
		gdir.load("from: " + fromAddress + " to: " + longext + "," + latext,
                { "locale": locale });
				//ejecutado = 1;
		}
		else
		{
		alert("Por favor, introduce una direccion de origen");
		return false;
		}
		
    } 
    function handleErrors(){
		//var textoerror = gdir.getStatus().code;
	   //pageTracker._trackEvent('error-api', 'pagina-de-<? echo $texto; ?>', '<? echo $texto; ?>'); //Evento Google Analytics

	   if (gdir.getStatus().code == G_GEO_UNKNOWN_ADDRESS)
	     alert("No se ha encontrado una localizacin para la direccin introducida. Esto puede ser debido a que la direccion es nueva o incorrecta.\nError: " + gdir.getStatus().code);
	   else if (gdir.getStatus().code == G_GEO_SERVER_ERROR)
	     alert("La peticin no ha podido ser procesada. Fallo inesperado...\n Error: " + gdir.getStatus().code);
	   
	   else if (gdir.getStatus().code == G_GEO_MISSING_QUERY)
	     alert("El parametro HTTP q o no existe o no tiene valor. Se ha introducido una direccion vacia como entrada.\n Error: " + gdir.getStatus().code);
 
	     
	   else if (gdir.getStatus().code == G_GEO_BAD_KEY)
	     alert("Key erronea. \n Error: " + gdir.getStatus().code);
 
	   else if (gdir.getStatus().code == G_GEO_BAD_REQUEST)
	     alert("La peticion no ha podido ser parseada con exito.\n Error: " + gdir.getStatus().code);
	    
	   else alert("Error inesperado...");
       //ANALITICA:
		//alert(textoerror);
	   
	}
 function imprimete() {
 //pageTracker._trackEvent('eventos', 'impresion-en', '<? echo $texto; ?>'); //Evento Google Analytics
 print();
 
 }

var RecaptchaOptions = {
   lang : 'es',
};

    </script> 
 
 </head> 
  <body onLoad="initialize()" onUnload="GUnload()">
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#username=santifc"></script>
<div class="addthis_toolbox" id="adthis">
    <div class="vertical">
        <a class="addthis_button_email">Email</a>
        <a class="addthis_button_print">Imprimir</a>
		<a class="addthis_button_facebook">Facebook</a>
        <div class="more">
            <a href="#comments" onClick="javascript:showlayer('mas2')">(+) Añade comentario</a>
<!--	   
 <div id="mas" style="display:none;">
<form id="form" name="form" method="post" action="enviacomentarioGOOD.php" onSubmit="return formCompletado(this)">
     
	Comentario:<br /><textarea name="comentario" cols="13" rows="5"></textarea><br />
	nombre o alias: <br /><input name="nombre" type="text" size="13" /><br />
	email: (no saldrá) <br /><input name="email" type="text" size="13" /><br />
	
	 <input type="submit" name="Submit" value="Envía tu comentario" />
	 <br>Tus comentarios aparecerán debajo del mapa principal en esta página
<input name="sitioid" type="hidden" value="<? echo $row[0] ?>" />
<input name="sitioname" type="hidden" value="<? echo $texto ?>" />
 
</form>
</div>
-->
	    
        </div>
		
    </div>
	<br> &nbsp;<a href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal" data-via="santifc" data-related="santifc:Creador de Comoseva.com" data-lang="es">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
	<br>
		<!-- Añade esta etiqueta en la cabecera o delante de la etiqueta body. -->
<script type="text/javascript" src="https://apis.google.com/js/plusone.js">
  {lang: 'es'}
</script>

<!-- Añade esta etiqueta donde quieras colocar el botón +1 -->
 &nbsp;<g:plusone size="medium"></g:plusone><br>
	<img src="/images/1pix.gif" height="20"><br>
	<?
		if ($row[20] <> "no")
		{
		?>
		
		<!-- EMPIEZA ADWORDS -->
		<script type="text/javascript"><!--
google_ad_client = "ca-pub-3491560261482840";
/* paracomoseva */
google_ad_slot = "1367734655";
google_ad_width = 125;
google_ad_height = 125;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
<?
		}
		?>
<!-- afiliacion -->
<?
		if ($row[19])
		{
		
		echo $row[19]; 
		}
		?>

</div>
 		<!-- TERMINA ADWORDS -->
		
 <?php include($_SERVER['DOCUMENT_ROOT'].'/includes/toputil.php'); ?>
      <?php
$browser = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
if ($browser == true)  { ?>
  <a href="http://maps.google.com/maps?f=q&amp;q=<?  echo $row[2]; ?>,<?  echo $row[3]; ?>+(<?  echo $textosinguiones; ?>)&amp;ie=UTF8&amp;z=15"><img src="/images/maps-iphone.jpg" border="0" /></a>
<? }
?>
    <table class="directions" border="0" width="950"> 

 <tr>
   <td align="center"><h1>C&oacute;mo se va   a... <? 
		
		if ($row[12])
		 {
		echo $row[12]; 
		}
		else
		 {
		 echo $textosinguiones; 
		 }
		
		?> <? if($row[22]) { ?> (<? echo $row[22]; ?>) <? } ?></h1><?  if ($row[7]){ ?><br /> <span class="comentarios"><?  echo nl2br($row[7]); ?></span><? } ?>
		<br /><span class="direccionreverse"><span id="direccionb"></span></span></td>
 </tr> <tr><td align="center"><form action="#" onSubmit="setDirections(this.from.value, this.locale.value); return false" style="padding:0px; margin:0px;"><span style="font-size:21px;">Viajando desde: </span><input type="text" size="35" id="fromAddress" name="from" value="" style="font-size:21px;padding:0px;margin:0px;" /><input type="hidden" id="locale" name="locale" value="es" /> <input name="submit" type="submit" value="Encuentra el camino" style="font-size:21px;padding:0px;margin:0px;" /></form></td></tr>
    <tr> 
    <td valign="top"><div id="map_canvas" style="width: 950px; height: 360px"></div></td> 
    </tr>
 
   
	<tr><td><div id="directions" style="width: 950px"></div></td></tr>
	
    </table>
<?
/* SACAMOS LOS COMENTARIOS */
$consultaco="SELECT * FROM comentarios WHERE idcoordenada = '$row[0]' and mostrar <> 'no' ";
$sqlco = mysql_query ($consultaco);

if (!$sqlco) {
	echo("<P>Error retrieving table from database!<BR>"."Error: " . mysql_error());
}
$comentarios = mysql_num_rows($sqlco);

/* SACAMOS LOS COMENTARIOS */

if($comentarios > 0) {
?>
<!-- COMENTARIOS -->
<br />
<span class="comentariostitle">Comentarios:</span>
<br><img src="/images/1pix.gif" height=7><br>
<?
while($rowco = mysql_fetch_array($sqlco))   
{ 
?>
<span class="comentariostexto">- <font size="3"><b><? echo $rowco[1]; ?></b> (Por <? echo $rowco[6]; ?>, <?  echo date("d-m-Y",strtotime($rowco[3]));    ?>)</font></span><br />
<?
}
}
else
{
?>
Todavía no hay comentarios. <a href="javascript:void(0);" onClick="javascript:showlayer('mas2')">Publica tú el primero</a>
<?	
	
}

?><br>
<!-- TERMINA COMENTARIOS -->
  <div id="mas2" style="display:none;">
<form id="form" name="form" method="post" action="enviacomentarioGOOD.php" onSubmit="return formCompletado(this)">
     
	<a name="comments">Comentario:</a><br /><textarea name="comentario" cols="50" rows="5"></textarea><br />
	nombre o alias: <br /><input name="nombre" type="text" /><br />
	email: (no saldrá) <br /><input name="email" type="text" /><br />
	
	
	 <br>Tus comentarios aparecerán debajo del mapa principal en esta página
<input name="sitioid" type="hidden" value="<? echo $row[0] ?>" />
<input name="sitioname" type="hidden" value="<? echo $texto ?>" />
<?php
          require_once('recaptchalibcomments.php');
          $publickey = "6LcOb7oSAAAAAEYd_4Wbvg5ozZBAa5Mkqtnpksxb"; // you got this from the signup page
          echo recaptcha_get_html($publickey);
        ?>
         <input type="submit" name="Submit" value="Envía tu comentario" />
</form>
</div>
    
      
      <ul>
	   <li><a href="javascript:void(0);" onClick="javascript:showlayer('mas2')">Añade tu comentario</a></li>
	  <li><a href="javascript:void(0);" onClick="imprimete();">Imprimir</a></li>
 <li>URL: <a href="http://www.comoseva.com/<? echo $texto; ?>">comoseva.com/<? echo $texto; ?></a></li>
 <li>Latitud: <?  echo $row[2]; ?>, Longitud: <?  echo $row[3]; ?></li>
 <li><a href="http://maps.google.com/maps/api/staticmap?markers=color:blue|label:<? echo $inicial; ?>|<?  echo $row[2]; ?>,<?  echo $row[3]; ?>&amp;zoom=15&amp;size=640x400&amp;sensor=false" target="_blank">Descargar como imagen estática</a> (PNG, botón derecho y elegir guardar enlace)</li>
<li> <a href="http://maps.google.com/maps?f=q&amp;q=<?  echo $row[2]; ?>,<?  echo $row[3]; ?>+(<?  echo $textosinguiones; ?>)&amp;ie=UTF8&amp;z=15" target="_blank">Abrir en Google Maps</a></li>
<li><a href="http://maps.yahoo.com/#mvt=m&amp;lat=<? echo $row[2]; ?>&amp;lon=<? echo $row[3]; ?>&amp;zoom=17&amp;q1=<? echo $texto; ?>" target="_blank">Abrir en Yahoo Maps</a></li>
   <li><a href="mailto:dime@comoseva.com">Informar de dirección erronea</a></li>
 <li><a href="borrardireccion.php?id=<? echo $row[0]; ?>">Borrar dirección</a></li>
 <li>Bidi para esta dirección (imprímelo y úsalo en invitaciones, pegatinas, etc.):<br>
 <a href="http://chart.apis.google.com/chart?cht=qr&chs=400x400&chl=http%3A//www.comoseva.com/<? echo $texto; ?>&chld=H|0" target="_blank"><img src="http://chart.apis.google.com/chart?cht=qr&chs=200x200&chl=http%3A//www.comoseva.com/<? echo $texto; ?>&chld=H|0" height="200" width="200" border="0"></a></li>
 <?
		if($row[14]){
		?>
		
		<li>
		Fuente: <?  echo $row[14]; ?>		</li>
		<?
		}
		?>

  </ul>

  
 <?
/* 
//BOTON LIKE, LO QUITAMOS MAYO 2010, da problemas con algunos IE
if ($facebooks == 1) {
?>

<table width="950px">
  <tr>
  <td align="center"><!-- EMPIEZA FACEBOOK -->   
<!-- aquiocultoGOODsololikeit-conopengraph.php -->     
<fb:like href="http://www.comoseva.com/<? echo utf8_encode($texto); ?>" layout="standard" show_faces="true" width="400" action="recommend" colorscheme="light"></fb:like>        <!-- TERMINA FACEBOOK -->
</td>
  
  
  </tr>
  </table>
<?
}
*/
?>
<table width="950"><tr><td align="center">
<table width="200" border="0" cellpadding="5" cellspacing="5" style="border-style:solid; border-width:1px; border-color:#77BDFF; background-color:#FFFFCC;">
  <tr>
    <td align="center" ><font size="4"><a href="/crea-una-direccion.php">Crear un punto nuevo</a></font></td>
  </tr></table>
</td></tr></table>



<div align="center" style="width:950px; ">
<?php 
include($_SERVER['DOCUMENT_ROOT'].'/includes/footer.php');

include($_SERVER['DOCUMENT_ROOT'].'/includes/tagga.php'); ?>
</div>




<!-- USERVOICE -->


<script type="text/javascript">
var uservoiceOptions = {
  /* required */
  key: 'comoseva',
  host: 'comoseva.uservoice.com', 
  forum: '90109',
  showTab: true,  
  /* optional */
  alignment: 'right',
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