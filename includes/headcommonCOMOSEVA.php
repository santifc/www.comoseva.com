<script language="javascript1.1"> 
var frames; 
images=new Array(3); 
images[0]=new Image(); 
images[0].src="/imagessir/rolling1.jpg"; 
images[1]=new Image(); 
images[1].src="/imagessir/rolling2.jpg"; 
images[2]=new Image(); 
images[2].src="/imagessir/rolling3.jpg"; 
images[3]=new Image(); 
images[3].src="/imagessir/rolling4.jpg"; 

frames=0; 
function animateImages() 
{ 
document.image_placeholder.src=images[frames].src; 
frames=(frames+1)%3; 
timeout_id=setTimeout("animateImages()",5000); 
} 

//rollovers franquicias
/*
imagenOn1 = new Image(80,78);
imagenOn1.src = "/imagessir/fran_mari.jpg";
imagenOn2 = new Image(80,78);
imagenOn2.src = "/imagessir/fran_madr.jpg";
imagenOn3 = new Image(80,78);
imagenOn3.src = "/imagessir/fran_corsa.jpg";
imagenOn4 = new Image(80,78);
imagenOn4.src = "/imagessir/fran_sevi.jpg";
imagenOn5 = new Image(80,78);
imagenOn5.src = "/imagessir/fran_almo.jpg";
imagenOn6 = new Image(80,78);
imagenOn6.src = "/imagessir/fran_cava.jpg";
*/

imagenOn1 = new Image(110,107);
imagenOn1.src = "/imagessir/franmarin.jpg";
imagenOn2 = new Image(110,107);
imagenOn2.src = "/imagessir/frangatos.jpg";
imagenOn3 = new Image(110,107);
imagenOn3.src = "/imagessir/frankorsa.jpg";
imagenOn4 = new Image(110,107);
imagenOn4.src = "/imagessir/fransevilla.jpg";
imagenOn5 = new Image(110,107);
imagenOn5.src = "/imagessir/franalmo.jpg";
imagenOn6 = new Image(110,107);
imagenOn6.src = "/imagessir/franvacce.jpg";



imagenOn7 = new Image(124,114);
imagenOn7.src = "/imagessir/tienda-onlineb.jpg";


</script> 

<link href="/styles-sir.css" rel="stylesheet" type="text/css" />
