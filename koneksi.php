<?php

$nama_server = "localhost";
$user = "root";
$password = "";
$database = "nama_database_kalian";

$koneksi = mysqli_connect($nama_server, $user, $password, $database);

if(mysqli_connect_errno()) {
	
	echo "Koneksi ke Database Gagal".mysqli_connect_error;
	
} 

?>
