<?
require_once('recaptchalib.php');
include($_SERVER['DOCUMENT_ROOT'].'/includes/privaterecaptcha.php');


$resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

if (!$resp->is_valid) {
  die ("CODIGO INCORRECTO. <a href=/>Vuelve a intentarlo</a>" .
       "<br>(error: " . $resp->error . ")");
}


$textoconespacios = @$_POST['textoconespacios'];
$textoprincipal = @$_POST['textoprincipal'];
$email = @$_POST['email'];
$longitud = @$_POST['longitudform'];
$latitud = @$_POST['latitudform'];
$comentarios = @$_POST['comentarios'];
$ip =  $_SERVER['REMOTE_ADDR'];  
$date = date("Ymd"); 
/* EMPEZAMOS CON LA BBDD */
	

include($_SERVER['DOCUMENT_ROOT'].'/includes/connection.php');
include($_SERVER['DOCUMENT_ROOT'].'/includes/opendb.php'); 


/*
$consulta="select * from coordenadas where texto ";
$sql = mysql_query ($consulta);
if (!$sql) {
	echo("<P>Error retrieving table from database!dsd<BR>Error: " . mysql_error());
}
*/
// comprueba si ya existe el usuario:
$result = mysql_query("SELECT * FROM coordenadas WHERE texto='$textoprincipal'") or die(mysql_error());
if($row = mysql_fetch_array($result)) {//if we did return a record
  header( 'Location: /yaexiste.php?texto='.$textoprincipal ) ;
 }
 else
 {
 

//fin comprobacion

function createRandomPassword() {

    $chars = "abcdefghijkmnopqrstuvwxyz023456789";
    srand((double)microtime()*1000000);
    $i = 0;
    $pass = '' ;

    while ($i <= 7) {
        $num = rand() % 33;
        $tmp = substr($chars, $num, 1);
        $pass = $pass . $tmp;
        $i++;
    }

    return $pass;

}

// Usage
$password = createRandomPassword();
//echo "Your random password is: $password";

$query = "INSERT INTO coordenadas (texto,email,latitud,longitud,comentarios,fechains,usar,ip,en_lista,password,textoconespacios) VALUES ('$textoprincipal','$email','$longitud','$latitud','$comentarios','$date','si','$ip','si','$password','$textoconespacios')";
mysql_query($query) or die('Error, insert query failed1. ERROR: '.mysql_error()."".$textoprincipal.$date.$email);

/*   EMAIL PARA EL USUARIO:   */	


  $cabecerasb = 'From: Comoseva.com <dime@comoseva.com>' . "\r\n" .
    'Reply-To: dime@comoseva.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
      $mailenviadob = mail($email,$email.", tu direccion en comoseva.com es esta: www.comoseva.com/".$textoprincipal,$email.", tu direccion en comoseva.com es esta: www.comoseva.com/".$textoprincipal." Para hacer modificaciones tu contraseña es: ".$password." (Conservala para hacer cambios a la direccion creada)",$cabecerasb);


/*   EMAIL PARA EL WEBMASTER:   */	

  $cabeceras = 'From: Comoseva.com <dime@comoseva.com>' . "\r\n" .
    'Reply-To: dime@comoseva.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
      $mailenviado = mail("santiagofcm@yahoo.es","Nueva direccion: ".$textoprincipal.". email: ".$email,"Nueva direccion: ".$textoprincipal.". email: ".$email,$cabecerasb);

setcookie("comoseva", $password); 


include($_SERVER['DOCUMENT_ROOT'].'/exito.php'); 
}
?>