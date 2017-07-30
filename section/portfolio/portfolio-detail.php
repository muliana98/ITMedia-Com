<div class="row-fluid" id="section-portfolio" style="padding-top: 22px;">
	<div class="row-fluid" style="background-color: #7D7D7D; box-shadow: 1px 0 0 3px rgba(0,0,0,0.2); display: block;">	
		<div class="container">
			<br /><br /><br />
				<h1 class="text-center" style="border-bottom: 1px solid #FFFFFF; color: #FFFFFF; font-family: brush script mt; font-size: 51.5px;"><i class="icon-white icon-book" style="-webkit-transform:scale(2.0); -moz-transform:scale(2.0); -o-transfrom:scale(2.0); transform:scale(2.0); margin-top: 17px;"></i> Detail Portfolio</h1>
					</div><br />
							<div class="container">
							<div class="span1"></div>
							<div class="span3">
							<?php
							require("section/portfolio/portfolio-list.php");
							
							?>
							</div>
								<div class="span7">
<?php
require("koneksi.php");
$id_artikel = mysqli_real_escape_string($koneksi, trim($_REQUEST['id_artikel']));

$select = "SELECT a.id_artikel, a.id_kategori, b.nm_kategori, a.judul, a.headline, a.isi, a.pengirim, a.tanggal, a.gambar FROM artikel a, kategori b WHERE a.id_kategori=b.id_kategori AND a.id_artikel='$id_artikel' ORDER BY a.id_artikel DESC";

$query = mysqli_query($koneksi, $select);
$r = mysqli_fetch_array($query);
$id_artikel = mysqli_real_escape_string($koneksi, trim($r['id_artikel']));
$id_kategori = mysqli_real_escape_string($koneksi, trim($r['id_kategori']));
$judul = mysqli_real_escape_string($koneksi, trim($r['judul']));
$headline = mysqli_real_escape_string($koneksi, trim($r['headline']));
$isi = mysqli_real_escape_string($koneksi, trim(nl2br($r['isi'])));
$isi2 = str_replace('\r\n', "<br />", $isi);
$pengirim = mysql_escape_string($koneksi, trim($r['pengirim']));
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
echo "<img src='./$gambar' width='55%' height='55%' alt='' class='img img-circle'>
	<h4 style='color: white;'>$judul</h4>
	<p style='color: white;' align='justify'>
	<small style='box-shadow: 1px 0 0 2px rgba(0,0,0,0.2); display: block;'>
	Dikirim oleh : <b><u>".$pengirim."</u></b>, Tanggal ".$tgl_indo[2]." ".$tgl_indo[1]." ".$tgl_indo[0]."
	, Pukul ".$jam.".</small>
	<br />$isi2</p>
	
	";


?>

</div>
	<div class="span1"></div>
		</div>
			</div>
				</div>
















