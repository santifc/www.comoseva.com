<table width="950" border="0" cellpadding="5" cellspacing="5" class="footer">
  <tr>
    <td valign="top"><br />  &nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>
  <tr><td valign="top"><strong>Ultimas direcciones creadas:</strong><br />
  <?
$consultan="select * from coordenadas where usar = 'si' and en_lista = 'si' and tipo = '' order by fechains desc limit 5";
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

?></ul></td>
    <td valign="top"><p><strong>Directorio de direcciones creadas: </strong><br />
      <a href="/direcciones/talleres.php?orden=a">Talleres<br />
      </a><a href="/direcciones/hostales.php">Hostales</a><br />
        <a href="/direcciones/puertos-montana.php">Puertos de monta&ntilde;a</a><br />
        <a href="/ya-creadas.php">Otros</a></p>    </td>
    <td valign="top"><p><strong>Secciones:</strong><br />
      <a href="/">Home</a><br />
        <a href="/crea-una-direccion.php">Crea una direcci&oacute;n</a><br />
        <a href="/ruta.php">Ruta entre dos puntos</a><br />
        <a href="http://comosevapuntocom.blogspot.com/" target="_blank">Blog Comoseva.com</a> </p>    </td>
</tr>
  <tr>
    <td colspan="3" align="center"><font color="#999999" size="2">SFCM<br />
Esta web usa tecnolog&iacute;a de <a href="http://maps.google.es" class="footerlink">Google Maps</a>, <a href="http://www.facebook.com"  class="footerlink" target="_blank">Facebook</a>, <a href="http://www.addthis.com" target="_blank" class="footerlink">AddThis</a>, <a href="http://www.disqus.com" target="_blank" class="footerlink">DISQUS</a> y <a href="http://www.worldweatheronline.com/" target="_blank" class="footerlink">Worldweatheronline</a><br />  
<a href="http://comosevapuntocom.blogspot.com/" target="_blank" class="footerlink">Blog</a> | <a href="mailto:dime@comoseva.com" class="footerlink">Contacto</a> |  <a href="logos-para-tu-web.php" class="footerlink">Logos para usar en tu web</a> </font></td>
  </tr>
</table>

