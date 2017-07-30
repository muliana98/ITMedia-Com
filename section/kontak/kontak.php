<div class="row-fluid" id="section-kontak">
<!-- Section- -->
<div class="row-fluid bg-black" style="box-shadow: 1px 0 0 3px rgba(0,0,0,0.2);">
	<div class="container section-3">
		<div class="row" style="padding-top: 52px;">
			<div class="span1">&nbsp;</div>
							<h1><i class="icon-white icon-envelope" style="-webkit-transform: scale(1.7); -moz-transform:scale(1.7); -o-transfrom:scale(1.7); transform:scale(2.0); margin-top: 9px; margin-left: 5px;"></i> Kontak</h1>
											<div class="span3">
												<h3>Kontak Kami<br /><small>Kirim Pesan Anda pada Kami</small></h3>
												<form method="post" class="form-1" name="input" action="">
														<fieldset>
														<label>Nama</label>
														<input type="text" class="input-block-level form-control" name="nama" placeholder="Nama" maxlength="30">
														<br />
														<label>E-Mail</label>
														<input type="text" class="input-block-level form-control" name="email" placeholder="E-Mail" maxlength="50">
														<br />
														<label>Subjek</label>
														<input type="text" class="input-block-level form-control" name="subjek" placeholder="Subjek" maxlength="30">
														<br />
														<label>Isi Pesan</label>
														<textarea name="pesan" class="input-block-level form-control" placeholder="Isi Pesan"></textarea>
															<button type="submit" name="input" class="btn btn-primary">Kirim</button>
															<br /><br />
<?php
include "koneksi.php";
if(isset($_POST['input'])) {

$nama = mysqli_real_escape_string($koneksi, trim(addslashes(strip_tags(($_POST['nama'])))));
$email = mysqli_real_escape_string($koneksi, trim(addslashes(strip_tags(($_POST['email'])))));
$subjek = mysqli_real_escape_string($koneksi, trim(addslashes(strip_tags(($_POST['subjek'])))));
$pesan = mysqli_real_escape_string($koneksi, trim(addslashes(strip_tags(($_POST['pesan'])))));


				if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)) {
					
					echo "<div class='alert'>
					<button type='button' class='close' data-dismiss='alert' onclick='history.back()'>&times;</button>
					<strong><i class='icon icon-info-sign'></i> E-Mail harus menggunakan <u style='color: #333333;'>nama@domain</u>..</strong>
					</div>";
					
				}
				
//KHUSUS INDIKASI JIKA "~SEMUA~" FORM KOSONG----------------------------------------------------------------------------------------------------------------
if(empty($nama) && empty($email) && empty($subjek) && empty($pesan)) {
	
	echo "<div class='alert'>
					<button type='button' class='close' data-dismiss='alert' onclick='history.back()'>&times;</button>
				<strong><i class='icon icon-info-sign'></i> Anda harus mengisi 'SEMUA' form ini!</strong>
				</div>";
	
}



//----------------------------------------------------------------------------------------------------------------------------------------------------------
//KHUSUS INDIKASI 3 FORM YANG KOSONG ("APAPUN")-------------------------------------------------------------------------------------------------------------
else if(empty($nama) && empty($email) && empty($subjek)) {
	
	echo "<div class='alert'>
					<button type='button' class='close' data-dismiss='alert' onclick='history.back()'>&times;</button>
				<strong><i class='icon icon-info-sign'></i> Anda belum mengisi Nama, E-Mail, dan Subjek..</strong>
				</div>";
	
}
else if(empty($nama) && empty($subjek) && empty($pesan)) {
	
	echo "<div class='alert'>
					<button type='button' class='close' data-dismiss='alert' onclick='history.back()'>&times;</button>
				<strong><i class='icon icon-info-sign'></i> Anda belum mengisi Nama, Subjek, dan Pesan..</strong>
				</div>";
		
}
else if(empty($nama) && empty($email) && empty($pesan)) {
	
	echo "<div class='alert'>
					<button type='button' class='close' data-dismiss='alert' onclick='history.back()'>&times;</button>
				<strong><i class='icon icon-info-sign'></i> Anda belum mengisi Nama, E-Mail, dan Pesan..</strong>
				</div>";
	
}
else if(empty($email) && empty($subjek) && empty($pesan)) {
	
	echo "<div class='alert'>
					<button type='button' class='close' data-dismiss='alert' onclick='history.back()'>&times;</button>
				<strong><i class='icon icon-info-sign'></i> Anda belum mengisi E-Mail, Subjek, dan Pesan..</strong>
				</div>";
	
}



//--------------------------------------------------------------------------------------------------------------------------------------------------------
//KHUSUS INDIKASI JIKA 2 FORM KOSONG("APAPUN")------------------------------------------------------------------------------------------------------------
else if(empty($nama) && empty($email)) {
	
	echo "<div class='alert'>
					<button type='button' class='close' data-dismiss='alert' onclick='history.back()'>&times;</button>
				<strong><i class='icon icon-info-sign'></i> Anda belum mengisi Nama dan E-Mail..</strong>
				</div>";
	
}
else if(empty($nama) && empty($subjek)) {
	
	echo "<div class='alert'>
					<button type='button' class='close' data-dismiss='alert' onclick='history.back()'>&times;</button>
				<strong><i class='icon icon-info-sign'></i> Anda belum mengisi Nama dan Subjek..</strong>
				</div>";
	
}
else if(empty($nama) && empty($pesan)) {
	
	echo "<div class='alert'>
					<button type='button' class='close' data-dismiss='alert' onclick='history.back()'>&times;</button>
				<strong><i class='icon icon-info-sign'></i> Anda belum mengisi Nama dan Pesan..</strong>
				</div>";
	
}
else if(empty($subjek) && empty($pesan)) {
	
	echo "<div class='alert'>
					<button type='button' class='close' data-dismiss='alert' onclick='history.back()'>&times;</button>
				<strong><i class='icon icon-info-sign'></i> Anda belum mengisi Subjek dan Pesan..</strong>
				</div>";
	
}
else if(empty($email) && empty($subjek)) {
	
	echo "<div class='alert'>
					<button type='button' class='close' data-dismiss='alert' onclick='history.back()'>&times;</button>
				<strong><i class='icon icon-info-sign'></i> Anda belum mengisi E-Mail dan Subjek..</strong>
				</div>";
	
}
else if(empty($email) && empty($pesan)) {
	
	echo "<div class='alert'>
					<button type='button' class='close' data-dismiss='alert' onclick='history.back()'>&times;</button>
				<strong><i class='icon icon-info-sign'></i> Anda belum mengisi E-Mail dan Pesan..</strong>
				</div>";
	
}







