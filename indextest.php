<?php include ('/wwwmatinsa/includes/connection.php');
include ('/wwwmatinsa/includes/opendb.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
	<meta http-equiv="description" content="Comparte fácilmente la ruta hacia el destino que tú elijas" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php include ('/web/htdocs/www.comoseva.com/home/includes/title.php'); ?></title>
		       <link href="estilos.css" rel="stylesheet" type="text/css" />


      <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAAW6glqOfW7t0vZ22w6-vojxSCvwQ80fQiNOPY59cqy02nkCll5BT5xMuAkb1hRAOx0Bk4NeT5_izkGw&hl=es"
      type="text/javascript"></script> 
    <script type="text/javascript"> 
 function load() {
      if (GBrowserIsCompatible()) {
        var map = new GMap2(document.getElementById("map"));
        map.addControl(new GLargeMapControl());
		map.addControl(new GOverviewMapControl());
        map.addControl(new GMapTypeControl());
		map.enableScrollWheelZoom();
        var center = new GLatLng(38.71980,-4.57031);
        map.setCenter(center, 5);
        geocoder = new GClientGeocoder();
        var marker = new GMarker(center, {draggable: true});  
        map.addOverlay(marker);
		document.getElementById('latspan').innerHTML = center.lat().toFixed(5);
		document.getElementById('longspan').innerHTML = center.lng().toFixed(5);

 
	  GEvent.addListener(marker, "dragend", function() {
       var point = marker.getPoint();
	      map.panTo(point);
		document.getElementById('latspan').innerHTML = point.lat().toFixed(5);
		document.getElementById('longspan').innerHTML = point.lng().toFixed(5);

        });
 
 
	 GEvent.addListener(map, "moveend", function() {
		  map.clearOverlays();
    var center = map.getCenter();
		  var marker = new GMarker(center, {draggable: true});
		  map.addOverlay(marker);
		document.getElementById('latspan').innerHTML = center.lat().toFixed(5);
		document.getElementById('longspan').innerHTML = center.lng().toFixed(5);
 
	 GEvent.addListener(marker, "dragend", function() {
      var point =marker.getPoint();
	    map.panTo(point);
		document.getElementById('latspan').innerHTML = point.lat().toFixed(5);
		document.getElementById('longspan').innerHTML = point.lng().toFixed(5);
        });
 
        });
 
      }
    }
 
	   function showAddress(address) {
	   var map = new GMap2(document.getElementById("map"));
       map.addControl(new GSmallMapControl());
       map.addControl(new GMapTypeControl());
       if (geocoder) {
        geocoder.getLatLng(
          address,
          function(point) {
            if (!point) {
              alert(address + " not found");
            } else {
		document.getElementById('latspan').innerHTML = point.lat().toFixed(5);
		document.getElementById('longspan').innerHTML = point.lng().toFixed(5);

		 map.clearOverlays()
			map.setCenter(point, 14);
   var marker = new GMarker(point, {draggable: true});  
		 map.addOverlay(marker);
 
		GEvent.addListener(marker, "dragend", function() {
      var pt = marker.getPoint();
	     map.panTo(pt);
		document.getElementById('latspan').innerHTML = pt.lat().toFixed(5);
		document.getElementById('longspan').innerHTML = pt.lng().toFixed(5);

        });
 
 
	 GEvent.addListener(map, "moveend", function() {
		  map.clearOverlays();
    var center = map.getCenter();
		  var marker = new GMarker(center, {draggable: true});
		  map.addOverlay(marker);
		document.getElementById('latspan').innerHTML = center.lat().toFixed(5);
		document.getElementById('longspan').innerHTML = center.lng().toFixed(5);

 
	 GEvent.addListener(marker, "dragend", function() {
     var pt = marker.getPoint();
	    map.panTo(pt);
		document.getElementById('latspan').innerHTML = pt.lat().toFixed(5);
		document.getElementById('longspan').innerHTML = pt.lng().toFixed(5);

        });
 
        });
 
            }
          }
        );
      }
    }
	
	
	
	
	
    </script> 
    </head>
<body onload="load()" onunload="GUnload()" ><a href="/"><img src="/images/como-se-va-logo.gif" width="375" height="34" border="0" /></a><br />

    <form action="#" onsubmit="showAddress(this.address.value); return false"> 
        
      <img src="/images/1.gif" width="30" height="32" />Escribe aquí la dirección: 
      <input type="text" size="60" name="address" value="Paseo de la castellana 45, madrid" onFocus="this.value='';" /> 
      <input type="submit" value="Buscar" />
    </form> 
 
 
  <p> 
  <div align="center" id="map" style="width: 970px; height: 390px"><br/></div> 
   </p> 
  </div> 
  <P>
<img src="/images/2.gif" width="30" height="32" />Envía esta URL:<br />
<font color="#333333" size="5">www.comoseva.com/aqui.php?lat=<span id="longspan"></span>&amp;long=<span id="latspan"></span></font>


       
<br />
<P align="center"><br /><br /><a href="http://www.facebook.com/share.php?u=http://www.comoseva.com"><img src="/images/ico_facebook.gif" border="0" /></a> <a href="http://meneame.net/submit.php?url=http://www.comoseva.com"><img src="/images/ico_meneame.gif" border="0" /></a>
<br />
<font color="#999999"><a href="mailto:dime@comoseva.com">SFdCM</a><br />Esta web usa tecnología de <a href="http://maps.google.es">Google Maps</a></font></p>
<?php include ('/web/htdocs/www.comoseva.com/home/includes/tagga.php'); ?>
</body>
</html>
