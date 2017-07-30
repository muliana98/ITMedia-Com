<?php
include "koneksi.php";
$id = mysqli_real_escape_string($koneksi, trim($_GET['id']));

	$select = "SELECT * FROM kontak WHERE id='$id'";
	$sql = mysqli_query($koneksi, $select);
	$hasil = mysqli_fetch_array($sql);
	
		$id = mysqli_real_escape_string($koneksi, trim($hasil['id']));
		$nama = mysqli_real_escape_string($koneksi, trim($hasil['nama']));
		$alamat = mysqli_real_escape_string($koneksi, trim(stripslashes($hasil['alamat'])));
		$jenis = mysqli_real_escape_string($koneksi, trim(stripslashes($hasil['jenis'])));
		$telp = mysqli_real_escape_string($koneksi, trim(stripslashes($hasil['telp'])));
		$email = mysqli_real_escape_string($koneksi, trim(stripslashes($hasil['email'])));
		$ket = mysqli_real_escape_string($koneksi, trim(stripslashes($hasil['ket'])));


?>

<div class="container">
	<h4 class="text-info"><i class="icon icon-edit"></i> Perbarui Data Kontak</h4>
		<form method="post" name="input" action="content/kontak/kontak-update-p.php">
			<input type="hidden" name="id" value="<?php echo $id; ?>" />
				<table class="table table-striped">	
					<tr>
							<td>Nama</td>
							<td>:</td>
							<td><input type="text" name="nama" class="input-xlarge" value="<?php echo $nama; ?>"></td>
							</tr>
					<tr>
							<td>Alamat</td>
							<td>:</td>
							<td><input type="text" name="alamat" class="input-xlarge" value="<?php echo $alamat; ?>"></td>
							</tr>
					<tr>
							<td>Jenis</td>
							<td>:</td>
							<td><input type="text" name="jenis" class="input-xlarge" value="<?php echo $jenis; ?>"></td>
							</tr>
					<tr>
							<td>Telp.</td>
							<td>:</td>
							<td><input type="text" name="telp" class="input-xlarge" value="<?php echo $telp; ?>"></td>
							</tr>
					<tr>
							<td>E-Mail</td>
							<td>:</td>
							<td><input type="text" name="email" class="input-xlarge" value="<?php echo $email; ?>"></td>
							</tr>
					<tr>
							<td>Ket.</td>
							<td>:</td>
							<td><textarea name="ket" class="input-xlarge"><?php echo $ket; ?></textarea></td>
							</tr>
					<tr>
							<td></td>
							<td colspan="2">
							<input type="submit" name="input" class="btn btn-success" value="Update Kontak" />
							<a class="btn btn-danger" href="home.php?menu=kontak">Batal</a>
							</td>
							</tr>
				</table>
			</form>
		</div>
					
							
							
							
							
							
							
							
							
							
							
							
							
							
							
							
							
							
							