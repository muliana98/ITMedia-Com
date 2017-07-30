<?php
include "../../koneksi.php";


	$id = mysqli_real_escape_string($koneksi, trim($_REQUEST['id']));
	$nama_lengkap = mysqli_real_escape_string($koneksi, trim(ucwords($_REQUEST['nama_lengkap'])));
	$ket = mysqli_real_escape_string($koneksi, trim(addslashes($_REQUEST['ket'])));

	
	if($id == "1") {
		
		$update_1 = "UPDATE admin SET nama_lengkap='$nama_lengkap' WHERE id='$id'";
		$sql_1 = mysqli_query($koneksi, $update_1);
		if($sql_1) header('Location:../../home.php?menu=profil');
		else echo "Update Gagal!";
		
	}
	
	else {
	
		$update_2 = "UPDATE admin SET nama_lengkap='$nama_lengkap' WHERE id='$id'";
		$sql_2 = mysqli_query($koneksi, $update_2);
		if($sql_2) header('Location:../../home.php?menu=profil');
		else echo "Update Gagal!";
		
	}


?>

