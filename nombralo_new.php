<?
require_once('recaptchalib.php');
$privatekey = "6LdxSQQAAAAAAOm7RoTDcBIOI-6JdH3uOA698eML";
$resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

if (!$resp->is_valid) {
  die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
       "(reCAPTCHA said: " . $resp->error . ")");
}



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

/*   EMAIL PARA EL USUARIO:   */	


  $cabecerasb = 'From: Comoseva.com <dime@comoseva.com>' . "\r\n" .
    'Reply-To: dime@comoseva.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
      $mailenviadob = mail($email,$email.", tu direccion en comoseva.com es esta: www.comoseva.com/".$textoprincipal,$email.", tu direccion en comoseva.com es esta: www.comoseva.com/".$textoprincipal,$cabecerasb);


/*   EMAIL PARA EL WEBMASTER:   */	

  $cabeceras = 'From: Comoseva.com <dime@comoseva.com>' . "\r\n" .
    'Reply-To: dime@comoseva.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
      $mailenviado = mail("santiagofcm@yahoo.es","Nueva direccion: ".$textoprincipal.". email: ".$email,"Nueva direccion: ".$textoprincipal.". email: ".$email,$cabecerasb);

include ('/web/htdocs/www.comoseva.com/home/exito.php'); 
}
?>