<html>
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<title>COMOSEVA.com testing rutas dinamicas</title>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
  var directionDisplay;
  var directionsService = new google.maps.DirectionsService();
  var map;

  function initialize() {
    directionsDisplay = new google.maps.DirectionsRenderer();
    //var chicago = new google.maps.LatLng(41.850033, -87.6500523);
    var myOptions = {
      zoom:7,
      mapTypeId: google.maps.MapTypeId.ROADMAP
      //center: chicago
    }
    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
    directionsDisplay.setMap(map);
	calcRoute();
  }
  
  function calcRoute() {
   //alert("ejecutando calcRoute");
    var start = "37.37703,-5.98639";
    var end = "41.40974,2.21195";
    var request = {
        origin:start, 
        destination:end,
        travelMode: google.maps.DirectionsTravelMode.DRIVING,
		unitSystem: google.maps.DirectionsUnitSystem.METRIC
    };
    directionsService.route(request, function(response, status) {
      if (status == google.maps.DirectionsStatus.OK) {
	  //alert("OK "+status);
        directionsDisplay.setDirections(response);
      } else {
	  alert("UPS! hay un error: "+status);
	  
	  }
    });
  }
</script>
</head>
<body style="margin:0px; padding:0px;" onLoad="initialize()">

<div id="map_canvas" style="width:100%; height:100%"></div>
</body>
</html>
