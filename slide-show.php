<div class="row-fluid" id="section-slide-show">
	<div class="carousel slide" id="itmedia_carousel">
		
			<div class="carousel-inner">
<?php
include "koneksi.php";
	$select_slide_show = "SELECT * FROM slide_show ORDER BY id";
	$sql_slide_show = mysqli_query($koneksi, $select_slide_show);
	$i = 1;
	$status = "";
	
	while($r_slide_show = mysqli_fetch_array($sql_slide_show)) {
		
		$slide_show_gambar = mysqli_real_escape_string($koneksi, trim(stripslashes($r_slide_show['gambar'])));
		$slide_show_judul = mysqli_real_escape_string($koneksi, trim(stripslashes($r_slide_show['judul'])));
		$slide_show_deskripsi = mysqli_real_escape_string($koneksi, trim(stripslashes($r_slide_show['deskripsi'])));
		
		if($i > 1) {
			$status = "";
		}
		else {
			$status = "active";
		}
		
		echo "<div class='item $status'>
				<img src='./images/slide_show/$slide_show_gambar' alt='$slide_show_judul' width='100%'>
				<div class='container'>
					<div class='carousel-caption'>
					<h2>$slide_show_judul</h2>
					<p class='lead'>$slide_show_deskripsi</p>
					</div>
				</div>
			</div>";
		$i++;
		
	}



?>
</div>						
<a href="#itmedia_carousel" class="left carousel-control" data-slide="prev">&lsaquo;</a>
<a href="#itmedia_carousel" class="right carousel-control" data-slide="next">&rsaquo;</a>
</div>
</div>

</div>