<?php
include "../../koneksi.php";
	
	$gambar_semula = mysqli_real_escape_string($koneksi, trim(addslashes(@$_GET['ambil_gambar'])));

	$id = mysqli_real_escape_string($koneksi, trim(addslashes(strip_tags($_POST['id']))));
	$judul = mysqli_real_escape_string($koneksi, trim(addslashes(strip_tags($_POST['judul']))));
	$deskripsi = mysqli_real_escape_string($koneksi, trim(addslashes(strip_tags(stripslashes($_POST['deskripsi'])))));
	
		$gambar_seleksi = mysqli_real_escape_string($koneksi, trim(stripslashes($_REQUEST['ambil_gambar'])));
		$gambar_hapus = "../../../images/slide_show/".$gambar_seleksi;

	
	$sumber = $_FILES['gambar']['tmp_name'];
	$tujuan = "../../../images/slide_show/".$_FILES['gambar']['name'];
	$tujuan1 = "../../../images/slide_show/".$_FILES['gambar']['name'];
	
	$gambar = mysqli_real_escape_string($koneksi, trim(addslashes($_FILES['gambar']['name'])));
	move_uploaded_file($sumber, $tujuan);
	
	
	if($gambar_semula == $gambar) {
		
		$update = "UPDATE slide_show SET judul='$judul', deskripsi='$deskripsi' WHERE id='$id'";
		$sql = mysqli_query($koneksi, $update);
		if($sql) header('location: ../../home.php?menu=slide_show');
		else echo "Upload Gagal";
		
	}
	else {
		
		if(file_exists($gambar_hapus)) {
			unlink($gambar_hapus);
		}
			
			$update = "UPDATE slide_show SET judul='$judul', deskripsi='$deskripsi', gambar='$gambar' WHERE id='$id'";
			$sql = mysqli_query($koneksi, $update);
			if($sql) header('Location:../../home.php?menu=slide_show');
			else echo "Upload Gagal";


	}
	
	
?>