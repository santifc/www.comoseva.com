<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"  xmlns:v="urn:schemas-microsoft-com:vml"> 
  <head> 
  <?php
include ('/web/htdocs/www.comoseva.com/home/includes/headcommon.php'); 
include ('/web/htdocs/www.comoseva.com/home/includes/connection.php');
include ('/web/htdocs/www.comoseva.com/home/includes/opendb.php'); 

$texto=($_GET['texto']);
if ($texto==""){
header( 'Location: /index.php' ) ;

}
$consultan="select * from coordenadas where texto = '$texto' and usar = 'si'";
$sql = mysql_query ($consultan);
if (!$sql) {
	echo("<P>Error retrieving table from database!<BR>"."Error: " . mysql_error());
}

$row = mysql_fetch_row($sql);

if (!$row[0]){
header( 'Location: /index.php' ) ;

}
$textosinguiones = str_replace("-"," ",$texto); 

//$textosinguiones= removeSpaces($texto)
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
		
		?> <? if($row[11]) { ?> (<? echo $row[11]; ?>) <? } ?></title>
    <script src=" http://maps.google.com/?file=api&amp;v=2.x&amp;key=ABQIAAAAW6glqOfW7t0vZ22w6-vojxSCvwQ80fQiNOPY59cqy02nkCll5BT5xMuAkb1hRAOx0Bk4NeT5_izkGw&hl=es"
      type="text/javascript"></script> 
       <link href="estilos.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript"> 
 
    var map;
    var gdir;
    var geocoder = null;
    var addressMarker;
	var longext = <?  echo $row[2]; ?>	;
	var latext = <?  echo $row[3]; ?>	;  


 
    function initialize() {
      if (GBrowserIsCompatible()) {   
	  
  	var icon = new GIcon();
	icon.image = "/images/icogmaps.png";
	icon.shadow = "/images/icogmaps_sombra.png";
	icon.iconSize = new GSize(98, 63);
	icon.shadowSize = new GSize(130, 63);
	icon.iconAnchor = new GPoint(48, 58);
	icon.infoWindowAnchor = new GPoint(80, 7);

	  
	  // para los markers:
	  function createMarker(point,icon,html) {
        var marker = new GMarker(point);
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
		
		?></b> <? if($row[11]) { ?> <br>(<? echo $row[11]; ?>) <? } ?> <? if($row[7]) { ?> <br><? echo $row[7]; ?> <? } ?> <\/div>')
		
		
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
		
      }
    }
    
    function setDirections(fromAddress, locale) {
      gdir.load("from: " + fromAddress + " to: " + longext + "," + latext,
                { "locale": locale });
				//ejecutado = 1;
    }
 
    function handleErrors(){
	   if (gdir.getStatus().code == G_GEO_UNKNOWN_ADDRESS)
	     alert("No se ha encontrado una localización para la dirección introducida. Esto puede ser debido a que la direccion es nueva o incorrecta.\nError: " + gdir.getStatus().code);
	   else if (gdir.getStatus().code == G_GEO_SERVER_ERROR)
	     alert("La petición no ha podido ser procesada. Fallo inesperado...\n Error: " + gdir.getStatus().code);
	   
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
  <body onload="initialize()" onunload="GUnload()"><?php //include ('/web/htdocs/www.comoseva.com/home/includes/top.php'); ?>
    
    <table class="directions" border="0" width="950"> 
   
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
		
		?> <? if($row[11]) { ?> (<? echo $row[11]; ?>) <? } ?></span><?  if ($row[7]){ ?><br /> <span class="comentarios"><?  echo $row[7]; ?></span><? } ?></td>
 </tr>
    <tr> 
    <td valign="top"><div id="map_canvas" style="width: 950px; height: 360px"></div></td> 
    </tr><tr>
      <td>
	  <table width="100%">
	    <tr><td> <font color="#999999">Lat: <?  echo $row[2]; ?>, Long:<?  echo $row[3]; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font></td><td align="right">Comparte esta direcci&oacute;n en Facebook: <a href="http://www.facebook.com/share.php?u=http://www.comoseva.com/<? echo $texto; ?>"><img src="/images/ico_facebook.gif" alt="Comparte en Facebook" border="0" align="absbottom" /></a></td>
	    </tr>
	  </table>	  </td>
      </tr>
 <tr><td>&nbsp;</td></tr>
    <tr><td align="center"> <form action="#" onsubmit="setDirections(this.from.value, this.locale.value); return false"> 
 Viajando desde: 
       <input type="text" size="40" id="fromAddress" name="from" value=""/>
<input type="hidden" id="locale" name="locale" value="es" />
 <input name="submit" type="submit" value="Encuentra el camino" />
  </form> </td></tr>
	<tr><td><div id="directions" style="width: 650px"></div></td></tr>
	<tr><td align="center"><font color="#999999">(Para suprimir o modificar esta direcci&oacute;n escribe un email a dime@comoseva.com)</font><br><?php 
include ('/web/htdocs/www.comoseva.com/home/includes/footer.php');

include ('/web/htdocs/www.comoseva.com/home/includes/tagga.php'); ?>
</td></tr>
    </table>




      
</body> 
</html> 
