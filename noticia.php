<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Los Madrid Gatos se alzan con el triunfo - <?php  include($_SERVER['DOCUMENT_ROOT'].'/includes/titletag.php'); ?></title>
<?php
	include ($_SERVER['DOCUMENT_ROOT'].'/includes/connect.php'); 
include ($_SERVER['DOCUMENT_ROOT'].'/includes/opendb.php');
$item=($_GET['item']);
$consulta="select * from noticias where idnoticia = '$item'";
$sql = mysql_query ($consulta);
if (!$sql) {
	echo("<P>Error retrieving table from database!dsd<BR>Error: " . mysql_error());
}
$row = mysql_fetch_row($sql);

		include($_SERVER['DOCUMENT_ROOT'].'/includes/headcommon.php');
?>

<link href="/styles-sir.css" rel="stylesheet" type="text/css" /></head>

<body>
<table width="1000" border="0" align="center">
  <tr>
    <td><?php
	
		include($_SERVER['DOCUMENT_ROOT'].'/includes/toptitle.php');
?>
	<img src="/imagessir/1pix.gif" width="25" height="20" />
	<table width="900" border="0" align="center" cellpadding="3" cellspacing="3">
      <tr>
        <td><a href="/">&lt;&lt; Volver </a></td>
      </tr>
      <tr>
        <td><p class="titlenoticiainside"><img src="/imagessir/gatos_winners.jpg" width="340" height="192" hspace="20" vspace="10" align="right" /><? echo stripslashes($row[1]); ?></p>
          <p class="textonoticia"><strong>&iexcl;&iexcl;GRANDE fue el choque entre los   MARINERS y los GATOS DE MADRID!!</strong></p>
          <p dir="ltr"><span class="textonoticia" lang="es" xml:lang="es">06 de julio de 2009 -Seguramente el mejor partido de todo   el CAMPEONATO arroj&oacute; en el minuto 80 un empate a 28. &iexcl;&iexcl;QUE GRAN FINAL!!</span></p>
          <p dir="ltr"><span class="textonoticia" lang="es" xml:lang="es">Este resultado fue la prueba de que   el encuentro fue IGUALADISIMO,   con alternancias en el marcador continuas, hasta que   MARINERS en la recta final del encuentro tomaron ventaja.</span> </p>
          <p dir="ltr"><span class="textonoticia" lang="es" xml:lang="es">La entrada de FEIJO por los   GATOS muy al final del   encuentro, dio un mayor dinamismo al juego de los de MADRID que   culmin&oacute; con una embestida de Enr&iacute;quez que consigui&oacute; el   &uacute;ltimo&nbsp; ensayo<strong> &ndash; 28-28 &iexcl;!&hellip; y FINAL del PARTIDO</strong> &iexcl;!&nbsp; Fue solo el mayor   n&uacute;mero de ensayos conseguidos por los GATOS los que decant&oacute; la BALANCE del   TRIUNFO hacia los de   MADRID &iexcl;!</span> </p>
          <p class="textonoticia" dir="ltr">Fue un partido repleto de   alternativas, de planteamientos t&eacute;cnicos exquisitos por las dos escuadras, y de   m&aacute;xima entrega de los jugadores. </p>
          <p class="textonoticia" dir="ltr">Fue un partido que hizo las delicias   de los m&aacute;s de 6.000 espectadores   que acudieron al TERESA RIVERO de Vallecas.</p>
          <p class="textonoticia" dir="ltr">LEROUX el   SUDAFRICANO de los MARINERS por   su velocidad y potencia y por   su caracter&iacute;stica forma   de conseguir ensayos para su equipo fue elegido MEJOR JUGADOR de todo el CAMPEONATO.</p>
          <p class="textonoticia" dir="ltr">Fue un GRAN HOMENAJE a este deporte   que tiene LARGUISIMO recorrido en nuestro pa&iacute;s, donde han participado 54 CLUBES de toda la PENINSULA IBERICA,   patrocinadores de primer nivel y una cadena de televisi&oacute;n como   CANAL PLUS. El Punto de partida est&aacute; servido para la pr&oacute;xima temporada donde con competir&aacute;n   franquicias PORTUGUESAS ( asisti&oacute; el   Presidente de la Federaci&oacute;n a la GRAN FINAL ) y deparar&aacute; muchas m&aacute;s m&aacute;s   sorpresas.</p>
          <p class="textonoticia" dir="ltr"><strong>CLASIFICACION   FINAL</strong></p>
          <ul class="textonoticia">
            <li>CAMPEON : MADRID &ndash;   GATOS</li>
            <li>SUBCAMPEON :   MARINERS</li>
            <li>TERCERO :   KORSARIOAK</li>
            <li>CUARTO :   ALMOGAVERS</li>
            </ul>
          <p class="textonoticia" dir="ltr">&nbsp;</p>
          <p class="textonoticia" dir="ltr"><strong>GATOS MADRID 28 - MARINERS 28 (Desc:   14-15)</strong></p>
          <p class="textonoticia" dir="ltr"><strong>Gatos:</strong> 1 I Insausti, 2 M Vargas, 3 J Salazar; 4 D P&eacute;rez, 5 F L&oacute;pez; 6 G   Palmers, 7 S Noriega, 8 V G&oacute;mez; 9 S Fern&aacute;ndez, 10 P Cabral; 11 S Fern&aacute;ndez, 12   P Enr&iacute;quez, 13 J Canosa, 14 M Tudela; 15 C Sempere</p>
          <p class="textonoticia" dir="ltr">Suplentes: 16 A Onega, 17 D   Gugernazde, 18 C Bernasconi, 19 R Matt, 20 P Feijoo, 21 D Gama, 22 R.   Enriquez</p>
          <p class="textonoticia" dir="ltr"><strong>Mariners:</strong> 1 J Hutchinson, 2 P Previtera, 3 R Mart&iacute;nez; 4 M Rolston, 5&nbsp;F   Mart&iacute;nez; 6 J Craig, 7 M Ace&ntilde;a, 8 M&nbsp; Cook; 9 J Ceretto, 10 H Quirelli; 11 J   Sailasa, 12 A Cruickshanks, 13 R Le Roux, 14 A G&oacute;mez; 15 O   David</p>
          <p class="textonoticia" dir="ltr">Suplentes:&nbsp; 16 J Phipps, 17 M George, 18 V Gallego, 19 B Davies, 20 P   Burton, 21 G Carri&oacute;n, 22 J Carri&oacute;n.</p>
          <p dir="ltr">&nbsp;</p>
          <p dir="ltr"><span class="textonoticia" lang="es" xml:lang="es"><strong>ALMOGAVERS 9 - BASQUE KORSARIOAK 12 (Des:   9-12)</strong></span> </p>
          <p class="textonoticia" dir="ltr"><strong>Almogavers:</strong> 1 J Castell, 2 M Gonz&aacute;lez, 3 C Bou,; 4 N G&oacute;mez, 5 G Etxeberr&iacute;a; 6 S   Guerrero, 7 B Scaramuzzino, 8 S Serrano; 9 M Chotard, 10 I Richmond; 11 G   Vicente, 12 I Moreno, 13 C Delahodde, 14 A Carrasco; 15 S Aubanell </p>
          <p class="textonoticia" dir="ltr">Suplentes: 16 Vicen&ccedil; L&aacute;zaro, 17 Xabier   Corbacho, 18 Pol massoni, 19 Ivan Tabuenca, 20 Jordi Trubat, 21 Ignasi Basque,   22 Gerard Mayol.</p>
          <p class="textonoticia" dir="ltr"><strong>Korsarioak:</strong> 1 I Alberro, 2 U Lasa, 3 B Aboitiz; 4 P Dacunto, 5 O Astarloa; 6 D   Pelaz, 7 J Gorrochategui, 8 G Combes; 9 I Mirones, 10 I Genua; 11 Z Peinador, 12   I Etxeberr&iacute;a, 13 I Alberdi, 14 Z Peinador; 15 B Gorrochategui </p>
          <p class="textonoticia" dir="ltr">Suplentes: 16 Albert Oliveras, 17   Julen Gallego, 18 David Hern&aacute;ndez, 19 Iker Lopategi, 20 Izko Armental, 21 Koldo   Barandiaran, 22 I&ntilde;aki Arana.</p>
          <p>&nbsp;</p></td>
        </tr>
    </table>
	
	<?php
	
		include($_SERVER['DOCUMENT_ROOT'].'/includes/bottom.php');
?></td>
  </tr>
</table>
</body>
</html>
