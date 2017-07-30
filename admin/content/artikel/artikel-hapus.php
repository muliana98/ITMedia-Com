<?php
include "../../koneksi.php";

$id_artikel = mysqli_real_escape_string($koneksi, trim($_REQUEST['id_artikel']));

$select = "SELECT gambar FROM artikel WHERE id_artikel='$id_artikel'";

$qselect = mysqli_query($koneksi, $select);
$r = mysqli_fetch_array($qselect);
	$gambar_seleksi = mysqli_real_escape_string($koneksi, stripslashes($r['gambar']));

$gambar = "../../../".$gambar_seleksi;
if(file_exists($gambar)) {
	
	unlink($gambar);
	
}

$query = "DELETE FROM artikel WHERE id_artikel='$id_artikel'";
$sql = mysqli_query($koneksi, $query);

$sAll = "SELECT * FROM artikel ORDER BY id_artikel";
$sqlAll = mysqli_query($koneksi, $sAll);
$i = 1;

while($rAll = mysqli_fetch_array($sqlAll)) {
	
	$id = mysqli_real_escape_string($koneksi, trim($rAll['id_artikel']));
	$updateId = "UPDATE artikel SET id_artikel = '$i' WHERE id_artikel='$id'";
	$sqlUpdateId = mysqli_query($koneksi, $updateId);
	$i++;
	
}

$alter = "ALTER TABLE artikel AUTO_INCREMENT=$i";
$sqlAlter = mysqli_query($koneksi, $alter);

header('Location:../../home.php?menu=artikel');


?>