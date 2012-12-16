<?
//if ($uploadedfile_size >250000){$msg=$msg."Your uploaded file size is more than 250KB so please reduce the file size and then upload. Visit the help page to know how to reduce the file size.<BR>";
//$file_upload="false";}

//Now let us check the file extension and only jpg or gif file pictures we will allow into our server. We will check this by using $userfile_type extension
//echo $_FILES['uploadedfile']['type'];
/*if (!($_FILES['uploadedfile']['type']=="image/pjpeg" OR $_FILES['uploadedfile']['type']=="image/gif")){echo("ERROR: El archivo ha de ser JPG o GIF. el archivo no se ha subido");
}
else
{*/
$target_path = "/web/htdocs/www.cuentosdecalleja.org/home/descargas/";
$target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 

if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
    echo "El archivo <b>".  basename( $_FILES['uploadedfile']['name']). "</b> ha sido subida al servidor. <p>GUARDA EL NOMBRE DEL ARCHIVO SUBIDO (<b>".  basename( $_FILES['uploadedfile']['name']). "</b>) PARA PONERLO EN EL FORMULARIO LUEGO. <br>Lo mejor es que lo seleccines hagas CONTROL+C para luego poder pegarlo en su caja correspondiente<p><A HREF=subirfoto.php>Subir otro archivo</a> | <a href=index.php>Volver al admin</a><p>Si subiste una imagen, es ésta:<br><img src=/descargas/".  basename( $_FILES['uploadedfile']['name'])."><br>Si sale un recuadro con una cruz roja es porque no has subido una imagen, o porque has subido una imagen con espacios, con alguna mayúscula en su nombre o la imagen estaba corrompida";
} else{
   ?>
   <strong><font color="#FF0000" size="5">ERROR AL SUBIR EL ARCHIVO, VOLVER A INTENTAR ANTES DE LLAMAR A TU HIJO!</font></strong>
   <?
//}
//echo("<br>info DEBUG: ");
//print_r($_FILES);
}

	
?>