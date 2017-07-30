<?php
include "koneksi.php";

$id_nya = mysqli_real_escape_string($koneksi, trim($_GET['id']));
$seleksi = mysqli_query($koneksi, "SELECT * FROM admin WHERE id='$id_nya'");
$hasil = mysqli_fetch_array($seleksi);
	
	$id = mysqli_real_escape_string($koneksi, trim($hasil['id']));
	
	

if(isset($_POST['input'])) {

	$id = mysqli_real_escape_string($koneksi, trim($_REQUEST['id']));


	$sumber = $_FILES['foto_profil']['tmp_name'];
	$tujuan = "../images/profil/".$_FILES['foto_profil']['name'];
	$tujuan1 = "/images/profil/".$_FILES['foto_profil']['name'];
	
	$foto_profil = mysqli_real_escape_string($koneksi, trim(addslashes($_FILES['foto_profil']['name'])));
	move_uploaded_file($sumber, $tujuan);
	

	
	$update = "UPDATE admin SET foto_profil='$foto_profil' WHERE id='$id'";
	$sql = mysqli_query($koneksi, $update);
	
	if($sql) header('location: home.php?menu=profil');
					
	else echo "<div class='alert alert-danger'>
						<button type='button' class='close' data-dismiss='alert'>&times;</button>
							<strong><i class='icon icon-info-sign'></i> Foto Profil gagal diunggah!</strong>
					</div> ";
					
					
}

?>

<div class="container">
	<h4 class="text-info"><i class="icon icon-picture"></i> Pilih Foto Profil</h4>
		<form method="post" name="input" action="" class="orange" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?php echo $id; ?>" />	
				<table class="table table-striped">
					<tr>
							<td>Foto Profil</td>
							<td>:</td>
							<td><input type="file" name="foto_profil" class="input-xlarge" maxlength="120"></td>
							</tr>
					<tr>
							<td></td>
							<td colspan="2">
							<input type="submit" name="input" class="btn btn-success" value="Unggah Foto Profil">
							<a href="home.php?menu=profil" class="btn btn-warning">Batal</a>
							</td>
							</tr>
					<tr>
							<td colspan="3"></td>
							</tr>
							
			</table>
		</form>
	</div>