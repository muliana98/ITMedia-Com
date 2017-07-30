<?php
include "koneksi.php";

	$akun = mysqli_real_escape_string($koneksi, trim($_SESSION['admin']));
	$seleksi = "SELECT * FROM admin WHERE id='$akun'";
	$query = mysqli_query($koneksi, $seleksi);
	$hasil = mysqli_fetch_array($query);
		$nama_lengkap = mysqli_real_escape_string($koneksi, trim($hasil['nama_lengkap']));
		
if(isset($_POST['input'])) {
	

	
	$judul = mysqli_real_escape_string($koneksi, trim(addslashes(strip_tags($_POST['judul']))));
	$kategori = mysqli_real_escape_string($koneksi, trim($_POST['kategori']));
	
	$getnm = "SELECT nm_kategori FROM kategori WHERE id_kategori='$kategori'";
	$sqlgetnm = mysqli_query($koneksi, $getnm);
	$rgetnm = mysqli_fetch_array($sqlgetnm);
	$nm = mysqli_real_escape_string($koneksi, trim($rgetnm['nm_kategori']));
	
	$headline = mysqli_real_escape_string($koneksi, trim(addslashes(strip_tags($_POST['headline']))));
	$isi_artikel = mysqli_real_escape_string($koneksi, trim(addslashes(strip_tags($_POST['isi']))));
	$isi_artikel = str_replace('<br />', "\r\n", $isi_artikel);
	$pengirim = mysqli_real_escape_string($koneksi, trim(addslashes(strip_tags($_POST['pengirim']))));
	
	$sumber = $_FILES['gambar']['tmp_name'];
	$tujuan = "../images/artikel/".$nm."/".$_FILES['gambar']['name'];
	$tujuan1 = "/images/artikel/".$nm."/".$_FILES['gambar']['name'];
	
	$gambar = mysqli_real_escape_string($koneksi, trim(addslashes($_FILES['gambar']['name'])));
	move_uploaded_file($sumber, $tujuan);
	
	
	if(empty($judul) && empty($headline) && empty($isi_artikel) && empty($pengirim) && empty($gambar) ) {
		
		echo "<div class='alert'>
					<button type='button' class='close' data-dismiss='alert'>&times;</button>
					<strong>Anda mengosongkan SEMUA Form. Silakan isi...</strong>
					</div>";
		
	}
	
	else if(empty($judul) && empty($headline) && empty($isi_artikel) && empty($gambar) ) {
		
		echo "<div class='alert'>
					<button type='button' class='close' data-dismiss='alert'>&times;</button>
					<strong>Form Judul, Headline, Isi, dan Gambar belum diisi. Silakan isi...</strong>
					</div>";
					
	}
	
	else if(empty($headline) && empty($isi_artikel) && empty($gambar) ) {
		
		echo "<div class='alert'>
					<button type='button' class='close' data-dismiss='alert'>&times;</button>
					<strong>Form Headline, Isi, dan Gambar belum diisi. Silakan isi...</strong>
					</div>";

	}
	
	else if(empty($judul) && empty($isi_artikel) && empty($gambar) ) {
		
		echo "<div class='alert'>
					<button type='button' class='close' data-dismiss='alert'>&times;</button>
					<strong>Form Judul, Isi, dan Gambar belum diisi. Silakan isi...</strong>
					</div>";
		
	}
	
	else if(empty($judul) && empty($headline) && empty($gambar) ) {
		
		echo "<div class='alert'>
					<button type='button' class='close' data-dismiss='alert'>&times;</button>
					<strong>Form Judul, Headline, dan Gambar belum diisi. Silakan isi...</strong>
					</div>";
		
	}
	
	else if(empty($judul) && empty($headline) && empty($isi) ) {
		
		echo "<div class='alert'>
					<button type='button' class='close' data-dismiss='alert'>&times;</button>
					<strong>Form Judul, Headline, dan Isi Artikel belum diisi. Silakan isi...</strong>
					</div>";
		
	}
	
	else if(empty($headline) && empty($isi_artikel) ) {
		
		echo "<div class='alert'>
					<button type='button' class='close' data-dismiss='alert'>&times;</button>
					<strong>Form Headline dan Isi belum diisi. Silakan isi...</strong>
					</div>";
		
	}
	
	else if(empty($judul) && empty($headline) ) {
		
		echo "<div class='alert'>
					<button type='button' class='close' data-dismiss='alert'>&times;</button>
					<strong>Form Judul dan Headline belum diisi. Silakan isi...</strong>
					</div>";
		
	}
	
	else if(empty($isi_artikel) && empty($gambar) ) {
		
		echo "<div class='alert'>
					<button type='button' class='close' data-dismiss='alert'>&times;</button>
					<strong>Form Isi dan Gambar belum diisi. Silakan isi...</strong>
					</div>";
		
	}
	
	else if(empty($headline) && empty($gambar) ) {
		
		echo "<div class='alert'>
					<button type='button' class='close' data-dismiss='alert'>&times;</button>
					<strong>Form Headline dan Gambar belum diisi. Silakan isi...</strong>
					</div>";
		
	}
	
	else if(empty($judul) && empty($gambar) ) {
		
		echo "<div class='alert'>
					<button type='button' class='close' data-dismiss='alert'>&times;</button>
					<strong>Form Judul dan Gambar belum diisi. Silakan isi...</strong>
					</div>";
		
	}


	else if(empty($judul)) {
		
			echo "<div class='alert'>
					<button type='button' class='close' data-dismiss='alert'>&times;</button>
					<strong>Form Judul belum diisi. Silakan isi...</strong>
					</div>";
		
	}
	
	else if(empty($headline)) {
		
			echo "<div class='alert'>
					<button type='button' class='close' data-dismiss='alert'>&times;</button>
					<strong>Form Headline belum diisi. Silakan isi...</strong>
					</div>";
		
	}
	
	else if(empty($isi_artikel)) {
		
			echo "<div class='alert'>
					<button type='button' class='close' data-dismiss='alert'>&times;</button>
					<strong>Form Isi belum diisi. Silakan isi...</strong>
					</div>";
		
	}
	
	else if(empty($gambar)) {
		
			echo "<div class='alert'>
					<button type='button' class='close' data-dismiss='alert'>&times;</button>
					<strong>Form Gambar belum dipilih. Silakan isi...</strong>
					</div>";
		
	}
	
	
	
	
	else {
	$insertquery = "INSERT INTO artikel VALUES ('', '$kategori', '$judul', '$headline', '$isi_artikel', '$pengirim', now(), '$tujuan1')";
	$sql = mysqli_query($koneksi, $insertquery);
	
	
		if($sql) {
			
			echo "<h4><font color='blue'>Artikel berhasil ditambahkan</font></h4>";
			
		} 
		else {
			
			echo "<h4><font color='blue'>Artikel gagal ditambah!</font></h4>";
			
		}
		
	
	}
	
	
}


