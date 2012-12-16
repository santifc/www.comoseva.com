<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>

<body>
<?

error_reporting(E_ALL);

// Genera un boundary
$mail_boundary = "=_NextPart_" . md5(uniqid(time()));
 
$to = "santifc@gmail.com";
$subject = "testing e-mail d";
$sender = "Comoseva.com <dime@comoseva.com>";

 
$headers = "From: $sender\n";
$headers .= "MIME-Version: 1.0\n";
$headers .= "Reply-To: dime@comoseva.com\n";
$headers .= "Content-Type: multipart/alternative;\n\tboundary=\"$mail_boundary\"\n";
$headers .= "X-Mailer: PHP " . phpversion();
 
// Corpi del messaggio nei due formati testo e HTML
//$text_msg = "messaggio in formato testo";
//$html_msg = "<b>messaggio</b> in formato <p><a href='http://www.aruba.it'>html</a><br><img src=\"http://hosting.aruba.it/image_top/top_01.gif\" border=\"0\"></p>";
 
// Costruisci il corpo del messaggio da inviare
$msg = "This is a multi-part message in MIME format.\n\n";
$msg .= "--$mail_boundary\n";
$msg .= "Content-Type: text/plain; charset=\"iso-8859-1\"\n";
$msg .= "Content-Transfer-Encoding: 8bit\n\n";
$msg .= "Esto es un e-mail de test enviado por el servicio Hosting de Aruba.it para la verificación del correcto funcionamiento de PHP mail()function .Aruba.it";  // aggiungi il messaggio in formato text
 
$msg .= "\n--$mail_boundary\n";
$msg .= "Content-Type: text/html; charset=\"iso-8859-1\"\n";
$msg .= "Content-Transfer-Encoding: 8bit\n\n";
$msg .= "<b>Mensaje en formato HTML</b> in formato <p><a href='http://www.aruba.it'>html</a></p>";  // aggiungi il messaggio in formato HTML
 
// Boundary di terminazione multipart/alternative
$msg .= "\n--$mail_boundary--\n";
 
// Imposta il Return-Path (funziona solo su hosting Windows)
//ini_set("sendmail_from", $sender);
 
// Invia il messaggio, il quinto parametro "-f$sender" imposta il Return-Path su hosting Linux
if (mail($to, $subject, $msg, $headers, "-f$sender")) { 
    echo "Mail enviado correctamente! d";
   // highlight_file($_SERVER["SCRIPT_FILENAME"]);
    //unlink($_SERVER["SCRIPT_FILENAME"]);
} else { 
    echo "<br><br>Resumen de e-mail erróneo!";
}

?>
</body>
</html>
