<?php
include "../../koneksi.php";
	
	$garam = "ITMedia20012015_garam1998biar_MANTAPgan";

	$id = mysqli_real_escape_string($koneksi, trim($_REQUEST['id']));
	$username = mysqli_real_escape_string($koneksi, trim(addslashes($_REQUEST['username'])));
	$email = mysqli_real_escape_string($koneksi, trim(addslashes($_REQUEST['email'])));
	$nama_lengkap = mysqli_real_escape_string($koneksi, trim(ucwords($_REQUEST['nama_lengkap'])));
	$password = mysqli_real_escape_string($koneksi, trim(addslashes(hash("sha256", $_REQUEST['password'].hash("sha256", $garam) ))));
	$ket = mysqli_real_escape_string($koneksi, trim(addslashes($_REQUEST['ket'])));
	
		$update = "UPDATE admin SET username='$username', email='$email', nama_lengkap='$nama_lengkap', password='$password', ket='$ket' WHERE id='$id'";
		$sql = mysqli_query($koneksi, $update);
		if($sql) header('Location:../../home.php?menu=admin');
		else echo "Update Gagal!";


?>

