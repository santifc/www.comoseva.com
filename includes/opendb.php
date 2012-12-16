<?php
$dbcnx = @mysql_connect($dbhost, $dbuser, $dbpass)
		or die('Sorry, there is no connection with the database. ERROR: '.mysql_error());
	mysql_select_db($db);

?>