<?php
include "link.php";
require("koneksi.php");

?>

<?php
session_start();

if(isset($_SESSION['admin'])) {
	
	$id_akun = mysqli_real_escape_string($koneksi, trim($_SESSION['admin']));
	
	$aktifitas_2 = "offline";
	$update = mysqli_query($koneksi, "UPDATE admin SET status='$aktifitas_2' WHERE id='$id_akun'");
	
	unset($_SESSION);
	session_destroy();

header("location: index.php");

}

	else if(isset($_SESSION['moderator'])) {
		
		unset($_SESSION);
		session_destroy();
		
		echo "<script>alert('Berhasil Logout!')</script>";
		echo "<meta http-equiv='refresh' content='0.7 url=index.php'>";
		
		
	}
	
	
?>