?>

<div class="container">
	<a class="btn btn-success" href="home.php?menu=artikel"><i class="icon icon-chevron-left"></i> Lihat Data</a>
		<hr />
		<h4 class="text-info"><i class="icon icon-pencil"></i> Input Artikel Baru</h4>
				<form name="input" method="post" action="" class="orange" enctype="multipart/form-data">
					<table class="table table-striped">
						<tr>
								<td>Judul Artikel</td>
								<td>:</td>
								<td><input type="text" name="judul" class="input-xlarge" maxlength="120"></td>
								</tr>
						<tr>
								<td>Kategori</td>
								<td>:</td>
								<td>
									<select name="kategori" class="input-xlarge">
									<?php
										$query = "SELECT id_kategori, nm_kategori FROM kategori ORDER BY nm_kategori";
										$sql = mysqli_query($koneksi, $query);
										while($isi = mysqli_fetch_array($sql)) {
											
											echo "<option value='$isi[id_kategori]'>$isi[nm_kategori]</option>";
											
										}
									
									?>
									</select>
								</td>
								</tr>
						<tr>
								<td>Headline</td>
								<td>:</td>
								<td><textarea name="headline" class="input-xlarge"></textarea></td>
								</td>
								</tr>
						<tr>
								<td>Isi Artikel</td>
								<td>:</td>
								<td><textarea name="isi" class="input-xlarge"></textarea></td>
								</tr>
						<tr>
								<td>Pengirim</td>
								<td>:</td>
								<td><input type="text" value="<?php echo $nama_lengkap; ?>" name="pengirim" class="input-xlarge" maxlength="30"></td>
								</tr>
						<tr>
								<td>Gambar</td>
								<td>:</td>
								<td><input type="file" name="gambar" class="input-xlarge" maxlength="120"></td>
								</tr>
						<tr>
								<td></td>
								<td colspan="2">
								<input type="submit" name="input" class="btn btn-success" value="Input Artikel">
								<a class="btn btn-danger" href="home.php?menu=artikel">Batal</a>
								</td>
								</tr>
					</table>
				</form>	
</div>


















