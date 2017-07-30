<?php
include "../../koneksi.php";

$id_kategori = mysqli_real_escape_string($koneksi, trim(addslashes($_REQUEST['id_kategori'])));
$getnama = mysqli_real_escape_string($koneksi, trim(addslashes($_REQUEST['getnama'])));
$nm_kategori = mysqli_real_escape_string($koneksi, trim(addslashes($_REQUEST['nm_kategori'])));
$deskripsi = mysqli_real_escape_string($koneksi, trim(addslashes($_REQUEST['deskripsi'])));

	$update = "UPDATE kategori SET nm_kategori='$nm_kategori', deskripsi='$deskripsi' WHERE id_kategori='$id_kategori'";
	$sql = mysqli_query($koneksi, $update);
	$namalama = "../../../images/artikel/".$getnama;
	$namabaru = "../../../images/artikel/".$nm_kategori;
	$rename = rename($namalama, $namabaru);
	

if($sql) header('Location:../../home.php?menu=kategori');
else echo "Gagal Update!";


?>