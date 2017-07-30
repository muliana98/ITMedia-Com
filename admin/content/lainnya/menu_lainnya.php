<?php
require("koneksi.php");
$ket_hak_akses = "admin";

$id_akun = mysqli_real_escape_string($koneksi, trim($_SESSION['admin']));
$seleksi = mysqli_query($koneksi, "SELECT * FROM admin WHERE id='$id_akun'");
$data = mysqli_fetch_array($seleksi);
	
	$id = mysqli_real_escape_string($koneksi, trim($data['id']));
	$ket = mysqli_real_escape_string($koneksi, trim($data['ket']));

echo "
<div class='container'>
	<div class='row'>
		<div class='span6'>
			<h5 style='border-bottom: 1px dashed #000000;'>Menu Lainnya <i class='icon icon-chevron-down'></i></h5>
					<ul class='nav nav-list bs-docs-sidenav affix-top'>

";


if(($id == "1") && ($ket_hak_akses == $ket) ) {
	
	echo "
						<li><a href='home.php?menu=reset_backup'><i class='icon icon-retweet'></i> <i class='icon icon-chevron-right'></i> Reset/Backup</a></li>
";
	
}




echo "					
						<li><a href='home.php?menu=status_aktif'><i class='icon icon-time'></i> <i class='icon icon-chevron-right'></i> Anggota Yang Online</a></li>

					</ul>
		</div>
	</div>
</div>
<br />

";


?>






