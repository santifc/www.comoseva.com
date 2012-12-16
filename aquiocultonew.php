<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"  xmlns:v="urn:schemas-microsoft-com:vml"> 
  <head> 
  <script type="text/javascript">
var addthis_config = {
          services_compact: 'email, facebook, meneame, print, digg, more'
          //services_exclude: 'print'
}
</script>


  <?php
include($_SERVER['DOCUMENT_ROOT'].'/includes/headcommon.php'); 
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
header( 'Location: /index.php' ) ;

}
$textosinguiones = str_replace("-"," ",$texto); 
//$str     = "Line 1\nLine 2\rLine 3\r\nLine 4\n";
$order   = array("\r\n", "\n", "\r");
$replace = '';
// Processes \r\n's first so they aren't converted twice.
$textosinespacios = str_replace($order, $replace, $row[7]);
//$textosinespacios = str_replace("\n", "", $row[7]);

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
		
		if($row[20]) { ?> (<? echo $row[20]; ?>) <? } ?></title>
		
		
<meta http-equiv="description" content="Encuentra el camino a <? if($row[12]) {  echo $row[12];  } 
 if($row[7]) {  
 echo ('. '.$textosinespacios);
   } ?>. Con informacion GPS, latitud y longitud" />
       <link href="/estilos.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript"> 
 
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
		
		?></b> <? if($row[19]) { ?> <br>(<? echo $row[19]; ?>) <? } ?> <? if($row[7]) { ?> <br><? echo $textosinespacios; ?> <? } ?> <\/div>')
		map = new GMap2(document.getElementById("map_canvas"));
		map.addControl(new GLargeMapControl());
	    map.addControl(new GMapTypeControl());
		map.addControl(new GOverviewMapControl());
		map.enableScrollWheelZoom();
    	map.setCenter(new google.maps.LatLng(longext,latext), 15);
	 	map.addOverlay(marker);
		gdir = new GDirections(map, document.getElementById("directions"));
        //GEvent.addListener(gdir, "load", onGDirectionsLoad);
        GEvent.addListener(gdir, "error", handleErrors);
		
		/******************/
		/*REVERSE GEOCODING***/
		geocoder = new GClientGeocoder(); //reverse geocoding
		geocoder.getLocations(point, function(addresses) {
  			/*
			if(addresses.Status.code != 200) {
    			//alert("reverse geocoder failed to find an address for " + latlng.toUrlValue());
				document.getElementById('direccionb').innerHTML = "(No se ha podido crear una direcci&oacute;n din&aacute;micamente)";
  			} else { 
    		var result = addresses.Placemark[0];
    		document.getElementById('direccionb').innerHTML = "Direcci&oacute;n din&aacute;mica: "+result.address;
  			}
			*/
			if(addresses.Status.code == 200) {
    		var result = addresses.Placemark[0];
    		document.getElementById('direccionb').innerHTML = "Direcci&oacute;n din&aacute;mica: "+result.address;
  			}
			
		});

		/********************/
		
		
		
      }
    }
    
    function setDirections(fromAddress, locale) {
		pageTracker._trackEvent('ruta', 'apretar_boton_ruta', '<? echo $textosinguiones; ?>');
      	gdir.load("from: " + fromAddress + " to: " + longext + "," + latext,
                { "locale": locale });
				//ejecutado = 1;
    }
 
    function handleErrors(){
	   if (gdir.getStatus().code == G_GEO_UNKNOWN_ADDRESS)
	     alert("No se ha encontrado una localizacin para la direccin introducida. Esto puede ser debido a que la direccion es nueva o incorrecta.\nError: " + gdir.getStatus().code);
	   else if (gdir.getStatus().code == G_GEO_SERVER_ERROR)
	     alert("La peticin no ha podido ser procesada. Fallo inesperado...\n Error: " + gdir.getStatus().code);
	   
	   else if (gdir.getStatus().code == G_GEO_MISSING_QUERY)
	     alert("El parametro HTTP q o no existe o no tiene valor. Se ha introducido una direccion vacia como entrada.\n Error: " + gdir.getStatus().code);
 
	//   else if (gdir.getStatus().code == G_UNAVAILABLE_ADDRESS)  <--- Doc bug... this is either not defined, or Doc is wrong
	//     alert("The geocode for the given address or the route for the given directions query cannot be returned due to legal or contractual reasons.\n Error code: " + gdir.getStatus().code);
	     
	   else if (gdir.getStatus().code == G_GEO_BAD_KEY)
	     alert("Key erronea. \n Error: " + gdir.getStatus().code);
 
	   else if (gdir.getStatus().code == G_GEO_BAD_REQUEST)
	     alert("La peticion no ha podido ser parseada con exito.\n Error: " + gdir.getStatus().code);
	    
	   else alert("Error inesperado...");
	   
	}
 
	/*
	function onGDirectionsLoad(){ 
      // Use this function to access information about the latest load()
      // results.
 
      // e.g.
      // document.getElementById("getStatus").innerHTML = gdir.getStatus().code;
	  // and yada yada yada...
	}
	*/

    </script> 
 
 </head> 
  <body onload="initialize()" onunload="GUnload()"><?php //include($_SERVER['DOCUMENT_ROOT'].'/includes/top.php'); ?>

 
 <?php include($_SERVER['DOCUMENT_ROOT'].'/includes/toputil.php'); ?>
   
    <table class="directions" border="0" width="950"> 
   <?php
