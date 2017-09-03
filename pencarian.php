<!DOCTYPE html>
<html lang="en">
<head>
<!-- META TAG -->
<?php require("meta.php"); ?>
<title>ITMedia-Com</title>
<?php require("link-css.php"); ?>
<?php require("javascript.php"); ?>
</head>
<body style="background: url(assets/picture/particle_triangle1_1.png) no-repeat center center fixed;
	-webkit-background-size: 100% 100%;
	-moz-background-size: 100% 100%;
	-o-background-size: 100% 100%;
	background-size: 100% 100%; padding-top: 62px;" data-spy="scroll" data-offset="0" id="section-first">
<!-- Section-Index -->
<div class="row-fluid" id="section-index">

<!-- Section-Beranda -->
<div class="row-fluid" id="section">
	<!-- Section-Navigasi -->
		<?php require("navigasi.php"); ?>
	<!-- Section-Navigasi -->
<div class="row-fluid" id="section-cari">
	<div class="row-fluid" style="background-color: #F7F7F7; box-shadow: 1px 0 0 3px rgba(0,0,0,0.2); display: block;">	
		<div class="container">
			<br /><br /><br />
				<h1 class="text-center" style="border-bottom: 1px solid #7D7D7D;"><i class="icon icon-search" style="transform: scale(1.8); margin-top: 8px;"></i> Hasil Pencarian</h1>
					</div><br />
							<div class="container">
							
								<?php
require("koneksi.php");
if(isset($_POST['cari'])) {
	
	
	$cari_data = mysqli_real_escape_string($koneksi, trim($_POST['nama']));
	

					echo	"<div class='span1'></div>";
					
					echo	"<div class='span3'>";
					
					$seleksi = mysqli_query($koneksi, "SELECT a.id_artikel, a.id_kategori, a.judul, a.headline, a.isi, a.pengirim, a.tanggal, a.gambar FROM artikel a WHERE a.judul LIKE '%$cari_data%' OR isi LIKE '%$cari_data%'");
					if($jumlah = mysqli_num_rows($seleksi)) {
					echo "<blockquote>

					<p class='lead'>Pencarian untuk kata kunci <u>$cari_data</u></p>
					<h4>Terdapat : $jumlah Hasil</h4></blockquote>";
					}
					else {
						
						echo "<h4>Tidak ditemukan hasil untuk kata kunci <b><u>$cari_data</u></b>!</h4>";
						
					}
?>
					
					
							</div>
								<div class="span7">

<?php
$select = "SELECT a.id_artikel, a.id_kategori, a.judul, a.headline, a.isi, a.pengirim, a.tanggal, a.gambar FROM artikel a WHERE a.judul LIKE '%$cari_data%' OR isi LIKE '%$cari_data%'";

$query = mysqli_query($koneksi, $select);

$i = 1;
$span = "span3";

while($r = mysqli_fetch_array($query)) {
	

$id_artikel = mysqli_real_escape_string($koneksi, trim($r['id_artikel']));
$id_kategori = mysqli_real_escape_string($koneksi, trim($r['id_kategori']));
$judul = mysqli_real_escape_string($koneksi, trim($r['judul']));
$headline = mysqli_real_escape_string($koneksi, trim($r['headline']));
$isi = mysqli_real_escape_string($koneksi, trim($r['isi']));
$isi = str_replace('\r\n', "<br />", $isi);
$isi = substr($isi,0,140);
$pengirim = mysqli_real_escape_string($koneksi, trim($r['pengirim']));
$tanggal = mysqli_real_escape_string($koneksi, trim($r['tanggal']));
$gambar = mysqli_real_escape_string($koneksi, trim($r['gambar']));

	if($i==2 || $i==5) {
		
		$span = "span3";
		
	}
	else {
		
		$span = "span3";
		
	}
	
	if($i==1 || $i==4) {
		
		echo "<div class='row'>
				<div class='span1'>&nbsp;</div>";
		
	}
	
			echo "<div class='$span'>
					<a href='index.php?menu=show-detail&id=$id_artikel'><img src='./$gambar' width='60%' height='60%' alt='' class='img img-rounded'>
						<h4>$judul</h4></a>
						<input type='hidden' name='id' value='$id_artikel' />
							<p style='text-align: justify;'>$isi...</p>
							<small>
								<a href='index.php?menu=show-detail&id=$id_artikel' style='margin-top: 10px;'>Selengkapnya &raquo;
								</a>
							</small>
							<br /><br /><br />
						</div>
					";

					
if($i==3 || $i==6) {
	
	echo "<div class='span1'>&nbsp;</div>
		</div>";
	
}
$i++;

}


}



?>
</div>
	<div class="span1"></div>
		</div>
			</div>
				</div>



<!-- Section-Footer -->
<?php require("footer.php"); ?>
</div>
</div>
<!-- Footer -->


<script>
	  !function ($) {
	  $(function() {
	  $('#itmedia_carousel').carousel()
		})
	  } (window.jQuery)
</script>
<script>
$(document).ready(function(){
  // Add scrollspy to <body>
  $('body').scrollspy({target: ".navbar", offset: 50});   

  // Add smooth scrolling on all links inside the navbar
  $("#myNavbar a").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    }  // End if
  });
});
</script>
</body>
</html>
	














