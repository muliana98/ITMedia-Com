<?php
include "koneksi.php";

$id_tentang = mysqli_real_escape_string($koneksi, trim($_GET['id_tentang']));

	$beritabaru = "SELECT * FROM tentang WHERE id_tentang='$id_tentang'";
	$sql = mysqli_query($koneksi, $beritabaru);
	$hasil = mysqli_fetch_array($sql);
	
		$id_tentang = mysqli_real_escape_string($koneksi, trim($hasil['id_tentang']));
		$nm_tentang = mysqli_real_escape_string($koneksi, trim($hasil['nm_tentang']));
		$link = mysqli_real_escape_string($koneksi, trim($hasil['link']));
		$ket = mysqli_real_escape_string($koneksi, trim(stripslashes($hasil['ket'])));
		$gambar = mysqli_real_escape_string($koneksi, trim(stripslashes($hasil['gambar'])));


?>

<div class="container">
	<h4 class="text-info"><i class="icon icon-edit"></i> Perbarui Data "Tentang"</h4>
			<form method="post" action="content/tentang/tentang-update-p.php" name="input" class="orange" enctype="multipart/form-data">
				<input type="hidden" name="id_tentang" value="<?php echo $id_tentang; ?>" />
				<input type="hidden" name="getnama" value="<?php echo $nm_tentang; ?>" />
				<input type="hidden" name="ambil_gambar" value="<?php echo $gambar; ?>" />
				<table class="table">
					<tr>
							<td>Nama Tentang</td>
							<td>:</td>
							<td><input type="text" name="nm_tentang" class="input-xlarge" value="<?php echo $nm_tentang; ?>"></td>
							</tr>
					<tr>
							<td>Link</td>
							<td>:</td>
							<td><input type="text" name="link" class="input-xlarge" value="<?php echo $link; ?>"></td>
							</tr>
					<tr>
							<td>Gambar</td>
							<td>:</td>
							<td><input type="file" name="gambar" class="input-xlarge" value="<?php echo $gambar; ?>"></td>
							</tr>
					<tr>
							<td>Ket.</td>
							<td>:</td>
							<td><textarea name="ket" class="input-xlarge"><?php echo $ket; ?></textarea></td>
							</tr>
					<tr>
							<td></td>
							<td colspan="2">
							<input type="submit" name="input" class="btn btn-success" value="Update Tentang">
							<a class="btn btn-danger" href="home.php?menu=tentang">Batal</a>
							</td>
							</tr>
				</table>
			</form>
		</div>
							
							
							
							
							
							
							
							
							
							
							
							
							
							
							