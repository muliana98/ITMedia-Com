<?php
include "../../koneksi.php";
if(isset($_POST['input'])) {
	
	$gambar_semula = mysqli_real_escape_string($koneksi, trim(stripslashes(@$_GET['gambar'])));
	
	
	$id_artikel = mysqli_real_escape_string($koneksi, trim($_REQUEST['id_artikel']));
	//$id_kategori = $_REQUEST['kategori'];
	$judul = mysqli_real_escape_string($koneksi, trim(addslashes(strip_tags($_REQUEST['judul']))));
	$kategori = mysqli_real_escape_string($koneksi, trim(addslashes(strip_tags($_REQUEST['kategori']))));
	
	$headline = mysqli_real_escape_string($koneksi, trim(addslashes($_REQUEST['headline'])));
	$isi = mysqli_real_escape_string($koneksi, trim(addslashes($_REQUEST['isi'])));
	$pengirim_diubah = mysqli_real_escape_string($koneksi, trim(addslashes(strip_tags($_REQUEST['pengirim_diubah']))));
	$gambar = mysqli_real_escape_string($koneksi, trim(addslashes(strip_tags($_REQUEST['gambar']))));
	
		$getgambar = mysqli_real_escape_string($koneksi, trim(stripslashes($_REQUEST['getgambar'])));
		$getgambar1 = "../../../".$getgambar;

	
	$getnm = "SELECT nm_kategori FROM kategori WHERE id_kategori='$kategori'";
	$sqlgetnm = mysqli_query($koneksi, $getnm);
	$rgetnm = mysqli_fetch_array($sqlgetnm);
	
	$nm = mysqli_real_escape_string($koneksi, trim($rgetnm['nm_kategori']));
	
	//$nm_kategori = addslashes(strip_tags($_POST['nm_kategori']));

	//if(isset($_FILES['gambar'])) {
	$sumber = $_FILES['gambar']['tmp_name'];
	$tujuan = "../../../images/artikel/".$nm."/".$_FILES['gambar']['name'];
	$tujuan1 = "/images/artikel/".$nm."/".$_FILES['gambar']['name'];
	
	$gambar = mysqli_real_escape_string($koneksi, trim(addslashes($_FILES['gambar']['name'])));
	move_uploaded_file($sumber, $tujuan);
	
	
	if($gambar_semula == $gambar) {
		
		$update = "UPDATE artikel SET id_kategori='$kategori', judul='$judul', headline='$headline', isi='$isi', pengirim_diubah='$pengirim_diubah', tanggal_diubah=now() WHERE id_artikel='$id_artikel' ";
		$sql = mysqli_query($koneksi, $update);
		if($sql) header('Location:../../home.php?menu=artikel');
		else echo "Gagal Update!";
		
	}
	
	else {
		
		if(file_exists($getgambar1)) {
			
			unlink($getgambar1);
			
		}
		
		$update = "UPDATE artikel SET id_kategori='$kategori', judul='$judul', headline='$headline', isi='$isi', pengirim='$pengirim', tanggal_diubah=now(), gambar='$tujuan1' WHERE id_artikel='$id_artikel' ";
		$sql = mysqli_query($koneksi, $update);
		if($sql) header('Location:../../home.php?menu=artikel');
		else echo "Gagal Update!";
	
	}
	
}


?>











