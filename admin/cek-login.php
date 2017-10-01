<?php
session_start();
include "koneksi.php";
if(isset($_POST['login'])) {
	
	$garam = "ITMedia20012015_garam1998biar_MANTAPgan";

	$ket_hak_akses = "admin";
	$ket_hak_akses2 = "moderator";
	$user = mysqli_real_escape_string($koneksi, trim($_POST['user']));
	$pass = mysqli_real_escape_string($koneksi, trim(hash("sha256", $_POST['pass'].hash("sha256", $garam) )));
	
	
$query = "SELECT id, username, email, password, ket FROM admin WHERE username OR email='$user' AND password='$pass'";
$sql = mysqli_query($koneksi, $query);
$hasil = mysqli_fetch_array($sql);
$jumlah = mysqli_num_rows($sql);
	$id = mysqli_real_escape_string($koneksi, trim($hasil['id']));
	$email = mysqli_real_escape_string($koneksi, trim($hasil['email']));
	$username = mysqli_real_escape_string($koneksi, trim($hasil['username']));
	$password = mysqli_real_escape_string($koneksi, trim($hasil['password']));
	$ket = mysqli_real_escape_string($koneksi, trim($hasil['ket']));

	if(($user == $username OR $user == $email) && ($pass == $password) && ($ket == $ket_hak_akses or $ket_hak_akses2) && ($id > 0) && ($jumlah > 0)) {
		
		$_SESSION['admin'] = $id;		
			$status = "online";
			$indikasi_online = mysqli_query($koneksi, "UPDATE admin SET status='$status' WHERE id='$id'");
		
		header("location: home.php");

		
	}
	
	
	else {
		
		echo "<style>
		
		a {
			
			color: #0088cc;
			text-decoration: none;
			
		}
		
		a:hover,
		a:focus {
			
			color: #005580;
			text-decoration: underline;
			
		}
		
		</style>";
		
		echo "<div style='display: block; box-shadow: 2px 6px 15px 1px rgba(0, 0, 0, 0.3); border-radius: 6px; padding: 10px; margin-top: 30px;'>";
		echo "<h2 align='center' style='font-family: helvetica;'>Username atau Password salah!</h2>";
		echo "<h2 align='center' style='font-family: helvetica;'>Silakan Login kembali"." <a href='index.php'>disini</a></h2>";
		echo "</div>";
	}
	

}


?>
