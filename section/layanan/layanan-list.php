<div class="">
	<h2>&nbsp;<i class="icon icon-tags" style="-webkit-transform:scale(1.8); -moz-transform:scale(1.8); -o-transfrom:scale(1.8); transform:scale(1.8); margin-top: 10px;"></i>&nbsp; Kategori :</h2>
		
<?php
require("koneksi.php");

$select = "SELECT id_kategori FROM kategori ORDER BY id_kategori DESC";
$query = mysqli_query($koneksi, $select);
$r = mysqli_fetch_array($query);
$kategori = mysqli_real_escape_string($koneksi, trim($r['id_kategori']));

echo "<span><h4 style='padding-bottom: 10px;'>";

	$select1 = "SELECT * FROM kategori WHERE LOWER(nm_kategori)='layanan'";
	$query1 = mysqli_query($koneksi, $select1);
	$r1 = mysqli_fetch_array($query1);
	$id_kategori1 = mysqli_real_escape_string($koneksi, trim($r1['id_kategori']));
	$nm_kategori1 = mysqli_real_escape_string($koneksi, trim(ucwords($r1['nm_kategori'])));

	
		echo "<a href='#'>".$nm_kategori1."</a>";
			
			$query2 = "SELECT id_kategori FROM artikel WHERE id_kategori='$id_kategori1' ORDER BY tanggal DESC";
			$count1 = mysqli_query($koneksi, $query2);
			$numsf = mysqli_num_rows($count1);
				echo "<span>&nbsp;[ ".$numsf." ]&nbsp;</span>";
					echo "</h4></span>";
		



?>

<?php
require("koneksi.php");

$select = "SELECT id_artikel, id_kategori, judul FROM artikel WHERE id_kategori='$id_kategori1' ORDER BY tanggal DESC";
$query = mysqli_query($koneksi, $select);
$i = 1;
$span = "span3";
while($r = mysqli_fetch_array($query)) {
	
	$id_artikel = mysqli_real_escape_string($koneksi, trim($r['id_artikel']));
	$id_kategori = mysqli_real_escape_string($koneksi, trim($r['id_kategori']));
	$judul = mysqli_real_escape_string($koneksi, trim($r['judul']));
	
	
		echo "<h5 style='display: block; box-shadow: 1px 3px 5px 1px rgba(0,0,0,0.2); padding: 6px; border-radius: 4px;'>
			<a href='index.php?menu=layanan-detail&id_artikel=$id_artikel'>$judul</a>
			</h5>
		
		";
	
}



?>

<br />
</div>




























