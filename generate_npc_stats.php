<?php

include_once('config.php');

$name = filter_var($_POST['character_name'], FILTER_SANITIZE_STRING);

$selection = 'SELECT * FROM npcs WHERE name = "'.$name.'"';
$result = mysqli_query($con,$selection);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

echo '<div class="container-fluid">';
echo '<div class="row" id="character-modal-firstrow">';
	echo '<div class="col-xs-2" id="character-modal-sprite">';
		echo '<img src="',$row['sprite'],'" title="',$row['name'],'"/>';
	echo '</div>';
	echo '<div class="col-xs-10" id="character-modal-asl">';
		echo '<span id="character-modal-gender" value="',$row['gender'],'"></span><br>';
		echo '<span id="character-modal-nation" value="',$row['nation'],'">',$row['nation'],'</span><br>';
		echo 'Hometown: ',$row['location'],'';
	echo '</div>';
echo '</div>';

if ($row['nation'] == 'Alerian Federation')
	$statcolor = '#0000CC';
elseif ($row['nation'] ==  'Gran Eszak Empire')
	$statcolor = '#CC0000';
else
	$statcolor = '#00CC00';

echo '<div class="row">';
	echo '<h2>Character information goes here.</h2>';
echo '</div>';

mysqli_free_result($result);

?>