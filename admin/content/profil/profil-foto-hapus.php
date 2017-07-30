<?php
include "../../koneksi.php";

$id = mysqli_real_escape_string($koneksi, trim($_REQUEST['id']));

$select = "SELECT foto_profil FROM admin WHERE id='$id'";

$qselect = mysqli_query($koneksi, $select);
$r = mysqli_fetch_array($qselect);
$foto_profil = mysqli_real_escape_string($koneksi, trim(stripslashes($r['foto_profil'])));
$gambar = "../../../images/profil/".$r['foto_profil'];
if(file_exists($gambar)) {
	
	unlink($gambar);
	
}

$query = "UPDATE admin SET foto_profil='' WHERE id='$id'";
$sql = mysqli_query($koneksi, $query);


if($sql) header('Location:../../home.php?menu=profil');
else echo "<script>alert('Gagal menghapus Foto Profil!')</script>
			<meta http-equiv='refresh' content='0.7 url=../../home.php?menu=profil'>";


?>