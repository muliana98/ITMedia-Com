<?php
include "../../koneksi.php";

$gambar_semula = mysqli_real_escape_string($koneksi, trim(addslashes(@$_GET['gambar'])));

$id_tentang = mysqli_real_escape_string($koneksi, trim(addslashes($_REQUEST['id_tentang'])));
$getnama = mysqli_real_escape_string($koneksi, trim(addslashes($_REQUEST['getnama'])));
$nm_tentang = mysqli_real_escape_string($koneksi, trim(addslashes($_REQUEST['nm_tentang'])));
$link = mysqli_real_escape_string($koneksi, trim(addslashes($_REQUEST['link'])));
$ket = mysqli_real_escape_string($koneksi, trim(addslashes($_REQUEST['ket'])));

$gambar_seleksi = mysqli_real_escape_string($koneksi, trim(stripslashes($_REQUEST['ambil_gambar'])));
$gambar_hapus = "../../../images/logo/".$gambar_seleksi;


	$sumber = $_FILES['gambar']['tmp_name'];
	$tujuan = "../../../images/logo/".$_FILES['gambar']['name'];
	$tujuan1 = "../../../images/logo/".$_FILES['gambar']['name'];
	
	$gambar = mysqli_real_escape_string($koneksi, trim(addslashes($_FILES['gambar']['name'])));
	move_uploaded_file($sumber, $tujuan);

	
	if($gambar_semula == $gambar) {
		
		$update = "UPDATE tentang SET nm_tentang='$nm_tentang', link='$link', ket='$ket' WHERE id_tentang='$id_tentang'";
		$sql = mysqli_query($koneksi, $update);
		
		if($sql) header('location: ../../home.php?menu=tentang');
		else echo "Gagal Update <script>window.history.back()</script>";
		
	}
	
	else {
		
		if(file_exists($gambar_hapus)) {
			unlink($gambar_hapus);
		}
			
		$update = "UPDATE tentang SET nm_tentang='$nm_tentang', link='$link', ket='$ket', gambar='$gambar' WHERE id_tentang='$id_tentang'";
		$sql = mysqli_query($koneksi, $update);
		
		if($sql) header('Location:../../home.php?menu=tentang');
		else echo "Gagal Update<script>window.history.back()</script>";


	}
	
?>