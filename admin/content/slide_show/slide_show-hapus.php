<?php
include "../../koneksi.php";

$id = mysqli_real_escape_string($koneksi, trim($_REQUEST['id']));

$select = "SELECT gambar FROM slide_show WHERE id='$id'";
$qselect = mysqli_query($koneksi, $select);
$r = mysqli_fetch_array($qselect);
	$gambar_seleksi = mysqli_real_escape_string($koneksi, stripslashes($r['gambar']));

$gambar = "../../../images/slide_show/".$gambar_seleksi;
if(file_exists($gambar)) {
	unlink($gambar);
}

$query = "DELETE FROM slide_show WHERE id='$id'";
$sql = mysqli_query($koneksi, $query);

$sAll = "SELECT * FROM slide_show ORDER BY id";
$sqlAll = mysqli_query($koneksi, $sAll);
$i = 1;

while($rAll = mysqli_fetch_array($sqlAll)) {
	
	$id = mysqli_real_escape_string($koneksi, trim($rAll['id']));
	$updateId = "UPDATE slide_show SET id='$i' WHERE id='$id'";
	$sqlUpdateId = mysqli_query($koneksi, $updateId);
	$i++;
	
}

$alter = "ALTER TABLE slide_show AUTO_INCREMENT=$i";
$sqlAlter = mysqli_query($koneksi, $alter);

header('Location:../../home.php?menu=slide_show');

?>