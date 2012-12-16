<?
include($_SERVER['DOCUMENT_ROOT'].'/includes/connection.php');
include($_SERVER['DOCUMENT_ROOT'].'/includes/opendb.php'); 

$texto=($_GET['texto']);
if ($texto==""){
header( 'Location: /index.php' ) ;

}
$consultan="SELECT * FROM coordenadas LEFT JOIN tipo_direccion ON tipo_direccion.id = coordenadas.tipo WHERE texto = '$texto' and usar = 'si' ";
$sql = mysql_query ($consultan);
if (!$sql) {
	echo("<P>Error retrieving table from database!<BR>"."Error: " . mysql_error());
}

$row = mysql_fetch_row($sql);

if (!$row[0]){
header( 'Location: /noexiste.php?txt='.$texto ) ;

}
$textosinguiones = str_replace("-"," ",$texto); 
//$str     = "Line 1\nLine 2\rLine 3\r\nLine 4\n";
$order   = array("\r\n", "\n", "\r");
$replace = '';
// Processes \r\n's first so they aren't converted twice.
$comentariossinsaltos = str_replace($order, $replace, $row[7]);
//$comentariossinsaltos = str_replace("\n", "", $row[7]);
$inicial = strtoupper($texto{0});

?><html xmlns="http://www.w3.org/1999/xhtml"
		xmlns:og="http://opengraphprotocol.org/schema/"
      	xmlns:fb="http://www.facebook.com/2008/fbml"> 

<head> 
<meta property="og:title" content="<? if ($row[12])
		 {
		echo $row[12]; 
		}
		else
		 {
		 echo $textosinguiones; 
		 } ?>"/>
    <meta property="og:type" content="landmark"/>
    <meta property="og:url" content="http://www.comoseva.com/<? echo utf8_encode($texto); ?>"/>
   <meta property="og:image" content="http://maps.google.com/maps/api/staticmap?markers=color:blue|label:<? echo $inicial; ?>|<?  echo $row[2]; ?>,<?  echo $row[3]; ?>&zoom=13&size=130x130&sensor=false"/>
   
   <meta property="og:site_name" content="COMOSEVA.com"/> 
   <meta property="fb:admins" content="670871961,665545775"/>
   <meta name="fb:app_id" content="121478641197975" /> 
   <meta property="og:latitude" content="<?  echo $row[2]; ?>"/>
    <meta property="og:longitude" content="<?  echo $row[3]; ?>"/>

    <meta property="og:description"
          content="Encuentra el camino a <? 

if($row[12]) {  
	echo $row[12];  
} else
{
	echo $textosinguiones;  
}
if($row[7]) {  
 echo ('. '.$comentariossinsaltos);
   }
?>. Como llegar en coche desde un punto inicial elegido. Con info GPS"/>


  <?php
  
include($_SERVER['DOCUMENT_ROOT'].'/includes/headcommon.php'); 

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
		
		if($row[20]) { ?> (<? echo $row[20]; ?>) <? } ?></title>
		
	<?	if($row[13]=="no") {  
	?>
	  <meta name="robots" content="noindex">
	<?
} ?>
   
   
<meta http-equiv="description" content="Encuentra el camino a <? 

if($row[12]) {  
	echo $row[12];  
} else
{
	echo $textosinguiones;  
}
if($row[7]) {  
 echo ('. '.$comentariossinsaltos);
   }
?>. Como llegar en coche desde un punto inicial elegido. Con info GPS" />
       <link href="/estilos.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript"> 
 
    var map;
    var gdir;
    var geocoder = null;
    var addressMarker;


 
