<?php
require("koneksi.php");

$id_akun = mysqli_real_escape_string($koneksi, trim($_SESSION['admin']));
$seleksi_akun = mysqli_query($koneksi, "SELECT * FROM admin WHERE id='$id_akun'");
	$data_akun = mysqli_fetch_array($seleksi_akun);
		$tampil_akun = mysqli_real_escape_string($koneksi, trim($data_akun['username']));

echo "
	<h4 id='label_so'><i class='icon icon-time'></i> Anggota Yang Online</h4>
		<table class='table table-bordered' id='list_online'>
			<tr class='info'>
					<td><strong>Nama</strong></td>
					<td><strong>Keterangan</strong></td>
					<td><strong>Status</strong></td>";
					

$data_online = mysqli_query($koneksi, "SELECT * FROM admin WHERE id='$id_akun'");
$anggota = mysqli_fetch_array($data_online);
	$aktif_anggota = mysqli_real_escape_string($koneksi, trim($anggota['status']));
	
	
if($aktif_anggota == "online") {
	
	echo "
					<td><strong>Chat</strong></td>
";
	
}		
else {
	
	echo "</tr>";
	
}		



$seleksi = mysqli_query($koneksi, "SELECT * FROM admin WHERE id != '$id_akun' AND status = 'online' ORDER BY status DESC");
while($data_2 = mysqli_fetch_array($seleksi)) {
	
	$id = mysqli_real_escape_string($koneksi, trim($data_2['id']));
	$username = mysqli_real_escape_string($koneksi, trim($data_2['username']));
	$nama = mysqli_real_escape_string($koneksi, trim($data_2['nama_lengkap']));
	$ket = mysqli_real_escape_string($koneksi, trim(ucwords($data_2['ket'])));
	$foto_profil = mysqli_real_escape_string($koneksi, trim(stripslashes($data_2['foto_profil'])));
	$waktu_aktifitas = mysqli_real_escape_string($koneksi, trim($data_2['status']));
	
	if($waktu_aktifitas == "online") {
		
		$status = "<b>Online</b>";
		
	}
	else {
		
		$status = "Offline";
		
	}
	
	

	
	echo "
	<tr class='anggota_online'>
	<td>";
	
	if($foto_profil) {
		
		echo "
		<img src='../images/profil/$foto_profil' class='img img-rounded foto-profil'> $nama";
		
	}
	else {
		
		echo "<i class='icon icon-user'></i> $nama";
		
	}

	
	echo "
	</td>
	<td>$ket</td>
	<td>$status</td>";
	
	if($waktu_aktifitas == "online") {
?>
	
		<td><a data-target="#itmedia_chatting" id="chat_dengan" class="btn" data-toggle="modal" data-user="<?php echo $username; ?>"><i class="icon icon-comment"></i> Chat</a>
				<input type="hidden" name="dapat_user" data-pengirim="<?php echo $id_akun; ?>" />
			</td>
<?php		
	}
		
}



echo "
</tr>
</table>
";

if(empty($waktu_aktifitas)) {
	
	$status = "<div id='indikasi_tidak_online'>Tidak ada yang Online</div>";
	echo "<strong><center>$status</center></strong>";
	
}

?>
<?php
//MEMPROSES KIRIMAN CHAT
if(isset($_POST['kirim_chat'])) {
	
	$id_pengirim = mysqli_real_escape_string($koneksi, trim($_POST['id_pengirim']));
	$pengirim = mysqli_real_escape_string($koneksi, trim($_POST['pengirim']));
	$penerima = mysqli_real_escape_string($koneksi, trim($_POST['pengirim']));
	$penerima = mysqli_real_escape_string($koneksi, trim($_POST['penerima']));
	$pesan = mysqli_real_escape_string($koneksi, trim($_POST['pesan']));
	
	if(empty($pesan)) {
		
		$indikasi = "<h5>Anda belum mengisi Pesan... silakan diisi</h5>";
		echo "$indikasi";
		
	}
	else if(empty($penerima)) {
		$indikasi = "<h5>Maaf, penerima tidak terpilih. Silakan pilih</h5>";
		echo "$indikasi";
	}
	else {
		
		$kirim_chat = mysqli_query($koneksi, "INSERT INTO pesan_chat VALUES('', '$id_pengirim', '$pengirim', '$penerima', '$pesan', now())");
		
	}
	
}


?>



<form class="form" action="" name="kirim_chat" method="post" id="kirim_pesan">
<input type="hidden" name="id_pengirim" value="<?php echo $id_akun; ?>" />
<input type="hidden" name="pengirim" value="<?php echo $tampil_akun; ?>" />
<input type="hidden" id="nama_penerima" name="penerima" value="" />
	<div id="itmedia_chatting" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="itmedia_chatting_label">
		<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 id="itmedia_chatting_label" style="font-size: 20px;">Chatting dengan: <font id="itmedia_chat_dengan"></font> </h3>
			</div>
					<div class="modal-body">

					</div>
							<div class="modal-footer">
								<div class="input-append">
								<input type="text" name="pesan" id="appendedInputButton" class="input-xlarge" placeholder="Ketikkan pesan disini..." required x-moz-errormessage="Isi chat kosong...">
								<button type="submit" onclick="chatting_kirim()" id="kirim_chat_itmedia" name="kirim_chat" class="btn btn-primary"><i class="icon-white icon-share-alt"></i> Kirim</button>
								</div>
								<div class="input-append">
									<a href="#" type="button" class="btn" id="emotics" data-toggle="popover" data-placement="top" title="Emotics">&nbsp;&nbsp;<i class="icon icon-adjust"></i> Emotics &nbsp;&nbsp;</a>
								</div>
								<div id="notifikasi">
								
								</div>
							</div>
		</div>
</form>
<script>
$(document).ready(function() {
	
		$(document).on("click", "#chat_dengan", function(e) {
		
			e.preventDefault();
			$("#itmedia_chatting").modal("show");
			var data_user = $(this).attr("data-user");
			
			$.ajax({
				url: "content/lainnya/st.php",
				type: "POST",
				dataType: "html",
				data: {user:data_user},
				success: function(data) {
					$("#itmedia_chat_dengan").html(data);
					$("#nama_penerima").val(data);

				}
				
			});
			
		});
		
	function get_sender() {	
		if(1 != 2) {
		var data_pengirim = $(this).attr("data-pengirim");
			$.post("content/lainnya/st.php",
				{id_pengirim:<?php echo $id_akun; ?> },
				function(hasil) {
					$(".modal-body").html(hasil);
				}
			);
		}
	}
		
		
		
	
		
		
			$("#kirim_chat_itmedia").on("submit", function(e) {
				$ajax({
					url: "content/lainnya/st.php",
					type: "POST",
					data: $("form").serialize() ,
					success: function(hasil) {
						$("#notifikasi").text("Terkirim");
					}
				});
			});
	
});

</script>