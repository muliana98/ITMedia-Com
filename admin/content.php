<?php
require("koneksi.php");
$ket_hak_akses = "admin";

$id_akun = mysqli_real_escape_string($koneksi, trim($_SESSION['admin']));
$seleksi_data = mysqli_query($koneksi, "SELECT * FROM admin WHERE id='$id_akun'");
$datanya = mysqli_fetch_array($seleksi_data);

	$ket = mysqli_real_escape_string($koneksi, trim($datanya['ket']));
	
	if($ket_hak_akses == $ket) {
		

?>

			<p>
			<img src="assets/picture/logo_itmedia_flat_400px.png" width="30%" height="30%"></p>
			<h4>Administrator - Dashboard ITMedia-Com</h4>
			<p>Halaman Dashboard ITMedia-Com</p>


<?php

    }
	else {
		

?>

			<p>
			<img src="assets/picture/logo_itmedia_flat_400px.png" width="30%" height="30%"></p>
			<h4>Moderator - Dashboard ITMedia-Com</h4>
			<p>Halaman Dashboard ITMedia-Com</p>

<?php
	}

?>
