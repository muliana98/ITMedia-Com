<?php
include "koneksi.php";
if(isset($_POST['input'])) {
	
	$nm_kategori = mysqli_real_escape_string($koneksi, trim(addslashes(strip_tags($_POST['nm_kategori']))));
	$deskripsi = mysqli_real_escape_string($koneksi, trim(addslashes(strip_tags($_POST['deskripsi']))));
	
	if(empty($nm_kategori) && empty($deskripsi)  ) {
		
		echo "<div class='alert alert-info'>
					<button type='button' class='close' data-dismiss='alert'>&times;</button>
					<strong><i class='icon icon-info-sign'></i> Anda mengosongkan SEMUA Form. Silakan diisi...</strong>
				</div>
		
		";
		
	}
	
	else if(empty($nm_kategori)) {
		
		echo "<div class='alert alert-info'>
					<button type='button' class='close' data-dismiss='alert'>&times;</button>
					<strong><i class='icon icon-info-sign'></i> Nama Kategori belum diisi. Silakan diisi...</strong>
				</div>
		
		";
		
	}
	
	else if(empty($deskripsi)) {
		
		echo "<div class='alert alert-info'>
					<button type='button' class='close' data-dismiss='alert'>&times;</button>
					<strong><i class='icon icon-info-sign'></i> Deskripsi belum diisi. Silakan diisi...</strong>
				</div>
		
		";
		
	}
	

	else {
	
	$insertquery = "INSERT INTO kategori VALUES('', '$nm_kategori', '$deskripsi')";
	$sql = mysqli_query($koneksi, $insertquery);
		if($sql) {
			
			$folder = "../images/artikel/".$nm_kategori;
			$makefolder = mkdir($folder);
			
			echo "<h4><font color='blue'>Data Kategori berhasil ditambahkan</font></h4>";
			
		} 
		else {
			
			echo "<h4><font color='blue'>Data Kategori gagal ditambah!</font></h4>";
			
		}
	
	}
	
}


?>

<div class="container">
	<a class="btn btn-success" href="home.php?menu=kategori"><i class="icon icon-chevron-left"></i> Lihat Data</a>
		<hr />
			<h4 class="text-info"><i class="icon icon-pencil"></i> Input Kategori Baru</h4>
				<form method="post" action="" name="input" class="orange">	
					<table class="table table-striped">
						<tr>
								<td>Nama Kategori</td>
								<td>:</td>
								<td><input type="text" name="nm_kategori" class="input-xlarge" maxlength="30"></td>
								</tr>
						<tr>
								<td>Deskripsi</td>
								<td>:</td>
								<td><input type="text" name="deskripsi" class="input-xlarge" maxlength="220"></td>
								</tr>
						<tr>
								<td></td>
								<td colspan="2">
								<input type="submit" class="btn btn-success" name="input" value="Tambah Kategori">
								<a class="btn btn-danger" href="home.php?menu=kategori">Batal</a>
								</td>
								</tr>
					</table>
				</form>
			</div>