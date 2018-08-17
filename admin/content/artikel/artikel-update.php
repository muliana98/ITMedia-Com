<?php
include "koneksi.php";

$id_akun = mysqli_real_escape_string($koneksi, trim($_SESSION['admin']));
	$seleksi_db_admin = mysqli_query($koneksi, "SELECT * FROM admin WHERE id='$id_akun'");
	$datanya = mysqli_fetch_array($seleksi_db_admin);
	
			$nama = mysqli_real_escape_string($koneksi, trim(addslashes($datanya['nama_lengkap'])));


$id_artikel = mysqli_real_escape_string($koneksi, trim($_GET['id_artikel']));

$artikelbaru = "SELECT a.id_artikel, a.id_kategori, b.nm_kategori, a.judul, a.headline, a.isi, a.pengirim, a.tanggal, a.gambar FROM artikel a, kategori b WHERE a.id_kategori = b.id_kategori AND a.id_artikel='$id_artikel' ORDER BY a.id_artikel DESC";
$sql = mysqli_query($koneksi, $artikelbaru);
$hasil = mysqli_fetch_array($sql);

	$id_artikel = mysqli_real_escape_string($koneksi, trim($hasil['id_artikel']));
	$id_kategori = mysqli_real_escape_string($koneksi, trim($hasil['id_kategori']));
	$judul = mysqli_real_escape_string($koneksi, trim(strip_tags($hasil['judul'])));
	$kategori = mysqli_real_escape_string($koneksi, trim(strip_tags($hasil['nm_kategori'])));
	$headline = mysqli_real_escape_string($koneksi, trim($hasil['headline']));
	$headline2 = substr($headline,0,10);
	$isi = mysqli_real_escape_string($koneksi, trim($hasil['isi']));
	$isi2 = str_replace('\r\n', "", $isi);
	
	$pengirim = mysqli_real_escape_string($koneksi, trim(strip_tags($hasil['pengirim'])));
	$tanggal = mysqli_real_escape_string($koneksi, trim(stripslashes($hasil['tanggal'])));
	$gambar = mysqli_real_escape_string($koneksi, trim(stripslashes($hasil['gambar'])));


?>

<div class="row">
	<div class="span9">
		<h4 class="text-info"><i class="icon icon-edit"></i> Perbarui Artikel</h4>
				<form method="post" action="content/artikel/artikel-update-p.php" name="input" class="orange" enctype="multipart/form-data">
				<input type="hidden" name="id_artikel" value="<?php echo $id_artikel; ?>" class="input-xlarge">
				<input type="hidden" name="getgambar" value="<?php echo $gambar; ?>" class="input-xlarge">
					<table class="table table-striped">
							<tr>
									<td colspan="3">
										<div class="alert alert-danger" style="max-width: 69%;">
											<button type="button" class="close" data-dismiss="alert">&times;</button> 
												<blockquote>
													<p class="lead">Perhatian!!</p>
													<small>Harap Hapus tag <code>\r\n</code>, <code>&lt;br /&gt;</code>, ataupun tag yang lainnya karena mempengaruhi spasi(enter) pada artikel.<br /> &nbsp;&nbsp;&nbsp;&nbsp;Gunakan langsung enter pada keyboard</small>
												</blockquote>
											</div>
									</td>
									</tr>
							<tr>
									<td>Judul Artikel</td>
									<td>:</td>
									<td><input type="text" name="judul" value="<?php echo $judul; ?>" class="input-xlarge"></td>
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
											
											$id_kategori = mysqli_real_escape_string($koneksi, trim($isi['id_kategori']));
											$kategori = mysqli_real_escape_string($koneksi, trim($isi['nm_kategori']));
											echo "<option value='$id_kategori'>$kategori</option>";
											
										}
									
									?>
									</select> <br /><q>Kategori Awal yang terpilih</q> : <b><i>
									<?php
									$pilih_id = mysqli_real_escape_string($koneksi, trim($_GET['id_artikel']));
									$pilih = "SELECT a.id_artikel, a.id_kategori, b.nm_kategori, a.judul, a.headline, a.isi, a.pengirim, a.gambar, a.tanggal FROM artikel a, kategori b WHERE a.id_kategori = b.id_kategori ORDER BY a.id_artikel='$pilih_id' DESC";
									$query_sql = mysqli_query($koneksi, $pilih);
									$read = mysqli_fetch_array($query_sql);
										
										$pilih_kategori = mysqli_real_escape_string($koneksi, trim($read['nm_kategori']));
										echo "<u>$pilih_kategori</u>";
									
									
									?></i></b>
									</td>
									</tr>
							<tr>
									<td>Headline</td>
									<td>:</td>
									<td><textarea name="headline" class="input-xlarge"><?php echo $headline; ?></textarea></td>
									</tr>
							<tr>
									<td>Isi Artikel</td>
									<td>:</td>
									<td><textarea id="editor" name="isi" class="input-xlarge"><?php echo $isi2; ?></textarea></td>
									</tr>
							<tr>
									<td>Pengirim awal</td>
									<td>:</td>
									<td><h5><strong><?php echo $pengirim; ?></strong></h5></td>
									</tr>
							<tr>
							<tr>
									<td>Diubah oleh</td>
									<td>:</td>
									<td><input type="text" name="pengirim_diubah" class="input-xlarge" value="<?php echo $nama; ?>"></td>
									</tr>
							<tr>
									<td>Gambar</td>
									<td>:</td>
									<td><input type="file" name="gambar" value="<?php echo $gambar; ?>" class="input-xlarge"></td>
									</tr>
							<tr>
									<td></td>
									<td colspan="2">
									<input type="submit" name="input" class="btn btn-success" value="Update Artikel">
									<a class="btn btn-danger" href="home.php?menu=artikel">Batal</a>
									</td>
									</tr>
						</table>
					</form>
				</div>
</div>
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
