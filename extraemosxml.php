<?php  

include($_SERVER['DOCUMENT_ROOT'].'/includes/connection.php');
include($_SERVER['DOCUMENT_ROOT'].'/includes/opendb.php'); 

// Start XML file, create parent node

$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node); 


// Select all the rows in the markers table

$query = "select * from coordenadas where usar = 'si' and en_lista = 'si' and tipo = '' order by fechains desc limit 200";
$result = mysql_query($query);
if (!$result) {  
  die('Invalid query: ' . mysql_error());
} 

header("Content-type: text/xml"); 

// Iterate through the rows, adding XML nodes for each

while ($row = @mysql_fetch_assoc($result)){  
  // ADD TO XML DOCUMENT NODE  
  $node = $dom->createElement("marker");  
  $newnode = $parnode->appendChild($node);   
  $newnode->setAttribute("name",utf8_encode($row['texto']));
  $newnode->setAttribute("address", utf8_encode  ($row['comentarios']));  
  $newnode->setAttribute("lat", $row['longitud']);  
  $newnode->setAttribute("lng", $row['latitud']);  
  $newnode->setAttribute("type", $row['tipo']);
} 

echo $dom->saveXML();

?>