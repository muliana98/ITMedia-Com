<?php
include "koneksi.php";
if(isset($_POST['input'])) {
	
		$judul = mysqli_real_escape_string($koneksi, trim(addslashes(strip_tags($_POST['judul']))));
		$deskripsi = mysqli_real_escape_string($koneksi, trim(addslashes(strip_tags($_POST['deskripsi']))));
		
		$sumber = $_FILES['gambar']['tmp_name'];
		$tujuan = "../images/slide_show/"
					.$_FILES['gambar']['name'];
		$tujuan1 = "/images/slide_show/"
					.$_FILES['gambar']['name'];
		$gambar = mysqli_real_escape_string($koneksi, trim(addslashes($_FILES['gambar']['name'])));
					move_uploaded_file($sumber, $tujuan);
					

	if(empty($judul) && empty($deskripsi) && empty($gambar)  ) {
		
		echo "<div class='alert alert-info'>
					<button type='button' class='close' data-dismiss='alert'>&times;</button>
					<strong><i class='icon icon-info-sign'></i> Anda mengosongkan SEMUA Form. Silakan diisi...</strong>
				</div>
		
		";
		
	}
	
	else if(empty($judul) && empty($deskripsi)) {
		
		echo "<div class='alert alert-info'>
					<button type='button' class='close' data-dismiss='alert'>&times;</button>
					<strong><i class='icon icon-info-sign'></i> Judul dan Deskripsi belum diisi. Silakan diisi...</strong>
				</div>
		
		";
		
	}
	
	else if(empty($gambar) && empty($deskripsi)) {
		
		echo "<div class='alert alert-info'>
					<button type='button' class='close' data-dismiss='alert'>&times;</button>
					<strong><i class='icon icon-info-sign'></i> Gambar dan Deskripsi belum diisi. Silakan diisi...</strong>
				</div>
		
		";
		
	}
	
	else if(empty($judul) && empty($gambar)) {
		
		echo "<div class='alert alert-info'>
					<button type='button' class='close' data-dismiss='alert'>&times;</button>
					<strong><i class='icon icon-info-sign'></i> Judul dan Gambar belum diisi. Silakan diisi...</strong>
				</div>
		
		";
		
	}
	
	else if(empty($judul)) {
		
		echo "<div class='alert alert-info'>
					<button type='button' class='close' data-dismiss='alert'>&times;</button>
					<strong><i class='icon icon-info-sign'></i> Judul belum diisi. Silakan diisi...</strong>
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
	
	else if(empty($gambar)) {
		
		echo "<div class='alert alert-info'>
					<button type='button' class='close' data-dismiss='alert'>&times;</button>
					<strong><i class='icon icon-info-sign'></i> Gambar belum diisi. Silakan diisi...</strong>
				</div>
		
		";
		
	}
	
	
	else {
					
		$insertquery = "INSERT INTO slide_show VALUES ('', '$judul', '$deskripsi', '$gambar')";
		$sql = mysqli_query($koneksi, $insertquery);
		if($sql) {
			
			echo "<h4><font color='blue'>Data Slide-Show berhasil ditambahkan.</font></h4>";
			
		}
		else {
			
			echo "<h4><font color='blue'>Data Slide-Show gagal ditambah!</font></h4>";
			
		}
		
	}
	
}



?>

<div class="container">
	<a class="btn btn-success" href="home.php?menu=slide_show"><i class="icon icon-chevron-left"></i> Lihat Data</a>
		<hr />
		<h4 class="text-info"><i class="icon icon-pencil"></i> Input Slide-Show</h4>
			<form method="post" name="input" action="" enctype="multipart/form-data">
				<table class="table table-striped">
					<tr>
					<td>Judul</td>
					<td>:</td>
					<td><input type="text" name="judul" class="input-xlarge" maxlength="50"></td>
					</tr>
				<tr>
					<td>Deskripsi</td>
					<td>:</td>
					<td><input type="text" name="deskripsi" class="input-xlarge" maxlength="220"> </td>
					</tr>
				<tr>
					<td>Gambar</td>
					<td>:</td>
					<td><input type="file" name="gambar" class="input-xlarge" maxlength="60"></td>
					</tr>
				<tr>
					<td></td>
					<td colspan="2">
						<input type="submit" name="input" value="Tambah Slide-Show" class="btn btn-success">
						<a href="home.php?menu=slide_show" class="btn btn-danger">Batal</a> </td>
					</tr>
				</table>
		</form>
	</div>