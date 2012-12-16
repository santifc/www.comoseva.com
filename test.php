<html><head><title>Javascript Rotation</title> 
<script language="javascript1.1"> 
var frames; 
images=new Array(3); 
links=new Array(3) 
images[0]=new Image(); 
images[0].src="/imagessir/logo.jpg"; 
images[1]=new Image(); 
images[1].src="/imagessir/maintitle.jpg"; 
images[2]=new Image(); 
images[2].src="/imagessir/rolling1.jpg"; 
links[0]=new String(); 
links[0].value="http://www.sitio1.dominio/"; 
links[1]=new String(); 
links[1].value="http://www.sitio2.dominio"; 
links[2]=new String(); 
links[2].value="http://www.sitio3.dominio"; 
frames=0; 
function animateImages() 
{ 
document.image_placeholder.src=images[frames].src; 
frames=(frames+1)%3; 
timeout_id=setTimeout("animateImages()",5000); 
} 
</script> 
</head> 
<body bgcolor="white" onLoad="animateImages();"> 
<img src="imagen1.gif" name="image_placeholder" border="0">
</body> 
</html>