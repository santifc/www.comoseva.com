<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>iPhone 3.0 geolocation demo</title>
<meta content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" name="viewport"/>
<script>
function handler(location) {
var message = document.getElementById("message");
message.innerHTML+="<p>Longitude: " + location.coords.longitude + "</p>";
message.innerHTML+="<p>Accuracy: " + location.coords.accuracy + "</p>";
message.innerHTML+="<p>Latitude: " + location.coords.latitude + "</p>";
}
navigator.geolocation.getCurrentPosition(handler);
</script>
</head>
<body>
<div id="message"></div>
</body>
</html>
