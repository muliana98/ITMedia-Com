<div class="row-fluid" id="section-blog">
<!-- Section- -->
<div class="row-fluid" style="background: #F7F7F7; box-shadow: 1px 0 0 3px rgba(0,0,0,0.2);">
	<div class="container section-external">
		<div class="row" style="padding-top: 55px; padding-bottom: 25px;">
			<h1><i class="icon icon-globe" style="-webkit-transform:scale(2.0); -moz-transform:scale(2.0); -o-transfrom:scale(2.0); transform:scale(2.0); margin-top: 14px;"></i> Blog</h1> 
			
<?php
require("koneksi.php");

$select = "SELECT a.id_artikel, a.id_kategori, b.nm_kategori, a.judul, a.headline, a.isi, a.pengirim, a.tanggal, a.gambar FROM artikel a, kategori b WHERE a.id_kategori=b.id_kategori AND LOWER(b.nm_kategori)<> 'layanan' AND LOWER(b.nm_kategori)<> 'portfolio' ORDER BY a.id_artikel DESC LIMIT 6 ";
$query = mysqli_query($koneksi, $select);
$i = 1;
$span = "span3";
while($r = mysqli_fetch_array($query)) {
	
	$id_artikel = mysqli_real_escape_string($koneksi, trim($r['id_artikel']));
	$id_kategori = mysqli_real_escape_string($koneksi, trim($r['id_kategori']));
	$judul = mysqli_real_escape_string($koneksi, trim($r['judul']));
	$headline = mysqli_real_escape_string($koneksi, trim($r['headline']));
	$isi = mysqli_real_escape_string($koneksi, trim($r['isi']));
	$isi = substr($isi,0,110);
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
			
			echo "<div class='$span' style='margin-bottom: 12px;'>
					<a href='index.php?menu=blog-detail&id_artikel=$id_artikel'><img src='./$gambar' width='55%' height='55%' alt='' class='img img-rounded'>
						<h4>$judul</h4></a>
							<p>$isi...</p>
								<small>
								<a href='index.php?menu=blog-detail&id_artikel=$id_artikel'>Selengkapnya &raquo;</a>
								</small>
						</div> ";
						
						
	if($i==3 || $i==6) {
		
		echo "<div class='span1'>&nbsp;</div>
			</div>";
		
	}
	$i++;
	
}



?>

				</div>
			</div>
</div>
<!-- Section- -->
</div>