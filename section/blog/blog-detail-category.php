<div class="row-fluid" id="section-blog" style="padding-top: 22px;">
	<div class="row-fluid" style="background-color: #F7F7F7; box-shadow: 1px 0 0 3px rgba(0,0,0,0.2); display: block;">	
<div class="container" id="blog" name="blog">
	<br />
		<div class="row">
			<br />
				<h1 class="text-center" style="border-bottom: 1px solid #7D7D7D; font-family: times new roman; font-size: 41.5px;"><i class="icon icon-globe" style="-webkit-transform:scale(2.0); -moz-transform:scale(2.0); -o-transfrom:scale(2.0); transform:scale(2.0); margin-top: 12.9px;"></i> Kategori Blog</h1>
				<hr />
			</div>
					
					<div class="row">
						<div class="span1"></div>
							<div class="span3">
							<?php
							require("section/blog/blog-list.php");
							
							?>
							</div>
							<div class="span7">
<?php
include "koneksi.php";

$id_nya = mysqli_real_escape_string($koneksi, trim($_GET['id_kategori']));
$pilih = "SELECT a.id_artikel, a.id_kategori, b.nm_kategori, a.judul, a.headline, a.isi, a.pengirim, a.gambar, a.tanggal FROM artikel a, kategori b WHERE a.id_kategori = b.id_kategori AND LOWER(nm_kategori)<>'layanan'  ORDER BY a.id_kategori='$id_nya' DESC";
$query = mysqli_query($koneksi, $pilih);
$tampil = mysqli_fetch_array($query);
	
	$id = mysqli_real_escape_string($koneksi, trim($tampil['id_kategori']));
	$nm = mysqli_real_escape_string($koneksi, trim($tampil['nm_kategori']));

	
		echo "<h4 style='margin-left: 30px;'>&raquo; $nm &laquo;</h4><br />";

?>


<?php
require("koneksi.php");

$id_kategori = mysqli_real_escape_string($koneksi, trim($_GET['id_kategori']));

$select = "SELECT * FROM artikel WHERE id_kategori='$id_kategori'";
$query = mysqli_query($koneksi, $select);
$i = 1;
$span = "span3";
while($r = mysqli_fetch_array($query)) {
	
	$id_artikel = mysqli_real_escape_string($koneksi, trim($r['id_artikel']));
	$id_kategori = mysqli_real_escape_string($koneksi, trim($r['id_kategori']));
	$judul = mysqli_real_escape_string($koneksi, trim($r['judul']));
	$headline = mysqli_real_escape_string($koneksi, trim($r['headline']));
	$isi = mysqli_real_escape_string($koneksi, trim(nl2br($r['isi'])));
	$isi = substr($isi,0,150);
	$isi = str_replace('\r\n', " ", $isi);
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
					<a href='index.php?menu=blog-detail&id_artikel=$id_artikel'><img src='./$gambar' width='55%' height='55%' alt='' class='img img-rounded'>
						<h4>$judul</h4></a>
							<p>$isi...</p>
							<small>
								<a href='index.php?menu=blog-detail&id_artikel=$id_artikel'>Selengkapnya &raquo;
								</a>
							</small>
						</div>
					";

					
if($i==3 || $i==6) {
	
	echo "<div class='span1'>&nbsp;</div>
		</div>";
	
}
$i++;

}



?>

					</div>
			<div class="span1">&nbsp;</div>
		</div>
	<br /><br />
</div>
</div>
</div>
</div>











