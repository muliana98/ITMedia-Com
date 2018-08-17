<?php
include "koneksi.php";

$id = mysqli_real_escape_string($koneksi, trim($_GET['id']));

if(isset($_POST['input'])) {
	
	$id = mysqli_real_escape_string($koneksi, trim($_REQUEST['id']));
	$garam = "ITMedia20012015_garam1998biar_MANTAPgan";


	$password_lama = mysqli_real_escape_string($koneksi, trim($_POST['password_lama']));
	$password_baru = mysqli_real_escape_string($koneksi, trim(addslashes($_POST['password_baru'])));
	$konfirmasi_password = mysqli_real_escape_string($koneksi, trim(addslashes($_POST['konfirmasi_password'])));
	
	$cek_akun = "SELECT * FROM admin WHERE id='$id'";
	$hasil = mysqli_query($koneksi, $cek_akun);
	$data = mysqli_fetch_array($hasil);
	
		
		
	if(mysqli_real_escape_string($koneksi, trim(stripslashes($data['password']))) == hash("sha256", $password_lama.hash("sha256", $garam) )) {
		
		if($password_baru == $konfirmasi_password) {
			
			$password_baru_enkripsi = hash("sha256", $password_baru.hash("sha256", $garam));
	
			$update = "UPDATE admin SET password='$password_baru_enkripsi' WHERE id='$id'";
			$sql = mysqli_query($koneksi, $update);
		
		if($sql) 	echo "<div class='alert alert-info'>
						<a href='home.php?menu=profil' class='close' data-dismiss='alert'>&times;</a>
							<strong><i class='icon icon-ok-circle'></i> Pembaruan Password Berhasil!</strong>
					</div> ";
					
		else 		echo "<div class='alert alert-danger'>
						<button type='button' class='close' data-dismiss='alert'>&times;</button>
							<strong><i class='icon icon-info-sign'></i> Pembaruan Password Gagal!</strong>
					</div> ";
		
		
		
	}
	else echo "<div class='alert alert-danger'>
					<button type='button' class='close' data-dismiss='alert'>&times;</button>
						<strong><i class='icon icon-info-sign'></i> Password Baru Anda tidak sama!</strong>
				</div> ";
	
}
else echo "<div class='alert alert-danger'>
				<button type='button' class='close' data-dismiss='alert'>&times;</button>
						<strong><i class='icon icon-info-sign'></i> Password Lama Anda salah!</strong>
			</div> ";


}

?>

<div class="row">
	<div class="span9">
		<h4 class="text-info"><i class="icon icon-edit"></i> Perbarui Password Akun</h4>
			<form method="post" name="input" action="" class="orange">
				<input type="hidden" name="id" value="<?php echo $id; ?>" />	
					<table class="table table-striped">
						<tr>
								<td>Password Lama</td>
								<td>:</td>
								<td><input type="password" name="password_lama" class="input-xlarge" maxlength="30"></td>
								</tr>
						<tr>
								<td>Password Baru</td>
								<td>:</td>
								<td><input type="password" name="password_baru" class="input-xlarge" maxlength="30"></td>
								</tr>
						<tr>
								<td>Konfirmasi Password Baru</td>
								<td>:</td>
								<td><input type="password" name="konfirmasi_password" class="input-xlarge" maxlength="30"></td>
								</tr>

						<tr>
								<td></td>
								<td colspan="2">
								<input type="submit" name="input" class="btn btn-success" value="Update Password">
								<a href="home.php?menu=profil" class="btn btn-warning">Batal</a>
								</td>
								</tr>
								
				</table>
			</form>
		</div>
</div>
