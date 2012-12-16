 <?php
  require_once('recaptchalibcomments.php');
  $privatekey = "6LcOb7oSAAAAACZ74z3A1sowndq7e9HuPIpw6MMS";
  $resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

  if (!$resp->is_valid) {
    // What happens when the CAPTCHA was entered incorrectly
    die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
         "(reCAPTCHA said: " . $resp->error . ")");
  } else {
    // Your code here to handle a successful verification

      

//$oculto = @$_POST['oculto'];
$sitioid =  @$_POST['sitioid'];
$comentario = @$_POST['comentario'];
$nombre = @$_POST['nombre'];
$email = @$_POST['email'];
$texto = @$_POST['sitioname'];
//$ip =  $_SERVER['REMOTE_ADDR'];  
$ip = "0.0.0.0";
$date = date("Ymd"); 
include($_SERVER['DOCUMENT_ROOT'].'/includes/connection.php');
include($_SERVER['DOCUMENT_ROOT'].'/includes/opendb.php'); 

$query = "INSERT INTO comentarios (idcoordenada,texto,fecha,email,alias,mostrar) VALUES ('$sitioid','$comentario','$date','$email','$nombre','si')";
mysql_query($query) or die('Error, insert query failed1. ERROR: '.mysql_error());
$cabecerasb = 'From: comoseva.com <dime@comoseva.com>' . "\r\n" .
    'Reply-To: dime@comoseva.com' . "\r\n" .
    'MIME-Version: 1.0' . "\r\n" .
    'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

//EMAIL PARA MI:
$enviastatus = mail('santifc@gmail.com', 'nuevo comentario', 'COMENTARIO: '.$comentario.'  FIRMA: '.$nombre.' EMAIL: '.$email.' URL: http://www.comoseva.com/'.$texto,$cabecerasb);
if ($email<>"")
{

/*   EMAIL PARA EL COMENTADOR:   */	


 
	$mensaje = '
	<html>
<head>
  <title></title>
</head>
<body>
  '.$email.', tu comentario "<b>'.$comentario.'</b>", ha sido enviado. <br>Vuelve a <a href="http://www.comoseva.com/'.$texto.'">http://www.comoseva.com/'.$texto.'</a>
</body>
</html>
';

	
      $mailenviadob = mail($email,"Tu comentario ha sido enviado.",$mensaje,$cabecerasb);

}

/*   EMAIL PARA EL DESEADOR:   */	


$consultan="select * from coordenadas where id = '$sitioid'";
$sql = mysql_query ($consultan);
if (!$sql) {
	echo("<P>Error retrieving table from database!<BR>"."Error: " . mysql_error());
}

$row = mysql_fetch_row($sql);
if ($row[8]<>"")
{
	$mensajeb = '
	<html>
<head>
  <title></title>
</head>
<body>
  '.$row[8].', alguien ha comentado tu lugar en comoseva.com.<br>Visita tu comoseva.com en <a href="http://www.comoseva.com/'.$texto.'">http://www.comoseva.com/'.$texto.'</a> para verlo
</body>
</html>
';

	
      $mailenviadoc = mail($row[8],"Alguien a comentado tu lugar",$mensajeb,$cabecerasb);
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="refresh" content="1;URL=http://www.comoseva.com/<? echo $texto; ?> " />

<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Comoseva.com</title>
</head>

<body>
Enviando comentario...
</body>
</html>
<?
  }

?>