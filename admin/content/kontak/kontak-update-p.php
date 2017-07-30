<?php
include "../../koneksi.php";

	$id = mysqli_real_escape_string($koneksi, trim(addslashes(strip_tags($_POST['id']))));
	$nama = mysqli_real_escape_string($koneksi, trim(addslashes(strip_tags($_POST['nama']))));
	$alamat = mysqli_real_escape_string($koneksi, trim(addslashes(strip_tags(stripslashes($_POST['alamat'])))));
	$jenis = mysqli_real_escape_string($koneksi, trim(addslashes(strip_tags(stripslashes($_POST['jenis'])))));
	$telp = mysqli_real_escape_string($koneksi, trim(addslashes(strip_tags(stripslashes($_POST['telp'])))));
	$email = mysqli_real_escape_string($koneksi, trim(addslashes(strip_tags(stripslashes($_POST['email'])))));
	$ket = mysqli_real_escape_string($koneksi, trim(addslashes(strip_tags(stripslashes($_POST['ket'])))));
	
	
	
		$update = "UPDATE kontak SET nama='$nama', alamat='$alamat', jenis='$jenis', telp='$telp', email='$email', ket='$ket' WHERE id='$id'";
		$sql = mysqli_query($koneksi, $update);
		
		if($sql) header('Location:../../home.php?menu=kontak');
		else echo "Gagal Update";


?>