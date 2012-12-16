<TABLE align="center">
  <tr><td align="center" valign="bottom" style="font-size:10px">El tiempo hoy en<br>
    <? if ($row[12])
		 {
		echo $row[12]; 
		}
		else
		 {
		 echo $textosinguiones; 
		 }
		
		if($row[20]) { ?> (<? echo $row[20]; ?>) <? }  ?>:<br>
    <?php
		//IDEALMENTE ESTO SOLO SE DEBERIA EJECUTAR UNA VEZ AL DIA EN EL SERVIDOR, PARA NO TENER QUE PEDIR EL XML CADA VEZ Y ASI MEJORARIAMOS LA VELOCIDAD DE CARGA

$sx = simplexml_load_file('http://www.worldweatheronline.com/feed/weather.ashx?lat='.$row[2].'&lon='.$row[3].'&format=xml&num_of_days=2&key=550a9691a6131854101905');
foreach($sx->current_condition as $item)
{
$title_text_value = $item->weatherIconUrl;
?>
<a href="http://www.worldweatheronline.com" target="_blank"><img src="<? echo $title_text_value; ?>" border="0"></a>
</td><td align="center" valign="bottom" style="font-size:10px">...y mañana y pasado:<br>
  <?
}
foreach($sx->weather as $item)
{
$title_text_value = $item->weatherIconUrl;
?>
<a href="http://www.worldweatheronline.com" target="_blank"><img src="<? echo $title_text_value; ?>" border="0"></a>
<?
}
?>
</td></tr></TABLE>