<?
$textoprincipal = @$_POST['textoprincipal'];
$email = @$_POST['email'];
$longitud = @$_POST['longitudform'];
$latitud = @$_POST['latitudform'];
$comentarios = @$_POST['comentarios'];
$ip =  $_SERVER['REMOTE_ADDR'];  
$date = date("Ymd"); 
/* EMPEZAMOS CON LA BBDD */
	

include ('/web/htdocs/www.comoseva.com/home/includes/connection.php');
include ('/web/htdocs/www.comoseva.com/home/includes/opendb.php'); 

// comprueba si ya existe el usuario:
$consulta="select * from coordenadas where texto ";
$sql = mysql_query ($consulta);
if (!$sql) {
	echo("<P>Error retrieving table from database!dsd<BR>Error: " . mysql_error());
}

$result = mysql_query("SELECT * FROM coordenadas WHERE texto='$textoprincipal'") or die(mysql_error());
if($row = mysql_fetch_array($result)) {//if we did return a record
  header( 'Location: /yaexiste.php?texto='.$textoprincipal ) ;
 }
 else
 {
 

//fin comprobacion


$query = "INSERT INTO coordenadas (texto,email,latitud,longitud,comentarios,fechains,usar,ip) VALUES ('$textoprincipal','$email','$longitud','$latitud','$comentarios','$date','si','$ip')";
mysql_query($query) or die('Error, insert query failed1. ERROR: '.mysql_error()."".$textoprincipal.$date.$email);



/** TERMINA TEMAS BASE DE DATOS**/
/*   EMAIL PARA EL WEBMASTER:   */	


error_reporting(E_ALL);

$mail_from="postmaster@comoseva.com";
$mail_subject="Direccion creada correctamente en comoseva.com";
$mail_text="Tu direccion es www.comoseva.com";
$mail_to="santiagofcm@yahoo.es";

if( mail( $mail_to, $mail_subject, $mail_text, "From: {$mail_from}\r\n" ) ) {
include ('/web/htdocs/www.comoseva.com/home/exito.php'); 
} 
else echo "<br><br>ERROR";

}
?>