<?php

$nama_server = "localhost";
$user = "root";
$password = "hnMpZSdmec5VwtVL";
$database = "itmedia_db";

$koneksi = mysqli_connect($nama_server, $user, $password, $database);

if(mysqli_connect_errno()) {
	
	echo "Koneksi ke Database Gagal".mysqli_connect_error;
	
} 

?>