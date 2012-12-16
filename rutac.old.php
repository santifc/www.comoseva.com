<html>
<head>
	<?php 
	include($_SERVER['DOCUMENT_ROOT'].'/includes/headcommon.php'); 
include($_SERVER['DOCUMENT_ROOT'].'/includes/connection.php');
include($_SERVER['DOCUMENT_ROOT'].'/includes/opendb.php'); 

	 ?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> -->

<LINK REL="SHORTCUT ICON" HREF="/favicon.ico"> 
<link rel="apple-touch-icon" href="/images/apple-touch-icon.png" />
<meta name="viewport" content="initial-scale=1.0, user-scalable=no"/>
<meta http-equiv="description" content="Pon la direccion de origen y destino y automaticamente veras el camino a seguir, la distancia y el tiempo que se tarda" />
<link href="estilos.css" rel="stylesheet" type="text/css" />
<title>Crea una ruta entre dos puntos - <?php include($_SERVER['DOCUMENT_ROOT'].'/includes/title.php'); ?></title>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&language=es"></script>
<script type="text/javascript">
  var directionDisplay;
  var directionsService = new google.maps.DirectionsService();
  var map;

  function initialize() {
    directionsDisplay = new google.maps.DirectionsRenderer();
    //var madrid = new google.maps.LatLng(40.850033, -3.6500523);
    var myOptions = {
      zoom:7,
      mapTypeId: google.maps.MapTypeId.ROADMAP
      //center: madrid
    }
	
    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
    directionsDisplay.setMap(map);
    directionsDisplay.setPanel(document.getElementById("directionsPanel"));
	calcRoute();
  }
  
  function calcRoute() {
    var start = document.getElementById("start").value;
    var end = document.getElementById("end").value;
	pageTracker._trackEvent('ruta', 'apretar_boton_ruta_pagina_especifica', 'de:'+start+' a:'+end); //Evento Google Analytics
    var request = {
        origin:start, 
        destination:end,
        travelMode: google.maps.DirectionsTravelMode.DRIVING
    };
    directionsService.route(request, function(response, status) {
      if (status == google.maps.DirectionsStatus.OK) {
        directionsDisplay.setDirections(response);
      }
    });
 
		geocoder = new google.maps.Geocoder();
		
		
        geocoder.geocode( { 'address': start}, function(results, status) {
        if (status =! google.maps.GeocoderStatus.OK) {
		
          alert("Geocode was not successful for the following reason: " + status);
        } else {
        	document.getElementById('uno').innerHTML = results[0].geometry.location;
			unocod = results[0].geometry.location;
			return unocod;
			//var mySplitResult = unocod.split(',');
			//alert("lat: " + mySplitResult[0]); 
			//alert("long: " + mySplitResult[1]); 
        	}
      	}
		return unocod;);
		
		geocoder.geocode( { 'address': end}, function(results, status) {
        if (status =! google.maps.GeocoderStatus.OK) {
		
          alert("Geocode was not successful for the following reason: " + status);
        } else {
        	document.getElementById('dos').innerHTML = results[0].geometry.location;
        	//var doscod = results[0].geometry.location;
			}
      	});
		return unocod;
		 //alert(unocod);
		 		// (47.232323, -3.21212)

  }
alert(unocod);
 


  
</script>
</head>
<body onLoad="initialize();">
  <?php 
  include($_SERVER['DOCUMENT_ROOT'].'/includes/toputil.php');
  include($_SERVER['DOCUMENT_ROOT'].'/includes/top.php'); ?>

  <h1>Crea una ruta entre dos puntos</h1> <h2>(y luego <a href="javascript:void(0)" onClick="javascript:print()">impr&iacute;mela</a>)</h2> 


  <strong>DE:</strong> 
<input type="text" size="50" id="start" name="from" value="Plaza de Espa&ntilde;a, Sevilla"/>
<strong>A:</strong> 
<input type="text" size="50" id="end" name="to" value="Avinguda Diagonal 54, Barcelona"/>
<input name="submit" type="submit" value="Crea la ruta!" onClick="calcRoute();"/><br><p>
<div id="map_canvas" style="width:950px; height:400px"></div><br>
<div id="directionsPanel" style="width:950px; font-size:11px;"></div>
Origen: <span id="uno"></span><br>Destino: <span id="dos"></span>
<table width="950px"><tr><td align="center">
	<?
	include($_SERVER['DOCUMENT_ROOT'].'/includes/footer.php');
	
include($_SERVER['DOCUMENT_ROOT'].'/includes/tagga.php'); ?>

</td></tr></table>
</body>
</html>
