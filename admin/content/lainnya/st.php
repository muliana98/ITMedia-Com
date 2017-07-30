<?php
require("../../koneksi.php");


	$user_get = "".$_POST['user']."";

	
	$pilih_user = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$user_get'");
	$tampilkan = mysqli_fetch_array($pilih_user);
		$username_seleksi = mysqli_real_escape_string($koneksi, trim($tampilkan['username']));
		
		echo $username_seleksi;
		
	$id_akun = "".$_POST['id_pengirim']."";

		
		
							$seleksi_pengirim = mysqli_query($koneksi, "SELECT * FROM admin WHERE id='$id_akun'");
							$datanya = mysqli_fetch_array($seleksi_pengirim);
								$tampil_pengirim = mysqli_real_escape_string($koneksi, trim($datanya['username']));
								
								$seleksi_pesan = mysqli_query($koneksi, "SELECT * FROM pesan_chat WHERE(pengirim='$tampil_pengirim' AND penerima='$username_seleksi'    OR    penerima='$tampil_pengirim' AND pengirim='$username_seleksi') ORDER BY id_pesan ASC");
								while($datanya_2 = mysqli_fetch_array($seleksi_pesan)) {
									
									$awal = mysqli_real_escape_string($koneksi, trim($datanya_2['pesan']));
									$judul_emotics = array("[kasmaran]","[kedip]","[ketawa]","[marah]","[melet]","[nangis]",
															"[sakit]","[bye]","[maki-maki]","[cmarah]","[cmurung]","[cnangis]",
															"[csedih]","[csenyum]","[bonus]");
									$emotics = array("<img src='web_itmedia/../emotics/akasmaran.gif' title='handup'>",
														"<img src='web_itmedia/../emotics/akedip.gif' title='bingung'>",
														"<img src='web_itmedia/../emotics/aketawa.gif' title='capek'>",
														"<img src='web_itmedia/../emotics/amarah.gif' title='cemen'>",
														"<img src='web_itmedia/../emotics/amelet.gif' title='cool'>",
														"<img src='web_itmedia/../emotics/anangis.gif' title='galau'>",
														"<img src='web_itmedia/../emotics/asakit.gif' title='hay'>",
														"<img src='web_itmedia/../emotics/bye.gif' title='kedip'>",
														"<img src='web_itmedia/../emotics/maki-maki.gif' title='kesetrum'>",
														"<img src='web_itmedia/../emotics/marah.gif' title='lol'>",
														"<img src='web_itmedia/../emotics/murung.gif' title='mewek'>",
														"<img src='web_itmedia/../emotics/nangis.gif' title='nangis'>",
														"<img src='web_itmedia/../emotics/sedih.gif' title='nyengir'>",
														"<img src='web_itmedia/../emotics/smile.gif' title='psimis'>",
														"<img width='17%' height='17%' src='web_itmedia/../emotics/bonus.png' title='rokok'>");
									
									$pengirim_pesan = mysqli_real_escape_string($koneksi, trim($datanya_2['pengirim']));
									$pesannya = str_replace($judul_emotics, $emotics, $awal);
									
									if($pengirim_pesan == $tampil_pengirim) {
										
										echo "
										<font size='3' class='pull-right'> $pesannya &nbsp; </font><br /><div style='margin-bottom: 32px;'></div>
										<span class='badge pull-right' style='padding: 4.5px; margin-bottom: 7px;'>
										<font size='3'><strong>$pengirim_pesan</strong> </font></span>
										<br /><br />
										
										
										";
										
									}
									else if($username_seleksi == $pengirim_pesan) {
										
										echo "<div style='margin-top: 12px;'></div>
										<span class='badge' style='padding: 4.5px; margin-bottom: 7px;'>
										<font size='3'><strong>$pengirim_pesan</strong></span> :&nbsp; $pesannya</font>
										<br /><br />
										
										
										";
										
									}

									
								}
	
	




?>

						

									

<?php
/*

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

*/
?>