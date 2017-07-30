<?php
include "../../koneksi.php";

$id_kategori = mysqli_real_escape_string($koneksi, trim($_REQUEST['id_kategori']));

$select = "SELECT nm_kategori FROM kategori WHERE id_kategori='$id_kategori'";
$qselect = mysqli_query($koneksi, $select);
$r = mysqli_fetch_array($qselect);
$folder = mysqli_real_escape_string($koneksi, $r['nm_kategori']);
$folder = "../../../images/artikel/".$folder;
$makefolder = rmdir($folder);

$query = "DELETE FROM kategori WHERE id_kategori='$id_kategori'";
$sql = mysqli_query($koneksi, $query);

$sAll = "SELECT * FROM kategori ORDER BY id_kategori";
$sqlAll = mysqli_query($koneksi, $sAll);
$i = 1;
while($rAll = mysqli_fetch_array($sqlAll)) {
	
	$id = mysqli_real_escape_string($koneksi, trim($rAll['id_kategori']));
	$updateId = "UPDATE kategori SET id_kategori='$i' WHERE id_kategori='$id'";
	$sqlUpdateId = mysqli_query($koneksi, $updateId);
	$i++;
	
}
$alter = "ALTER TABLE kategori AUTO_INCREMENT=$i";
$sqlAlter = mysqli_query($koneksi, $alter);

header('Location:../../home.php?menu=kategori');

?>