<?php
include "../../koneksi.php";

$id_tentang = mysqli_real_escape_string($koneksi, trim($_REQUEST['id_tentang']));

$select = "SELECT * FROM tentang WHERE id_tentang='$id_tentang'";
$qselect = mysqli_query($koneksi, $select);
$r = mysqli_fetch_array($qselect);
	$gambar_seleksi = mysqli_real_escape_string($koneksi, stripslashes($r['gambar']));

	$gambar = "../../../images/logo/".$gambar_seleksi;
		if(file_exists($gambar)) {
			unlink($gambar);
		}

$query = "DELETE FROM tentang WHERE id_tentang='$id_tentang'";
$sql = mysqli_query($koneksi, $query);
$sAll = "SELECT * FROM tentang ORDER BY id_tentang";
$sqlAll = mysqli_query($koneksi, $sAll);
$i = 1;

while($rAll = mysqli_fetch_array($sqlAll)) {
	
	$id = mysqli_real_escape_string($koneksi, $rAll['id_tentang']);
	$updateId = "UPDATE tentang SET id_tentang='$i' WHERE id_tentang='$id'";
	$sqlUpdateId = mysqli_query($koneksi, $updateId);
	$i++;
		
}
$alter = "ALTER TABLE tentang AUTO_INCREMENT=$i";
$sqlAlter = mysqli_query($koneksi, $alter);

header('Location:../../home.php?menu=tentang');

?>