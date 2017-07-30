<?php

$nama_admin = $_POST['nama_admin_itmedia'];
$to = $_POST['email'];
$subjek = $_POST['subjek_itmedia'];
$pesan = $_POST['pesan_itmedia'];

$headers = "";
$headers .= 'From : <itmedia.computer15@gmail.com>'."\r\n";
@mail($headers, $to, $subjek, $pesan);
if(@mail) {
	
	echo "<script>alert('Terkirim')</script>";
	echo "<script>window.history.back()</script>";
	
}
else {
	
	echo "<script>alert('Gagal Mengirim..')</script>";
	echo "<script>window.history.back()</script>";
	
}


?>