//------------------------------------------------------------------------------------------------------------------------------------------------------
//INDIKASI "HANYA SALAH SATU" YG KOSONG FORM------------------------------------------------------------------------------------------------------------
else if(empty($nama)) {
	
	echo "<div class='alert'>
					<button type='button' class='close' data-dismiss='alert' onclick='history.back()'>&times;</button>
				<strong><i class='icon icon-info-sign'></i> Anda belum mengisi <u style='color: #333333;'>Nama</u>..</strong>
				</div>";
	
}
else if(empty($email)) {
	
	echo "<div class='alert'>
					<button type='button' class='close' data-dismiss='alert' onclick='history.back()'>&times;</button>
				<strong><i class='icon icon-info-sign'></i> Anda belum mengisi <u style='color: #333333;'>E-Mail</u>..</strong>
				</div>";
	
}
else if(empty($subjek)) {
	
	echo "<div class='alert'>
					<button type='button' class='close' data-dismiss='alert' onclick='history.back()'>&times;</button>
				<strong><i class='icon icon-info-sign'></i> Anda belum mengisi <u style='color: #333333;'>Subjek</u>..</strong>
				</div>";
	
}
else if(empty($pesan)) {
	
	echo "<div class='alert'>
					<button type='button' class='close' data-dismiss='alert' onclick='history.back()'>&times;</button>
				<strong><i class='icon icon-info-sign'></i> Anda belum mengisi <u style='color: #333333;'>Pesan</u>..</strong>
				</div>";
	
}


	else {

	$insert_data = "INSERT INTO bukutamu(id, tanggal, nama, email, subjek, pesan) VALUES('', now(), '$nama', '$email', '$subjek', '$pesan') ";
	$query = mysqli_query($koneksi, $insert_data);
		if($query) {
			
			echo "<div class='alert alert-info'>
					<button type='button' class='close' data-dismiss='alert'>&times;</button>
				<strong><i class='icon icon-ok-sign'></i> Telah Terkirim!</strong>
				</div>";
			
		}
		else {
			
			echo "<div class='alert alert-danger'>
					<button type='button' class='close' data-dismiss='alert' onclick='history.back()'>&times;</button>
				<strong><i class='icon icon-info-sign'></i> Gagal Mengirim... Silakan Kirim Ulang</strong>
				</div>";
			
		}

	}

}

?>
														
														</fieldset>
											</form>
										</div>
											<div class="span4">
												<aside class="text-left">
													<h3>Informasi Kontak</h3>
													<?php
													require("koneksi.php");
													
													$select = "SELECT * FROM kontak";
													$query = mysqli_query($koneksi, $select);
													$read = mysqli_fetch_array($query);
														$nama = mysqli_real_escape_string($koneksi, trim($read['nama']));
														$alamat = mysqli_real_escape_string($koneksi, trim($read['alamat']));
														$jenis = mysqli_real_escape_string($koneksi, trim($read['jenis']));
														$telp = mysqli_real_escape_string($koneksi, trim($read['telp']));
														$email = mysqli_real_escape_string($koneksi, trim($read['email']));
														$ket = mysqli_real_escape_string($koneksi, trim($read['ket']));

													?>
													
													<h5><?php echo $nama; ?></h5>
													<p><b>Alamat</b> : <?php echo $alamat; ?>.<br />
													<b>Telepon</b> : <?php echo $telp; ?><br />
													<b>E-Mail</b> : <?php echo $email; ?><br />
													<b>Keterangan</b> : <?php echo $ket; ?></p>
													<br />
												</aside>
											</div>
											<div class="span3">
												<aside class="text-left">
													<h3>Jejaring Sosial</h3>
													<?php
													require("koneksi.php");
													
													$select2 = "SELECT * FROM tentang WHERE ket='ITMedia-Com' OR ket='itmedia-com'";
													$query2 = mysqli_query($koneksi, $select2);
													while($read2 = mysqli_fetch_array($query2)) {
														
														$nm_tentang = mysqli_real_escape_string($koneksi, trim($read2['nm_tentang']));
														$link = mysqli_real_escape_string($koneksi, trim($read2['link']));
														$ket = mysqli_real_escape_string($koneksi, trim($read2['ket']));
														$gambar = mysqli_real_escape_string($koneksi, trim($read2['gambar']));
														
														echo "<p><h5><a href='$link' target='_blank' style='color: #CCCCCC;'><img src='./images/logo/$gambar' width='22%' height='22%' class='img img-rounded' /> : $ket</a></h5></p>";
														
													}
													
													
													
													?>
												</aside>
										</div>
									<div class="span1">&nbsp;</div>
								</div>
</div>
<!-- Section- -->
</div>
</div>