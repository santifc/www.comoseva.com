function load() {
      if (GBrowserIsCompatible()) {
        
		var icon = new GIcon();
		icon.image = "/images/icogmaps.png";
		icon.shadow = "/images/icogmaps_sombra.png";
		icon.iconSize = new GSize(98, 63);
		icon.shadowSize = new GSize(130, 63);
		icon.iconAnchor = new GPoint(48, 58);
		icon.infoWindowAnchor = new GPoint(80, 7);

		var map = new GMap2(document.getElementById("map"));
        map.addControl(new GLargeMapControl());
		map.addControl(new GOverviewMapControl());
        map.addControl(new GMapTypeControl());
		map.enableScrollWheelZoom();
        var center = new GLatLng(38.71980,-4.57031);
        map.setCenter(center, 5);
        geocoder = new GClientGeocoder();
        var marker = new GMarker(center, icon, {draggable: true});  
        map.addOverlay(marker);
		document.getElementById('latspan').innerHTML = center.lat().toFixed(5);
		document.getElementById('longspan').innerHTML = center.lng().toFixed(5);
		latitud = center.lat().toFixed(5);
		longitud = center.lng().toFixed(5);
//	alert(latitud); 
	  GEvent.addListener(marker, "dragend", function() {
       var point = marker.getPoint();
	      map.panTo(point);
		document.getElementById('latspan').innerHTML = point.lat().toFixed(5);
		document.getElementById('longspan').innerHTML = point.lng().toFixed(5);
		latitud = point.lat().toFixed(5);
		longitud = point.lng().toFixed(5);
//	alert('2');
	
	        });
 
 
	 GEvent.addListener(map, "moveend", function() {
		  map.clearOverlays();
    var center = map.getCenter();
		  var marker = new GMarker(center,  icon, {draggable: true});
		  map.addOverlay(marker);
		document.getElementById('latspan').innerHTML = center.lat().toFixed(5);
		document.getElementById('longspan').innerHTML = center.lng().toFixed(5);
		latitud = center.lat().toFixed(5);
		longitud = center.lng().toFixed(5);

//	alert('3');
	
	 GEvent.addListener(marker, "dragend", function() {
      var point =marker.getPoint();
	  
	    map.panTo(point);
		document.getElementById('latspan').innerHTML = point.lat().toFixed(5);
		document.getElementById('longspan').innerHTML = point.lng().toFixed(5);
		latitud = point.lat().toFixed(5);
		longitud = point.lng().toFixed(5);

//	alert('4');
	

        });
 
        });
 
      }
    }
 
	   function showAddress(address) {
	   var map = new GMap2(document.getElementById("map"));
       var icon = new GIcon();
		icon.image = "/images/icogmaps.png";
		icon.shadow = "/images/icogmaps_sombra.png";
		icon.iconSize = new GSize(98, 63);
		icon.shadowSize = new GSize(130, 63);
		icon.iconAnchor = new GPoint(48, 58);
		icon.infoWindowAnchor = new GPoint(80, 7);
        map.addControl(new GLargeMapControl());
		map.addControl(new GOverviewMapControl());
        map.addControl(new GMapTypeControl());
		map.enableScrollWheelZoom();

       if (geocoder) {
        geocoder.getLatLng(
          address,
          function(point) {
            if (!point) {
              alert(address + " not found");
            } else {
		document.getElementById('latspan').innerHTML = point.lat().toFixed(5);
		document.getElementById('longspan').innerHTML = point.lng().toFixed(5);
		latitud = point.lat().toFixed(5);
		longitud = point.lng().toFixed(5);
//	alert('5');
	


		map.clearOverlays()
		map.setCenter(point, 14);
		var marker = new GMarker(point,  icon, {draggable: true});  
		map.addOverlay(marker);
 
		GEvent.addListener(marker, "dragend", function() {
      var pt = marker.getPoint();
	     map.panTo(pt);
		document.getElementById('latspan').innerHTML = pt.lat().toFixed(5);
		document.getElementById('longspan').innerHTML = pt.lng().toFixed(5);
		latitud = pt.lat().toFixed(5);
		longitud = pt.lng().toFixed(5);

//	alert('6');
	


        });
 
 
	 GEvent.addListener(map, "moveend", function() {
		  map.clearOverlays();
    var center = map.getCenter();
		  var marker = new GMarker(center,  icon, {draggable: true});
		  map.addOverlay(marker);
		document.getElementById('latspan').innerHTML = center.lat().toFixed(5);
		document.getElementById('longspan').innerHTML = center.lng().toFixed(5);
		latitud = center.lat().toFixed(5);
		longitud = center.lng().toFixed(5);
//	alert('7');
	
	 GEvent.addListener(marker, "dragend", function() {
     var pt = marker.getPoint();
	    map.panTo(pt);
		document.getElementById('latspan').innerHTML = pt.lat().toFixed(5);
		document.getElementById('longspan').innerHTML = pt.lng().toFixed(5);
		latitud = pt.lat().toFixed(5);
		longitud = pt.lng().toFixed(5);
//	alert('8');
        });
 
        });
 
            }
          }
        );
      }
    }
	
function removeSpaces(string) {
 return string.split(' ').join('-');
}

function quitaguiones(string) {
 return string.split('-').join(' ');
}

   