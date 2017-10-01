<?php
include("koneksi.php");
$id_nya = mysqli_real_escape_string($koneksi, trim($_GET['id']));

$garam = "ITMedia20012015_garam1998biar_MANTAPgan";


$seleksi = mysqli_query($koneksi, "SELECT * FROM admin WHERE id='$id_nya'");
$data = mysqli_fetch_array($seleksi);
	$id = mysqli_real_escape_string($koneksi, trim($data['id']));
	$email = mysqli_real_escape_string($koneksi, trim($data['email']));
	

	
if(isset($_POST['input'])) {
	
	
	$id_nya = mysqli_real_escape_string($koneksi, trim($_REQUEST['id']));
	
	$email = mysqli_real_escape_string($koneksi, trim($_POST['email']));
	$password = mysqli_real_escape_string($koneksi, trim(hash("sha256", $_POST['password'].hash("sha256", $garam)  )));
	
	$seleksi_2 = mysqli_query($koneksi, "SELECT * FROM admin WHERE id='$id_nya'");
	$data_2 = mysqli_fetch_array($seleksi_2);
		$password_database = mysqli_real_escape_string($koneksi, trim(stripslashes($data_2['password'])));
		
		
		

	if(empty($email)) {
		
		echo "<div class='alert alert-danger'>
						<button type='button' class='close' data-dismiss='alert'>&times;</button>
							<strong><i class='icon icon-info-sign'></i> Form E-Mail belum diisi. Silakan isi...</strong>
					</div> ";
		
	}

	else {
		
		if($password_database == $password) {
			
			$update = mysqli_query($koneksi, "UPDATE admin SET email='$email' WHERE id='$id_nya'");
				
				if($update) header('location: home.php?menu=profil');
				
						else 		echo "<div class='alert alert-danger'>
								<button type='button' class='close' data-dismiss='alert'>&times;</button>
									<strong><i class='icon icon-info-sign'></i> Pembaruan E-Mail Gagal!</strong>
							</div> ";
						
			
		}
			else 		echo "<div class='alert alert-danger'>
							<button type='button' class='close' data-dismiss='alert'>&times;</button>
								<strong><i class='icon icon-info-sign'></i> Password Anda salah!</strong>
						</div> ";
						
					
	}
	
	
}



?>



<div class="container">
	<h4 class="text-info"><i class="icon icon-edit"></i> Perbarui E-Mail</h4>
		<form method="post" name="input" action="" class="orange">
			<input type="hidden" name="id" value="<?php echo $id; ?>" />	
				<table class="table table-striped">
					<tr>
							<td>E-Mail</td>
							<td>:</td>
							<td><input type="text" name="email" class="input-xlarge" value="<?php echo $email; ?>"></td>
							</tr>
					<tr>
							<td colspan="3"></td>
							</tr>
					<tr>
							<td>Password<br />  </td>
							<td>:</td>
							<td><input type="password" name="password" class="input-xlarge"><br />
								<code>&lt; Masukkan Password Untuk Konfirmasi Perubahan "E-Mail" &gt;</code></td>
							</tr>

					<tr>
							<td></td>
							<td colspan="2">
							<input type="submit" name="input" class="btn btn-success" value="Perbarui E-Mail">
							<a href="home.php?menu=profil-update&&id=<?php echo $id_nya; ?>" class="btn btn-warning">Batal</a>
							</td>
							</tr>
							
			</table>
		</form>
	</div>
