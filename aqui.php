<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"  xmlns:v="urn:schemas-microsoft-com:vml"> 
  <head> <?
	include($_SERVER['DOCUMENT_ROOT'].'/includes/headcommon.php');
?>
    
        <title>Direcci&oacute;n sencilla - <?php include($_SERVER['DOCUMENT_ROOT'].'/includes/title.php'); ?></title>
  
       <link href="estilos.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript"> 
 
    var map;
    var gdir;
    var geocoder = null;
    var addressMarker;


 // Para capturar los parametros:	
	function gup( name )
{
  name = name.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
  var regexS = "[\\?&]"+name+"=([^&#]*)";
  var regex = new RegExp( regexS );
  var results = regex.exec( window.location.href );
  if( results == null )
    return "";
  else
    return results[1];
}
var longext = gup( 'long' );
var latext = gup( 'lat' );
	
 
    function initialize() {
      if (GBrowserIsCompatible()) {   
	  
	  
	  // para los markers:
	  
	  function createMarker(point,html) {
        var marker = new GMarker(point);
        GEvent.addListener(marker, "click", function() {
          marker.openInfoWindowHtml(html);
        });
        return marker;
      }
 
//  	var point = new GLatLng(40.5120743,-3.6754971);
	var point = new GLatLng(longext,latext);
    var marker = createMarker(point,'<div style="width:260px;height:120px"><img src=santi_casita1.jpg align=left hspace=3>María Tubau 15<br>Bloque B<br>Piso 1º, puerta 3<br>Tel. 607455266<br><a href=mailto:santiagofcm@yahoo.es>santiagofcm@yahoo.es</a><br><br><b>Atención: es entrada peatonal</b><\/div>')
     

	  
	     
		
		map = new GMap2(document.getElementById("map_canvas"));
		map.addControl(new GLargeMapControl());
	    map.addControl(new GMapTypeControl());
		map.addControl(new GOverviewMapControl());
		map.enableScrollWheelZoom();
    	map.setCenter(new google.maps.LatLng(longext,latext), 15);
	 	map.addOverlay(marker);

		gdir = new GDirections(map, document.getElementById("directions"));
        GEvent.addListener(gdir, "load", onGDirectionsLoad);
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
 
	     
	   else if (gdir.getStatus().code == G_GEO_BAD_KEY)
	     alert("Key erronea. \n Error: " + gdir.getStatus().code);
 
	   else if (gdir.getStatus().code == G_GEO_BAD_REQUEST)
	     alert("La peticion no ha podido ser parseada con exito.\n Error: " + gdir.getStatus().code);
	    
	   else alert("Error inesperado...");
	   
	}
 
	function onGDirectionsLoad(){ 
	}
	



    </script> 
   	<?php include($_SERVER['DOCUMENT_ROOT'].'/includes/headcommon.php'); ?>
  </head> 
  <body onload="initialize()" onunload="GUnload()"><?php 
   include($_SERVER['DOCUMENT_ROOT'].'/includes/toputil.php');
  include($_SERVER['DOCUMENT_ROOT'].'/includes/top.php');
   ?>

 
  
  <form action="#" onsubmit="setDirections(this.from.value, this.locale.value); return false"> 
 Escribe aqu&iacute; una direcci&oacute;n de origen para calcular una ruta hasta el punto que aparece en el mapa:<br /><input type="text" size="60" id="fromAddress" name="from" value=""/>
<input type="hidden" id="locale" name="locale" value="es" />
 <input name="submit" type="submit" value="Crea la ruta" />
  </form> 
 
    
    <table class="directions" border="0"> 
   
 
    <tr> 
    <td valign="top"><div id="map_canvas" style="width: 950px; height: 360px"></div></td> 
    
 
    </tr> 
	<tr><td><div id="directions" style="width: 950px"></div></td></tr>
    </table>



<table width="950px"><tr><td align="center">
	<?
	include($_SERVER['DOCUMENT_ROOT'].'/includes/footer.php');
	
include($_SERVER['DOCUMENT_ROOT'].'/includes/tagga.php'); ?>

</td></tr></table>
</body> 
</html> 
