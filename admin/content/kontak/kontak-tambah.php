<?php
include "koneksi.php";
if(isset($_POST['input'])) {
	
	$nama = mysqli_real_escape_string($koneksi, trim(addslashes(strip_tags($_POST['nama']))));
	$alamat = mysqli_real_escape_string($koneksi, trim(addslashes(strip_tags($_POST['alamat']))));
	$jenis = mysqli_real_escape_string($koneksi, trim(addslashes(strip_tags($_POST['jenis']))));
	$telp = mysqli_real_escape_string($koneksi, trim(addslashes(strip_tags($_POST['telp']))));
	$email = mysqli_real_escape_string($koneksi, trim(addslashes(strip_tags($_POST['email']))));
	$ket = mysqli_real_escape_string($koneksi, trim(addslashes(strip_tags($_POST['ket']))));
	
	
	
	$insertquery = "INSERT INTO kontak VALUES ('', '$nama', '$alamat', '$jenis', '$telp', '$email', '$ket')";
	$sql = mysqli_query($koneksi, $insertquery);
	if($sql) {
		
		echo "<h4><font color='blue'>Data Kontak berhasil ditambahkan</font></h4>";
		
	} 
	else {
		
		echo "<h4><font color='blue'>Data Kontak gagal ditambah</font></h4>";
		
	}
	
		
}


?>

<div class="container">
	<a class="btn btn-success" href="home.php?menu=kontak"><i class="icon icon-chevron-left"></i> Lihat Data</a>
		<hr />
			<h4 class="text-info"><i class="icon icon-pencil"></i> Input Data Kontak</h4>
				<form method="post" action="" name="input" enctype="multipart/data-form">
					<table class="table">
						<tr>
								<td>Nama</td>
								<td>:</td>
								<td><input type="text" name="nama" class="input-xlarge" maxlength="40"></td>
								</tr>
						<tr>
								<td>Alamat</td>
								<td>:</td>
								<td><input type="text" name="alamat" class="input-xlarge" maxlength="150"></td>
								</tr>
						<tr>
								<td>Jenis</td>
								<td>:</td>
								<td><input type="text" name="jenis" class="input-xlarge" maxlength="50"></td>
								</tr>
						<tr>
								<td>Telp.</td>
								<td>:</td>
								<td><input type="text" name="telp" class="input-xlarge" maxlength="20"></td>
								</tr>
						<tr>
								<td>E-Mail</td>
								<td>:</td>
								<td><input type="text" name="email" class="input-xlarge" maxlength="40"></td>
								</tr>
						<tr>
								<td>Ket.</td>
								<td>:</td>
								<td><textarea name="ket" class="input-xlarge"></textarea></td>
								</tr>
						<tr>
								<td></td>
								<td colspan="2">
								<input type="submit" name="input" class="btn btn-success" value="Tambah Kontak">
								<a class="btn btn-warning" href="home.php?menu=kontak">Batal</a>
								</td>
								</tr>
					</table>
				</form>
			</div>
						
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								










