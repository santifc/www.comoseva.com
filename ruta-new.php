<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"  xmlns:v="urn:schemas-microsoft-com:vml"> 
  <head> 
  	<?php include($_SERVER['DOCUMENT_ROOT'].'/includes/headcommon.php'); ?>
	
      <link href="estilos.css" rel="stylesheet" type="text/css" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/> 
        <title>Crea una ruta entre dos puntos - <?php include($_SERVER['DOCUMENT_ROOT'].'/includes/title.php'); ?></title>
   
    <script type="text/javascript"> 
 
    var map;
    var gdir;
    var geocoder = null;
    var addressMarker;
 
    function initialize() {
      if (GBrowserIsCompatible()) {      
        map = new GMap2(document.getElementById("map_canvas"));
        map.addControl(new GLargeMapControl());
		map.addControl(new GOverviewMapControl());
        map.addControl(new GMapTypeControl());
		map.enableScrollWheelZoom();

        gdir = new GDirections(map, document.getElementById("directions"));
        GEvent.addListener(gdir, "load", onGDirectionsLoad);
        GEvent.addListener(gdir, "error", handleErrors);
 
        setDirections("Av Chile 2, Sevilla", "Castellana 100, madrid", "es_ES");
      }
    }
    
    function setDirections(fromAddress, toAddress, locale) {
      gdir.load("from: " + fromAddress + " to: " + toAddress,
                { "locale": locale });
    }
 
    function handleErrors(){
	   if (gdir.getStatus().code == G_GEO_UNKNOWN_ADDRESS)
	     alert("No se ha encontrado una localización para la dirección introducida. Esto puede ser debido a que la direccion es nueva o incorrecta.\nError code: " + gdir.getStatus().code);
	   else if (gdir.getStatus().code == G_GEO_SERVER_ERROR)
	     alert("La petición no ha podido ser procesada. Fallo inesperado...\n Error code: " + gdir.getStatus().code);
	   
	   else if (gdir.getStatus().code == G_GEO_MISSING_QUERY)
	     alert("El parametro HTTP q o no existe o no tiene valor. Se ha introducido una direccion vacia como entrada.\n Error code: " + gdir.getStatus().code);
 
	//   else if (gdir.getStatus().code == G_UNAVAILABLE_ADDRESS)  <--- Doc bug... this is either not defined, or Doc is wrong
	//     alert("The geocode for the given address or the route for the given directions query cannot be returned due to legal or contractual reasons.\n Error code: " + gdir.getStatus().code);
	     
	   else if (gdir.getStatus().code == G_GEO_BAD_KEY)
	     alert("Key erronea. \n Error code: " + gdir.getStatus().code);
 
	   else if (gdir.getStatus().code == G_GEO_BAD_REQUEST)
	     alert("La peticion no ha podido ser parseada con exito.\n Error code: " + gdir.getStatus().code);
	    
	   else alert("Error inesperado...");
	   
	}
 
	function onGDirectionsLoad(){ 
      // Use this function to access information about the latest load()
      // results.
 
      // e.g.
      // document.getElementById("getStatus").innerHTML = gdir.getStatus().code;
	  // and yada yada yada...
	}
    </script> 
 
  </head> 
  <body onload="initialize()" onunload="GUnload()"> 
  <?php 
  include($_SERVER['DOCUMENT_ROOT'].'/includes/toputil.php');
  include($_SERVER['DOCUMENT_ROOT'].'/includes/top.php'); ?>

  <h2>Crea una ruta entre dos puntos </h2> 
  <form action="#" onsubmit="setDirections(this.from.value, this.to.value, this.locale.value); return false" method="post"> 
 
  <table width="800"> 
 
   <tr>
     <th align="right">Desde:&nbsp;</th> 
 
     <td><input type="text" size="50" id="fromAddress" name="from" value="Av Chile 2, Sevilla"/></td> 
     <td>&nbsp;</td>
     <td><strong>A:</strong>&nbsp;</td>
     <td><input type="text" size="50" id="toAddress" name="to" value="Castellana 100, madrid" /></td>
     <th align="right">&nbsp;&nbsp;</th> 
   <td align="right"><input name="submit" type="submit" value="Crea la ruta!" /></td></tr> 
   </table> 
 
    <input type="hidden" id="locale" name="locale" value="es" />
  </form> 
 
 
    
	<div id="map_canvas" style="width: 950px; height: 350px"></div>
	<div id="directions" style="width: 950px"></div> 
	  <?
include($_SERVER['DOCUMENT_ROOT'].'/includes/footer.php');

include($_SERVER['DOCUMENT_ROOT'].'/includes/tagga.php'); ?>

  </body> 
</html> 