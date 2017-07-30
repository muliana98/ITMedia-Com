<?php
include "koneksi.php";
if(isset($_POST['input'])) {
	
	$nm_tentang = mysqli_real_escape_string($koneksi, trim(addslashes(strip_tags($_POST['nm_tentang']))));
	$link = mysqli_real_escape_string($koneksi, trim(addslashes(strip_tags($_POST['link']))));
	$ket = mysqli_real_escape_string($koneksi, trim(addslashes(strip_tags($_POST['ket']))));

	
	
		$sumber = $_FILES['gambar']['tmp_name'];
		$tujuan = "../images/logo/"
					.$_FILES['gambar']['name'];
		$tujuan1 = "/images/logo/"
					.$_FILES['gambar']['name'];
		$gambar = mysqli_real_escape_string($koneksi, trim(addslashes($_FILES['gambar']['name'])));
					move_uploaded_file($sumber, $tujuan);
	
	
		$insertquery = "INSERT INTO tentang VALUES ('', '$nm_tentang', '$link', '$ket', '$gambar')";
		$sql = mysqli_query($koneksi, $insertquery);
		if($sql) {
			
			echo "<h4><font color='blue'>Data Tentang berhasil ditambahkan</font></h4>";
			
		} else {
			
			echo "<h4><font color='blue'>Data Tentang gagal ditambah!</font></h4>";
			
	}
	
}


?>

<div class="container">
	<a class="btn btn-success" href="home.php?menu=tentang"><i class="icon icon-chevron-left"></i> Lihat Data</a>
		<hr />
			<h4 class="text-info"><i class="icon icon-pencil"></i> Input Data Tentang</h4>
				<form method="post" action="" name="input" class="orange" enctype="multipart/form-data">	
					<table class="table">
						<tr>
								<td>Nama</td>
								<td>:</td>
								<td><input type="text" name="nm_tentang" class="input-xlarge" maxlength="35"></td>
								</tr>
						<tr>
								<td>Link</td>
								<td>:</td>
								<td><input type="text" name="link" class="input-xlarge" maxlength="50"></td>
								</tr>
						<tr>
								<td>Gambar</td>
								<td>:</td>
								<td><input type="file" name="gambar" class="input-xlarge" maxlength="60"></td>
								</tr>
						<tr>
						
								<td>Ket.</td>
								<td>:</td>
								<td><textarea name="ket" class="input-xlarge"></textarea></td>
								</tr>
						<tr>
								<td></td>
								<td colspan="2">
								<input type="submit" name="input" class="btn btn-success" value="Tambah Tentang">
								<a class="btn btn-danger" href="home.php?menu=tentang">Batal</a>
								</td>
								</tr>
					</table>
				</form>
			</div>
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								