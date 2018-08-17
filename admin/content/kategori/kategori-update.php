<?php
include "koneksi.php";
$id_kategori = mysqli_real_escape_string($koneksi, trim($_GET['id_kategori']));

	$beritabaru = "SELECT * FROM kategori WHERE id_kategori='$id_kategori'";
	$sql = mysqli_query($koneksi, $beritabaru);
	$hasil = mysqli_fetch_array($sql);
	
		$id_kategori = mysqli_real_escape_string($koneksi, trim($hasil['id_kategori']));
		$nm_kategori = mysqli_real_escape_string($koneksi, trim($hasil['nm_kategori']));
		$deskripsi = mysqli_real_escape_string($koneksi, trim(stripslashes($hasil['deskripsi'])));


?>

<div class="row">
	<div class="container">
		<h4 class="text-info"><i class="icon icon-edit"></i> Perbarui Kategori</h4>
			<form method="post" name="input" action="content/kategori/kategori-update-p.php" class="orange">	
				<input type="hidden" name="id_kategori" value="<?php echo $id_kategori; ?>" />
				<input type="hidden" name="getnama" value="<?php echo $nm_kategori; ?>" />	
					<table class="table table-striped">
						<tr>
								<td>Nama Kategori</td>
								<td>:</td>
								<td><input type="text" name="nm_kategori" value="<?php echo $nm_kategori; ?>" class="input-xlarge"></td>
								</tr>
						<tr>
								<td>Deskripsi</td>
								<td>:</td>
								<td><input type="text" name="deskripsi" value="<?php echo $deskripsi; ?>" class="input-xlarge"></td>
								</tr>
						<tr>
								<td></td>
								<td colspan="2">
								<input type="submit" name="input" class="btn btn-success" value="Update Kategori">
								<a class="btn btn-danger" href="home.php?menu=kategori">Batal</a>
								</td>
								</tr>
					</table>
				</form>
			</div>
</div>
