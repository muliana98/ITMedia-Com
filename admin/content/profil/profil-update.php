<?php
include "koneksi.php";
$id = mysqli_real_escape_string($koneksi, trim($_GET['id']));

	$query = "SELECT * FROM admin WHERE id='$id'";
	$sql = mysqli_query($koneksi, $query);
	$hasil = mysqli_fetch_array($sql);
	
		$id = mysqli_real_escape_string($koneksi, trim($hasil['id']));
		$username = mysqli_real_escape_string($koneksi, trim($hasil['username']));
		$email = mysqli_real_escape_string($koneksi, trim($hasil['email']));
		$nama_lengkap = mysqli_real_escape_string($koneksi, trim($hasil['nama_lengkap']));
		$password = mysqli_real_escape_string($koneksi, trim(stripslashes(hash("sha256", $hasil['password']))));
		$ket = mysqli_real_escape_string($koneksi, trim(stripslashes(ucwords($hasil['ket']))));

?>

<div class="container">
	<h4 class="text-info"><i class="icon icon-edit"></i> Perbarui Data Profil</h4>
		<form method="post" name="input" action="content/profil/profil-update-p.php" class="orange">
			<input type="hidden" name="id" value="<?php echo $id; ?>" />	
				<table class="table table-striped">
					<tr>
							<td>Username</td>
							<td>:</td>
							<td><?php echo $username; ?>&nbsp; <a class="btn btn-danger" href="home.php?menu=profil-update-u&id=<?php echo $id; ?>">Ubah</a></td>
							</tr>
					<tr>
							<td>Nama Lengkap</td>
							<td>:</td>
							<td><input type="text" name="nama_lengkap" value="<?php echo $nama_lengkap; ?>" class="input-xlarge"></td>
							</tr>
					<tr>
							<td>E-Mail</td>
							<td>:</td>
							<td><?php echo $email; ?>&nbsp; <a class="btn btn-danger" href="home.php?menu=profil-update-e&id=<?php echo $id; ?>">Ubah</a></td>
							</tr>
					<tr>
							<td>Keterangan</td>
							<td>:</td>
							<td>
							<?php
		
								
									echo	"<b><i>$ket</i></b>";
								
							
							
							?>
								
							</td>
							</tr>
					<tr>
							<td></td>
							<td colspan="2">
							<input type="submit" name="input" class="btn btn-success" value="Update Data">
							<a href="home.php?menu=profil" class="btn btn-warning">Batal</a>
							</td>
							</tr>
							
			</table>
		</form>
	</div>