$browser = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
if ($browser == true)  { ?>
<tr><td align="center" bgcolor="#FFFFCC">
<font face="Arial, Helvetica, sans-serif" size="6">Usas un iPhone</font>: 

 <a href="http://maps.google.es/maps?hl=es&ie=UTF8&t=h&ll=<?  echo $row[2]; ?>,<?  echo $row[3]; ?>&spn=0.008807,0.022724&z=16" class="linkiphone">Abrir con MAPS</a>
<!-- <a href="http://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q=&ll=<?  echo $row[2]; ?>,<?  echo $row[3]; ?>&ie=UTF8&z=11&iwloc=A" class="linkiphone">Abrir con MAPS</a> -->
</td>
</tr><? }
?>
 <tr>
   <td align="center"><span class="textomainsub">C&oacute;mo se va   a... </span><span class="textomain"><? 
		
		if ($row[12])
		 {
		echo $row[12]; 
		}
		else
		 {
		 echo $textosinguiones; 
		 }
		
		?> <? if($row[20]) { ?> (<? echo $row[20]; ?>) <? } ?></span><?  if ($row[7]){ ?><br /> <span class="comentarios"><?  echo nl2br($row[7]); ?></span><? } ?>
		<br /><span class="direccionreverse"><span id="direccionb"></span> (Latitud: <?  echo $row[2]; ?>, Longitud: <?  echo $row[3]; ?>)</span></td>
 </tr>
    <tr> 
    <td valign="top"><div id="map_canvas" style="width: 950px; height: 360px"></div></td> 
    </tr><tr>
      <td>
	  <table width="100%">
	    <tr>
	      <td><a href="http://www.comoseva.com/<? echo $texto; ?>" class="linksmallurl">www.comoseva.com/<? echo $texto; ?></a></td>
	      <td align="right">
<!-- AddThis Button BEGIN -->
<a class="addthis_button" href="http://www.addthis.com/bookmark.php?v=250&amp;pub=santifc"><img src="http://s7.addthis.com/static/btn/v2/lg-share-es.gif" width="125" height="16" alt="Bookmark and Share" style="border:0"/></a><script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js?pub=santifc"></script>
<!-- AddThis Button END --></td>
	    </tr>
		<?
		if($row[14]){
		?>
		
		<tr>
		<td colspan="2"><font color="#999999">Fuente: <?  echo $row[14]; ?></font></td>
		</tr>
		<?
		}
		?>
	  </table>	  </td>
      </tr>
 <tr><td>&nbsp;</td></tr>
    <tr><td align="center"> <form action="#" onsubmit="setDirections(this.from.value, this.locale.value); return false"> 
 <span style="font-size:21px;">Viajando desde:</span> 
       <input type="text" size="40" id="fromAddress" name="from" value="" style="font-size:21px;" />
<input type="hidden" id="locale" name="locale" value="es" />
 <input name="submit" type="submit" value="Encuentra el camino" style="font-size:21px;" />
  </form> </td></tr>
	<tr><td><div id="directions" style="width: 950px"></div></td></tr>
	<tr>
	  <td align="center"><font color="#999999">(Si has creado esta direcci&oacute;n, puedes <a href="borrardireccion.php?id=<? echo $row[0]; ?>">borrarla</a>)</font><br><p>
	<!-- Include the Google Friend Connect javascript library. -->
<script type="text/javascript" src="http://www.google.com/friendconnect/script/friendconnect.js"></script>
<!-- Define the div tag where the gadget will be inserted. -->
<div id="div-8542902933254757922" style="width:950px;border:1px solid #999999;"></div>
<!-- Render the gadget into a div. -->
<script type="text/javascript">
var skin = {};
skin['BORDER_COLOR'] = '#999999';
skin['ENDCAP_BG_COLOR'] = '#cccccc';
skin['ENDCAP_TEXT_COLOR'] = '#333333';
skin['ENDCAP_LINK_COLOR'] = '#0000cc';
skin['ALTERNATE_BG_COLOR'] = '#ffffff';
skin['CONTENT_BG_COLOR'] = '#ffffff';
skin['CONTENT_LINK_COLOR'] = '#0000cc';
skin['CONTENT_TEXT_COLOR'] = '#333333';
skin['CONTENT_SECONDARY_LINK_COLOR'] = '#7777cc';
skin['CONTENT_SECONDARY_TEXT_COLOR'] = '#666666';
skin['CONTENT_HEADLINE_COLOR'] = '#333333';
skin['DEFAULT_COMMENT_TEXT'] = 'a\xf1ade tu comentario aqu\xed';
skin['HEADER_TEXT'] = 'Comentarios sobre <? echo $row[12];  ?> ';
skin['POSTS_PER_PAGE'] = '10';
google.friendconnect.container.setParentUrl('/' /* location of rpc_relay.html and canvas.html */);
google.friendconnect.container.renderWallGadget(
 { id: 'div-8542902933254757922',
   site: '13932289542655528439',
   'view-params':{"disableMinMax":"true","scope":"PAGE","allowAnonymousPost":"true","startMaximized":"true"}
 },
  skin);
</script>


	    <?php 
include($_SERVER['DOCUMENT_ROOT'].'/includes/footer.php');

include($_SERVER['DOCUMENT_ROOT'].'/includes/tagga.php'); ?>
</td></tr>
    </table>




      
</body> 
</html> 
