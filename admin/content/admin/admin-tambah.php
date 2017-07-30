<?php
include "koneksi.php";
if(isset($_POST['input'])) {
	
	$garam = "ITMedia20012015_garam1998biar_MANTAPgan";
	
	$username = mysqli_real_escape_string($koneksi, trim(addslashes(strip_tags($_POST['username']))));
	$nama_lengkap = mysqli_real_escape_string($koneksi, trim(ucwords($_POST['nama_lengkap'])));
	$email = mysqli_real_escape_string($koneksi, trim(addslashes(strip_tags($_POST['email']))));
	$password = mysqli_real_escape_string($koneksi, trim(addslashes(strip_tags(hash("sha256", $_POST['password'].hash("sha256", $garam) )))));
	$ket = mysqli_real_escape_string($koneksi, trim(addslashes(strip_tags($_POST['ket']))));
	
	if(empty($username) && empty($nama_lengkap) && empty($email) && empty($password) && empty($ket) ) {
		
		echo "<div class='alert'>
					<button type='button' class='close' data-dismiss='alert'>&times;</button>
					<strong><i class='icon icon-info-sign'></i> Anda mengosongkan SEMUA Form. Silakan diisi...</strong>
				</div>
		";
		
	}
	
	else if(empty($username) && empty($nama_lengkap) && empty($email) && empty($password) ) {
		
		echo "<div class='alert'>
					<button type='button' class='close' data-dismiss='alert'>&times;</button>
					<strong><i class='icon icon-info-sign'></i> Username, Nama Lengkap, E-Mail, dan Password belum diisi. Silakan diisi...</strong>
				</div>
		";
		
	}
	
	
	
	else {
	
	$selectuser = "SELECT username FROM admin WHERE username='$username'";
	$sqluser = mysqli_query($koneksi, $selectuser);
	$cek = mysqli_num_rows($sqluser);
	
		if($cek==0) {
			
			$insertquery = "INSERT INTO admin VALUES ('', '$username', '$email', '$nama_lengkap', '$password', '$ket', '', '')";
			$sql = mysqli_query($koneksi, $insertquery);
			
				if($sql) {
					
					echo "<h4><font color='blue'>Data berhasil ditambahkan</font></h4>";
					
				} 
				else {
					
					echo "<h4><font color='blue'>Data gagal ditambah!</font></h4>";
					
				}

		}		
		else {
				
				echo "<h5>Maaf, username tidak tersedia. Silakan gunakan username lainnya</h5>";
				
			}
		
		}
		
	}

?>

<div class="container">
	<a href="home.php?menu=admin" class="btn btn-success"><i class="icon icon-chevron-left"></i> Lihat Data</a>
	<hr />
		<h4 class="text-info"><i class="icon icon-pencil"></i> Input Data Anggota</h4>
			<form method="post" action="" name="input" class="orange">
				<table class="table table-striped">
					<tr>
							<td>Username</td>
							<td>:</td>
							<td><input type="text" name="username" class="input-xlarge" maxlength="30"></td>
							</tr>
					<tr>
							<td>Nama Lengkap</td>
							<td>:</td>
							<td><input type="text" name="nama_lengkap" class="input-xlarge" maxlength="45"></td>
							</tr>
					<tr>
							<td>E-Mail</td>
							<td>:</td>
							<td><input type="text" name="email" class="input-xlarge" maxlength="40"></td>
							</tr>
					<tr>
							<td>Password</td>
							<td>:</td>
							<td><input type="password" name="password" class="input-xlarge" maxlength="30"></td>
							</tr>
					<tr>
							<td>Keterangan</td>
							<td>:</td>
							<td>
								<select class="input-xlarge" name="ket">
								<option value="admin">Admin</option>
								<option value="moderator">Moderator</option>
								<option value="user">User</option>
								</select>
							</td></tr>
					<tr>
							<td></td>
							<td colspan="2"><input type="submit" name="input" class="btn btn-success" value="Tambahkan Data">
							<a class="btn btn-warning" href="home.php?menu=admin">Batal</a>
							</tr>
					</table>
			</form>
		</div>
							
							
								
	
	
	
	







	
	
	
	
	
	
	
	