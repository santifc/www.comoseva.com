<table width="950" border="0" cellpadding="5" cellspacing="5" class="footer">
  <tr>
    <td valign="top"><br />  &nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>
  <tr><td valign="top"><strong>Ultimas direcciones creadas:</strong><br />
  <?
$consultan="select * from coordenadas where usar = 'si' and en_lista = 'si' order by fechains desc limit 5";
$sql = mysql_query ($consultan);
if (!$sql) {
	echo("<P>Error retrieving table from database!<BR>"."Error: " . mysql_error());
}
while($row = mysql_fetch_array($sql))            
			    { //empieza while principal 
?>
<a href="/<?  echo $row[1];  ?>" <? if ($row[13]=='no') { ?> rel="nofollow" <? } ?> >
<?

if ($row[12])
{ 
 echo $row[12]; 
 
} 
else
{
 $textosinguiones = str_replace("-"," ",$row[1]); 
 echo $textosinguiones; 
 
}
?></a><br />
<?

}

?></td>
    <td valign="top"><strong>Directorio de direcciones creadas: </strong><br />
      <a href="/direcciones/talleres.php?orden=a">Talleres<br />
      </a><a href="/direcciones/hostales.php">Hostales</a><br />
        <a href="/direcciones/puertos-montana.php">Puertos de monta&ntilde;a</a><br />
        <a href="/ya-creadas.php">Otros</a><br /> 
        <a href="/mapa-dinamico.php">(Versión mapa)</a>            </td>
    <td valign="top"><strong>Secciones:</strong><br />
        <a href="/crea-una-direccion.php">Crea una direcci&oacute;n</a><br />
        <a href="/ruta.php">Ruta entre dos puntos</a><br />
    <a href="http://comosevapuntocom.blogspot.com/" target="_blank">Blog Comoseva.com</a>   </td>
</tr>
  <tr>
    <td colspan="3" align="center"><font color="#999999" size="2">SFCM<br />
Esta web usa tecnolog&iacute;a de <a href="http://maps.google.es" target="_blank" class="footerlink">Google Maps</a>, <a href="http://opengraphprotocol.org/" target="_blank">Open Graph Protocol</a>, <a href="http://www.uservoice.com" target="_blank" class="footerlink">UserVoice.com</a>, <a href="http://createqrcode.appspot.com/" target="_blank" class="footerlink">Create QR Code</a> y <a href="http://www.addthis.com" target="_blank" class="footerlink">AddThis</a><br />  
<a href="http://comosevapuntocom.blogspot.com/" target="_blank" class="footerlink">Blog</a> | <a href="mailto:dime@comoseva.com" class="footerlink">Contacto</a> </font> | <a href="http://www.webdelosdeseos.org/" target="_blank" class="footerlink">Web de los deseos</a> | Twitter: <a href="http://twitter.com/santifc">@santifc</a></td>
  </tr>
  <tr>
    <td colspan="3" align="center"><font color="#999999" size="2">Proyecto en <a href="https://github.com/santifc/www.comoseva.com" target="_blank">GitHub</a>. Se aceptan colaboraciones!</font></td>
  </tr>
</table>

