<?php
include "koneksi.php";
$id = mysqli_real_escape_string($koneksi, trim($_GET['id']));

	$select = "SELECT * FROM slide_show WHERE id='$id'";
	$sql = mysqli_query($koneksi, $select);
	$hasil = mysqli_fetch_array($sql);
	
		$id = mysqli_real_escape_string($koneksi, trim($hasil['id']));
		$judul = mysqli_real_escape_string($koneksi, trim($hasil['judul']));
		$deskripsi = mysqli_real_escape_string($koneksi, trim(stripslashes($hasil['deskripsi'])));
		$gambar = mysqli_real_escape_string($koneksi, trim(stripslashes($hasil['gambar'])));

?>

<div class="row">
	<div class="span9">
		<h4 class="text-info"><i class="icon icon-edit"></i> Perbarui Data Slide-Show</h4>
			<form method="post" action="content/slide_show/slide_show-update-p.php" name="input" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?php echo $id; ?>" />
			<input type="hidden" name="ambil_gambar" value="<?php echo $gambar; ?>">
				<table class="table table-striped">
					<tr>
						<td>Judul</td>
						<td>:</td>
						<td><input type="text" name="judul" class="input-xlarge" value="<?php echo $judul; ?>" /></td>
						</tr>
					<tr>
						<td>Deskripsi</td>
						<td>:</td>
						<td><input type="text" name="deskripsi" class="input-xlarge" value="<?php echo $deskripsi; ?>" /> </td>
						</tr>
					<tr>
						<td>Gambar</td>
						<td>:</td>
						<td><input type="file" name="gambar" class="input-xlarge" value="<?php echo $gambar; ?>"> </td>
						</tr>
					<tr>
						<td></td>
						<td colspan="2">
							<input type="submit" name="input" value="Update Slide-Show" class="btn btn-success">
							<a href="home.php?menu=slide_show" class="btn btn-danger">Batal</a> </td>
						</tr>
					</table>
			</form>
		</div>
</div>
				
