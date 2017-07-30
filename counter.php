<?php

$catatan = "counter.txt";
$buka_file = fopen($catatan,'r+');
$counter = fread($buka_file, filesize($catatan));
	fclose($buka_file);

$counter++;
$tulis = fopen($catatan,'w');
fputs($tulis, $counter);
	fclose($tulis);


?>