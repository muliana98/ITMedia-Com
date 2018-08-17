<?php
include "koneksi.php";
$id_nya = mysqli_real_escape_string($koneksi, trim($_GET['id']));



	$bukutamu = "SELECT * FROM bukutamu WHERE id='$id_nya'";
	$query = mysqli_query($koneksi, $bukutamu);
	$hasil = mysqli_fetch_array($query);
	
		$id = mysqli_real_escape_string($koneksi, trim($hasil['id']));
		$nama = mysqli_real_escape_string($koneksi, stripslashes($hasil['nama']));
		$email = mysqli_real_escape_string($koneksi, stripslashes($hasil['email']));
		$subjek = mysqli_real_escape_string($koneksi, stripslashes($hasil['subjek']));
		$pesan = mysqli_real_escape_string($koneksi, stripslashes(nl2br($hasil['pesan'])));
		$pesan = str_replace('\r\n', "", $pesan);
		
		//$pesan = str_replace("<br />", " ", $pesan);

?>

<div class="row">
		<div class="span9">
			<a class="btn btn-success" href="home.php?menu=bukutamu">Lihat Arsip Bukutamu</a>
				<hr />
					<h4 class="text-info"><i class="icon icon-envelope"></i> Baca Pesan</h4>
						<form method="post" action="content/bukutamu/bukutamu-kirim-balasan.php" name="input" class="orange">
							<input type="hidden" name="id" value="<?php echo $id; ?>" />
							<table class="table">
								<tr class="success">
										<td><strong> &raquo; Nama (Klien)</strong></td>
										<td>:</td>
										<td><input type="text" name="nama" class="input-xlarge" value="<?php echo $nama; ?>"></td>
										</tr>
								<tr class="success">
										<td><strong> &raquo; Subjek (Klien)</strong></td>
										<td>:</td>
										<td><input type="text" name="subjek" class="input-xlarge" value="<?php echo $subjek; ?>"></td>
										</tr>
								<tr class="success">
										<td><strong> &raquo; Pesan (Klien)</strong></td>
										<td>:</td>
										<td><textarea name="pesan" class="input-xlarge"><?php echo $pesan; ?></textarea></td>
										</tr>
								<tr>
										<td colspan="3"></td>
										</tr>
								<tr>
										<td colspan="3"></td>
										</tr>
								<tr class="info">
										<td colspan="3"><h4 class="text-info"><i class="icon icon-envelope"></i> Balas Pesan</h4></td>
										</tr>
								<tr>
										<td>Nama Admin ITMedia</td>
										<td>:</td>
										<td><input type="text" name="nama_admin_itmedia" class="input-xlarge" maxlength="30"></td>
										</tr>
								<tr>
										<td>E-Mail Klien</td>
										<td>:</td>
										<td><input type="text" name="email" class="input-xlarge" maxlength="50" value="<?php echo $email; ?>"></td>
										</tr>

								<tr>
										<td>Subjek</td>
										<td>:</td>
										<td><input type="text" name="subjek_itmedia" class="input-xlarge"></textarea></td>
										</tr>
								<tr>
										<td>Pesan</td>
										<td>:</td>
										<td><textarea id="editor" name="pesan_itmedia" class="input-xlarge">Untuk <strong><?php echo $nama; ?></strong></textarea></td>
										</tr>
								<tr>
										<td></td>
										<td colspan="2">
										<input type="submit" name="input" class="btn btn-success" value="Kirim">
										<a class="btn btn-danger" href="home.php?menu=bukutamu">Batal</a>
										</td>
										</tr>
							</table>
						</form>
					</div>
</div>
			
			
