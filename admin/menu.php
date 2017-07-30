<?php
require("koneksi.php");
$ket_hak_akses = "admin";

$id_akun = mysqli_real_escape_string($koneksi, trim($_SESSION['admin']));
$seleksi = mysqli_query($koneksi, "SELECT * FROM admin WHERE id='$id_akun'");
$data = mysqli_fetch_array($seleksi);
	$id = mysqli_real_escape_string($koneksi, trim($data['id']));
	$ket = mysqli_real_escape_string($koneksi, trim($data['ket']));
	
echo "
<ul class='nav nav-list bs-docs-sidenav affix-top'>
	<li><a href='home.php?menu=home'><i class='icon icon-home'></i> <i class='icon icon-chevron-right'></i> Home</a></li>
	<li><a href='home.php?menu=profil'><i class='icon icon-user'></i> <i class='icon icon-chevron-right'></i> Profil</a></li>
	<li><a href=''><i class='icon icon-comment'></i> Pesan Chat</a></li>
";

if(($ket_hak_akses == $ket) ) {
	
	echo "	<li><a href='home.php?menu=admin'><i class='icon icon-pencil'></i> <i class='icon icon-chevron-right'></i> Data Anggota</a></li>";
	
} 


echo "
	<li><a href='home.php?menu=slide_show'><i class='icon-picture'></i> <i class='icon icon-chevron-right'></i> Slide Show</a></li>
	<li><a href='home.php?menu=artikel'><i class='icon icon-file'></i> <i class='icon icon-chevron-right'></i> Artikel</a></li>
	<li><a href='home.php?menu=kategori'><i class='icon icon-tags'></i> <i class='icon icon-chevron-right'></i> Kategori</a></li>
	<li><a href='home.php?menu=kontak'><i class='icon icon-book'></i> <i class='icon icon-chevron-right'></i> Kontak</a></li>
	<li><a href='home.php?menu=bukutamu'><i class='icon icon-inbox'></i> <i class='icon icon-chevron-right'></i> Buku Tamu</a></li>
	<li><a href='home.php?menu=tentang'><i class='icon icon-info-sign'></i> <i class='icon icon-chevron-right'></i> Tentang</a></li>
	<li><a href='home.php?menu=lainnya'><i class='icon icon-list-alt'></i> <i class='icon icon-chevron-right'></i> Menu Lainnya </a></li>

";


?>


	<li><a href="logout.php" onclick="return confirm('Anda yakin ingin Logout?')"><i class="icon icon-off"></i> <i class="icon icon-chevron-right"></i> Logout</a></li>
</ul>


