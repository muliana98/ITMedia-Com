<?php
require("koneksi.php");

$id_nya = mysqli_real_escape_string($koneksi, trim($_GET['id']));

$seleksi = mysqli_query($koneksi, "SELECT * FROM admin WHERE id='$id_nya'");
$data = mysqli_fetch_array($seleksi);
	$username = mysqli_real_escape_string($koneksi, trim($data['username']));
	$foto_profil_penerima = mysqli_real_escape_string($koneksi, trim(stripslashes($data['foto_profil'])));
	
	$id_akun = mysqli_real_escape_string($koneksi, trim($_SESSION['admin']));
	$database = mysqli_query($koneksi, "SELECT * FROM admin WHERE id='$id_akun'");
	$datanya = mysqli_fetch_array($database);
		$pengirim = mysqli_real_escape_string($koneksi, trim($datanya['username']));
		$foto_profil_pengirim = mysqli_real_escape_string($koneksi, trim(stripslashes($datanya['foto_profil'])));

if(isset($_POST['input'])) {
	
	
	$id_pengirim = mysqli_real_escape_string($koneksi, trim($_SESSION['admin']));
	$pengirim = mysqli_real_escape_string($koneksi, trim($_REQUEST['pengirim']));
	$penerima = mysqli_real_escape_string($koneksi, trim($_REQUEST['penerima']));
	$pesan = mysqli_real_escape_string($koneksi, trim($_REQUEST['pesan']));
	
	$kirim_chat = mysqli_query($koneksi, "INSERT INTO pesan_chat VALUES('', '$id_pengirim', '$pengirim', '$penerima', '$pesan', now()) ");

	
	
}


?>

<?php

if(isset($id_akun)) {
	
	$id_akun_pengirim = mysqli_real_escape_string($koneksi, trim($_SESSION['admin']));
	$pilih_akun = mysqli_query($koneksi, "SELECT * FROM admin WHERE id='$id_akun_pengirim'");
	$tampil = mysqli_fetch_array($pilih_akun);
		$tampil_username = mysqli_real_escape_string($koneksi, trim($tampil['username']));
		
		$pilih_pesan_chat = mysqli_query($koneksi, "SELECT * FROM pesan_chat WHERE (pengirim='$tampil_username' AND penerima='$username'   OR    penerima='$tampil_username' AND pengirim='$username') ORDER BY id_pesan DESC");
		while($tampil_2 = mysqli_fetch_array($pilih_pesan_chat)) {
			$pengirim_2 = mysqli_real_escape_string($koneksi, trim($tampil_2['pengirim']));
			
			$tampil_chatnya = mysqli_real_escape_string($koneksi, trim($tampil_2['pesan']));
			
			
			
			echo "<span class='badge' style='padding: 4.5px; margin-bottom: 7px;'>
			<font size='3'><strong>$pengirim_2</strong></span> : $tampil_chatnya</font>
			<br />";
			
		}
		

	}
			
	


?>



<form id="chat_form" method="post" name="input" action="">
	<input type="hidden" name="pengirim" value="<?php echo $pengirim; ?>" />
	<input type="hidden" name="penerima" value="<?php echo $username; ?>" />
			<div class="form-actions">
			<span class="label label-success input-xlarge" style="border-bottom-right-radius: 0; border-bottom-left-radius: 0; border-top-right-radius: 7px; border-top-left-radius: 7px;">
					<h5>Chatting dengan: <b><?php echo $username; ?></b></h5>
					<br />
						<textarea class="input-block-level" name="pesan"></textarea></span>
							<br /><br />
						<input id="kirim_chat" type="submit" name="input" class="btn btn-primary" value="Kirim">
						<button class="btn">Batal</button>
					</div>
				
</form>						
						
						
						