var longext = <?  echo $row[2]; ?>	;
var latext = <?  echo $row[3]; ?>	;  
var geocoder = null; //reverse geocoding

 
    function initialize() {
      if (GBrowserIsCompatible()) {   
	  function createMarker(point,html) {
        var marker = new GMarker(point);
        <?  // if ($row[7]){ ?>
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
		
		?></b> <? if($row[19]) { ?> <br>(<? echo $row[19]; ?>) <? } ?> <? if($row[7]) { ?> <br><? echo $comentariossinsaltos; ?> <? } ?> <\/div>')
		map = new GMap2(document.getElementById("map_canvas"));
		map.addControl(new GLargeMapControl());
	    map.addControl(new GMapTypeControl());
		map.addControl(new GOverviewMapControl());
		//map.enableScrollWheelZoom();
    	map.setCenter(new google.maps.LatLng(longext,latext), 15);
	 	map.addOverlay(marker);
		gdir = new GDirections(map, document.getElementById("directions"));
        //GEvent.addListener(gdir, "load", onGDirectionsLoad);
        GEvent.addListener(gdir, "error", handleErrors);
		
		/******************/
		/*REVERSE GEOCODING***/
		geocoder = new GClientGeocoder(); //reverse geocoding
		geocoder.getLocations(point, function(addresses) {

			if(addresses.Status.code == 200) {
    		var result = addresses.Placemark[0];
    		document.getElementById('direccionb').innerHTML = "Direcci&oacute;n din&aacute;mica: "+result.address+"<br>";
  			}
			
		});

		/********************/
		
		
		
      }
    }
    
    
    function setDirections(fromAddress, locale) {
		//pageTracker._trackEvent('ruta', 'apretar_boton_ruta', '<? echo $texto; ?>'); //Evento Google Analytics
      	if(fromAddress!=""){
		
		gdir.load("from: " + fromAddress + " to: " + longext + "," + latext,
                { "locale": locale });
				//ejecutado = 1;
		}
		else
		{
		alert("Por favor, introduce una direccion de origen");
		return false;
		}
		
    } 
    function handleErrors(){
		//var textoerror = gdir.getStatus().code;
	   //pageTracker._trackEvent('error-api', 'pagina-de-<? echo $texto; ?>', '<? echo $texto; ?>'); //Evento Google Analytics

	   if (gdir.getStatus().code == G_GEO_UNKNOWN_ADDRESS)
	     alert("No se ha encontrado una localizacin para la direccin introducida. Esto puede ser debido a que la direccion es nueva o incorrecta.\nError: " + gdir.getStatus().code);
	   else if (gdir.getStatus().code == G_GEO_SERVER_ERROR)
	     alert("La peticin no ha podido ser procesada. Fallo inesperado...\n Error: " + gdir.getStatus().code);
	   
	   else if (gdir.getStatus().code == G_GEO_MISSING_QUERY)
	     alert("El parametro HTTP q o no existe o no tiene valor. Se ha introducido una direccion vacia como entrada.\n Error: " + gdir.getStatus().code);
 
	     
	   else if (gdir.getStatus().code == G_GEO_BAD_KEY)
	     alert("Key erronea. \n Error: " + gdir.getStatus().code);
 
	   else if (gdir.getStatus().code == G_GEO_BAD_REQUEST)
	     alert("La peticion no ha podido ser parseada con exito.\n Error: " + gdir.getStatus().code);
	    
	   else alert("Error inesperado...");
       //ANALITICA:
		//alert(textoerror);
	   
	}
 function imprimete() {
 //pageTracker._trackEvent('eventos', 'impresion-en', '<? echo $texto; ?>'); //Evento Google Analytics
 print();
 
 }

    </script> 
 
 </head> 
  <body onLoad="initialize()" onUnload="GUnload()">
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#username=santifc"></script>
<div class="addthis_toolbox" id="adthis">
    <div class="vertical">
        <a class="addthis_button_email">Email</a>
        <a class="addthis_button_print">Imprimir</a>
		<a class="addthis_button_facebook">Facebook</a>
        <a class="addthis_button_meneame">Menéame</a>
        <div class="more">
            <a class="addthis_button_expanded">Más opciones</a>
        </div>
		
    </div>
	<br> &nbsp;<a href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal" data-via="santifc" data-related="santifc:Creador de Comoseva.com" data-lang="es">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
</div>
 
 <?php include($_SERVER['DOCUMENT_ROOT'].'/includes/toputil.php'); ?>
      <?php
$browser = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
if ($browser == true)  { ?>
  <a href="http://maps.google.com/maps?f=q&amp;q=<?  echo $row[2]; ?>,<?  echo $row[3]; ?>+(<?  echo $textosinguiones; ?>)&amp;ie=UTF8&amp;z=15"><img src="/images/maps-iphone.jpg" border="0" /></a>
<? }
?>
    <table class="directions" border="0" width="950"> 

 <tr>
   <td align="center"><h1>C&oacute;mo se va   a... <? 
		
		if ($row[12])
		 {
		echo $row[12]; 
		}
		else
		 {
		 echo $textosinguiones; 
		 }
		
		?> <? if($row[20]) { ?> (<? echo $row[20]; ?>) <? } ?></h1><?  if ($row[7]){ ?><br /> <span class="comentarios"><?  echo nl2br($row[7]); ?></span><? } ?>
		<br /><span class="direccionreverse"><span id="direccionb"></span></span></td>
 </tr> <tr><td align="center"><form action="#" onSubmit="setDirections(this.from.value, this.locale.value); return false" style="padding:0px; margin:0px;"><span style="font-size:21px;">Viajando desde: </span><input type="text" size="35" id="fromAddress" name="fro