<?php

include_once('config.php');

$name = filter_var($_POST['character_name'], FILTER_SANITIZE_STRING);

$selection = 'SELECT * FROM characters WHERE name = "'.$name.'"';
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

$hp = $row['hp_rating'];
$sp = $row['sp_rating'];
$str = $row['str_rating'];
$dex = $row['dex_rating'];
$agi = $row['agi_rating'];
$int = $row['int_rating'];

if ($row['nation'] == 'Alerian Federation')
	$statcolor = '#0000CC';
elseif ($row['nation'] ==  'Gran Eszak Empire')
	$statcolor = '#CC0000';
else
	$statcolor = '#00CC00';

if ($hp == 'A')
	$hp = '8,2';
elseif ($hp == 'B')
	$hp = '8,3';
elseif ($hp == 'C')
	$hp = '8,4';
elseif ($hp == 'D')
	$hp = '8,5';
elseif ($hp == 'E')
	$hp = '8,6';

if ($sp == 'A')
	$sp = ' 14,5';
elseif ($sp == 'B')
	$sp = ' 13,5.5';
elseif ($sp == 'C')
	$sp = ' 12,6';
elseif ($sp == 'D')
	$sp = ' 11,6.5';
elseif ($sp == 'E')
	$sp = ' 10,7';

if ($str == 'A')
	$str = ' 14,11';
elseif ($str == 'B')
	$str = ' 13,10.5';
elseif ($str == 'C')
	$str = ' 12,10';
elseif ($str == 'D')
	$str = ' 11,9.5';
elseif ($str == 'E')
	$str = ' 10,9';

if ($dex == 'A')
	$dex = ' 8,14';
elseif ($dex == 'B')
	$dex = ' 8,13';
elseif ($dex == 'C')
	$dex = ' 8,12';
elseif ($dex == 'D')
	$dex = ' 8,11';
elseif ($dex == 'E')
	$dex = ' 8,10';
elseif ($dex == 'S')
	$dex = ' 8,15';

if ($agi == 'A')
	$agi = ' 2,11';
elseif ($agi == 'B')
	$agi = ' 3,10.5';
elseif ($agi == 'C')
	$agi = ' 4,10';
elseif ($agi == 'D')
	$agi = ' 5,9.5';
elseif ($agi == 'E')
	$agi = ' 6,9';

if ($int == 'A')
	$int = ' 2,5';
elseif ($int == 'B')
	$int = ' 3,5.5';
elseif ($int == 'C')
	$int = ' 4,6';
elseif ($int == 'D')
	$int = ' 5,6.5';
elseif ($int == 'E')
	$int = ' 6,7';

echo '<div class="row" id="character-modal-secondrow">';
	echo '<div id="svgcol">';
	echo '<div id="character-modal-backing-hex">';
	echo '<svg xmlns="http://www.w3.org/2000/svg"
    xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="none" style="width:100%; height:100%" viewBox="0 0 16 16">

	<text x="8" y="1.5" font-size="0.9" stroke="black" stroke-width="0.01" text-anchor="middle" fill="black">HP</text>

	<text x="15" y="4.7" font-size="0.9" stroke="black" stroke-width="0.01" text-anchor="middle" fill="black">SP</text>

	<text x="15" y="11.5" font-size="0.9" stroke="black" stroke-width="0.01" text-anchor="middle" fill="black">STR</text>

	<text x="8" y="15" font-size="0.9" stroke="black" stroke-width="0.01" text-anchor="middle" fill="black">DEX</text>

	<text x="0.8" y="11.5" font-size="0.9" stroke="black" stroke-width="0.01" text-anchor="middle" fill="black">AGI</text>

	<text x="0.8" y="4.7" font-size="0.9" stroke="black" stroke-width="0.01" text-anchor="middle" fill="black">INT</text>

    <polygon points="8,2 14,5 
  					14,11 8,14
                   2,11 2,5"
		style="stroke:#777777; fill:none; stroke-width: 0.07"/>

	<polygon points="8,3 13,5.5 
  					13,10.5 8,13
                   3,10.5 3,5.5"
		style="stroke:#777777; fill:none; stroke-width: 0.07"/>

	<polygon points="8,4 12,6 
  					12,10 8,12
                   4,10 4,6"
		style="stroke:#777777; fill:none; stroke-width: 0.07"/>

	<polygon points="8,5 11,6.5 
  					11,9.5 8,11
                   5,9.5 5,6.5"
		style="stroke:#777777; fill:none; stroke-width: 0.07"/>

	<polygon points="8,6 10,7 
  					10,9 8,10
                   6,9 6,7"
		style="stroke:#777777; fill:none; stroke-width: 0.07"/>

	<polygon points="8,7 9,7.5 
  					9,8.5 8,9
                   7,8.5 7,7.5"
		style="stroke:#777777; fill:none; stroke-width: 0.07"/>

	<line x1="8" x2="8" y1="2" y2="14" style="stroke:#777777; fill:none; stroke-width: 0.07"/>

	<line x1="2" x2="14" y1="5" y2="11" style="stroke:#777777; fill:none; stroke-width: 0.07"/>

	<line x1="2" x2="14" y1="11" y2="5" style="stroke:#777777; fill:none; stroke-width: 0.07"/>';

	echo '<polygon points="8,8 8,8 8,8 8,8 8,8 8,8" style="stroke:#333333; fill:',$statcolor,'; opacity: 0.5; stroke-width: 0.1">';
	echo '<animate id="animation" attributeName="points" attributeType="XML" to="',$hp,$sp,$str,$dex,$agi,$int,'" 
			begin="0.1s" calcMode="spline" keyTimes="0;.9" keySplines=".42 0 .9 .9" dur=".9s" fill="freeze" /></polygon>';
	echo '</svg>';
	echo '</div>';
	echo '</div>';
echo '</div>';

echo '<div class="row" id="character-modal-thirdrow">';
echo $row['description'];
echo '</div>';

echo '</div>';



mysqli_free_result($result);

?>