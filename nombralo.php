<?

$textoconespacios = @$_POST['textoconespacios'];
$textoprincipal = @$_POST['textoprincipal'];
$email = @$_POST['email'];
$privado = @$_POST['privado'];
$longitud = @$_POST['longitudform'];
$latitud = @$_POST['latitudform'];
$categoria = @$_POST['categoria'];
$comentarios = @$_POST['comentarios'];
$ip =  $_SERVER['REMOTE_ADDR'];  
$date = date("Ymd"); 

require_once('recaptchalib.php');
include($_SERVER['DOCUMENT_ROOT'].'/includes/privaterecaptcha.php');


$resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

if (!$resp->is_valid) {
  $cabeceras = 'From: Comoseva.com <dime@comoseva.com>' . "\r\n" .
    'Reply-To: dime@comoseva.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
      $mailenviado = mail("santiagofcm@yahoo.es","Error de captcha en COMOSEVA","Error de captcha en COMOSEVA".$email.", titulo".$textoprincipal,$cabeceras);


  die ("<b>CODIGO INCORRECTO!!</b><br>O no eres un ser humano, o has puesto mal el código...<br> <a href='javascript:history.back()'>Vuelve a intentarlo</a>" .
       "<br>(error: " . $resp->error . ")");
}


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
if ($privado == "si"){
$google = "no";
$en_lista = "no";
}
else
{
$google = "si";
$en_lista = "si";

}
$password = createRandomPassword();
//echo "Your random password is: $password";

$query = "INSERT INTO coordenadas (texto,email,latitud,longitud,comentarios,fechains,usar,ip,google,en_lista,password,textoconespacios,tipo) VALUES ('$textoprincipal','$email','$longitud','$latitud','$comentarios','$date','si','$ip','$google','$en_lista','$password','$textoconespacios','$categoria')";
mysql_query($query) or die('Error, insert query failed1. ERROR: '.mysql_error()."".$textoprincipal.$date.$email);

/*   EMAIL PARA EL USUARIO:   */	


  $cabecerasb = 'From: Comoseva.com <dime@comoseva.com>' . "\r\n" .
    'Reply-To: dime@comoseva.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
      $mailenviadob = mail($email,"Tu direccion en comoseva.com es esta: comoseva.com/".$textoprincipal,"Conserva este email para futuras referencias\r\n".$email.", tu direccion en comoseva.com es esta: http://www.comoseva.com/".$textoprincipal." \r\nPara hacer modificaciones o borrarla, tu password es: ".$password."\r\r\r\n¿Qué te ha parecido el servicio? ¿Tienes alguna sugerencia? envíanoslas a dime@comoseva.com",$cabecerasb);


/*   EMAIL PARA EL WEBMASTER:   */	

  $cabeceras = 'From: Comoseva.com <dime@comoseva.com>' . "\r\n" .
    'Reply-To: dime@comoseva.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
      $mailenviado = mail("santifc@gmail.com","Nueva direccion: http://www.comoseva.com/".$textoprincipal.". email: ".$email,"Nueva direccion: http://www.comoseva.com/".$textoprincipal.". email: ".$email. "PRIVADO: ".$privado,$cabeceras);

setcookie("comoseva", $password); 


include($_SERVER['DOCUMENT_ROOT'].'/exito.php'); 
}
?>