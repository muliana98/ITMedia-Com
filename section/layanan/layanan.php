<div class="row-fluid" id="section-layanan" style="padding-top: 3px;">
<div class="row-fluid bg-gray" style="background: #F7F7F7; box-shadow: 1px 0 0 3px rgba(0,0,0,0.2); display: block;">
	<div class="container section-1">
		<div class="row" style="padding-top: 25px; padding-bottom: 165px;">
		<h1><i class="icon icon-bookmark" style="-webkit-transform:scale(2.0); -moz-transform:scale(2.0); -o-transfrom:scale(2.0); transform:scale(2.0); margin-top: 12px;"></i> Layanan Kami</h1><br /><br />
					

<?php
require("koneksi.php");

$select = "SELECT a.id_artikel, a.id_kategori, b.nm_kategori, a.judul, a.headline, a.isi, a.pengirim, a.tanggal, a.gambar FROM artikel a, kategori b WHERE a.id_kategori = b.id_kategori AND LOWER(b.nm_kategori)='layanan' ORDER BY a.id_artikel DESC LIMIT 6";
$query = mysqli_query($koneksi, $select);
if($query) {
	
	$i = 1;
	$span = "span3";
	
	while($r = mysqli_fetch_array($query)) {
		
		$id_artikel = mysqli_real_escape_string($koneksi, trim($r['id_artikel']));
		$id_kategori = mysqli_real_escape_string($koneksi, trim($r['id_kategori']));
		$judul = mysqli_real_escape_string($koneksi, trim($r['judul']));
		$headline = mysqli_real_escape_string($koneksi, trim($r['headline']));
		$isi = mysqli_real_escape_string($koneksi, trim($r['isi']));
		$isi = substr($isi,0,150);
		$isi = str_replace('\r\n', "", $isi);
		$pengirim = mysqli_real_escape_string($koneksi, trim($r['pengirim']));
		$tanggal = mysqli_real_escape_string($koneksi, trim($r['tanggal']));
		$gambar = mysqli_real_escape_string($koneksi, trim($r['gambar']));
		
		
		if($i==2 || $i==5) {
			$span = "span4";
		}
		else {
			
			$span = "span3";
			
		}
		if($i==1 || $i==4) {
			
			echo "<div class='row'>
				<div class='span1'>&nbsp;</div>";
			
		}
			
			echo "<div class='$span'>
				<a href='index.php?menu=layanan-detail&id_artikel=$id_artikel'><img src='./$gambar' width='55%' height='55%' alt='' class='img img-polaroid'>
				<h4>$judul</h4></a> <p>$isi...</p>
				<small>
				<a href='index.php?menu=layanan-detail&id_artikel=$id_artikel'>Selengkapnya &raquo;
				</a></small>
				</div>";
				
				
			if($i==3 || $i==6) {
				
				echo "<div class='span1'>&nbsp;</div>
					</div>";
				
			}
			$i++;
			
	}
	
}
else {
	
	
}
?>
						
</div>
</div>
</div>
<!-- Section- -->