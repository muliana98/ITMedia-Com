<?php
include "../../koneksi.php";

$id = mysqli_real_escape_string($koneksi, trim($_REQUEST['id']));

$query = "DELETE FROM bukutamu WHERE id='$id'";
$sql = mysqli_query($koneksi, $query);
$sAll = "SELECT * FROM bukutamu ORDER BY id";
$sqlAll = mysqli_query($koneksi, $sAll);
$i = 1;
while($rAll = mysqli_fetch_array($sqlAll)) {
	
	$id = mysqli_real_escape_string($koneksi, trim($rAll['id']));
	$updateId = "UPDATE bukutamu SET id='$i' WHERE id='$id'";
	$sqlUpdateId = mysqli_query($koneksi, $updateId);
	$i++;
	
}
$alter = "ALTER TABLE bukutamu AUTO_INCREMENT=$i";
$sqlAlter = mysqli_query($koneksi, $alter);

header('Location:../../home.php?menu=bukutamu');


?>