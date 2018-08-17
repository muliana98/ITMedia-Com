<?php
include "koneksi.php";

$id_nya = mysqli_real_escape_string($koneksi, trim($_GET['id']));
$seleksi = mysqli_query($koneksi, "SELECT * FROM admin WHERE id='$id_nya'");
$hasil = mysqli_fetch_array($seleksi);
	
	$id = mysqli_real_escape_string($koneksi, trim($hasil['id']));
	$foto_profil_semula = mysqli_real_escape_string($koneksi, trim(stripslashes($hasil['foto_profil'])));
	
	

if(isset($_POST['input'])) {

	$id = mysqli_real_escape_string($koneksi, trim($_REQUEST['id']));


	$sumber = $_FILES['foto_profil']['tmp_name'];
	$tujuan = "../images/profil/".$_FILES['foto_profil']['name'];
	$tujuan1 = "/images/profil/".$_FILES['foto_profil']['name'];
	
	$foto_profil = mysqli_real_escape_string($koneksi, trim(addslashes($_FILES['foto_profil']['name'])));
	move_uploaded_file($sumber, $tujuan);
	
	$ambil_foto_profil = mysqli_real_escape_string($koneksi, trim(stripslashes($_REQUEST['ambil_foto_profil'])));
	$ambil_foto_profil1 = "../images/profil/".$ambil_foto_profil;
	
	if(empty($foto_profil)) {
		
		echo "<div class='alert alert-danger'>
						<button type='button' class='close' data-dismiss='alert'>&times;</button>
							<strong><i class='icon icon-info-sign'></i> Foto Profil belum dipilih. Silakan pilih...</strong>
					</div> ";
		
	}
	

	else {
		
		if(file_exists($ambil_foto_profil1 == $tujuan)) {
			//unlink($ambil_foto_profil);
			
			$huruf_acak = rand(1, 10000).round(microtime(true))."_".$foto_profil ;
			$update = "UPDATE admin SET foto_profil='$huruf_acak' WHERE id='$id'";
			$sql = mysqli_query($koneksi, $update);
			
				if($sql) echo "<div class='alert alert-info'>
									<a href='home.php?menu=profil' class='close' data-dismiss='alert'>&times;</a>
										<strong><i class='icon icon-ok-circle'></i> Foto Profil berhasil diubah!</strong>
								</div>
								<meta http-equiv='refresh' content='0.1'>";
								
				else echo "<div class='alert alert-danger'>
									<button type='button' class='close' data-dismiss='alert'>&times;</button>
										<strong><i class='icon icon-info-sign'></i> Foto Profil gagal diubah!</strong>
								</div> ";
						
		}
		else {
			$update = "UPDATE admin SET foto_profil='$foto_profil' WHERE id='$id'";
			$sql = mysqli_query($koneksi, $update);
			
				if($sql) echo "<div class='alert alert-info'>
									<a href='home.php?menu=profil' class='close' data-dismiss='alert'>&times;</a>
										<strong><i class='icon icon-ok-circle'></i> Foto Profil berhasil diubah!</strong>
								</div>
								<meta http-equiv='refresh' content='0.1'>";
								
				else echo "<div class='alert alert-danger'>
									<button type='button' class='close' data-dismiss='alert'>&times;</button>
										<strong><i class='icon icon-info-sign'></i> Foto Profil gagal diubah!</strong>
								</div> ";
					
		}
		
	}

}


?>

<div class="row">
	<div class="span9">
		<h4 class="text-info"><i class="icon icon-picture"></i> Perbarui Foto Profil</h4>
			<form method="post" name="input" action="" class="orange" enctype="multipart/form-data">
				<input type="hidden" name="id" value="<?php echo $id; ?>" />	
				<input type="hidden" name="ambil_foto_profil" value="<?php echo $foto_profil_semula; ?>" />
					<table class="table table-striped">
						<tr>
								<td>Foto Profil</td>
								<td>:</td>
								<td><input type="file" name="foto_profil" class="input-xlarge" maxlength="120"></td>
								</tr>
						<tr>
								<td></td>
								<td colspan="2">
								<input type="submit" name="input" class="btn btn-success" value="Ubah Foto Profil">
								<a href="home.php?menu=profil" class="btn btn-warning">Batal</a>
								</td>
								</tr>
						<tr>
								<td colspan="3"></td>
								</tr>
						<tr>
								<td>Hapus Foto Profil</td>
								<td>:</td>
								<td><a onclick="return confirm('Anda yakin ingin menghapus Foto Profil?')" href="content/profil/profil-foto-hapus.php?id=<?php echo $id; ?>" class="btn btn-danger"><i class="icon-white icon-trash"></i> Hapus Foto Profil</a></td>
								</tr>
								
				</table>
			</form>
		</div>
</div>
