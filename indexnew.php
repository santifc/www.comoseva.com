<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
	<?php 
	include($_SERVER['DOCUMENT_ROOT'].'/includes/headcommon.php');
	include($_SERVER['DOCUMENT_ROOT'].'/includes/connection.php');
	include($_SERVER['DOCUMENT_ROOT'].'/includes/opendb.php'); 

	
	?>
	<meta http-equiv="description" content="Comparte fcilmente la ruta hacia el destino que t elijas" />
         <title><?php include($_SERVER['DOCUMENT_ROOT'].'/includes/title.php'); ?></title>
		       <link href="estilos.css" rel="stylesheet" type="text/css" />


</head>
<body>

<?php
include($_SERVER['DOCUMENT_ROOT'].'/includes/toputil.php');
include($_SERVER['DOCUMENT_ROOT'].'/includes/top.php');

// consulta de las direcciones de los puertos de montaa
$consulta2="select * from coordenadas where usar = 'si' and en_lista = 'si' and tipo = 1";
$sql2 = mysql_query ($consulta2);
if (!$sql2) {
	echo("<P>Error retrieving table from database!<BR>"."Errors: " . mysql_error());
}
$num_rows = mysql_num_rows($sql2);

$consultat="select * from coordenadas where usar = 'si' and en_lista = 'si' and tipo = 3";
$sqlt = mysql_query ($consultat);
if (!$sqlt) {
	echo("<P>Error retrieving table from database!<BR>"."Errort: " . mysql_error());
}
$num_rowst = mysql_num_rows($sqlt);


$consultas="select * from coordenadas where usar = 'si' and en_lista = 'si' and tipo = ''";
$sqls = mysql_query ($consultas);
if (!$sqls) {
	echo("<P>Error retrieving table from database!<BR>"."Errors: " . mysql_error());
}
$num_rowss = mysql_num_rows($sqls);


?>
<table width="950" border="0" cellpadding="2" cellspacing="2">

 
<tr>
  <td>&nbsp;</td>
</tr>
<tr><td height="40"><table width="600" align="center">
  <tr><td align="center" class="celdahome"><p><a href="crea-una-direccion.php" class="linkhome">Crea una nueva direcci&oacute;n
    y comp&aacute;rtela</a> <br><font color="#999999">(www.comoseva.com/mi-direccion) </font></p></td> </tr> <tr>
    <td align="center" class="celdahome"><p><a href="ruta.php" class="linkhome">Encuentra una ruta 
    entre dos puntos</a> <br>
    <font color="#999999">(Planea bien tu pr&oacute;ximo viaje) </font></p></td></tr></table></td></tr>

  <tr>
    <td align="center">

<script type="text/javascript">
  function initAllData() {
  	var req = opensocial.newDataRequest();
  	req.add(req.newFetchPersonRequest("OWNER"), "owner_data");
	req.add(req.newFetchPersonRequest("VIEWER"), "viewer_data");
  	var idspec = new opensocial.IdSpec({
      'userId' : 'OWNER',
      'groupId' : 'FRIENDS'
  });
  req.add(req.newFetchPeopleRequest(idspec), 'site_friends');

  req.send(onData);

  };
  
  function onData(data) {
  if (!data.get("owner_data").hadError()) {
    var owner_data = data.get("owner_data").getData();
    document.getElementById("site-name").innerHTML = owner_data.getDisplayName();
  }
  
  var viewer_info = document.getElementById("viewer-info");
  if (data.get("viewer_data").hadError()) {
    google.friendconnect.renderSignInButton({ 'id': 'gfc-button' });
    document.getElementById('gfc-button').style.display = 'block';
    viewer_info.innerHTML = '';
  } else {
    document.getElementById('gfc-button').style.display = 'none';
    var viewer = data.get("viewer_data").getData();
    viewer_info.innerHTML = "Hola " + viewer.getDisplayName() + " " +
        "<a href='#' onclick='google.friendconnect.requestSettings()'>Config</a> | " + 
        "<a href='#' onclick='google.friendconnect.requestInvite()'>Invitar</a> | " +
        "<a href='#' onclick='google.friendconnect.requestSignOut()'>Salir</a>";
  }

  if (!data.get("site_friends").hadError()) {
    var site_friends = data.get("site_friends").getData();
    var list = document.getElementById("friends-list");
    list.innerHTML = "";
    site_friends.each(function(friend) {
      list.innerHTML += "<li>" + friend.getDisplayName() + "</li>";
    });
  }

};
</script>
<p>The name of this site is <span id="site-name"></span></p>
    <p><div id="gfc-button"></div></p>
    <p id="viewer-info"></p>
    <p>Miembros del site:</p>
    <ol id="friends-list"></ol>

  </td>
  </tr>
  <tr>
    <td align="center">Direcciones ya creadas:<br>
    <a href="/direcciones/puertos-montana.php"><font size="2">Puertos de monta&ntilde;a (<? echo "$num_rows"; ?>) </font></a><br>
	  <a href="/direcciones/talleres.php"><font size="2">Talleres (<? echo "$num_rowst"; ?>) </font></a>
	  <br>    <a href="ya-creadas.php"><font size="2">Sin clasificar (<? echo "$num_rowss"; ?>)</font></a></td>
  </tr>
   <tr>
    <td>&nbsp;</td>
  </tr>
  <tr><td align="center"><?
  include($_SERVER['DOCUMENT_ROOT'].'/includes/footer.php');
  ?></td>
  </tr>
  </table>

  <?


include($_SERVER['DOCUMENT_ROOT'].'/includes/tagga.php'); ?>
</body>
</html>
