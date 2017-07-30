<div class="row-fluid" id="section-show-detail">
	<div class="row-fluid" style="background-color: #F7F7F7; box-shadow: 1px 0 0 3px rgba(0,0,0,0.2); display: block;">	
		<div class="container">
			<br /><br /><br />
				<h1 class="text-center" style="border-bottom: 1px solid #363636;"><i class="icon icon-file" style="transform: scale(1.8); margin-top: 12px;"></i> Show Detail</h1>
					</div><br />
							<div class="container">
							<div class="span1"></div>
							<div class="span3">
							
							<?php
							require("koneksi.php");
							$id_artikel = mysqli_real_escape_string($koneksi, trim($_REQUEST['id']));
							
							$seleksi = mysqli_query($koneksi, "SELECT a.id_artikel, a.id_kategori, b.nm_kategori, a.judul, a.headline, a.isi, a.pengirim, a.gambar, a.tanggal FROM artikel a, kategori b WHERE a.id_kategori = b.id_kategori ORDER BY a.id_artikel='$id_artikel' DESC");
							$data = mysqli_fetch_array($seleksi);
								$nama_kategori = mysqli_real_escape_string($koneksi, $data['nm_kategori']);
							
							echo "<h2><i class='icon icon-tag' style='transform: scale(1.8); margin-top: 10px; margin-right: 6px;'></i> Kategori :</h2>
								<h4 style='display: block; border-radius: 6px; box-shadow: 2px 1.4px 1.5px 2px rgba(0,0,0,0.2); padding: 7px;'>$nama_kategori</h4>";
							
							
							?>
							
							</div>
								<div class="span7">
								<?php

								$id_artikel = mysqli_real_escape_string($koneksi, trim($_REQUEST['id']));

								$select = "SELECT a.id_artikel, a.id_kategori, a.judul, a.headline, a.isi, a.pengirim, a.tanggal, a.gambar FROM artikel a WHERE id_artikel='$id_artikel'";

								$query = mysqli_query($koneksi, $select);
								$r = mysqli_fetch_array($query);
									

								$id_artikel = mysqli_real_escape_string($koneksi, trim($r['id_artikel']));
								$id_kategori = mysqli_real_escape_string($koneksi, trim($r['id_kategori']));
								$judul = mysqli_real_escape_string($koneksi, trim($r['judul']));
								$headline = mysqli_real_escape_string($koneksi, trim($r['headline']));
								$isi = mysqli_real_escape_string($koneksi, trim($r['isi']));
								$isi = str_replace('\r\n', "<br />", $isi);
								$pengirim = mysqli_real_escape_string($koneksi, trim($r['pengirim']));
								$tanggal = mysqli_real_escape_string($koneksi, trim($r['tanggal']));
								$gambar = mysqli_real_escape_string($koneksi, trim($r['gambar']));

								$tgl = substr($tanggal,0,10);
								$jam = substr($tanggal,10);
								$tgl_indo = explode("-", $tgl);


								switch($tgl_indo[1]) {
									
									case '01' : $tgl_indo[1]="Januari"; break;
									case '02' : $tgl_indo[1]="Februari"; break;
									case '03' : $tgl_indo[1]="Maret"; break;
									case '04' : $tgl_indo[1]="April"; break;
									case '05' : $tgl_indo[1]="Mei"; break;
									case '06' : $tgl_indo[1]="Juni"; break;
									case '07' : $tgl_indo[1]="Juli"; break;
									case '08' : $tgl_indo[1]="Agustus"; break;
									case '09' : $tgl_indo[1]="September"; break;
									case '10' : $tgl_indo[1]="Oktober"; break;
									case '11' : $tgl_indo[1]="November"; break;
									case '12' : $tgl_indo[1]="Desember"; break;
									
								}
								echo "<img src='./$gambar' width='55%' height='55%' alt='' class='img img-rounded'>
									<h4>$judul</h4>
									<p align='justify'>
									<small style='box-shadow: 1px 0 0 2px rgba(0,0,0,0.1); display: block;'>
									Dikirim oleh : <b><u>".$pengirim."</b></u>, Tanggal ".$tgl_indo[2]." ".$tgl_indo[1]." ".$tgl_indo[0]."
									, Pukul ".$jam.".</small>
									<br />$isi</p>

									";









								?>
</div>
	<div class="span1"></div>
		</div>
			</div>
				</div>