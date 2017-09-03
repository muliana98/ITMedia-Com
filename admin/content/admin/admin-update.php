<?php
include "koneksi.php";

$ket_hak_akses = "admin";
	$id_akun = mysqli_real_escape_string($koneksi, trim($_SESSION['admin']));
	$seleksi_akun = mysqli_query($koneksi, "SELECT * FROM admin WHERE id='$id_akun'");
	$data_akunnya = mysqli_fetch_array($seleksi_akun);
	
		$id = mysqli_real_escape_string($koneksi, trim($data_akunnya['id']));
		$ket = mysqli_real_escape_string($koneksi, trim($data_akunnya['ket']));
		
			if(($ket_hak_akses == $ket)) {
				
				
			
?>

<?php			
			$id = mysqli_real_escape_string($koneksi, trim($_GET['id']));

				$query = "SELECT * FROM admin WHERE id='$id'";
				$sql = mysqli_query($koneksi, $query);
				$hasil = mysqli_fetch_array($sql);
				
					$id = mysqli_real_escape_string($koneksi, trim($hasil['id']));
					$username = mysqli_real_escape_string($koneksi, trim(stripslashes($hasil['username'])));
					$email = mysqli_real_escape_string($koneksi, trim(stripslashes($hasil['email'])));
					$nama_lengkap = mysqli_real_escape_string($koneksi, trim(stripslashes($hasil['nama_lengkap'])));
					$password = mysqli_real_escape_string($koneksi, trim(stripslashes(hash("sha256", $hasil['password']))));
					$ket = mysqli_real_escape_string($koneksi, trim(stripslashes(ucwords($hasil['ket']))));

?>

<div class="container">
	<h4 class="text-info"><i class="icon icon-edit"></i> Perbarui Data Anggota</h4>
		<form method="post" name="input" action="content/admin/admin-update-p.php" class="orange">
			<input type="hidden" name="id" value="<?php echo $id; ?>" />	
				<table class="table table-striped">
					<tr>
							<td>Username</td>
							<td>:</td>
							<td><input type="text" name="username" value="<?php echo $username; ?>" class="input-xlarge"></td>
							</tr>
					<tr>
							<td>Nama Lengkap</td>
							<td>:</td>
							<td><input type="text" name="nama_lengkap" value="<?php echo $nama_lengkap; ?>" class="input-xlarge"></td>
							</tr>
					<tr>
							<td>E-Mail</td>
							<td>:</td>
							<td><input type="text" name="email" value="<?php echo $email; ?>" class="input-xlarge"></td>
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
								<select name="ket" class="input-xlarge">
								<option value="admin">Admin</option>
								<option value="moderator">Moderator</option>
								<option value="user">User</option>
								</select><br />
								<span style="color: red;">Ket. awal : <b><i><?php echo $ket; ?></i></b></span>
							</td>
							</tr>
					<tr>
							<td></td>
							<td colspan="2">
							<input type="submit" name="input" class="btn btn-success" value="Update Data">
							<a href="home.php?menu=admin" class="btn btn-warning">Batal</a>
							</td>
							</tr>
							
			</table>
		</form>
	</div>



			
			<?php
			}
			else {
				
				echo "<h2>Halaman ini hanya diperuntukan untuk Administrator</h2>";
				
			}
			
			
			
						
			?>			


